<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );
$customizer_ID = '_logisfare_customizer_options';

$termObject = get_queried_object();
$termID = $termObject->term_id;

$shop_cat_is_banner     = tw_get_option($customizer_ID, 'shop_cat_is_banner', 1);
$shop_cat_banner_block  = tw_get_option($customizer_ID, 'shop_cat_banner_block', -1);

$shop_sidebar           = tw_get_option($customizer_ID, 'shop_cat_sidebar', 3);
$shop_is_count          = tw_get_option($customizer_ID, 'shop_cat_is_count', 1);
$shop_is_sort           = tw_get_option($customizer_ID, 'shop_cat_is_sort', 1);
$shop_is_view_toggler   = tw_get_option($customizer_ID, 'shop_cat_is_view_toggler', 1);
$shop_default_view      = tw_get_option($customizer_ID, 'shop_cat_default_view', 1);
$shop_cat_is_pagination = tw_get_option($customizer_ID, 'shop_cat_is_pagination', 2);
$shop_cat_pagi_align    = tw_get_option($customizer_ID, 'shop_cat_pagi_align', 1);
$shop_cat_top_bloks     = tw_get_option($customizer_ID, 'shop_cat_top_bloks', []);
$shop_cat_bottom_bloks  = tw_get_option($customizer_ID, 'shop_cat_bottom_bloks', []);



if(class_exists('CSF')){
    $Meta_ID = '_logisfare_porduct_cat';
    
    $shop_cats_is_settings = tw_get_term_meta($termID, $Meta_ID, 'shop_cats_is_settings', 2);
    if($shop_cats_is_settings == 1){

        $shop_cats_is_banner    = tw_get_term_meta($termID, $Meta_ID, 'shop_cats_is_banner', 2);
        $shop_cats_banner_block = tw_get_term_meta($termID, $Meta_ID, 'shop_cats_banner_block', -1);

        $shop_cat_is_banner     = ($shop_cats_is_settings == 1 && $shop_cats_is_banner == 1 ? $shop_cats_is_banner : $shop_cat_is_banner);
        $shop_cat_banner_block  = ($shop_cats_is_settings == 1 && $shop_cats_banner_block > 0 ? $shop_cats_banner_block : $shop_cat_banner_block);
    }

}

if($shop_cat_is_banner == 1):
    if($shop_cat_banner_block > 0):
        if(class_exists('Themewar_Builder')):
            Themewar_Builder::render_template($shop_cat_banner_block);
        endif;
    else:
        get_template_part('template-parts/header/default', 'header');
    endif;
endif;


$sectionClass = ($shop_sidebar != 1 && is_active_sidebar('sidebar-2') ? ' shopPageHasSidebar ' : '');
$colmnClass = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 'col-lg-12' : 'col-lg-8');


if (!empty($shop_cat_top_bloks)) {
    foreach ($shop_cat_top_bloks as $sb):
        if ($sb['top_block_ids'] != '' && $sb['top_block_ids'] != 'none' && $sb['top_block_ids'] > 0):
            Themewar_Builder::render_template($sb['top_block_ids']);
        endif;
    endforeach;
}


global $wp_query;
$maxPageNumber = $wp_query->max_num_pages;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$page = get_query_var('page') ? get_query_var('page') : 1;
$currentPage = $paged;
?>

<section class="shopPageSection <?php echo esc_attr($sectionClass); ?>">
    <div class="container">
        <?php if($shop_is_count || $shop_is_sort || $shop_is_view_toggler): ?>
            <div class="row shopAccessRow align-items-center">
                <div class="col-md-6">
                    <?php if(function_exists('woocommerce_result_count') && $shop_is_count): ?>
                        <?php woocommerce_result_count(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="shopAccessBar justify-content-end <?php if ($shop_is_view_toggler == false): ?>noTab<?php endif;?>">
                        <?php if(function_exists('woocommerce_catalog_ordering') && $shop_is_sort): ?>
                            <div class="sortNav">
                                <?php echo woocommerce_catalog_ordering(); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($shop_is_view_toggler): ?>
                        <ul class="nav productViewTabnav" id="productViewTab" role="tablist">
                            <li role="presentation">
                                <button class="<?php echo esc_attr(($shop_default_view == 2 ? 'active' : '')) ?>" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" data-aria-controls="list-tab-pane" data-aria-selected="<?php echo esc_attr(($shop_default_view == 2 ? 'true' : 'false')) ?>"><i class="logisfare-list-view"></i></button>
                            </li>
                            <li role="presentation">
                                <button class="<?php echo esc_attr(($shop_default_view != 2 ? 'active' : '')) ?>" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" data-aria-controls="grid-tab-pane" data-aria-selected="<?php echo esc_attr(($shop_default_view != 2 ? 'true' : 'false')) ?>"><i class="logisfare-grid-view"></i></button>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php if (is_active_sidebar('sidebar-2') && $shop_sidebar == 2): ?>
                <div class="col-lg-4">
                    <div class="shopSidebar">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="<?php echo esc_attr($colmnClass); ?>">
                <div class="row">
                    <div class="col-lg-12 wpc_all_notice_area">
                        <?php echo woocommerce_output_all_notices(); ?>
                    </div>
                </div>
                <?php if ($shop_is_view_toggler): ?>
                    <div class="tab-content productViewTabContent" id="productViewTabContent">
                        <div class="tab-pane <?php echo esc_attr(($shop_default_view != 2 ? 'show active' : '')) ?>" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                            <div class="row shopProductRow">
                                <?php if (woocommerce_product_loop()): ?>
                                    <?php if (wc_get_loop_prop('total')):
                                        while (have_posts()):
                                            the_post();
                                            do_action('woocommerce_shop_loop');
                                            wc_get_template_part('content', 'product');
                                        endwhile;
                                    endif; ?>
                                <?php else: ?>
                                    <?php do_action('woocommerce_no_products_found'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane <?php echo esc_attr(($shop_default_view == 2 ? 'show active' : '')) ?>" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="1">
                            <div class="row shopProductRow">
                                <?php if (woocommerce_product_loop()): ?>
                                    <?php if (wc_get_loop_prop('total')):
                                        while (have_posts()):
                                            the_post();
                                            do_action('woocommerce_shop_loop');
                                            wc_get_template_part('content-list', 'product');
                                        endwhile;
                                    endif;?>
                                <?php else: ?>
                                    <?php do_action('woocommerce_no_products_found'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                <div class="row shopProductRow shopPlainGridRow">
                    <?php if (woocommerce_product_loop()): ?>
                        <?php
                        if (wc_get_loop_prop('total')):
                            while (have_posts()):
                                the_post();
                                do_action('woocommerce_shop_loop');
                                wc_get_template_part('content', 'product');
                            endwhile;
                        endif;
                        ?>
                    <?php else: ?>
                        <?php do_action('woocommerce_no_products_found'); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($shop_cat_is_pagination == 1): ?>
                <div class="row shopPaginationRow">
                    <div class="col-lg-12">
                        <div class="logisfareShopCatPagination text-<?php echo esc_attr($shop_cat_pagi_align); ?>">
                            <?php echo woocommerce_pagination(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('sidebar-2') && $shop_sidebar == 3 || $shop_sidebar == ''): ?>
                <div class="col-lg-4">
                    <div class="shopSidebar">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php

if (!empty($shop_cat_bottom_bloks)) {
    foreach ($shop_cat_bottom_bloks as $sb):
        if ($sb['bottom_block_ids'] != '' && $sb['bottom_block_ids'] != 'none' && $sb['bottom_block_ids'] > 0):
            Themewar_Builder::render_template($sb['bottom_block_ids']);
        endif;
    endforeach;
}
get_footer( 'shop' );
