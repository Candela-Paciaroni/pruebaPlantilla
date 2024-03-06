<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Accordion_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-accordion';
    }
    
    public function get_title() {
        return esc_html__( 'Accordion', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'Accordion', 'themewar' ),
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
                    $repeater->add_control( 'accr_title', [
                                    'label'         => esc_html__( 'Accordion Title', 'themewar' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => esc_html__('Accordion Title', 'themewar'),
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Insert accordion title', 'themewar')
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
                    $repeater->add_control( 'accr_content', [
                                    'label'     => esc_html__( 'Body Content', 'themewar' ),
                                    'type'      => Controls_Manager::WYSIWYG,
                                    'default'   => esc_html__('We can help you channel your potential implementing your idea. '),
                                    'placeholder'   => esc_html__('Insert accordion Body content', 'themewar')
                            ]
                    );
                    $repeater->add_control('is_animation',[
                                    'label'     => esc_html__( 'Is Animation', 'themewar' ),
                                    'type'      => \Elementor\Controls_Manager::SWITCHER,
                                    'label_on'      => esc_html__( 'Yes', 'themewar' ),
                                    'label_off'     => esc_html__( 'No', 'themewar' ),
                                    'return_value'  => 'yes',
                                    'default'       => 'no',
                                    'separator'     => 'before'
                            ]
                    );
                    $repeater->add_control('animation_name',[
                                    'label'     => esc_html__( 'Set Animation', 'themewar' ),
                                    'type'      => \Elementor\Controls_Manager::SELECT,
                                    'label_block'   => true,
                                    'multiple'      => true,
                                    'default'   => 'none',
                                    'options'   => [
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
                    $repeater->add_control('animation_duration_id',[
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
                    $repeater->add_control('animation_delay',[
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
                $this->add_control('list', [
                                'label'         => esc_html__( 'Accordion Item', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'accr_title'            => esc_html__( 'Accordion Title', 'themewar' ),
                                                'is_expand'             => 'no',
                                                'accr_content'          => esc_html__( 'We can help you channel your potential implementing your idea. ', 'themewar' ),
                                                'is_animation'          => 'no',
                                                'animation_name'        => 'none',
                                                'animation_duration_id' => '1000',
                                                'animation_delay'       => '50',

                                        ],
                                ],
                                'title_field' => '{{{ accr_title }}}',
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Accordion Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .logisfareAcordion',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareAcordion',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareAcordion',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareAcordion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'     => esc_html__('Accordion Card Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'ac_card_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-item',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'ac_card_border',
                            'label' => esc_html__( 'Item Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-item',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'ac_card_shadow',
                            'label' => esc_html__( 'Item Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-item',
                    ]
                );
                $this->add_responsive_control( 'ac_card_border_radius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareAcordion .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('ac_card_margin', [
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareAcordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_card_padding', [
                            'label' => esc_html__( 'Item Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareAcordion .accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                'label'     => esc_html__('Card Head Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_heading_typography',
                            'label'     => esc_html__( 'Card Heading Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .logisfareAcordion button.accordion-button',
                    ]
                );
                $this->start_controls_tabs( 'ac_headeing_tabs' );
                    $this->start_controls_tab('ac_head_tab_normal',['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor',[
                                        'label'     => esc_html__( 'Heading BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareAcordion button.accordion-button.collapsed' => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'ac_heading_coolor',[
                                        'label'     => esc_html__( 'Heading Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareAcordion button.accordion-button.collapsed' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_heading_border',
                                        'label' => esc_html__( 'Item Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion button.accordion-button.collapsed',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_head_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor_hover',[
                                        'label'     => esc_html__( 'Heading BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareAcordion button.accordion-button:hover' => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control('ac_heading_coolor_hov',[
                                        'label'     => esc_html__( 'Heading Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion button.accordion-button:hover' => 'color: {{VALUE}}'
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_heading_border_hover',
                                        'label' => esc_html__( 'Item Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion button.accordion-buttonbutton.accordion-button:hover',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_head_tab_active',['label' => esc_html__( 'Active', 'themewar' )]);
                            $this->add_responsive_control( 'ac_heading_bg_coolor_act',[
                                        'label'     => esc_html__( 'Heading BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareAcordion button.accordion-button:not(.collapsed)' => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'ac_heading_coolor_act',[
                                        'label'     => esc_html__( 'Heading Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion button.accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_heading_border_active',
                                        'label' => esc_html__( 'Item Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion button.accordion-button:not(.collapsed)',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ac_card_heading2_radius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareAcordion button.accordion-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_heading2_padding', [
                            'label' => esc_html__( 'Card Heading Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion button.accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
                
        $this->start_controls_section('section_tab_8', [
                'label'     => esc_html__('Card +/- Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control( 'acc_sign_width', [
                            'label' => __( '+/- Width', 'themewar' ),
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
                                    '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'acc_sign_height', [
                            'label' => __( '+/- Height', 'themewar' ),
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
                                    '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ac_heading_sign_typography',
                                'label'     => esc_html__( 'Collapsed +/- Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logisfareAcordion .accordion-button.collapsed::after',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ac_heading_sign_clspd_typo',
                                'label'     => esc_html__( '!Collapsed +/- Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logisfareAcordion .accordion-button:not(.collapsed)::after, {{WRAPPER}} .logisfareAcordion02 .accordion-button:not(.collapsed)::after',
                        ]
                );
                $this->start_controls_tabs( 'ac_sign_tabs' );
                    $this->start_controls_tab('ac_sign_tab_normal',['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor',[
                                        'label'     => esc_html__( 'Card +/- BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button.collapsed:after'  => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor',[
                                        'label'     => esc_html__( 'Card +/- Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button.collapsed:after'  => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_plus_borders',
                                        'label' => esc_html__( '+/- Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-header button.collapsed:after',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_sign_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor_hov',[
                                        'label'     => esc_html__( 'Card +/- BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button:hover:after'  => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor_hover',[
                                        'label'     => esc_html__( 'Card +/- Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button:hover:after'  => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_plus_borders_hover',
                                        'label' => esc_html__( '+/- Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-header button:hover:after',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ac_sign_tab_active',['label' => esc_html__( 'Active', 'themewar' )]);
                            $this->add_responsive_control( 'ac_plus_bg_coolor_act',[
                                        'label'     => esc_html__( 'Card +/- BG Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button:not(.collapsed):after'  => 'background: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'ac_plus_txt_coolor_act',[
                                        'label'     => esc_html__( 'Card +/- Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .logisfareAcordion .accordion-header button:not(.collapsed):after'  => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'ac_plus_borders_act',
                                        'label' => esc_html__( '+/- Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .logisfareAcordion .accordion-header button:not(.collapsed):after',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();

                $this->add_responsive_control( 'ac_sign_radius', [
                            'label' => esc_html__( '+/- Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_sign_padding', [
                            'label' => esc_html__( '+/- Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac_sign_position', [
                            'label' => esc_html__( '+/- Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'bottom'],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_icon_margin', [
                            'label' => esc_html__( 'Card +/- Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareAcordion .accordion-button::after' => 'margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_5', [
                'label'     => esc_html__('Card Body Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ac_body_desc_typo',
                            'label'     => esc_html__( 'Body Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .accordion-body',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'ac1_body_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .accordion-body',
                    ]
                );
                $this->add_responsive_control( 'ac_body_desc_color',[
                            'label'     => esc_html__( 'Description Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .accordion-body' => 'color: {{VALUE}}',
                            ],
                            'separator' => 'after',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'ac1_body_card_border',
                            'label' => esc_html__( 'Body Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .accordion-body',
                    ]
                );
                $this->add_responsive_control( 'ac1_card_body_margin', [
                            'label' => esc_html__( 'Body Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ac1_card_body_padding', [
                            'label' => esc_html__( 'Body Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $is_all_expandable      = (isset($settings['is_all_expandable']) && !empty($settings['is_all_expandable'])) ? $settings['is_all_expandable'] : 'no';
        $acordion_view          = (isset($settings['acordion_view']) && $settings['acordion_view'] > 0 ) ? $settings['acordion_view'] : 2;

        
        $list                   = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $tabs_id                = uniqid('logisfare-accordion-');
        
        ?>
            <div class="logisfareAcordion" id="logisfare_accordion-<?php echo $tabs_id; ?>">
                <?php
                $i = 1;
                foreach ($list as $key => $item):
                    $accr_title    = (isset($item['accr_title'])) ? $item['accr_title'] : '';
                    $is_expand     = (isset($item['is_expand'])) ? $item['is_expand'] : 'no';
                    $accr_content  = (isset($item['accr_content'])) ? $item['accr_content'] : ''; 

                    $is_animation           = (isset($item['is_animation']) && $item['is_animation'] == 'yes') ? $item['is_animation'] : 'no';
                    $animation_name         = (isset($item['animation_name']) && $item['animation_name'] != '') ? $item['animation_name'] : '';
                    $animation_duration     = (isset($item['animation_duration_id']) && $item['animation_duration_id'] != '') ? $item['animation_duration_id'] : '';
                    $animation_delay        = (isset($item['animation_delay']) && $item['animation_delay'] != '') ? $item['animation_delay'] : '';
                    
                    $animAttr = '';
                    $animClass = $animAttr;
                    if($is_animation == 'yes' && $animation_name !='none'){
                        $animClass = ' enable_animation aos-animate';
                        $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.'' : '');
                        $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.'' : '');
                        $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.'' : '');
                    }
            

                    if($accr_title != '' && $accr_content != ''):
                    ?>
                        <div class="accordion-item <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                            <h2 class="accordion-header" id="logisfare_acc_hed_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
                                <button class="accordion-button <?php if($is_expand != 'yes'){ echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#logisfare_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-expanded="<?php if($is_expand == 'yes'){ echo 'true'; }else{ echo 'false'; } ?>" aria-controls="logisfare_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
                                    <?php echo wp_kses_post($accr_title); ?>
                                </button>
                            </h2>
                            <div id="logisfare_acc_col_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" class="accordion-collapse collapse <?php if($is_expand == 'yes'){ echo 'show'; } ?>" aria-labelledby="logisfare_acc_hed_<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" <?php if($is_all_expandable != 'yes'): ?>data-bs-parent="#logisfare_accordion-<?php echo $tabs_id; ?>" <?php endif; ?>>
                                <div class="accordion-body">
                                    <?php echo do_shortcode($accr_content); ?>
                                </div>
                            </div>
                        </div>
                    <?php $i++; 
                    endif;
                endforeach;
                ?>
            </div>
        <?php
    }
    
    protected function content_template() {}
}