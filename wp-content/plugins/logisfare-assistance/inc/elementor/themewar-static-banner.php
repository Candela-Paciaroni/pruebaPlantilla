<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_static_Banner_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-static-anner';
    }
    
    public function get_title() {
        return esc_html__( 'Static Banner', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Static Banner', 'themewar')
        ]);   
                $this->add_control( 'banner_style', [
                            'label'   => esc_html__( 'Banner Style', 'themewar' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                    '1'      => esc_html__( 'Style 01', 'themewar' ),
                                    '2'      => esc_html__( 'Style 02', 'themewar' ),
                            ]
                    ]
                );
                $this->add_control('banner_title', [
                            'label'             => esc_html__('Title 01', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('VIBRENT &', 'themewar'),
                    ]
                );
                $this->add_control('banner_title02', [
                            'label'             => esc_html__('Title 02', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('INNOVATIVE', 'themewar'),
                    ]
                );
                $this->add_control('banner_desc', [
                            'label'             => esc_html__('Description', 'themewar'),
                            'type'              => Controls_Manager::TEXTAREA,
                            'label_block'       => true,
                            'default'           => esc_html__('We can help you channel your potential implementing your idea. We take care of all your needs, crafting specific and targeted solutions.', 'themewar'),
                    ]
                );
                $this->add_control('btn_icons', [
                            'label'         => esc_html__( 'Button Icon', 'themewar' ),
                            'type'          => Controls_Manager::ICON,
                            'label_block'   => TRUE,
                    ]
                );
                $this->add_control('btn_label', [
                            'label'             => esc_html__('Button Label', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('Read More', 'themewar'),
                    ]
                );
                $this->add_control( 'btn_icon_position', [
                                'label'   => esc_html__( 'Icon Position', 'themewar' ),
                                'type'    => Controls_Manager::SELECT,
                                'default' => 'in_top',
                                'options' => [
                                        'in_top'      => esc_html__( 'Top', 'themewar' ),
                                        'in_bottom'       => esc_html__( 'Bottom', 'themewar' )
                                ],
                        ]
                );
                $this->add_control( 'btn_url', [
                            'label'             => esc_html__( 'URL', 'themewar' ),
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
                $this->add_control('hv_btn_bdcolor',[
                            'label' => esc_html__( 'Hover Cursor Border Color', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                    ]
                );		
                $this->add_control('bh_btn_bdradius',[
                            'label' => esc_html__( 'Hover Cursor Border Radius', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 100,
                            'step' => 0,
                            'default' => 50,
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
                'label'     => esc_html__('Banner Area', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'bnn_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .fiexdBanner, {{WRAPPER}} .fiexdBanner02',
                    ]
                );
                $this->add_responsive_control('bnn_height', [
                            'label' => esc_html__( 'Banner Height', 'themewar' ),
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
                                    '{{WRAPPER}} .fiexdBanner' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .fiexdBanner02' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_margin', [
                            'label' => esc_html__( 'Banner Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBanner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBanner02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_padding', [
                            'label' => esc_html__( 'Banner Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBanner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBanner02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'     => esc_html__('Banner Overlay', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'bnn_bg_overlay',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .fiexdBannerOverlay, {{WRAPPER}} .fiexdBannerOverlay02',
                    ]
                );
                $this->add_control('bnn_bg_opacity',[
                            'label' => esc_html__( 'Opacity', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0.01,
                                    'max' => 1,
                                    'step' => 0.01,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBannerOverlay' => 'opacity: {{SIZE}};',
                                '{{WRAPPER}} .fiexdBannerOverlay02' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_bg_margin', [
                            'label' => esc_html__( 'Banner Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBannerOverlay' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBannerOverlay02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_bg_padding', [
                            'label' => esc_html__( 'Banner Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBannerOverlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBannerOverlay02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_Content_tab', [
                'label'         => esc_html__( 'Banner Main Content', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('bnn_content_width', [
                            'label' => esc_html__( 'Content Area Width', 'themewar' ),
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
                                    '{{WRAPPER}} .fiexdBanner_cont' => 'max-width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .fiexdBanner_cont02' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'text_align', [
                                'label'                     => esc_html__( 'Alignment', 'themewar' ),
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
                                'prefix_class'              => 'elementor%s-align-',
                        ]
                );
                $this->add_responsive_control( 'bnn_content_desc_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .fiexdBanner_cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBanner_cont02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section( 'section_tab_4', [
                'label'         => esc_html__( 'Button & Desc Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control( 'bnn_btn_desc_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareBannerBtnArea ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareBannerBtnArea02 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_btn_desc_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareBannerBtnArea ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareBannerBtnArea02 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('banner_title_tab', [
                'label'         => esc_html__( 'Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'bnn_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .fiexdBanner_cont h2, {{WRAPPER}} .fiexdBanner_cont02 h2',
                    ]
                );
                $this->add_responsive_control( 'bnn_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .fiexdBanner_cont h2'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .fiexdBanner_cont02 h2'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_title_margin', [
                            'label' => esc_html__( 'Title 01 Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBanner_cont h2:nth-child(1)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBanner_cont02 h2:nth-child(1)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_title02_margin', [
                            'label' => esc_html__( 'Title 02 Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .fiexdBanner_cont h2:nth-child(2)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .fiexdBanner_cont02 h2:nth-child(2)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_6', [
                'label'     => esc_html__('Description Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'bnn_desc_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareBannerBtnArea p, {{WRAPPER}} .logisfareBannerBtnArea02 p',
                    ]
                );
                $this->add_responsive_control( 'bnn_desc_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareBannerBtnArea p'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .logisfareBannerBtnArea02 p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_desc_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBannerBtnArea p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareBannerBtnArea02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'bnn_desc_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBannerBtnArea p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareBannerBtnArea02 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_7', [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_1_typography',
                            'label' => esc_html__( 'Button Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareBTN',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                    $this->start_controls_tab('btn_1_button_style_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ), ]);
                        $this->add_responsive_control( 'btn_1_label_color', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logisfareBTN'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                    'name' => 'btn_1_bg',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .logisfareBTN',
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                    'name' => 'btn_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .logisfareBTN',
                            ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name'      => 'btn_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .logisfareBTN',
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' ),] );
                        $this->add_responsive_control( 'btn_1_label_color_hover', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logisfareBTN:hover'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'btn_1_label_bh_hover', [
                                    'label' => esc_html__( 'Background Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logisfareBTN'   => '--btnHoverColor: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                    'name' => 'btn_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .logisfareBTN:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name'      => 'btn_box_shadow_hover',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .logisfareBTN:hover',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('btn_1_width', [
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
                                '{{WRAPPER}} .logisfareBTN' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => "before",
                    ]
                );
                $this->add_responsive_control('btn_1_height', [
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
                                    '{{WRAPPER}} .logisfareBTN' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    
        $this->start_controls_section('section_tab_8', [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_icon_typography',
                            'label' => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareBTN i',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('icon_button_style_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                        $this->add_responsive_control( 'icon_label_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareBTN i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_bg',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .logisfareBTN i',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_border',
                                        'label'     => esc_html__( 'Border', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .logisfareBTN i'
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                        $this->add_responsive_control( 'icon_label_hover_color', [
                                        'label'     => esc_html__( 'Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareBTN:hover i'   => 'color: {{VALUE}}'
                                        ]
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_hover_bg',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => ' {{WRAPPER}} .logisfareBTN:hover i',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_hover_border',
                                        'label'     => esc_html__( 'Border', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .logisfareBTN:hover i',
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'icon_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                            'separator' => "before",
                    ]
                );
                $this->add_responsive_control( 'icon_1_width', [
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
                                    '{{WRAPPER}} .logisfareBTN i' => 'width: {{SIZE}}{{UNIT}};'
                            ]
                        ]
                );
                $this->add_responsive_control( 'icon_1_height', [
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
                                        '{{WRAPPER}} .logisfareBTN i' => 'height: {{SIZE}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'btn_icon_positioning', [
                                'label' => esc_html__( 'Icon Position', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareBTN i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control( 'btn_icon_padding', [
                            'label' => esc_html__( 'Icon Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px','%', 'em'],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('btn_icon_row_gap', [
                            'label' => esc_html__( 'Icon & Text Spacing', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('btn_icon_rotate',[
                            'label' => esc_html__( 'Icon Rotate', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['deg'],
                            'range' => [
                                'deg' => [
                                    'min' => -360,
                                    'max' => 360,
                                    'step' => 0,
                                ],
                            ],
                            'default' => [
                                'unit' => 'deg',
                                'size' => -46.97,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareBTN i' => 'transform: rotate({{SIZE}}{{UNIT}});',
                            ],
                    ]
                );
        $this->end_controls_section();
        

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();


        $banner_style       = (isset($settings['banner_style']) && $settings['banner_style'] > 0) ? $settings['banner_style'] : 1;
        $banner_title       = (isset($settings['banner_title']) && $settings['banner_title'] != '') ? $settings['banner_title'] : '';
        $banner_title02     = (isset($settings['banner_title02']) && $settings['banner_title02'] != '') ? $settings['banner_title02'] : '';
        $banner_desc        = (isset($settings['banner_desc']) && $settings['banner_desc'] != '') ? $settings['banner_desc'] : '';
        $btn_label          = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : esc_html__('Have An Idea ?', 'themewar');
        $icons              = (isset($settings['btn_icons']) && $settings['btn_icons'] != '') ? '<i class="'.$settings['btn_icons'].'"></i>' : '<i class="logisfare-long-r-arrow"></i>';
        $cursor_bdColor     = (isset($settings['hv_btn_bdcolor']) && $settings['hv_btn_bdcolor'] != '') ? $settings['hv_btn_bdcolor'] : '#ff5100';
        $cursor_bdradius    = (isset($settings['bh_btn_bdradius']) && $settings['bh_btn_bdradius'] != '') ? $settings['bh_btn_bdradius'] : '0';
        
        $target             = isset($settings['btn_url']['is_external']) && !empty($settings['btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow           = isset($settings['btn_url']['nofollow']) && !empty($settings['btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url            = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : 'javascript:void(0);';
        
        $icon_position      = (isset($settings['btn_icon_position']) && $settings['btn_icon_position'] != '' ? $settings['btn_icon_position'] : 'in_top');
        $btn_html           = ($icon_position == 'in_top' ? $icons : '');
        $btn_html           .= $btn_label;
        $btn_html           .= ($icon_position == 'in_bottom' ? $icons : '');

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
        
        $attributs = '';
        if(isset($settings['btn_url']['custom_attributes']) && !empty($settings['btn_url']['custom_attributes'])):
            $custom_attributes = explode(',', $settings['btn_url']['custom_attributes']);
            foreach($custom_attributes as $cas):
                $attribut = explode('|', $cas);
                $attributs .= (isset($attribut[0]) && !empty($attribut[0]) ? $attribut[0] : '').(isset($attribut[1]) && !empty($attribut[1]) ? '='.$attribut[1].' ' : ' ');
            endforeach;
        endif;
        if($banner_style == 2): 
        ?>
            <section class="fiexdBanner02">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fiexdBanner_cont02 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                                <h2><?php echo logisfare_kses($banner_title); ?></h2>
                                <h2><?php echo logisfare_kses($banner_title02); ?></h2>
                                <div class="logisfareBannerBtnArea02 clearfix">
                                    <a class="logisfareBTN magic-hover" data-radius="<?php echo esc_attr($cursor_bdradius); ?>%" data-border-color="<?php echo esc_attr($cursor_bdColor); ?>" <?php echo esc_attr($attributs); ?> <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>" ><?php echo $btn_html; ?></a>
                                    <?php if(!empty($banner_desc)): ?>
                                        <p><?php echo logisfare_kses($banner_desc); ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="typeHeading"></h1>
                </div>
                <div class="fiexdBannerOverlay02"></div>
            </section>
        <?php else: ?>
            <section class="fiexdBanner">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="fiexdBanner_cont <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                                <?php if(!empty($banner_title)): ?>
                                    <h2><?php echo logisfare_kses($banner_title); ?></h2>
                                    <h2><?php echo logisfare_kses($banner_title02); ?></h2>
                                <?php endif; ?>
                                <div class="logisfareBannerBtnArea clearfix">
                                    <a class="logisfareBTN magic-hover" data-radius="<?php echo esc_attr($cursor_bdradius); ?>%" data-border-color="<?php echo esc_attr($cursor_bdColor); ?>" <?php echo esc_attr($attributs); ?> <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $btn_url; ?>" ><?php echo $btn_html; ?></a>
                                    <?php if(!empty($banner_desc)): ?>
                                        <p><?php echo logisfare_kses($banner_desc); ?></p>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fiexdBannerOverlay"></div>
            </section>
        <?php endif;
    }
        
    protected function content_template() {}
}