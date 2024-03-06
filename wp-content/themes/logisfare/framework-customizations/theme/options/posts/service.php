<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

global $wpdb; 
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
        '_service_meta' => array(
                'title'          => esc_html__( 'Service Settings', 'logisfare' ),
                'type'           => 'box',
                'priority'       => 'high',
                'context'        => 'side',
                'options'        => array(
                        'service_icon'                      => array(
                                'label' => esc_html__('Service Icon', 'logisfare'),
                                'type'  => 'icon-v2',
                        ),
                        '_service_excerpt'              => array(
                                'label'   => esc_html__('Service Excerpt', 'logisfare'),
                                'type'    => 'textarea',
                                'value'   => '',
                                'desc'    => esc_html__( 'Insert post excerpt here', 'logisfare' )
                        ),
                ),
        ),
);
