<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Fw_Widget_Tittle_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-fw-title';
    }

    public function get_title() {
        return esc_html__('Widget Title', 'themewar');
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return ['themewar-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Widget Title', 'themewar' ),
        ]);
                $this->add_control( 'title', [
                            'label'         => esc_html__( 'Widget Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'saperator'     => 'after'
                    ]
                );
        $this->end_controls_section();
 
        $this->start_controls_section('section_tab_bzAnimation', [
                'label' => esc_html__( 'Logisfare Animation', 'themewar' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
        ]);
                $this->add_control('is_animation',[
                                'label' => esc_html__( 'Is Animation', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'label_on' => esc_html__( 'Yes', 'themewar' ),
                                'label_off' => esc_html__( 'No', 'themewar' ),
                                'return_value' => 'yes',
                                'default' => 'no',
                        ]
                );
                $this->add_control('animation_name',[
                                'label' => esc_html__( 'Set Animation', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'label_block' => true,
                                'multiple' => true,
                                'default' => 'none',
                                'options' => [
                                    'none'              => esc_html__( 'none', 'themewar' ),
                                    'fade'              => esc_html__( 'fade', 'themewar' ),
                                    'fade-up'           => esc_html__( 'fade-up', 'themewar' ),
                                    'fade-down'         => esc_html__( 'fade-down', 'themewar' ),
                                    'fade-left'         => esc_html__( 'fade-left', 'themewar' ),
                                    'fade-right'        => esc_html__( 'fade-right', 'themewar' ),
                                    'fade-up-right'     => esc_html__( 'fade-up-right', 'themewar' ),
                                    'fade-up-left'      => esc_html__( 'fade-up-left', 'themewar' ),
                                    'fade-down-right'   => esc_html__( 'fade-down-right', 'themewar' ),
                                    'fade-down-left'    => esc_html__( 'fade-down-left', 'themewar' ),
                                    'flip-up'           => esc_html__( 'flip-up', 'themewar' ),
                                    'flip-down'         => esc_html__( 'flip-down', 'themewar' ),
                                    'flip-left'         => esc_html__( 'flip-left', 'themewar' ),
                                    'flip-right'        => esc_html__( 'flip-right', 'themewar' ),
                                    'slide-up'          => esc_html__( 'slide-up', 'themewar' ),
                                    'slide-down'        => esc_html__( 'slide-down', 'themewar' ),
                                    'slide-left'        => esc_html__( 'slide-left', 'themewar' ),
                                    'slide-right'       => esc_html__( 'slide-right', 'themewar' ),
                                    'zoom-in'           => esc_html__( 'slide-zoom-in', 'themewar' ),
                                    'zoom-in-up'        => esc_html__( 'slide-in-up', 'themewar' ),
                                    'zoom-in-down'      => esc_html__( 'slide-in-down', 'themewar' ),
                                    'zoom-in-left'      => esc_html__( 'slide-in-left', 'themewar' ),
                                    'zoom-in-right'     => esc_html__( 'slide-in-right', 'themewar' ),
                                    'zoom-out'          => esc_html__( 'slide-out', 'themewar' ),
                                    'zoom-out-up'       => esc_html__( 'slide-out-up', 'themewar' ),
                                    'zoom-out-down'     => esc_html__( 'slide-out-down', 'themewar' ),
                                    'zoom-out-left'     => esc_html__( 'slide-out-left', 'themewar' ),
                                    'zoom-out-right'    => esc_html__( 'slide-out-right', 'themewar' ),
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_animation',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control('animation_duration_id',[
                                'label' => esc_html__( 'Animation Duration(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 50,
                                'default' => 1000,
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_animation',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control('animation_delay',[
                                'label' => esc_html__( 'Animation Delay(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 50,
                                'default' => 50,
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_animation',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();



        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__( 'Widget Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('mt_widget_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fw_widgetTitle' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'mt_widget_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .fw_widgetTitle',
                    ]
                );
                $this->add_responsive_control( 'mt_widget_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fw_widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('mt_widget_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fw_widgetTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control('widget_title_heading',[
                            'label' => esc_html__( 'Widget Title After', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_title_shape',
                                'label' => esc_html__( 'Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .widgetTitle:after',
                        ]
                );
                $this->add_responsive_control('widget_title_shape_w',[
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_title_shape_h',[
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'widget_shape_position', [
                            'label' => esc_html__( 'Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle:after' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }



        $title                  = (isset($settings['title']) && !empty($settings['title'])) ? $settings['title'] : '';
        
        if($title != ''): ?>
            <aside class="footerWidget">
                <h3 class="widgetTitle <?php echo $animClass; ?>" <?php echo $animAttr; ?>><?php echo logisfare_kses($title); ?></h3>
            </aside>
        <?php endif;

    }
    
    protected function content_template() {}
}