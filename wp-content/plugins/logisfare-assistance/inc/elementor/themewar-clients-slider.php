<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Clients_Slider_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-clients-slider';
    }
    
    public function get_title() {
        return esc_html__( 'Client Slider', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-logo';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Client Logo Slider', 'themewar')
        ]);
                $repeater = new \Elementor\Repeater();
                $repeater->add_control( 'client_logo', [
                            'label'         => esc_html__( 'Client Logo', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Upload your client logo.', 'themewar'),
                    ]
                );
                $repeater->add_control( 'clinet_url', [
                            'label'             => esc_html__( 'Client URL', 'themewar' ),
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
                $this->add_control( 'list', [
                            'label'   => esc_html__( 'Client Logo', 'themewar' ),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeater->get_controls(),
                            'default' => [
                                    [
                                            'client_logo'        => array(),
                                            'clinet_url'         => array(),

                                    ],
                            ],
                            'title_field' => esc_html__( 'Client Logo', 'themewar' ),
                    ]
                );
                $this->add_control( 'client_slide_autoplay', [
                            'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'client_slide_loop', [
                            'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'client_slide_nav', [
                            'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'client_slide_dots', [
                            'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'items_xxl_col', [
                            'label'     => esc_html__( 'Select XXL Col', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 15,
                            'step'      => 1,
                            'default'   => '7',
                    ]
                );
                $this->add_control( 'items_xl_col', [
                            'label'     => esc_html__( 'Select XL Col', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 15,
                            'step'      => 1,
                            'default'   => '5',
                    ]
                );
                $this->add_control( 'items_lg_col', [
                            'label'     => esc_html__( 'Select LG Col', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 15,
                            'step'      => 1,
                            'default'   => '4',
                    ]
                );
                $this->add_control( 'items_md_col', [
                            'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 15,
                            'step'      => 1,
                            'default'   => '3',
                    ]
                );
                $this->add_control( 'items_sm_col', [
                            'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 15,
                            'step'      => 1,
                            'default'   => '2',
                    ]
                );
                $this->add_control( 'items_gapping', [
                            'label' => esc_html__( 'Items Gapping', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 60,
                            'step' => 1,
                            'default' => 30,
                            'description'       => esc_html__('Insert items gapping if you want.', 'themewar'),
                    ]
                );
                $this->add_control('logo_height',[
                        'label' => esc_html__( 'Height', 'textdomain' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .clientSlider.owl-carousel a img' => 'height: {{SIZE}}{{UNIT}};',
                        ],
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

        
        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Slider Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .clientSliderWrap ',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clientSliderWrap ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clientSliderWrap ',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clientSliderWrap ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientSliderWrap ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientSliderWrap ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3', [
                'label'             => esc_html__('Item Styling', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->start_controls_tabs( 'item_styling_tab' );
                        $this->start_controls_tab('item_styling_tab_normal', ['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control( 'cl_item_bg', [
                                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .cleintLogo' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'cl_item_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'cl_item_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo',
                                    ]
                            );
                        $this->end_controls_tab();
                        $this->start_controls_tab('item_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'cl_item_bg_hover', [
                                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .cleintLogo:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'cl_item_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'cl_item_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo:hover',
                                    ]
                            );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_responsive_control( 'cl_item_radius', [
                                'label' => esc_html__( 'Item Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cleintLogo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cl_item_margin', [
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cmb_30' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cl_item_padding', [
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cleintLogo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('cl_logo_style', [
                        'label' => esc_html__( 'Logo Image Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_control('cl_logo_max_width',[
                            'label' => esc_html__( 'Logo Max Width', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cleintLogo img' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('cl_logo_width',[
                            'label' => esc_html__( 'Logo Width', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cleintLogo img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('cl_logo_height',[
                            'label' => esc_html__( 'Logo Height', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cleintLogo img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'cl_logo_opacity',[
                            'label' => esc_html__( 'Opacity', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                            'px' => [
                                    'min' => 0.01,
                                    'max' => 1,
                                    'step' => 0.01,
                            ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} a.cleintLogo' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
                $this->add_control( 'cl_logo_opacity_hr',[
                            'label' => esc_html__( 'Hover Opacity', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                            'px' => [
                                    'min' => 0.01,
                                    'max' => 1,
                                    'step' => 0.01,
                            ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} a.cleintLogo:hover' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_nav', [
                'label'             => esc_html__('Nav Styling', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'client_slide_nav',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_responsive_control( 'abi_counter_box_with', [
                                'label' => esc_html__( 'Nav BTN Width', 'themewar' ),
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
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'abi_counter_box_height', [
                                'label' => esc_html__( 'Nav BTN Height', 'themewar' ),
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
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button span, {{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button i, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button span, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button i'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button:hover:after',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_dots', [
                'label'             => esc_html__('Dots Styling', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'client_slide_dots',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_responsive_control( 'dots_width', [
                                'label' => esc_html__( 'Dots Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_height', [
                                'label' => esc_html__( 'Dots Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_width', [
                                'label' => esc_html__( 'Dots Inner Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_height', [
                                'label' => esc_html__( 'Dots Inner Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_control('dots_nr_outer_heading',[
                                        'label' => esc_html__( 'Outer Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_nr_outer_bg', [
                                            'label' => esc_html__( 'Outer BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_nr_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                        ],
                                ]
                            );
                            $this->add_control('dots_nr_inner_heading',[
                                        'label' => esc_html__( 'Inner Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_nr_inner_bg', [
                                            'label' => esc_html__( 'Inner BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_ps', [
                                        'label' => esc_html__( 'Dots Inner Position', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'allowed_dimensions' => ['top', 'left'],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_control('dots_hr_outer_heading',[
                                        'label' => esc_html__( 'Hover Outer Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_hr_outer_bg', [
                                            'label' => esc_html__( 'Outer BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot:hover, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot:hover',
                                    ]
                            );
                            $this->add_control('dots_hr_inner_heading',[
                                        'label' => esc_html__( 'Hover Inner Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_hr_inner_bg', [
                                            'label' => esc_html__( 'Inner BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot:hover span, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot:hover span',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_act',['label' => esc_html__( 'Active', 'themewar' )]);
                            $this->add_control('dots_ac_outer_heading',[
                                        'label' => esc_html__( 'Active Outer Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_ac_outer_bg', [
                                            'label' => esc_html__( 'Outer BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_ac_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                        ],
                                ]
                            );
                            $this->add_control('dots_ac_inner_heading',[
                                        'label' => esc_html__( 'Active Inner Option', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                ]
                            );
                            $this->add_responsive_control( 'dots_ac_inner_bg', [
                                            'label' => esc_html__( 'Inner BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active span, {{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active span',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();

                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots Gapping', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientSliderWrap .owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .clientTestimonial02.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();

        $clnt_view      = (isset($settings['clnt_view']) && $settings['clnt_view'] > 0) ? $settings['clnt_view'] : 1;

        $autoplay       = (isset($settings['client_slide_autoplay']) && $settings['client_slide_autoplay'] != '' ? $settings['client_slide_autoplay'] : 'no');
        $loop           = (isset($settings['client_slide_loop']) && $settings['client_slide_loop'] != '' ? $settings['client_slide_loop'] : 'no');
        $nav            = (isset($settings['client_slide_nav']) && $settings['client_slide_nav'] != '' ? $settings['client_slide_nav'] : 'no');
        $dots           = (isset($settings['client_slide_dots']) && $settings['client_slide_dots'] != '' ? $settings['client_slide_dots'] : 'no');
        
        $items_xxl_col  = (isset($settings['items_xxl_col']) && $settings['items_xxl_col'] > 0 ? $settings['items_xxl_col'] : 7);
        $items_xl_col   = (isset($settings['items_xl_col']) && $settings['items_xl_col'] > 0 ? $settings['items_xl_col'] : 5);
        $items_lg_col   = (isset($settings['items_lg_col']) && $settings['items_lg_col'] > 0 ? $settings['items_lg_col'] : 4);
        $items_md_col   = (isset($settings['items_md_col']) && $settings['items_md_col'] > 0 ? $settings['items_md_col'] : 3);
        $items_sm_col   = (isset($settings['items_sm_col']) && $settings['items_sm_col'] > 0 ? $settings['items_sm_col'] : 2);

        $gapping        = (isset($settings['items_gapping']) && $settings['items_gapping'] != '' ? $settings['items_gapping'] : 0);
        
        $clients_list         = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();

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
        <div class="clientSliderWrap <?php echo $animClass; ?>" <?php echo $animAttr; ?>
            data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
            data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
            data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
            data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
            
            data-itemxxl="<?php echo esc_attr($items_xxl_col); ?>"
            data-itemxl="<?php echo esc_attr($items_xl_col); ?>"
            data-itemlg="<?php echo esc_attr($items_lg_col); ?>"
            data-itemmd="<?php echo esc_attr($items_md_col); ?>"
            data-itemsm="<?php echo esc_attr($items_sm_col); ?>"
            
            data-gapping="<?php echo esc_attr($gapping); ?>"
        >
            <div class="clientSlider owl-carousel">
                <?php 
                    foreach($clients_list as $client):
                    $logo       = (isset($client['client_logo']['url']) && !empty($client['client_logo']['url'])) ? $client['client_logo']['url'] : '';
                    $url        = (isset($client['clinet_url']['url'])) ? $client['clinet_url']['url'] : 'javascript:void(0);';
                    $target     = (isset($client['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                    $nofollow   = (isset($client['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                    if($logo != ''): 
                ?>
                    <a class="cleintLogo" <?php echo $target.' '.$nofollow; ?> href="<?php echo esc_attr($url); ?>">
                    <?php if(!empty($logo)): ?>
                       <img src="<?php echo esc_url($logo) ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    <?php endif; ?>
                    </a>
                <?php endif; endforeach; ?>
            </div>
         </div>
        <?php
        
    }
        
    protected function content_template() {}
}