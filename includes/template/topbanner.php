<?php
$slider = table_fetch_rows('slider', 'status=1');
?>
<div class="slide-container">
    <div id="mainSlider" class="flexslider">
        <ul class="slides">
            <?php if (false == $slider) { ?>
                <li>
                    <img src="/public/img/banner1.jpg" alt=""/>
                    <div class="slide-text">
                        <p>Healthy, Interesting, Practical, Physical, Organised</p>
                    </div><!-- slide-text -->
                </li>
                <li>
                    <img src="/public/img/banner1.jpg" alt=""/>
                    <div class="slide-text">
                        <p>Content slider here content slider here content slider here</p>
                    </div><!-- slide-text -->
                </li>
            <?php } else {
                foreach ($slider as $s) {
                    $image = get_image('slider/'.$s['id']);
                    if(false == $image){
                        continue;
                    }
                    __('li');
                    __('img',false,false,array('src'=>$image));
                    __('div',false,'slide-text');
                    _t('p',$s['description']);
                    __('/div');
                    __('/li');
                }
            } ?>
        </ul>
    </div><!-- #mainSlider -->
</div><!-- slide-container -->