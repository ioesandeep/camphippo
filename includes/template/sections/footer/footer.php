<div class="footer-inner">
    <div class="container">
        <img src="/public/img/footer-logo.png" class="footer-bottom-logo"/>
        <ul class="phone-footer ul-col-footer">
            <li class="ul-col-title">
                <?php _e(Lang::phone()); ?>
            </li>
            <li>
                <?php _e(Lang::jan()); ?>
                <a href="tel: <?php _e(Site::jan_phone()); ?>"><?php _e(Site::jan_phone()); ?></a>
            </li>
            <li>
                <?php _e(Lang::gary()); ?>
                <a href="tel: <?php _e(Site::gary_phone()); ?>"><?php _e(Site::gary_phone()); ?></a>
            </li>
        </ul><!-- ul-col-footer -->
        <?php

        //email column
        __('ul', false, 'email-footer ul-col-footer');
        _t('li', Lang::email(), array('class' => 'ul-col-title'));
        _t('li', Site::jan_email());
        _t('li', Site::gary_email());
        __('/ul');

        //address column
        __('ul', false, 'address-footer ul-col-footer');
        _t('li', Lang::address(), array('class' => 'ul-col-title'));
        _t('li', Site::address());
        __('/ul');

        //social icons column
        __('ul', false, 'social-footer ul-col-footer');

        __('li');
        _t('a', null, array('href' => Site::facebook(), 'class' => 'facebook ico'));
        __('/li');

        __('li');
        _t('a', null, array('href' => Site::twitter(), 'class' => 'twitter ico'));
        __('/li');

        __('/ul');
        ?>
    </div>
</div><!-- footer-inner -->