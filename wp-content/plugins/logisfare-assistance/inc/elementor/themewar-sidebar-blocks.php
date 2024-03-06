<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Blocks_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-blocks';
    }
    
    public function get_title() {
        return esc_html__( 'Blocks Widget', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-background';
    }

    public function get_categories() {
        return [ 'themewar-sidebar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section( 'section_tab', [
                'label' => esc_html__( 'Sidebar Block', 'themewar' ),
        ]);      
                $this->add_control('block',[
                        'label' => esc_html__( 'Select Block', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '0',
                        'options' => logisfare_post_array('blocks', esc_html__('None', 'themewar')),
                ]);
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $block              = (isset($settings['block']) && $settings['block'] > 0) ? $settings['block'] : 0;
        if($block != '' && $block > 0 && class_exists('THEMEWAR_Assistance')):
            \Themewar_Builder::render_template($block);
        endif;
    }
    
    protected function content_template() {
        
    }
}