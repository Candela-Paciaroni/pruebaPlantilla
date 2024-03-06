<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

$productID = $product->get_id();

$shop_product_is_cat        = tw_get_option($customizer_ID, 'shop_product_is_cat', true);
$shop_product_is_sku        = tw_get_option($customizer_ID, 'shop_product_is_sku', true);
$shop_product_is_tag        = tw_get_option($customizer_ID, 'shop_product_is_tag', true);
$shop_product_is_review     = tw_get_option($customizer_ID, 'shop_product_is_review', true);
$shop_product_is_related    = tw_get_option($customizer_ID, 'shop_product_is_related', true);

if(class_exists('CSF')): 
    $pdMetaId = '_logisfare_product_meta';

    $shop_products_contnet_enable  = tw_get_post_meta($productID, $pdMetaId, 'shop_products_contnet_enable', 2);
    if ($shop_products_contnet_enable == 1):

        $shop_products_is_cat       = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_cat', 2);
        $shop_products_is_review    = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_review', 2);
        $shop_products_is_sku       = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_sku', 2);
        $shop_products_is_tag       = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_tag', 2);
        $shop_products_is_related   = tw_get_post_meta($productID, $pdMetaId, 'shop_products_is_related', 2);

        $shop_product_is_cat = ( $shop_products_is_cat > 0 ? ($shop_products_is_cat == 1 ? true : false) : $shop_product_is_cat);
        $shop_product_is_review = ( $shop_products_is_review > 0 ? ($shop_products_is_review == 1 ? true : false) : $shop_product_is_review);
        $shop_product_is_sku = ( $shop_products_is_sku > 0 ? ($shop_products_is_sku == 1 ? true : false) : $shop_product_is_sku);
        $shop_product_is_tag = ( $shop_products_is_tag > 0 ? ($shop_products_is_tag == 1 ? true : false) : $shop_product_is_tag);
        $shop_product_is_related = ( $shop_products_is_related > 0 ? ($shop_products_is_related == 1 ? true : false) : $shop_product_is_related);
        
    endif;
endif;
?>
<!-- BEGIN: Product Details Section -->
<section class="shopDetailsPageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php woocommerce_output_all_notices(); ?>
            </div>
        </div>
        <?php if (post_password_required()): ?>
        <div class="row">
            <div class="col-lg-12">
                <?php
                echo get_the_password_form();
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div> 
<?php if (post_password_required()): ?></section><?php return; endif; ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('productContainerWrap', $product); ?>>
    <div class="container">
        <div class="row productCartSec">
            <div class="col-lg-5">
                <?php echo woocommerce_show_product_images(); ?>
            </div>
            <div class="col-lg-7">
                <div class="productContent">
                    <div class="pi01Price"><?php echo woocommerce_template_single_price(); ?></div>
                    <h2><?php echo get_the_title(); ?></h2>
                    <?php if($shop_product_is_review): ?>
                        <div class="productRatingsStock clearfix">
                            <?php if($shop_product_is_review): ?>
                                <div class="productRatings float-start">
                                    <div class="productRatingWrap">
                                        <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                            <?php if (function_exists('woocommerce_template_single_rating')): ?>
                                                <?php echo woocommerce_template_single_rating(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(get_the_excerpt() != ''): ?>
                        <div class="pcExcerpt">
                            <?php echo logisfare_kses(get_the_excerpt()); ?>
                        </div>
                    <?php endif; ?>
                    <div class="pcBtns">
                        <?php echo woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    <?php if($shop_product_is_sku || $shop_product_is_tag || $shop_product_is_cat): ?>
                    <div class="pcMeta">
                        <?php if($shop_product_is_sku && !empty($product->get_sku())): ?>
                        <p>
                            <span><?php echo esc_html__('Sku:', 'logisfare') ?></span>
                            <a href="javascript:void(0);"><?php echo logisfare_kses($product->get_sku()) ?></a>
                        </p>
                        <?php endif; ?>
                        <?php if ($shop_product_is_cat && !empty($product->get_category_ids())): ?>
                            <p class="pcCategory">
                                <span><?php echo esc_html__('Category:', 'logisfare') ?></span>
                                <?php
                                $categories = $product->get_category_ids();
                                $i = 1;
                                $c = count($categories);
                                foreach ($categories as $cid):
                                    $cTerm = get_term_by('id', $cid, 'product_cat');
                                    echo '<a href="' . get_term_link($cTerm->term_id, 'product_cat') . '">' . $cTerm->name . '</a>' . ($i != $c ? ',&nbsp;' : '');
                                    $i++;
                                endforeach;
                                ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($shop_product_is_tag && !empty($product->get_tag_ids())): ?>
                            <p class="pcmTags">
                                <span><?php echo esc_html__('Tags:', 'logisfare') ?></span>
                                <?php
                                $tags = $product->get_tag_ids();
                                $i = 1;
                                foreach ($tags as $tid):
                                    $cTerm = get_term_by('id', $tid, 'product_tag');
                                    echo '<a href="' . get_term_link($cTerm->term_id, 'product_tag') . '">' . $cTerm->name . '</a>' . ($i != count($tags) ? ',&nbsp;' : '');
                                    $i++;
                                endforeach;
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- BEGIN: Desc AddInfo Rev Section -->
        <?php echo (function_exists('woocommerce_output_product_data_tabs') ? woocommerce_output_product_data_tabs() : ''); ?>
        <!-- END: Desc AddInfo Rev Section -->
        <?php if ($shop_product_is_related): ?>
            <!-- BEGIN: Trending Product Section -->
            <?php echo (function_exists('woocommerce_output_related_products') ? woocommerce_output_related_products() : ''); ?>
            <!-- END: Trending Product Section -->
        <?php endif; ?> 
    </div>
</div>
</section>
<!-- END: Product Details Section -->
<div class="clearfix"></div>
