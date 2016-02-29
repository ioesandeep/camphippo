<?php
$path = $rewriteData['table_name'] . '/' . $rewriteData['table_id'];
$banner_image = get_image($path);
if (empty($banner_image)) {
    $banner_image = '/public/img/lifeguarding-banner.jpg';
}
__('img', false, 'banner-image', array('src' => $banner_image));
?>