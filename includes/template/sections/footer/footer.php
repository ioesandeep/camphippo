<div class="footer-inner">
    <div class="container">
        <img src="/public/img/footer-logo.png" class="footer-bottom-logo"/>
        <ul class="phone-footer ul-col-footer">
            <li class="ul-col-title">
                Phone:
            </li>
            <li>
                Jan: <a href="tel: <?php echo Site::jan_phone(); ?>"><?php echo Site::jan_phone(); ?></a>
            </li>
            <li>
                Gary: <a href="tel: <?php echo Site::gary_phone(); ?>"><?php echo Site::gary_phone(); ?></a>
            </li>
        </ul><!-- ul-col-footer -->
        <ul class="email-footer ul-col-footer">
            <li class="ul-col-title">
                Email:
            </li>
            <li>
                <?php echo Site::jan_email(); ?>
            </li>
            <li>
                <?php echo Site::gary_email(); ?>
            </li>
        </ul><!-- ul-col-footer -->
        <ul class="address-footer ul-col-footer">
            <li class="ul-col-title">
                Address:
            </li>
            <li>
                <?php echo Site::address(); ?>
            </li>
        </ul><!-- ul-col-footer -->
        <ul class="social-footer ul-col-footer">
            <li>
                <a href="<?php echo Site::facebook(); ?>" class="facebook ico"></a>
            </li>
            <li>
                <a href="<?php echo Site::twitter(); ?>" class="twitter ico"></a>
            </li>
        </ul><!-- ul-col-footer -->
    </div>
</div><!-- footer-inner -->