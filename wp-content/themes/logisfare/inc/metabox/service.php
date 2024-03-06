<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_service_meta';
    CSF::createMetabox($section_id, array(
        'title' => esc_html__('Service Setting', 'logisfare'),
        'post_type' => 'service',
        'show_restore' => false,
        'context'   => 'side',
        'priority'  => 'high',
        'theme' => 'light',
        'nav' => 'inline',

    ));
    CSF::createSection($section_id, array(
        'fields' => array(
            array(
                'id'    => 'service_icon',
                'type'  => 'icon',
                'title' => 'Service Icon',
            ),
            array(
                'id'      => 'service_excerpt',
                'type'    => 'textarea',
                'title'   => 'Service Excerpt',
                'default' => ''
            ),
        ),
    ));

}