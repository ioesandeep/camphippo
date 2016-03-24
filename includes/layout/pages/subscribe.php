<?php
if (isset($_POST['subscribe'])) {
    try {
        $fields = array('name', 'age', 'sessions', 'term', 'cost');
        if (!table_insert('camp_subscriptions', $fields, $_POST)) {
            throw new Exception(Lang::save_error());
        }
        $id = db_insert_id();
        $_SESSION['message'] = Lang::subscribe_success();
        header('Location:/parental-consent.html?sub-id=' . $id);
    } catch (Exception $e) {
        $message = $e->getMessage();
        show_messages(array($message));
    }
}
?>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <form action="" class="contactForm" method="post">
                <input type="text" id="" name="name" placeholder="<?php _e(strtoupper(Lang::c_name())); ?>"
                       class="form-control" required/>
                <input type="text" id="" name="age"
                       placeholder="<?php _e(strtoupper(Lang::age())); ?>"
                       class="form-control" required/>
                <?php
                _t('h4', Lang::sess_per_week());
                ?>
                <select name="sessions" id="" class="form-control" required>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <?php
                _t('h4', Lang::term_attend());
                ?>
                <select name="term" id="" class="form-control" required>
                    <option value="12" selected>April - July 2016 (12weeks)</option>
                    <option value="14">Sept -Dec 2016 (14 weeks)</option>
                    <option value="11">Jan-March 2017 ( 11Weeks)</option>
                </select>
                <p>
                    Net Cost: &pound;<span id="net_price"></span>
                </p>
                <input type="hidden" name="cost" value="0" id="net_cost"/>
                <button type="submit" class="red-btn" name="subscribe"><?php _e(strtoupper(Lang::contd())); ?></button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var calc_cost = function () {
            var session = $('[name=sessions]').val();
            var term = $('[name=term]').val();
            var cost = parseInt(session) * parseInt(term) * 5.5;
            $('#net_cost').val(cost);
            $('#net_price').html(cost);
        };
        var trigger_objs = $('[name=sessions],[name=term]');
        trigger_objs.change(calc_cost);
        trigger_objs.trigger('change');
    });
</script>