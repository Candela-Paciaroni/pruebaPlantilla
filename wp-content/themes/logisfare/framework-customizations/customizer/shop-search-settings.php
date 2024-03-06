<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Shop Search Settings', 'logisfare'),
        'priority' => 19,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Banner Settings', 'logisfare'),
            ),
            array(
                'id' => 'shop_src_is_banner',
                'type' => 'switcher',
                'title' => esc_html__('Is Banner?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => true,
            ),
            array(
                'id' => 'shop_src_banner_block',
                'type' => 'select',
                'title' => esc_html__('Select Banner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Blocks', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('shop_src_is_banner', '==', 'true'),
            ),


        )
    ));

}
