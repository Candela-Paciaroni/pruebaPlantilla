<?php
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Header Setting', 'logisfare'),
        'priority' => 4,
        'fields' => array(
            array(
                'type'    => 'heading',
                'content' => esc_html__('Header Settings', 'logisfare'),
            ), 
            array(
                'id' => 'header_style',
                'type' => 'select',
                'title' => esc_html__('Select Header Style', 'logisfare'),
                'placeholder' => esc_html__('Select Header Style', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'tw-header-builder',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
            ),
            array(
                'id' => 'header_is_sticky',
                'type' => 'switcher',
                'title' => esc_html__('Enable Sticky', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
                'dependency' => array('header_style', '==', ''),
            ),
            array(
                'id' => 'header_logo',
                'type' => 'upload',
                'library' => 'image',
                'preview' => true,
                'title' => esc_html__('Logo', 'logisfare'),
                'description' => esc_html__('Upload your site logo. Default logo size 145x41px.', 'logisfare'),
                'dependency' => array('header_style', '==', ''),
            ),

            
        ),
    ));
}
