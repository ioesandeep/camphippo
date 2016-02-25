<?php
$data = table_fetch_rows('page', sprintf('parent_id="%d"', $pageData['id']));
if (false == $data) {
    return;
}
function numToStr($index)
{
    $container = array('one', 'two', 'three', 'four');
    return isset($container[$index]) ? $container[$index] : null;
}

?>
<div class="row menu-image-container">
    <?php
    foreach ($data as $k => $d) {
        $cat = table_fetch_row('page', sprintf('parent_id=%d and LOWER(menu_title)="%s"', -1, $d['menu_title']));
        if (false == $cat) {
            continue;
        }
        $uri = getRewriteUrl('page', $cat['id']);
        ?>

        <div class="menu-image-columns menu-<?php _e(numToStr($k)); ?>">
            <div class="menu-image"></div>
            <div class="menu-text">
                <a href="<?php _e($uri); ?>">
                    <?php
                    _t('h2', ucwords($d['h1_title']));
                    _e($d['content']);
                    ?>
                    <img src="/public/img/icons/info.png" alt=""/>
                </a>
            </div>
        </div>
        <?php
    }
    ?>
</div>