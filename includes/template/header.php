<?php
require_once dirname(__FILE__) . '/menu.php';
?>

<div class="blue-bar bar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/public/img/camp-hippo-logo.png" alt=""/>
        </a>
        <ul class="header-contact">
            <li>
                <div class="social">
                    <a href="<?php echo Site::facebook(); ?>" class="ico facebook"></a>
                    <a href="<?php echo Site::twitter(); ?>" class="ico twitter"></a>
                </div><!-- social -->
            </li>
            <li>
                <div class="contact-phone">
                    <a href="tel: <?php echo Site::jan_phone(); ?>"><span>Jan:</span><?php echo Site::jan_phone(); ?></a>
                    <a href="tel: <?php echo Site::gary_phone(); ?>"><span>Gary:</span><?php echo Site::gary_phone(); ?></a>
                </div><!-- contact-phone -->
            </li>
            <li>
                <div class="social mobile-social-header" style="display: none;">
                    <a href="<?php echo Site::facebook(); ?>" class="ico facebook"></a>
                    <a href="<?php echo Site::twitter(); ?>" class="ico twitter"></a>
                </div><!-- social -->
            </li>
        </ul><!-- header-contact -->
    </div>
</div><!-- blue-bar -->
<div class="red-bar bar">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php menu(); ?>
            </div><!-- #navbar .nav-collapse -->
        </div><!-- .container-fluid -->
    </nav><!-- .navbar -->
</div><!-- red-bar -->