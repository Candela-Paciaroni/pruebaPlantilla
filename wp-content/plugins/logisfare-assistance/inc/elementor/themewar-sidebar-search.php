<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Search_Widgets extends Widget_Base {

    public function get_name() {
        return 'themewar-text';
    }

    public function get_title() {
        return esc_html__( 'Search Widget', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-search';
    }

    public function get_categories() {
        return [ 'themewar-sidebar-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Editor Content', 'themewar'),
        ]);
                $this->add_control('widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
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


        $this->start_controls_section( 'section_tab_01', [
                'label'         => esc_html__( 'Widget Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_item_bg',
                                'label' => esc_html__( 'Widget Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .search_widget',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_item_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .search_widget',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_item_shadow',
                                'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .search_widget',
                        ]
                );
                $this->add_responsive_control( 'lb_item_readius', [
                                'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .search_widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .search_widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .search_widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'selector' => '{{WRAPPER}} .search_widget h3',
                        ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .search_widget h3'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .search_widget h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_222', [
                'label'	 => esc_html__( 'Search/Button Style', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
        ]);          
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                    'name' => 'search_text_typo',
                                    'label' => esc_html__( 'Search Typo', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .search_widget .searchForm input[type="search"]',
                            ]
                    );
                    $this->add_responsive_control( 'search_text_color', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .search_widget .searchForm input[type="search"]'   => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .search_widget .searchForm input[type="search"]::placeholder'   => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control(Group_Control_Border::get_type(), [
                                    'name' => 'search_field_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .search_widget .searchForm input[type="search"]',
                            ]
                    );
                    $this->add_responsive_control( 'search_field_readius', [
                                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                    'type'       => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .search_widget .searchForm input[type="search"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'input_field_bg', [
                                    'label' => esc_html__( 'Field BG Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .search_widget .searchForm input[type="search"]'   => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'search_field_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .search_widget .searchForm input[type="search"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'search_field_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .search_widget .searchForm input[type="search"]' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                    );
                   

                    $this->add_control( 'search_btn_01', [
                            'label' => esc_html__( 'Search Btn Style', 'textdomain' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]);
                            $this->add_group_control( Group_Control_Typography::get_type(), [
                                            'name' => 'search_btn_typo',
                                            'label' => esc_html__( 'Search Btn Typo', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .search_widget .searchForm button[type="submit"] i',
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_color', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .search_widget .searchForm button[type="submit"]'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_hover_color', [
                                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .search_widget .form-group button[type="submit"]:hover i'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_bg', [
                                            'label' => esc_html__( 'BG Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .search_widget .searchForm button[type="submit"]'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_hover_bg', [
                                            'label' => esc_html__( 'Hover BG Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .search_widget button[type="submit"]:hover'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'search_btn_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .search_widget button[type="submit"]',
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_readius', [
                                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                            'type'       => Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', '%', 'em' ],
                                            'selectors'  => [
                                                '{{WRAPPER}} .search_widget button[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'search_btn_margin', [
                                        'label' => esc_html__( 'Margin', 'themewar' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .search_widget button[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'search_btn_padding', [
                                        'label' => esc_html__( 'Padding', 'themewar' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .search_widget button[type="submit"]' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );

        $this->end_controls_section();
                
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
       
        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
        }



        ?>
        
        <aside class="widget search_widget <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <?php get_search_form(); ?>
        </aside>
        <?php
    }

    protected function content_template() {

    }
}

