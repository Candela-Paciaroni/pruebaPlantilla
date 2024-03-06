<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<div class="pwItems">
            <div class="pwItemsThumb">
                <img src="<?php echo logisfare_post_thumbnail($product->get_id(), 'full'); ?>" alt="<?php esc_attr(the_title_attribute()); ?>">
            </div>
            <?php if ( ! empty( $show_rating ) && $product->get_average_rating() > 0) : ?>
                    <div class="productRatingWrap">
                            <?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
            <?php endif; ?>
            <h3>
                <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
                    <?php echo logisfare_kses( $product->get_name() ); ?>
                </a>
            </h3>
            <div class="pi01Price">
                    <?php echo logisfare_kses($product->get_price_html()); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
	</div>
	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
