<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$customizer_ID = '_logisfare_customizer_options';

$shop_product_is_zoom       = tw_get_option($customizer_ID, 'shop_product_is_zoom', true);
$shop_product_is_flashlabel = tw_get_option($customizer_ID, 'shop_product_is_flashlabel', true);

$productID = $product->get_id();

if(class_exists('CSF')): 
    $pdMetaId = '_logisfare_product_meta';

    $shop_products_contnet_enable  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_contnet_enable', 2);

    if ($shop_products_contnet_enable == 1):
        
        $shop_products_is_zoom  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_zoom', 2);
        $shop_products_is_flashlabel  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_flashlabel', 2);
        
       
        $shop_product_is_zoom = ( $shop_products_is_zoom > 0 ? ($shop_products_is_zoom == 1 ? true : false) : $shop_product_is_zoom);
        $shop_product_is_flashlabel = ( $shop_products_is_flashlabel > 0 ? ($shop_products_is_flashlabel == 1 ? true : false) : $shop_product_is_flashlabel);
    endif;
endif;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
$attachment_ids = $product->get_gallery_image_ids();
$gallery_status = (empty($attachment_ids) ? 1 : 2);
if(has_post_thumbnail() && empty($attachment_ids)):
    array_unshift($attachment_ids, $post_thumbnail_id);
endif;

    $w = 'full';
    $h = '';

    $thm_w = '';
    $thm_h = 85;
    ?>
    <div class="productGalleryWrap">
        <div class="productGallery">
            <?php
                foreach($attachment_ids as $attachment_id):
                    if($attachment_id > 0):
                        ?>
                        <div class="pgImagewrap">
                            <div class="pgImage">
                                <img src="<?php echo logisfare_attachment_url($attachment_id, $w, $h ) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                                <?php if($shop_product_is_zoom == true): ?>
                                    <a class="pdImageZoom popup_image" href="<?php echo logisfare_attachment_url($attachment_id, 'full') ?>"><i class="themewar_magnifying-glass"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php 
                    endif;
                endforeach;
            ?>
        </div>
        <div class="productGalleryThumbWrap">
            <div class="productGalleryThumb">
                <?php
                    foreach($attachment_ids as $attachment_id):
                        if($attachment_id > 0):
                            ?>
                            <div class="pg_thumbsWrap">
                                <div class="pg_thumbs">
                                    <img src="<?php echo logisfare_attachment_url($attachment_id, $thm_w, $thm_h) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                                </div>
                            </div>
                            <?php 
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
        <?php if($shop_product_is_flashlabel): ?>
            <?php echo logisfare_product_flash_notice_label($product->get_id()); ?>
        <?php endif; ?>
    </div>