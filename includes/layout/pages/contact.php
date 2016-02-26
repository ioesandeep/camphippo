<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <?php
            _t('h1', $pageData['h1_title']);
            _e($pageData['content']);
            ?>
            <div class="email-tel">
                <div class="email-tel-column">
                    <span><?php _e(Lang::e() . ' ' . Site::email()); ?></span>
                </div><!-- email-tel-column -->
                <div class="email-tel-column">
                    <span><?php _e(Lang::t() . ' Jan ' . Site::jan_phone()); ?></span>
                    <span><?php _e(Lang::t() . ' Gary ' . Site::jan_phone()); ?></span>
                </div><!-- email-tel-column -->
            </div><!-- email-tel -->
            <form id="" name="" class="contactForm">
                <input type="text" id="" name="" placeholder="NAME" class="form-control"/>
                <input type="text" id="" name="" placeholder="EMAIL" class="form-control"/>
                <input type="text" id="" name="" placeholder="CONTACT NUMBER" class="form-control"/>
                <textarea id="" name="" placeholder="MESSAGE" class="form-control"></textarea>
                <button type="button" class="red-btn">submit</button>
            </form><!-- contactForm -->
        </div>
        <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
            <?php require_once TEMPLATE_PATH . '/sections/sidebar/camps.php'; ?>
        </div><!-- right-side-content -->
    </div><!-- #default-content-container -->
</div>