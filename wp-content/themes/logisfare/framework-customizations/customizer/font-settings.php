<?php
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Typography Setting', 'logisfare'),
        'priority' => 2,
        'fields' => array(
            array(
                'type'    => 'heading',
                'content' => esc_html__('Primary Typography', 'logisfare'),
            ),
            array(
                'id'            => 'primary_fonts',
                'type'          => 'typography',
                'title'         => esc_html__( 'Primary Typography', 'logisfare' ),
                'font_weight'   => true,
                'text_align'    => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'color'     => false,
                'subset'    => false,
                'font_style' => false,
                'font_size' => false,
                'line_height' => false,
                'default'     => array(
                    'font-family'    => 'Figtree',
                    'font-weight'    => '400'
                ),
                'output'      => array('body'),
            ),
            array(
                'type'    => 'submessage',
                'style'   => 'normal',
                'content' => esc_html__('Primary typography by default effect on each element under body excepts some special elements those are under Secondary Typography.', 'logisfare'),
              ),


            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Secondary Typography', 'logisfare'),
            ),  
            array(
                'id'            => 'secondary_fonts',
                'type'          => 'typography',
                'title'         => esc_html__( 'Secondary Typography', 'logisfare' ),
                'font_weight'   => true,
                'text_align'    => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'font_size' => false,
                'color'     => false,
                'subset'    => false,
                'default'     => array(
                    'font-family'   => 'Catamaran',
                    'font-weight'    => '700'
                ),
                'output'      => array( 'h1, h2, h3, h4, h5, h6, button, .logisBtn, .logo a.textLogo, .mainMenu > ul li a, .aboutCountItem h2, .teamContent p, .iconBox03 p, .testimonialItem01 .tsAuthor02 span, .woocommerce .return-to-shop a.button.wc-backward, .woocommerce .woocommerce-message a.button.wc-forward, .woocommerce .woocommerce-error a.button.wc-forward, .woocommerce-mini-cart__buttons.buttons a, .cartWidgetArea .total, .pdTitle_wrap a, .teamItem02 p, .tesAuthor span, .bpContent02 .bpDate h4, .bpContent02 .btnLink, .fanItem01 p, .teamContent03 p, .ctacall p, .blogItem03 .biBlog03, .breadcrumbs, .breadcrumbs span, .logicAuthor p, .abJobCount p, .historyNavTab .nav-link, .historyContent .btnLink, .logisfareAcordion .accordion-button, .cartWidgetProduct a, .totalPrice, .cartWidgetBTN a, .woocommerce div.product.productContainerWrap .groupdThumbTitle a, .myAccountNavigation ul li a, .myAccountPages p strong, .myAccountPages p a, .woocommerce div.product.productContainerWrap .woocommerce-variation-price .price, .woocommerce div.product.productContainerWrap p.stock, .woocommerce div.product.productContainerWrap form.cart .variations .variationItem .label, .woocommerce .shop_table.cart_table thead tr th, .woocommerce table.shop_table.wishlist_table thead tr th, .woocommerce .shop_table.cart_table tbody tr td.product-name a, .woocommerce table.shop_table.wishlist_table tbody tr td.product-name a, .woocommerce .cartCoupon button.button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .cart_totals table tr th, .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce ul#shipping_method li label, .woocommerce-cart .cart-collaterals .shipping-calculator-button, .woocommerce-cart .cart-collaterals .cart_totals .woocommerce-shipping-destination strong, .woocommerce .woocommerce-shipping-calculator button.button, .woocommerce-cart .cart-collaterals .cart_totals table tr.order-total th, .orderReview table thead tr th, .woocommerce table.shop_table.woocommerce-checkout-review-order-table thead tr th, .orderReview table tbody tr td, .woocommerce table.shop_table.woocommerce-checkout-review-order-table tbody tr td, .orderReview table tfoot tr th, .woocommerce table.shop_table.woocommerce-checkout-review-order-table tfoot tr th, .wc_payment_methods li label, .woocommerce-page form .form-row label.checkbox span, .checkoutForm h3#ship-to-different-address label span , .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, .loginLinks p, .woocommerce .woocommerce-form-login p.lost_password .logisfareLink, .woocommerce table.shop_table.order_details th, .woocommerce table.shop_table.order_details td, .woocommerce table.shop_table.order_details td > a, .woocommerce .woocommerce-form-login .woocommerce-form-login__rememberme span, .myAccountNavigation ul li a, .woocommerce .woocommerce-info .button, .foferrorContent p , .blogRightSidebar .wp-block-heading, .widget_block.widget_search label, .widget_block.widget_search button, .wp-block-read-more' ),
                'desc'   => esc_html__('This typography settings only for heading, butons and some special elements.', 'logisfare'),
            ),

        ),
    ));
}
