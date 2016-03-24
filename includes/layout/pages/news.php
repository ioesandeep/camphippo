<?php
$news = table_fetch_rows('news', 'status=1', 'news_date desc, id desc');
if (false == $news) {
    return;
}
?>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php _t('h1', $pageData['h1_title']); ?>
            <div class="news-container">
                <div class="row">
                    <?php foreach ($news as $n) {
                        $img = get_image('news/' . $n['id']);
                        if (empty($img)) {
                            $img = "/public/img/dummy-small.jpg";
                        }
                        __('div', false, 'col-md-6 col-xs-12 news-col');
                        __('img', false, 'news-image', array('src' => $img));
                        _t('h3',$n['title']);
                        _t('span', date('F d, Y', strtotime($n['news_date'])));
                        _t('p', get_sentence($n['content'], 3));
                        _t('a', Lang::find_more(), array('href' => getRewriteUrl('news', $n['id'])));
                        __('/div');
                    } ?>
                </div>
            </div><!-- news-container -->
        </div>
        <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
            <?php require_once TEMPLATE_PATH . '/sections/sidebar/news.php'; ?>
        </div><!-- right-side-content -->
    </div><!-- #default-content-container -->
</div>