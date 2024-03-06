<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Folio_Grid_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-project-grid';
    }
    public function get_title() {
        return esc_html__('Folio Grid', 'themewar');
    }
    public function get_icon() {
        return 'eicon-gallery-masonry';
    }
    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Folio Grid', 'themewar' ),
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
                $this->add_control( 'is_masonry', [
                                'label'             => esc_html__( 'Is Masonry?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Show', 'themewar' ),
                                'label_off'         => esc_html__( 'Hide', 'themewar' ),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                        ]
                );
                $this->add_control( 'is_filter', [
                                'label'             => esc_html__( 'Is Filter?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Show', 'themewar' ),
                                'label_off'         => esc_html__( 'Hide', 'themewar' ),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'filter_all_label', [
                                'label'             => esc_html__( 'Label for All BTN', 'themewar' ),
                                'type'              => Controls_Manager::TEXT,
                                'default'           => esc_html__('All Photos', 'themewar'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_filter',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'filtr_alignment', [
                                'label'         => esc_html__( 'Filter Menu Position', 'themewar' ),
                                'type'          => Controls_Manager::SELECT,
                                'description'   => esc_html__('Select your filter menu position', 'themewar'),
                                'default'       => 'center',
                                'options'       => [
                                        'start'       => esc_html__( 'Left', 'themewar' ),
                                        'center'       => esc_html__( 'Center', 'themewar' ),
                                        'end'       => esc_html__( 'Right', 'themewar' ),
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_filter',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'grid_xxl_col', [
                                'label'     => esc_html__( 'Select XXL Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' ),
                                        '5'       => esc_html__( '5 Column', 'themewar' ),
                                ]
                        ]
                );
                $this->add_control( 'grid_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' ),
                                        '5'       => esc_html__( '5 Column', 'themewar' ),
                                ]
                        ]
                );
                $this->add_control( 'grid_lg_col', [
                                'label'     => esc_html__( 'Select LG Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' )
                                ]
                        ]
                );
                $this->add_control( 'grid_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' )
                                ]
                        ]
                );
                $this->add_control( 'grid_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '1',
                                'options'   => [
                                        '1'       => esc_html__( '1 Column', 'themewar' ),
                                        '2'       => esc_html__( '2 Column', 'themewar' ),
                                        '3'       => esc_html__( '3 Column', 'themewar' ),
                                        '4'       => esc_html__( '4 Column', 'themewar' )
                                ]
                        ]
                );
                $this->add_control('logis_thumb_width', [
                                'label' => esc_html__( 'Thumbnail Width', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                        ]
                );
                $this->add_control('logis_thumb_height', [
                                'label' => esc_html__( 'Thumbnail Height', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                                'default' => '',
                                
                        ]
                );
                $this->add_control('folio_category', [
                                'label' => esc_html__('Folio Category', 'themewar'),
                                'type' => 'themewar_autocomplete',
                                'description' => esc_html__('Select portfolio category.', 'themewar'),
                                'action' => 'themewar_get_taxonomy',
                                'taxonomy' => 'folio_cat',
                                'multiple' => true,
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
                $this->add_control( 'folio_post_item', [
                                'label'     => esc_html__( 'Item Per Page', 'themewar' ),
                                'type'      => Controls_Manager::NUMBER,
                                'min'       => 1,
                                'max'       => 500,
                                'step'      => 1,
                                'default'   => 10,
                        ]
                );
                $this->add_control( 'folio_item_offset', [
                                'label'     => esc_html__( 'Item Offset', 'themewar' ),
                                'type'      => Controls_Manager::NUMBER,
                                'min'       => 0,
                                'max'       => 500,
                                'step'      => 0,
                                'default'   => 0,
                        ]
                );
                $this->add_control( 'folio_order_by', [
                                'label' => esc_html__( 'Order By', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                        'ID'         => esc_html__( 'ID', 'themewar' ),
                                        'date'       => esc_html__( 'Date', 'themewar' ),
                                        'title'      => esc_html__( 'Title', 'themewar' ),
                                        'rand'       => esc_html__( 'Random', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'folio_order', [
                                'label' => esc_html__( 'Order', 'themewar' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'       => esc_html__( 'Ascending', 'themewar' ),
                                        'desc'      => esc_html__( 'Descending', 'themewar' ),
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
                                'description'   => esc_html__('Setup your folio title length for style1 25 and style2 21 and style3 30', 'themewar')
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
                                'default'       => 'center',
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
        
        $this->start_controls_section( 'section_tab_navigation', [
                'label'         => esc_html__('Filter Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'        => [
                    'terms'         => [
                        [
                                'name'      => 'is_filter',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);     
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_1_typography',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .projectCategories li',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1');
                    $this->start_controls_tab('btn_1_button_style_normal', [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_responsive_control('btn_1_label_color',[
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .projectCategories li'   => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'btn_1_bg',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .projectCategories li',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'icon_box_i_border_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .projectCategories li',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_i__shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .projectCategories li',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Active & Hover', 'themewar' )]);
                            $this->add_responsive_control( 'btn_label_hover_color', [
                                            'label'     => esc_html__( 'Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .projectCategories li.active '   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .projectCategories li:hover '    => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'btn_1_hover_bg',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .projectCategories li.active, {{WRAPPER}} .projectCategories li:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'icon_box_i_hover_border_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .projectCategories li.active, {{WRAPPER}} .projectCategories li:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_i_hover_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .projectCategories li.active, {{WRAPPER}} .projectCategories li:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('hr_btn_divider',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control( 'border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .projectCategories li'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .projectCategories li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .projectCategories li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_area_margin', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .projectCat_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_area_pd', [
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .projectCat_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'selector' => '{{WRAPPER}} .project_item',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pfs_items_area_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .project_item',
                        ]
                );
                $this->add_responsive_control( 'pfs_items_area_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .project_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'pfs_items_margins', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .project_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pfs_items_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .project_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'view_style',
                                'operator'  => 'in',
                                'value'     => ['1','3'],
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
                                                    '{{WRAPPER}} .collSingleItem .viewColl'   => 'color: {{VALUE}}'
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
                                                '{{WRAPPER}} .collSingleItem .viewColl' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                                '{{WRAPPER}} .collSingleItem .viewColl:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                            'name'      => 'view_style',
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
                                                'name'      => 'view_style',
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
                                'name'      => 'view_style',
                                'operator'  => '!in',
                                'value'     => ['1','3'],
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
                                'label' => esc_html__( 'Hover Transform X', 'themewar' ),
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
                                    'size' => '',
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
                                'selector'  => '{{WRAPPER}} .projectCat02 a, {{WRAPPER}} .pdTitle_wrap > a, {{WRAPPER}} .collCat .collTag',
                        ]
                );
                $this->add_responsive_control('subtitle_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .projectCat02 a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .pdTitle_wrap > a' => 'color: {{VALUE}}',
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
                                                'name'      => 'view_style',
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
                                                'name'      => 'view_style',
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
                                                'name'      => 'view_style',
                                                'operator'  => '==',
                                                'value'     => 1,
                                        ],
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_10', [
                'label'         => esc_html__( 'Pagination Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'        => [
                    'terms'         => [
                        [
                                'name'      => 'is_pagination',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);
                $this->start_controls_tabs( 'style_tabs_102' );
                    $this->start_controls_tab('folio_pagination_nr', ['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control('pagination_item_color',[
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioPagePagination a'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioPagePagination span'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control('pagination_item_color_next_prev',[
                                            'label' => esc_html__( 'Next / Prev Btn Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioPagePagination a.next'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioPagePagination a.prev'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'pagination_item_bg',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .folioPagePagination a, {{WRAPPER}} .folioPagePagination span',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'pagination_item_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioPagePagination a, {{WRAPPER}} .folioPagePagination span',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'pagination_item_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioPagePagination a, {{WRAPPER}} .folioPagePagination span',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('folio_pagination_hr',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control('pagination_item_color_hover',[
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioPagePagination a:hover'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioPagePagination span.current'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control('pagination_item_color_next_prev_hover',[
                                            'label' => esc_html__( 'Next / Prev Btn Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .folioPagePagination a.next:hover'   => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .folioPagePagination a.prev:hover'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'pagination_item_bg_hover',
                                            'label' => esc_html__( 'Box Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .folioPagePagination a:hover, {{WRAPPER}} .folioPagePagination span.current',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'pagination_item_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioPagePagination a:hover, {{WRAPPER}} .folioPagePagination span.current',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'pagination_item_shadow_hover',
                                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .folioPagePagination a:hover, {{WRAPPER}} .folioPagePagination span.current',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'pagination_item_radius', [
                                'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'separator'  => 'before',
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],

                        ]
                );
                $this->add_responsive_control( 'pagination_item_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pagination_item_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'pagination_area_heading', [
                        'label' => esc_html__( 'Pagination Area', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'pagination_area_margin', [
                                'label'      => esc_html__( 'Area Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfarePagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'pagination_area_padding', [
                                'label'      => esc_html__( 'Area Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfarePagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $view_style             = (isset($settings['view_style']) && $settings['view_style'] > 0 ? $settings['view_style'] : 1);
        $is_masonry              = (isset($settings['is_masonry']) && !empty($settings['is_masonry']) ? $settings['is_masonry'] : 'no');
        $is_filter              = (isset($settings['is_filter']) && !empty($settings['is_filter']) ? $settings['is_filter'] : 'no');
        $filtr_alignment        = (isset($settings['filtr_alignment']) && !empty($settings['filtr_alignment'])? $settings['filtr_alignment'] : 'center');

        $autoplay               = (isset($settings['pfs_slide_autoplay']) && !empty($settings['pfs_slide_autoplay']) ? $settings['pfs_slide_autoplay'] : 'no');
        $loop                   = (isset($settings['pfs_slide_loop']) && !empty($settings['pfs_slide_loop']) ? $settings['pfs_slide_loop'] : 'no');
        $nav                    = (isset($settings['pfs_slide_nav']) && !empty($settings['pfs_slide_nav']) ? $settings['pfs_slide_nav'] : 'no');
        $dots                   = (isset($settings['pfs_slide_dots']) && !empty($settings['pfs_slide_dots']) ? $settings['pfs_slide_dots'] : 'no');

        $grid_xxl_col           = (isset($settings['grid_xxl_col']) && $settings['grid_xxl_col'] > 0) ? $settings['grid_xxl_col'] : 3;
        $grid_xl_col            = (isset($settings['grid_xl_col']) && $settings['grid_xl_col'] > 0) ? $settings['grid_xl_col'] : 3;
        $grid_lg_col            = (isset($settings['grid_lg_col']) && $settings['grid_lg_col'] > 0) ? $settings['grid_lg_col'] : 3;
        $grid_md_col            = (isset($settings['grid_md_col']) && $settings['grid_md_col'] > 0) ? $settings['grid_md_col'] : 2;
        $grid_sm_col            = (isset($settings['grid_sm_col']) && $settings['grid_sm_col'] > 0) ? $settings['grid_sm_col'] : 1;
        
        $logis_thumb_width        = (isset($settings['logis_thumb_width']) && $settings['logis_thumb_width'] > 0 ? $settings['logis_thumb_width'] : '');
        $logis_thumb_height       = (isset($settings['logis_thumb_height']) && $settings['logis_thumb_height'] > 0 ? $settings['logis_thumb_height'] : '');

        $folio_category         = (isset($settings['folio_category']) && !empty($settings['folio_category'])? $settings['folio_category'] : array());
        $pfs_folio              = (isset($settings['pfs_folio']) && !empty($settings['pfs_folio'])? $settings['pfs_folio'] : array());
        
        $folio_post_item          = (isset($settings['folio_post_item']) && !empty($settings['folio_post_item'])? $settings['folio_post_item'] : 10);
        $folio_item_offset      = (isset($settings['folio_item_offset']) && !empty($settings['folio_item_offset'])? $settings['folio_item_offset'] : 0);
        $folio_order_by         = (isset($settings['folio_order_by']) && !empty($settings['folio_order_by'])? $settings['folio_order_by'] : 'date');
        $folio_order            = (isset($settings['folio_order']) && !empty($settings['folio_order'])? $settings['folio_order'] : 'desc');
        $is_pagination          = (isset($settings['is_pagination']) && !empty($settings['is_pagination'])? $settings['is_pagination'] : 'no');
        $pagination_alignment   = (isset($settings['pagination_alignment']) && !empty($settings['pagination_alignment'])? $settings['pagination_alignment'] : 'left');
        $filter_all_label       = (isset($settings['filter_all_label']) && !empty($settings['filter_all_label']) ? $settings['filter_all_label'] : '');
        $folio_item_length      = (isset($settings['folio_item_length']) && $settings['folio_item_length'] > 0 ? $settings['folio_item_length'] : 23);

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_duration_inc = (isset($settings['animation_duration_inc']) && $settings['animation_duration_inc'] != '') ? $settings['animation_duration_inc'] : 0;
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        $animation_delay_inc    = (isset($settings['animation_delay_inc']) && $settings['animation_delay_inc'] != '') ? $settings['animation_delay_inc'] : 0;
        
        include dirname(__FILE__)."/style/folio-grid/style".$view_style.".php";
    }
    
    protected function content_template() {
        
    }
}