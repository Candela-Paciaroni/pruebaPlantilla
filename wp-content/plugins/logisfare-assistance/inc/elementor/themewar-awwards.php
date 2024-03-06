<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Awwards_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-awwards';
    }
    
    public function get_title() {
        return esc_html__( 'Awwards', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-sitemap';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Awwards', 'themewar' ),
        ]);
                $this->add_control( 'aww_netw_name', [
                            'label'             => esc_html__( 'Social Network Name', 'themewar' ),
                            'type'              => Controls_Manager::TEXT,
                            'default'           => esc_html__( 'Behance Awward', 'themewar' ),
                            'label_block'       => true,
                    ]
                );
                $this->add_control( 'aww_netw_logo', [
                            'label'         => esc_html__( 'Social Network Logo', 'themewar' ),
                            'label_block'   => TRUE,
                            'type'          => Controls_Manager::MEDIA,
                            'default'       => [],
                    ]
                );
                $this->add_control( 'aww_netw_aww_date', [
                            'label'             => esc_html__( 'Awwards Date', 'themewar' ),
                            'type'              => Controls_Manager::TEXT,
                            'default'           => esc_html__( '2012- 2013', 'themewar' ),
                            'label_block'       => true,
                    ]
                );
                $this->add_control( 'aww_netw_aww_title', [
                            'label'             => esc_html__( 'Awwards Title', 'themewar' ),
                            'type'              => Controls_Manager::TEXT,
                            'default'           => esc_html__( 'YEAR BEST INTERECTIVE AWWARD', 'themewar' ),
                            'label_block'       => true,
                    ]
                );
                $this->add_control( 'aww_netw_aww_desc', [
                            'label'             => esc_html__( 'Awwards Description', 'themewar' ),
                            'type'              => Controls_Manager::TEXTAREA,
                            'placeholder'           => esc_html__( 'Type your awwards description.', 'themewar' ),
                            'label_block'       => true,
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

        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Awwards Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .awwardsContent',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .awwardsContent',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .awwardsContent',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .awwardsContent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardsContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardsContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3', [
                'label'         => esc_html__('Social Network Name', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'aww_netw_name_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .awwardTitle h3',
                    ]
                );
                $this->add_responsive_control( 'aww_netw_name_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .awwardTitle h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'aww_netw_name_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardTitle h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'aww_netw_name_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardTitle h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('Social Network Logo', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control('aww_netw_logo_w',[
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 35,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .awwardCompany img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('aww_netw_logo_h',[
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 35,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .awwardCompany img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'aww_netw_logo_mr', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .awwardCompany' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'aww_netw_logo_pd', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .awwardCompany' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('Awwards Date & Title', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);     
                $this->add_control('aww_netw_date',[
                        'label' => esc_html__( 'Awwards Date', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'aww_netw_date_typo',
                                'label' => esc_html__( 'Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .awwardedTime h4',
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_date_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .awwardedTime h4' => 'color: {{VALUE}}',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_date_mr', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .awwardedTime h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_date_pd', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .awwardedTime h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                    );
                $this->add_control('aww_netw_title',[
                        'label' => esc_html__( 'Awwards Title', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                    $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'aww_netw_title_typo',
                                'label' => esc_html__( 'Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .awwardedTime h2',
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_title_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .awwardedTime h2' => 'color: {{VALUE}}',
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_title_mr', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .awwardedTime h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                    );
                    $this->add_responsive_control( 'aww_netw_title_pd', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .awwardedTime h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                    );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_6', [
                'label'         => esc_html__('Awwards Description', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'aww_netw_desc_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .awwardedDesc p',
                    ]
                );
                $this->add_responsive_control( 'aww_netw_desc_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .awwardedDesc p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'aww_netw_desc_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardedDesc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'aww_netw_desc_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .awwardedDesc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings            = $this->get_settings_for_display();

        $aww_netw_name       = (isset($settings['aww_netw_name']) && $settings['aww_netw_name'] != '' ? $settings['aww_netw_name'] : '');
        $aww_netw_logo       = (isset($settings['aww_netw_logo']['url']) && $settings['aww_netw_logo']['url'] != '' ? $settings['aww_netw_logo']['url'] : '');
        $aww_netw_aww_date   = (isset($settings['aww_netw_aww_date']) && $settings['aww_netw_aww_date'] != '' ? $settings['aww_netw_aww_date'] : '');
        $aww_netw_aww_title  = (isset($settings['aww_netw_aww_title']) && $settings['aww_netw_aww_title'] != '' ? $settings['aww_netw_aww_title'] : '');
        $aww_netw_aww_desc   = (isset($settings['aww_netw_aww_desc']) && $settings['aww_netw_aww_desc'] != '' ? $settings['aww_netw_aww_desc'] : '');
        
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


        if(!empty($aww_netw_name) && !empty($aww_netw_logo) && !empty($aww_netw_aww_date) && !empty($aww_netw_aww_title) &&  !empty($aww_netw_aww_desc)):
        ?>
        <div class="awwardsContent <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <div class="awwardTitle">
                <h3><?php echo esc_html($aww_netw_name); ?></h3>
            </div>
            <div class="awwardCompany">
                <img src="<?php echo esc_url($aww_netw_logo)?>" alt="<?php echo get_bloginfo('name'); ?>">
            </div>
            <div class="awwardedTime">
                <h4><?php echo esc_html($aww_netw_aww_date); ?></h4>
                <h2><?php echo logisfare_kses($aww_netw_aww_title)?></h2>
            </div>
            <div class="awwardedDesc">
                <p><?php echo logisfare_kses($aww_netw_aww_desc); ?></p>
            </div>
        </div>
        <?php endif;
        
    }
    
    protected function content_template() {}
}