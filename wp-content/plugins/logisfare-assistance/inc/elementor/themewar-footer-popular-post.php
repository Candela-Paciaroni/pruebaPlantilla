<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Footer_Popular_Post_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-popular-post';
    }
    
    public function get_title() {
        return esc_html__( 'Popular Post Widget', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-posts-ticker';
    }

    public function get_categories() {
        return [ 'themewar-footer-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Popular Post', 'themewar' ),
        ]);      
                $this->add_control('widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                    ]
                );
                $this->add_control('lb_specific', [
                            'label'         => esc_html__( 'Specific Post', 'orientate' ),
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
                            'default'       => 2,
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
                $this->add_control( 'post_title_length', [
                            'label'     => esc_html__( 'Post Title Length', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                            'default' => 18,
                    ]
                );
                $this->add_control( 'post_readM_lable', [
                            'label'     => esc_html__( 'Post Button Lable', 'themewar' ),
                            'type' => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => esc_html__( 'Read More', 'themewar' )
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

        $this->start_controls_section('section_tab_w_area',[
                'label'         => esc_html__('Widget Area', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'nav_area_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'nav_area_border',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_responsive_control('nav_area_mr', [
                            'label'      => esc_html__( 'Area margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'nav_area_pd',[
                            'label'      => esc_html__( 'Area padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                $this->add_control('widget_title_heading',[
                            'label' => esc_html__( 'Widget Title After', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_title_shape',
                                'label' => esc_html__( 'Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .widgetTitle:after',
                        ]
                );
                $this->add_responsive_control('widget_title_shape_w',[
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_title_shape_h',[
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'widget_shape_position', [
                            'label' => esc_html__( 'Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle:after' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
                
        $this->start_controls_section( 'section_tab_03', [
                'label'         => esc_html__( 'Item Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_cont_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .poSinglePost',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_cont_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .poSinglePost',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_cont_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .poSinglePost',
                    ]
                );
                $this->add_responsive_control( 'lb_cont_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_margin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_padding', [
                            'label'      => esc_html__( 'Item Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_Content', [
                'label'         => esc_html__( 'Item Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'lb_cont_heading_01', [
                            'label' => esc_html__( 'Blog Meta Styling', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .poSinglePost p',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_color',[
                            'label'     => esc_html__( 'Text Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_area_margin', [
                            'label'      => esc_html__( 'Meta Area Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_area_padding', [
                            'label'      => esc_html__( 'Meta Area Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'lb_cont_heading_02', [
                        'label' => esc_html__( 'Blog Title Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_btitle_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .poSinglePost h4',
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost h4' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color_hover',[
                            'label'     => esc_html__( 'Hover Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost h4 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_margin', [
                            'label'      => esc_html__( 'Title Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_padding', [
                            'label'      => esc_html__( 'Title Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'lb_cont_heading_03', [
                        'label' => esc_html__( 'Blog Image Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_item_img_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .poSinglePost > img',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_item_img_shadow',
                            'label' => esc_html__( 'Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .poSinglePost > img',
                    ]
                );
                $this->add_responsive_control( 'lb_item_img_readius', [
                            'label'      => esc_html__( 'Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_item_img_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_control( 'lb_cont_heading_04', [
                        'label' => esc_html__( 'Blog Button Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_btitle_btn_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .poSinglePost .btnLink',
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_btn_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost .btnLink' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color_btn_hover',[
                            'label'     => esc_html__( 'Hover Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .poSinglePost .btnLink:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_btn_margin', [
                            'label'      => esc_html__( 'Title Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost .btnLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_btn_padding', [
                            'label'      => esc_html__( 'Title Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .poSinglePost .btnLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        
        $lb_specific            = (isset($settings['lb_specific']) && !empty($settings['lb_specific'])? $settings['lb_specific'] : array());
        $lb_post_item           = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by            = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order               = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        
        $lb_post_thumb_width    = (isset($settings['lb_post_thumb_width']) && $settings['lb_post_thumb_width'] > 0) ? $settings['lb_post_thumb_width'] : '';
        $lb_post_thumb_height   = (isset($settings['lb_post_thumb_height']) && $settings['lb_post_thumb_height'] > 0) ? $settings['lb_post_thumb_height'] : '';
        
        $post_title_length      = (isset($settings['post_title_length']) && $settings['post_title_length'] != '') ? $settings['post_title_length'] : '';
        $post_readM_lable       = (isset($settings['post_readM_lable']) && $settings['post_readM_lable'] != '') ? $settings['post_readM_lable'] : 'Read More';
        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.'' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.'' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.'' : '');
        }
        
        $querys = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'posts_per_page'    => $lb_post_item,
            'orderby'           => $lb_order_by,
            'order'             => $lb_order
        );

        if (($key = array_search(0, $lb_specific)) !== false) {
        unset($lb_specific[$key]);
        }
        if(!empty($lb_specific)){
        $querys['post__in'] = $lb_specific;
        }
        

        $qp = new \WP_Query($querys);
        if($qp->have_posts()):
        ?>
            <aside class="footerWidget popularPostWidget">
                <?php if($widget_title != ''): ?>
                    <h3 class="widgetTitle"><?php echo wp_kses_post($widget_title); ?></h3>
                <?php endif; ?>
                <div class="popularPost">
                    <?php 
                        $i = 1;
                        while($qp->have_posts()):
                            $qp->the_post();
                    ?>
                        <div class="poSinglePost">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 85, 85); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <p><i class="themewar_clock"></i> <?php echo get_the_time('jS F, Y'); ?></p>
                            <?php if($post_title_length > 0): ?>
                                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo substr(wp_strip_all_tags(get_the_title()), 0, $post_title_length); ?></a></h4>
                            <?php endif; ?>
                            <a class="btnLink" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html($post_readM_lable, 'logisfare'); ?><i class="logisfare-arrow_next"></i></a>
                        </div>
                    <?php $i++; endwhile; ?>
                </div>
            </aside>
        <?php endif;
        wp_reset_postdata();
    }
    
    protected function content_template() {
        
    }
}