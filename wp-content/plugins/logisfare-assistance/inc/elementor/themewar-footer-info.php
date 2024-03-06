<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Info_Widgets extends Widget_Base {
    public function get_name() {
        return 'tw-info';
    }

    public function get_title() {
        return esc_html__('Contact Info', 'themewar');
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return ['themewar-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Info', 'themewar' ),
        ]);
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control('info_icon',[
                                    'label' => esc_html__( 'Icon', 'themewar' ),
                                    'type' => Controls_Manager::ICONS,
                                    'label_block'   => TRUE,
                                    'default' => [
                                        'value' => 'logisfare-call1',
                                        'library' => 'tw_icon',
                                    ],
                            ]
                        );
                        $repeater->add_control( 'info_title', [
                                        'label'         => esc_html__( 'Info Title', 'themewar' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'label_block'   => true,
                                        'placeholder'   => esc_html__('Type your Info Title...', 'themewar'),
                                        'default'       => esc_html__('Phone Number', 'themewar'),
                                ]
                        );
                        $repeater->add_control( 'info_lable', [
                                        'label'         => esc_html__( 'Info Lable', 'themewar' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'label_block'   => true,
                                        'placeholder'   => esc_html__('Type your Info Lable...', 'themewar'),
                                        'default'       => esc_html__('+20221562145', 'themewar'),
                                        'saperator'     => 'after',
                                ]
                        );
                        $repeater->add_control( 'info_url', [
                                    'label'             => esc_html__( 'Info URL', 'themewar' ),
                                    'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
                                    'type'              => Controls_Manager::URL,
                                    'input_type'        => 'url',
                                    'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                                    'show_external'     => true,
                                    'default'           => [
                                            'url'            => '',
                                            'is_external'    => false,
                                            'nofollow'       => false,
                                    ],
                            ]
                        );
                $this->add_control('list', [
                                'label'         => esc_html__( 'Info Item', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'info_icon'         => esc_html__( 'logisfare-call', 'themewar' ),
                                                'info_title'        => esc_html__('Phone Number', 'themewar'),
                                                'info_lable'        => esc_html__( '+20221562145', 'themewar' ),
                                                'info_url'          => '',

                                        ],
                                ],
                                'title_field' => '{{{ info_title }}}',
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
                'label'         => esc_html__( 'Widget Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'info_widget_area_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'info_widget_area_border',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_responsive_control( 'info_widget_bdr_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .footerWidget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('info_widget_area_mr', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .footerWidget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'info_widget_area_pd', [
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .footerWidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Info Items', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'info_items_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .fContact_info',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fContact_info_bdr',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .fContact_info',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'fContact_info_shadow',
                                'label' => esc_html__( 'Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .fContact_info',
                        ]
                );
                $this->add_responsive_control( 'fContact_info_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .fContact_info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('fContact_info_mar', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fContact_info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fContact_info_pd', [
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fContact_info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Info Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
        
                $this->add_group_control( Group_Control_Typography::get_type(),[
                            'name'      => 'info_title_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .fContact_info p',
                    ]
                );
                $this->add_responsive_control('info_title_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .fContact_info p' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_responsive_control('info_title_mr',[
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fContact_info p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('info_title_pd',[
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fContact_info p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__( 'Info Lable', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(),[
                                'name'      => 'info_tlable_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .fContact_info h3',
                        ]
                );
                $this->add_responsive_control('info_tlable_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .fContact_info h3' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_responsive_control('info_tlable_color_hr', [
                                'label'		 => esc_html__( 'Link Hover Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .fContact_info h3 a:hover' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_responsive_control('info_tlable_mr',[
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fContact_info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('info_tlable_pd',[
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fContact_info h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_6',[
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
                                                'selector'  => '{{WRAPPER}} .fContact_info i'
                                        ]
                                );
                                $this->add_responsive_control( 'text_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .fContact_info i' => 'color: {{VALUE}}',
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
                                                    '{{WRAPPER}} .fContact_info span svg' => 'fill: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'text_box_svg_stroke',[
                                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .fContact_info span svg' => 'stroke: {{VALUE}}',
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
                                                    '{{WRAPPER}} .fContact_info span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                                        '{{WRAPPER}} .fContact_info span svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                                        '{{WRAPPER}} .fContact_info span svg' => 'height: {{SIZE}}{{UNIT}};',
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
                                'selector' => '{{WRAPPER}} .fContact_info span',
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
                                        '{{WRAPPER}} .fContact_info span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .fContact_info span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'text_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .fContact_info span',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'text_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .fContact_info span',
                        ]
                );
                $this->add_responsive_control( 'text_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fContact_info span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'text_box_i_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .fContact_info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'text_box_i_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fContact_info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();

        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $list                   = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
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


        
        
        ?>
        <aside class="footerWidget getInTouch <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <div class="fContact_info"><?php 
                    foreach ($list as $key => $item):

                        $info_icon      = (isset($item['info_icon']) && $item['info_icon'] != '') ? $item['info_icon'] : array();
                        $info_title     = (isset($item['info_title']) && $item['info_title'] != '') ? $item['info_title'] : '';
                        $info_lable     = (isset($item['info_lable']) && $item['info_lable'] != '') ? $item['info_lable'] : '';
                        
                        $target         = (isset($item['info_url']['is_external']) && $item['info_url']['is_external'] != '') ? ' target=_blank' : '' ;
                        $nofollow       = (isset($item['info_url']['nofollow']) && $item['info_url']['nofollow'] != '') ? ' rel=nofollow' : '' ;
                        $url            = (isset($item['info_url']['url']) && $item['info_url']['url'] != '') ? $item['info_url']['url'] : '';

                        if(!empty($info_icon)): 
                    ?>
                    <span>
                        <?php \Elementor\Icons_Manager::render_icon( $item['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <?php endif; 
                    if($info_title != ''): ?>
                        <p><?php echo logisfare_kses($info_title); ?></p>
                    <?php endif; 
                    if($info_lable != ''): ?>
                        <h3>
                            <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($info_lable); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                        </h3>
                    <?php endif; endforeach; ?>
                </div>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}