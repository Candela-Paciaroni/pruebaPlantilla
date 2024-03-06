<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Sidebar_Project_meta_Widgets extends Widget_Base {
    
    public function get_name() {
        return 'themewar-project-meta';
    }
    
    public function get_title() {
        return esc_html__('Project Meta', 'themewar');
    }
    
    public function get_icon() {
        return 'eicon-price-list';
    }
    
    public function get_categories() {
        return ['themewar-sidebar-elements'];
    }
    
    protected function register_controls() {
        
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Project Meta', 'themewar' ),
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
                            'label'         => esc_html__( 'Meta Icon', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_user1',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeater->add_control( 'pj_is_category', [
                            'label'             => esc_html__( 'Is Category?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Show', 'themewar' ),
                            'label_off'         => esc_html__( 'Hide', 'themewar' ),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $repeater->add_control('pj_title', [
                            'label'             => esc_html__('Meta Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => esc_html__('Clients:','themewar'),
                    ]
                );
                $repeater->add_control('pj_category', [
                                'label' => esc_html__('Project Category', 'themewar'),
                                'type' => 'themewar_autocomplete',
                                'description' => esc_html__('Select Project category, you can display only 2 Categories.', 'themewar'),
                                'action' => 'themewar_get_taxonomy',
                                'taxonomy' => 'folio_cat',
                                'multiple' => true,
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pj_is_category',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $repeater->add_control('pj_value', [
                            'label'             => esc_html__('Meta Value', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => esc_html__('TLK Multinational', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pj_is_category',
                                            'operator'  => '!=',
                                            'value'     => 'yes',
                                    ],
                                ],
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
                            'selector' => '{{WRAPPER}} .pjWidgetMeta',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fs_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pjWidgetMeta',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'fs_item_shadow',
                            'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pjWidgetMeta',
                    ]
                );
                $this->add_responsive_control( 'fs_item_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjWidgetMeta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjWidgetMeta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pjWidgetMeta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab__wid_title', [
                'label'         => esc_html__( 'Widget Title Style', 'themewar' ),
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
        
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Meta Item Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'fs_meta_item_bg',
                            'label' => esc_html__( 'Item Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .pdInfo',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fs_meta_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'fs_meta_item_shadow',
                            'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo',
                    ]
                );
                $this->add_responsive_control( 'fs_meta_item_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pdInfo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_meta_item_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pdInfo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_meta_item_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pdInfo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 
        
        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('Meta Title', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'fs_meta_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo p',
                    ]
                );
                $this->add_responsive_control( 'fs_meta_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pdInfo p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_meta_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pdInfo p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();  
        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('Meta Value', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'fs_meta_value_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo h3, {{WRAPPER}} .pdInfo .pdInfoCat, {{WRAPPER}} .pdInfo .pdInfoCat a',
                    ]
                );
                $this->add_responsive_control( 'fs_meta_value_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pdInfo h3'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdInfo .pdInfoCat'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdInfo .pdInfoCat a'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_meta_value_color_hr', [
                            'label' => esc_html__( 'Link Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pdInfo .pdInfoCat a:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_meta_value_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pdInfo h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pdInfo .pdInfoCat' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_6', [
                'label'         => esc_html__('Meta Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);

                $this->start_controls_tabs('style_tabs_icon' );
                        $this->start_controls_tab( 'style_icon_tab', [
                                'label' => esc_html__( 'Icon', 'themewar' ),
                        ]);
                                $this->add_group_control( Group_Control_Typography::get_type(), [
                                            'name'      => 'icon_box_i_typography',
                                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .pdInfo span i'
                                    ]
                                );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .pdInfo span i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                        $this->end_controls_tab(); 
                        $this->start_controls_tab( 'style_svg_tab', [
                                'label' => esc_html__( 'SVG', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'icon_box_svg_fill_nr',[
                                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .pdInfo span svg' => 'fill: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'icon_box_svg_stroke',[
                                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .pdInfo span svg' => 'stroke: {{VALUE}}',
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
                                                    '{{WRAPPER}} .pdInfo span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                                ],
                                                'default' => [],
                                                'selectors' => [
                                                        '{{WRAPPER}} .pdInfo span svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                                ],
                                                'default' => [],
                                                'selectors' => [
                                                        '{{WRAPPER}} .pdInfo span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'icon_box_i_bg_color',
                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .pdInfo > span:not(.pdInfoCat)',
                        ]
                );
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
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .pdInfo > span' => 'width: {{SIZE}}{{UNIT}};',
                            ]
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
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .pdInfo > span' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'icon_box_i_border_hr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo > span',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'icon_box_i__shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pdInfo > span',
                    ]
                );
                $this->add_responsive_control( 'icon_box_i_radius', [
                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .pdInfo > span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]);
                $this->add_responsive_control( 'icon_box_i_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .pdInfo > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'icon_box_i_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .pdInfo > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
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
        <div class="pjSidebarWidget pjWidgetMeta <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <?php 
            if(!empty($pj_list)):
                
                foreach($pj_list as $sl):
                $s_icons                = (isset($sl['pj_icons']) && $sl['pj_icons'] !='') ? $sl['pj_icons'] : '';
                $pj_is_category         = (isset($sl['pj_is_category']) && $sl['pj_is_category'] !='') ? $sl['pj_is_category'] : 'no';
                $pj_title               = (isset($sl['pj_title']) && $sl['pj_title'] !='') ? $sl['pj_title'] : '';
                $pj_value               = (isset($sl['pj_value']) && $sl['pj_value'] !='') ? $sl['pj_value'] : '';
                $pj_category            = (isset($sl['pj_category']) && $sl['pj_category'] !='') ? $sl['pj_category'] : array();
               
            ?>
                <div class="pdInfo <?php echo esc_attr($pj_is_category == 'yes' ? 'pdInfoCatWrap' : ''); ?>">
                    <?php if($s_icons != ''):?>
                        <span><?php \Elementor\Icons_Manager::render_icon( $sl['pj_icons'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    <?php endif; ?> 
                    <?php if(!empty($pj_title)): ?> 
                        <p><?php echo esc_html($pj_title); ?></p>
                    <?php endif; ?>
                    <?php if($pj_is_category == 'yes'): ?>
                            <span class="pdInfoCat">
                                <?php  
                                    if(!empty($pj_category)):
                                    $i = 1;
                                    $c = count($pj_category);
                                    foreach($pj_category as $std):
                                    $term = get_term_by('id', $std, 'folio_cat');
                                    $term_link = get_term_link( $term );
                                    if($i > 2){break;}
                                ?>
                                    <a href="<?php echo $term_link; ?>"><?php echo $term->name;?></a>
                                    <?php echo($i < $c && $i < 2 ? ',&nbsp;' : '');?>
                                <?php $i++; endforeach; endif; ?>
                            </span>
                    <?php else: ?>
                        <h3><?php echo esc_html($pj_value); ?></h3>
                    <?php endif; ?>
                </div>   
            <?php endforeach; endif;?>
        </div>
        <?php
    }
    
    protected function content_template() {}
}