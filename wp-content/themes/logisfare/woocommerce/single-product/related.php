<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
$customizer_ID = '_logisfare_customizer_options';

if ( $related_products ) : ?>
<?php

    $shop_product_area_sub_title= tw_get_option($customizer_ID, 'shop_product_area_sub_title', esc_html__('Our Products', 'logisfare'));
    $shop_product_area_title    = tw_get_option($customizer_ID, 'shop_product_area_title', esc_html__('Most Related Products', 'logisfare'));
    $shop_product_rel_xxl       = tw_get_option($customizer_ID, 'shop_product_rel_xxl', 3);
    $shop_product_rel_xl        = tw_get_option($customizer_ID, 'shop_product_rel_xl', 3);
    $shop_product_rel_lg        = tw_get_option($customizer_ID, 'shop_product_rel_lg', 2);
    $shop_product_rel_md        = tw_get_option($customizer_ID, 'shop_product_rel_md', 2);
    $shop_product_rel_sm        = tw_get_option($customizer_ID, 'shop_product_rel_sm', 1);
    $shop_product_rel_is_flashlabels = tw_get_option($customizer_ID, 'shop_product_rel_is_flashlabels', true);
    $shop_product_rel_title_length   = tw_get_option($customizer_ID, 'shop_product_rel_title_length', 28);

    $productID = get_the_ID();
   
    if(class_exists('CSF')): 
        $pdMetaId = '_logisfare_product_meta';

        $shop_products_contnet_enable  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_contnet_enable', 2);
	    if($shop_products_contnet_enable == 1):

            $shop_products_area_sub_title = tw_get_post_meta($productID, $pdMetaId, 'shop_products_area_sub_title', esc_html__( 'Our Products', 'logisfare' ));
            $shop_products_area_title = tw_get_post_meta($productID, $pdMetaId, 'shop_products_area_title', esc_html__( 'Most Related Products', 'logisfare' ));
            
            $shop_products_rel_xxl = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_xxl', 3);
            $shop_products_rel_xl = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_xl', 3);
            $shop_products_rel_lg = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_lg', 2);
            $shop_products_rel_md = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_md', 2);
            $shop_products_rel_sm = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_sm', 1);
            
            $shop_products_rel_is_flashlabels = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_is_flashlabels', 2);
            $shop_products_rel_title_length = tw_get_post_meta($productID, $pdMetaId, 'shop_products_rel_title_length', 28);

            $shop_product_area_sub_title = (!empty($shop_products_area_sub_title) ? $shop_products_area_sub_title : $shop_product_area_sub_title);
            $shop_product_area_title     = (!empty($shop_products_area_title) ? $shop_products_area_title : $shop_product_area_title);

            $shop_product_rel_xxl       = ($shop_products_rel_xxl > 0 ? $shop_products_rel_xxl : $shop_product_rel_xxl);
            $shop_product_rel_xl        = ($shop_products_rel_xl > 0 ? $shop_products_rel_xl : $shop_product_rel_xl);
            $shop_product_rel_lg        = ($shop_products_rel_lg > 0 ? $shop_products_rel_lg : $shop_product_rel_lg);
            $shop_product_rel_md        = ($shop_products_rel_md > 0 ? $shop_products_rel_md : $shop_product_rel_md);
            $shop_product_rel_sm        = ($shop_products_rel_md > 0 ? $shop_products_rel_md : $shop_product_rel_sm);

            $shop_product_rel_is_flashlabels = ($shop_products_rel_is_flashlabels > 0 ? ($shop_products_rel_is_flashlabels == 1 ? true : false) : $shop_product_rel_is_flashlabels);
            $shop_product_rel_title_length = ($shop_products_rel_title_length > 0 ? $shop_products_rel_title_length : $shop_product_rel_title_length);
        endif;
    endif;
   
    $w = 'full';
    $h = '';


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
<div class="row relatedProductRow">
    <div class="col-lg-12 text-center relatedProducHeading">
        <?php if(!empty($shop_product_area_sub_title)): ?>
            <h3 class="subTitle">
                <i aria-hidden="true" class="<?php echo esc_attr('logisfare-left_sec', 'logisfare') ?>"></i><?php echo esc_html($shop_product_area_sub_title, 'logisfare'); ?><i aria-hidden="true" class="<?php echo esc_attr('logisfare-right_sec', 'logisfare'); ?>"></i>                                
            </h3>
        <?php endif; ?>
        <?php if(!empty($shop_product_area_title)): ?>
            <h2 class="secTitle"><?php echo esc_html($shop_product_area_title) ?></h2>
        <?php endif; ?>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 relatedWrap"
            data-xxl="<?php echo esc_attr($shop_product_rel_xxl); ?>" 
            data-xl="<?php echo esc_attr($shop_product_rel_xl); ?>" 
            data-lg="<?php echo esc_attr($shop_product_rel_lg); ?>" 
            data-md="<?php echo esc_attr($shop_product_rel_md); ?>" 
            data-sm="<?php echo esc_attr($shop_product_rel_sm); ?>" 
            >
                <div class="relatedProductCarousel owl-carousel">
                    <?php
                    foreach ( $related_products as $related_product ) :
                        $post_object = get_post( $related_product->get_id() );
                        setup_postdata( $GLOBALS['post'] =& $post_object );
                        $rProduct = wc_get_product(get_the_ID());

                        $productClass = '';
                        $productClass .= (get_option('woocommerce_enable_review_rating') === 'yes' && $rProduct->get_review_count() > 0 ? '' : ' pi01NoRating');

                        ?>
                        <div <?php wc_product_class('uiuxomProductWrapper', $rProduct); ?>>
                            <div class="productItem01 <?php echo esc_attr($productClass); ?>">
                                <div class="pi01Thumb">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="pi01Actions">
                                        <?php if(function_exists('logisfare_add_to_cart')){ logisfare_add_to_cart(); } ?>
                                    </div>
                                    <?php if($shop_product_rel_is_flashlabels): ?>
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
                                                if($shop_product_rel_title_length > 0 && strlen(wp_strip_all_tags(get_the_title())) > $shop_product_rel_title_length):
                                                    echo substr(wp_strip_all_tags(get_the_title()), 0, $shop_product_rel_title_length).'..';
                                                else:
                                                    echo get_the_title();
                                                endif;
                                            ?>
                                        </a>
                                    </h3>
                                    <div class="pi01Price">
                                        <?php echo logisfare_kses($rProduct->get_price_html()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php
wp_reset_postdata();
endif;