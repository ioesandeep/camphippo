<?php
table_update('news', array('views'), array('views' => 'views+1'), sprintf('id="%d"', $pageData['id']));
$prev = table_fetch_row('news', sprintf('id < "%d"', $pageData['id']));
$next = table_fetch_row('news', sprintf('id > "%d"', $pageData['id']));
$news = table_fetch_row('page', 'LOWER(page_title)="news"');
?>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
            _t('h1', $news['h1_title']);
            _t('a', Lang::back_to_news(), array('href' => getRewriteUrl('page', $news['id']), 'class' => 'prev2'));
            ?>
            <div class="prevnext pull-right">
                <?php
                if (false != $prev) {
                    _t('a', Lang::prev(), array('href' => getRewriteUrl('news', $prev['id'])));
                    if (false != $next) {
                        _e(' | ');
                    }
                }
                if (false != $next) {
                    _t('a', Lang::next(), array('href' => getRewriteUrl('news', $next['id'])));
                }
                ?>
            </div>
            <div class="news-container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 news-col">
                        <?php
                        _t('h3', $pageData['title']);
                        _t('span', date('F d, Y', strtotime($pageData['news_date'])));
                        _t('p', get_paragraphed_content($pageData['content'], 1));
                        $img = get_image('news/' . $pageData['id']);
                        if (empty($img)) {
                            $img = '/public/img/dummy-big.jpg';
                        }
                        __('img', false, 'img-responsive center-block', array('src' => $img));
                        __('br');
                        _e(get_paragraphed_content($pageData['content'], 1, true));
                        ?>
                    </div><!-- news-col -->
                </div>
            </div><!-- news-container -->
        </div>
        <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
            <?php require_once TEMPLATE_PATH . '/sections/sidebar/news.php'; ?>
        </div><!-- right-side-content -->
    </div><!-- #default-content-container -->
</div>