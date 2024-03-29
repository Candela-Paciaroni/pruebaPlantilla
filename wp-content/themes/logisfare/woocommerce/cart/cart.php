<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="row">
    <div class="col-lg-12">
        <?php do_action( 'woocommerce_before_cart' ); ?>
    </div>
</div>
<div class="row cartRow">
    <div class="col-lg-12">
        <div class="cartHeader">
            <h3><?php echo esc_html__('Your Cart Items', 'logisfare'); ?></h3>
        </div>
    </div>
    <div class="col-lg-12">
        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <?php do_action( 'woocommerce_before_cart_table' ); ?>
                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents cart_table cartTemplate" cellspacing="0">
                        <thead>
                                <tr>
                                        <th class="product-thumbnail"><?php esc_html_e( 'Item Name', 'logisfare' ); ?></th>
                                        <th class="product-name">&nbsp;</th>
                                        <th class="product-price"><?php esc_html_e( 'Price', 'logisfare' ); ?></th>
                                        <th class="product-quantity"><?php esc_html_e( 'Quantity', 'logisfare' ); ?></th>
                                        <th class="product-subtotal"><?php esc_html_e( 'Total', 'logisfare' ); ?></th>
                                        <th class="product-remove">&nbsp;</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                                <?php
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                ?>
                                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                        <td class="product-thumbnail">
                                                            <?php
                                                                $thumbnail = '<img src="'. logisfare_attachment_url($_product->get_image_id(), 'full').'" alt="'.esc_attr($_product->get_name()).'"/>';

                                                                if ( ! $product_permalink ) {
                                                                        echo esc_html($thumbnail); // PHPCS: XSS ok.
                                                                } else {
                                                                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                                                }
                                                            ?>
                                                        </td>

                                                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'logisfare' ); ?>">
                                                            <?php
                                                                if ( ! $product_permalink ) {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                                                } else {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                                }

                                                                do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                                // Meta data.
                                                                echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                                                // Backorder notification.
                                                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'logisfare' ) . '</p>', $product_id ) );
                                                                }
                                                            ?>
                                                        </td>

                                                        <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'logisfare' ); ?>">
                                                                <?php
                                                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                                ?>
                                                        </td>

                                                        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'logisfare' ); ?>">
                                                        <?php
                                                        if ( $_product->is_sold_individually() ) {
                                                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                        } else {
                                                                $product_quantity = woocommerce_quantity_input(
                                                                        array(
                                                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                                'input_value'  => $cart_item['quantity'],
                                                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                                                'min_value'    => '0',
                                                                                'product_name' => $_product->get_name(),
                                                                        ),
                                                                        $_product,
                                                                        false
                                                                );
                                                        }

                                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                                        ?>
                                                        </td>

                                                        <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'logisfare' ); ?>">
                                                                <?php
                                                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                                ?>
                                                        </td>
                                                        <td class="product-remove">
                                                                <?php
                                                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                                'woocommerce_cart_item_remove_link',
                                                                                sprintf(
                                                                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span></span></a>',
                                                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                                        esc_html__( 'Remove this item', 'logisfare' ),
                                                                                        esc_attr( $product_id ),
                                                                                        esc_attr( $_product->get_sku() )
                                                                                ),
                                                                                $cart_item_key
                                                                        );
                                                                ?>
                                                        </td>
                                                </tr>
                                                <?php
                                        }
                                }
                                ?>

                                <?php do_action( 'woocommerce_cart_contents' ); ?>

                                <tr class="actions">
                                    <td colspan="2" class="text-start"> 
                                        <a href="<?php echo wc_get_page_permalink( 'shop' ) ?>" class="logicBtn"><span><?php esc_html_e('Continue Shopping', 'logisfare') ?></span></a>
                                    </td>
                                    <td colspan="4" class="text-end">
                                        <button type="submit" class="button logicBtn" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'logisfare' ); ?>"><?php esc_html_e( 'Update cart', 'logisfare' ); ?></button>

                                        <?php do_action( 'woocommerce_cart_actions' ); ?>

                                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?> 
                                        <a href="<?php echo add_query_arg( 'clear-cart', '', wc_get_cart_url() ); ?>" class="logicBtn"><?php esc_html_e('Clear All', 'logisfare') ?></a>  
                                    </td>
                                </tr>

                                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                        </tbody>
                </table>
                <?php do_action( 'woocommerce_after_cart_table' ); ?>
        </form>
        <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
        <div class="row cartAccessRow">
            <div class="col-md-6 col-lg-5">
                <?php if ( wc_coupons_enabled() ) { ?>
                    <div class="cartCoupon">
                        <form method="post" action="#" id="cartCouponForm">
                            <h3><?php esc_html_e( 'Have A Coupon Code?', 'logisfare' ); ?></h3>
                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'logisfare' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'logisfare' ); ?>"><?php esc_attr_e( 'Apply coupon', 'logisfare' ); ?></button>
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-2 d-none d-lg-block"></div>
            <div class="col-md-6 col-lg-5 off ">
                <div class="cart-collaterals">
                        <?php
                                /**
                                 * Cart collaterals hook.
                                 *
                                 * @hooked woocommerce_cross_sell_display
                                 * @hooked woocommerce_cart_totals - 10
                                 */
                                do_action( 'woocommerce_cart_collaterals' );
                        ?>
                </div>
            </div>
        </div>

        <?php do_action( 'woocommerce_after_cart' ); ?>
    </div>
</div>
