<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Latest_Blog_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-latest-blog';
    }
    
    public function get_title() {
        return esc_html__( 'Latest Blog Post', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Blog Post', 'themewar' ),
        ]);
                $this->add_control( 'lb_view_style', [
                                'label' => esc_html__( 'View Style', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 1,
                                'options' => [
                                        1                 => esc_html__( 'Grid View', 'themewar' ),
                                        2                 => esc_html__( 'Slider View', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_select_pst_style', [
                            'label' => esc_html__( 'Select Style', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                    1                 => esc_html__( 'Style 01', 'themewar' ),
                                    2                 => esc_html__( 'Style 02', 'themewar' ),
                                    3                 => esc_html__( 'Style 03', 'themewar' ),
                            ],
                    ]
                );
                
                $this->add_control( 'lb_slide_autoplay', [
                            'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'yes',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ],
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
                            'default'           => 'yes',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ],
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
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ],
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
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'lb_items_gapping', [
                            'label' => esc_html__( 'Items Gapping', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                            'default' => 24,
                            'description'       => esc_html__('Insert items gapping if you want.', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'lb_view_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ],
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
                $this->add_control( 'rm_label', [
                                'label'         => esc_html__( 'Read More Label', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Learn More', 'themewar'),
                                'label_block'   => TRUE,
                                'placeholder'   => esc_html__('Read More....', 'themewar'),
                        ]
                );
                $this->add_control( 'lb_post_thumb_width', [
                                'label'         => esc_html__( 'Post Thumb Width', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom width for post thumbnail.', 'themewar' ),
                        ]
                );
                $this->add_control( 'lb_post_thumb_height', [
                                'label'         => esc_html__( 'Post Thumb Height', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom height for post thumbnail.', 'themewar' ),
                        ]
                );
                $this->add_control('lb_category', [
                                'label' => esc_html__('Blog Category', 'themewar'),
                                'type' => 'themewar_autocomplete',
                                'description' => esc_html__('Select blog category.', 'themewar'),
                                'action' => 'themewar_get_taxonomy',
                                'taxonomy' => 'category',
                                'multiple' => true,
                        ]
                );
                $this->add_control('lb_tag', [
                                'label' => esc_html__('Blog Tag', 'themewar'),
                                'type' => 'themewar_autocomplete',
                                'description' => esc_html__('Select blog tags.', 'themewar'),
                                'action' => 'themewar_get_taxonomy',
                                'taxonomy' => 'post_tag',
                                'multiple' => true,
                        ]
                );
                $this->add_control( 'lb_specific', [
                                'label'         => esc_html__( 'Specific Post', 'themewar' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => array('0'),
                                'options'       => logisfare_post_array('post', esc_html__('All Post', 'themewar')),
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
                        ]
                );
                $this->add_control('lb_title_strlimit', [
                                'label'         => esc_html__( 'Title Excerpt Limit', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 0,
                                'max'           => 1000,
                                'step'          => 1,
                                'default'       => 62,
                                'description'   => esc_html__( 'Setup your Blog Title text limit', 'themewar' ),
                        ]
                );
                $this->add_control('lb_strlimit', [
                                'label'         => esc_html__( 'Desc Excerpt Limit', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 0,
                                'max'           => 1000,
                                'step'          => 1,
                                'default'       => 87,
                                'description'   => esc_html__( 'Setup your Blog description text limit', 'themewar' ),
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
                'label'             => esc_html__('Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .blogSliderWrapper, {{WRAPPER}} .blogGridWrapper',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .blogSliderWrapper, {{WRAPPER}} .blogGridWrapper',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .blogSliderWrapper, {{WRAPPER}} .blogGridWrapper',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .blogSliderWrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .blogGridWrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .blogSliderWrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogGridWrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .blogSliderWrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogGridWrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_3', [
                'label'         => esc_html__( 'Item Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_item_bg',
                                'label' => esc_html__( 'Item Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .blogItem01, {{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_item_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .blogItem01, {{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_item_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .blogItem01, {{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03,',
                        ]
                );
                $this->add_responsive_control( 'lb_item_readius', [
                                'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_margin', [
                                'label'      => esc_html__( 'Item Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_padding', [
                                'label'      => esc_html__( 'Item Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('Thumbnail Image', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lp_thumb_bg',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .biThumb01 img, {{WRAPPER}} .biThumb02 img, {{WRAPPER}} .biThumb03 img',
                    ]
                );

                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lp_thumb_bd',
                            'label' => esc_html__( 'Images Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biThumb01 img, {{WRAPPER}} .biThumb02 img, {{WRAPPER}} .biThumb03 img',
                    ]
                );
                $this->add_responsive_control('lp_thumb_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .biThumb01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb03 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lp_thumb_shadow',
                            'label' => esc_html__( 'Image Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biThumb01 img, {{WRAPPER}} .biThumb02 img, {{WRAPPER}} .biThumb03 img',
                    ]
                );
                $this->add_responsive_control('lp_thumb_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .biThumb01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb03 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('lp_thumb_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .biThumb01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biThumb03 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section( 'section_tab_6', [
                'label'         => esc_html__( 'Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_btitle_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .biContent h3, {{WRAPPER}} .bpContent02 h3, {{WRAPPER}} .biContent03 h3',
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .biContent h3' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .bpContent02 h3' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .biContent03 h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color_hover',[
                            'label'     => esc_html__( 'Hover Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .biContent h3 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .bpContent02 h3 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .biContent03 h3 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_margin', [
                            'label'      => esc_html__( 'Title Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .bpContent02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biContent03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_padding', [
                            'label'      => esc_html__( 'Title Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .bpContent02 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biContent03 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_7', [
                'label'         => esc_html__( 'Description Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_select_pst_style',
                                'operator'  => '==',
                                'value'     => '3',
                        ],
                    ],
                ],
        ]);
                $this->add_control( 'lb_cont_desc', [
                        'label' => esc_html__( 'Blog Description', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_cont_desc_typo',
                            'label'     => esc_html__( 'Desc Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .biContent03 p',
                    ]
                );
                $this->add_responsive_control( 'lb_cont_desc_color',[
                            'label'     => esc_html__( 'Desc Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .biContent03 p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_desc_mr', [
                            'label'      => esc_html__( 'Desc Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent03 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
                
        $this->start_controls_section( 'section_tab_8', [
                'label'         => esc_html__( 'Button Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'lb_cont_heading_03', [
                        'label' => esc_html__( 'Read More Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_rmb_typo',
                                'label'     => esc_html__( 'BNT Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logicBtn, {{WRAPPER}} .btnLink, {{WRAPPER}} .biBlog03',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_rmb_icon_typo',
                                'label'     => esc_html__( 'Icon Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logicBtn i, {{WRAPPER}} .btnLink i, {{WRAPPER}} .biBlog03 i',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'lb_select_pst_style',
                                                'operator'  => 'in',
                                                'value'     => ['2','3'],
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->start_controls_tabs( 'bl_readmore_tabs1',[]);
                        $this->start_controls_tab('bl_readmore_tab_nr',[
                                        'label' => esc_html__( 'Normal', 'themewar' ),
                                    ]
                                );
                                $this->add_responsive_control( 'lb_rmb_color',[
                                                'label'     => esc_html__( 'Read More Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03' => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'lb_rmb_color_i',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03 i' => 'color: {{VALUE}}',
                                                ],
                                                'conditions'    => [
                                                    'terms'     => [
                                                        [
                                                                'name'      => 'lb_select_pst_style',
                                                                'operator'  => 'in',
                                                                'value'     => ['2','3'],
                                                        ],
                                                    ],
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'bl_rmb_color_bg_nr',[
                                                'label'     => esc_html__( 'Background Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03 span:first-child' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('bl_readmore_tab_hr',[
                                        'label' => esc_html__( 'Hover', 'themewar' ),
                                    ]
                                );
                                $this->add_responsive_control( 'lb_rmb_color_hov',[
                                                'label'     => esc_html__( 'Read More Hover Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn:hover' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink:hover' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03:hover' => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                
                                $this->add_responsive_control( 'lb_rmb_color_i_hov',[
                                                'label'     => esc_html__( 'Read More Hover Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03:hover i' => 'color: {{VALUE}}',
                                                ],
                                                'conditions'    => [
                                                    'terms'     => [
                                                        [
                                                                'name'      => 'lb_select_pst_style',
                                                                'operator'  => 'in',
                                                                'value'     => ['2','3'],
                                                        ],
                                                    ],
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'bl_rmb_color_bg_hov',[
                                                'label'     => esc_html__( 'Hover Bg Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                    '{{WRAPPER}} .logicBtn:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .btnLink:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .biBlog03:hover span:first-child' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'lb_rmb_i_position', [
                            'label'      => esc_html__( 'Icon Positon', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'right'],
                            'selectors'  => [
                                '{{WRAPPER}} .logicBtn i' => 'top: {{top}}{{UNIT}}; right: {{right}}{{UNIT}};',
                                '{{WRAPPER}} .btnLink i' => 'top: {{top}}{{UNIT}}; right: {{right}}{{UNIT}};',
                                '{{WRAPPER}} .biBlog03 i' => 'top: {{top}}{{UNIT}}; right: {{right}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'lb_select_pst_style',
                                            'operator'  => 'in',
                                            'value'     => ['2','3'],
                                    ],
                                ],
                            ],
                    ]
                );  
                $this->add_responsive_control( 'lb_rmb_i_margin', [
                            'label'      => esc_html__( 'Read More Icon Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['left'],
                            'selectors'  => [
                                '{{WRAPPER}} .logicBtn i' => 'margin-left: {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .btnLink i' => 'margin-left: {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biBlog03 i' => 'margin-left: {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'lb_select_pst_style',
                                            'operator'  => 'in',
                                            'value'     => ['2','3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control('btn_hr',[ 'type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_cont_btn_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biBlog03 span:first-child, {{WRAPPER}} .logicBtn, {{WRAPPER}} .btnLink',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_cont_btn_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biBlog03 span:first-child, {{WRAPPER}} .logicBtn, {{WRAPPER}} .btnLink',
                    ]
                );
                $this->add_responsive_control( 'lb_cont_btn_radius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biBlog03 span:first-child ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicBtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .btnLink' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_btn_mr', [
                            'label'      => esc_html__( 'BTN Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logicBtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biBlog03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_btn_px', [
                            'label'      => esc_html__( 'BTN Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logicBtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biBlog03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_12', [
                'label'         => esc_html__( 'Blog Meta Button', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_select_pst_style',
                                'operator'  => 'in',
                                'value'     => ['2'],
                        ],
                    ],
                ],
        ]);
                $this->add_control( 'lb_meta_btn_heading', [
                        'label' => esc_html__( 'Blog Meta Button', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_btn_typo',
                            'label'     => esc_html__( 'Meta Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .bpDate h4',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_btn_icon_typo',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .bpDate span i',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_btn_text_color',[
                                'label'     => esc_html__( 'Text Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .bpDate h4' => 'color: {{VALUE}}',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'lb_meta_btn_i_color',[
                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .bpDate span i' => 'color: {{VALUE}}',
                                ],
                        ]
                );

                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_met_btn_i_bg',
                            'label' => esc_html__( 'Icon Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .bpDate span',
                    ]
                );
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_met_btn_bg',
                            'label' => esc_html__( 'BTN Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .bpDate',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_met_btn_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .bpDate',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_met_btn_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .bpDate',
                    ]
                );
                $this->add_responsive_control( 'lb_met_btn_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .bpDate ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_btn_margin', [
                            'label'      => esc_html__( 'BTN Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .bpDate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_met_btn_padding', [
                            'label'      => esc_html__( 'BTN Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .bpDate ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_9', [
                'label'         => esc_html__( 'Blog Meta Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_select_pst_style',
                                'operator'  => 'in',
                                'value'     => ['1','3'],
                        ],
                    ],
                ],
        ]);
                $this->add_control( 'lb_meta_gl_heading', [
                        'label' => esc_html__( 'Blog Meta', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_gl_typo',
                            'label'     => esc_html__( 'Meta Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .biMeta01 a, {{WRAPPER}} .biMeta03 span',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_gl_i_typo',
                            'label'     => esc_html__( 'Meta Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .biMeta01 i, {{WRAPPER}} .biMeta03 span i',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_gl_color',[
                                'label'     => esc_html__( 'Text Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .biMeta01 a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .biMeta03 span' => 'color: {{VALUE}}',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'lb_meta_gl_i_color',[
                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .biMeta01 i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .biMeta03 span i' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_gl_color_hov',[
                                'label'     => esc_html__( 'Text Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .biMeta01 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .biMeta03 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_gl_item_icon_margin', [
                                'label'      => esc_html__( 'Meta Icon Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .biMeta01 span i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .biMeta01 a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .biMeta03 span i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .biMeta03 a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_gl_item_margin', [
                                'label'      => esc_html__( 'Meta Item Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .biMeta01 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .biMeta03 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_gl_item_padding', [
                                'label'      => esc_html__( 'Meta Item Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .biMeta01 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .biMeta03 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'lb_cats_heading', [
                        'label' => esc_html__( 'Blog Cats', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_typo',
                            'label'     => esc_html__( 'Cats Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .blogCcat a',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_color',[
                                'label'     => esc_html__( 'Text Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogCcat a' => 'color: {{VALUE}}',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'lb_meta_color_hov',[
                                'label'     => esc_html__( 'Text Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogCcat a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_item_margin', [
                                'label'      => esc_html__( 'Meta Item Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCcat a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_item_padding', [
                                'label'      => esc_html__( 'Meta Item Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCcat a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'lb_author_heading', [
                        'label' => esc_html__( 'By Author', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_author_typo',
                            'label'     => esc_html__( 'Author Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .biMetaCat03',
                    ]
                );
                $this->add_responsive_control( 'lb_author_color',[
                            'label'     => esc_html__( 'Author Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .biMetaCat03' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_author_color_hr',[
                            'label'     => esc_html__( 'Author Link Hover', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .biMetaCat03 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_author_mr', [
                            'label'      => esc_html__( 'Author Maring', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMetaCat03' =>  'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_10', [
                'label'         => esc_html__( 'Blog Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_cont_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .biContent, {{WRAPPER}} .bpContent02, {{WRAPPER}} .biContent03',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_cont_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biContent, {{WRAPPER}} .bpContent02, {{WRAPPER}} .biContent03',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_cont_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biContent, {{WRAPPER}} .bpContent02, {{WRAPPER}} .biContent03',
                    ]
                );
                $this->add_responsive_control( 'lb_cont_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .bpContent02 ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biContent03 ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_margin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .bpContent02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biContent03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_padding', [
                            'label'      => esc_html__( 'Item Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biContent ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .bpContent02 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .biContent03 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_14', [
                'label'         => esc_html__( 'Blog Meta Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_select_pst_style',
                                'operator'  => '==',
                                'value'     => '3',
                        ],
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_meta_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .biMeta03',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_meta_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biMeta03',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_meta_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biMeta03',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_area_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta03 ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_areamargin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_padding', [
                            'label'      => esc_html__( 'Item Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta03 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_11', [
                'label'         => esc_html__( 'Blog Author Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'lb_select_pst_style',
                                'operator'  => '==',
                                'value'     => '1',
                        ],
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_aut_ft_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .biMeta02.authorAra',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_aut_ft_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biMeta02.authorAra',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_aut_ft_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .biMeta02.authorAra',
                    ]
                );
                $this->add_responsive_control( 'lb_aut_ft_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta02.authorAra ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_aut_ft_margin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta02.authorAra' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_aut_ft_padding', [
                            'label'      => esc_html__( 'Item Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .biMeta02.authorAra ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                
                $this->add_control( 'lb_aut_ft_heading', [
                        'label' => esc_html__( 'Author Nick Name', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_aut_ft_nik_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .authorAra .biAuthor h4',
                        ]
                    );
                    $this->add_responsive_control( 'lb_aut_ft_nik_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .authorAra .biAuthor h4' => 'color: {{VALUE}}',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'lb_aut_ft_nik_mr', [
                                'label'      => esc_html__( 'Author Maring', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .authorAra .biAuthor h4' =>  'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );
                $this->add_control( 'lb_aut_ft_heading2', [
                        'label' => esc_html__( 'Author Role', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_aut_ft_rol_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .authorAra .biAuthor span',
                        ]
                    );
                    $this->add_responsive_control( 'lb_aut_ft_rol_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .authorAra .biAuthor span' => 'color: {{VALUE}}',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'lb_aut_ft_rol_mr', [
                                'label'      => esc_html__( 'Author Maring', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .authorAra .biAuthor span' =>  'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );
                $this->add_control( 'lb_aut_ft_heading3', [
                        'label' => esc_html__( 'Author Image', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                        $this->add_group_control(Group_Control_Background::get_type(),[
                                    'name' => 'lb_aut_ft_img_bg',
                                    'label' => esc_html__( 'Area Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .authorAra .biAuthor img',
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'lb_aut_ft_img__border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .authorAra .biAuthor img',
                            ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'lb_aut_ft_img_shadow',
                                    'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .authorAra .biAuthor img',
                            ]
                        );
                        $this->add_responsive_control( 'lb_aut_ft_img_readius', [
                                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                    'type'       => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .authorAra .biAuthor img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                    $this->add_responsive_control( 'lb_aut_ft_img_mr', [
                                'label'      => esc_html__( 'Author Maring', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .authorAra .biAuthor img' =>  'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'lb_aut_ft_img_px', [
                                'label'      => esc_html__( 'Author Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .authorAra .biAuthor img' =>  'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );

        $this->end_controls_section();

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $lb_view_style      = (isset($settings['lb_view_style']) && $settings['lb_view_style'] > 0) ? $settings['lb_view_style'] : 1;
        $lb_select_pst_style= (isset($settings['lb_select_pst_style']) && $settings['lb_select_pst_style'] > 0) ? $settings['lb_select_pst_style'] : 1;
        $thumb_hover_effect = (isset($settings['thumb_hover_effect']) && $settings['thumb_hover_effect'] > 0 ? $settings['thumb_hover_effect'] : 0);

        $class              = ($thumb_hover_effect > 0 ? ($thumb_hover_effect == 1 ? 'logisFlash' : ($thumb_hover_effect == 2 ? 'logisShine' : 'logisCircle')) : '');

        $lb_specific        = (isset($settings['lb_specific']) && !empty($settings['lb_specific'])? $settings['lb_specific'] : array());
        $lb_category        = (isset($settings['lb_category']) && !empty($settings['lb_category'])? $settings['lb_category'] : array());
        $lb_tag             = (isset($settings['lb_tag']) && !empty($settings['lb_tag'])? $settings['lb_tag'] : array());
        
        $lb_post_item       = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by        = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order           = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        $lb_title_strlimit  = (isset($settings['lb_title_strlimit']) && $settings['lb_title_strlimit'] > 0 ) ? $settings['lb_title_strlimit'] : 62;
        $lb_strlimit        = (isset($settings['lb_strlimit']) && $settings['lb_strlimit'] > 0 ) ? $settings['lb_strlimit'] : 87;
        
        $autoplay           = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'yes';
        $loop               = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'yes';
        $nav                = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots               = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';

        $rm_label           = (isset($settings['rm_label']) && $settings['rm_label'] != '') ? $settings['rm_label'] : esc_html__('Learn More', 'themewar');
        
        $lb_post_thumb_width    = (isset($settings['lb_post_thumb_width']) && $settings['lb_post_thumb_width'] > 0) ? $settings['lb_post_thumb_width'] : '';
        $lb_post_thumb_height   = (isset($settings['lb_post_thumb_height']) && $settings['lb_post_thumb_height'] > 0) ? $settings['lb_post_thumb_height'] : '';
        
        $lb_xxl_col         = (isset($settings['lb_xxl_col']) && $settings['lb_xxl_col'] > 0) ? $settings['lb_xxl_col'] : 3;
        $lb_xl_col          = (isset($settings['lb_xl_col']) && $settings['lb_xl_col'] > 0) ? $settings['lb_xl_col'] : 3;
        $lb_lg_col          = (isset($settings['lb_lg_col']) && $settings['lb_lg_col'] > 0) ? $settings['lb_lg_col'] : 3;
        $lb_md_col          = (isset($settings['lb_md_col']) && $settings['lb_md_col'] > 0) ? $settings['lb_md_col'] : 2;
        $lb_sm_col          = (isset($settings['lb_sm_col']) && $settings['lb_sm_col'] > 0) ? $settings['lb_sm_col'] : 1;
        
        $gapping            = (isset($settings['lb_items_gapping']) && $settings['lb_items_gapping'] != '' ? $settings['lb_items_gapping'] : 24);

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
        
        

        include dirname(__FILE__).'/style/post/style'.$lb_view_style.'.php';
    }
    
    protected function content_template() {
        
    }
}