<?php
if (!empty($_POST)) {
    try {
        if (!isset($_POST['token'])) {
            throw new Exception(Lang::no_token());
        }
        if (!isset($_POST['user'])) {
            throw new Exception(Lang::no_user());
        }
        $user = table_fetch_row('camp_registration', sprintf('id="%d"', $_POST['user']));
        if (false == $user) {
            throw new Exception(Lang::no_user());
        }
        $camp = table_fetch_row('camps', sprintf('id="%d"', $user['camp']));
        if (false == $camp) {
            throw new Exception(Lang::no_camp());
        }
        $token = $_POST['token'];
        $data = array(
            'security_method' => 'token',
            'security_id' => $token['id'],
            'price' => $camp['price'],
            'user' => $user['id'],
            'client_ip' => $token['client_ip'],
            'email' => $token['email'],
            'payment_type' => $token['type'],
            'payment_date' => date('Y-m-d H:i:s', $token['created'])
        );
        if (!table_insert('camp_payments', array_keys($data), $data)) {
            throw new Exception(Lang::save_error());
        }
        echo json_encode(array('code' => 200, 'message' => Lang::reg_complete()));
    } catch (Exception $e) {
        echo json_encode(array('code' => 400, 'message' => $e->getMessage()));
    }
    exit;
}
if (!isset($_GET['reg-id'])) {
    return;
}
$user = table_fetch_row('camp_registration', sprintf('id="%d"', $_GET['reg-id']));
if (false == $user) {
    _e(Lang::no_user());
    return;
}
$camp = table_fetch_row('camps', sprintf('id="%d"', $user['camp']));
if (false == $camp) {
    _e(Lang::no_camp());
    return;
}
?>

<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <?php
        if (isset($_SESSION['message'])) {
            _t('h2', $_SESSION['message']);
        }
        _e($pageData['content']);
        ?>


        <script src="https://checkout.stripe.com/checkout.js"></script>
        <button id="customButton" class="red-btn"><?php _e(Lang::complete_reg()); ?></button>
        <h2 id="server-response"></h2>
        <script>
            var handler = StripeCheckout.configure({
                key: 'pk_test_yT7Qck0gapSbjZZyyhzBobtZ',
                image: '/public/img/footer-logo.png',
                locale: 'auto',
                token: function (token) {
                    $.ajax({
                        url: '/payment.html',
                        type: 'POST',
                        data: {token: token, user:<?php _e($_GET['reg-id']);?>},
                        dataType: 'json',
                        success: function (res) {
                            var res_cont = $('#server-response');
                            res_cont.html(res.message);
                            if (res.code == 200) {
                                setTimeout(function () {
                                    res_cont.html('<?php _t('a', Lang::click_here());?>');
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
                        description: '<?php _e(Lang::camp_reg());?>',
                        currency: "gbp",
                        amount: <?php echo doubleval(100*$camp['price']);?>
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
