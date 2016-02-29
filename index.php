<?php
require_once dirname(__FILE__) . '/includes/initialize.php';
require_once dirname(__FILE__) . '/includes/layout/normal.php';
ob_start();
doctype('html5');

__('html');
__('head');
    require_once dirname(__FILE__) . '/includes/template/head.php';
__('/head');
__('body');
    __('div', false, 'container-fluid main-container');
        __('section','main');
            require_once dirname(__FILE__) . '/includes/template/header.php';
        __('/section');
        __('section','main2');
            if($url == '/home.html'){
                require_once dirname(__FILE__) . '/includes/template/topbanner.php';
            } elseif($banner == true){
                require_once dirname(__FILE__) . '/includes/template/page-banner.php';
            }
            __('div',false,'container');
                require_once dirname(__FILE__) . '/includes/layout/pages/'.$include.'.php';
            __('/div');
        __('/section');
        __('section','main3');
            require_once dirname(__FILE__) . '/includes/template/footer.php';
        __('/section');
    __('/div');
    require_once dirname(__FILE__) . '/includes/template/scripts.php';
__('/body');
__('/html');
$response = ob_get_contents();
ob_end_clean();

//minify the output
echo ENV == 'production' ? preg_replace( array('/ {2,}/','/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'),array(' ',''),$response) : $response;