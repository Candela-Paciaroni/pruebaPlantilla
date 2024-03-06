<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$all_header = array(
    '0' => esc_html__('Default Header', 'logisfare')
);
global $wpdb; 
$table = $wpdb->prefix.'posts';

$sql = $wpdb->prepare("SELECT * FROM $table WHERE post_type = %s and post_status = %s order by post_title ASC", array('tw-header-builder', 'publish'));
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_header[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

$all_footer = array(
    '0' => esc_html__('Default Footer', 'logisfare')
);
$table = $wpdb->prefix.'posts';

$sql = $wpdb->prepare("SELECT * FROM $table WHERE post_type = %s and post_status = %s order by post_title ASC", array('tw-footer-builder', 'publish'));
$results = $wpdb->get_results($sql, ARRAY_A);

if(!empty($results)):
    foreach ($results as $rs):
        $all_footer[$rs['ID']] = $rs['post_title'];
    endforeach;
endif;

$all_blocks = array(
    '0' => esc_html__('None', 'logisfare')
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
	'mains' => array(
		'title'   => esc_html__( 'Page Settings Box', 'logisfare' ),
		'type'    => 'box',
		'options' => array( 
                        'pageheadersettings' => array(
                                'title'   => esc_html__( 'Custom Header Settings', 'logisfare' ),
                                'type'    => 'tab',
                                'options' => array(
                                        'page_header_enabled'     => array(
                                                'type'  => 'switch',
                                                'value' => '2',
                                                'label' => esc_html__('Enable Setting', 'logisfare'),
                                                'desc'  => esc_html__('Do you want to enable custom header settings for this page?', 'logisfare'),
                                                'right-choice' => array(
                                                    'value' => '1',
                                                    'label' => esc_html__('Yes', 'logisfare'),
                                                ),
                                                'left-choice' => array(
                                                    'value' => '2',
                                                    'label' => esc_html__('No', 'logisfare'),
                                                ),
                                        ),
                                        'page_header_style'         => array(
                                                'type'    => 'select',
                                                'value'   => '0',
                                                'label'   => esc_html__('Select Header Style', 'logisfare'),
                                                'desc'    => esc_html__('Select page header for this page.', 'logisfare'),
                                                'choices' => $all_header
                                        ),
                                )
                        ),
                        'footersettings'  => array(
                                'title'   => esc_html__( 'Custom Footer Settings', 'logisfare' ),
                                'type'    => 'tab',
                                'options' => array(
                                    'page_footer_enabled'   => array(
                                            'type'          => 'switch',
                                            'value'         => '2',
                                            'label'         => esc_html__('Enable Setting', 'logisfare'),
                                            'desc'          => esc_html__('Do you want to enable custom footer settings for this page?', 'logisfare'),
                                            'right-choice'  => array(
                                                'value'     => '1',
                                                'label'     => esc_html__('Yes', 'logisfare'),
                                            ),
                                            'left-choice'   => array(
                                                'value'     => '2',
                                                'label'     => esc_html__('No', 'logisfare'),
                                            ),
                                    ),
                                    'page_footer_style' => array(
                                            'label'     => esc_html__( 'Select Footer Style', 'logisfare' ),
                                            'type'      => 'select',
                                            'value'     => '0',
                                            'choices'   => $all_footer
                                    ),
                            ),
                        ),
                        'banner_settings'  => array(
                                'title'   => esc_html__( 'Template Page Banner', 'logisfare' ),
                                'type'    => 'tab',
                                'options' => array(
                                    'page_banner_block_id' => array(
                                            'label'     => esc_html__( 'Page Banner Block', 'logisfare' ),
                                            'type'      => 'select',
                                            'value'     => '0',
                                            'choices'   => $all_blocks,
                                            'desc'          => esc_html__('This option only work if you using page templates for this page.', 'logisfare'),
                                    ),
                            ),
                        )
		),
	),
);
