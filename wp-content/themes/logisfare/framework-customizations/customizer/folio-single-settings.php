<?php 
if (!defined('ABSPATH')) {die;}
if (class_exists('CSF')) {

    CSF::createSection($section_id, array(
        'parent'    => 'theme_options',
        'title' => esc_html__('Folio Single Settings', 'logisfare'),
        'priority' => 10,
        'fields' => array(
            
            array(
                'type'    => 'heading',
                'content' => esc_html__('Banner Settings', 'logisfare'),
            ), 
            array(
                'id'        => 'folio_single_is_banner',
                'type'      => 'switcher',
                'title'     => esc_html__('Is Banner?', 'logisfare'),
                'text_on'   => 'Yes',
                'text_off'  => 'No',
                'default'   => true,
            ),
            array(
                'id'        => 'folio_single_banner_block',
                'type'      => 'select',
                'title'     => esc_html__('Banner Block', 'logisfare'),
                'placeholder'   => esc_html__('Select Banner Block', 'logisfare'),
                'desc'          => esc_html__( 'You will find block in your WP Admin dashboard.', 'logisfare' ),
                'options'   => 'posts',
                'query_args'=> array(
                    'post_type'     => 'blocks',
                    'posts_per_page'=> -1,
                    'order'     => 'ASC',
                ),
                'dependency' => array('folio_single_is_banner', '==', 'true'),
            ),
        
        )
    ));

}
