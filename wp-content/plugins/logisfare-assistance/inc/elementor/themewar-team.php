<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Team_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-team';
    }

    public function get_title() {
        return esc_html__( 'Team', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-person';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' =>esc_html__( 'Team Member', 'themewar' ),
        ]);
                $this->add_control( 'mem_view_mode', [
                                'label'     => esc_html__( 'View Style', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Grid', 'themewar' ),
                                        2       => esc_html__( 'Slider', 'themewar' ),
                                ],
                        ]
                ); 
                $this->add_control( 'mem_view_style', [
                                'label'     => esc_html__( 'Select Style', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Style 01', 'themewar' ),
                                        2       => esc_html__( 'Style 02', 'themewar' ),
                                        3       => esc_html__( 'Style 03', 'themewar' ),
                                ],
                        ]
                );
                
                $this->add_control( 'lb_post_item', [
                                'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 200,
                                'step'          => 1,
                                'default'       => 3,
                                'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                                'separator' => 'before',
                        ]
                );
                $this->add_control( 'lb_order_by', [
                                'label' => esc_html__( 'Order By', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                        'date'                  => esc_html__( 'Date', 'themewar' ),
                                        'title'                 => esc_html__( 'Title', 'themewar' ),
                                        'rand'                  => esc_html__( 'Random', 'themewar' ),
                                        'comment_count'         => esc_html__( 'Comment', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_order', [
                                'label' => esc_html__( 'Order', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'        => esc_html__( 'Ascending', 'themewar' ),
                                        'desc'       => esc_html__( 'Descending', 'themewar' ),
                                ],
                                'separator' => 'after',
                        ]
                );
                $this->add_control( 'lb_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => 'in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => 'in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => 'in',
                                                'value'     => ['2']
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_xxl_col', [
                                'label'     => esc_html__( 'Select XXL Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' ),
                                        '5'       => esc_html__( '5 Column', 'themewar' ),
                                        '6'       => esc_html__( '6 Column', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' ),
                                        '5'       => esc_html__( '5 Column', 'themewar' ),
                                        '6'       => esc_html__( '6 Column', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_lg_col', [
                                'label'     => esc_html__( 'Select LG Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' )
                                ],
                        ]
                );
                $this->add_control( 'lb_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' )
                                ],
                        ]
                );
                $this->add_control( 'lb_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '1',
                                'options'   => [
                                        '1'       => esc_html__( '1 Column', 'themewar' ),
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' )
                                ],
                        ]
                );
                $this->add_control( 'items_gapping', [
                                'label' => esc_html__( 'Items Gapping', 'themewar' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 60,
                                'step' => 1,
                                'default' => 24,
                                'description'       => esc_html__('Insert items gapping if you want.', 'themewar'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'mem_view_mode',
                                                'operator'  => 'in',
                                                'value'     => ['2'],
                                        ]
                                    ],
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
                                'label' => esc_html__( 'Animation Start Duration(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_duration_inc',[
                                'label' => esc_html__( 'Animation Duration Increment', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_delay',[
                                'label' => esc_html__( 'Animation Start Delay(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_delay_inc',[
                                'label' => esc_html__( 'Animation Delay Increment', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
                                'default' => 20,
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
                'label'             => esc_html__('Team Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .teamGridWraper, {{WRAPPER}} .teamCarousel',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamGridWraper, {{WRAPPER}} .teamCarousel',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamGridWraper, {{WRAPPER}} .teamCarousel',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .teamGridWraper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamCarousel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamGridWraper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamCarousel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamGridWraper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamCarousel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_3', [
                'label'             => esc_html__('Team Items', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tm_item_area_inner_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .singleTeam, {{WRAPPER}} .teamItem02, {{WRAPPER}} .teamItem03',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'tm_item_area__shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singleTeam , {{WRAPPER}} .teamItem02, {{WRAPPER}} .teamItem03',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'tm_item_area__bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singleTeam , {{WRAPPER}} .teamItem02, {{WRAPPER}} .teamItem03',
                    ]
                );
                $this->add_responsive_control( 'tm_item_area__radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .singleTeam' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_item_area_mar', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleTeam' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_item_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleTeam' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section( 'section_tab_4', [
                'label'             => esc_html__('Team Member Thumbnail', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tm_mem_img_thumb_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .teamMeta, {{WRAPPER}} .teamItem02 > img, {{WRAPPER}} .teamItem03 > img',
                    ]
                );
                
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'team_thumb_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamMeta , {{WRAPPER}} .teamItem02 > img, {{WRAPPER}} .teamItem03 > img',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'tm_img_thumg_Border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamMeta > img, {{WRAPPER}} .teamMeta > img, {{WRAPPER}} .teamItem03 > img',
                    ]
                );
                $this->add_responsive_control( 'tm_mem_img_thumb_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .teamMeta > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02 > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03 > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mem_img_thumb_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamMeta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem02 > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem03 > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mem_img_thumb_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamMeta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem02 > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .teamItem03 > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_5', [
                'label' =>esc_html__('Team Member Content', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_control( 'tm_name', [
                            'label' => esc_html__( 'Member Name', 'themewar' ),
                            'type'  => Controls_Manager::HEADING,
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'tm_mb_name_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .teamContent h4, {{WRAPPER}} .teamItem02 h3, {{WRAPPER}} .teamItem03 h3',
                    ]
                );
                $this->add_responsive_control('tm_mb_name_color',[
                            'label'     => esc_html__( 'Name Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .teamContent h4' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem02 h3' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem03 h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('tm_mb_name_color_hr',[
                            'label'     => esc_html__( 'Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .singleTeam:hover .teamContent h4 a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem02 h3 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem03 h3 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_name_mr', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_name_pd', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'tm_mb_design', [
                            'label' => esc_html__( 'Designation', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'tm_mb_design_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .teamContent p, {{WRAPPER}} .teamItem02 p, {{WRAPPER}} .teamItem03 p',
                    ]
                );
                $this->add_responsive_control('tm_mb_design_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .teamContent p' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem02 p' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .teamItem03 p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_design_mr', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_design_pd', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem02 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamItem03 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'tm_mb_design_hd', [
                            'label' => esc_html__( 'Content Area Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tm_mem_img_content_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .teamContent, {{WRAPPER}} .teamContent03',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mem_img_content_bg_hr', [
                            'label'     => esc_html__( 'Hover BG color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .singleTeam:hover .teamContent' => 'background: {{VALUE}}',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1'],
                                    ],
                                ],
                            ],
                    ]
                );
                
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'team_content_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamContent, {{WRAPPER}} .teamContent03',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'tm_content_thumg_Border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamContent, {{WRAPPER}} .teamContent03',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mem_content_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .teamContent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamContent03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_design_area_mr', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamContent03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'tm_mb_design_area_pd', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamContent03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'mem_view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ],
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_6', [
                'label' =>esc_html__( 'Social Style', 'themewar' ),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'mem_view_style',
                                'operator'  => '!=',
                                'value'     => '2',
                        ],
                    ],
                ],
        ]);
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'ot_soc_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .teamSocial a',
                        ]
                );
                $this->add_responsive_control('ot_soc_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .teamSocial a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('ot_soc_color_hov',[
                            'label'     => esc_html__( 'Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .teamSocial a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ot_soc_item_margin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'tm_social_area_style', [
                            'label' => esc_html__( 'Social Area Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tm_social_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .teamSocial, {{WRAPPER}} .teamSocial03',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'tm_social_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamSocial, {{WRAPPER}} .teamSocial03',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'tm_social_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .teamSocial, {{WRAPPER}} .teamSocial03',
                    ]
                );
                $this->add_responsive_control( 'tm_social_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .teamSocial' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamSocial03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ot_soc_area_margin', [
                            'label'      => esc_html__( 'Area Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamSocial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamSocial03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ot_soc_area_padding', [
                            'label'      => esc_html__( 'Area Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamSocial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .teamSocial03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'lb_slide_dots',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                        [
                                'name'      => 'mem_view_mode',
                                'operator'  => '==',
                                'value'     => '2',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button span, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button i, {{WRAPPER}}'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next:hover,',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next:hover,',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .teamCarousel.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'lb_slide_dots',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ], 
                        [
                                'name'      => '$mem_view_mode',
                                'operator'  => '==',
                                'value'     => '2',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_nr_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_ps', [
                                        'label' => esc_html__( 'Dots Inner Position', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'allowed_dimensions' => ['top', 'left'],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot:hover span',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_ac_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active span',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .teamCarousel.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        
        $mem_view_mode      = (isset($settings['mem_view_mode']) && $settings['mem_view_mode'] > 0 ? $settings['mem_view_mode'] : 1);
        $mem_view_style     = (isset($settings['mem_view_style']) && $settings['mem_view_style'] > 0 ? $settings['mem_view_style'] : 1);

        $lb_post_item       = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by        = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order           = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        
        $lb_xxl_col           = (isset($settings['lb_xxl_col']) && $settings['lb_xxl_col'] > 0) ? $settings['lb_xxl_col'] : 3;
        $lb_xl_col            = (isset($settings['lb_xl_col']) && $settings['lb_xl_col'] > 0) ? $settings['lb_xl_col'] : 3;
        $lb_lg_col            = (isset($settings['lb_lg_col']) && $settings['lb_lg_col'] > 0) ? $settings['lb_lg_col'] : 3;
        $lb_md_col            = (isset($settings['lb_md_col']) && $settings['lb_md_col'] > 0) ? $settings['lb_md_col'] : 2;
        $lb_sm_col            = (isset($settings['lb_sm_col']) && $settings['lb_sm_col'] > 0) ? $settings['lb_sm_col'] : 1;
        
        $autoplay             = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'no';
        $loop                 = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'no';
        $nav                  = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots                 = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';

        $gapping              = (isset($settings['items_gapping']) && $settings['items_gapping'] != '' ? $settings['items_gapping'] : 24);

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_duration_inc = (isset($settings['animation_duration_inc']) && $settings['animation_duration_inc'] != '') ? $settings['animation_duration_inc'] : 0;
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        $animation_delay_inc    = (isset($settings['animation_delay_inc']) && $settings['animation_delay_inc'] != '') ? $settings['animation_delay_inc'] : 0; 
        
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }

        
        include dirname(__FILE__).'/style/team/style'.$mem_view_mode.'.php';
    }
    
    protected function content_template() {}
}