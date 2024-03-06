<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_logisfare_page_meta';
    CSF::createMetabox($section_id, array(
        'title' => esc_html__('Page Setting', 'logisfare'),
        'post_type' => 'page',
        'show_restore' => false,
        'theme' => 'light',
        'nav' => 'inline',

    ));

    //Header Settings
    CSF::createSection($section_id, array(
        'title' => esc_html__('Header Setting', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'page_header_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Enable header', 'logisfare'),
                'desc' => esc_html__('Do you want to enable custom header settings for this page?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            ),
            array(
                'id' => 'page_header_style',
                'type' => 'select',
                'title' => esc_html__('Select Header Style', 'logisfare'),
                'placeholder' => esc_html__('Select Header Style', 'logisfare'),
                'desc' => esc_html__('Select page header for this page.', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'tw-header-builder',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('page_header_enabled', '==', 'true'),
            ),
        ),
    ));

    //Footer Settings
    CSF::createSection($section_id, array(
        'title' => esc_html__('Footer Settings', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'page_footer_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Enable Setting', 'logisfare'),
                'desc' => esc_html__('Do you want to enable custom footer settings for this page?', 'logisfare'),
                'text_on' => 'Yes',
                'text_off' => 'No',
                'default' => false,
            ),
            array(
                'id' => 'page_footer_style',
                'type' => 'select',
                'title' => esc_html__('Select Footer Style', 'logisfare'),
                'placeholder' => esc_html__('Select Footer Style', 'logisfare'),
                'desc' => esc_html__('Select page footer for this page.', 'logisfare'),
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'tw-footer-builder',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
                'dependency' => array('page_footer_enabled', '==', 'true'),
            ),
        ),
    ));

    // Template Page Banner
    CSF::createSection($section_id, array(
        'title' => esc_html__('Template Page Banner', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'page_banner_style',
                'type' => 'select',
                'title' => esc_html__('Select Banner Block', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Block', 'logisfare'),
                'desc' => esc_html__('This option only work if you using page templates for this page.', 'logisfare'),
                'options' => 'posts',
                'ajax' => true,
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
            ),
        ),
    ));
}
