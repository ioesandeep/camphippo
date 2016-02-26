<?php
$types = array('lifeguarding', 'kids camps', 'triathlons', 'trampolining');
$type = table_fetch_row('page', sprintf('LOWER(page_title)="%s"', strtolower($types[$pageData['type'] - 1])));
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
                _e($pageData['description']);
                __('a', 'signup-course', 'text-icon-block', array('href' => $pageData['signup_url']));
                _t('span', Lang::sign_up());
                __('img', false, false, array('src' => $image));
                __('/a');
                ?>
            </div><!-- lifeguard-article -->
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div id="video-container">
                <iframe src="https://player.vimeo.com/video/12700851?title=0&byline=0&portrait=0" width="500"
                        height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div><!-- #video-container -->
            <a href="#" id="download-course" class="text-icon-block">
                <span>download course information</span>
                <img src="img/icons/download.png" alt=""/>
            </a>
        </div>
    </div><!-- #lifeguard-container -->
</div>