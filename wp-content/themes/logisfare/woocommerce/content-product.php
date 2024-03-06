<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$customizer_ID = '_logisfare_customizer_options';

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

if (is_tax('product_cat') && class_exists('CSF')):

    $shop_sidebar   = tw_get_option($customizer_ID, 'shop_cats_sidebar', 3);
    $shop_col_xxl   = tw_get_option($customizer_ID, 'shop_cat_col_xxl', 2);
    $shop_col_xl    = tw_get_option($customizer_ID, 'shop_cat_col_xl', 2);
    $shop_col_lg    = tw_get_option($customizer_ID, 'shop_cat_col_lg', 2);
    $shop_col_md    = tw_get_option($customizer_ID, 'shop_cat_col_md', 2);
    $shop_col_sm    = tw_get_option($customizer_ID, 'shop_cat_col_sm', 1);
    $shop_grid_title_length = tw_get_option($customizer_ID, 'shop_cat_grid_title_length', 28);
    $shop_is_variations = tw_get_option($customizer_ID, 'shop_cat_is_variations', 1);
    $shop_is_flashlabels = tw_get_option($customizer_ID, 'shop_cat_is_flashlabels', 1);
   
elseif (is_tax('product_tag') && class_exists('CSF')):

    $shop_sidebar   = tw_get_option($customizer_ID, 'shop_tag_sidebar', 3);
    $shop_col_xxl   = tw_get_option($customizer_ID, 'shop_tag_col_xxl', 2);
    $shop_col_xl    = tw_get_option($customizer_ID, 'shop_tag_col_xl', 2);
    $shop_col_lg    = tw_get_option($customizer_ID, 'shop_tag_col_lg', 2);
    $shop_col_md    = tw_get_option($customizer_ID, 'shop_tag_col_md', 2);
    $shop_col_sm    = tw_get_option($customizer_ID, 'shop_tag_col_sm', 1);
    $shop_grid_title_length = tw_get_option($customizer_ID, 'shop_tag_grid_title_length', 28);
    $shop_is_variations     = tw_get_option($customizer_ID, 'shop_tag_is_variations', 1);
    $shop_is_flashlabels    = tw_get_option($customizer_ID, 'shop_tag_is_flashlabels', 1);
    
else:
    $shop_col_xxl   = tw_get_option($customizer_ID, 'shop_col_xxl', 2);
    $shop_col_xl    = tw_get_option($customizer_ID, 'shop_col_xl', 2);
    $shop_col_lg    = tw_get_option($customizer_ID, 'shop_col_lg', 2);
    $shop_col_md    = tw_get_option($customizer_ID, 'shop_col_md', 2);
    $shop_col_sm    = tw_get_option($customizer_ID, 'shop_col_sm', 1);
    $shop_grid_title_length = tw_get_option($customizer_ID, 'shop_grid_title_length', 28);
    $shop_is_variations     = tw_get_option($customizer_ID, 'shop_is_variations', 1);
    $shop_is_flashlabels    = tw_get_option($customizer_ID, 'shop_is_flashlabels', 1);
endif;


$productClass = '';
$productClass .= (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0 ? '' : ' pi01NoRating');


$_sale_price_dates_from = get_post_meta(get_the_ID(), '_sale_price_dates_from', true);
$_sale_price_dates_to = get_post_meta(get_the_ID(), '_sale_price_dates_to', true);

$terms = get_the_terms(get_the_ID(), 'product_cat');
$cats  = '';

if (is_array($terms) && count($terms) > 0){
    $p = 1;
    $c = count($terms);
    foreach ($terms as $term) {
        if($p > 1){break;};
        $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
        $p++;
    }
}

?>
<div class="col-xxl-<?php echo str_replace('.', '-', 12 / $shop_col_xxl); ?> col-xl-<?php echo str_replace('.', '-', 12 / $shop_col_xl); ?> col-lg-<?php echo str_replace('.', '-', 12 / $shop_col_lg); ?> col-md-<?php echo str_replace('.', '-', 12 / $shop_col_md); ?> col-sm-<?php echo str_replace('.', '-', 12 / $shop_col_sm); ?> logisfareProductCols">
    <div <?php wc_product_class('uiuxomProductWrapper', $product); ?>>
        <div class="productItem01 <?php echo esc_attr($productClass); ?>">
            <div class="pi01Thumb">
                <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>">
                <div class="pi01Actions">
                    <?php if(function_exists('logisfare_add_to_cart')){ logisfare_add_to_cart(); } ?>
                </div>
                <?php if($shop_is_flashlabels): ?>
                    <?php echo logisfare_product_flash_notice_label(get_the_ID()); ?>
                <?php endif; ?>
            </div>
            <div class="pi01Details">
                <h5>
                    <?php echo logisfare_kses($cats); ?> 
                </h5>
                <h3>
                    <a href="<?php echo get_the_permalink() ?>">
                        <?php 
                            if($shop_grid_title_length > 0 && strlen(wp_strip_all_tags(get_the_title())) > $shop_grid_title_length):
                                echo substr(wp_strip_all_tags(get_the_title()), 0, $shop_grid_title_length).'..';
                            else:
                                echo get_the_title();
                            endif;
                        ?>
                    </a>
                </h3>
                <div class="pi01Price">
                    <?php echo logisfare_kses($product->get_price_html()); ?>
                </div>
            </div>
        </div>
    </div>
</div>