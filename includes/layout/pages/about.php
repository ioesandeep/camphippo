<?php
$people = table_fetch_rows('page', sprintf('parent_id="%d"', $pageData['id']));
?>
<div class="row">
    <div id="content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <?php
                    _t('h1', $pageData['h1_title']);
                    _e($pageData['content']);
                    ?>
                </div>
                <?php if (false != $people) {
                    __('div', false, "col-md-4 col-sm-4 col-xs-12 owner");
                    foreach ($people as $p) {
                        __('div', false, 'thumbnail owner-block');
                        __('img', false, 'img-responsive center-block', array('src' => '.' . get_image('page/' . $p['id'].'-header-image')));
                        _t('h3', $p['h1_title']);
                        __('/div');
                    }
                    __('/div');
                    ?>
                <?php } ?>
            </div><!-- owner -->
        </div>
        <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
            <?php require_once TEMPLATE_PATH . '/sections/sidebar/camps.php'; ?>
        </div><!-- right-side-content -->
    </div>
</div><!-- #content-container -->
</div>