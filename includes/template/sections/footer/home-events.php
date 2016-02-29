<?php
$event = table_fetch_row('page', 'LOWER(page_title)="events"');
$news = table_fetch_row('page', 'LOWER(page_title)="news"');
//latest news, the last one in the db
$l_news = table_fetch_row('news', 'status=1', 'news_date desc, id desc');
//this years events
$events = table_fetch_rows('events', sprintf('date_format(str_to_date(start_date,"%%Y"),"%%Y") = "%d"', date('Y')), 'end_date desc, id desc', 0, 4);
?>
<div class="footer-content">
    <div class="container">
        <div class="row">
            <div id="events-news-container">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="events-container">
                        <?php
                        _t('h1', $event['h1_title']);
                        _e($event['content']);
                        _t('a', Lang::more_info(), array('href' => getRewriteUrl('page', $event['id'])));
                        __('div', false, 'calendar-module-container');
                        _t('h2', Lang::year_events());
                        if (false != $events) {
                            foreach ($events as $e) {
                                @list($d,$m,$y) = explode('/',$e['start_date']);
                                if(isset($m) && isset($y)) {
                                    $e['start_date'] = sprintf('%d-%d-%d', $y, $m, $d);
                                }
                                $day = date('d', strtotime($e['start_date']));
                                if (date('m', strtotime($e['start_date'])) == date('m', strtotime($e['end_date']))) {
                                    $day = date('d', strtotime($e['start_date'])) . '-' . date('d', strtotime($e['end_date']));
                                }
                                __('div', false, 'cal-module-row');
                                    __('div', false, 'cal-module-left');
                                        _t('span', strtoupper(date('M')), array('class' => 'month'));
                                        _t('span', $day, array('class' => 'day'));
                                    __('/div');
                                    __('div', false, 'cal-module-mid');
                                        _t('span', $e['title'], array('class' => 'title'));
                                        _t('span', Lang::venue() . ' ' . $e['venue']);
                                        _t('span', Lang::time() . ' ' . $e['start_time']);
                                    __('/div');
                                __('/div');
                            }
                        }
                        __('/div');
                        _t('a', Lang::all_dates(), array('href' => getRewriteUrl('page', $event['id']), 'class' => 'viewall'));
                        ?>
                    </div><!-- events-container -->
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="featured-news-container">
                        <?php
                        $img = get_image('news/' . $l_news['id']);
                        if (empty($img)) {
                            $img = '/public/img/dummy-news.jpg';
                        }
                        __('img', false, 'img-responsive center-block', array('src' => $img));
                        __('a', false, false, array('href' => getRewriteUrl('news', $l_news['id'])));
                        _t('span', $l_news['title']);
                        _t('p', get_sentence($l_news['content'], 2));
                        __('/');
                        __('hr');
                        _t('a', strtoupper(Lang::all_news()), array('href' => getRewriteUrl('page', $news['id']), 'class' => 'viewall'))
                        ?>
                    </div><!-- featured-news-container -->
                </div>
            </div><!-- #events-news-container -->
        </div>
    </div>
</div><!-- footer-content -->