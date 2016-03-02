<?php
if (!isset($_GET['camp'])) {
    return;
}
@session_start();
if (isset($_POST['signup'])) {
    $fields = array();
    try {
        $post = $_POST;
        $required = Lang::signup_form();

        if (!isset($post['name'])) {
            throw new Exception($required['name']);
        }
        if (!isset($post['email'])) {
            throw new Exception($required['email']);
        }
        if (!isset($post['mobile'])) {
            throw new Exception($required['mobile']);
        }
        if (!isset($post['landline'])) {
            throw new Exception($required['landline']);
        }
        if (!isset($post['address'])) {
            throw new Exception($required['address']);
        }
        if (!isset($post['school'])) {
            throw new Exception($required['school']);
        }
        if (!isset($post['year_group'])) {
            throw new Exception($required['year_group']);
        }
        if (!table_insert('camp_registration', array('name','wished_name', 'email', 'mobile', 'landline', 'address', 'school', 'year_group', 'camp'), $post)) {
            throw new Exception(Lang::save_error());
        }
        $_SESSION['message'] = Lang::reg_success();
        header('Location:/payment.html?reg-id=' . db_insert_id());
    } catch (Exception $e) {
        echo show_messages(array($e->getMessage()));
    }
}
?>
<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
        <?php
        _t('h1', $pageData['h1_title']);
        _e($pageData['content']);
        ?>
        <form action="" class="contactForm" method="post">
            <input type="hidden" name="camp" value="<?php _e($_GET['camp']); ?>"/>
            <input type="text" id="" name="name" placeholder="<?php _e(strtoupper(Lang::c_name())); ?>"
                   class="form-control"/>
            <input type="text" id="" name="wished_name" placeholder="<?php _e(strtoupper(Lang::c_wished_name())); ?>"
                   class="form-control"/>

            <?php
            _t('h3', Lang::contact_details());
            ?>
            <textarea id="" name="address" placeholder="<?php _e(strtoupper(Lang::address())); ?>"
                      class="form-control "></textarea>
            <input type="text" id="" name="email" placeholder="<?php _e(strtoupper(Lang::c_email())); ?>"
                   class="form-control"/>
            <input type="text" id="" name="mobile" placeholder="<?php _e(strtoupper(Lang::c_mobile())); ?>"
                   class="form-control"/>
            <input type="text" id="" name="landline" placeholder="<?php _e(strtoupper(Lang::c_landline())); ?>"
                   class="form-control"/>
            <input type="text" id="" name="school" placeholder="<?php _e(strtoupper(Lang::c_school())); ?>"
                   class="form-control"/>
            <input type="text" id="" name="year_group" placeholder="<?php _e(strtoupper(Lang::c_yr())); ?>"
                   class="form-control"/>
            <button type="submit" class="red-btn" name="signup"><?php _e(strtoupper(Lang::contd())); ?></button>
        </form><!-- contactForm -->
    </div><!-- #default-content-container -->
    <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
        <?php require_once TEMPLATE_PATH . '/sections/sidebar/camps.php'; ?>
    </div><!-- right-side-content -->
</div>