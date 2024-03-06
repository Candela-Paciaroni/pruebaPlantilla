<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Footer Settings', 'logisfare'),
        'priority' => 22,
        'fields' => array(
            
            array(
                'type'      => 'heading',
                'content'   => esc_html__('Footer Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'footer_style',
                'type'      => 'select',
                'title'     => esc_html__('Select Footer Style', 'logisfare'),
                'placeholder' => esc_html__('Select Footer Style', 'logisfare'),
                'options'   => 'posts',
                'query_args' => array(
                    'post_type'     => 'tw-footer-builder',
                    'posts_per_page' => -1,
                    'order'     => 'ASC',
                ),
            ),
            array(
                'id'          => 'copy_site_info',
                'type'        => 'wp_editor',
                'title'       => esc_html__( 'Copyright Info', 'logisfare' ),
                'default'     => date('Y').' '.get_bloginfo('name').'. '.esc_html__(' All rights reserved.', 'logisfare'),
                'dependency' => array('footer_style', '==', ''),
            ),
            
            array(
                'type'      => 'heading',
                'content'   => esc_html__('Back To Top Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'footer_is_backtotop',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Back To Top?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => true,
            ),
            array(
                'id'        => 'footer_back_to_top_color',
                'type'      => 'link_color',
                'title'     => esc_html__('BTN Color', 'logisfare'),
                'output'    => array( '#backtotop' ), 
                'default' => array(
                    'color' => '#FFF',
                    'hover' => '#ec3900',
                ),
                'dependency' => array('footer_is_backtotop', '==', 'true'),
            ),
            array(
                'id'          => 'footer_bck_to_top_bg',
                'type'        => 'color',
                'title'       => esc_html__('Background Color', 'logisfare'),
                'output'      => '#backtotop',
                'output_mode' => 'background-color',
                'default'     => '#ec3900',
            ),
            array(
                'id'          => 'footer_bck_to_top_bg_hr',
                'type'        => 'color',
                'title'       => esc_html__('Hover Background Color', 'logisfare'),
                'output'      => '#backtotop:hover',
                'output_mode' => 'background-color',
                'default'     => '#161921',
            ),
            
        ),
    ));
}
