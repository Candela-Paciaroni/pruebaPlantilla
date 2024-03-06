<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Author_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-posts-author-box';
    }
    
    public function get_title() {
        return esc_html__( 'Post Author Box', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-user-circle-o';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Post Author Box', 'themewar' ),
        ]);      
                $this->add_control('is_custom_data', [
                            'label'             => esc_html__( 'Is Custom Data', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show custom data?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'author_image', [
                                'label' => esc_html__( 'Custom Image', 'themewar' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                                'description' => esc_html__('Image size should be 100x100px.', 'themewar'),
                                'conditions'    => [
                                        'terms' => [
                                                [
                                                        'name'      => 'is_custom_data',
                                                        'operator'  => '==',
                                                        'value'     => 'yes',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control('auther_name', [
                            'label'             => esc_html__('Custom Name', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                            'conditions'    => [
                                    'terms' => [
                                            [
                                                    'name'      => 'is_custom_data',
                                                    'operator'  => '==',
                                                    'value'     => 'yes',
                                            ]
                                    ],
                            ],
                        ]
                );   
                $this->add_control('auther_desc', [
                            'label'             => esc_html__('Custom Bio', 'themewar'),
                            'type'              => Controls_Manager::TEXTAREA,
                            'label_block'       => TRUE,
                            'default'           => '',
                            'conditions'    => [
                                    'terms' => [
                                            [
                                                    'name'      => 'is_custom_data',
                                                    'operator'  => '==',
                                                    'value'     => 'yes',
                                            ]
                                    ],
                            ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control('social_profile', [
                            'label' => esc_html__( 'Social Profile', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'Facebook',
                            'options' => [
                                'Facebook'  => esc_html__( 'Facebook', 'themewar' ),
                                'Twitter' => esc_html__( 'Twitter', 'themewar' ),
                                'LinkedIn' => esc_html__( 'LinkedIn', 'themewar' ),
                                'Pinterest' => esc_html__( 'Pinterest', 'themewar' ),
                                'Google-Plus' => esc_html__( 'Google Plus', 'themewar' ),
                                'Vimeo' => esc_html__( 'Vimeo', 'themewar' ),
                                'Dribbble' => esc_html__( 'Dribbble', 'themewar' ),
                                'Behance' => esc_html__( 'Behance', 'themewar' ),
                                'Instagram' => esc_html__( 'Instagram', 'themewar' ),
                                'Youtube' => esc_html__( 'Youtube', 'themewar' ),
                                'Tiktok' => esc_html__( 'Tiktok', 'themewar' ),
                            ],
                        ]
                    );
                    $repeater->add_control('social_url', [
                            'label' => esc_html__( 'Profile URL', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => ''
                        ]
                    );
                $this->add_control( 'social_profiles', [
                                'label'         => esc_html__( 'Social Profiles', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [],
                                'title_field' => '{{{ social_profile }}}',
                                'conditions'    => [
                                        'terms' => [
                                                [
                                                        'name'      => 'is_custom_data',
                                                        'operator'  => '==',
                                                        'value'     => 'yes',
                                                ]
                                        ],
                                ],
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
        

        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Author Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'author_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .postAuthorBox',
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                                'name' => 'author_border',
                                'label' => esc_html__( 'Wdiget Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .postAuthorBox',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name'      => 'author_box_shadow',
                                'label'     => esc_html__( 'Widget Shadow', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .postAuthorBox',
                        ]
                );
                $this->add_responsive_control('author_border_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .postAuthorBox ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_margin', [
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .postAuthorBox ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .postAuthorBox ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_author_title', [
                'label'         => esc_html__( 'Author Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'author_image_style', [
                            'label' => esc_html__( 'Author Image Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                ); 
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'author_icon_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postAuthorBox img',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'author_icon_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postAuthorBox img',
                    ]
                );
                $this->add_responsive_control('author_icon_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postAuthorBox img ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('author_image_width', [
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ]
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('author_image_height', [
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ]
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_image_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );


                $this->add_control( 'author_heading_heading_', [
                            'label' => esc_html__( 'Author Title Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'author_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postAuthorBox h3',
                    ]
                );
                $this->add_responsive_control( 'author_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postAuthorBox h3'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_title_color_hr', [
                                'label' => esc_html__( 'Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .postAuthorBox h3 a:hover'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'author_title_typo_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control( 'author_des', [
                        'label' => esc_html__( 'Description Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'author_desc_typo',
                                'label' => esc_html__( 'Desc Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .postAuthorBox p',
                        ]
                );
                $this->add_responsive_control( 'author_desc_color', [
                                'label' => esc_html__( 'Desc Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .postAuthorBox p'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'author_desc_typo_margin', [
                            'label' => esc_html__( 'Desc Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control( 'author_icon_tab', [
                        'label' => esc_html__( 'Social Icon Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'author_icon_typo',
                                'label' => esc_html__( 'Icon Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .postAuthorBox .authorSocial a',
                        ]
                );
                $this->start_controls_tabs('style_social_tabs');
                        $this->start_controls_tab('style_social_normal_tab',[
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'author_icon_color', [
                                            'label' => esc_html__( 'Icon Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .postAuthorBox .authorSocial a'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'social_icon_bg',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .authorSocial a',
                                    ]
                                );
                                $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'social_icon_bdr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .authorSocial a',
                                    ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'social_icon_shadow',
                                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .authorSocial a',
                                        ]
                                );
                        $this->end_controls_tab();

                        $this->start_controls_tab('style_social_hover_tab',[
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'author_icon_color_hr', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .postAuthorBox .authorSocial a:hover'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'social_icon_bg_hr',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .authorSocial a:hover:after, {{WRAPPER}} .authorSocial a:after',
                                    ]
                                );
                                $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'social_icon_bdr_hr',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .authorSocial a',
                                    ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'social_icon_shadow_hr',
                                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                                            'selector'  => '{{WRAPPER}} .authorSocial a:hover',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();

                $this->add_responsive_control('social_icon_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'separator' => 'before',
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .authorSocial a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control( 'author_icon_padding', [
                            'label' => esc_html__( 'Icon Item Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox .authorSocial a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_icon__singlemargin', [
                            'label' => esc_html__( 'Icon Item margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox .authorSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_icon_area_margin', [
                            'label' => esc_html__( 'Icon Area margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .postAuthorBox .authorSocial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        global $post;
        $postID                 = $post->ID;

        $is_custom_data         = (isset($settings['is_custom_data']) && !empty($settings['is_custom_data']) ? $settings['is_custom_data'] : 'no');
        $author_image           = (isset($settings['author_image']['id']) && $settings['author_image']['id'] > 0 ) ? $settings['author_image']['id'] : 0;
        $auther_name            = (isset($settings['auther_name']) && !empty($settings['auther_name']) ? $settings['auther_name'] : '');
        $auther_desc            = (isset($settings['auther_desc']) && !empty($settings['auther_desc']) ? $settings['auther_desc'] : '');
        $social_profiles        = (isset($settings['social_profiles']) && !empty($settings['social_profiles']) ? $settings['social_profiles'] : []);

            
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
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay. '' : '');
        }

        if($postID > 0 && (is_single() || is_page()) && $is_custom_data != 'yes'):
            $authrID = get_the_author_meta('ID');
            $author_image = get_the_author_meta('user_av_ID');
            $auther_name = get_the_author();
            $auther_desc = get_the_author_meta('description');
            $userSocialProfile = (!empty(get_the_author_meta('userSocialProfile')) ? maybe_unserialize(get_the_author_meta('userSocialProfile')) : []);
            $social_profiles = [];
            if(!empty($userSocialProfile)):
                $social_profile = (isset($userSocialProfile['social_profile']) && !empty($userSocialProfile['social_profile']) ? $userSocialProfile['social_profile'] : [0 => '']);
                $social_url = (isset($userSocialProfile['social_url']) && !empty($userSocialProfile['social_url']) ? $userSocialProfile['social_url'] : [0 => '']);
                foreach($social_profile as $key => $profile):
                    $url = (isset($social_url[$key]) && !empty($social_url[$key]) ? $social_url[$key] : '');
                    $social_profiles[] = [
                        'social_profile' => $profile, 
                        'social_url' => $url
                    ];
                endforeach;
            endif;
        endif; ?>
        <div class="postAuthorBox clearfix <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
            <?php if($author_image > 0): ?>
                <img src="<?php echo logisfare_attachment_url($author_image, 250, 266); ?>" alt="<?php echo esc_attr($auther_name); ?>">
            <?php endif; ?>
            <?php if(!empty($auther_name)): ?>
                <h3><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html($auther_name);?></a></h3>
            <?php endif; ?>
            <?php if(!empty($auther_desc)): ?>
                <p><?php echo esc_html($auther_desc);?></p>
            <?php endif;?>
            <?php if(!empty($social_profiles)): ?>
                <div class="authorSocial">
                    <?php 
                        foreach($social_profiles as $sp):
                            $social_profile = (isset($sp['social_profile']) && !empty($sp['social_profile']) ? $sp['social_profile'] : '');
                            $social_url = (isset($sp['social_url']) && !empty($sp['social_url']) ? $sp['social_url'] : 'javascript:void(0);');
                            switch($social_profile):
                                case('Facebook'):
                                    echo '<a class="fac" href="'.$social_url.'"><i class="themewar_facebook-f"></i></a>';
                                    break;
                                case('Twitter'):
                                    echo '<a class="twi" href="'.$social_url.'"><i class="themewar_twitter"></i></a>';
                                    break;
                                case('LinkedIn'):
                                    echo '<a class="lin" href="'.$social_url.'"><i class="themewar_linkedin-in"></i></a>';
                                    break;
                                case('Pinterest'):
                                    echo '<a class="pin" href="'.$social_url.'"><i class="themewar_pinterest-p"></i></a>';
                                    break;
                                case('Google-Plus'):
                                    echo '<a class="gplus" href="'.$social_url.'"><i class="themewar_google-plus-g"></i></a>';
                                    break;
                                case('Vimeo'):
                                    echo '<a class="vim" href="'.$social_url.'"><i class="themewar_vimeo-v"></i></a>';
                                    break;
                                case('Dribbble'):
                                    echo '<a class="dri" href="'.$social_url.'"><i class="themewar_dribbble"></i></a>';
                                    break;
                                case('Behance'):
                                    echo '<a class="beh" href="'.$social_url.'"><i class="themewar_behance"></i></a>';
                                    break;
                                case('Instagram'):
                                    echo '<a class="ins" href="'.$social_url.'"><i class="themewar_instagram"></i></a>';
                                    break;
                                case('Youtube'):
                                    echo '<a class="you" href="'.$social_url.'"><i class="themewar_youtube"></i></a>';
                                    break;
                                case('Tiktok'):
                                    echo '<a class="tik" href="'.$social_url.'"><i class="themewar_tiktok"></i></a>';
                                    break;
                            endswitch;
                        endforeach;
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {
        
    }
}