<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Sidebar_Project_Boucher_Widgets extends Widget_Base {
    
    public function get_name() {
        return 'themewar-project-boucher';
    }
    
    public function get_title() {
        return esc_html__('Project Boucher', 'themewar');
    }
    
    public function get_icon() {
        return 'eicon-price-list';
    }
    
    public function get_categories() {
        return ['themewar-sidebar-elements'];
    }
    
    protected function register_controls() {
        
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Project Boucher', 'themewar' ),
        ]);
                $this->add_control('widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                    ]
                );
                $repeater = new \Elementor\Repeater();
                $repeater->add_control('pj_icons',[
                            'label'         => esc_html__( 'Boucher Icon', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-pdf',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeater->add_control('pj_title', [
                            'label'             => esc_html__('Boucher Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => esc_html__('Project Boucher','themewar'),
                    ]
                );
                $repeater->add_control('pj_value', [
                            'label'             => esc_html__('Boucher Size', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => esc_html__('253kb', 'themewar'),
                    ]
                );
                $repeater->add_control( 'download_url', [
                            'label'             => esc_html__( 'Download Able File Url', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com/text.pdf', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => false,
                                    'nofollow'       => false,
                            ],
                    ]
                );
                $this->add_control( 'pj_list',[
                            'label'         => esc_html__( 'Meta Items', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [],
                            'title_field' => '{{{ pj_title }}}',
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
                'label'         => esc_html__( 'Widget Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'fs_item_bg',
                            'label' => esc_html__( 'Item Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .pjBoucher',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fs_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pjBoucher',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'fs_item_shadow',
                            'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pjBoucher',
                    ]
                );
                $this->add_responsive_control( 'fs_item_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjBoucher' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjBoucher' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjBoucher' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab__wid_title', [
                'label'         => esc_html__( 'Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'wid_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .widgetTitle',
                    ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('Bouncer Area', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control( 'pj_bouncer_bg',[
                            'label' => esc_html__( 'Box Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile'    => 'background: {{VALUE}} !important',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pj_bouncer_bg_hr',[
                            'label' => esc_html__( 'Hover Box Background', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile:hover'    => 'background: {{VALUE}} !important',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(),[
                            'name'      => 'pj_bouncer_bdr',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .serWidgetFile',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                            'name'      => 'pj_bouncer_shadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .serWidgetFile',
                    ]
                );
                $this->add_responsive_control('pj_bouncer_radius',[
                            'label'         => esc_html__( 'Border Radius', 'themewar' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .serWidgetFile'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pj_bouncer_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serWidgetFile' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pj_bouncer_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serWidgetFile' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'          => 'icon_typography',
                            'label'         => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'      => '{{WRAPPER}} .serWidgetFile i',
                    ]
                );
                $this->add_responsive_control('icon_box_width',[
                            'label'      => esc_html__( 'Width', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => 'px',
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile span' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('icon_box_height',[
                            'label'      => esc_html__( 'Height', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => 'px',
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile span' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('icon_box_border_radius',[
                            'label'         => esc_html__( 'Border Radius', 'themewar' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .serWidgetFile span'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->start_controls_tabs( 'social_styling_tab' );
                    $this->start_controls_tab('social_tab_normal',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                        $this->add_responsive_control('social_icon_color',[
                                    'label'     => esc_html__( 'Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .serWidgetFile i'    => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(),[
                                    'name'      => 'pj_border',
                                    'label'     => esc_html__( 'Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .serWidgetFile span',
                            ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                                    'name'      => 'pj_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .serWidgetFile span',
                            ]
                        );
                    $this->end_controls_tab();  

                    $this->start_controls_tab('social_tab_hover',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                        $this->add_responsive_control( 'social_icon_hover_color',[
                                    'label'     => esc_html__( 'Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .serWidgetFile:hover span i'    => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'social_hover_bg_hr',[
                                    'label' => esc_html__( 'Icon Background', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .serWidgetFile:hover span'    => 'background: {{VALUE}} !important',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(),[
                                    'name'      => 'pj_hover_border',
                                    'label'     => esc_html__( 'Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .serWidgetFile:hover span',
                            ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                                    'name'      => 'pj_hover_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .serWidgetFile:hover span',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
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
                                                '{{WRAPPER}} .serWidgetFile span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serWidgetFile span svg' => 'stroke: {{VALUE}}',
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
                                                '{{WRAPPER}} .serWidgetFile span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .serWidgetFile span svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .serWidgetFile span svg' => 'height: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .serWidgetFile:hover span svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'icon_box_svg_stroke_hr',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serWidgetFile:hover span svg' => 'stroke: {{VALUE}}',
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
                                        '{{WRAPPER}} .serWidgetFile span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .serWidgetFile span' => 'height: {{SIZE}}{{UNIT}};',
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
                                            'selector' => '{{WRAPPER}} .serWidgetFile span',
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
                                            'selector' => '{{WRAPPER}} .serWidgetFile:hover span',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_svg_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .serWidgetFile span',
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control(
                        'icon_box_svg_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .serWidgetFile span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_6', [
                'label'         => esc_html__('Boucher Content', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control('boucher_cnt_hd1',[
                        'label' => esc_html__( 'Boucher Title', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                ); 
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'          => 'boucher_cnt_hd_typo',
                            'label'         => esc_html__( 'Typography', 'themewar' ),
                            'selector'      => '{{WRAPPER}} .serWidgetFile strong',
                    ]
                );
                $this->add_responsive_control( 'boucher_cnt_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile strong'    => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'boucher_cnt_color_hr',[
                            'label'     => esc_html__( 'Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile:hover strong'    => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pj_bouncer_cnt_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serWidgetFile strong' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control('boucher_cnt_hd2',[
                        'label' => esc_html__( 'Boucher Zize', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'          => 'boucher_cnt_sz_typo',
                            'label'         => esc_html__( 'Typography', 'themewar' ),
                            'selector'      => '{{WRAPPER}} .serWidgetFile p',
                    ]
                );
                $this->add_responsive_control( 'boucher_cnt_sz_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile p'    => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'boucher_cnt_sz_color_hr',[
                            'label'     => esc_html__( 'Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .serWidgetFile:hover p'    => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pj_bouncer_sz_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serWidgetFile p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $widget_title       = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $pj_list            = (isset($settings['pj_list']) && !empty($settings['pj_list'])) ? $settings['pj_list'] : array();

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
        <div class="pjSidebarWidget pjBoucher <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <?php 
                
           if(!empty($pj_list)):
                
                foreach($pj_list as $sl):
                $pj_icons           = (isset($sl['pj_icons']) && $sl['pj_icons'] !='') ? $sl['pj_icons'] : '';
                $pj_title           = (isset($sl['pj_title']) && $sl['pj_title'] !='') ? $sl['pj_title'] : '';
                $pj_value           = (isset($sl['pj_value']) && $sl['pj_value'] !='') ? $sl['pj_value'] : '';
                
                $target         = (isset($sl['download_url']['is_external']) && $sl['download_url']['is_external'] != '') ? ' target=_blank' : '' ;
                $nofollow       = (isset($sl['download_url']['nofollow']) && $sl['download_url']['nofollow'] != '') ? ' rel=nofollow' : '' ;
                $url            = (isset($sl['download_url']['url']) && $sl['download_url']['url'] != '') ? $sl['download_url']['url'] : 'javascript:void(0);';
            ?>
                <a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_attr($url); ?>" download="" class="serWidgetFile">
                    <span><?php \Elementor\Icons_Manager::render_icon( $sl['pj_icons'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <strong><?php echo esc_html($pj_title); ?></strong>
                    <p><?php echo esc_html($pj_value); ?></p>
                </a>
            <?php endforeach; endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {}
}