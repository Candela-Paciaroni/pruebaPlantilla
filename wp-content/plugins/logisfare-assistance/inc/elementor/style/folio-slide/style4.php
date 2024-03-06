<?php

if (($key = array_search(0, $pfs_category)) !== false) {
    unset($pfs_category[$key]);
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
if(!empty($pfs_category)):
    $cat_args['include'] = $pfs_category;
endif;
$categories = get_categories( $cat_args );

global $wp_query;
$paged = (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page')  ? get_query_var('page') : 1));
$fargs = array(
    'post_type'         => 'folio',
    'post_status'       => 'publish',
    'posts_per_page'    => $pfs_post_item,
    'orderby'           => $pfs_order_by,
    'order'             => $pfs_order,
    'paged'             => $paged
);
if($pfs_post_offset > 0){
    $fargs['offset']   = $pfs_post_offset;
}
if(!empty($pfs_category)){
    $fargs['tax_query']   = array(
        'relation'      => 'AND', 
        array(
            'taxonomy'  => 'folio_cat', 
            'field'     => 'id', 
            'terms'     => $pfs_category,
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
        <div class="folioSliderWrapper <?php echo $animClass; ?>" <?php echo $animAttr; ?>
            data-autoplay="<?php echo($autoplay == 'yes' ? '1' : '0'); ?>"
            data-loop="<?php echo($loop == 'yes' ? '1' : '0'); ?>"
            data-nav="<?php echo($nav == 'yes' ? '1' : '0'); ?>"
            data-dots="<?php echo($dots == 'yes' ? '1' : '0'); ?>"
            
            data-gapping="<?php echo esc_attr($item_gapping); ?>"
            
            data-itemxxl="<?php echo esc_attr($item_per_row_01); ?>"
            data-itemxl="<?php echo esc_attr($item_per_row_1); ?>"
            data-itemlg="<?php echo esc_attr($item_per_row_2); ?>"
            data-itemmd="<?php echo esc_attr($item_per_row_3); ?>"
            data-itemsm="<?php echo esc_attr($item_per_row_4); ?>"
         >
            <div class="collectionSlider owl-carousel">
                <?php 
                while($wp_query->have_posts()):
                    $wp_query->the_post();
                    
                    $terms  = get_the_terms(get_the_ID(), 'folio_cat');
                    $cats   = '';
                    if (is_array($terms) && count($terms) > 0){
                        $p = 1;
                        $c = count($terms);
                        foreach ($terms as $term){
                            if($p > 1){break;};
                            $cats .='<a class="collTag" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                            $cats .= ($p != $c && $p < 1 ? '<span></span>' : '');
                            $p++;
                        }
                    }

                    $w = 806;
                    $h = 520;

                    ?>
                        <div>
                            <div class="collSingleItem">
                                <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                <div class="collCat">
                                    <h4>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_item_length ); ?></a>
                                    </h4>
                                    <?php if(!empty($cats)): ?>
                                        <?php echo logisfare_kses($cats); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="collShape">
                                    <img class="cols01" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/ibSecLeft.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <img class="cols02" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/tsShap02.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                </div>
                                <a href="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" class="viewColl popup_image"><i class="<?php echo esc_attr('themewar_eye', 'themewar'); ?>"></i></a>
                            </div>
                        </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; wp_reset_query(); ?>
               