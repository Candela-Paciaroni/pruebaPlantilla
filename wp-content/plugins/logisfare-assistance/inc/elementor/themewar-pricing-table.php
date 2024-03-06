<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Pricing_table_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-pricing-table';
    }
    
    public function get_title() {
        return esc_html__( 'Pricing Table', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' =>esc_html__( 'Pricing Table', 'themewar' ),
        ]);
                $this->add_control( 'pt_style', [
                            'label'     => esc_html__( 'Pricing Table Style', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Style 01', 'themewar' ),
                                    2       => esc_html__( 'Style 02', 'themewar' ),
                            ],
                    ]
                );
                
                $this->add_control('pt_currency',[
                            'label' => esc_html__( 'Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_dollar-sign',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $this->add_control('pt_packages_price',[
                            'label' => esc_html__( 'Package Price', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( '59' , 'themewar' ),
                            'label_block' => true,
                    ]
                );
                $this->add_control('pt_pkg_price_label_2',[
                            'label' => esc_html__( 'Package Price Label2', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( '00' , 'themewar' ),
                            'label_block' => true,
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control('pt_packages_Time',[
                            'label' => esc_html__( 'Package Period', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'per month' , 'themewar' ),
                            'label_block' => true,
                    ]
                );
                $this->add_control('pt_package_sub_title',[
                            'label' => esc_html__( 'Package Sub Title', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Category-1' , 'themewar' ),
                            'label_block' => true,
                    ]
                ); 
                $this->add_control('pt_packages_title',[
                            'label' => esc_html__( 'Package Title', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Basic Package' , 'themewar' ),
                            'label_block' => true,
                    ]
                );  	
                $repeater2 = new \Elementor\Repeater();
                $repeater2->add_control('pack_serv_title',[
                            'label' => esc_html__( 'Package Feature', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Super Fast Transport' , 'themewar' ),
                            'label_block' => true,
                    ]
                );
                $repeater2->add_control('pack_serv_icon',[
                            'label' => esc_html__( 'Package Feature Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_circle-check',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $this->add_control('pt_package_list',[
                            'label' => esc_html__( 'Package Features', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'fields' => $repeater2->get_controls(),
                            'default' => [
                                [
                                    'pack_serv_title'       => esc_html__( 'Super Fast Transport', 'themewar' ),
                                    'pack_serv_icon'        => esc_html__( 'themewar_circle-check', 'themewar' ),
                                ],
                            ],
                            'title_field' => '{{{ pack_serv_title }}}',
                    ]
                );
                $this->add_control('pt_packages_btn',[
                            'label' => esc_html__( 'BTN Lable', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Get started Now' , 'themewar' ),
                            'label_block' => true,
                    ]
                );
                $this->add_control( 'pt_btn_url', [
                            'label'             => esc_html__( 'BTN URL', 'themewar' ),
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
                'label'             => esc_html__('Price Card Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'background',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .priceItem, {{WRAPPER}} .singlePrice',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'pt_sing_card_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .priceItem, {{WRAPPER}} .singlePrice',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'pt_sing_card_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceItem, {{WRAPPER}} .singlePrice',
                    ]
                );
                $this->add_responsive_control( 'pt_sing_card_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .priceItem' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .singlePrice' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_sing_card_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .priceItem ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singlePrice ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pt_sing_card_pd',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .priceItem ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singlePrice ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_3', [
                'label'             => esc_html__('Card Header Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'pt_style',
                                'operator'  => '==',
                                'value'     => '2',
                        ]
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'pt_card_Inner_hd_area',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .priceHeader',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'pt_card_Inner_hd_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => ' {{WRAPPER}} .priceHeader',
                    ]
                );
                $this->add_responsive_control( 'pt_card_Inner_hd_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .priceHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_sing_card_inner_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceHeader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_sing_card_inner_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceHeader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_card_header_title_hd1',[
                        'label' => esc_html__( 'Card Inner Header', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->start_controls_tabs('pt_card_header_tab');
                    
                    $this->start_controls_tab( 'pt_header_normal_tab', [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                    );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pt_hd_Inner_hd_area_bg',
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .priceHeaderCon',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'pt_header_hover_tab', [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                    );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pt_hd_Inner_hd_area_bg_hr',
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .singlePrice:hover .priceHeaderCon',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'pt_hd_Inner_hd_area_bd',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => ' {{WRAPPER}} .priceHeaderCon',
                    ]
                );
                $this->add_responsive_control( 'pt_hd_Inner_hd_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .priceHeaderCon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_hd_Inner_hd_area_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceHeaderCon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_hd_Inner_hd_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceHeaderCon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_4', [
                'label'             => esc_html__('Card Package Title', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control('pt_card_title_hd1',[
                        'label' => esc_html__( 'Card Sub Title', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_card_sub_title_typo',
                            'label'     => esc_html__( 'Sub Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceContent p, {{WRAPPER}} .priceHeader p',
                    ]
                );
                $this->add_responsive_control( 'pt_card_sub_title_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceContent p' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceHeader p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_card_sub_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceContent p ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceHeader p ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_card_sub_title_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceContent p ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceHeader p ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_control('pt_card_title_hd2',[
                        'label' => esc_html__( 'Card Title', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_card_title_typo',
                            'label'     => esc_html__( 'Title Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceContent h3, {{WRAPPER}} .priceHeader h3',
                    ]
                );
                $this->add_responsive_control( 'pt_card_title_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceContent h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceHeader h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_card_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceContent h3 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceHeader h3 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_card_title_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceContent h3 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceHeader h3 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                
                $this->add_control('pt_card_hd_aligment',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'left',
                            'toggle' => true,
                            'selectors' => [
                                '{{WRAPPER}} .priceContent' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .priceHeader' => 'text-align: {{VALUE}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_6', [
                'label'             => esc_html__('Package Price', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control( 'pt_price_area_title',[
                        'label' => esc_html__( 'Package Price Area', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'price_area_background',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .priceBox, {{WRAPPER}} .priceCircle',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'price_area_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .priceBox, {{WRAPPER}} .priceCircle',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'price_area_shadows',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceBox, {{WRAPPER}} .priceCircle',
                    ]
                );
                $this->add_responsive_control( 'price_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .priceBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceCircle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'price_area_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .priceBox ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .priceCircle ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('price_area_padding',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .priceBox ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .priceCircle ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control( 'pt_package_amount_heading',[
                        'label' => esc_html__( 'Package Price  Currency', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_price_curr_typo',
                            'label'     => esc_html__( 'Currency Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceBox h2 span > i, {{WRAPPER}} .priceCircle span > i',
                    ]
                );
                $this->add_responsive_control( 'pt_price_curr_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox h2 span > i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceCircle span > i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_price_curr_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceBox h2 span > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceCircle span > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pt_package_amount_svg_heading',[
                        'label' => esc_html__( 'Package Price SVG Currency', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_control( 'pt_price_curr_svg_width',[
                        'label' => esc_html__( 'Width', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .priceBox h2 span > svg' => 'width: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .priceCircle span > svg' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control( 'pt_price_curr_svg_height',[
                        'label' => esc_html__( 'Height', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .priceBox h2 span > svg' => 'height: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .priceCircle span > svg' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'pt_price_curr_svg_color',[
                            'label'     => esc_html__( 'Fill Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox h2 span > svg' => 'fill: {{VALUE}}',
                                    '{{WRAPPER}} .priceCircle span > svg' => 'fill: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_price_curr_svg_stroke_color',[
                            'label'     => esc_html__( 'Stroke Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox h2 span > svg' => 'stroke: {{VALUE}}',
                                    '{{WRAPPER}} .priceCircle span > svg' => 'stroke: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_price_curr_svg_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceBox h2 span > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceCircle span > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control( 'pt_package_price_hd',[
                        'label' => esc_html__( 'Package Price', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_curr_price_typo',
                            'label'     => esc_html__( 'Price Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceBox h2, {{WRAPPER}} .priceCircle span:last-child',
                    ]
                );
                $this->add_responsive_control( 'pt_curr_price_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox h2' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceCircle span:last-child' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_curr_price_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceBox h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceCircle span:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pt_package_price_lable_hd',[
                        'label' => esc_html__( 'Package Price Lable', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'pt_style',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_curr_price_lable_typo',
                            'label'     => esc_html__( 'Price Lable Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceBox h2 span:last-of-type',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_curr_price_lable_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox h2 span:last-of-type' => 'color: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_curr_price_lable_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceBox h2 span:last-of-type' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'pt_package_limit_hd',[
                        'label' => esc_html__( 'Package Limit', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'pt_style',
                                        'operator'  => '==',
                                        'value'     => '1',
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_package_limit_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceBox p',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_time_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceBox p' => 'color: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_time__mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceBox p ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('pt_card_pric_area_align',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'left',
                            'prefix_class'              => 'pricArea-align-',
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_7', [
                'label'             => esc_html__('Single Card Body Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'pt_card_Inner_bd_area',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .priceList, {{WRAPPER}} .priceList02',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'pt_card_Inner_bd_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .priceList, {{WRAPPER}} .priceList02',
                    ]
                );
                $this->add_responsive_control( 'pt_sing_card_inner_bd_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );  
                $this->add_responsive_control( 'pt_sing_card_inner_bd_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );   
                $this->add_control('pt_card_body_area_align',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'left',
                            'prefix_class'              => 'priceList-align-',
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_8', [
                'label'             => esc_html__('Package Features List', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control( 'more_options',[
                        'label' => esc_html__( 'Features List Icon', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_package_serv_I_typo',
                            'label'     => esc_html__( 'Icon Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceList ul li i, {{WRAPPER}} .priceList02 ul li i',
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_I_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceList li i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceList02 li i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_hr_I_color',[
                            'label'     => esc_html__( 'Box Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singlePrice:hover .priceList02 li i' => 'color: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_i_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList li i ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li i ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                ); 

                $this->add_control( 'svg_more_options',[
                        'label' => esc_html__( 'Features List SVG', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_responsive_control( 'pt_package_svg_color',[
                            'label'     => esc_html__( 'Fill Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceList li svg' => 'fill: {{VALUE}}',
                                    '{{WRAPPER}} .priceList02 li svg' => 'fill: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_svg_stroke_color',[
                            'label'     => esc_html__( 'Stroke Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceList li svg' => 'stroke: {{VALUE}}',
                                    '{{WRAPPER}} .priceList02 li svg' => 'stroke: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_hr_svg_color',[
                            'label'     => esc_html__( 'Box Hover Fill Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singlePrice:hover .priceList02 li svg' => 'fill: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_hr_svg_stroke_color',[
                            'label'     => esc_html__( 'Box Hover Stroke Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singlePrice:hover .priceList02 li svg' => 'stroke: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pt_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('pt_package_svg_stroke_width',[
                            'label' => esc_html__( 'Icon Stroke Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .priceList li svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_package_svg_width',[
                            'label' => esc_html__( 'Icon Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .priceList li svg' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_package_svg_height',[
                            'label' => esc_html__( 'Icon Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .priceList li svg' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_svg_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList li svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pt_package_serv_i_heading',[
                        'label' => esc_html__( 'Package Feature', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_package_serv_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .priceList li span, {{WRAPPER}} .priceList02 li span',
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .priceList li' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .priceList02 li' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_serv_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .priceList li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .priceList02 li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_9', [
                'label'             => esc_html__('Get Button', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pt_package_btn_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .logicBtn',
                    ]
                );
                $this->start_controls_tabs('pt_package_btn_tabs');
                    $this->start_controls_tab( 'pt_package_btn_nr_tab',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'pt_package_btn_color_nr',[
                                        'label'     => esc_html__( 'Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logicBtn' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pt_btn_nr_background',
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .logicBtn',
                                ]
                            );
                    $this->end_controls_tab(); 
                    $this->start_controls_tab( 'pt_package_btn_hr_tab',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'pt_package_btn_color_hr',[
                                        'label'     => esc_html__( 'Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logicBtn:hover' => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pt_btn_hr_background',
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .logicBtn:hover',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'pt_btn_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logicBtn',
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'pt_btn_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => ' {{WRAPPER}} .logicBtn',
                    ]
                );
                $this->add_responsive_control( 'pt_btn_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_btn_width',[
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_btn_height',[
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pt_package_btn_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logicBtn ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('pt_card_get_btn_area_align',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'center',
                            'prefix_class'              => 'priceTb_btn-align-',
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
       
        //  
        $pt_style               = (isset($settings['pt_style']) && $settings['pt_style'] > 0) ? $settings['pt_style'] : 1;
        $pt_currency            = (isset($settings['pt_currency']) && $settings['pt_currency'] !='') ? $settings['pt_currency'] : '';
        $pt_packages_price      = (isset($settings['pt_packages_price']) && $settings['pt_packages_price'] !='') ? $settings['pt_packages_price'] : '';
        $pt_pkg_price_label_2   = (isset($settings['pt_pkg_price_label_2']) && $settings['pt_pkg_price_label_2'] !='') ? $settings['pt_pkg_price_label_2'] : '';
        $pt_packages_Time       = (isset($settings['pt_packages_Time']) && $settings['pt_packages_Time'] !='') ? $settings['pt_packages_Time'] : '';
        $pt_package_sub_title   = (isset($settings['pt_package_sub_title']) && $settings['pt_package_sub_title'] !='') ? $settings['pt_package_sub_title'] : '';
        $pt_packages_title      = (isset($settings['pt_packages_title']) && $settings['pt_packages_title'] != '') ? $settings['pt_packages_title'] : '';
        $pack_serv_list         = (isset($settings['pack_serv_list']) && $settings['pack_serv_list'] !='') ? $settings['pack_serv_list'] : array();
        $pt_packages_btn        = (isset($settings['pt_packages_btn']) && $settings['pt_packages_btn'] != '') ? $settings['pt_packages_btn'] : '';
        
        $target                 = (isset($settings['pt_btn_url']['is_external']) && $settings['pt_btn_url']['is_external'] != '') ? ' target=_blank' : '' ;
        $nofollow               = (isset($settings['pt_btn_url']['nofollow']) && $settings['pt_btn_url']['nofollow'] != '') ? ' rel=nofollow' : '' ;
        $pt_btn_url             = (isset($settings['pt_btn_url']['url']) && $settings['pt_btn_url']['url'] != '') ? $settings['pt_btn_url']['url'] : 'javascript:void(0);';

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
        $pt_package_list    = (isset($settings['pt_package_list']) && !empty($settings['pt_package_list'])) ? $settings['pt_package_list'] : array();

        if($pt_style == 2): 
        ?>
            <div class="singlePrice <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <div class="priceHeader">
                    <div class="priceHeaderCon">
                        <h3><?php echo esc_html($pt_packages_title); ?></h3>
                        <p><?php echo esc_html($pt_package_sub_title); ?></p>
                    </div>
                </div>
                <div class="priceCircle">
                    <span><?php \Elementor\Icons_Manager::render_icon( $settings['pt_currency'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <span><?php echo esc_html($pt_packages_price);?></span>
                </div>
                <div class="priceList02">
                    <ul>
                        <?php 
                        foreach($pt_package_list as $list):
                            $pack_serv_title   = isset($list['pack_serv_title']) ? $list['pack_serv_title'] : '';
                            $pack_serv_icon    = isset($list['pack_serv_icon']) ? $list['pack_serv_icon'] : '';
                        ?>
                        <li>
                            <?php \Elementor\Icons_Manager::render_icon( $list['pack_serv_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <span><?php echo esc_html($pack_serv_title); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="priceTb_footer">
                    <a class="logicBtn" <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_attr($pt_btn_url); ?>"><?php echo esc_html($pt_packages_btn); ?></a>
                </div>
            </div>

        <?php else: ?>
            <div class="priceItem <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <div class="priceBox">
                    <h2>
                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['pt_currency'], [ 'aria-hidden' => 'true' ] ); ?></span>
                        <?php echo esc_html($pt_packages_price);?>
                        <span><?php echo esc_html('.'.$pt_pkg_price_label_2); ?></span>
                    </h2>
                    <p><?php echo esc_html($pt_packages_Time); ?></p>
                </div>
                <div class="priceContent">
                    <p><?php echo esc_html($pt_package_sub_title); ?></p>
                    <h3><?php echo esc_html($pt_packages_title); ?></h3>
                    <div class="priceList">
                        <ul>
                            <?php 
                            foreach($pt_package_list as $list):
                                $pack_serv_title   = isset($list['pack_serv_title']) ? $list['pack_serv_title'] : '';
                                $pack_serv_icon    = isset($list['pack_serv_icon']) ? $list['pack_serv_icon'] : '';
                            ?>
                            <li>
                                <?php \Elementor\Icons_Manager::render_icon( $list['pack_serv_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <span><?php echo esc_html($pack_serv_title); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="priceTb_footer">
                    <a class="logicBtn" <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_attr($pt_btn_url); ?>"><?php echo esc_html($pt_packages_btn); ?></a>
                </div>
                
            </div>
            <?php endif; ?>
        <?php
    }
    
    protected function content_template() {}
    
}