<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_logisfare_porduct_cat';
    CSF::createTaxonomyOptions($section_id, array(
        'taxonomy'  => 'product_cat',
        'data_type' => 'serialize',
    ));

    // Enable Setting

    // Banner Setting
    CSF::createSection($section_id, array(
        'id'    => 'product_cat_sec',
        'title' => esc_html__('Category Banner Setting', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'shop_cats_is_settings',
                'type' => 'switcher',
                'title' => esc_html__('Enable Settings', 'logisfare'),
                'desc' => esc_html__('Enable bellow settings for this category banner.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            ),     
            array(
                'id' => 'shop_cats_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner', 'logisfare'),
                'desc' => esc_html__('Do you want to hide banner only for this category? Then please turn it to Hide.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
                'dependency' => array(
                    array( 'shop_cats_is_settings', '==', 'true' ),
                ),
            ), 
            array(
                'id' => 'shop_cats_banner_block',
                'type' => 'select',
                'title' => esc_html__('Baner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Baner Blocks', 'logisfare'),
                'desc' => esc_html__('Once you selected banner block after that all other banner settings will not work.', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array(
                    array('shop_cats_is_banner', '==', 'true'),
                    array('shop_cats_is_settings', '==', 'true'),
                ),
            ),
        ),
    ));
}
