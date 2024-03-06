<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Contcat_Form_Widget extends Widget_Base {

    public function get_name() {
        return 'themewar-contact-form';
    }

    public function get_title() {
        return esc_html__( 'Contact From', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }

    protected function register_controls() {

        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="wpcf7_contact_form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('Please Select', 'themewar'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }

        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'Contact Form', 'themewar' ),
        ]);
                $this->add_control( 'is_form_title',[
                            'label' => esc_html__( 'Show SubTitle', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Show', 'themewar' ),
                            'label_off' => esc_html__( 'Hide', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'no',
                    ]
                );
                $this->add_control( 'form_sut_title', [
                            'label'         => esc_html__( ' Sub Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("Type your form Subtitle...", 'themewar'),
                            'default'   => esc_html__("Our Workers", 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'is_form_title',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'form_title', [
                            'label'         => esc_html__( 'Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("Type your form title here...", 'themewar'),
                            'default'   => esc_html__("Transportation Cost", 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'is_form_title',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'contactForm', [
                            'label'     => esc_html__( 'Select Form', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 0,
                            'options'   => $shortcodes,
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
                'label'         => esc_html__('Form Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'icon_box_bg',
                                'label' => esc_html__( 'Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .contact-form ',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .contact-form ',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'box_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .contact-form ',
                        ]
                );
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_subTitle', [
                'label'             => esc_html__('Contact Form Subtitle', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_form_title',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'cntf_sec_subtitle_typo',
                        'label'     => esc_html__( 'Subtitle Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .subTitle'
                ]);
                $this->add_responsive_control( 'srv_sec_subtitle_color',[
                            'label'     => esc_html__( 'SubTitle Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_subtitle_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_subtitle_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_control('cntf_sec_subtitle_icon',[
                            'label' => esc_html__( 'SubTitle Icon', 'textdomain' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'cntf_sec_subtitle_i_typo',
                        'label'     => esc_html__( 'Subtitle Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .subTitle i'
                ]);
                $this->add_responsive_control( 'cntf_sec_subtitle_i_color',[
                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_subtitle_i_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_subtitle_i_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section( 'section_tab_sec_Title', [
                'label'             => esc_html__('Contact Form Title', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_form_title',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'cntf_sec_title_typo',
                        'label'     => esc_html__( 'Sectio Title Typo', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .secTitle'
                ]);
                $this->add_responsive_control( 'srv_sec_title_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_title_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cntf_sec_title_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Form Field Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'cf_field_typo',
                            'label'     => esc_html__( 'Field Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact-form textarea, {{WRAPPER}} .contact-form select',
                    ]
                );
                $this->add_responsive_control( 'cf_text_color', [
                            'label' => esc_html__( 'Text Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form select' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form textarea' => 'color: {{VALUE}}',

                                    '{{WRAPPER}} .contact-form textarea::-moz-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form form input::-moz-placeholder' => 'color: {{VALUE}}',

                                    '{{WRAPPER}} .contact-form textarea::-ms-input-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form form input::-ms-input-placeholder' => 'color: {{VALUE}}',

                                    '{{WRAPPER}} .contact-form textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_bg_color', [
                            'label' => esc_html__( 'Background Color', 'themewar' ),
                            'type'  => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form select' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .contact-form textarea' => 'background: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cf_borders',
                            'label' => esc_html__( 'Field Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form select, {{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact-form textarea',
                    ]
                );
                $this->add_responsive_control( 'cf_field_radius', [
                            'label' => esc_html__( 'Field Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact-form select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .contact-form textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cf_field_shadow',
                            'label' => esc_html__( 'Field Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form select, {{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contact-form textarea',
                    ]
                );
                $this->add_responsive_control( 'cf_field_padding', [
                            'label' => esc_html__( 'Field Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_field_margin', [
                            'label' => esc_html__( 'Field Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form .wpcf7-form-control-wrap .nice-select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_filed_height', [
                            'label' => esc_html__( 'Input/Select Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 100,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="text"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="url"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="tel"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="number"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form input[type="date"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form select' => 'height: {{SIZE}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control('textarea_heading', [
                        'label' => esc_html__( 'Text Area', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_responsive_control( 'cf_message_height', [
                            'label' => esc_html__( 'Textarea Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 8,
                                            'max' => 500,
                                            'step' => 1,
                                    ]
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form textarea' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_field_textarea_padding', [
                            'label' => esc_html__( 'Textarea Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_message_margin', [
                            'label' => esc_html__( 'Textarea Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact-form textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_2666', [
                'label'         => esc_html__( 'Checkbox And Radio Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control( 'mem_info_devider_2', [
                            'label' => esc_html__( 'Checkbox Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'none',
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name' => 'btn_crb_typography',
                            'label' => esc_html__( 'Label Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form .wpcf7-checkbox label span',
                    ]
                );
                $this->add_responsive_control( 'btn_crb_label_color', [
                            'label' => esc_html__( 'Label Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-checkbox label span'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_chkb_padding', [
                            'label' => esc_html__( 'Checkbox Label Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .contact-form .wpcf7-checkbox label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_chkb_margin', [
                            'label' => esc_html__( 'Checkbox Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-checkbox .wpcf7-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_chkb_area_margin', [
                            'label' => esc_html__( 'Checkbox Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-form-control.wpcf7-checkbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'btn_chkb_width', [
                            'label' => esc_html__( 'Checkbox Width', 'themewar' ),
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
                                '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_chkb_height', [
                            'label' => esc_html__( 'Checkbox Height', 'themewar' ),
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
                                '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(),[
                            'name'      => 'btn_chkb_border',
                            'label'     => esc_html__( 'Checkbox Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before',
                    ]
                );
                $this->add_responsive_control( 'btn_chkb_checked_color', [
                            'label' => esc_html__( 'Checked Border Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-checkbox label input[type="checkbox"]:checked + span:before'   => 'border-color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_chkb_bef_margin', [
                            'label' => esc_html__( 'Checkbox Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                            '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_chkd_con_typography',
                            'label' => esc_html__( 'Checked Icon Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before',
                    ]
                );
                $this->add_responsive_control( 'btn_chkb_checked_i_color', [
                            'label' => esc_html__( 'Checked Icon Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-checkbox label span:before'   => 'color: {{VALUE}}',
                            ],
                    ]
                );

                $this->add_control( 'mem_info_devider_3', [
                            'label' => esc_html__( 'Radio Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name' => 'btn_rads_typography',
                            'label' => esc_html__( 'Label Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form .wpcf7-radio label span',
                    ]
                );
                $this->add_responsive_control( 'btn_rads_label_color', [
                            'label' => esc_html__( 'Label Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-radio label span'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_rads_padding', [
                            'label' => esc_html__( 'Rado Label Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-radio label ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_rad_bef_margin', [
                            'label' => esc_html__( 'Radio Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-radio .wpcf7-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_rad_area_margin', [
                            'label' => esc_html__( 'Radio Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-form-control.wpcf7-radio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_rad_width', [
                            'label' => esc_html__( 'Radio Width', 'themewar' ),
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
                                    '{{WRAPPER}} .contact-form .wpcf7-radio label span:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_rad_height', [
                            'label' => esc_html__( 'Radio Height', 'themewar' ),
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
                                    '{{WRAPPER}} .contact-form .wpcf7-radio label span:before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(),[
                            'name'      => 'btn_radio_border',
                            'label'     => esc_html__( 'Radio Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .contact-form .wpcf7-radio label span:before',
                    ]
                );
                $this->add_responsive_control( 'btn_rad_checked_color', [
                            'label' => esc_html__( 'Checked Border Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-radio input[type="radio"]:checked + span:before'   => 'border-color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cf_rad_margin', [
                            'label' => esc_html__( 'Radio Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form .wpcf7-form-control-wrap .wpcf7-radio label span:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_rad_inner_width', [
                            'label' => esc_html__( 'Radio Inner Width', 'themewar' ),
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
                                    '{{WRAPPER}} .contact-form .wpcf7-radio input[type="radio"]:checked + span:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_rad_inner_height', [
                            'label' => esc_html__( 'Radio Inner Height', 'themewar' ),
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
                                    '{{WRAPPER}} .contact-form .wpcf7-radio input[type="radio"]:checked + span:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_rad_checked_inner_color', [
                                'label' => esc_html__( 'Checked Inner Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contact-form .wpcf7-radio input[type="radio"]:checked + span:after'   => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rad_inner_margin', [
                                'label' => esc_html__( 'Radio Inner Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contact-form .wpcf7-radio input[type="radio"]:checked + span:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_1_typography',
                            'label' => esc_html__( 'Button Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .contact-form input[type="submit"], {{WRAPPER}} .contact-form button.solidBTn',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                        $this->start_controls_tab('btn_1_button_style_normal',['label' => esc_html__( 'Normal', 'themewar' )]);
                                $this->add_responsive_control( 'btn_3_label_color', [
                                                'label' => esc_html__( 'Label Color', 'themewar' ),
                                                'type' => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .contact-form input[type="submit"]'   => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .contact-form button.solidBTn '   => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'btn_1_bg',
                                                'label' => esc_html__( 'Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .contact-form input[type="submit"], {{WRAPPER}} .contact-form button.solidBTn',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name'      => 'btn_border',
                                                'label'     => esc_html__( 'Border', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .contact-form input[type="submit"], {{WRAPPER}} .contact-form button.solidBTn',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name'      => 'btn_box_shadow',
                                                'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .contact-form input[type="submit"], {{WRAPPER}} .contact-form button.solidBTn',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                                $this->add_responsive_control( 'btn_label_hover_color', [
                                                'label'     => esc_html__( 'Label Hover Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .contact-form input[type="submit"]:hover'   => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .contact-form button.solidBTn:hover'   => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'btn_1_hover_bg',
                                                'label' => esc_html__( 'Background', 'themewar' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .contact-form input[type="submit"]:hover, {{WRAPPER}} .contact-form button.solidBTn:after',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name'      => 'btn_hover_border',
                                                'label'     => esc_html__( 'Border', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .contact-form input[type="submit"]:hover, {{WRAPPER}} .contact-form button.solidBTn:hover',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name'      => 'btn_hover_box_shadow',
                                                'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .contact-form input[type="submit"]:hover, {{WRAPPER}} .contact-form button.solidBTn:hover',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'btn_1_width', [
                            'label' => esc_html__( 'Width', 'themewar' ),
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
                                '{{WRAPPER}} .contact-form input[type="submit"]' => 'min-width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .contact-form button.solidBTn ' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_height', [
                            'label' => esc_html__( 'Height', 'themewar' ),
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
                                    '{{WRAPPER}} .contact-form input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form button.solidBTn ' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form input[type="submit"]'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form button.solidBTn '   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form button.solidBTn ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .contact-form input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-form button.solidBTn ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $contactForm        = (isset($settings['contactForm']) && $settings['contactForm'] != '') ? $settings['contactForm'] : '';

        $is_form_title      = (isset($settings['is_form_title']) && $settings['is_form_title'] == 'yes') ? $settings['is_form_title'] : 'no';
        $form_sut_title     = (isset($settings['form_sut_title']) && $settings['form_sut_title'] != '') ? $settings['form_sut_title'] : esc_html__('Our Workers', 'themewar');
        $form_title         = (isset($settings['form_title']) && $settings['form_title'] != '') ? $settings['form_title'] : esc_html__('Transportation Cost','themewar');

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
        
        if($contactForm > 0){
                echo '<div class="contact-form '.$animClass.'"'.$animAttr.'>'; 
                    if($is_form_title == 'yes'): 
                        if($form_sut_title != ''): ?>
                            <h3 class="subTitle"> 
                                <?php echo esc_html($form_sut_title); ?>
                                <i aria-hidden="true" class="logisfare-right_sec"></i>
                            </h3>
                        <?php endif; 
                        if($form_title != ''): ?>
                            <h2 class="secTitle"><?php echo logisfare_kses($form_title); ?></h2>
                        <?php
                        endif; endif;
                    echo do_shortcode('[contact-form-7 id="'.$contactForm.'"]');
                echo '</div>';
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Contact From.', 'themewar'); ?>
            </div>
            <?php
        }
        
    }

    protected function content_template() {

    }    
}


