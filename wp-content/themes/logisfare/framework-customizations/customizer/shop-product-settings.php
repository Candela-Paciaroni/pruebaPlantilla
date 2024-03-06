<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Product Settings', 'logisfare'),
        'priority' => 20,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Banner Settings', 'logisfare'),
            ),
            array(
                'id' => 'shop_product_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_banner_block',
                'type' => 'select',
                'title' => esc_html__('Select Banner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Style', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('shop_product_is_banner', '==', 'true'),
            ),

            array(
                'type'    => 'heading',
                'content' => esc_html__('Content Settings', 'logisfare'),
            ),
            array(
                'id' => 'shop_product_is_zoom',
                'type' => 'switcher',
                'title' => esc_html__('Is Gallery Image Zoom?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_is_flashlabel',
                'type' => 'switcher',
                'title' => esc_html__('Is Flash Lebels?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_is_cat',
                'type' => 'switcher',
                'title' => esc_html__('Is Category?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_is_sku',
                'type' => 'switcher',
                'title' => esc_html__('Is SKU?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_is_tag',
                'type' => 'switcher',
                'title' => esc_html__('Is Tag?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_product_is_review',
                'type' => 'switcher',
                'title' => esc_html__('Is Show Rating?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),

            array(
                'type'    => 'heading',
                'content' => esc_html__('Product Tab Setting', 'logisfare'),
            ),
            array(
                'id'          => 'shop_product_tab_alignment',
                'type'        => 'select',
                'title'       => esc_html__('Shop product Tab Alignment', 'logisfare'),
                'placeholder' => esc_html__('Select Alignment','logisfare'),
                'options'     => array(
                    'start'      => esc_html__('Left','logisfare'),
                    'center'      => esc_html__('Center','logisfare'),
                    'end'      => esc_html__('Right','logisfare'),
                ),
                'default'     => 'start',
            ),
            array(
                'type'    => 'heading',
                'content' => esc_html__('Related Product Settings', 'logisfare'),
            ),
            array(
                'id' => 'shop_product_is_related',
                'type' => 'switcher',
                'title' => esc_html__('Is Related Products?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id'          => 'shop_product_area_sub_title',
                'type'        => 'text',
                'title'       => esc_html__('Related Area Sub Title', 'logisfare'),
                'default'     => esc_html__('Our Products', 'logisfare'),
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_area_title',
                'type'        => 'text',
                'title'       => esc_html__('Related Area Title', 'logisfare'),
                'default'     => esc_html__('Most Related Products', 'logisfare'),
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_rel_xxl',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for XXL device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '2'      => esc_html__('Col XXL 2','logisfare'),
                    '3'      => esc_html__('Col XXL 3','logisfare'),
                    '4'      => esc_html__('Col XXL 4','logisfare'),
                    '5'      => esc_html__('Col XXL 5','logisfare'),
                ),
                'default'     => '3',
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_rel_xl',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for XL device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '2'      => esc_html__('Col XL 2','logisfare'),
                    '3'      => esc_html__('Col XL 3','logisfare'),
                    '4'      => esc_html__('Col XL 4','logisfare'),
                    '5'      => esc_html__('Col XL 5','logisfare'),
                ),
                'default'     => '3',
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_rel_lg',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for LG device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '2'      => esc_html__('Col LG 2','logisfare'),
                    '3'      => esc_html__('Col LG 3','logisfare'),
                    '4'      => esc_html__('Col LG 4','logisfare'),
                ),
                'default'     => '2',
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_rel_md',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for MD device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '1'      => esc_html__('Col MD 1','logisfare'),
                    '2'      => esc_html__('Col MD 2','logisfare'),
                    '3'      => esc_html__('Col MD 3','logisfare'),
                ),
                'default'     => '2',
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'          => 'shop_product_rel_sm',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for SM device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '1'      => esc_html__('Col SM 1','logisfare'),
                    '2'      => esc_html__('Col SM 2','logisfare'),
                    '3'      => esc_html__('Col SM 3','logisfare'),
                ),
                'default'     => '1',
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id' => 'shop_product_rel_is_flashlabels',
                'type' => 'switcher',
                'title' => esc_html__('Is Flash Lebels?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
            array(
                'id'      => 'shop_product_rel_title_length',
                'type'    => 'number',
                'title'   => esc_html__('Title String Limit', 'logisfare'),
                'default' => 28,
                'dependency' => array('shop_product_is_related', '==', 'true'),
            ),
        )
    ));

}
