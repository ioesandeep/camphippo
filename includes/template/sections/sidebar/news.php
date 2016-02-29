<?php
$messages = array();
if (isset($_POST['subscribe'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (false != $email) {
        table_insert('subscriptions', array('name', 'email'), $_POST);
        $messages[] = Lang::thank_subscribe();
    }
}
$news = table_fetch_rows('news', 'status=1', 'views desc,news_date desc, id desc',0,3);
?>
    <div id="subscribe-container">
        <?php
        if (!empty($messages)) {
            show_messages($messages);
        }
        _t('h3', strtoupper(lang::subscribe()));
        ?>

        <form action="" method="post">
            <input type="text" placeholder="<?php _e(Lang::s_name()); ?>" id="" name="name"
                   class="form-control center-block"/>

            <input type="text" placeholder="<?php _e(Lang::s_email()); ?>" id="" name="email"
                   class="form-control center-block"/>

            <input type="submit" value="<?php _e(Lang::submit()); ?>" class="red-btn" id="subscribe-btn"
                   name="subscribe"/>
        </form>

    </div><!-- #subscribe-container -->
<?php if (false != $news) {
    __('div', 'popular-post');
    _t('h3', strtoupper(Lang::popular_posts()));
    foreach ($news as $n) {
        __('div', false, 'post-section');
            _t('a', $n['title'], array('href' => getRewriteUrl('news', $n['id'])));
            _t('span', date('F d, Y', strtotime($n['news_date'])));
        __('/div');
    }
    __('/div');
} ?>