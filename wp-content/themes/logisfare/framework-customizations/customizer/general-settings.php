<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('General Settings', 'logisfare'),
        'priority' => 1,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Global Site Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'show_preloader',
                'type'      => 'switcher',
                'title'     => esc_html__('Show Preloader', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => false,
            ),
            array(
                'id'          => 'preloader_bg',
                'type'        => 'color',
                'title'       => esc_html__('Background Color', 'logisfare'),
                'default'     => '#181818',
                'output'      => '.preloader',
                'output_mode' => 'background-color',
                'dependency' => array('show_preloader', '==', 'true'),
            ),
            array(
                'id'         => 'proloader',
                'type'       => 'image_select',
                'title'      => esc_html__( 'Preloader', 'logisfare' ),
                'default'    => '0',
                'options'    => array(
                    '0'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/0.jpg',
                    '1'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/1.jpg',
                    '2'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/2.jpg',
                    '3'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/3.jpg',
                    '4'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/4.jpg',
                    '5'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/5.jpg',
                    '6'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/6.jpg',
                    '7'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/7.jpg',
                    '8'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/8.jpg',
                    '9'    => LOGISFARE_ASSETS_IMAGES_URL . '/options/9.jpg',
                    '10'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/10.jpg',
                    '11'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/11.jpg',
                    '12'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/12.jpg',
                    '13'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/13.jpg',
                    '14'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/14.jpg',
                    '15'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/15.jpg',
                    '16'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/16.jpg',
                    '17'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/17.jpg',
                    '18'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/18.jpg',
                    '19'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/19.jpg',
                    '20'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/20.jpg',
                    '21'   => LOGISFARE_ASSETS_IMAGES_URL . '/options/21.jpg',
                ),
                'dependency' => array('show_preloader', '==', 'true'),
            ), 
            array(
                'id'      => 'logo_preloader',
                'type'    => 'media',
                'title'   => esc_html__('Logo Preloader', 'logisfare'),
                'library' => 'image',
                'preview' => 'false',
                'dependency' => array('proloader', '==', '21'),
            ),
            array(
                'id'          => 'map_api',
                'type'        => 'text',
                'title'       => esc_html__( 'Google Map API Key', 'logisfare' ),
                'default'     =>  '',
            ),

            
        )
    ));
}
