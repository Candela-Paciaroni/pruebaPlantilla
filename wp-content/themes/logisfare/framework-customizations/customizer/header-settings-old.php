<?php
$headers = Kirki_Helper::get_posts([
    'post_type'     => 'tw-header-builder',
    'post_status'   => 'publish',
    'posts_per_page'  => -1,
    'orderby'        => 'title',
    'order'          => 'ASC'
]);
$headers['-1'] = esc_html__('None', 'logisfare');

$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_01',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Settings', 'logisfare') . '</div>',
);
$fields[] = array(
    'type'      => 'select',
    'settings'  => 'header_style',
    'label'     => esc_html__('Header Style', 'logisfare'),
    'section'   => 'header_settings',
    'default'   => '-1',
    'choices'   => $headers,
);
//Main Header Settings
$fields[]       = array(
    'type'      => 'custom',
    'settings'  => 'header_custom_04',
    'label'     => FALSE,
    'section'   => 'header_settings',
    'default'   => '<div class="customizer_label">' . esc_html__('Header Settings', 'logisfare') . '</div>',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '-1'
        ),
    ),
);
$fields[]       = array(
    'type'      => 'switch',
    'settings'  => 'header_is_sticky',
    'label'     => esc_html__('Is Sticky?', 'logisfare'),
    'section'   => 'header_settings',
    'default'   => '2',
    'choices'   => [
        'on'    => esc_html__('Enable ', 'logisfare'),
        'off'   => esc_html__('Disable ', 'logisfare'),
    ],
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '-1'
        ),
    ),
);
$fields[]           = array(
    'type'          => 'image',
    'settings'      => 'header_logo',
    'label'         => esc_html__('Logo', 'logisfare'),
    'description'   => esc_html__('Upload your site logo. Default logo size 145x41px.', 'logisfare'),
    'section'       => 'header_settings',
    'default'       => '',
    'active_callback' => array(
        array(
            'setting'   => 'header_style',
            'operator'  => '==',
            'value'     => '-1'
        ),
    ),
);