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
    <div class="row serviceGridWrapp">
        <?php 
        $a = 1;
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
        <div class="col-xxl-<?php echo str_replace('.', '-', 12 / $grid_xxl_col); ?> col-xl-<?php echo str_replace('.', '-', 12 / $grid_xl_col); ?> col-lg-<?php echo str_replace('.', '-', 12 / $grid_lg_col); ?> col-md-<?php echo str_replace('.', '-', 12 / $grid_md_col); ?> col-sm-<?php echo str_replace('.', '-', 12 / $grid_sm_col)?>"> 
        <?php 
            $animAttr = '';
            $animClass = '';
            if($is_animation == 'yes' && $animation_name !='none'){
                $animClass = ' enable_animation aos-animate';
                $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
                $animation_duration = ($a== 1 ? $animation_duration : ($animation_duration + $animation_duration_inc));
                $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
                $animation_delay = ($a== 1 ? $animation_delay : ($animation_delay + $animation_delay_inc));
                $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
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
        </div>
        <?php $a++; endwhile; ?>
    </div>
    
    <?php if($is_pagination == 'yes'): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="servPagePagination text-<?php echo $pagination_alignment; ?>">
                <?php
                    the_posts_pagination(
                        array(
                            'prev_text'        => logisfare_kses('<i class="logisfare-arrow_prev"></i>'),
                            'next_text'        => logisfare_kses('<i class="logisfare-arrow_next"></i>'),
                            'before_page_number' => '',
                            'class'            => 'logisfarePagination'
                        )
                    );
                ?>
            </div>
        </div>  
    </div>
    <?php endif; ?>
    <?php
endif;
wp_reset_query();
