<?php
$types = array('lifeguarding', 'kids camps', 'triathlons', 'trampolining', 'swim school', 'cheerleading');
$type = array_search(strtolower($pageData['page_title']), $types);
if (false !== $type) {
    $type = $type + 1;
}

$camps = table_fetch_rows('camps', sprintf('type="%d" and DATE_FORMAT(start_date,"%%m") >= "%s"', $type, date('m')), 'start_date asc,id asc', 0, 4);

?>
<div class="row">
    <div id="lifeguard-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
            $subscribe_url = '/course-subscription.html';
            _t('h1', ucwords($pageData['h1_title']));
            _e($pageData['content']);
            if($url == '/trampolining.html') {
                __('p');
                    __('a', 'signup-course', 'text-icon-block', array('href' => $subscribe_url));
                        _t('span', Lang::subscribe_tramp(),array('style'=>'width:auto;'));
                    __('/a');
                __('/p');
            }
            ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php __('img', false, "img-responsive center-block", array('src' => get_image('page/' . $pageData['id'] . '-header-image'))); ?>
        </div>
        <?php if (false != $camps) {
            __('div', false, 'col-md-12 col-sm-12 col-xs-12');
            __('div', false, 'calendar-module-container');
            _t('h2', Lang::upcoming_events());
            foreach ($camps as $camp) {
                $day = date('d',strtotime($camp['start_date']));
                if (date('m', strtotime($camp['start_date'])) == date('m', strtotime($camp['end_date']))) {
                    $day = date('d', strtotime($camp['start_date'])) . '-' . date('d', strtotime($camp['end_date']));
                }
                __('div', false, 'cal-module-row');
                    __('div', false, 'cal-module-left');
                        _t('span', strtoupper(date('M',strtotime($camp['start_date']))), array('class' => 'month'));
                        _t('span', $day, array('class' => 'day'));
                    __('/div');
                    __('div', false, 'cal-module-mid');
                        _t('span', $camp['title'], array('class' => 'title'));
                        _t('span', Lang::venue(). ' '. $camp['venue']);
                        if(!empty($camp['start_time'])) {
                            _t('span', Lang::time() . ' ' . $camp['start_time']);
                        }
                    __('/div');
                    __('div', false, 'cal-module-right');
                        __('a','full-details','text-icon-block small-full-details',array('href'=>getRewriteUrl('camps',$camp['id'])));
                            _t('span', Lang::view_details());
                            __('img',false,false,array('src'=>'/public/img/icons/arrow-small.png'));
                        __('/a');
                    __('/div');
                __('/div');
            }
            __('/div');
            __('/div');
        } ?>
    </div>
</div>