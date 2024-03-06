<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Icon_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-icon-box';
    }
    
    public function get_title() {
        return esc_html__( 'Icon Box', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Icon Box', 'themewar' ),
            ]
        );
                $this->add_control( 'box_style', [
                            'label'     => esc_html__( 'Icon Box Style', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Style 01', 'themewar' ),
                                    2       => esc_html__( 'Style 02', 'themewar' ),
                                    3       => esc_html__( 'Style 03', 'themewar' ),
                                    4       => esc_html__( 'Style 04', 'themewar' ),
                                    5       => esc_html__( 'Style 05', 'themewar' ),
                                    6       => esc_html__( 'Style 06', 'themewar' ),
                                    7       => esc_html__( 'Style 07', 'themewar' ),
                                    8       => esc_html__( 'Style 08', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control('logic_icon',[
                            'label' => esc_html__( 'Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-parcel',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $this->add_control('list_title', [
                            'label'         => esc_html__( 'List Number', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__('01', 'themewar'),
                            'label_block'   => TRUE,
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );

                $this->add_control('box_sub_title', [
                            'label'         => esc_html__( 'Box Sub Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__('Phone Number', 'themewar'),
                            'label_block'   => TRUE,
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '==',
                                            'value'     => '4',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('box_title', [
                            'label'         => esc_html__( 'Box Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__('Box Title', 'themewar'),
                            'label_block'   => TRUE,
                    ]
                );
                $this->add_control( 'box_desc', [
                            'label'         => esc_html__( 'Box Content', 'themewar' ),
                            'type'          => Controls_Manager::TEXTAREA,
                            'default'       => esc_html__('Box content goes here.', 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '!in',
                                            'value'     => ['4', '5'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'box_url', [
                            'label'             => esc_html__( 'Box URL', 'themewar' ),
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
                $this->add_control( 'btn_text', [
                            'label'     => esc_html__( 'BTN Text', 'themewar' ),
                            'type'      => Controls_Manager::TEXT,
                            'label_block'   => TRUE,
                            'placeholder'   => esc_html__( 'Learn More', 'themewar' ),
                            'default'       => esc_html__( 'Learn More', 'themewar' ),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '!in',
                                            'value'     => ['2','3','4','5','6'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('logic_btn_icon',[
                            'label' => esc_html__( 'Button Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-right-arrow',
                                'library' => 'tw_icon',
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '!in',
                                            'value'     => ['2','3','4','5','6'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'btn_url', [
                            'label'             => esc_html__( 'Button URL', 'themewar' ),
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
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'box_style',
                                            'operator'  => '!in',
                                            'value'     => ['2','3','4','5','6'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'box_alignment', [
                            'label'                     =>esc_html__( 'Text Alignment', 'themewar' ),
                            'type'                      => Controls_Manager::CHOOSE,
                            'options'                   => [
                                    'left'       => [
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
                            'prefix_class'              => 'logis_holder elementor%s-align-',
                    ]
                );
                $this->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control( 'icon_box4_width', [
                                'label' => __('Box Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox04' => 'max-width: {{SIZE}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box04_alignment', [
                    'label'                     =>esc_html__( 'Box Alignment', 'themewar' ),
                    'type'                      => Controls_Manager::CHOOSE,
                    'options'                   => [
                            'left'       => [
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
                    'prefix_class'              => 'logis_box_align-',
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
                                            'selector' => '{{WRAPPER}} .iconBox01, {{WRAPPER}} .iconBox02, {{WRAPPER}} .iconBox03, {{WRAPPER}} .iconBox04, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox07, {{WRAPPER}} .iconBox08',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox01, {{WRAPPER}} .iconBox02,  {{WRAPPER}} .iconBox03, {{WRAPPER}} .iconBox04, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox07, {{WRAPPER}} .iconBox08',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'box_border',
                                            'label' => esc_html__( 'Box Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox01, {{WRAPPER}} .iconBox02, {{WRAPPER}} .iconBox03, {{WRAPPER}} .iconBox04, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox07, {{WRAPPER}} .iconBox08',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg_hr',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01:hover, {{WRAPPER}} .iconBox02:hover,{{WRAPPER}} .iconBox03:hover, {{WRAPPER}} .iconBox04:hover, {{WRAPPER}} .iconBox05:hover, {{WRAPPER}} .iconBox06:hover, {{WRAPPER}} .iconBox07:hover, {{WRAPPER}} .iconBox08:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow_hr',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox01:hover, {{WRAPPER}} .iconBox02:hover, {{WRAPPER}} .iconBox03:hover, {{WRAPPER}} .iconBox04:hover, {{WRAPPER}} .iconBox05:hover, {{WRAPPER}} .iconBox06:hover, {{WRAPPER}} .iconBox07:hover, {{WRAPPER}} .iconBox08:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'box_border_hr',
                                            'label' => esc_html__( 'Box Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox01:hover, {{WRAPPER}} .iconBox02:hover, {{WRAPPER}} .iconBox03:hover, {{WRAPPER}} .iconBox04:hover, {{WRAPPER}} .iconBox05:hover, {{WRAPPER}} .iconBox06:hover, {{WRAPPER}} .iconBox07:hover, {{WRAPPER}} .iconBox08:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ],
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1b', [
                    'label'         => esc_html__('Box Shape Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'box_style',
                                    'operator'  => 'in',
                                    'value'     => ['3'],
                            ]
                        ],
                    ],
                ]
        );
                $this->start_controls_tabs( 'ib_shap_tab' );
                    $this->start_controls_tab( 'ib_shap_tab_nt', [ 'label' => esc_html__( 'Box Normal', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_shape_bg',
                                            'label' => esc_html__( 'Box Shape Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox03 span:after',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_shap_tab_nh', [ 'label' => esc_html__( 'Box Hover', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_hover_shape_bg',
                                            'label' => esc_html__( 'Box Hover Shape Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox03:hover span:after',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2',[
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'box_style',
                            'operator' => '!in',
                            'value'     => ['5'],
                        ],
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 .ibIcon i, {{WRAPPER}} .iconBox02 span i, {{WRAPPER}} .iconBox03 span i, {{WRAPPER}} .iconBox04 span i, {{WRAPPER}} .iconBox05 span i, {{WRAPPER}} .iconBox06 span i, {{WRAPPER}} .iconBox07 span i, {{WRAPPER}} .iconBox08 span i'
                        ]
                );
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox01 .ibIcon i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox02 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox03 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox04 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox06 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox07 span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox08 span i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color',
                                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox01 .ibIcon, {{WRAPPER}} .iconBox02 span, {{WRAPPER}} .iconBox03 span, {{WRAPPER}} .iconBox04 span, {{WRAPPER}} .iconBox05 span, {{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox07 span, {{WRAPPER}} .iconBox08 span',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name' => 'icon_box07_i_border_nr',
                                                'label' => esc_html__( 'Border', 'themewar' ),
                                                'selector' => '{{WRAPPER}} .iconBox08 span', 
                                                'conditions' => [
                                                    'terms' => [
                                                        [
                                                            'name' => 'box_style',
                                                            'operator' => 'in',
                                                            'value'     => ['8'],
                                                        ],
                                                    ],
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Box Hover', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox01:hover .ibIcon i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox02:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox03:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox04:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox06:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox07:hover span i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox08:hover span i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color_hover',
                                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox01:hover .ibIcon, {{WRAPPER}} .iconBox02:hover span, {{WRAPPER}} .iconBox03:hover span, {{WRAPPER}} .iconBox04:hover span, {{WRAPPER}} .iconBox05:hover span, {{WRAPPER}} .iconBox06:hover span, {{WRAPPER}} .iconBox07:hover span, {{WRAPPER}} .iconBox08:hover span',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'icon_box07_i_border_hr',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .iconBox08:hover span', 
                                    'conditions' => [
                                        'terms' => [
                                            [
                                                'name' => 'box_style',
                                                'operator' => 'in',
                                                'value'     => ['8'],
                                            ],
                                        ],
                                    ],
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
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'icon_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .iconBox01 .ibIcon, {{WRAPPER}} .iconBox02 span, {{WRAPPER}} .iconBox03 span, {{WRAPPER}} .iconBox04 span, {{WRAPPER}} .iconBox05 span, {{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox07 span', 
                                'conditions' => [
                                    'terms' => [
                                        [
                                            'name' => 'box_style',
                                            'operator' => '!in',
                                            'value'     => ['8'],
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .iconBox01 .ibIcon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox02 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox03 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox04 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox05 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox06 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox07 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox08 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .iconBox01 .ibIcon, {{WRAPPER}} .iconBox02 span, {{WRAPPER}} .iconBox03 span, {{WRAPPER}} .iconBox04 span, {{WRAPPER}} .iconBox05 span, {{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox07 span, {{WRAPPER}} .iconBox08 span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 .ibIcon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                
                $this->add_responsive_control( 'icon_box_position', [
                            'label' => esc_html__( '+/- Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .iconBox08 span' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 span' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'box_style',
                                        'operator' => 'in',
                                        'value'     => ['4', '8'],
                                    ],
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_img',[
                'label'         => esc_html__('SVG Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'box_style',
                            'operator' => '!in',
                            'value'     => ['5'],
                        ],
                    ],
                ],
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
                                                '{{WRAPPER}} .iconBox01 .ibIcon svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox02 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox03 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox04 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox05 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox06 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox07 span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox08 span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .iconBox01 .ibIcon svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox02 span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox03 span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox04 span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox06 span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox07 span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox08 span svg' => 'stroke: {{VALUE}}',
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
                                                '{{WRAPPER}} .iconBox01 .ibIcon svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox02 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox03 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox04 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox06 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox07 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox08 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .iconBox01 .ibIcon svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox02 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox03 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox04 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox06 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox07 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox08 span svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .iconBox01 .ibIcon svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox02 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox03 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox04 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox06 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox07 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .iconBox08 span svg' => 'height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .iconBox01:hover .ibIcon svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox02 span:hover svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox03:hover span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox04:hover span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox06:hover span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox07:hover span svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox08:hover span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke_hr',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .iconBox01:hover .ibIcon svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox02 span:hover svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox03:hover span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox04:hover span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox06:hover span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox07:hover span svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .iconBox08:hover span svg' => 'stroke: {{VALUE}}',
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
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'height: {{SIZE}}{{UNIT}};',
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
                                            'selector' => '{{WRAPPER}} .iconBox01 .ibIcon, {{WRAPPER}} .iconBox02 span,  {{WRAPPER}} .iconBox03 span, {{WRAPPER}} .iconBox04 span, {{WRAPPER}} .iconBox05 span, {{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox07 span, {{WRAPPER}} .iconBox08 span',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'icon_box08_i_border_nr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox08 span', 
                                            'conditions' => [
                                                'terms' => [
                                                    [
                                                        'name' => 'box_style',
                                                        'operator' => 'in',
                                                        'value'     => ['8'],
                                                    ],
                                                ],
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_img_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_hover_img_bgcolor_hr',
                                            'label' => esc_html__( 'Box Hover SVG Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01:hover .ibIcon, {{WRAPPER}} .iconBox02:hover span, {{WRAPPER}} .iconBox03:hover span, {{WRAPPER}} .iconBox04:hover span, {{WRAPPER}} .iconBox05:hover span, {{WRAPPER}} .iconBox06:hover span, {{WRAPPER}} .iconBox07:hover span, {{WRAPPER}} .iconBox08:hover span',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'icon_box08_i_border_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .iconBox08:hover span', 
                                            'conditions' => [
                                                'terms' => [
                                                    [
                                                        'name' => 'box_style',
                                                        'operator' => 'in',
                                                        'value'     => ['8'],
                                                    ],
                                                ],
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_control('svg_hr52',[ 'type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_svg_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .iconBox01 .ibIcon, {{WRAPPER}} .iconBox02 span, {{WRAPPER}} .iconBox03 span, {{WRAPPER}} .iconBox04 span, {{WRAPPER}} .iconBox05 span, {{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox07 span, {{WRAPPER}} .iconBox08 span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01 .ibIcon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('icon_box_svg_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 .ibIcon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox02 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox04 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox06 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                ); 
                $this->add_responsive_control( 'icon_box_svg_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01 .ibIcon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box08_position', [
                            'label' => esc_html__( '+/- Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'bottom'],
                            'selectors' => [
                                    '{{WRAPPER}} .iconBox08 span' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                            ],
                            'conditions' => [
                                'terms' => [
                                    [
                                        'name' => 'box_style',
                                        'operator' => 'in',
                                        'value'     => ['8'],
                                    ],
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_3526',[
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'box_style',
                            'operator' => 'in',
                            'value'     => ['5'],
                        ],
                    ],
                ],
        ]);
              
                $this->start_controls_tabs( 'ib_icon5_tabs' );
                    $this->start_controls_tab( 'ib_icon5_tab_icon', [ 'label' => esc_html__( 'Icon', 'themewar' )] );
                            $this->add_group_control( Group_Control_Typography::get_type(), [
                                        'name'      => 'icon_box05_i_typography',
                                        'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .abIconBox04 span i'
                                ]
                            );
                            $this->add_responsive_control( 'icon_box05_i_color',[
                                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .abIconBox04 span i' => 'color: {{VALUE}}',
                                            ]
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_icon05_svg_cion', [ 'label' => esc_html__( 'SVG Icon', 'themewar' )] );
                            $this->add_responsive_control( 'icon_box05_svg_fill_nr',[
                                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox04 span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box05_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .abIconBox04 span svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box05_svg_stroke_width',[
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
                                                '{{WRAPPER}} .abIconBox04 span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                        ]
                                ]
                            );	
                            $this->add_responsive_control( 'icon_box05_svg_width', [
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
                                                    '{{WRAPPER}} .abIconBox04 span svg' => 'width: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'icon_box05_svg_height', [
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
                                                    '{{WRAPPER}} .abIconBox04 span svg' => 'height: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();

                $this->add_control( 'hr_25', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                $this->add_responsive_control( 'icon_box05_i_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .abIconBox04 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'icon_box05_i_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .abIconBox04 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3',[
                'label'         => esc_html__('Title Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 h3, {{WRAPPER}} .iconBox02 h3, {{WRAPPER}} .iconBox03 h3, {{WRAPPER}} .iconBox04 p, {{WRAPPER}} .iconBox05 h3, {{WRAPPER}} .iconBox06 h3, {{WRAPPER}} .iconBox07 h3, {{WRAPPER}} .iconBox08 h3',
                        ]
                );
                $this->add_responsive_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox02 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox04 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox06 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08 h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_hover_title_color2',[
                                'label'     => esc_html__( 'Box Hover Title Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox02:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox06:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07:hover h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08:hover h3' => 'color: {{VALUE}}',
                                ],
                                'conditions' => [
                                    'terms' => [
                                        [
                                            'name' => 'box_style',
                                            'operator' => '!in',
                                            'value'     => ['2','3','4','5','7'],
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_hover_title_color2343434',[
                                'label'     => esc_html__( 'Title Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox02 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox06 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08 h3 a:hover' => 'color: {{VALUE}}',
                                ],
                                'conditions' => [
                                    'terms' => [
                                        [
                                            'name' => 'box_style',
                                            'operator' => '!in',
                                            'value'     => ['1','4'],
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_title_padding', [
                                'label'      => esc_html__( 'Title Padding', 'themewar' ),
                                'label'      => esc_html__( 'Title Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox04 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_4', [
                'label'         => esc_html__('Box Content Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE, 
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'box_style',
                                'operator'  => '!in',
                                'value'     => ['4','6','5'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_content_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 p, {{WRAPPER}} .iconBox02 p, {{WRAPPER}} .iconBox03 p, {{WRAPPER}} .iconBox05 p, {{WRAPPER}} .iconBox07 p, {{WRAPPER}} .iconBox08 p',
                        ]
                );
                $this->add_responsive_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox02 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07 p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_hover_content_color',[
                                'label'     => esc_html__( 'Box Hover Content Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01:hover p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox02:hover p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03:hover p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05:hover p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07:hover p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08:hover p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_content_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox02 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox07 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox08 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section( 'section_tab_445', [
                'label'         => esc_html__('Box Lable Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE, 
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'box_style',
                                'operator'  => 'in',
                                'value'     => ['4','6'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_lable_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox06 p, {{WRAPPER}} .iconBox04 h3',
                        ]
                );
                $this->add_responsive_control( 'icon_box_lable_color',[
                                'label'     => esc_html__( 'Lable Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox04 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox06 p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_hover_lable_color',[
                                'label'     => esc_html__( 'Link Hover Label Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox04 h3 a:hover' => 'color: {{VALUE}}',
                                ], 
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'box_style',
                                                'operator'  => 'in',
                                                'value'     => ['4'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_lable_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox04 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_lable_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox04 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox06 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_6', [
                'label'         => esc_html__('Btn Link Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'box_style',
                                'operator'  => '!in',
                                'value'     => ['2','3','4','5','6'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'link_icon_box_btn_text_typography',
                                'label'     => esc_html__( 'Btn Text Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 a.btnLink, {{WRAPPER}} .iconBox07 a.btnLink, {{WRAPPER}} .iconBox08 a.btnLink',
                        ]
                );
                $this->start_controls_tabs( 'link_ib_icon_btn_tot' );
                        $this->start_controls_tab( 'link_ib_icon_btn_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                                $this->add_responsive_control( 'link_icon_box_btn_text_color',[
                                                'label'     => esc_html__( 'Text Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox01 a.btnLink' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox07 a.btnLink' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox08 a.btnLink' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->end_controls_tab();
                                $this->start_controls_tab( 'link_ib_icon_btn_hr', [ 'label' => esc_html__( 'Box Hover', 'themewar' )] );
                                        $this->add_responsive_control( 'link_icon_box_btn_text_color_hover',[
                                                        'label'     => esc_html__( 'Text Hover Color', 'themewar' ),
                                                        'type'      => Controls_Manager::COLOR,
                                                        'selectors' => [
                                                                '{{WRAPPER}} .iconBox01:hover a.btnLink' => 'color: {{VALUE}}',
                                                                '{{WRAPPER}} .iconBox07:hover a.btnLink' => 'color: {{VALUE}}',
                                                                '{{WRAPPER}} .iconBox08:hover a.btnLink' => 'color: {{VALUE}}',
                                                        ]
                                                ]
                                        );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
               
                $this->add_responsive_control( 'link_icon_box_btn_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 a.btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 a.btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                ); 
                $this->add_responsive_control( 'link_icon_box_btn_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 a.btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 a.btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ],
                );
                $this->add_control('btn_link_Icon', [
                                'label' => esc_html__( 'Link Icon Style', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'btn_link_icon_typo',
                                'label'     => esc_html__( 'Btn Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 a.btnLink i, {{WRAPPER}} .iconBox07 a.btnLink i, {{WRAPPER}} .iconBox08 a.btnLink i',
                        ]
                ); 
                $this->add_responsive_control( 'btn_link_icon_color',[
                                'label'     => esc_html__( 'Btn Icon Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07 a.btnLink i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08 a.btnLink i' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'btn_link_icon_color_hr',[
                                'label'     => esc_html__( 'Btn Icon Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink:hover i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox07 a.btnLink:hover i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox08 a.btnLink:hover i' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'btn_link_icon_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 a.btnLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 a.btnLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_link_icon_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 a.btnLink i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox07 a.btnLink i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox08 a.btnLink i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ],
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $box_style      = (isset($settings['box_style']) && $settings['box_style'] > 0 ) ? $settings['box_style'] : 1;

        $logic_icon     = (isset($settings['logic_icon']) && $settings['logic_icon'] != '') ? $settings['logic_icon'] : 'logisfare-parcel';
        $list_title     = (isset($settings['list_title']) && $settings['list_title'] != '') ? $settings['list_title'] : esc_html__('01', 'themewar');
        $box_sub_title  = (isset($settings['box_sub_title']) && $settings['box_sub_title'] != '') ? $settings['box_sub_title'] : esc_html__('Phone Number', 'themewar');
        $box_title      = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Box Title', 'themewar');
        $desc           = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        $btn_text       = (isset($settings['btn_text']) && $settings['btn_text'] != '') ? $settings['btn_text'] : esc_html__('Learn More', 'themewar');
        $logic_btn_icon = (isset($settings['logic_btn_icon']) && $settings['logic_btn_icon'] != '') ? $settings['logic_btn_icon'] : '';
        
        $target         = (isset($settings['box_url']['is_external']) && $settings['box_url']['is_external'] != '') ? ' target="_blank"' : '' ;
        $nofollow       = (isset($settings['box_url']['nofollow']) && $settings['box_url']['nofollow'] != '') ? ' rel="nofollow"' : '' ;
        $url            = (isset($settings['box_url']['url']) && $settings['box_url']['url'] != '') ? $settings['box_url']['url'] : '';

        $target2        = (isset($settings['btn_url']['is_external']) && $settings['btn_url']['is_external'] != '') ? ' target=_blank' : '' ;
        $nofollow2      = (isset($settings['btn_url']['nofollow']) && $settings['btn_url']['nofollow'] != '') ? ' rel=nofollow' : '' ;
        $btn_url        = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : '';

        $box_alignment  = (isset($settings['box_alignment']) && $settings['box_alignment'] != '') ? $settings['box_alignment'] : 'left';

        
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
        <?php if($box_style == 2): ?>
            <div class="iconBox02 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3>     
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
            </div>
        <?php elseif($box_style == 3): ?>
            <div class="iconBox03 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3><?php echo esc_html($box_title); ?></h3>
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
            </div>
        <?php elseif($box_style == 4): ?>
            <div class="iconBox04 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <p>
                    <?php echo esc_html($box_sub_title); ?>
                </p>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3> 
            </div>
        <?php elseif($box_style == 5): ?>
            <div class="abIconBox04 iconBox05 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3><?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo logisfare_kses($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?></h3> 
            </div>
        <?php elseif($box_style == 6): ?>
            <div class="iconBox06 abIconBox <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3>  
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
            </div>
        <?php elseif($box_style == 7): ?>
            <div class="iconBox07 serviceItem02 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3>  
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
                <a class="btnLink" <?php echo esc_attr($target2. ' '.$nofollow2); ?> href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?><?php \Elementor\Icons_Manager::render_icon( $settings['logic_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
            </div>
        <?php elseif($box_style == 8): ?>
            <div class="iconBox08 faciltItem <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </span>
                <h3>
                    <?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?>
                </h3>  
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
                <a class="btnLink" <?php echo esc_attr($target2. ' '.$nofollow2); ?> href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?><?php \Elementor\Icons_Manager::render_icon( $settings['logic_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
            </div>
        <?php else: ?>
            <div class="iconBox01 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <div class="ibIcon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['logic_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php if (!empty($list_title)): ?>
                        <span class="ibNum"><?php echo esc_html($list_title); ?></span>
                    <?php endif; ?>
                </div>
                <h3><?php if(!empty($url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($url); ?>"><?php endif; ?><?php echo esc_html($box_title); ?><?php if(!empty($url)): ?></a><?php endif; ?></h3> 
                <p>
                    <?php echo logisfare_kses($desc); ?>
                </p>
                <a class="btnLink" <?php echo esc_attr($target2. ' '.$nofollow2); ?> href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?><?php \Elementor\Icons_Manager::render_icon( $settings['logic_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
            </div>
        <?php endif;
        
    }
    
    protected function content_template() {

    }
    
    
}