<?php
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Color Preset Setting', 'logisfare'),
        'priority' => 3,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Color Presets', 'logisfare'),
            ),
            array(
                'id'        => 'preset_primary_color',
                'type'      => 'color',
                'title'     => esc_html__('Primary Color', 'logisfare'),
                'output'    => array(':root'),
                'output_mode' => '--tw-primary-color',
                'default'   => '#EC3900', 
            ),
            array(
                'id'        => 'preset_secondary_color',
                'type'      => 'color',
                'title'     => esc_html__('Secondary Color', 'logisfare'),
                'output'    => array(':root'),
                'output_mode'=> '--tw-secondary-color',
                'default'   => '#161921',
            ),
            array(
                'id'        => 'preset_body_color',
                'type'      => 'color',
                'title'     => esc_html__('Body Color', 'logisfare'),
                'output'    => array(':root'),
                'output_mode'=> '--tw-body-color',
                'default'   => '#74787C',
            ),
            array(
                'id'        => 'preset_white_color',
                'type'      => 'color',
                'title'     => esc_html__('White Color', 'logisfare'),
                'output'    => array(':root'),
                'output_mode'=> '--tw-white-color',
                'default'   =>  '#FFFFFF',
            ),

        ),
    ));
}