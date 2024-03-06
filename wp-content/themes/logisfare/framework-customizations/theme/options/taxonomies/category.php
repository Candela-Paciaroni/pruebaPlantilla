<?php
global $wpdb; 
$all_blocks = array(
        '0' => esc_html__('Default Blocks', 'logisfare')
);
$table = $wpdb->prefix.'posts';

$sql = $wpdb->prepare("SELECT * FROM $table WHERE post_type = %s and post_status = %s order by post_title ASC", array('blocks', 'publish'));
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
        foreach ($results as $rs):
                $all_blocks[$rs['ID']] = $rs['post_title'];
        endforeach;
endif;

$options = array(
        'blog_cat_is_settings'                    => array(
                'label'        => esc_html__( 'Enable Settings', 'logisfare' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'logisfare' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'logisfare' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('If you enable settings here for this category then global archive settings will override by these individual settings.', 'logisfare'),
        ),
        'blog_cat_is_banner'                    => array(
                'label'        => esc_html__( 'Is Banner', 'logisfare' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'logisfare' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'logisfare' )
                ),
                'value'        => '1',
                'desc'         => esc_html__('Sect this category page banner informations.', 'logisfare'),
        ),
        'blog_cat_banner_block'              => array(
                'label'   => esc_html__( 'Banner Block', 'logisfare' ),
                'type'    => 'short-select',
                'value'   => 'center',
                'desc'    => esc_html__( 'You will find block in your WP Admin dashboard.', 'logisfare' ),
                'choices' => $all_blocks
        ),
        
        'blog_cat_content_label'              => array(
                'type'  => 'html-full',
                'value' => '0',
                'label' => '',
                'html'  => '<br/><br/><br/><div class="customizer_label">' . esc_html__('Content Settings', 'logisfare') . '</div>',
        ),
        'blog_cat_sidebar'              => array(
                'label'   => esc_html__( 'Sidebar Position', 'logisfare' ),
                'type'    => 'short-select',
                'value'   => '3',
                'choices' => [
                        '1'      => esc_html__('No Sidebar','logisfare'),
                        '2'      => esc_html__('Left Sidebar','logisfare'),
                        '3'      => esc_html__('Right Sidebar','logisfare'),
                ]
        ),
        'blog_cat_view'              => array(
                'label'   => esc_html__( 'Post View', 'logisfare' ),
                'type'    => 'short-select',
                'value'   => '1',
                'choices' => [
                        '1'     => esc_html__( 'List View', 'logisfare' ),
                        '2'     => esc_html__( 'Grid View', 'logisfare' ),
                ]
        ),
        'blog_cat_str_limit'              => array(
                'type'  => 'slider',
                'value' => 108,
                'properties' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5
                ),
                'label' => esc_html__('Excerpt Limit', 'logisfare'),
                'desc'  => esc_html__('This option only work for list view', 'logisfare'),
        ),
        'blog_cat_readmore_label'              => array(
                'type'  => 'text',
                'value' => esc_html__('Read Full Article', 'logisfare'),
                'label' => esc_html__('Read More Label', 'logisfare'),
        ),
        
        'blog_cat_content_label2'              => array(
                'type'  => 'html-full',
                'value' => '0',
                'label' => '',
                'html'  => '<br/><br/><br/><div class="customizer_label">' . esc_html__('Pagination Settings', 'logisfare') . '</div>',
        ),
        'blog_cat_pagination_aligment'              => array(
                'label'   => esc_html__( 'Pagination Alignment', 'logisfare' ),
                'type'    => 'short-select',
                'value'   => 'left',
                'choices' => [
                        'left'   => esc_html__( 'Left', 'logisfare' ),
                        'center' => esc_html__( 'Center', 'logisfare' ),
                        'right'  => esc_html__( 'Right', 'logisfare' ),
                ]
        ),

);