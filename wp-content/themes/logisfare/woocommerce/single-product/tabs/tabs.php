<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $product;
$customizer_ID = '_logisfare_customizer_options';
$productID = $product->get_id();


$shop_product_tab_aligment  = tw_get_option($customizer_ID, 'shop_product_tab_alignment', 'start');

if(class_exists('CSF')): 
    $pdMetaId = '_logisfare_product_meta';

    $shop_products_contnet_enable  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_contnet_enable', 2);
    if ($shop_products_contnet_enable == 1):
        $shop_products_tab_alignment = tw_get_post_meta($productID, $pdMetaId, 'shop_products_tab_alignment', 'center');
        
        $shop_product_tab_aligment = ($shop_products_tab_alignment != '' ? $shop_products_tab_alignment : $shop_product_tab_aligment);
    endif;
endif;

if ( ! empty( $product_tabs ) ) : ?>
        <div class="row productTabRow">
            <div class="col-lg-12">
                <ul class="nav productDetailsTab justify-content-<?php echo esc_attr($shop_product_tab_aligment); ?>" id="productDetailsTab" role="tablist">
                    <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                    <li role="presentation">
                        <button class="<?php echo esc_attr(($pt == 1 ? 'active' : '')); ?>" id="<?php echo esc_attr( $key ); ?>-tab" data-bs-toggle="tab" data-bs-target="#tab-<?php echo esc_attr( $key ); ?>" type="button" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo esc_attr(($pt == 1 ? 'true' : 'false')); ?>">
                            <?php 
                                $tabTitle = $product_tab['title'];
                                echo logisfare_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tabTitle, $key ) );
                            ?>
                        </button>
                    </li>
                    <?php $pt++; endforeach; ?>
                </ul>
                <div class="tab-content" id="desInfoRev_content">
                    <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                            <div class="tab-pane fade <?php echo esc_attr(($pt == 1 ? ' show active ' : '')); ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab" tabindex="0">
                                <div class="inner_<?php echo esc_attr( $key ); ?>">
                                    <?php
                                        if ( isset( $product_tab['callback'] ) ) {
                                            call_user_func( $product_tab['callback'], $key, $product_tab );
                                        }
                                    ?>
                                </div>
                            </div>
                    <?php $pt++; endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
