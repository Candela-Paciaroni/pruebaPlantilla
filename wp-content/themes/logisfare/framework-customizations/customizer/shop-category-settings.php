<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Shop Category Settings', 'logisfare'),
        'priority' => 17,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Banner Settings', 'logisfare'),
            ),
            array(
                'id' => 'shop_cat_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_cat_banner_block',
                'type' => 'select',
                'title' => esc_html__('Select Banner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Style', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('shop_cat_is_banner', '==', 'true'),
            ),

            array(
                'type'    => 'heading',
                'content' => esc_html__('Content Settings', 'logisfare'),
            ),
            array(
                'id'          => 'shop_cat_sidebar',
                'type'        => 'select',
                'title'       => esc_html__('Shop Sidebar Position', 'logisfare'),
                'placeholder' => esc_html__('Select Sidebar option', 'logisfare'),
                'options'     => array(
                    '1'      => esc_html__('No Sidebar','logisfare'),
                    '2'      => esc_html__('Left Sidebar','logisfare'),
                    '3'      => esc_html__('Right Sidebar','logisfare'),
                ),
                'default'     => '3',
            ),
            array(
                'id'          => 'shop_cat_col_xxl',
                'type'        => 'select',
                'title'       => 'Shop product column for XXL device.',
                'placeholder' => esc_html__('Select Column',''),
                'options'     => array(
                    '2'      => esc_html__('Col XXL 2','logisfare'),
                    '3'      => esc_html__('Col XXL 3','logisfare'),
                    '4'      => esc_html__('Col XXL 4','logisfare'),
                    '5'      => esc_html__('Col XXL 5','logisfare'),
                    '6'      => esc_html__('Col XXL 6','logisfare'),
                ),
                'default'     => '2',
            ),
            array(
                'id'          => 'shop_cat_col_xl',
                'type'        => 'select',
                'title'       => 'Shop product column for XL device.',
                'placeholder' => esc_html__('Select Column',''),
                'options'     => array(
                    '2'      => esc_html__('Col XL 2','logisfare'),
                    '3'      => esc_html__('Col XL 3','logisfare'),
                    '4'      => esc_html__('Col XL 4','logisfare'),
                    '5'      => esc_html__('Col XL 5','logisfare'),
                    '6'      => esc_html__('Col XL 6','logisfare'),
                ),
                'default'     => '2',
            ),
            array(
                'id'          => 'shop_cat_col_lg',
                'type'        => 'select',
                'title'       => 'Shop product column for LG device.',
                'placeholder' => esc_html__('Select Column',''),
                'options'     => array(
                    '2'      => esc_html__('Col LG 2','logisfare'),
                    '3'      => esc_html__('Col LG 3','logisfare'),
                    '4'      => esc_html__('Col LG 4','logisfare'),
                    '5'      => esc_html__('Col LG 5','logisfare'),
                ),
                'default'     => '2',
            ),
            array(
                'id'          => 'shop_cat_col_md',
                'type'        => 'select',
                'title'       => esc_html__('Shop product column for MD device.', 'logisfare'),
                'placeholder' => esc_html__('Select Column',''),
                'options'     => array(
                    '1'      => esc_html__('Col MD 1','logisfare'),
                    '2'      => esc_html__('Col MD 2','logisfare'),
                    '3'      => esc_html__('Col MD 3','logisfare'),
                    '4'      => esc_html__('Col MD 4','logisfare'),
                ),
                'default'     => '2',
            ),
            array(
                'id'          => 'shop_cat_col_sm',
                'type'        => 'select',
                'title'       => 'Shop product column for SM device.',
                'placeholder' => esc_html__('Select Column',''),
                'options'     => array(
                    '1'      => esc_html__('Col SM 1','logisfare'),
                    '2'      => esc_html__('Col SM 2','logisfare'),
                    '3'      => esc_html__('Col SM 3','logisfare'),
                ),
                'default'     => '1',
            ),
            array(
                'id' => 'shop_cat_is_count',
                'type' => 'switcher',
                'title' => esc_html__('Show Product Count?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_cat_is_sort',
                'type' => 'switcher',
                'title' => esc_html__('Is Sort?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_cat_is_view_toggler',
                'type' => 'switcher',
                'title' => esc_html__('Is View Toggler?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id'          => 'shop_cat_default_view',
                'type'        => 'select',
                'title'       => esc_html__('Default View', 'logisfare'),
                'placeholder' => esc_html__('Select View',''),
                'options'     => array(
                    '1'      => esc_html__('Grid View','logisfare'),
                    '2'      => esc_html__('List View','logisfare')
                ),
                'default'     => '1',
                'dependency' => array('shop_cat_is_view_toggler', '==', 'true'),
            ),
            array(
                'id'      => 'shop_cat_grid_title_length',
                'type'    => 'number',
                'title'   => esc_html__('Grid Title String Limit', 'logisfare'),
                'default' => '28',
                'dependency' => array('shop_cat_default_view', '==', '1'),
            ),
            array(
                'id'      => 'shop_cat_list_desc_length',
                'type'    => 'number',
                'title'   => esc_html__('List Desc String Limit', 'logisfare'),
                'default' => '71',
                'dependency' => array('shop_cat_default_view', '==', '2'),
            ),
            array(
                'id' => 'shop_cat_is_flashlabels',
                'type' => 'switcher',
                'title' => esc_html__('Is Flash Lebels?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'type'    => 'heading',
                'content' => esc_html__('Pagination Settings', 'logisfare'),
            ),

            array(
                'id' => 'shop_cat_is_pagination',
                'type' => 'switcher',
                'title' => esc_html__('Is Pagination?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id'          => 'shop_cat_pagi_align',
                'type'        => 'select',
                'title'       => esc_html__('Pagination Aligment', 'logisfare'),
                'placeholder' => esc_html__('Select Aligment',''),
                'options'     => array(
                    'start'      => esc_html__('Left','logisfare'),
                    'center'    => esc_html__('Center','logisfare'),
                    'end'     => esc_html__('Right','logisfare'),
                ),
                'default'     => 'center',
                'dependency' => array('shop_cat_is_pagination', '==', 'true'),
            ),
            array(
                'id'      => 'shop_cat_paging_margin',
                'type'    => 'slider',
                'title'   => esc_html__('Pagination Gapping Y', 'logisfare'),
                'unit'        => 'px',
                'output'      => '.logisfareShopCatPagination',
                'output_mode' => 'padding-top',
                'min'     => 0,
                'max'     => 200,
                'step'    => 1,
                'default' => 0,
                'dependency' => array('shop_cat_is_pagination', '==', 'true'),
            ),

            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Top / Bottom Blocks Settings', 'logisfare'),
            ),
            array(
                'id'        => 'shop_cat_top_bloks',
                'type'      => 'repeater',
                'title'     => esc_html__('Add Top Blocks', 'logisfare'),
                'button_title'  => esc_html__('Add Top Blocks', 'logisfare'),
                'fields'    => array(
                    array(
                        'id' => 'top_block_ids',
                        'type' => 'select',
                        'title' => esc_html__('Select Top Block', 'logisfare'),
                        'placeholder' => esc_html__('Select Top Block', 'logisfare'),
                        'options' => 'posts',
                        'query_args' => array(
                            'post_type' => 'blocks',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ),
                    ),
                )
            ),
            array(
                'id'        => 'shop_cat_bottom_bloks',
                'type'      => 'repeater',
                'title'     => esc_html__('Add Bottom Blocks', 'logisfare'),
                'button_title'  => esc_html__('Add Bottom Blocks', 'logisfare'),
                'fields'    => array(
                    array(
                        'id' => 'bottom_block_ids',
                        'type' => 'select',
                        'title' => esc_html__('Select Bottom Block', 'logisfare'),
                        'placeholder' => esc_html__('Select Bottom Block', 'logisfare'),
                        'options' => 'posts',
                        'query_args' => array(
                            'post_type' => 'blocks',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ),
                    ),
                )
            ),




        )
    ));

}
