<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_logisfare_taxonomies_tag';
    CSF::createTaxonomyOptions($section_id, array(
        'taxonomy'  => 'post_tag',
        'data_type' => 'serialize',
    ));

    // Enable Setting
    CSF::createSection($section_id, array(
        'title' => esc_html__('Enable Settings', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'blog_tag_is_settings',
                'type' => 'switcher',
                'title' => esc_html__('Enable Setting', 'logisfare'),
                'desc' => esc_html__('If you enable settings here for this tag then global archive settings will override by these individual settings.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            )
        ),
    ));

    // Banner Setting
    CSF::createSection($section_id, array(
        'title' => esc_html__('Banner Setting', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'blog_tag_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner', 'logisfare'),
                'desc' => esc_html__('Sect this category page banner informations.', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ), 
            array(
                'id' => 'blog_tag_banner_block',
                'type' => 'select',
                'title' => esc_html__('Baner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Baner Blocks', 'logisfare'),
                'desc' => esc_html__('You will find block in your WP Admin dashboard.', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('blog_tag_is_banner', '==', 'true'),
            ),
        ),
    ));

    // Sidebar Setting
    CSF::createSection($section_id, array(
        'title' => esc_html__('Content View', 'logisfare'),
        'fields' => array(
            array(
                'id'          => 'blog_tag_sidebar',
                'type'        => 'select',
                'title'       => 'Sidebar Position',
                'placeholder' => esc_html__('Select Position','logisfare'),
                'default'     => '3',
                'options'     => array(
                    '1'      => esc_html__('No Sidebar','logisfare'),
                    '2'      => esc_html__('Left Sidebar','logisfare'),
                    '3'      => esc_html__('Right Sidebar','logisfare'),
                ),
            ), 
            array(
                'id'          => 'blog_tag_view',
                'type'        => 'select',
                'title'       => 'Post View',
                'placeholder' => esc_html__('Select View','logisfare'),
                'default'     => '1',
                'options'     => array(
                    '1'     => esc_html__( 'List View', 'logisfare' ),
                    '2'     => esc_html__( 'Grid View', 'logisfare' ),
                ),
            ),
            array(
                'id'        => 'blog_tag_str_limit',
                'type'      => 'slider',
                'title'     => 'List View Excerpt Limit',
                'desc'      => esc_html__('This option only work for list view', 'logisfare'),
                'min'       => 0,
                'max'       => 1000,
                'step'      => 1,
                'unit'      => 'px',
                'default'   => 295,
                'dependency' => array('blog_tag_view', '==', 1),
            ),
            array(
                'id'        => 'blog_tag_str_limit_grid',
                'type'      => 'slider',
                'title'     => 'Grid View Excerpt Limit',
                'desc'      => esc_html__('This option only work for Grid view', 'logisfare'),
                'min'       => 0,
                'max'       => 1000,
                'step'      => 1,
                'unit'      => 'px',
                'default'   => 90,
                'dependency' => array('blog_tag_view', '==', 2),
            ),
            array(
                'id'      => 'blog_tag_readmore_label',
                'type'    => 'text',
                'title'   => esc_html__('Read More Label', 'logisfare'),
                'default' => esc_html__('Read Details', 'logisfare'),
            ),
        ),
    ));

    // Pagination Setting 
    CSF::createSection($section_id, array(
        'title' => esc_html__('Pagination Setting', 'logisfare'),
        'fields' => array(
            array(
                'id'          => 'blog_tag_pagination_aligment',
                'type'        => 'select',
                'title'       => 'Pagination Aligment',
                'placeholder' => esc_html__('Select Aligment','logisfare'),
                'default'     => 'start',
                'options'     => array(
                    'start'     => esc_html__( 'Left', 'logisfare' ),
                    'center'     => esc_html__( 'Center', 'logisfare' ),
                    'end'     => esc_html__( 'Right', 'logisfare' ),
                ),
            ),
        ),
    ));


}
