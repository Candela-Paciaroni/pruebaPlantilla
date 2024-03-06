<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_History_Tab_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-history-tab';
    }
    
    public function get_title() {
        return esc_html__( 'History Tab', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-tabs';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'History Tab', 'themewar' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
        ]);
                $this->add_control( 'is_all_expandable', [
                            'label'             => esc_html__( 'Alwasy Expanded All?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make expandable all items?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );

                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'tab_btn_lable', [
                                    'label'         => esc_html__( 'Button Lable', 'themewar' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => esc_html__('Year: 2005', 'themewar'),
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Insert Tab BTN Lable', 'themewar')
                            ]
                    );  
                    $repeater->add_control( 'is_expand', [
                                    'label'             => esc_html__( 'Is Expand?', 'themewar' ),
                                    'type'              => Controls_Manager::SWITCHER,
                                    'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                    'label_off'         => esc_html__( 'No', 'themewar' ),
                                    'description'       => esc_html__('Do you want to make this item expand?', 'themewar'),
                                    'return_value'      => 'yes',
                                    'default'           => 'no',
                            ]
                    );
                    $repeater->add_control( 'tab_bdy_title', [
                                    'label'         => esc_html__( 'Body Heading', 'themewar' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => esc_html__('Digital Logistics Solution', 'themewar'),
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Insert Your Tab Body Title', 'themewar')
                            ]
                    );  
                    $repeater->add_control( 'tab_bdy_content', [
                                    'label'     => esc_html__( 'Body Content', 'themewar' ),
                                    'type'      => Controls_Manager::TEXTAREA,
                                    'default'   => esc_html__('Sapien montes euismod penatibus consequat vivamus hendrerit nisl non eleifend nascetur leo auctor fames velit solutions.', 'themewar'),
                                    'placeholder'   => esc_html__('Insert Your Tab Body content', 'themewar')
                            ]
                    );
                    $repeater->add_control( 'tab_bdy_btn_lable', [
                                'label'     => esc_html__( 'Body BTN Lable', 'themewar' ),
                                'type'      => Controls_Manager::TEXT,
                                'label_block'   => TRUE,
                                'placeholder'   => esc_html__( 'Learn More', 'themewar' ),
                                'default'       => esc_html__( 'Learn More', 'themewar' ),
                        ]
                    );
                    $repeater->add_control('tab_btn_icon',[
                                'label' => esc_html__( 'Button Icon', 'themewar' ),
                                'type' => Controls_Manager::ICONS,
                                'label_block'   => TRUE,
                                'default' => [
                                    'value' => 'logisfare-right-arrow',
                                    'library' => 'tw_icon',
                                ],
                        ]
                    );
                    $repeater->add_control( 'tab_bdy_btn_url', [
                                'label'             => esc_html__( 'Body Button URL', 'themewar' ),
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
                $this->add_control('list', [
                                'label'         => esc_html__( 'Accordion Item', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                            'tab_btn_lable'        => esc_html__( 'Year: 2005', 'themewar' ),
                                            'tab_bdy_title'        => esc_html__('Digital Logistics Solution', 'themewar'),
                                            'tab_bdy_content'      => esc_html__( 'Sapien montes euismod penatibus consequat vivamus hendrerit nisl non eleifend nascetur leo auctor fames velit solutions.', 'themewar' ),
                                            'tab_bdy_btn_lable'    => esc_html__( 'Learn More ', 'themewar' ),
                                            'tab_btn_icon'         => array(),
                                            'tab_bdy_btn_url'      => array(),
                                        ],
                                ],
                                'title_field' => '{{{ tab_btn_lable }}}',
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
        
        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Tab Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .history_tab_wrapper',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .history_tab_wrapper',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .history_tab_wrapper',
                    ]
                );
                $this->add_responsive_control( 'tab_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .history_tab_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .history_tab_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .history_tab_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'     => esc_html__('Tab Button Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->start_controls_tabs( 'ac_headeing_tabs' );
                    $this->start_controls_tab('ac_head_tab_normal',['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control( 'ac_heading_color',[
                                        'label'     => esc_html__( 'Button Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .historyNavTab .nav-link' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'ac_card_bg',
                                        'label' => esc_html__( 'Button Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .historyNavTab .nav-link',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_head_tab_hover',['label' => esc_html__( 'Active', 'themewar' )]);
                            $this->add_responsive_control( 'ac_heading_color_hr',[
                                        'label'     => esc_html__( 'Button Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .historyNavTab .nav-link.active' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'ac_card_bg_hr',
                                        'label' => esc_html__( 'Button Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .historyNavTab .nav-link:after',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control( 'hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'ac_card_border',
                            'label' => esc_html__( 'Button Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .historyNavTab .nav-link',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'ac_card_shadow',
                            'label' => esc_html__( 'Button Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .historyNavTab .nav-link',
                    ]
                );
                $this->add_responsive_control( 'ac_card_border_radius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .historyNavTab .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('ac_card_margin', [
                            'label' => esc_html__( 'Button Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .historyNavTab .nav-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_card_padding', [
                            'label' => esc_html__( 'Button Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .historyNavTab .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('ac_tab_area_margin', [
                            'label' => esc_html__( 'Button Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .historyNavTab ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_tab_area_padding', [
                            'label' => esc_html__( 'Button Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .historyNavTab ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('tab_column_gap',[
                        'label' => esc_html__( 'Column Gap', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 500,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .historyNavTab ul' => 'column-gap: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control('tab_row_gap',[
                        'label' => esc_html__( 'Row Gap', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 500,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .historyNavTab ul' => 'row-gap: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_4', [
                'label'     => esc_html__('Tab Body Area Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tab_bd_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .historyContent',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'tab_bd_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .historyContent',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .historyContent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tab_area_mr', [
                            'label' => esc_html__( 'Tab Body Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tab_area_pd', [
                            'label' => esc_html__( 'Tab Body Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_5', [
                'label'     => esc_html__('Tab Body Content Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control('ac_body_title_style',[
                        'label' => esc_html__( 'Body Title STyle', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_body_title_typo',
                            'label'     => esc_html__( 'Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .historyContent h2',
                    ]
                );
                $this->add_responsive_control( 'ac_body_title_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent h2' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_body_title_margin', [
                            'label' => esc_html__( 'Title Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_body_title_padding', [
                            'label' => esc_html__( 'Title Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('ac_body_desc_style',[
                        'label' => esc_html__( 'Body Description STyle', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_body_desc_typo',
                            'label'     => esc_html__( 'Desc Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .historyContent p',
                    ]
                );
                $this->add_responsive_control( 'ac_body_desc_color',[
                            'label'     => esc_html__( 'Desc Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac1_card_body_margin', [
                            'label' => esc_html__( 'Desc Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac1_card_body_padding', [
                            'label' => esc_html__( 'Desc Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control('ac_body_btn_style',[
                        'label' => esc_html__( 'Body BTN STyle', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_body_btn_typo',
                            'label'     => esc_html__( 'BTN Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .historyContent .btnLink',
                    ]
                );  
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_body_btn_icon_typo',
                            'label'     => esc_html__( 'BTN Icon Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .historyContent .btnLink i',
                    ]
                );
                $this->add_responsive_control( 'ac_body_btn_color',[
                            'label'     => esc_html__( 'BNT Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent .btnLink' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .historyContent .btnLink i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_body_btn_icon_color',[
                            'label'     => esc_html__( 'BNT Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent .btnLink:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .historyContent .btnLink:hover i' => 'color: {{VALUE}}',
                            ],
                            'separator' => 'after',
                    ]
                );
                $this->add_responsive_control( 'ac1_card_btn_margin', [
                            'label' => esc_html__( 'BTN Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent .btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac1_card_btn_icon_margin', [
                            'label' => esc_html__( 'BTN Icon Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent .btnLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac1_card_btn_padding', [
                            'label' => esc_html__( 'BTN Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .historyContent .btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();  
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        

        
        $list                   = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $tabs_id                = uniqid('logis-history-');
        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';$animAttr = '';

        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }

        ?>  
        <div class="history_tab_wrapper <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <div class="historyNavTab">
                <ul class="nav nav-tabs" id="logis_tab_<?php echo $tabs_id; ?>" role="tablist">
                    <?php  
                        foreach ($list as $key => $item):

                        $tab_btn_lable      = (isset($item['tab_btn_lable']) && $item['tab_btn_lable'] != '') ? $item['tab_btn_lable'] : '';
                        $is_expand          = (isset($item['is_expand']) && $item['is_expand'] !='') ? $item['is_expand'] : 'no';

                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo esc_attr($is_expand == 'yes' ? 'active' : '');?>" id="logis_heading_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" data-bs-toggle="tab" data-bs-target="#logis_heading_cal_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" type="button" role="tab" aria-controls="logis_heading_cal_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-selected="<?php echo esc_attr($is_expand == 'yes' ? 'true' : 'false');?>"><?php echo esc_html($tab_btn_lable); ?></button>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="historyNavContent">
                <div class="tab-content" id="myTabContent">
                <?php  
                    foreach ($list as $key => $item):

                    $tab_bdy_title      = (isset($item['tab_bdy_title']) && $item['tab_bdy_title'] != '') ? $item['tab_bdy_title'] : '';
                    $tab_bdy_btn_lable  = (isset($item['tab_bdy_btn_lable']) && $item['tab_bdy_btn_lable'] != '') ? $item['tab_bdy_btn_lable'] : '';
                    $is_expand          = (isset($item['is_expand']) && $item['is_expand'] !='') ? $item['is_expand'] : 'no';
                    $tab_bdy_content    = (isset($item['tab_bdy_content'])  && $item['tab_bdy_content'] !='') ? $item['tab_bdy_content'] : ''; 
                    $tab_btn_icon       = (isset($item['tab_btn_icon']) && $item['tab_btn_icon'] != '') ? $item['tab_btn_icon'] : 'logisfare-right-arrow';

                    $target2            = (isset($item['tab_bdy_btn_url']['is_external']) && $item['tab_bdy_btn_url']['is_external'] != '') ? ' target=_blank' : '' ;
                    $nofollow2          = (isset($item['tab_bdy_btn_url']['nofollow']) && $item['tab_bdy_btn_url']['nofollow'] != '') ? ' rel=nofollow' : '' ;
                    $tab_bdy_btn_url    = (isset($item['tab_bdy_btn_url']['url']) && $item['tab_bdy_btn_url']['url'] != '') ? $item['tab_bdy_btn_url']['url'] : 'javascript:void(0);';
                ?>
                    <div class="tab-pane fade <?php if($is_expand == 'yes'){ echo 'active show'; } ?>" id="logis_heading_cal_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" role="tabpanel" aria-labelledby="logis_heading_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
                        <div class="historyContent">
                            <h2><?php echo esc_html($tab_bdy_title); ?></h2>
                            <p><?php echo logisfare_kses($tab_bdy_content); ?></p>
                            <a class="btnLink" <?php echo esc_attr($target2. ' '.$nofollow2); ?> href="<?php echo esc_attr($tab_bdy_btn_url); ?>">
                                <?php echo esc_html($tab_bdy_btn_lable); ?><?php \Elementor\Icons_Manager::render_icon( $item['tab_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                        </div> 
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
    
    protected function content_template() {}
}