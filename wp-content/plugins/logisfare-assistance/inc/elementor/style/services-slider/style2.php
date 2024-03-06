<?php
global $wp_query;
$paged = (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page')  ? get_query_var('page') : 1));
$sers = array(
    'post_type'         => 'service',
    'post_status'       => 'publish',
    'posts_per_page'    => $serv_post_item,
    'orderby'           => $serv_order_by,
    'order'             => $serv_order,
    'paged'             => $paged,
);
if($serv_post_offset > 0){
    $sers['offset']   = $serv_post_offset;
}

if (($key = array_search(0, $serv_specific)) !== false) {
    unset($serv_specific[$key]);
}
if(!empty($serv_specific)){
    $sers['post__in'] = $serv_specific;
}

$wp_query = new WP_Query($sers);
if($wp_query->have_posts()):
    ?>
    <div class="row serviceWrapp03 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
        <div class="col-lg-4 col-md-12">
            <div class="serviceDesc01">            
                <h3 class="subTitle"><?php echo esc_html($serv_sec_subtitle); ?><i  aria-hidden="true" class="<?php echo esc_attr('logisfare-right_sec','themewar'); ?>"></i></h3>
                <h2 class="secTitle"><?php echo esc_html($serv_sec_title); ?></h2>
                <p><?php echo logisfare_kses($serv_sec_desc); ?></p>
                <?php if($nav == 'yes'): ?>
                    <div class="serviceControls">
                        <button class="tprev"><i class='<?php echo esc_attr('themewar_arrow-left', 'themewar'); ?>'></i></button>
                        <span id="counterSlide"><ins><?php echo esc_html('01', 'themewar'); ?></ins> <?php echo esc_html('/ 05', 'themewar'); ?></span>
                        <button class="tnext"><i class='<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>'></i></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="serviceSliderWrapp"
                data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
                data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
                data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
                data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
                
                data-itemxxl="<?php echo esc_attr($items_xxl_col); ?>"
                data-itemxl="<?php echo esc_attr($items_xl_col); ?>"
                data-itemlg="<?php echo esc_attr($items_lg_col); ?>"
                data-itemmd="<?php echo esc_attr($items_md_col); ?>"
                data-itemsm="<?php echo esc_attr($items_sm_col); ?>"
                
                data-gapping="<?php echo esc_attr($gapping); ?>"
            >
                <div class="serviceCarousel02 owl-carousel "> 
                    <?php 
                    while($wp_query->have_posts()):
                        $wp_query->the_post();
                        $_service_excerpt = '';
                        $_service_meta    = '';

                        if(class_exists('CSF')){
                            $Section_ID = '_service_meta';
                            $_service_excerpt = tw_get_post_meta(get_the_ID(), $Section_ID, 'service_excerpt', '');
                            $_service_icon   = tw_get_post_meta(get_the_ID(), $Section_ID, 'service_icon', array());
                        }   
                    ?> 
                        <div class="singleService <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                            <div class="serviceThumb <?php echo esc_attr($class); ?>">
                                <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 391, 257); ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="serviceContent">
                                <div class="serConIcon">
                                    <span>
                                        <?php 
                                            if(!empty($_service_icon)){
                                                echo "<i class=".$_service_icon."></i>";
                                            }; 
                                        ?>
                                    </span>
                                </div>
                                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_strip_all_tags(get_the_title()); ?></a></h4>
                                <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($serv_btn_lable); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>"></i></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;
wp_reset_query();
