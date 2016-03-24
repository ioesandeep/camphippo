<?php
require_once BASEDIR . '/vendor/autoload.php';
if (!empty($_POST)) {
    try {
        if (!isset($_POST['token'])) {
            throw new Exception(Lang::no_token());
        }
        if (!isset($_POST['user'])) {
            throw new Exception(Lang::no_user());
        }
        $user = table_fetch_row('camp_subscriptions', sprintf('id="%d"', $_POST['user']));
        if (false == $user) {
            throw new Exception(Lang::no_user());
        }

        //confirm payment
        \Stripe\Stripe::setApiKey("sk_live_QmcKfzzVJvyoDsMngzDA82J0");
        $token = $_POST['token'];
        $charge = \Stripe\Charge::create(array(
            "amount" => $user['cost'] * 100,
            "currency" => "gbp",
            "source" => $token['id'],
            "description" => Lang::camp_sub()
        ));

        $data = array(
            'security_method' => 'token',
            'security_id' => $token['id'],
            'price' => $user['cost'],
            'user' => $user['id'],
            'client_ip' => $token['client_ip'],
            'email' => $token['email'],
            'payment_type' => $token['type'],
            'payment_date' => date('Y-m-d H:i:s', $token['created']),
            'user_type' => 'subscription'
        );
        if (!table_insert('camp_payments', array_keys($data), $data)) {
            throw new Exception(Lang::save_error());
        }
        $booking_id = db_insert_id();

        $terms = array(
            11 => 'Jan-March 2017 ( 11Weeks)',
            12 => 'April - July 2016 (12weeks)',
            14 => 'Sept -Dec 2016 (14 weeks)'
        );

        //send email here
        //1. Notify the admin
        //2. Notify the user
        ob_start();
        ?>
        <html>
        <head></head>
        <body>
        <?php
        _t('h3', Lang::subscription_confirmed());
        ?>
        <table>
            <tr>
                <?php
                _t('td', Lang::subscription_id());
                _t('td', $booking_id);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::name());
                _t('td', $user['name']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::sessions());
                _t('td', $user['sessions']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::terms());
                _t('td', isset($terms[$user['term']]) ? $terms[$user['term']] : Lang::unknown());
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::email());
                _t('td', $token['email']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::payment_amt());
                _t('td', '&pound;' . $user['cost']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::payment_type());
                _t('td', $token['type']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::stripe_token());
                _t('td', $token['id']);
                ?>
            </tr>
            <tr>
                <?php
                _t('td', Lang::subscription_date());
                _t('td', date('Y-m-d H:i:s', $token['created']));
                ?>
            </tr>
        </table>
        </body>
        </html>
        <?php
        $email = ob_get_contents();
        ob_end_clean();
        $to = sprintf('%s,%s', Site::jan_email(), Site::gary_email());
        send_html_email($to, 'Jan &amp; Gary', Site::email(), Site::application(), Lang::new_subscription(), $email);
        ob_start();
        ?>
        <html>
        <head></head>
        <body>
        <?php _t('h3', Lang::dear() . ' ' . $user['name']); ?><br/><br/>
        <p>We have received your subscription information and payment of &pound; <?php _e($user['cost']); ?>
            for Trampolining subscription.</p>
        <p>Your Subscription id is : <?php _e($booking_id);?></p>
        <br/>
        <p>If you have any questions please contact us on <?php _e(Site::phone()); ?> or
            email <?php _e(Site::email()); ?></p>
        </body>
        </html>
        <?php
        $email = ob_get_contents();
        ob_end_clean();
        $e = $token['email'];
        send_html_email($e, $user['name'], Site::email(), Site::application(), Lang::booking_complete(), $email);

        echo json_encode(array('code' => 200, 'message' => Lang::reg_complete()));
    } catch (Exception $e) {
        echo json_encode(array('code' => 400, 'message' => $e->getMessage()));
    }
    exit;
}
if (!isset($_GET['sub-id'])) {
    return;
}
$user = table_fetch_row('camp_subscriptions', sprintf('id="%d"', $_GET['sub-id']));
if (false == $user) {
    _e(Lang::no_user());
    return;
}
?>

<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
            if (isset($_SESSION['message'])) {
                _t('h2', $_SESSION['message']);
            }
            _e($pageData['content']);
            ?>
            <script src="https://checkout.stripe.com/checkout.js"></script>
            <p>Payment required: &pound;<?php echo $user['cost'];?></p>
            <button id="customButton" class="red-btn"><?php _e(Lang::complete_sub()); ?></button>
            <h2 id="server-response"></h2>
            <script>
                var handler = StripeCheckout.configure({
                    key: 'pk_live_l8FVPBTXFF27Tvt3dsr6AFlR',
                    image: '/public/img/footer-logo.png',
                    locale: 'auto',
                    token: function (token) {
                        $.ajax({
                            url: '/subscription-payment.html',
                            type: 'POST',
                            data: {token: token, user:<?php _e($_GET['sub-id']);?>},
                            dataType: 'json',
                            success: function (res) {
                                var res_cont = $('#server-response');
                                res_cont.html(res.message);
                                if (res.code == 200) {
                                    setTimeout(function () {
                                        res_cont.html('<?php _t('a', Lang::click_here(), array('href' => '/'));?>');
                                        setTimeout(function () {
                                            location.href = '/';
                                        }, 4000);
                                    }, 4000);
                                }
                            }
                        })
                    }
                });
                $(function () {
                    $('#customButton').on('click', function (e) {
                        handler.open({
                            name: '<?php _e(Site::application());?>',
                            description: '<?php _e(Lang::camp_sub());?>',
                            currency: "gbp",
                            amount: <?php echo doubleval(100 * $user['cost']);?>
                        });
                        e.preventDefault();
                    });
                    $(window).on('popstate', function () {
                        handler.close();
                    });
                });
            </script>
        </div>
    </div>
</div>
