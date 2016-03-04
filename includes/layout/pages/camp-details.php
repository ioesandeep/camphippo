<?php
$types = array('lifeguarding', 'kids camps', 'triathlons', 'trampolining', 'swim school', 'cheerleading');

$type = table_fetch_row('page', sprintf('LOWER(page_title)="%s"', strtolower($types[$pageData['type'] - 1])));
$video = html_entity_decode($pageData['video_url']);
if (!empty($video)) {
    //parse out url from iframe; if an embed code has bee uploaded
    if (strpos($video, 'iframe') != false) {
        $html = new DOMDocument();
        @$html->loadHTML($video);
        $iframes = $html->getElementsByTagName('iframe');
        $video = $iframes[0]->getAttribute('src');
    } else {
        /**
         * else check if the video contains proper embed url or not
         * Youtube has the embed url like: https://www.youtube.com/embed/{video_id}
         * Vimeo has the embed url like : https://player.vimeo.com/video/156881088?color=fcff33&badge=0
         * We ll need to verify this format in the url. If its not valid, we ll take out the
         * file id and create a proper url ourselves.
         */
        $uri = parse_url($video);
        switch ($uri['host']) {
            case 'www.youtube.com':
            case 'youtube.com':
                if (isset($uri['query'])) {
                    parse_str($uri['query']);
                    if (isset($v)) {
                        $video_id = $v;
                    }
                }
                if (!isset($video_id)) {
                    $paths = array_values(array_filter(explode('/', $uri['path'])));
                    $video_id = $paths[count($paths) - 1];//the last one
                }
                $video = sprintf('https://www.youtube.com/embed/%s', $video_id);
                break;
            case 'player.vimeo.com':
            case 'vimeo.com':
                $paths = array_values(array_filter(explode('/', $uri['path'])));
                $video_id = $paths[count($paths) - 1];//the last one
                $video = sprintf('https://player.vimeo.com/video/%s', $video_id) . (isset($uri['query']) ? sprintf('?%s', $uri['query']) : null);
                break;
        }
    }
    $video = array(
        'type' => 'embed',
        'url' => $video
    );
} elseif (($v = get_file($pageData['id'], 'videos')) != '') {
    $video = array(
        'type' => 'file',
        'url' => '/uploads/' . $v
    );
}
?>
<div class="row">
    <div id="lifeguard-container">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <a href="<?php _e(getRewriteUrl('page', $type['id'])); ?>"
               class="prev1"><?php echo _e(Lang::back_list()); ?></a>
            <div class="lifeguard-article">
                <hgroup>
                    <?php
                    _t('h1', $pageData['title']);
                    _t('span', Lang::date() . ' ' . date('d F Y', strtotime($pageData['start_date'])));
                    _t('span', Lang::venue() . ' ' . $pageData['venue']);
                    ?>
                </hgroup>
                <?php
                $image = get_image('camps/' . $pageData['id']);
                if (empty($image)) {
                    $image = '/public/img/hippo/life-guard-hippo.png';
                }
                $signup_url = !empty($pageData['signup_url']) ? $pageData['signup_url'] : sprintf('/signup.html?camp=%d', $pageData['id']);
                $lang = 'sign_up_' . str_replace(' ', '_', strtolower($type['h1_title']));
                $lang = Lang::$lang() == false ? Lang::sign_up() : Lang::$lang();
                _e($pageData['description']);
                __('a', 'signup-course', 'text-icon-block', array('href' => $signup_url));
                _t('span', $lang);
                __('img', false, false, array('src' => $image));
                __('/a');
                ?>
            </div><!-- lifeguard-article -->
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div id="video-container">
                <?php if (is_array($video)) {
                    switch ($video['type']) {
                        case 'file':
                            echo sprintf('<video width="500" height="281" controls><source src="%s" type="video/mp4">Your browser does not support the videos.</video>', $video['url']);
                            break;
                        case 'embed':
                            echo sprintf('<iframe src="%s" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', $video['url']);
                            break;
                    }
                } ?>
            </div><!-- #video-container -->
            <?php $file = get_file($pageData['id'], 'files');
            if (!empty($file)) {
                __('a', 'download-course', 'text-icon-block', array('href' => '/uploads/' . $file));
                _t('span', Lang::course_info());
                __('img', false, false, array('src' => '/public/img/icons/download.png'));
                __('/a');
            }

            if (!empty($pageData['extra_info'])) {
                _t('h3',Lang::extra_info());
                _e($pageData['extra_info']);
            }
            ?>
        </div>
    </div><!-- #lifeguard-container -->
</div>