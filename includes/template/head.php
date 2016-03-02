<title><?php echo isset($title) ? $title : 'Camp Hippo'; ?></title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link href="/public/css/bootstrap.css" rel="stylesheet" media="screen"/>
<link href="/public/css/style.css" rel="stylesheet" media="screen"/>
<link href="/public/css/flexslider.css" rel="stylesheet" media="screen"/>
<link href="/public/css/responsive.css" rel="stylesheet" type="text/css"/>

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,700' rel='stylesheet' type='text/css'/>
<link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>

<?php if (!empty($styles)) {
    foreach ($styles as $style) {
        $uri = '/public/css/' . $style;
        __('link', false, false, array('type' => 'text/css', 'rel' => 'stylesheet', 'href' => $uri));
    }
} ?>

<!-- End Google Fonts -->
<style type="text/css">
    .banner-image {
        width: 100%;
        padding: 0 30px;
        height: 270px;
        overflow: hidden
    }
</style>
<script type="text/javascript" src="/public/js/jquery-1.11.3.min.js"></script>
<?php if (!empty($scripts)) {
    foreach ($scripts as $script) {
        $uri = '/public/js/' . $script;
        _t('script', '', array('src' => $uri, 'type' => 'text/javascript'));
    }
} ?>