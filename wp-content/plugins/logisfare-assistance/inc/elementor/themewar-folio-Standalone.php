<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Folio_Standalone_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-folio-standalone';
    }
    public function get_title() {
        return esc_html__('Folio Grid StandAlone', 'themewar');
    }
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Folio Gird StandAlone', 'themewar' ),
        ]);
                $this->add_control( 'view_style', [
                                'label'         => esc_html__( 'Grid View Style', 'themewar' ),
                                'type'          => Controls_Manager::SELECT,
                                'default'       => 1,
                                'options'       => [
                                        1       => esc_html__( 'Style 1', 'themewar' ),
                                        2       => esc_html__( 'Style 2', 'themewar' ),
                                        3       => esc_html__( 'Style 3', 'themewar' ),
                                ],
                        ]
                );
                
                $this->add_control('bzy_thumb_width', [
                                'label' => esc_html__( 'Thumbnail Width', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                        ]
                );
                $this->add_control('bzy_thumb_height', [
                                'label' => esc_html__( 'Thumbnail Height', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                                
                        ]
                );
                $this->add_control( 'pfs_folio', [
                                'label'         => esc_html__( 'Specific Portfolio', 'themewar' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => 0,
                                'options'       => logisfare_post_array('folio', esc_html__('All Portfolio', 'themewar'))
                        ]
                );
                $this->add_control( 'folio_item_length', [
                                'label'     => esc_html__( 'Title Length', 'themewar' ),
                                'type'      => Controls_Manager::NUMBER,
                                'min'       => 1,
                                'max'       => 200,
                                'step'      => 1,
                                'default'   => 23,
                        ]
                );
        $this->end_controls_section();  

        $this->start_controls_section('cursor_text', [
                'label' => esc_html__( 'Project Cursor View', 'themewar' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
        ]);
                $this->add_control('cursor_text_01',[
                            'label' => esc_html__( 'Cursor First Line', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'View', 'themewar' ),
                    ]
                );
                $this->add_control('cursor_text_02',[
                            'label' => esc_html__( 'Cursor Second Line', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Details', 'themewar' ),
                    ]
                );
                $this->add_control('cursor_border_color',[
                            'label' => esc_html__( 'Cursor Border Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                    ]
                );
                $this->add_control('cursor_bg_color',[
                            'label' => esc_html__( 'Cursor Background Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
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

        $this->start_controls_section('section_tab_itemarea', [
                'label'         => esc_html__('Item Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'pfs_items_area_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .project_item, {{WRAPPER}} .project_items03, {{WRAPPER}} .portfolioCarItam',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pfs_items_area_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .project_item, {{WRAPPER}} .project_items03, {{WRAPPER}} .portfolioCarItam',
                        ]
                );
                $this->add_responsive_control( 'pfs_items_area_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .project_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_items03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portfolioCarItam' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'pfs_items_margins', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .project_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_items03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portfolioCarItam' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('section_tab_itemthumb', [
                'label'         => esc_html__('Item Thumb Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'        => [
                    'terms'         => [
                        [
                                'name'      => 'view_style',
                                'operator'  => '==',
                                'value'     => 2,
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'pfs_items_thumb_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .project_thumb03',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'pfs_items_thumb_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .project_thumb03',
                    ]
                );
                $this->add_responsive_control( 'pfs_items_thumb_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .project_thumb03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'pfs_items_thumb_margins', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .project_thumb03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_cnarea', [
                'label'         => esc_html__('Content Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'bl_content_bg_color',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .projectInfoContent, {{WRAPPER}} .project_desc03, {{WRAPPER}} .portFolioInfo'
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'bl_content_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .projectInfoContent, {{WRAPPER}} .project_desc03, {{WRAPPER}} .portFolioInfo',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'bl_contentbox_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .projectInfoContent, {{WRAPPER}} .project_desc03, {{WRAPPER}} .portFolioInfo',
                        ]
                );
                $this->add_responsive_control( 'bl_contentbox_border_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .projectInfoContent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'pfs_content_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectInfoContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pfs_content_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectInfoContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_title', [
                'label'         => esc_html__('Title Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'title_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .projectInfoContent h3, {{WRAPPER}} .project_desc03 h3, {{WRAPPER}} .portFolioInfo h3',
                        ]
                );
                $this->add_responsive_control( 'title_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectInfoContent h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('title_color_bg',[
                                'label'     => esc_html__( 'background Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectInfoContent h3' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 h3' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'title_color_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .projectInfoContent h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'title_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectInfoContent h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'title_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectInfoContent h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('pf_details_icon',[
                        'label' => esc_html__( 'Icon Style', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);

                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'pf_icon_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .projectInfoContent i, {{WRAPPER}} .project_desc03 i, {{WRAPPER}} .portFolioInfo i, {{WRAPPER}} .strokeText',
                        ]
                );
                $this->add_responsive_control( 'pf_icon_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectInfoContent i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .projectInfoContent i' => '-webkit-text-stroke-color: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 i' => '-webkit-text-stroke-color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo i' => '-webkit-text-stroke-color: {{VALUE}}',
                                    '{{WRAPPER}} .strokeText' => '-webkit-text-stroke-color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pf_icon_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectInfoContent i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .strokeText' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );


        $this->end_controls_section();
        $this->start_controls_section( 'section_tab_subtitle', [
                'label'         => esc_html__('Meta Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'subtitle_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .ps_auth_name, {{WRAPPER}} .project_desc03 h4, {{WRAPPER}} .portFolioInfo h4',
                        ]
                );
                $this->add_responsive_control('subtitle_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ps_auth_name' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 h4' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('subtitle_color_bg',[
                                'label'     => esc_html__( 'background Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ps_auth_name' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .project_desc03 h4' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'subtitle_color_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ps_auth_name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'subtitle_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ps_auth_name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'subtitle_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ps_auth_name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .project_desc03 h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $view_style             = (isset($settings['view_style']) && $settings['view_style'] > 0 ? $settings['view_style'] : 1);
        
        $bzy_thumb_width        = (isset($settings['bzy_thumb_width']) && $settings['bzy_thumb_width'] > 0 ? $settings['bzy_thumb_width'] : '');
        $bzy_thumb_height       = (isset($settings['bzy_thumb_height']) && $settings['bzy_thumb_height'] > 0 ? $settings['bzy_thumb_height'] : '');
        $folio_item_length     = (isset($settings['folio_item_length']) && $settings['folio_item_length'] > 0 ? $settings['folio_item_length'] : 23);

        $pfs_folio              = (isset($settings['pfs_folio']) && !empty($settings['pfs_folio'])? $settings['pfs_folio'] : array());

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';

        $cursor_text_01         = (isset($settings['cursor_text_01']) && $settings['cursor_text_01'] != '') ? $settings['cursor_text_01'] : '';
        $cursor_text_02         = (isset($settings['cursor_text_02']) && $settings['cursor_text_02'] != '') ? $settings['cursor_text_02'] : '';
        $cursor_border_color    = (isset($settings['cursor_border_color']) && $settings['cursor_border_color'] != '') ? $settings['cursor_border_color'] : 'rgb(0, 0, 0)';
        $cursor_bg_color        = (isset($settings['cursor_bg_color']) && $settings['cursor_bg_color'] != '') ? $settings['cursor_bg_color'] : 'rgb(0, 0, 0)';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }


        if (($key = array_search(0, $pfs_folio)) !== false) {
            unset($pfs_folio[$key]);
        }
        
        $cat_args = array(
            'orderby'       => 'ID',
            'order'         => 'DESC', 
            'hide_empty'    => 1,
            'hierarchical'  => 1,
            'taxonomy'      => 'folio_cat'
        );
        $categories = get_categories( $cat_args );

        // global $wp_query;
        $fargs = array(
            'post_type'         => 'folio',
            'post_status'       => 'publish',
        );
        if(!empty($pfs_folio)){
            $fargs['post__in'] = $pfs_folio;
        }

        
        include dirname(__FILE__)."/style/folio-standalon/style".$view_style.".php";
    }
    
    protected function content_template() {
        
    }
}