<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Funfact_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-fun-facts';
    }
    
    public function get_title() {
        return esc_html__( 'Fun Fact', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Fun Fact', 'themewar' ),
        ]);
                $this->add_control( 'ff_style', [
                                'label' => esc_html__('Select Style', 'themewar'),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 1,
                                'options' => [
                                    1 => esc_html__('Style 01', 'themewar'),
                                    2 => esc_html__('Style 02', 'themewar'),
                                    3 => esc_html__('Style 03', 'themewar'),
                                    4 => esc_html__('Style 04', 'themewar'),
                                ],
                        ]
                );
                $this->add_control( 'ff_number', [
                        'label'         => esc_html__( 'Fact Amount', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => esc_html__('12', 'themewar')
                ]);
                $this->add_control( 'ff_suffix', [
                        'label'         => esc_html__( 'Number Suffix', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'description'   => esc_html__( 'Insert suffix for fact.', 'themewar' ),
                        'default'       => '',
                ]);
                $this->add_control( 'ff_title', [
                                'label'         => esc_html__( 'Fact Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'label_block'   => TRUE,
                                'default'       => esc_html__('Worldwide Customers', 'themewar'),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'ff_style',
                                                'operator'  => '!in',
                                                'value'     => ['4'],
                                        ]
                                    ],
                                ]
                        ]
                );
                $this->add_control('ff_icon', [
                            'label'         => esc_html__( 'Fact Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-delivary_goods',
                                'library' => 'tw_icon',
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'ff_style',
                                            'operator'  => 'in',
                                            'value'     => ['2','3'],
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_responsive_control( 'ff_align', [
                                'label'                     => esc_html__( 'Alignment', 'themewar' ),
                                'type'                      => Controls_Manager::CHOOSE,
                                'options'                   => [
                                        'left'       => [
                                                'title'  => esc_html__( 'Left', 'themewar' ),
                                                'icon'   => 'eicon-text-align-left',
                                        ],
                                        'center'     => [
                                                'title'  => esc_html__( 'Center', 'themewar' ),
                                                'icon'   => 'eicon-text-align-center',
                                        ],
                                        'right'      => [
                                                'title'  => esc_html__( 'Right', 'themewar' ),
                                                'icon'   => 'eicon-text-align-right',
                                        ]
                                ],
                                'default'                   => 'left',
                                'prefix_class'              => 'logisfareFactAlign-',
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_logisAnimation', [
                'label' => esc_html__( 'LogisFare Animation', 'themewar' ),
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

        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__('Box Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'ff_style',
                                'operator'  => '!in',
                                'value'     => ['4'],
                        ]
                    ],
                ]
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'ff_box_bg_color',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .fanItem01, {{WRAPPER}} .featureBox, {{WRAPPER}} .iconBox03.countfact',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'ff_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .fanItem01, {{WRAPPER}} .featureBox1, {{WRAPPER}} .iconBox03.countfact',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'ff_box_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .fanItem01, {{WRAPPER}} .featureBox, {{WRAPPER}} .iconBox03.countfact',
                        ]
                );
                
                $this->add_control('ff_box_position',[
                            'label'     => esc_html__( 'Box Position', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 'relative',
                            'options'   => [
                                    'static'        => esc_html__( 'static', 'themewar' ),
                                    'relative'      => esc_html__( 'relative', 'themewar' ),
                                    'absolute'      => esc_html__( 'absolute', 'themewar' ),
                            ],
                            
                    ]
                );
                $this->add_responsive_control('ff_box_width',[
                        'label' => esc_html__( 'Box Width', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .featureBox' => 'max-width: {{SIZE}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'ff_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ]
                    ]
                );
                $this->add_responsive_control('ff_box_height',[
                        'label' => esc_html__( 'Box Height', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .featureBox' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'ff_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ]
                    ]
                );
                $this->add_responsive_control( 'ff_box_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .fanItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_box_mr', [
                                'label' => esc_html__( 'margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .fanItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .featureBox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03.countfact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_box_pd', [
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .fanItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .featureBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03.countfact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Count Number Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_num_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .fanItem01 h2, {{WRAPPER}} .featureBox h3, {{WRAPPER}} .iconBox03.countfact h3, {{WRAPPER}} .aboutCountItem.countfact h2',
                        ]
                );
                $this->add_responsive_control('ff_num_color', [
                                'label'      => esc_html__( 'Color', 'themewar' ),
                                'type'       => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .fanItem01 h2' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .featureBox h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .iconBox03.countfact h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .aboutCountItem.countfact h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_num_margin', [
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .fanItem01 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .featureBox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .iconBox03.countfact h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .aboutCountItem.countfact h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('ff_num_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .fanItem01 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureBox h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutCountItem.countfact h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'heading_un_one', [
                        'label'     => esc_html__( 'Number Suffix Style', 'themewar' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'heading1_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .counterSuffix',
                        ]
                );
                $this->add_responsive_control('heading1_color', [
                                'label'      => esc_html__( 'Suffix Color', 'themewar' ),
                                'type'       => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .counterSuffix' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_sufix_position', [
                            'label' => esc_html__( 'Suffix Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['top'],
                            'selectors' => [
                                    '{{WRAPPER}} .counterSuffix' => 'top: {{TOP}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'mt_margin', [
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['left', 'right'],
                                'selectors' => [
                                        '{{WRAPPER}} .counterSuffix' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('Fact Title Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'ff_style',
                                'operator'  => '!in',
                                'value'     => ['4'],
                        ]
                    ],
                ]
        ]); 
                $this->add_control( 'ff_title_color', [
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .fanItem01 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .featureBox h4' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03.countfact p' => 'color: {{VALUE}}',
                                ],
                        ]
                );    
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_title_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .fanItem01 p, {{WRAPPER}} .featureBox h4, {{WRAPPER}} .iconBox03.countfact p',
                        ]
                );
                $this->add_control( 'ff_title_margin', [
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .fanItem01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureBox h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('Fact Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'ff_style',
                                'operator'  => 'in',
                                'value'     => ['2','3'],
                        ]
                    ],
                ]
        ]);  
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_icon_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .featureBox i, {{WRAPPER}} .iconBox03.countfact i',
                        ]
                );
                $this->add_control( 'ff_icon_color', [
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .featureBox i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .iconBox03.countfact i' => 'color: {{VALUE}}',
                                ],
                        ]
                );   
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'icon_box_i_box_bgcolor',
                                'label' => esc_html__( 'Icon Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .iconBox03.countfact span',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'ff_style',
                                                'operator'  => 'in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'ff_icon_margin', [
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .featureBox i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_img',[
                'label'         => esc_html__('SVG Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'ff_style',
                                'operator'  => 'in',
                                'value'     => ['2','3'],
                        ]
                    ],
                ]
        ]);     
            $this->add_responsive_control( 'icon_box_svg_fill_nr',[
                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .featureBox span svg' => 'fill: {{VALUE}}',
                                '{{WRAPPER}} .iconBox03.countfact span svg' => 'fill: {{VALUE}}',
                        ]
                ]
            );
            $this->add_responsive_control( 'icon_box_svg_stroke',[
                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .featureBox span svg' => 'stroke: {{VALUE}}',
                                '{{WRAPPER}} .iconBox03.countfact span svg' => 'stroke: {{VALUE}}',
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
                                '{{WRAPPER}} .featureBox span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox03.countfact span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .featureBox span svg' => 'width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact span svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                    '{{WRAPPER}} .featureBox span svg' => 'height: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .iconBox03.countfact span svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'icon_box_svg_bgcolor',
                            'label' => esc_html__( 'SVG Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .featureBox span, {{WRAPPER}} .iconBox03.countfact span',
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'ff_style',
                                            'operator'  => 'in',
                                            'value'     => ['3'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_responsive_control('icon_box_svg_margin', [
                        'label' => esc_html__( 'Margin', 'themewar' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .featureBox span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .iconBox03.countfact span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                ]
            );
    $this->end_controls_section();
    

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        
        $ff_style           = (isset($settings['ff_style']) && $settings['ff_style'] > 0) ? $settings['ff_style'] : 1;
        $ff_number          = (isset($settings['ff_number']) && $settings['ff_number'] != '') ? $settings['ff_number'] : 12;
        $ff_suffix          = (isset($settings['ff_suffix']) && $settings['ff_suffix'] != '') ? $settings['ff_suffix'] : '';
        $ff_title           = (isset($settings['ff_title']) && $settings['ff_title'] != '') ? $settings['ff_title'] : esc_html__('Worldwide Branches', 'themewar');
        $ff_icon            = (isset($settings['ff_icon']) && $settings['ff_icon'] != '') ? $settings['ff_icon'] : '';
        $ff_box_position    = (isset($settings['ff_box_position']) && $settings['ff_box_position'] !='') ? $settings['ff_box_position'] : 'relative';

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.' ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.'' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.'' : '');
        }
        

        if($ff_style == 4): 
        ?>
        <div class="aboutCountItem countfact <?php echo esc_attr($animClass); ?>" data-count="<?php echo esc_attr($ff_number) ?>" <?php echo esc_attr($animAttr); ?>>
            <?php if(!empty($ff_number)): ?>
                <h2>
                    <span class="counter"><?php echo esc_html($ff_number); ?></span>
                    <?php if(!empty($ff_suffix)) : ?>
                        <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>
        </div>  

        <?php elseif($ff_style == 3): ?>
            <div class="iconBox03 ibsm countfact <?php echo esc_attr($animClass); ?>" data-count="<?php echo esc_attr($ff_number) ?>" <?php echo esc_attr($animAttr); ?>>
                <?php if(!empty($ff_number)): ?>
                    <h3>
                        <a class="counter"><?php echo esc_html($ff_number); ?></a>
                        <?php if(!empty($ff_suffix)) : ?>
                            <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                        <?php endif; ?>
                    </h3>
                <?php endif; ?>
                <?php if (!empty($ff_icon)): ?>
                    <span> <?php \Elementor\Icons_Manager::render_icon( $settings['ff_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                <?php endif; ?>
                <p><?php echo logisfare_kses($ff_title); ?></p>
            </div>

        <?php elseif($ff_style == 2): ?>
            <div class="featureBox  <?php echo esc_attr($animClass); ?>" style="position: <?php echo esc_attr($ff_box_position); ?>" <?php echo esc_attr($animAttr); ?>>
                <?php if (!empty($ff_icon)): ?>
                    <span>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['ff_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                <?php endif; ?>
                <div class="countfact" data-count="<?php echo esc_attr($ff_number) ?>">
                <?php if(!empty($ff_number)): ?>
                    <h3>
                        <span class="counter"><?php echo esc_html($ff_number); ?></span>
                        <?php if(!empty($ff_suffix)) : ?>
                            <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                        <?php endif; ?>
                    </h3>
                <?php endif; ?>
                </div>
                <?php if(!empty($ff_title)): ?>
                    <h4><?php echo logisfare_kses($ff_title); ?></h4>
                <?php endif; ?> 
            </div>

        <?php else: ?>
            <div class="fanItem01 countfact  <?php echo esc_attr($animClass); ?>" data-count="<?php echo esc_attr($ff_number) ?>" <?php echo esc_attr($animAttr); ?>>
            <?php if(!empty($ff_number)): ?>
                <h2>
                    <span class="counter"><?php echo esc_html($ff_number); ?></span>
                    <?php if(!empty($ff_suffix)) : ?>
                        <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                    <?php endif; ?> 
                </h2>
            <?php endif; ?>
            <?php if(!empty($ff_title)): ?>
                <p><?php echo logisfare_kses($ff_title); ?></p>
            <?php endif; ?>
            </div>
        <?php endif;
        ?>
    <?php
    }
    
    protected function content_template() {}
}