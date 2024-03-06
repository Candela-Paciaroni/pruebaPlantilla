<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Services_Grid_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-services-grid';
    }
    public function get_title() {
        return esc_html__('Services Grid', 'themewar');
    }
    public function get_icon() {
        return 'eicon-slider-full-screen';
    }
    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label'         => esc_html__( 'Service Settings', 'themewar' ),
        ]);
                $this->add_control( 'view_style', [
                            'label'     => esc_html__( 'View Style', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Style 01', 'themewar' ),
                                    2       => esc_html__( 'Style 02', 'themewar' ),
                                    3       => esc_html__( 'Style 03', 'themewar' ),
                                    4       => esc_html__( 'Style 04', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'grid_xxl_col', [
                            'label'     => esc_html__( 'Select XXL Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 3,
                            'options'   => [
                                    2       => esc_html__( '2 Column', 'themewar' ),
                                    3       => esc_html__( '3 Column', 'themewar' ),
                                    4       => esc_html__( '4 Column', 'themewar' ),
                                    5       => esc_html__( '5 Column', 'themewar' ),
                                    6       => esc_html__( '6 Column', 'themewar' ),
                            ], 
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => '!in',
                                            'value'     => ['4'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'grid_xl_col', [
                            'label'     => esc_html__( 'Select XL Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 3,
                            'options'   => [
                                    2       => esc_html__( '2 Column', 'themewar' ),
                                    3       => esc_html__( '3 Column', 'themewar' ),
                                    4       => esc_html__( '4 Column', 'themewar' ),
                                    5       => esc_html__( '5 Column', 'themewar' ),
                                    6       => esc_html__( '6 Column', 'themewar' ),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => '!in',
                                            'value'     => ['4'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'grid_lg_col', [
                            'label'     => esc_html__( 'Select LG Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 3,
                            'options'   => [
                                    2       => esc_html__( '2 Column', 'themewar' ),
                                    3       => esc_html__( '3 Column', 'themewar' ),
                                    4       => esc_html__( '4 Column', 'themewar' ),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => '!in',
                                            'value'     => ['4'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'grid_md_col', [
                            'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 2,
                            'options'   => [
                                    2       => esc_html__( '2 Column', 'themewar' ),
                                    3       => esc_html__( '3 Column', 'themewar' ),
                                    4       => esc_html__( '4 Column', 'themewar' ),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => '!in',
                                            'value'     => ['4'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'grid_sm_col', [
                            'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( '1 Column', 'themewar' ),
                                    2       => esc_html__( '2 Column', 'themewar' ),
                                    3       => esc_html__( '3 Column', 'themewar' ),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => '!in',
                                            'value'     => ['4'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('serv_btn_lable',[
                            'label' => esc_html__( 'Button Lable', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'Learn More', 'themewar' ),
                            'placeholder' => esc_html__( 'Type your Button title here', 'themewar' ),
                    ]
                );
                $this->add_control( 'serv_specific', [
                            'label'         => esc_html__( 'Specific Services', 'themewar' ),
                            'type'          => Controls_Manager::SELECT2,
                            'label_block'   => TRUE,
                            'multiple'      => true,
                            'default'       => array('0'),
                            'options'       => logisfare_post_array('service', esc_html__('All Service', 'themewar')),
                    ]
                );
                $this->add_control( 'serv_post_item', [
                            'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                            'type'          => Controls_Manager::NUMBER,
                            'min'           => 1,
                            'max'           => 500,
                            'step'          => 1,
                            'default'       => 3,
                            'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                    ]
                );
                $this->add_control( 'serv_post_offset', [
                                'label'     => esc_html__( 'Item Offset', 'themewar' ),
                                'type'      => Controls_Manager::NUMBER,
                                'min'       => 0,
                                'max'       => 300,
                                'step'      => 0,
                                'default'   => 0,
                        ]
                );
                $this->add_control( 'serv_order_by', [
                            'label' => esc_html__( 'Order By', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                    'date'                  => esc_html__( 'Date', 'themewar' ),
                                    'title'                 => esc_html__( 'Title', 'themewar' ),
                                    'rand'                  => esc_html__( 'Random', 'themewar' )
                            ],
                    ]
                );
                $this->add_control( 'serv_order', [
                            'label' => esc_html__( 'Order', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                    'asc'        => esc_html__( 'Ascending', 'themewar' ),
                                    'desc'       => esc_html__( 'Descending', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control('serv_strlimit', [
                            'label'         => esc_html__( 'Excerpt Limit', 'themewar' ),
                            'type'          => Controls_Manager::NUMBER,
                            'min'           => 0,
                            'max'           => 10000,
                            'step'          => 1,
                            'default'       => 105,
                            'description'   => esc_html__( 'Setup your item description text limit. 115 for style 01 & 70 for style 03', 'themewar' ),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
                                            'operator'  => 'in',
                                            'value'     => ['1','3'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'is_pagination', [
                                'label'             => esc_html__( 'Is Pagination?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Show', 'themewar' ),
                                'label_off'         => esc_html__( 'Hide', 'themewar' ),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'separator'         => 'before',
                        ]
                );
                $this->add_control( 'pagination_alignment', [
                                'label'         => esc_html__( 'Pagination Alignment', 'themewar' ),
                                'type'          => Controls_Manager::SELECT,
                                'description'   => esc_html__('Select your pagination alignment.', 'themewar'),
                                'default'       => 'start',
                                'options'       => [
                                        'start'       => esc_html__( 'Left', 'themewar' ),
                                        'center'       => esc_html__( 'Center', 'themewar' ),
                                        'end'       => esc_html__( 'Right', 'themewar' ),
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_pagination',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'thumb_hover_effect', [
                            'label' => esc_html__('Thumbnail Hover Effect', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 0,
                            'options' => [
                                    0 => esc_html__('None', 'themewar'),
                                    1 => esc_html__('Flash', 'themewar'),
                                    2 => esc_html__('Shine', 'themewar'),
                                    3 => esc_html__('Circle', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'view_style',
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
                'label'             => esc_html__('Service Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .serviceGridWrapp',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceGridWrapp',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceGridWrapp',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serviceGridWrapp' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceGridWrapp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceGridWrapp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_1', [
                'label'         => esc_html__('Item Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'srv_box_bg',
                            'label' => esc_html__( 'Item Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .serviceItem02, {{WRAPPER}} .singleService , {{WRAPPER}} .faciltItem , {{WRAPPER}} .svItem01 ',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'srv_box_shadow',
                            'label' => esc_html__( 'Item Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceItem02, {{WRAPPER}} .singleService , {{WRAPPER}} .faciltItem , {{WRAPPER}} .svItem01 ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'srv_border',
                            'label' => esc_html__( 'Item Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceItem02, {{WRAPPER}} .singleService , {{WRAPPER}} .faciltItem, {{WRAPPER}} .svItem01 ',
                    ]
                );
                $this->add_responsive_control( 'srv_box_radius', [
                            'label' => esc_html__( 'Item Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceItem02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singleService ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .faciltItem' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .svItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'srv_box_margin', [
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceItem02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singleService ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .faciltItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .svItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'srv_box_padding', [
                            'label' => esc_html__( 'Item Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceItem02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .singleService ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .faciltItem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .svItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_22', [
                'label'         => esc_html__('Thumbnail Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'view_style',
                                'operator'  => 'in',
                                'value'     => ['2'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'srv_thumb_box_bg',
                            'label' => esc_html__( 'Thumb Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .serviceThumb',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'srv_thumb_box_shadow',
                            'label' => esc_html__( 'Thumb Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceThumb ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'srv_thumb_border',
                            'label' => esc_html__( 'Thumb Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .serviceThumb',
                    ]
                );
                $this->add_responsive_control( 'srv_box_thumb_radius', [
                            'label' => esc_html__( 'Thumb Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceThumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .serviceThumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'srv_box_thumb_margin', [
                            'label' => esc_html__( 'Thumb Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceThumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'srv_box_thumb_padding', [
                            'label' => esc_html__( 'Thumb Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .serviceThumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2i',[
                'label'         => esc_html__('Icon Or Image Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'icon_box_i_typography',
                        'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .serviceItem02 span i, {{WRAPPER}} .serConIcon span i, {{WRAPPER}} .faciltItem span i, {{WRAPPER}} .svIcon span i'
                ]);
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .serviceItem02 span i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .serviceItem02 span i::before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .serConIcon span i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .serConIcon span i::before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .faciltItem span i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .faciltItem span i::before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .svIcon span i::before' => 'color: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'ib_icon_bg',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .serviceItem02 span, {{WRAPPER}} .serConIcon span, {{WRAPPER}} .faciltItem span, {{WRAPPER}} .svIcon span',
                                    ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'ib_icon_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .serviceItem02 span, {{WRAPPER}} .serConIcon span, {{WRAPPER}} .faciltItem span, {{WRAPPER}} .svIcon span',
                                    ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ib_icon_bdr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .serviceItem02 span, {{WRAPPER}} .serConIcon span, {{WRAPPER}} .faciltItem span, {{WRAPPER}} .svIcon span',
                                    ]
                                );
                                $this->add_responsive_control( 'ib_icon_radius', [
                                            'label' => esc_html__( 'Radius', 'themewar' ),
                                            'type' => Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', '%', 'em' ],
                                            'selectors' => [
                                                '{{WRAPPER}} .serviceItem02 span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                '{{WRAPPER}} .serConIcon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                '{{WRAPPER}} .faciltItem span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                '{{WRAPPER}} .svIcon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                    ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Hover', 'themewar' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .serviceItem02:hover span i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .serviceItem02:hover span i::before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .singleService:hover .serConIcon i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .singleService:hover .serConIcon i:before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .faciltItem:hover span i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .faciltItem:hover span i::before' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .svIcon:hover span i::before' => 'color: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ib_icon_bdr_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .faciltItem:hover span',
                                            'conditions'    => [
                                                'terms'     => [
                                                    [
                                                            'name'      => 'view_style',
                                                            'operator'  => 'in',
                                                            'value'     => ['3'],
                                                    ]
                                                ],
                                            ],
                                    ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'ib_icon_bg_hr',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .serviceItem02:hover span, {{WRAPPER}} .singleService:hover .serConIcon span, {{WRAPPER}} .faciltItem:hover > span, {{WRAPPER}} .svIcon:hover > span',
                                    ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
              
                $this->add_control( 'srv_icon_image_width_height', [
                        'label' => esc_html__( 'Image Width Height', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                        $this->add_responsive_control( 'icon_box_img_width', [
                                    'label' => esc_html__( 'Image Width', 'themewar' ),
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
                                            '{{WRAPPER}} .serviceItem02 span > img' => 'width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .serConIcon span > img' => 'width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .faciltItem span > img' => 'width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .svIcon span > img' => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'icon_box_img_height', [
                                    'label' => esc_html__( 'Image Height', 'themewar' ),
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
                                            '{{WRAPPER}} .serviceItem02 span > img' => 'height: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .serConIcon span > img' => 'height: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .faciltItem span > img' => 'height: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .svIcon span > img' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                        );
                        $this->add_control( 'icon_box_i_margin', [
                                    'label' => esc_html__( 'Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                            '{{WRAPPER}} .serviceItem02 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .singleService span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .faciltItem > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .svIcon > span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ]
                            ]
                        );
                        $this->add_control( 'icon_box_i_padding', [
                                    'label' => esc_html__( 'Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .serviceItem02 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .singleService span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .faciltItem > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .svIcon > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ]
                            ]
                        );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3444',[
                'label'         => esc_html__('Title Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .serviceItem02 h3, {{WRAPPER}} .serviceContent h4, {{WRAPPER}} .faciltItem h3, {{WRAPPER}} .svIcon h3',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serviceItem02 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .serviceContent h4' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .faciltItem h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .svIcon h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_hover_title_color',[
                                'label'     => esc_html__( 'Linked Title Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serviceItem02 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .serviceContent h4 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .faciltItem h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .svIcon h3 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serviceItem02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .serviceContent h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .faciltItem h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .svIcon h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                        'label'         => esc_html__('Description Style', 'themewar'),
                        'tab'           => Controls_Manager::TAB_STYLE,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'view_style',
                                        'operator'  => 'in',
                                        'value'     => ['1','3'],
                                ]
                            ],
                        ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_content_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .serviceItem02 p, {{WRAPPER}} .faciltItem p',
                        ]
                );
                $this->add_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serviceItem02 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .faciltItem p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serviceItem02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .faciltItem p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                    'label'         => esc_html__('Button Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'view_style',
                                    'operator'  => 'in',
                                    'value'     => ['1','2','3','4'],
                            ]
                        ],
                    ],
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ser_btn_typo',
                            'label'     => esc_html__( 'BTN Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .btnLink',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'ser_btn_i_typo',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .btnLink i',
                    ]
                );
                $this->add_control( 'ser_btn_color',[
                            'label'     => esc_html__( 'BTN Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .btnLink' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_i_color',[
                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .btnLink i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_hr_color',[
                            'label'     => esc_html__( 'BNT Hover Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .btnLink:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_hr_i_color',[
                            'label'     => esc_html__( 'BTN Hover Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .btnLink:hover i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_i_mar', [
                            'label'      => esc_html__( 'Icon Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .btnLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_mar', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'ser_btn_pd', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $view_style         = (isset($settings['view_style']) && $settings['view_style'] !='') ? $settings['view_style'] : 1;
        
        $grid_xxl_col       = (isset($settings['grid_xxl_col']) && $settings['grid_xxl_col'] > 0) ? $settings['grid_xxl_col'] : 3;
        $grid_xl_col        = (isset($settings['grid_xl_col']) && $settings['grid_xl_col'] > 0) ? $settings['grid_xl_col'] : 3;
        $grid_lg_col        = (isset($settings['grid_lg_col']) && $settings['grid_lg_col'] > 0) ? $settings['grid_lg_col'] : 3;
        $grid_md_col        = (isset($settings['grid_md_col']) && $settings['grid_md_col'] > 0) ? $settings['grid_md_col'] : 2;
        $grid_sm_col        = (isset($settings['grid_sm_col']) && $settings['grid_sm_col'] > 0) ? $settings['grid_sm_col'] : 2;

        $serv_btn_lable     = (isset($settings['serv_btn_lable']) && ($settings['serv_btn_lable']) !='' ? $settings['serv_btn_lable'] : '');
        $serv_specific      = (isset($settings['serv_specific']) && !empty($settings['serv_specific'])? $settings['serv_specific'] : array());
        
        $serv_post_item     = (isset($settings['serv_post_item']) && $settings['serv_post_item'] > 0 ) ? $settings['serv_post_item'] : 6;
        $serv_post_offset   = (isset($settings['serv_post_offset']) && $settings['serv_post_offset'] > 0 ) ? $settings['serv_post_offset'] : 0;
        $serv_order_by      = (isset($settings['serv_order_by']) && $settings['serv_order_by'] != '' ) ? $settings['serv_order_by'] : 'date';
        $serv_order         = (isset($settings['serv_order']) && $settings['serv_order'] != '' ) ? $settings['serv_order'] : 'desc';

        $serv_strlimit      = (isset($settings['serv_strlimit']) && $settings['serv_strlimit'] > 0 ) ? $settings['serv_strlimit'] : 97;
        $is_pagination          = (isset($settings['is_pagination']) && !empty($settings['is_pagination'])? $settings['is_pagination'] : 'no');
        $pagination_alignment   = (isset($settings['pagination_alignment']) && !empty($settings['pagination_alignment'])? $settings['pagination_alignment'] : 'left');
        $thumb_hover_effect = (isset($settings['thumb_hover_effect']) && $settings['thumb_hover_effect'] > 0 ? $settings['thumb_hover_effect'] : 0);

        $class              = ($thumb_hover_effect > 0 ? ($thumb_hover_effect == 1 ? 'logisFlash' : ($thumb_hover_effect == 2 ? 'logisShine' : 'logisCircle')) : '');

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



        
        include dirname(__FILE__)."/style/services/style".$view_style.".php";
    }
    
    protected function content_template() {
        
    }
}