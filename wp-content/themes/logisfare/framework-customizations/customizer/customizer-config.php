<?php
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    $section_id = '_logisfare_customizer_options';
    CSF::createCustomizeOptions($section_id, array());

    CSF::createSection($section_id, [
        'id'    => 'theme_options',
        'priority'  => 1,
        'title' => esc_html__('Theme Options', 'logisfare'),
    ]);

    require_once get_parent_theme_file_path('/framework-customizations/customizer/general-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/font-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/colorpreset-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/header-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/blog-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/blog-details-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/blog-archive-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/blog-search-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/page-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/folio-cat-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/folio-single-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/folio-arc-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/service-single-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/service-arc-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/team-single-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/team-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/shop-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/shop-category-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/shop-tag-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/shop-search-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/shop-product-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/footer-settings.php');
    require_once get_parent_theme_file_path('/framework-customizations/customizer/404-settings.php');
}