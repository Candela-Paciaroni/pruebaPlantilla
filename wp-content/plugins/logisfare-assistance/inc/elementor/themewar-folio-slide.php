<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Themewar_Folio_Slide_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-folio-slide';
    }

    public function get_title() {
        return esc_html__( 'Folio Slider', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__('Folio Slider', 'themewar')
                ]
        );
                $this->add_control( 'pfs_view', [
                                'label'     => esc_html__( 'Slider View Style', 'themewar' ),
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
                $this->add_control( 'pfs_folio_category', [
                                'label' => esc_html__('Folio Category', 'themewar'),
                                'type' => 'themewar_autocomplete',
                                'description' => esc_html__('Select portfolio category.', 'themewar'),
                                'action' => 'themewar_get_taxonomy',
                                'taxonomy' => 'folio_cat',
                                'multiple' => true,
                        ]
                );
                $this->add_control('pfs_folio', [
                                'label'         => esc_html__( 'Specific Portfolio', 'themewar' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => 0,
                                'options'       => logisfare_post_array('folio', esc_html__('All Portfolio', 'themewar')),
                        ]
                );
                $this->add_control( 'pfs_post_item', [
                                'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 3,
                                'max'           => 200,
                                'step'          => 1,
                                'default'       => 6,
                                'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                        ]
                );
                $this->add_control( 'pfs_post_offset', [
                                'label'         => esc_html__( 'Item Offset', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 200,
                                'step'          => 1,
                                'default'       => 0,
                                'description'   => esc_html__( 'How many numbers of posts to displace or pass over?', 'themewar' ),
                        ]
                );
                $this->add_control( 'pfs_order_by', [
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
                $this->add_control( 'pfs_order', [
                                'label' => esc_html__( 'Order', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'        => esc_html__( 'Ascending', 'themewar' ),
                                        'desc'       => esc_html__( 'Descending', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'pfs_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'pfs_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'pfs_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                        ]
                );
                $this->add_control( 'pfs_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no'
                        ]
                );
                $this->add_control( 'item_per_row_01', [
                            'label' => esc_html__('Items XXL Device', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'default' => '3',
                            'multiple' => false,
                            'options' => [
                                    1 => esc_html__('1 Items', 'themewar'),
                                    2 => esc_html__('2 Items', 'themewar'),
                                    3 => esc_html__('3 Items', 'themewar'),
                                    4 => esc_html__('4 Items', 'themewar'),
                                    5 => esc_html__('5 Items', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'item_per_row_1', [
                            'label' => esc_html__('Items XL Device', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'default' => '3',
                            'multiple' => false,
                            'options' => [
                                    1 => esc_html__('1 Items', 'themewar'),
                                    2 => esc_html__('2 Items', 'themewar'),
                                    3 => esc_html__('3 Items', 'themewar'),
                                    4 => esc_html__('4 Items', 'themewar'),
                                    5 => esc_html__('5 Items', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'item_per_row_2', [
                            'label' => esc_html__('Items LG Device', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'default' => '3',
                            'multiple' => false,
                            'options' => [
                                    1 => esc_html__('1 Items', 'themewar'),
                                    2 => esc_html__('2 Items', 'themewar'),
                                    3 => esc_html__('3 Items', 'themewar'),
                                    4 => esc_html__('4 Items', 'themewar'),
                                    5 => esc_html__('5 Items', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'item_per_row_3', [
                            'label' => esc_html__('Items MD Device', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'default' => '2',
                            'multiple' => false,
                            'options' => [
                                1 => esc_html__('1 Items', 'themewar'),
                                2 => esc_html__('2 Items', 'themewar'),
                                3 => esc_html__('3 Items', 'themewar'),
                                4 => esc_html__('4 Items', 'themewar'),
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'item_per_row_4', [
                            'label' => esc_html__('Items SM Device', 'themewar'),
                            'type' => Controls_Manager::SELECT,
                            'default' => '2',
                            'multiple' => false,
                            'options' => [
                                1 => esc_html__('1 Items', 'themewar'),
                                2 => esc_html__('2 Items', 'themewar'),
                                3 => esc_html__('3 Items', 'themewar'),
                                4 => esc_html__('4 Items', 'themewar')
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                
                $this->add_control('logis_thumb_width', [
                                'label' => esc_html__( 'Thumbnail Width', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => '!=',
                                                'value'     => '4',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control('logis_thumb_height', [
                                'label' => esc_html__( 'Thumbnail Height', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => '!=',
                                                'value'     => '4',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'item_gapping', [
                            'label' => esc_html__( 'Items Gapping', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                            'default' => 24,
                            'description'   => esc_html__('Insert items gapping if you want.', 'themewar'),
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => '!=',
                                            'value'     => '4',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'folio_item_length', [
                            'label'     => esc_html__( 'Title Length', 'themewar' ),
                            'type'      => Controls_Manager::NUMBER,
                            'min'       => 1,
                            'max'       => 500,
                            'step'      => 1,
                            'default'   => 25,
                            'description'   => esc_html__('Setup your folio title length for style1 25 and style2 21 and style3 30 and style4 41', 'themewar')
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
                                'selector' => '{{WRAPPER}} .project_item, {{WRAPPER}} .collSingleItem',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pfs_items_area_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .project_item, {{WRAPPER}} .collSingleItem',
                        ]
                );
                $this->add_responsive_control( 'pfs_items_area_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .project_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'pfs_items_margins', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .project_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pfs_items_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .project_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section(); 
        

        $this->start_controls_section('pfs_item_shape', [
                'label'         => esc_html__('Shape Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'pfs_view',
                                'operator'  => 'in',
                                'value'     => ['1','3','4'],
                        ],
                    ],
                ],
        ]);
                
                $this->add_control('pfs_shape_Preview',[
                            'label' => esc_html__( 'Preview Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'pfs_shape_typo',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .mix a.projectShow, {{WRAPPER}} .pdTitle_wrap h3, {{WRAPPER}} .collSingleItem .viewColl',
                    ]
                );
                $this->start_controls_tabs('pfs_shape_tabs');
                    $this->start_controls_tab( 'pfs_shape_tab_nr', [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_responsive_control('pfs_shape_color_nr',[
                                            'label' => esc_html__( ' Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .mix a.projectShow'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collSingleItem .viewColl'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'pfs_shape_prev_bg_nr',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .mix a.projectShow, {{WRAPPER}} .collSingleItem .viewColl:after',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'pfs_shape_bdr_nr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .mix a.projectShow, {{WRAPPER}} .collSingleItem .viewColl:after',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'pfs_shape_shadow_nr',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .mix a.projectShow, {{WRAPPER}} .collSingleItem .viewColl',
                                    ]
                            );
                            $this->add_responsive_control( 'pfs_shape_shadow_radius_nr', [
                                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .mix a.projectShow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collSingleItem .viewColl:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collSingleItem .viewColl' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collSingleItem .viewColl:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ]
                                ]
                            );
                    $this->end_controls_tab(); 
                    $this->start_controls_tab( 'pfs_shape_tab_hr', [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                            $this->add_responsive_control('pfs_shape_color_hr',[
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .mix a.projectShow:hover'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collSingleItem .viewColl:hover'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'pfs_shape_prv_bg_hr',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .mix a.projectShow:hover, {{WRAPPER}} .collSingleItem .viewColl:before',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'pfs_shape_bdr_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .mix a.projectShow:hover, {{WRAPPER}} .collSingleItem .viewColl:before',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'pfs_shape_shadow_hr',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .mix a.projectShow:hover, {{WRAPPER}} .collSingleItem .viewColl:before',
                                    ]
                            );
                    $this->end_controls_tab();  
                $this->end_controls_tabs();
                $this->add_responsive_control( 'pfs_items_dsmargins', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mix a.projectShow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem .viewColl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pfs_items_dspadding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mix a.projectShow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem .viewColl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('pfs_items_shape', [
                            'label' => esc_html__( 'Shape Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'pfs_view',
                                            'operator'  => 'in',
                                            'value'     => ['1'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'pfs_shape_bg_hr',
                                'label' => esc_html__( 'Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .projectGallery .mix:after',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => 'in',
                                                'value'     => ['1'],
                                        ],
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('section_tab_cnarea', [
                'label'         => esc_html__('Content Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'pfs_view',
                                'operator'  => 'in',
                                'value'     => ['2'],
                        ],
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'bl_content_bg_color',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .pdTitle01'
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'bl_content_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .pdTitle01',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'bl_contentbox_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .pdTitle01',
                        ]
                );
                $this->add_responsive_control( 'bl_contentbox_border_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pdTitle01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'pfs_content_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .pdTitle01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pfs_content_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .pdTitle01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'transform_tranlateX',[
                                'label' => esc_html__( 'Transform X', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'unit' => '%',
                                    'size' => 0.5,
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pdItem01:hover .pdTitle01' => 'transform: translateX({{SIZE}}{{UNIT}});',
                                    '{{WRAPPER}} .pdItem01:hover .pdTitle01' => '-webkit-transform: translateX({{SIZE}}{{UNIT}});',
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
                                'selector'  => '{{WRAPPER}} .projectContent h3, {{WRAPPER}} .pdTitle_wrap h3, {{WRAPPER}} .portFolioInfo h3, {{WRAPPER}} .collSingleItem .collCat h4',
                        ]
                );
                $this->add_responsive_control( 'title_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectContent h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .collSingleItem .collCat h4' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'title_color_hr',[
                                'label'     => esc_html__( 'Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectContent h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .collSingleItem .collCat h4 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('title_color_bg',[
                                'label'     => esc_html__( 'background Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectContent h3' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap h3' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .collSingleItem .collCat h4' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'title_color_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .projectContent h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem .collCat h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'title_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectContent h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem .collCat h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'title_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectContent h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collSingleItem .collCat h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_subtitle', [
                'label'         => esc_html__('Category Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'subtitle_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .projectCat02 a, {{WRAPPER}} .pdTitle_wrap > a, {{WRAPPER}} .portFolioInfo h4, {{WRAPPER}} .collCat .collTag',
                        ]
                );
                $this->add_responsive_control('subtitle_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .collCat .collTag' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('subtitle_color_hr',[
                                'label'     => esc_html__( 'Hover Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap > a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .collCat .collTag:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('subtitle_color_bg',[
                                'label'     => esc_html__( 'background Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 a' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'background: {{VALUE}}',
                                    '{{WRAPPER}} .collCat .collTag' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'subtitle_color_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collCat .collTag' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'subtitle_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectCat02 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collCat .collTag' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'subtitle_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectCat02 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .portFolioInfo h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .collCat .collTag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('pf_meta_saparator',[
                                'label' => esc_html__( 'Category Saparator', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => '==',
                                                'value'     => 1,
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control('pf_meta_saparator_color',[
                                'label'     => esc_html__( 'Separator Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 span' => 'background: {{VALUE}}',
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => '==',
                                                'value'     => 1,
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'pf_meta_saparator_mar', [
                                'label'      => esc_html__( 'Separator Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .projectCat02 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'pfs_view',
                                                'operator'  => '==',
                                                'value'     => 1,
                                        ],
                                    ],
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
                                'name'      => 'pfs_slide_nav',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button span, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button i, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button span, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button i'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button:hover span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button:hover span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev:after, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next:after',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .folioSlider01.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .collectionSlider.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'pfs_slide_dots',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_nr_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_ps', [
                                        'label' => esc_html__( 'Dots Inner Position', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'allowed_dimensions' => ['top', 'left'],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot:hover, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot:hover',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot:hover span, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot:hover span',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_ac_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active span, {{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active span',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .folioSlider01.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .collectionSlider.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $pfs_view               = (isset($settings['pfs_view']) && $settings['pfs_view'] > 0 ) ? $settings['pfs_view'] : 1;

        $pfs_folio              = (isset($settings['pfs_folio']) && !empty($settings['pfs_folio']) ) ? $settings['pfs_folio'] : array();
        $pfs_category           = (isset($settings['pfs_folio_category']) && !empty($settings['pfs_folio_category']) ) ? $settings['pfs_folio_category'] : array();
        
        $pfs_post_item          = (isset($settings['pfs_post_item']) && $settings['pfs_post_item'] > 0) ? $settings['pfs_post_item'] : 6;
        $pfs_post_offset        = (isset($settings['pfs_post_offset']) && $settings['pfs_post_offset'] > 0) ? $settings['pfs_post_offset'] : 0;
        $pfs_order_by           = (isset($settings['pfs_order_by']) && $settings['pfs_order_by'] != '') ? $settings['pfs_order_by'] : 'date';
        $pfs_order              = (isset($settings['pfs_order']) && $settings['pfs_order'] != '') ? $settings['pfs_order'] : 'desc';
        
        $autoplay               = (isset($settings['pfs_slide_autoplay'])) ? $settings['pfs_slide_autoplay'] : 'yes';
        $loop                   = (isset($settings['pfs_slide_loop'])) ? $settings['pfs_slide_loop'] : 'yes';
        $nav                    = (isset($settings['pfs_slide_nav'])) ? $settings['pfs_slide_nav'] : 'no';
        $dots                   = (isset($settings['pfs_slide_dots'])) ? $settings['pfs_slide_dots'] : 'no';
        
        $item_per_row_01        = (isset($settings['item_per_row_01']) && $settings['item_per_row_01'] > 0 ? $settings['item_per_row_01'] : 3);
        $item_per_row_1         = (isset($settings['item_per_row_1']) && $settings['item_per_row_1'] > 0 ? $settings['item_per_row_1'] : 3);
        $item_per_row_2         = (isset($settings['item_per_row_2']) && $settings['item_per_row_2'] > 0 ? $settings['item_per_row_2'] : 3);
        $item_per_row_3         = (isset($settings['item_per_row_3']) && $settings['item_per_row_3'] > 0 ? $settings['item_per_row_3'] : 4);
        $item_per_row_4         = (isset($settings['item_per_row_4']) && $settings['item_per_row_4'] > 0 ? $settings['item_per_row_4'] : 2);
        $item_gapping           = (isset($settings['item_gapping']) && $settings['item_gapping'] != '' ? $settings['item_gapping'] : 24);
        $folio_item_length      = (isset($settings['folio_item_length']) && $settings['folio_item_length'] > 0 ? $settings['folio_item_length'] : 0);
        
        $logis_thumb_width      = (isset($settings['logis_thumb_width']) && $settings['logis_thumb_width'] > 0 ? $settings['logis_thumb_width'] : '');
        $logis_thumb_height     = (isset($settings['logis_thumb_height']) && $settings['logis_thumb_height'] > 0 ? $settings['logis_thumb_height'] : '');

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';;
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }

        
        include dirname(__FILE__).'/style/folio-slide/style'.$pfs_view.'.php';
    }
    
    protected function content_template() {}
    
}