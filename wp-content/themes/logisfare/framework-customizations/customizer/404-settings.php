<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('404 Settings', 'logisfare'),
        'priority' => 22,
        'fields' => array(
            
            array(
                'type'      => 'heading',
                'content'   => esc_html__('Banner Settings', 'logisfare'),
            ),
            array(
                'id'        => 'fof_is_banner',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Banner?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => true,
            ),
            array(
                'id'        => 'fof_is_banner_block',
                'type'      => 'select',
                'title'     => esc_html__('Select Banner Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Style', 'logisfare'),
                'options'   => 'posts',
                'query_args' => array(
                    'post_type'     => 'blocks',
                    'posts_per_page' => -1,
                    'order'     => 'ASC',
                ),
                'dependency'    => array('fof_is_banner', '==', 'true'),
            ),
            array(
                'type'    => 'heading',
                'content' => esc_html__('404 Content Settings', 'logisfare'),
            ),
            array(
                'id'        => 'fof_is_content',
                'type'      => 'switcher',
                'title'     => esc_html__('Is 404 Content Blocks?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => false,
            ),
            array(
                'id'        => 'fof_is_content_block',
                'type'      => 'select',
                'title'     => esc_html__('Select Content Blocks', 'logisfare'),
                'placeholder' => esc_html__('Select Content Style', 'logisfare'),
                'options'   => 'posts',
                'query_args' => array(
                    'post_type'     => 'blocks',
                    'posts_per_page' => -1,
                    'order'     => 'ASC',
                ),
                'dependency'    => array('fof_is_content', '==', 'true'),
            ),
            array(
                'id'        => 'fof_contents',
                'type'      => 'textarea',
                'title'     => esc_html__('404 Contents', 'logisfare'),
                'default'   => esc_html__("The Link You Followed Probably Broken, or the page has been removed...", 'logisfare'),
                'dependency' => array('fof_is_content', '==', 'false'),
            ),
            array(
                'id'        => 'fof_hbtn_label',
                'type'      => 'text',
                'title'     => esc_html__('Home Btn Label', 'logisfare'),
                'default'   => esc_html__("Back To Home", 'logisfare'),
                'dependency' => array('fof_is_content', '==', 'false'),
            ),


        )
    ));

}