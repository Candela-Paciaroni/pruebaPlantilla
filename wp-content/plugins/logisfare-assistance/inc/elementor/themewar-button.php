<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Themewar_Button_Widget extends Widget_Base{
    
    public function get_name() {
        return 'themewar-button';
    }
    public function get_title() {
        return esc_html__( 'Logisfare Button', 'themewar' );
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label'     => esc_html__('Button Label', 'themewar')
        ]);      
                $this->add_control( 'btn_style', [
                            'label'   => esc_html__( 'Button Style', 'themewar' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                    '1'      => esc_html__( 'Style 01', 'themewar' ),
                                    '2'      => esc_html__( 'Style 02', 'themewar' ),
                            ]
                    ]
                );
                $this->add_control('btn_icons',[
                            'label' => esc_html__( 'Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => ' themewar_comments1',
                                'library' => 'tw_icon',
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'btn_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control('btn_label', [
                            'label'             => esc_html__('Button Label', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => true,
                            'default'           => esc_html__('Get Started Now', 'themewar'),
                    ]
                );
                $this->add_control( 'btn_icon_position', [
                            'label'   => esc_html__( 'Icon Position', 'themewar' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'in_right',
                            'options' => [
                                    'in_left'      => esc_html__( 'Left', 'themewar' ),
                                    'in_right'       => esc_html__( 'Right', 'themewar' )
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'btn_style',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ]
                    ]
                );
                $this->add_control( 'btn_url', [
                            'label'             => esc_html__( 'URL', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => false,
                                    'nofollow'       => false,
                            ],
                        ]
                );
                $this->add_responsive_control( 'btn_align', [
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
                            'prefix_class'              => 'logisfare_btn_align elementor%s-align-',
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

        
        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__('Button Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_1_typography',
                            'label' => esc_html__( 'Button Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logicBtn ',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                    $this->start_controls_tab('btn_1_button_style_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ), ]);
                        $this->add_responsive_control( 'btn_1_label_color', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                    'name' => 'btn_1_bg',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .logicBtn',
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                    'name' => 'btn_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .logicBtn ',
                            ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name'      => 'btn_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .logicBtn ',
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' ),] );
                        $this->add_responsive_control( 'btn_1_label_color_hr', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn:hover'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                    'name' => 'btn_1_bg_hover',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .logicBtn:hover',
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(), [
                                    'name' => 'btn_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .logicBtn:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name'      => 'btn_box_shadow_hover',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .logicBtn:hover',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('btn_1_width', [
                            'label' => esc_html__( 'Width', 'themewar' ),
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
                                '{{WRAPPER}} .logicBtn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => "before",
                    ]
                );
                $this->add_responsive_control('btn_1_height', [
                            'label' => esc_html__( 'Height', 'themewar' ),
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
                                    '{{WRAPPER}} .logicBtn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'btn_style',
                                'operator'  => '==',
                                'value'     => '2',
                        ]
                    ],
                ]
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_icon_typography',
                            'label' => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logicBtn i',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('icon_button_style_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                        $this->add_responsive_control( 'icon_label_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logicBtn i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                        $this->add_responsive_control( 'icon_label_hover_color', [
                                        'label'     => esc_html__( 'Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logicBtn:hover i'   => 'color: {{VALUE}}'
                                        ]
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();		
                $this->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control( 'btn_icon_padding', [
                            'label' => esc_html__( 'Icon Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px','%', 'em'],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'btn_icon_margin', [
                            'label' => esc_html__( 'Icon Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px','%', 'em'],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('SVG Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'btn_style',
                                'operator'  => '==',
                                'value'     => '2',
                        ]
                    ],
                ]
        ]);
                $this->start_controls_tabs('svg_style_tabs');
                    $this->start_controls_tab('svg_style_normal_tab',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                        $this->add_responsive_control( 'icon_box_svg_fill_nr',[
                                    'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn svg' => 'fill: {{VALUE}}',
                                    ]
                            ]
                        );
                        $this->add_responsive_control( 'icon_box_svg_stroke',[
                                    'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn svg' => 'stroke: {{VALUE}}',
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
                                            '{{WRAPPER}} .logicBtn svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .logicBtn svg' => 'width: {{SIZE}}{{UNIT}};',
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
                                                '{{WRAPPER}} .logicBtn svg' => 'height: {{SIZE}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('svg_style_hover_tab',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                        $this->add_responsive_control( 'icon_box_svg_fill_hr',[
                                    'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn:hover svg' => 'fill: {{VALUE}}',
                                    ]
                            ]
                        );
                        $this->add_responsive_control( 'icon_box_svg_stroke_hr',[
                                    'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logicBtn:hover svg' => 'stroke: {{VALUE}}',
                                    ]
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $btn_style      = (isset($settings['btn_style']) && $settings['btn_style'] > 0 ? $settings['btn_style'] : 1);
        $btn_label      = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : esc_html__('Get Started Now', 'themewar');
        $icons          = (isset($settings['btn_icons']) && $settings['btn_icons'] != '') ? $settings['btn_icons'] : 'themewar_comments1';
        
        $target         = isset($settings['btn_url']['is_external']) && !empty($settings['btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['btn_url']['nofollow']) && !empty($settings['btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : 'javascript:void(0);';
        
        $icon_position  = (isset($settings['btn_icon_position']) && $settings['btn_icon_position'] != '' ? $settings['btn_icon_position'] : 'in_right');
        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';$animAttr = '';

        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.' ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.' ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.' ' : '');
        }
        
        $attributs = '';
        if(isset($settings['btn_url']['custom_attributes']) && !empty($settings['btn_url']['custom_attributes'])):
            $custom_attributes = explode(',', $settings['btn_url']['custom_attributes']);
            foreach($custom_attributes as $cas):
                $attribut = explode('|', $cas);
                $attributs .= (isset($attribut[0]) && !empty($attribut[0]) ? $attribut[0] : '').(isset($attribut[1]) && !empty($attribut[1]) ? '='.$attribut[1].' ' : ' ');
            endforeach;
        endif;

        if($btn_style == 2): ?>
            <a class="logicBtn <?php echo $animClass; ?>" href="<?php echo esc_attr($btn_url); ?>" <?php echo esc_attr($attributs); echo esc_attr($animAttr); ?>>
                <?php if($icon_position == 'in_left'): 
                    \Elementor\Icons_Manager::render_icon( $settings['btn_icons'], [ 'aria-hidden' => 'true' ] );
                endif; ?> 
                <?php echo logisfare_kses($btn_label) ?>
                <?php if($icon_position == 'in_right'): 
                    \Elementor\Icons_Manager::render_icon( $settings['btn_icons'], [ 'aria-hidden' => 'true' ] );
                endif; ?> 
            </a>
        <?php else: ?>
            <a class="logicBtn <?php echo $animClass; ?>" href="<?php echo esc_attr($btn_url); ?>" <?php echo esc_attr($attributs); echo esc_attr($animAttr); ?>>
                <?php echo logisfare_kses($btn_label) ?>
            </a>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
            
}