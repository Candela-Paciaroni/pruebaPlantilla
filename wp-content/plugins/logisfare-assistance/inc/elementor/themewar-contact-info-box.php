<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Contact_Info_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-contact-infoBox';
    }
    
    public function get_title() {
        return esc_html__( 'Contact Info', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Info Icon Box', 'themewar' ),
            ]
        );
                $this->add_control('logic_icon',[
                            'label' => esc_html__( 'Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare_call',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $this->add_control('box_sub_title', [
                            'label'         => esc_html__( 'Box Sub Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__('Call for Help', 'themewar'),
                            'label_block'   => TRUE,
                    ]
                );
                $this->add_control('box_title', [
                            'label'         => esc_html__( 'Contact Info Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__('info@example.com', 'themewar'),
                            'label_block'   => TRUE,
                    ]
                );
                $this->add_control( 'box_url', [
                            'label'             => esc_html__( 'Contact Info URL', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => true,
                                    'nofollow'       => true,
                            ],
                    ]
                );
                $this->add_responsive_control( 'box_alignment', [
                            'label'                     =>esc_html__( 'Box Alignment', 'themewar' ),
                            'type'                      => Controls_Manager::CHOOSE,
                            'options'                   => [
                                    ''       => [
                                            'title'  => esc_html__( 'Left', 'themewar' ),
                                            'icon'   => 'eicon-text-align-left',
                                    ],
                                    'center'     => [
                                            'title'  => esc_html__( 'Center', 'themewar' ),
                                            'icon'   => 'eicon-text-align-center',
                                    ],
                                    'right'      => [
                                            'title'  => esc_html__( 'Right', 'themewar' ),
                                            'icon'   => 'eicon-text-align-right',
                                    ]
                            ],
                            'default'                   => 'left',
                            'prefix_class'              => 'logis_callInfo elementor%s-align-',
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
        
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__('Box Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->start_controls_tabs( 'ib_box_tot' );
                    $this->start_controls_tab( 'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .abIconBox',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .abIconBox',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'box_border',
                                            'label' => esc_html__( 'Box Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .abIconBox',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg_hr',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .abIconBox:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow_hr',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .abIconBox:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'box_border_hr',
                                            'label' => esc_html__( 'Box Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .abIconBox:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .abIconBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ],
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2',[
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .abIconBox span i'
                        ]
                );
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .abIconBox span i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color',
                                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .abIconBox span',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Box Hover', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .abIconBox:hover span i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color_hover',
                                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .abIconBox:hover span',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                
                $this->add_responsive_control( 'icon_box_i_width', [
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
                                        '{{WRAPPER}} .abIconBox span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_height', [
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
                                        '{{WRAPPER}} .abIconBox span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'icon_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .abIconBox span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .abIconBox span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .abIconBox span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abIconBox span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .abIconBox span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_img',[
                'label'         => esc_html__('SVG Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);     
                $this->add_control('svg_more_options',[
                        'label' => esc_html__( 'SVG Icon Style', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->start_controls_tabs('svg_style_tabs');
                        $this->start_controls_tab('svg_style_normal_tab',[
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]);
                            $this->add_responsive_control( 'icon_box_svg_fill_nr',[
                                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox span svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke_width',[
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
                                                '{{WRAPPER}} .abIconBox span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                        ]
                                ]
                            );	
                            $this->add_responsive_control( 'icon_box_svg_width', [
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
                                                    '{{WRAPPER}} .abIconBox span svg' => 'width: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_height', [
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
                                                    '{{WRAPPER}} .abIconBox span svg' => 'height: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                        $this->end_controls_tab();
                        $this->start_controls_tab('svg_style_hover_tab',[
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]);
                            $this->add_responsive_control( 'icon_box_svg_fill_hr',[
                                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox:hover span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke_hr',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox:hover span svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('svg_hr',[ 'type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control( 'icon_box_area_img_width', [
                                'label' => esc_html__( 'SVG Area Width', 'themewar' ),
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
                                        '{{WRAPPER}} .abIconBox span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_area_img_height', [
                                'label' => esc_html__( 'SVG Area Height', 'themewar' ),
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
                                        '{{WRAPPER}} .abIconBox span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('svg_box_hr',[ 'type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->start_controls_tabs( 'ib_img_tot' );
                    $this->start_controls_tab( 'ib_img_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_svg_bgcolor',
                                            'label' => esc_html__( 'SVG Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .abIconBox span',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_img_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )] );
                            $this->add_group_control(
                                    Group_Control_Background::get_type(),
                                    [
                                            'name' => 'icon_box_hover_img_bgcolor_hr',
                                            'label' => esc_html__( 'Box Hover SVG Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .abIconBox:hover span',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_svg_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .abIconBox span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .abIconBox span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .abIconBox span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control(
                        'icon_box_svg_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_5',[
                'label'         => esc_html__('Contact Info Sub Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_sub_title_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .abIconBox p',
                        ]
                );
                $this->add_control('icon_box_sub_title_color',[
                                'label'     => esc_html__( 'Sub Title Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_sub_title_padding', [
                                'label'      => esc_html__( 'Sub Title Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abIconBox p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_sub_title_margin', [
                                'label'      => esc_html__( 'Sub Title Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abIconBox p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3',[
                'label'         => esc_html__('Contact Info Title Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .abIconBox h3',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_hover_title_color2343434',[
                                'label'     => esc_html__( 'Link Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abIconBox h3 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_title_padding', [
                                'label'      => esc_html__( 'Title Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abIconBox h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .abIconBox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();

        $logic_icon     = (isset($settings['logic_icon']) && $settings['logic_icon'] != '') ? $settings['logic_icon'] : 'logisfare_call';
        $box_sub_title  = (isset($settings['box_sub_title']) && $settings['box_sub_title'] != '') ? $settings['box_sub_title'] : esc_html__('Call for Help', 'themewar');
        $box_title      = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('info@example.com', 'themewar');
        
        $target         = isset($settings['box_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['box_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $url            = (isset($settings['box_url']['url']) && $settings['box_url']['url'] != '') ? $settings['box_url']['url'] : '';

        
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
            <div class="single abIconBox <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>  
                <p>
                    <?php echo logisfare_kses($box_sub_title); ?>
                </p>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3>
            </div>
        <?php
        
    }
    
    protected function content_template() {

    }
    
    
}