<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Blog Archive Settings', 'logisfare'),
        'priority' => 6,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Blog Archive Banner Settings', 'logisfare'),
            ),
            array(
                'id'        => 'blog_arch_is_banner',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Banner?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => true,
            ),
            array(
                'id'        => 'blog_arch_banner_block',
                'type'      => 'select',
                'title'     => esc_html__('Select Banner Blocks', 'logisfare'),
                'placeholder'   => esc_html__('Select Banner Style', 'logisfare'),
                'desc'          => esc_html__( 'You will find block in your WP Admin dashboard.', 'logisfare' ),
                'options'   => 'posts',
                'query_args'=> array(
                    'post_type'     => 'blocks',
                    'posts_per_page'=> -1,
                    'order'     => 'ASC',
                ),
                'dependency' => array('blog_arch_is_banner', '==', 'true'),
            ),
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Archive Content Settings', 'logisfare'),
            ),
            array(
                'id'          => 'blog_arch_sidebar',
                'type'        => 'select',
                'title'       => esc_html__('Blog Sidebar Position', 'logisfare'),
                'placeholder' => esc_html__('Select Sidebar option', 'logisfare'),
                'options'     => array(
                    '1'      => esc_html__('No Sidebar','logisfare'),
                    '2'      => esc_html__('Left Sidebar','logisfare'),
                    '3'      => esc_html__('Right Sidebar','logisfare'),
                ),
                'default'     => '3',
            ),
            array(
                'id'          => 'blog_arch_view',
                'type'        => 'select',
                'title'       => esc_html__('Post View', 'logisfare'),
                'placeholder' => esc_html__('Select Post View', 'logisfare'),
                'options'     => array(
                    '1'     => esc_html__( 'List View', 'logisfare' ),
                    '2'     => esc_html__( 'Grid View', 'logisfare' ),
                ),
                'default'     => '1',
            ),
            array(
                'id'          => 'blog_arch_grid_style',
                'type'        => 'select',
                'title'       => esc_html__('Grid View Style', 'logisfare'),
                'placeholder' => esc_html__('Select View Style', 'logisfare'),
                'options'     => array(
                    '1'     => esc_html__( 'Style 01', 'logisfare' ),
                    '2'     => esc_html__( 'Style 02', 'logisfare' ),
                    '3'     => esc_html__( 'Style 03', 'logisfare' ),
                ),
                'default'     => '1',
                'dependency' => array('blog_arch_view', '==', '2'),
            ),
            array(
                'id'      => 'blog_arch_str_limit',
                'type'    => 'number',
                'title'   => esc_html__('Excerpt Limit', 'logisfare'),
                'default' => 295,
                'dependency' => array('blog_arch_view', '==', '1'),
            ),
            array(
                'id'      => 'blog_arch_str_limit_grid',
                'type'    => 'number',
                'title'   => esc_html__('Excerpt Limit', 'logisfare'),
                'default' => 90,
                'dependency' => array('blog_arch_view', '==', '2'),
            ),
            array(
                'id'        => 'blog_arch_readmore_label',
                'type'      => 'text',
                'title'     => esc_html__('Button Label', 'logisfare'),
                'default'    => esc_html__('Read Full Article', 'logisfare'),
            ),

            array(
                'type'    => 'heading',
                'content' => esc_html__('Archive Pagination Settings', 'logisfare'),
            ),

            array(
                'id'          => 'blog_arch_pagi_alignment',
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
                'id'      => 'blog_arch_paging_margin',
                'type'    => 'slider',
                'title'   => esc_html__('Pagination Gapping (Y)', 'logisfare'),
                'unit'        => 'px',
                'output'      => '.blogArchivePagination',
                'output_mode' => 'padding-top',
                'min'     => 0,
                'max'     => 200,
                'step'    => 1,
                'default' => 0,
            ),

            array(
                'type'    => 'heading',
                'content' => esc_html__('Archive Blocks Settings', 'logisfare'),
            ),
            array(
                'id'        => 'blog_arch_bloks',
                'type'      => 'repeater',
                'title'     => esc_html__('Add Blocks', 'logisfare'),
                'button_title'  => esc_html__('Add New Block', 'logisfare'),
                'fields'    => array(
                    array(
                        'id' => 'blog_arch_ids',
                        'type' => 'select',
                        'title' => esc_html__('Select Block', 'logisfare'),
                        'placeholder' => esc_html__('Select Block', 'logisfare'),
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