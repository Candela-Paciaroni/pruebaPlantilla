<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Testimonial_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-testimonial';
    }
    public function get_title() {
        return esc_html__( 'Testimonial', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    protected function register_controls() {
        $this->start_controls_section( 'section_tab_1', [
                'label' => esc_html__( 'Testimonial', 'themewar' ),
        ]);
                $this->add_control( 'tst_view', [
                            'label' => esc_html__('Select View', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                1 => esc_html__('View 01', 'themewar'),
                                2 => esc_html__('View 02', 'themewar'),
                            ],
                    ]
                );
                $this->add_control( 'tst_style', [
                            'label' => esc_html__('Select Style', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                1 => esc_html__('Style 01', 'themewar'),
                                2 => esc_html__('Style 02', 'themewar'),
                            ],
                    ]
                );
                $this->add_control( 'tst_hd_sub_title', [
                                'label'         => esc_html__( 'Section Sub Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'label_block'   => true,
                                'default'       => esc_html__('Our Workers', 'themewar'),
                                'placeholder'   => esc_html__('Section Sub Title', 'themewar'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tst_view',
                                                'operator'  => '==',
                                                'value'     => 2,
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'tst_hd_title', [
                                'label'         => esc_html__( 'Section Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => '',
                                'label_block'   => true,
                                'default'       => esc_html__('What Customers Say', 'themewar'),
                                'placeholder'   => esc_html__('Section Title', 'themewar'),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'tst_view',
                                                'operator'  => '==',
                                                'value'     => 2,
                                        ],
                                    ],
                                ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'quote_image', [
                                    'label' => esc_html__( 'Quote Image', 'themewar' ),
                                    'label_block'   => TRUE,
                                    'type' => Controls_Manager::MEDIA,
                                    'default'       => [],
                            ]
                    );
                    $repeater->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                    $repeater->add_control( 'tst_quote_content', [
                                    'label'         => esc_html__( 'Content', 'themewar' ),
                                    'type'          => Controls_Manager::TEXTAREA,
                                    'label_block'   => true,
                                    'default'       => esc_html__('“According to the council of supply chain professionals the council of logistics management logistics is the process of planning, implementing and controlling procedures”'),
                                    'placeholder'   => esc_html__('Insert your testimony content.', 'themewar'),
                            ]
                    );
                    $repeater->add_control('hr2',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                    $repeater->add_control( 'tst_aut_logo', [
                                    'label'         => esc_html__( 'Author Logo/Image', 'themewar' ),
                                    'label_block'   => TRUE,
                                    'type' => Controls_Manager::MEDIA,
                                    'default'       => [],
                            ]
                    );
                    $repeater->add_control( 'tst_aut_title', [
                                    'label'         => esc_html__( 'Author Name', 'themewar' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => '',
                                    'label_block'   => true,
                                    'default'       => esc_html__('Andrew D. Smith', 'themewar'),
                                    'placeholder'   => esc_html__('Author Name', 'themewar')
                            ]
                    );
                    $repeater->add_control( 'tst_aut_desig', [
                                    'label'         => esc_html__( 'Author Designation', 'themewar' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => '',
                                    'label_block'   => true,
                                    'default'       => esc_html__('Manager', 'themewar'),
                                    'placeholder'   => esc_html__('Author Designation', 'themewar')
                            ]
                    );
                $this->add_control( 'testimony_list', [
                            'label'         => esc_html__( 'Testimonial Slider', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                    [
                                            'quote_image'           => array(),
                                            'tst_quote_content'     => esc_html__('“According to the council of supply chain professionals the council of logistics management logistics is the process of planning, implementing and controlling procedures”', 'themewar'),
                                            'tst_aut_logo'          => array(),
                                            'tst_aut_title'          => esc_html__('Andrew D. Smith', 'themewar'),
                                            'tst_aut_desig'          => esc_html__('Manager', 'themewar'),
                                    ],
                            ],
                            'title_field' => '{{{ tst_aut_title }}}',
                    ]
                );
                $this->add_control( 'tst_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                        ]
                );
                $this->add_control( 'tst_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                        ]
                );
                $this->add_control( 'tst_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'tst_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'items_xxl_col', [
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
                $this->add_control( 'items_xl_col', [
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
                $this->add_control( 'items_lg_col', [
                            'label'     => esc_html__( 'Select LG Col', 'themewar' ),
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
                $this->add_control( 'items_md_col', [
                            'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '2',
                            'options'   => [
                                    '1'       => esc_html__( '1 Column', 'themewar' ),
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_sm_col', [
                            'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '2',
                            'options'   => [
                                    '1'       => esc_html__( '1 Column', 'themewar' ),
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_gapping', [
                            'label' => esc_html__( 'Items Gapping', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                            'default' => 24,
                            'description'       => esc_html__('Insert items gapping if you want.', 'themewar'),
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_logisAnimation', [
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
        
        $this->start_controls_section( 'section_tab_subTitle', [
                'label'             => esc_html__('Service Subtitle', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tst_view',
                                'operator'  => 'in',
                                'value'     => ['2'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'testi_sec_subtitle_typo',
                        'label'     => esc_html__( 'Subtitle Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .subTitle'
                ]);
                $this->add_responsive_control( 'srv_sec_subtitle_color',[
                            'label'     => esc_html__( 'SubTitle Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'test_sec_subtitle_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'test_sec_subtitle_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_control('test_sec_subtitle_icon',[
                            'label' => esc_html__( 'SubTitle Icon', 'textdomain' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'test_sec_subtitle_i_typo',
                        'label'     => esc_html__( 'Subtitle Typography', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .subTitle i'
                ]);
                $this->add_responsive_control( 'test_sec_subtitle_i_color',[
                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'test_sec_subtitle_i_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'test_sec_subtitle_i_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section( 'section_tab_sec_Title', [
                'label'             => esc_html__('Service Section Title', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'tst_view',
                                'operator'  => 'in',
                                'value'     => ['2'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'test_sec_title_typo',
                        'label'     => esc_html__( 'Sectio Title Typo', 'themewar' ),
                        'selector'  => '{{WRAPPER}} .secTitle'
                ]);
                $this->add_responsive_control( 'srv_sec_title_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'color: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'test_sec_title_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'test_sec_title_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .secTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Testimonial Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'tstim_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .testimonialCarousel01 , {{WRAPPER}} .testimonialCarousel02',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'tstim_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .testimonialCarousel01, {{WRAPPER}} .testimonialCarousel02',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'tstim_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .testimonialCarousel01, {{WRAPPER}} .testimonialCarousel02',
                    ]
                );
                $this->add_responsive_control( 'tstim_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .testimonialCarousel01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonialCarousel02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tstim_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .testimonialCarousel01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialCarousel02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tstim_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .testimonialCarousel01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialCarousel02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'             => esc_html__('Testimonial Item Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
        ]);
                $this->start_controls_tabs( 'testimoniItemsTab' );
                    $this->start_controls_tab('testimoni_item_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ), ]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name'  => 'tst_item_bg',
                                        'label' => esc_html__( 'Item BG', 'themewar' ),
                                        'types' => [ 'classic' ],
                                        'selector' => '{{WRAPPER}} .tesItem01, {{WRAPPER}} .testimonialItem01',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'ts_item_shadow',
                                        'label' => esc_html__( 'Item Shadow', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .tesItem01, {{WRAPPER}} .testimonialItem01',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'ts_item_border',
                                        'label'     => esc_html__( 'Item Border', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .tesItem01, {{WRAPPER}} .testimonialItem01',
                                ]
                        );
                        $this->add_responsive_control( 'ts_item_radius', [
                                        'label' => esc_html__( 'Item Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .tesItem01'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialItem01'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('testimoni_item_hover', [ 'label' => esc_html__( 'Hover', 'themewar' ), ]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name'  => 'tst_item_bg_hover',
                                        'label' => esc_html__( 'Item BG', 'themewar' ),
                                        'types' => [ 'classic' ],
                                        'selector' => '{{WRAPPER}} .tesItem01:hover, {{WRAPPER}} .testimonialItem01:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'ts_item_shadow_hover',
                                        'label' => esc_html__( 'Item Shadow', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .tesItem01:hover, {{WRAPPER}} .testimonialItem01:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'ts_item_border_hover',
                                        'label'     => esc_html__( 'Item Border', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .tesItem01:hover, {{WRAPPER}} .testimonialItem01:hover',
                                ]
                        );
                        $this->add_responsive_control( 'ts_item_radius_hover', [
                                        'label' => esc_html__( 'Item Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .tesItem01:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialItem01:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ts_item_padding', [
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .tesItem01'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialItem01'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ts_item_margin', [
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .tesItem01'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialItem01'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_4', [
                'label'             => esc_html__('Item Content Styling', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'tst_content_heading_001', [
                        'label' => esc_html__( 'Quote Image Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'none',
                ]);
                    $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'tst_quote_img_shadow',
                                    'label' => esc_html__( 'Item Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .tesItem01 > img, {{WRAPPER}} .tsAuthorMeta > img',
                            ]
                    );
                    $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name'      => 'tst_quote_img__border',
                                    'label'     => esc_html__( 'Item Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesItem01 > img, {{WRAPPER}} .tsAuthorMeta > img',
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_img_radius', [
                                    'label' => esc_html__( 'Item Radius', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .tesItem01 > img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthorMeta > img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_max_width', [
                                    'label' => esc_html__( 'Quote Image Max-Width', 'themewar' ),
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
                                            '{{WRAPPER}} .tesItem01 > img' => 'max-width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .tsAuthorMeta > img' => 'max-width: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_with', [
                                    'label' => esc_html__( 'Quote Image Width', 'themewar' ),
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
                                            '{{WRAPPER}} .tesItem01 > img' => 'width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .tsAuthorMeta > img' => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_height', [
                                    'label' => esc_html__( 'Quote Image Height', 'themewar' ),
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
                                            '{{WRAPPER}} .tesItem01 >img' => 'height: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .tsAuthorMeta >img' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_icon_margin', [
                                    'label' => esc_html__( 'Quote Image Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesItem01 >img'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthorMeta >img'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_icon_padding', [
                                    'label' => esc_html__( 'Quote Image Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesItem01 >img'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthorMeta >img'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                $this->add_control( 'tst_content_heading_01', [
                        'label' => esc_html__( 'Quote Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_responsive_control( 'tst_quote_color', [
                                    'label' => esc_html__( 'Quote Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .tesItem01 p'  => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .testimonialItem01 p'  => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name'      => 'tst_quote_bdr',
                                    'label'     => esc_html__( 'Quote Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesItem01 p, {{WRAPPER}} .testimonialItem01 p',
                            ]
                    );
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                    'name'      => 'tst_quote_typo',
                                    'label'     => esc_html__( 'Quote Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesItem01 p, {{WRAPPER}} .testimonialItem01 p',
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_margin', [
                                    'label' => esc_html__( 'Quote Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesItem01 p'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialItem01 p'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_quote_padding', [
                                    'label' => esc_html__( 'Quote Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesItem01 p'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialItem01 p'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                $this->add_control( 'tst_content_heading_02', [
                        'label' => esc_html__( 'Author Name', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                    'name'      => 'tst_aname_typo',
                                    'label'     => esc_html__( 'Name Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesAuthor h4, {{WRAPPER}} .tsAuthor02 h4',
                            ]
                    );
                    $this->add_responsive_control( 'tst_aname_color', [
                                    'label' => esc_html__( 'Name Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .tesAuthor h4'  => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .tsAuthor02 h4'  => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_aname_margin', [
                                    'label' => esc_html__( 'Name Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor h4'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 h4'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_aname_padding', [
                                    'label' => esc_html__( 'Name Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor h4'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 h4'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_control( 'tst_content_heading_05', [
                            'label' => esc_html__( 'Author Designation', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                    'name'      => 'tst_auth_desig__typo',
                                    'label'     => esc_html__( 'Name Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesAuthor span, {{WRAPPER}} .tsAuthor02 span',
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_desig_color', [
                                    'label' => esc_html__( 'Name Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .tesAuthor span'  => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .tsAuthor02 span'  => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_desig_margin', [
                                    'label' => esc_html__( 'Name Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor span'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 span'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_desig_padding', [
                                    'label' => esc_html__( 'Name Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor span'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 span'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                $this->add_control( 'tst_content_heading_003', [
                        'label' => esc_html__( 'Quote Image Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'none',
                ]);
                    $this->add_group_control(\Elementor\Group_Control_Background::get_type(),[
                                    'name' => 'tst_auth_img_bg',
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .tesAuthor > img, {{WRAPPER}} .tsAuthor02 > img',
                            ]
                    );
                    $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'tst_auth_img_shadow',
                                    'label' => esc_html__( 'Image Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .tesAuthor > img, {{WRAPPER}} .tsAuthor02 > img',
                            ]
                    );
                    $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name'      => 'tst_auth_img_bdr',
                                    'label'     => esc_html__( 'Image Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .tesAuthor > img, {{WRAPPER}} .tsAuthor02 > img',
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_img_radius', [
                                    'label' => esc_html__( 'Image Radius', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .tesAuthor > img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 > img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_img_width', [
                                    'label' => esc_html__( 'Quote Image Width', 'themewar' ),
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
                                            '{{WRAPPER}} .tesAuthor > img' => 'width: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .tsAuthor02 > img' => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_img_height', [
                                    'label' => esc_html__( 'Image Height', 'themewar' ),
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
                                            '{{WRAPPER}} .tesAuthor >img' => 'height: {{SIZE}}{{UNIT}};',
                                            '{{WRAPPER}} .tsAuthor02 >img' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_img_margin', [
                                    'label' => esc_html__( 'Image Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor >img'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 >img'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'tst_auth_img_padding', [
                                    'label' => esc_html__( 'Image Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .tesAuthor >img'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .tsAuthor02 >img'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'tst_slide_nav',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testControls03 button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testControls button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testControls03 button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testControls button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button span, {{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button i, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button span, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button i, {{WRAPPER}} .testControls03 button i, {{WRAPPER}} .testControls button i'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testControls03 button i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testControls button i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button, {{WRAPPER}} .testControls03 button, {{WRAPPER}} .testControls button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button, {{WRAPPER}} .testControls03 button, {{WRAPPER}} .testControls button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button, {{WRAPPER}} .testControls03 button, {{WRAPPER}} .testControls button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button:hover span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button:hover span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testControls03 button:hover i' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testControls button:hover i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button:hover:after, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button:hover:after, {{WRAPPER}} .testControls03 button:hover:after, {{WRAPPER}} .testControls button:hover:after',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testControls03 button:hover, {{WRAPPER}} .testControls button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testControls03 button:hover, {{WRAPPER}} .testControls button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control('hr263', ['type' => \Elementor\Controls_Manager::DIVIDER,]);
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls03 button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls03 button.tprev3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls button.tprev01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls03 button.tnext3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testControls button.tnext01 ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'name'      => 'tst_slide_dots',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_nr_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_nr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span',
                                    ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control('dots_nr_inner_bd_ps', [
                                        'label' => esc_html__( 'Dots Inner Position', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'allowed_dimensions' => ['top', 'left'],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot span' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot:hover, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot:hover',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_hr_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot:hover span, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot:hover span',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_outer_border',
                                            'label' => esc_html__( 'Outer Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_outer_bd_radius', [
                                        'label' => esc_html__( 'Dots Outer Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'dot_outer_ac_padding', [
                                        'label' => esc_html__( 'Outer Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                                    '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'dots_ac_inner_border',
                                            'label' => esc_html__( 'Inner Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active span, {{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active span',
                                    ]
                            );
                            $this->add_responsive_control('dots_ac_inner_bd_radius', [
                                        'label' => esc_html__( 'Dots Inner Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel01.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel02.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        
        $tst_view           = (isset($settings['tst_view']) && $settings['tst_view'] > 0) ? $settings['tst_view'] : 1;
        $tst_style          = (isset($settings['tst_style']) && $settings['tst_style'] > 0) ? $settings['tst_style'] : 1;
        $tst_hd_title       = (isset($settings['tst_hd_title']) && $settings['tst_hd_title'] !=' ') ? $settings['tst_hd_title'] : '';
        $tst_hd_sub_title   = (isset($settings['tst_hd_sub_title']) && $settings['tst_hd_sub_title'] !=' ') ? $settings['tst_hd_sub_title'] : '';

        $testimony_list     = (isset($settings['testimony_list']) && !empty($settings['testimony_list'])) ? $settings['testimony_list'] : array();
        
        $autoplay           = (isset($settings['tst_slide_autoplay']) && $settings['tst_slide_autoplay'] != '' ? $settings['tst_slide_autoplay'] : 'no');
        $loop               = (isset($settings['tst_slide_loop']) && $settings['tst_slide_loop'] != '' ? $settings['tst_slide_loop'] : 'no');
        $nav                = (isset($settings['tst_slide_nav']) && $settings['tst_slide_nav'] != '' ? $settings['tst_slide_nav'] : 'no');
        $dots               = (isset($settings['tst_slide_dots']) && $settings['tst_slide_dots'] != '' ? $settings['tst_slide_dots'] : 'no');

        $items_xxl_col      = (isset($settings['items_xxl_col']) && $settings['items_xxl_col'] > 0 ? $settings['items_xxl_col'] : 3);
        $items_xl_col       = (isset($settings['items_xl_col']) && $settings['items_xl_col'] > 0 ? $settings['items_xl_col'] : 3);
        $items_lg_col       = (isset($settings['items_lg_col']) && $settings['items_lg_col'] > 0 ? $settings['items_lg_col'] : 3);
        $items_md_col       = (isset($settings['items_md_col']) && $settings['items_md_col'] > 0 ? $settings['items_md_col'] : 2);
        $items_sm_col       = (isset($settings['items_sm_col']) && $settings['items_sm_col'] > 0 ? $settings['items_sm_col'] : 2);
        $gapping            = (isset($settings['items_gapping']) && $settings['items_gapping'] != '' ? $settings['items_gapping'] : 24);

        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';

        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.' ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.' ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.' ' : '');
        }

        include dirname(__FILE__).'/style/testimonial/style1.php';
    }
        
    protected function content_template() {}
}