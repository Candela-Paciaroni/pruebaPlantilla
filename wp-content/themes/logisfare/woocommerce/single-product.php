<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
$customizer_ID = '_logisfare_customizer_options';


$shop_product_is_banner     = tw_get_option($customizer_ID, 'shop_product_is_banner', true);
$shop_product_banner_block  = tw_get_option($customizer_ID, 'shop_product_banner_block', -1);

$productID = get_the_ID();

if(class_exists('CSF')): 
    $pdMetaId = '_logisfare_product_meta';

    $shop_products_banner_enable  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_banner_enable', 2);

    if($shop_products_banner_enable == 1):
        $shop_products_is_banner    = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_banner', false);
        $shop_products_banner_block = tw_get_post_meta($productID, $pdMetaId, 'shop_products_banner_block', -1); 

        $shop_product_is_banner = ($shop_products_banner_enable == 1 && $shop_products_is_banner > 0 ? $shop_products_is_banner : $shop_product_is_banner);
        $shop_product_banner_block = ($shop_products_banner_enable == 1 && $shop_products_banner_block > 0 ? $shop_products_banner_block : $shop_product_banner_block);
    endif;
endif;

if($shop_product_is_banner == 1):
    if($shop_product_banner_block > 0):
        if(class_exists('Themewar_Builder')):
            Themewar_Builder::render_template($shop_product_banner_block);
        endif;
    else:
        get_template_part('template-parts/header/default', 'header');
    endif;
endif;

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php 
		wc_get_template_part( 'content', 'single-product' ); 
	?>
<?php endwhile; ?>

<?php
get_footer( 'shop' );  