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
    $shop_list_desc_length = tw_get_option($customizer_ID, 'shop_cat_list_desc_length', 71);
    $shop_is_flashlabels = tw_get_option($customizer_ID, 'shop_cat_is_flashlabels', 1);

elseif (is_tax('product_tag') && class_exists('CSF')):
    
    $shop_sidebar   = tw_get_option($customizer_ID, 'shop_tag_sidebar', 3);
    $shop_col_xxl   = tw_get_option($customizer_ID, 'shop_tag_col_xxl', 2);
    $shop_col_xl    = tw_get_option($customizer_ID, 'shop_tag_col_xl', 2);
    $shop_col_lg    = tw_get_option($customizer_ID, 'shop_tag_col_lg', 2);
    $shop_col_md    = tw_get_option($customizer_ID, 'shop_tag_col_md', 2);
    $shop_col_sm    = tw_get_option($customizer_ID, 'shop_tag_col_sm', 1);
    $shop_list_desc_length = tw_get_option($customizer_ID, 'shop_tag_list_desc_length', 71);
    $shop_is_flashlabels = tw_get_option($customizer_ID, 'shop_tag_is_flashlabels', 1);
    
else:
    $shop_sidebar   = tw_get_option($customizer_ID, 'shop_sidebar', 3);
    $shop_col_xxl = tw_get_option($customizer_ID, 'shop_col_xxl', 2);
    $shop_col_xl = tw_get_option($customizer_ID, 'shop_col_xl', 2);
    $shop_col_lg = tw_get_option($customizer_ID, 'shop_col_lg', 2);
    $shop_col_md = tw_get_option($customizer_ID, 'shop_col_md', 2);
    $shop_col_sm = tw_get_option($customizer_ID, 'shop_col_sm', 1);
    $shop_default_view = tw_get_option($customizer_ID, 'shop_default_view', 1);
    $shop_list_desc_length = tw_get_option($customizer_ID, 'shop_list_desc_length', 71);
    $shop_is_flashlabels = tw_get_option($customizer_ID, 'shop_is_flashlabels', 1);
endif;


$colmnClass = ($shop_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 'col-lg-6' : 'col-lg-12');
$contentLimit = ($shop_list_desc_length > 0 ? $shop_list_desc_length : '');

$theExcerptContent = '';
if(has_excerpt()):
    $theExcerpt = wp_strip_all_tags(get_the_excerpt());
    $theCutExcerpt = $theExcerpt;
    if (preg_match('/^.{1,'.$contentLimit.'}\b/s', $theExcerpt, $myMatch)):
        $theCutExcerpt = $myMatch[0].'...';
    endif;
    $theExcerptContent = $theCutExcerpt;
endif;

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

<div class="col-sm-12 <?php echo esc_attr($colmnClass); ?>">
    <div <?php wc_product_class('uiuxomProductWrapper', $product); ?>>
        <div class="productSinList01 clearfix">
            <div class="row">
                <div class="col-md-6">
                    <div class="pi01Thumb">
                        <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>">
                        <?php if($shop_is_flashlabels): ?>
                            <?php echo logisfare_product_flash_notice_label(get_the_ID()); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pi01Details">
                        <h5>
                            <?php echo logisfare_kses($cats); ?> 
                        </h5>
                        <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                        <div class="pi01Price">
                            <?php echo logisfare_kses($product->get_price_html()); ?>
                        </div>
                        <?php if(!empty($theExcerptContent)): ?>
                        <div class="pi01Desc">
                            <?php echo logisfare_kses($theExcerptContent); ?>
                        </div>
                        <?php endif; ?>
                        <div class="pi01Actions">
                            <?php if(function_exists('logisfare_add_to_cart')){ logisfare_add_to_cart(); } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>