<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'themewar-text-editor';
    }

    public function get_title() {
        return esc_html__( 'Text Editor', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-text';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Editor Content', 'themewar'),
        ]);
                $this->add_control( 'editor_content', [
                                'label' => esc_html__( 'Description', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::WYSIWYG
                        ]
                );  
        $this->end_controls_section();   

        $this->start_controls_section('section_tab_222', [
                'label'	 => esc_html__( 'Global Styling', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'global_typography',
                                'label'     => esc_html__( 'Glogal Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor',
                        ]
                );
                $this->add_responsive_control( 'global_color', [
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .themewart_editor' => 'color: {{VALUE}}'
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
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 => esc_html__( 'Pagraph Styling', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'para_color', [
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .themewart_editor p' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'para_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor p',
                        ]
                );
                $this->add_responsive_control( 'para_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .themewart_editor p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_3', [
                'label'  => esc_html__( 'Link Styling', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'icon_label_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor a'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_label_hover_color', [
                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .themewart_editor a:hover'   => 'color: {{VALUE}}'
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'link_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor a',
                        ]
                );
                $this->add_responsive_control( 'link_text_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                    'label'  => esc_html__( 'Hadings Styling', 'themewar' ),
                    'tab'    => Controls_Manager::TAB_STYLE,
                ]
            );
                $this->add_control( 'area_label_1', [
                        'label' => esc_html__( 'H1 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'none',
                    ]
                );
                $this->add_responsive_control( 'te_h1_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h1'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h1_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h1',
                        ]
                );
                $this->add_responsive_control( 'te_h1_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_2', [
                        'label' => esc_html__( 'H2 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'te_h2_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h2'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h2_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h2',
                        ]
                );
                $this->add_responsive_control( 'te_h2_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_3', [
                        'label' => esc_html__( 'H3 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'te_h3_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h3'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h3_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h3',
                        ]
                );
                $this->add_responsive_control( 'te_h3_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_4', [
                        'label' => esc_html__( 'H4 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'te_h4_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h4'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h4_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h4',
                        ]
                );
                $this->add_responsive_control( 'te_h4_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_5', [
                        'label' => esc_html__( 'H5 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'te_h5_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h5'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h5_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h5',
                        ]
                );
                $this->add_responsive_control( 'te_h5_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control( 'area_label_6', [
                        'label' => esc_html__( 'H5 Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'te_h6_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor h6'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_h6_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor h6',
                        ]
                );
                $this->add_responsive_control( 'te_h6_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_5', [
                'label'  => esc_html__( 'UL Styling', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'te_ul_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor ul li'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_ul_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor ul',
                        ]
                );
                $this->add_responsive_control( 'te_li_sign_width', [
                                'label' => __( 'Sign Width', 'themewar' ),
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
                                        '{{WRAPPER}} .themewart_editor ul li::before' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'te_li_sign_height', [
                                'label' => __( 'Sign Height', 'themewar' ),
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
                                        '{{WRAPPER}} .themewart_editor ul li::before' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Background::get_type(),[
                            'name' => 'list_background',
                            'label' => esc_html__( 'Choose List image', 'themewar' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .themewart_editor ul li:before',
                        ]
                );
                $this->add_responsive_control( 'te_ul_li_sign_radius', [
                            'label'      => esc_html__( 'Sign Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul li:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_sign_margin', [
                            'label'      => esc_html__( 'Sign Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul li:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_padding', [
                            'label'      => esc_html__( 'LI Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_li_margin', [
                            'label'      => esc_html__( 'LI Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_padding', [
                            'label'      => esc_html__( 'UL Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ul_margin', [
                            'label'      => esc_html__( 'UL Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_6', [
                'label'  => esc_html__( 'OL Styling', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'te_ol_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .themewart_editor ol li'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'te_ol_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .themewart_editor ol',
                        ]
                );
                $this->add_responsive_control( 'te_ol_li_padding', [
                            'label'      => esc_html__( 'LI Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ol li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_li_margin', [
                            'label'      => esc_html__( 'LI Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ol li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_padding', [
                            'label'      => esc_html__( 'OL Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ol' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'te_ol_margin', [
                            'label'      => esc_html__( 'OL Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .themewart_editor ol' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $editor_content          = (isset($settings['editor_content']) && $settings['editor_content'] != '') ? $settings['editor_content'] : '';

        
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
        

        if(!empty($editor_content)): ?><div class="themewart_editor <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>><?php echo do_shortcode($editor_content); ?></div><?php endif;
    }

    protected function content_template() {

    }
}

