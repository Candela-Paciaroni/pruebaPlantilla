<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_logisfare_product_meta';
    CSF::createMetabox($section_id, array(
        'title' => esc_html__('Product Setting Box', 'logisfare'),
        'post_type' => 'product',
        'show_restore' => false,
        'theme' => 'light',
        'nav' => 'inline',

    ));

    // Template Page Banner
    CSF::createSection($section_id, array(
        'title' => esc_html__('Template Page Banner', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'shop_products_banner_enable',
                'type' => 'switcher',
                'title' => esc_html__('Enable Banner Setting', 'logisfare'),
                'desc' => esc_html__('Enable bellow settings for this page banner.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            ),
            array(
                'id' => 'shop_products_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner', 'logisfare'),
                'desc' => esc_html__('Do you want to hide banner only for this page? Then please turn it to Hide.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
                'dependency' => array('shop_products_banner_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_banner_block',
                'type' => 'select',
                'title' => esc_html__('Select Banner Block', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Block', 'logisfare'),
                'desc' => esc_html__('Select a custom banner block. If you choose one then all of the banner settings will ignore those are shown below.', 'logisfare'),
                'options' => 'posts',
                'ajax' => true,
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array(
                    array('shop_products_banner_enable', '==', 'true'),
                    array('shop_products_is_banner', '==', 'true'),
                )
            ),
        ),
    ));
    

    //Content Settings
    CSF::createSection($section_id, array(
        'title' => esc_html__('Content Setting', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'shop_products_contnet_enable',
                'type' => 'switcher',
                'title' => esc_html__('Enable Content Setting', 'logisfare'),
                'desc' => esc_html__('Do you want to enable Product Content settings for this Product?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            ),
            
            array(
                'id' => 'shop_products_is_zoom',
                'type' => 'switcher',
                'title' => esc_html__('Is Gallery Image Zoom?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_is_flashlabel',
                'type' => 'switcher',
                'title' => esc_html__('Is Flash Lebels?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_is_cat',
                'type' => 'switcher',
                'title' => esc_html__('Is Category?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_is_sku',
                'type' => 'switcher',
                'title' => esc_html__('Is SKU?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_is_tag',
                'type' => 'switcher',
                'title' => esc_html__('Is Tag?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_is_review',
                'type' => 'switcher',
                'title' => esc_html__('Is Show Rating?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),

            // product Tab Settings 
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Product Tab Setting', 'logisfare'),
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id' => 'shop_products_tab_alignment',
                'type'        => 'select',
                'title'       => esc_html__('Shop product Tab Alignment', 'logisfare'),
                'placeholder' => esc_html__('Select Alignment','logisfare'),
                'options'     => array(
                    'start'      => esc_html__('Left','logisfare'),
                    'center'      => esc_html__('Center','logisfare'),
                    'end'      => esc_html__('Right','logisfare'),
                ),
                'default'     => 'start',
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ), 

            // Related Product Settings 
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Related Product Settings', 'logisfare'),
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ), 
            array(
                'id' => 'shop_products_is_related',
                'type' => 'switcher',
                'title' => esc_html__('Is Related Products?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array('shop_products_contnet_enable', '==', 'true'),
            ),
            array(
                'id'          => 'shop_products_area_sub_title',
                'type'        => 'text',
                'title'       => esc_html__('Related Area Sub Title', 'logisfare'),
                'default'     => esc_html__('Our Products', 'logisfare'),
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_area_title',
                'type'        => 'text',
                'title'       => esc_html__('Related Area Title', 'logisfare'),
                'default'     => esc_html__('Most Related Products', 'logisfare'),
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_rel_xxl',
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
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_rel_xl',
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
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_rel_lg',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for LG device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '2'      => esc_html__('Col LG 2','logisfare'),
                    '3'      => esc_html__('Col LG 3','logisfare'),
                    '4'      => esc_html__('Col LG 4','logisfare'),
                ),
                'default'     => '2',
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_rel_md',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for MD device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '1'      => esc_html__('Col MD 1','logisfare'),
                    '2'      => esc_html__('Col MD 2','logisfare'),
                    '3'      => esc_html__('Col MD 3','logisfare'),
                ),
                'default'     => '2',
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'          => 'shop_products_rel_sm',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for SM device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column','logisfare'),
                'options'     => array(
                    '1'      => esc_html__('Col SM 1','logisfare'),
                    '2'      => esc_html__('Col SM 2','logisfare'),
                    '3'      => esc_html__('Col SM 3','logisfare'),
                ),
                'default'     => '1',
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id' => 'shop_products_rel_is_flashlabels',
                'type' => 'switcher',
                'title' => esc_html__('Is Flash Lebels?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
            array(
                'id'      => 'shop_products_rel_title_length',
                'type'    => 'number',
                'title'   => esc_html__('Title String Limit', 'logisfare'),
                'default' => 28,
                'dependency' => array(
                        array('shop_products_is_related', '==', 'true'),
                        array('shop_products_contnet_enable', '==', 'true'),
                ),
            ),
        ),
    ));

}
