<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Folio Category Settings', 'logisfare'),
        'priority' => 9,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Banner Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'folio_cat_is_banner',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Banner?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => true,
            ),
            array(
                'id'        => 'folio_cat_banner_block',
                'type'      => 'select',
                'title'     => esc_html__('Banner Block', 'logisfare'),
                'placeholder'   => esc_html__('Select Banner Block', 'logisfare'),
                'desc'          => esc_html__( 'You will find block in your WP Admin dashboard.', 'logisfare' ),
                'options'   => 'posts',
                'query_args'=> array(
                    'post_type'     => 'blocks',
                    'posts_per_page'=> -1,
                    'order'     => 'ASC',
                ),
                'dependency' => array('folio_cat_is_banner', '==', 'true'),
            ),  

            array(
                'type'    => 'heading',
                'content' => esc_html__('Content Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'folio_cat_is_masonry',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Masonry?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => false,
            ),
            array(
                'id'          => 'folio_cat_style',
                'type'        => 'select',
                'title'       => esc_html__('Folio View Style', 'logisfare'),
                'placeholder' => esc_html__('Select Folio View', 'logisfare'),
                'options'     => array(
                    '1'     => esc_html__( 'Style 01', 'logisfare' ),
                    '2'     => esc_html__( 'Style 02', 'logisfare' ),
                    '3'     => esc_html__( 'Style 03', 'logisfare' ),
                ),
                'default'     => '1',
            ),
            array(
                'id'          => 'folio_cat_col_xxl',
                'type'        => 'select',
                'title'       => esc_html__('XXL Device Column', 'logisfare'),
                'placeholder' => esc_html__('Select Column XXL Divice', 'logisfare'),
                'options'     => array(
                    '2'      => esc_html__('2 Column','logisfare'),
                    '3'      => esc_html__('3 Column','logisfare'),
                    '4'      => esc_html__('4 Column','logisfare'),
                ),
                'default'     => '3',
            ),
            array(
                'id'          => 'folio_cat_col_xl',
                'type'        => 'select',
                'title'       => esc_html__('XL Device Column', 'logisfare'),
                'placeholder' => esc_html__('Select Column XL Divice', 'logisfare'),
                'options'     => array(
                    '2'      => esc_html__('2 Column','logisfare'),
                    '3'      => esc_html__('3 Column','logisfare'),
                    '4'      => esc_html__('4 Column','logisfare'),
                ),
                'default'     => '3',
            ),
            array(
                'id'          => 'folio_cat_col_lg',
                'type'        => 'select',
                'title'       => esc_html__('LG Device Column', 'logisfare'),
                'placeholder' => esc_html__('Select Column LG Divice', 'logisfare'),
                'options'     => array(
                    '2'      => esc_html__('2 Column','logisfare'),
                    '3'      => esc_html__('3 Column','logisfare'),
                    '4'      => esc_html__('4 Column','logisfare'),
                ),
                'default'     => '3',
            ),
            array(
                'id'          => 'folio_cat_col_md',
                'type'        => 'select',
                'title'       => esc_html__('MD Device Column', 'logisfare'),
                'placeholder' => esc_html__('Select Column MD Divice', 'logisfare'),
                'options'     => array(
                    '2'      => esc_html__('2 Column','logisfare'),
                    '3'      => esc_html__('3 Column','logisfare'),
                    '4'      => esc_html__('4 Column','logisfare'),
                ),
                'default'     => '2',
            ),
            array(
                'id'          => 'folio_cat_col_sm',
                'type'        => 'select',
                'title'       => esc_html__('SM Device Column', 'logisfare'),
                'placeholder' => esc_html__('Select Column SM Divice', 'logisfare'),
                'options'     => array(
                    '1'      => esc_html__('1 Column','logisfare'),
                    '2'      => esc_html__('2 Column','logisfare'),
                    '3'      => esc_html__('3 Column','logisfare'),
                ),
                'default'     => '1',
            ),
            array(
                'id'      => 'folio_cat_thumb_width',
                'type'    => 'slider',
                'title'   => esc_html__('Thumb Width', 'logisfare'),
                'min'     => 0,
                'max'     => 1000,
                'step'    => 1,
                'default' => '',
            ),
            array(
                'id'      => 'folio_cat_thumb_height',
                'type'    => 'slider',
                'title'   => esc_html__('Thumb Width', 'logisfare'),
                'min'     => 0,
                'max'     => 1000,
                'step'    => 1,
                'default' => '',
            ),
            array(
                'id'      => 'folio_cat_title_length',
                'type'    => 'slider',
                'title'   => esc_html__('Title String Length', 'logisfare'),
                'desc'    => esc_html__( 'Title String Length for style 01 25, style 02 22, & style 03 23', 'logisfare' ),
                'min'     => 0,
                'max'     => 500,
                'step'    => 1,
                'default' => 25,
            ),

            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Pagination Settings', 'logisfare'),
            ), 
            array(
                'id'          => 'folio_cat_pagi_alignment',
                'type'        => 'select',
                'title'       => esc_html__('Choose your pagination text alignment.', 'logisfare'),
                'placeholder' => esc_html__('Select Alignment', 'logisfare'),
                'options'     => array(
                    'start'   => esc_html__( 'Left', 'logisfare' ),
                    'center' => esc_html__( 'Center', 'logisfare' ),
                    'end'  => esc_html__( 'Right', 'logisfare' ),
                ),
                'default'     => 'start',
            ),
            array(
                'id'      => 'folio_cat_paging_margin',
                'type'    => 'slider',
                'title'   => esc_html__('Pagination Gapping (Y)', 'logisfare'),
                'unit'        => 'px',
                'output'      => '.folioArcPagePagi .logisfarePagination',
                'output_mode' => 'padding-top',
                'min'     => 0,
                'max'     => 200,
                'step'    => 1,
                'default' => 0,
            ),

            
        )
    ));
}
