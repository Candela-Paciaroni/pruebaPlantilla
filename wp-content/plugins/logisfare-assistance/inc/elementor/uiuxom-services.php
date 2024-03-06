<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Services_Widgets extends Widget_Base {
    public function get_name() {
        return 'uiuxom-services';
    }
    public function get_title() {
        return esc_html__('Services', 'uiuxom');
    }
    public function get_icon() {
        return 'eicon-slider-full-screen';
    }
    public function get_categories() {
        return ['uiuxom-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Service Settings', 'uiuxom' ),
            ]
        );
                $this->add_control( 'view_style', [
                                'label'     => esc_html__( 'View Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Box 01', 'uiuxom' ),
                                        2       => esc_html__( 'Box 02', 'uiuxom' ),
                                        3       => esc_html__( 'Box 03', 'uiuxom' )
                                ],
                        ]
                );
                $this->add_control( 'grid_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 4,
                                'options'   => [
                                        2       => esc_html__( '2 Column', 'uiuxom' ),
                                        3       => esc_html__( '3 Column', 'uiuxom' ),
                                        4       => esc_html__( '4 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'grid_lg_col', [
                                'label'     => esc_html__( 'Select LG Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 3,
                                'options'   => [
                                        2       => esc_html__( '2 Column', 'uiuxom' ),
                                        3       => esc_html__( '3 Column', 'uiuxom' ),
                                        4       => esc_html__( '4 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'grid_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 2,
                                'options'   => [
                                        2       => esc_html__( '2 Column', 'uiuxom' ),
                                        3       => esc_html__( '3 Column', 'uiuxom' ),
                                        4       => esc_html__( '4 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'grid_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( '1 Column', 'uiuxom' ),
                                        2       => esc_html__( '2 Column', 'uiuxom' ),
                                        3       => esc_html__( '3 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'serv_specific', [
                                'label'         => esc_html__( 'Specific Services', 'uiuxom' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => array('0'),
                                'options'       => anmo_post_array('service', esc_html__('All Service', 'uiuxom')),
                        ]
                );
                $this->add_control( 'serv_post_item', [
                                'label'         => esc_html__( 'Number Of Item', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 500,
                                'step'          => 1,
                                'default'       => 8,
                                'description'   => esc_html__( 'How many item you want to show.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'serv_order_by', [
                                'label' => esc_html__( 'Order By', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                        'date'                  => esc_html__( 'Date', 'uiuxom' ),
                                        'title'                 => esc_html__( 'Title', 'uiuxom' ),
                                        'rand'                  => esc_html__( 'Random', 'uiuxom' )
                                ],
                        ]
                );
                $this->add_control( 'serv_order', [
                                'label' => esc_html__( 'Order', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'        => esc_html__( 'Ascending', 'uiuxom' ),
                                        'desc'       => esc_html__( 'Descending', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control('serv_strlimit', [
                                'label'         => esc_html__( 'Excerpt Limit', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 0,
                                'max'           => 10000,
                                'step'          => 1,
                                'default'       => 26,
                                'description'   => esc_html__( 'Setup your item description text limit. 26 for style 01, 112 for style 02 and 96 for style 03.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'rm_label', [
                                'label'         => esc_html__( 'Read More Label', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Read More', 'uiuxom'),
                                'label_block'   => TRUE,
                                'placeholder'   => esc_html__('View Details', 'uiuxom'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'is_pagination', [
                                'label'             => esc_html__( 'Is Pagination?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Show', 'uiuxom' ),
                                'label_off'         => esc_html__( 'Hide', 'uiuxom' ),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                        ]
                );
                $this->add_control( 'pagination_alignment', [
                                'label'         => esc_html__( 'Pagination Alignment', 'uiuxom' ),
                                'type'          => Controls_Manager::SELECT,
                                'description'   => esc_html__('Select your pagination alignment.', 'uiuxom'),
                                'default'       => 'center',
                                'options'       => [
                                        'left'       => esc_html__( 'Left', 'uiuxom' ),
                                        'center'       => esc_html__( 'Center', 'uiuxom' ),
                                        'right'       => esc_html__( 'Right', 'uiuxom' ),
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

        $this->start_controls_section(
                'section_tab_4982', [
                    'label'         => esc_html__( 'Iconboxes Gradient Settings', 'uiuxom' ),
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'view_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ],
                        ],
                    ],
                ]
        );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'color_01',[
                                        'label'     => esc_html__( 'Color 01', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                ]
                        );
                        $repeater->add_control( 'location_01', [
                                        'label' => esc_html__( 'Color 1 Location', 'uiuxom' ),
                                        'type' => \Elementor\Controls_Manager::NUMBER,
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                        'default' => 0,
                                ]
                        );
                        $repeater->add_control( 'color_02',[
                                        'label'     => esc_html__( 'Color 02', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                ]
                        );
                        $repeater->add_control( 'location_02', [
                                        'label' => esc_html__( 'Color 2 Location', 'uiuxom' ),
                                        'type' => \Elementor\Controls_Manager::NUMBER,
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                        'default' => 100,
                                ]
                        );
                        $repeater->add_control( 'angle', [
                                        'label' => esc_html__( 'Angle', 'uiuxom' ),
                                        'type' => \Elementor\Controls_Manager::NUMBER,
                                        'min' => -360,
                                        'max' => 360,
                                        'step' => 1,
                                        'default' => 90,
                                ]
                        );
                $this->add_control( 'gradients', [
                                'label'   => esc_html__( 'Gradient', 'uiuxom' ),
                                'type'    => Controls_Manager::REPEATER,
                                'fields'  => $repeater->get_controls(),
                                'default' => [],
                                'title_field' => '{{{ color_01 }}}',
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_1', [
                    'label'         => esc_html__('Item Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'srv_box_bg',
                                'label' => esc_html__( 'Item Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox01 ',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'srv_box_shadow',
                                'label' => esc_html__( 'Item Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox01 ',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'srv_border',
                                'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .iconBox06, {{WRAPPER}} .iconBox05, {{WRAPPER}} .iconBox01 ',
                        ]
                );
                $this->add_responsive_control( 'srv_box_radius', [
                                'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'srv_box_padding', [
                                'label' => esc_html__( 'Item Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'srv_box_margin', [
                                'label' => esc_html__( 'Item Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2i',[
                        'label'         => esc_html__('Icon Or Image Style', 'uiuxom'),
                        'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox06 span > i, {{WRAPPER}} .iconBox05 span > i, {{WRAPPER}} .iconBox01 span > i'
                        ]
                );
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox06 span > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox06 span > i::before' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05 span > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05 span > i::before' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox01 span > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox01 span > i::before' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox06 span, {{WRAPPER}} .iconBox05 > span, {{WRAPPER}} .iconBox01 > span',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Hover', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox06 span:hover > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox06 span:hover > i::before' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05 span:hover > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox05 span:hover > i::before' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox01 span:hover > i' => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .iconBox01 span:hover > i::before' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color_hover',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox06:hover > span, {{WRAPPER}} .iconBox05:hover > span, {{WRAPPER}} .iconBox01:hover > span',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
              
                $this->add_control( 'srv_icon_image_width_height', [
                                'label' => esc_html__( 'Image Width Height', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                        $this->add_responsive_control( 'icon_box_img_width', [
                                        'label' => esc_html__( 'Image Width', 'uiuxom' ),
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
                                                '{{WRAPPER}} .iconBox06 span > img' => 'max-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox05 span > img' => 'max-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox01 span > img' => 'max-width: {{SIZE}}{{UNIT}};',
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'icon_box_img_height', [
                                        'label' => esc_html__( 'Image Height', 'uiuxom' ),
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
                                                '{{WRAPPER}} .iconBox06 span > img' => 'height: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox05 span > img' => 'height: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox01 span > img' => 'height: {{SIZE}}{{UNIT}};',
                                        ],
                                ]
                        );
                $this->add_control( 'srv_icon_image_box_width_height', [
                                'label' => esc_html__( 'Icon or Image Box', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                        $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                        $this->add_responsive_control( 'icon_box_i_width', [
                                        'label' => __( 'Width', 'uiuxom' ),
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
                                                '{{WRAPPER}} .iconBox06 > span' => 'width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox05 > span' => 'width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox01 > span' => 'width: {{SIZE}}{{UNIT}};'
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'icon_box_i_height', [
                                        'label' => __( 'Height', 'uiuxom' ),
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
                                                '{{WRAPPER}} .iconBox06 > span' => 'height: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox05 > span' => 'height: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox01 > span' => 'height: {{SIZE}}{{UNIT}};'
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'icon_box_i_border_hr',
                                        'label' => esc_html__( 'Border', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .iconBox06 > span, {{WRAPPER}} .iconBox05 > span, {{WRAPPER}} .iconBox01 > span',
                                ]
                        );
                        $this->add_control( 'icon_box_i_radius', [
                                    'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .iconBox06 > span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox05 > span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox01 > span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'icon_box_i__shadow',
                                        'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .iconBox06 > span, {{WRAPPER}} .iconBox05 > span, {{WRAPPER}} .iconBox01 > span',
                                ]
                        );
                        $this->add_control( 'icon_box_i_padding', [
                                        'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .iconBox06 > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .iconBox05 > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .iconBox01 > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ]
                                ]
                        );
                        $this->add_control( 'icon_box_i_margin', [
                                        'label' => esc_html__( 'Margins', 'uiuxom' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'allowed_dimensions' => ['top','bottom'],
                                        'selectors'  => [
                                                '{{WRAPPER}} .iconBox06 > span' => 'margin-top: {{TOP}}{{UNIT}};', 'margin-bottom: {{BOTTOM}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox05 > span' => 'margin-top: {{TOP}}{{UNIT}};', 'margin-bottom: {{BOTTOM}}{{UNIT}};',
                                                '{{WRAPPER}} .iconBox01 > span' => 'margin-top: {{TOP}}{{UNIT}};', 'margin-bottom: {{BOTTOM}}{{UNIT}};',
                                        ]
                                ]
                        );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3444',[
                        'label'         => esc_html__('Title Style', 'uiuxom'),
                        'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox06 h3, {{WRAPPER}} .iconBox05 h3, {{WRAPPER}} .iconBox06 h3, {{WRAPPER}} .iconBox01 h3',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 h3' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox01 h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_hover_title_color',[
                                'label'     => esc_html__( 'Linked Title Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 h3 a:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox01 h3 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox06 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                        'label'         => esc_html__('Description Style', 'uiuxom'),
                        'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_content_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox06 p, {{WRAPPER}} .iconBox05 p, {{WRAPPER}} .iconBox01 p',
                        ]
                );
                $this->add_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox06 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox05 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox01 p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox06 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox05 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_rmbtn', [
                        'label'             => esc_html__('Read More Btn Styling', 'uiuxom'),
                        'tab'               => Controls_Manager::TAB_STYLE,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'view_style',
                                        'operator'  => '==',
                                        'value'     => '2',
                                ]
                            ],
                        ],
                ]
        );
                $this->add_control('hr_2',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'rmbtn_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore'
                        ]
                );
                $this->add_responsive_control( 'icon_box_border_width', [
                                'label' => __( 'Border Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore:after' => 'width: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_border_height', [
                                'label' => __( 'Border Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore:after' => 'height: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->start_controls_tabs( 'rmbtn_styling_tab' );
                        $this->start_controls_tab( 'rmbtn_styling_tab_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ] );
                                $this->add_responsive_control( 'rmbtn_nav_color', [
                                                'label' => esc_html__( 'Border Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore::after' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'rmbtn_styling_tab_hover', [ 'label' => esc_html__( 'Hover', 'uiuxom' ) ]);
                                $this->add_responsive_control( 'rmbtn_nav_color_hr', [
                                                'label' => esc_html__( 'Border Hover Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore:hover:after' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('hr_3',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                
                $this->add_responsive_control( 'rmbtn_btns_margin', [
                            'label'      => esc_html__( 'BTN Margins', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .iconBox05 .hm2-ServiceRdMore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_3235',[
                        'label'         => esc_html__('Navigation Style', 'uiuxom'),
                        'tab'           => Controls_Manager::TAB_STYLE,
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
                $this->add_responsive_control( 'area_paddings',[
                                'label'      => esc_html__( 'Area Paddings', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination .nav-links' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('area_magrins',[
                                'label'      => esc_html__( 'Area Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination .nav-links' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                                'name'      => 'btn_typography',
                                'label'     => esc_html__( 'Text Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .folioPagePagination .nav-links a, {{WRAPPER}} .folioPagePagination .nav-links span',
                        ]
                );
                $this->add_responsive_control('list_paddings', [
                                'label'      => esc_html__( 'List Item Paddings', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination .nav-links a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination .nav-links span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('list_magrins',[
                                'label'      => esc_html__( 'List Item Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .folioPagePagination .nav-links span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination .nav-links a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                                'name'      => 'nav_item_border_color',
                                'label'     => esc_html__( 'Border', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .folioPagePagination .nav-links span, {{WRAPPER}} .folioPagePagination .nav-links a',
                        ]
                );
                
                $this->add_control( 'list_broder_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .folioPagePagination .nav-links span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioPagePagination .nav-links a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'list_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .folioPagePagination .nav-links span, {{WRAPPER}} .folioPagePagination .nav-links a',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                        $this->start_controls_tab( 'btn_1_button_style_normal',[
                                        'label' => esc_html__( 'Normal', 'uiuxom' ),
                                ]
                        );
                        $this->add_responsive_control('btn_1_label_color',[
                                        'label' => esc_html__( 'Text Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .folioPagePagination .nav-links span' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .folioPagePagination .nav-links a' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control('btn_1_bg_color',[
                                        'label' => esc_html__( 'BG Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .folioPagePagination .nav-links span' => 'background: {{VALUE}}',
                                                '{{WRAPPER}} .folioPagePagination .nav-links a' => 'background: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'btn_1_button_style_hover',[
                                        'label' => esc_html__( 'Hover', 'uiuxom' ),
                                ]
                        );
                        $this->add_responsive_control('btn_label_hover_color',[
                                        'label' => esc_html__( 'Hover Color', 'uiuxom' ),
                                        'type'  => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .folioPagePagination .nav-links a:hover'  => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .folioPagePagination .nav-links span:hover'  => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control('btn_1_bg_hover_color',[
                                        'label' => esc_html__( 'Hover BG Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .folioPagePagination .nav-links a:hover' => 'background: {{VALUE}}',
                                                '{{WRAPPER}} .folioPagePagination .nav-links span:hover' => 'background: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $view_style         = (isset($settings['view_style']) && $settings['view_style'] !='') ? $settings['view_style'] : 1;
        $gradients          = (isset($settings['gradients']) && !empty($settings['gradients']) ? $settings['gradients'] : []);
        
        $grid_xl_col        = (isset($settings['grid_xl_col']) && $settings['grid_xl_col'] > 0) ? $settings['grid_xl_col'] : 4;
        $grid_lg_col        = (isset($settings['grid_lg_col']) && $settings['grid_lg_col'] > 0) ? $settings['grid_lg_col'] : 3;
        $grid_md_col        = (isset($settings['grid_md_col']) && $settings['grid_md_col'] > 0) ? $settings['grid_md_col'] : 2;
        $grid_sm_col        = (isset($settings['grid_sm_col']) && $settings['grid_sm_col'] > 0) ? $settings['grid_sm_col'] : 2;
        $serv_specific      = (isset($settings['serv_specific']) && !empty($settings['serv_specific'])? $settings['serv_specific'] : array());
        
        $serv_post_item     = (isset($settings['serv_post_item']) && $settings['serv_post_item'] > 0 ) ? $settings['serv_post_item'] : 6;
        $serv_order_by      = (isset($settings['serv_order_by']) && $settings['serv_order_by'] != '' ) ? $settings['serv_order_by'] : 'date';
        $serv_order         = (isset($settings['serv_order']) && $settings['serv_order'] != '' ) ? $settings['serv_order'] : 'desc';

        $serv_strlimit      = (isset($settings['serv_strlimit']) && $settings['serv_strlimit'] > 0 ) ? $settings['serv_strlimit'] : 97;

        $rm_label          = (isset($settings['rm_label']) && $settings['rm_label'] != '') ? $settings['rm_label'] : esc_html__('Read More', 'orbito');

        $is_pagination          = (isset($settings['is_pagination']) && !empty($settings['is_pagination'])? $settings['is_pagination'] : 'no');
        $pagination_alignment   = (isset($settings['pagination_alignment']) && !empty($settings['pagination_alignment'])? $settings['pagination_alignment'] : 'center');
        
        include dirname(__FILE__).'/style/services/style1.php';
    }
    
    protected function content_template() {
        
    }
}