<?php

add_filter( 'woocommerce_product_add_to_cart_text', 'logisfare_custom_product_add_to_cart_text' );  
function logisfare_custom_product_add_to_cart_text() {
    $theText = esc_html__('Add to Cart', 'logisfare');
    return logisfare_kses('<i class="logisfare-cart"></i><span class="cartTextLabel">'.$theText.'</span>');
}

function logisfare_add_to_cart(){
    if (function_exists('woocommerce_template_loop_add_to_cart')) {
        echo woocommerce_template_loop_add_to_cart();
    }
}

add_filter( 'loop_shop_per_page', 'logisfare_loop_shop_per_page', 30 );
function logisfare_loop_shop_per_page( $products ) {
    $products = tw_get_option('_logisfare_customizer_options', 'shop_numof_product', 8);
    return $products;
}

add_action( 'init', 'logisfare_woocommerce_clear_cart_url' );
function logisfare_woocommerce_clear_cart_url() {
    if ( isset( $_GET['clear-cart'] ) ) {
        global $woocommerce;
        $woocommerce->cart->empty_cart();
    }
}

add_action('wp_ajax_nopriv_logisfare_apply_coupon', 'logisfare_apply_coupon');
add_action('wp_ajax_logisfare_apply_coupon', 'logisfare_apply_coupon');
function logisfare_apply_coupon(){
    check_ajax_referer('logisfare_security_check', 'logisfare_security');
    if ( ! empty( $_POST['coupon_code'] ) ) {
        WC()->cart->add_discount( wc_format_coupon_code( wp_unslash( $_POST['coupon_code'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
    } else {
        wc_add_notice( WC_Coupon::get_generic_coupon_error( WC_Coupon::E_WC_COUPON_PLEASE_ENTER ), 'error' );
    }

    wc_print_notices();
    wp_die();
}


add_filter( 'woocommerce_checkout_fields', 'logisfare_update_checkout_fields_lables_to_placeholder', 9999 );
function logisfare_update_checkout_fields_lables_to_placeholder( $fields ) {
   foreach ( $fields as $section => $section_fields ) {
      foreach ( $section_fields as $section_field => $section_field_settings ) {
         $fields[$section][$section_field]['placeholder'] = $fields[$section][$section_field]['label'];
         $fields[$section][$section_field]['label'] = '';
      }
   }
   return $fields;
}


add_action('init', 'logisfare_remove_checkout_actions',10);
function logisfare_remove_checkout_actions() {
    remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form', 10);
    remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form', 10);
    
    add_action('woocommerce_before_checkout_login_form','woocommerce_checkout_login_form', 10);
    add_action('woocommerce_before_checkout_coupon_form','woocommerce_checkout_coupon_form', 11);
}
