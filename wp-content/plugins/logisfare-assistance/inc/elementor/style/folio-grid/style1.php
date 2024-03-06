<?php

if (($key = array_search(0, $folio_category)) !== false) {
    unset($folio_category[$key]);
}
if (($key = array_search(0, $pfs_folio)) !== false) {
    unset($pfs_folio[$key]);
}
    
$cat_args = array(
    'orderby'       => 'ID',
    'order'         => 'DESC', 
    'hide_empty'    => 1,
    'hierarchical'  => 1,
    'taxonomy'      => 'folio_cat'
);
if(!empty($folio_category)):
    $cat_args['include'] = $folio_category;
endif;
$categories = get_categories( $cat_args );

if($is_filter == 'yes' && !empty($categories)):?>
    <div class="row">
        <div class="col-md-12">
            <div class="projectCat_area">
                <ul class="folio_nav openHoverCursor shaf_filter projectCategories clearfix text-<?php echo esc_attr($filtr_alignment); ?>">
                    <?php if(!empty($filter_all_label)): ?>
                        <li class="active" data-group="all"><?php echo $filter_all_label; ?></li>
                    <?php 
                    endif;
                        foreach($categories as $cat):
                        ?>
                            <li data-group="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></li>
                        <?php endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;

    global $wp_query;
    $paged = (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page')  ? get_query_var('page') : 1));
    $fargs = array(
        'post_type'         => 'folio',
        'post_status'       => 'publish',
        'posts_per_page'    => $folio_post_item,
        'orderby'           => $folio_order_by,
        'order'             => $folio_order,
        'paged'             => $paged
    );
    if($folio_item_offset > 0){
        $fargs['offset']   = $folio_item_offset;
    }
    if(!empty($folio_category)){
        $fargs['tax_query']   = array(
            'relation'      => 'AND', 
            array(
                'taxonomy'  => 'folio_cat', 
                'field'     => 'id', 
                'terms'     => $folio_category,
                'operator'  => 'IN'
            )
        );
    }
    if(!empty($pfs_folio)){
        $fargs['post__in'] = $pfs_folio;
    }

    $wp_query = new WP_Query($fargs);
    if($wp_query->have_posts()): 
        ?>
        <div class="projectGallery">
            <div class="row <?php echo ($is_filter == 'yes' || $is_masonry == 'yes' ? 'shafull_container' : '') ?>">
                <?php 
                    $i = 1;
                    $a = 1;
                    $class = ($is_filter == 'yes' || $is_masonry == 'yes' ? 'shaf_item' : '');
                    $arr_h = [2, 4, 5, 6, 7, 10, 12, 14, 15, 16, 17, 20, 22, 24, 25, 26, 27, 30];
                    while($wp_query->have_posts()):
                        $wp_query->the_post();

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
                        
                        $terms  = get_the_terms(get_the_ID(), 'folio_cat');
                        $cats   = '';
                        $groups = '["all", ';
                        if (is_array($terms) && count($terms) > 0){
                            $p = 1;
                            $g = 1;
                            $c = count($terms);
                            foreach ($terms as $term){
                                if($p > 2){break;};
                                $cats .='<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                                $cats .= ($p != $c && $p < 2 ? '<span></span>' : '');
                                $p++;
                            }
                            foreach ($terms as $termg){
                                $groups .= '"'.$termg->slug.'"';
                                $groups .= ($g != $c ? ', ' : '');
                                $g++;
                            }
                        }
                        $groups .= ']';
                ?>
                    <div data-groups='<?php echo ($is_filter == 'yes' || $is_masonry == 'yes' ? $groups : '') ?>' class="<?php echo esc_attr($class) ?> col-xxl-<?php echo round(12 / $grid_xxl_col); ?> col-xl-<?php echo round(12 / $grid_xl_col); ?> col-lg-<?php echo round(12 / $grid_lg_col); ?> col-md-<?php echo round(12 / $grid_md_col); ?> col-sm-<?php echo round(12 / $grid_sm_col); ?>">
                        <?php
                            $w = ($logis_thumb_width > 0 ? $logis_thumb_width : 387);
                            if($is_masonry == 'yes'):
                                $h = (in_array($i, $arr_h) ? 323 : 500);
                            else:
                                $h = ($logis_thumb_height > 0 ? $logis_thumb_height : 500);
                            endif;
                        ?>
                            <div class="mix project_item <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                                <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                <a href="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" class="projectShow popup_image"><i class="<?php echo esc_attr('themewar_eye', 'themewar'); ?>"></i></a>
                                <div class="projectContent">
                                    <div class="projectCat02">
                                        <?php if(!empty($cats)): ?>
                                            <?php echo logisfare_kses($cats); ?>
                                        <?php endif; ?>
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_item_length ); ?></a>
                                    </h3>
                                </div>
                                <span class="projectrCircle"></span>
                            </div>
                        </div>
                        <?php
                        $i++; $a++;
                endwhile; 
                ?>
                <?php if($is_filter == 'yes' || $is_masonry == 'yes' ): ?><div class="col-md-1 col-lg-1 col-xl-1 shaf_sizer"></div><?php endif; ?>
            </div>
        </div>
        <?php if($is_pagination == 'yes'): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="folioPagePagination text-<?php echo $pagination_alignment; ?>">
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
    <?php endif; wp_reset_query(); ?>
               