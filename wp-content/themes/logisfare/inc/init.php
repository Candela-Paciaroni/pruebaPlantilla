<?php
/*
 * Theme Init File
 */

/* * ---------------------------------------------------------------
 * Include Files
 * -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/helper.php');
require_once get_parent_theme_file_path('/inc/hooks.php');
if (class_exists('woocommerce')) {
    require_once get_parent_theme_file_path().'/inc/woocommerce.php';
}

/* * ---------------------------------------------------------------
 * Option Framework
 * -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/framework-customizations/customizer/customizer-config.php');
require_once get_parent_theme_file_path('/inc/metabox/page.php');
require_once get_parent_theme_file_path('/inc/metabox/team.php');
require_once get_parent_theme_file_path('/inc/metabox/service.php');
require_once get_parent_theme_file_path('/inc/metabox/product.php');
require_once get_parent_theme_file_path('/inc/metabox/taxonomies/category.php');
require_once get_parent_theme_file_path('/inc/metabox/taxonomies/post_tag.php');
require_once get_parent_theme_file_path('/inc/metabox/taxonomies/product_cat.php');
require_once get_parent_theme_file_path('/inc/metabox/taxonomies/product_tag.php');

require_once get_parent_theme_file_path('/inc/icons/logisfare-icons.php');

/* * ---------------------------------------------------------------
 * Libraray Include
 * -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/lib/class-tgm-plugin-activation.php');
require_once get_parent_theme_file_path('/inc/lib/class-tw-image-resize.php');
