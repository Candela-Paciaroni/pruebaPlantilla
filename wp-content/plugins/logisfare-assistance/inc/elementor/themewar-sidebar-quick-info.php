<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Sidebar_Quick_Info_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-quick-info';
    }

    public function get_title() {
        return esc_html__('Quick Info Widget', 'themewar');
    }

    public function get_icon() {
        return 'eicon-tel-field';
    }

    public function get_categories() {
        return ['themewar-sidebar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Quick Info Widget', 'themewar' ),
            ]
        );
                $this->add_control(
                        'widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                        ]
                );
                
                $this->add_control('logic_btn_icon',[
                            'label' => esc_html__( 'Button Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-call2',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $this->add_control( 'widget_qm_heading', [
                                'label' => esc_html__( 'Quick Info Heading', 'themewar' ),
                                'type' => Controls_Manager::TEXTAREA,
                                'label_block'   => TRUE,
                                'default' => esc_html__( 'Want To Discuss About The Transport Facility?', 'themewar' ),
                        ]
                );
                $this->add_control( 'widget_qm_mail', [
                                'label' => esc_html__( 'Quick Info Address', 'themewar' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block'   => TRUE,
                                'default' => esc_html__( '+256 2156 3256', 'themewar' ),
                        ]
                );
                $this->add_control( 'mail_url', [
                            'label'             => esc_html__( 'Mail/Tel URL', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'tel:+25621563256', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => false,
                                    'nofollow'       => false,
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_logisAnimation', [
                'label' => esc_html__( 'LogisFare Animation', 'themewar' ),
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
        

        $this->start_controls_section('section_tab__wid', [
                        'label'         => esc_html__( 'Widget Style', 'themewar' ),
                        'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .serQuickEmail',
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                                'name' => 'widget_border',
                                'label' => esc_html__( 'Wdiget Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serQuickEmail',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name'      => 'widget_shadow',
                                'label'     => esc_html__( 'Widget Shadow', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .serQuickEmail',
                        ]
                );
                $this->add_responsive_control('widget_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serQuickEmail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_margin', [
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serQuickEmail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serQuickEmail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab__wid_title', [
                'label'         => esc_html__( 'Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_title_typo',
                                'label' => esc_html__( 'Title Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .widgetTitle',
                        ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2',[
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->start_controls_tabs('text_box_icon_tabs');
                        $this->start_controls_tab('style_icon_tab',[
                                'label' => esc_html__( 'Icon', 'themewar' ),
                        ]);
                                $this->add_group_control( Group_Control_Typography::get_type(), [
                                                'name'      => 'text_box_i_typography',
                                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .serQuickEmail i'
                                        ]
                                );
                                $this->add_responsive_control( 'text_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .serQuickEmail i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                        $this->end_controls_tab();

                        $this->start_controls_tab('style_svg_tab',[
                                'label' => esc_html__( 'SVG', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'text_box_svg_fill_nr',[
                                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .serQuickEmail span svg' => 'fill: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'text_box_svg_stroke',[
                                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .serQuickEmail span svg' => 'stroke: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'text_box_svg_stroke_width',[
                                            'label'     => esc_html__( 'SVG Stroke Width', 'themewar' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                                            'range' => [
                                                'px' => [
                                                    'min' => 0,
                                                    'max' => 100,
                                                    'step' => 0.1,
                                                ],
                                            ],
                                            'default' => [],
                                            'selectors' => [
                                                    '{{WRAPPER}} .serQuickEmail span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                            ]
                                    ]
                                );	
                                $this->add_responsive_control( 'text_box_svg_width', [
                                                'label' => esc_html__( 'SVG Width', 'themewar' ),
                                                'type' => Controls_Manager::SLIDER,
                                                'size_units' => [ 'px', '%' ],
                                                'range' => [
                                                        'px' => [
                                                                'min' => 0,
                                                                'max' => 1000,
                                                                'step' => 1,
                                                        ],
                                                        '%' => [
                                                                'min' => 0,
                                                                'max' => 100,
                                                        ],
                                                ],
                                                'default' => [],
                                                'selectors' => [
                                                        '{{WRAPPER}} .serQuickEmail span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'text_box_svg_height', [
                                                'label' => esc_html__( 'SVG Height', 'themewar' ),
                                                'type' => Controls_Manager::SLIDER,
                                                'size_units' => [ 'px', '%' ],
                                                'range' => [
                                                        'px' => [
                                                                'min' => 0,
                                                                'max' => 1000,
                                                                'step' => 1,
                                                        ],
                                                        '%' => [
                                                                'min' => 0,
                                                                'max' => 100,
                                                        ],
                                                ],
                                                'default' => [],
                                                'selectors' => [
                                                        '{{WRAPPER}} .serQuickEmail span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('text_box_hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'text_box_i_bg_color',
                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .serQuickEmail span',
                        ]
                );
                
                $this->add_responsive_control( 'text_box_i_width', [
                                'label' => __( 'Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'text_box_i_height', [
                                'label' => __( 'Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'text_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serQuickEmail span',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'text_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serQuickEmail span',
                        ]
                );
                $this->add_responsive_control( 'text_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serQuickEmail span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'text_box_i_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serQuickEmail span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'text_box_i_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .serQuickEmail span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_heading', [
                'label'         => esc_html__( 'Heading Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_heading_typo',
                                'label' => esc_html__( 'Heading Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serQuickEmail h3',
                        ]
                );
                $this->add_responsive_control( 'wid_heading_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail h3'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_heading_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serQuickEmail h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_button', [
                'label'         => esc_html__( 'Button Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'quick_info_btn_typo',
                                'label' => esc_html__( 'Heading Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serQuickEmail a',
                        ]
                );
                $this->add_responsive_control( 'quick_info_btn_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail a'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quick_info_btn_color_hr', [
                                'label' => esc_html__( 'Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail a:hover'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quick_info_btn_bg', [
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail a'   => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quick_info_btn_bg_hr', [
                                'label' => esc_html__( 'Hover Background', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serQuickEmail a:hover'   => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'quick_info_btn_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serQuickEmail a',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'quick_info_btn_border_hr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serQuickEmail a',
                    ]
                );
                $this->add_responsive_control( 'quick_info_btn_radius', [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .serQuickEmail a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
                );
                $this->add_responsive_control( 'quick_info_btn_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .serQuickEmail a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'quick_info_btn_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .serQuickEmail a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
       
        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $widget_qm_heading      = (isset($settings['widget_qm_heading']) && $settings['widget_qm_heading'] != '') ? $settings['widget_qm_heading'] : '';
        $logic_btn_icon         = (isset($settings['logic_btn_icon']) && $settings['logic_btn_icon'] != '') ? $settings['logic_btn_icon'] : '';
        $widget_qm_mail         = (isset($settings['widget_qm_mail']) && $settings['widget_qm_mail'] != '') ? $settings['widget_qm_mail'] : '';
        
        $target         = (isset($settings['mail_url']['is_external']) && $settings['mail_url']['is_external'] != '') ? ' target="_blank"' : '' ;
        $nofollow       = (isset($settings['mail_url']['nofollow']) && $settings['mail_url']['nofollow'] != '') ? ' rel="nofollow"' : '' ;
        $url            = (isset($settings['mail_url']['url']) && $settings['mail_url']['url'] != '') ? $settings['mail_url']['url'] : 'javascript:void(0);';

            
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.'' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.'' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay. '' : '');
        }
        
        
        ?>
        <aside class="serviceWidget serQuickEmail <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <div class="sdb-QuickEmail-content">
                <span><?php \Elementor\Icons_Manager::render_icon( $settings['logic_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                <?php if(!empty($widget_qm_heading)): ?>
                    <h3>
                        <?php echo logisfare_kses($widget_qm_heading); ?>
                    </h3>
                <?php endif; ?>
                <?php if(!empty($widget_qm_sub_heading)): ?>
                    <h5><?php echo esc_html($widget_qm_sub_heading); ?></h5>
                <?php endif; ?>
                <a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_attr($url); ?>"><?php echo esc_html($widget_qm_mail); ?></a>
            </div>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}