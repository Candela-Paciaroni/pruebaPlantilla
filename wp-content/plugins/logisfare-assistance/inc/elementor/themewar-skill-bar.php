<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Skill_Bar_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-progress-bar';
    }
    
    public function get_title() {
        return esc_html__( 'Progress Bar', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Progress Bar', 'themewar' ),
        ]); 
                $repeater = new \Elementor\Repeater();
                $repeater->add_control( 'sk_title', [
                            'label'         => esc_html__( 'Bar Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => TRUE,
                            'default'       => esc_html__('AIR FREIGHt', 'themewar')
                    ]
                );
                $repeater->add_control( 'sk_percent', [
                            'label'         => esc_html__( 'Progress Percent', 'themewar' ),
                            'type'          => Controls_Manager::NUMBER,
                            'min'           => 0,
                            'max'           => 100,
                            'step'          => 1,
                            'default'       => 86,
                    ]
                );
                $this->add_control('sk_list',[
                            'label'         => esc_html__( 'ProgressBar Items', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                [
                                    'sk_title'      => 'AIR FREIGHT',
                                    'sk_percent'    => 86,
                                ],
                            ],
                            'title_field' => '{{{ sk_title }}}',
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
                'label'         => esc_html__('Skill Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'sk_area_margin', [
                        'label'      => esc_html__( 'Margin', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .logicSkillBar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]);
                $this->add_control( 'sk_area_padding', [
                        'label'      => esc_html__( 'Padding', 'themewar' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .logicSkillBar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]);
        $this->end_controls_section();

        
        $this->start_controls_section( 'section_tab_3',[
                'label'     => esc_html__('Title and Number Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'sk_title_color',[
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singleSkill h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'sk_title_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .singleSkill h3',
                        ]
                );
                $this->add_control( 'sk_title_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .singleSkill h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'count_precent_style', [
                        'label'     => esc_html__( 'Percent Number Style', 'themewar' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_control( 'percent_color',[
                                    'label'     => esc_html__( 'Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .singleSkill span' => 'color: {{VALUE}}',
                                    ],
                            ]
                  );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'percent_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .singleSkill span',
                        ]
                );
                $this->add_control( 'percent_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .singleSkill span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('Skill Bar Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_control( 'height', [
                            'label' => __( 'Bar Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 80,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .skillWrap' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name'      => 'bar_bg_Color',
                                'label'     => esc_html__( 'Background', 'themewar' ),
                                'types'     => [ 'classic', 'gradient'],
                                'selector'  => '{{WRAPPER}} .skillWrap',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'sk_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .skillWrap',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'sk_box_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .skillWrap',
                    ]
                );
                $this->add_responsive_control( 'sk_box_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .skillWrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('active_bar_hd', [
                            'label' => esc_html__( 'Active Bar', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_control( 'active_bar_height', [
                            'label' => __( 'Bar Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 80,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .skill' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name'      => 'active_bar_bg',
                                'label'     => esc_html__( 'Background', 'themewar' ),
                                'types'     => [ 'classic', 'gradient'],
                                'selector'  => '{{WRAPPER}} .skill',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'active_bar_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .skill',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'active_bar_bdr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .skill',
                        ]
                );
                $this->add_responsive_control( 'active_bar_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .skill' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'active_bar_position', [
                            'label' => esc_html__( 'Suffix Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['bottom'],
                            'selectors' => [
                                    '{{WRAPPER}} .skill' => 'bottom: {{BOTTOM}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $sk_list           = (isset($settings['sk_list']) && !empty($settings['sk_list']) ? $settings['sk_list'] : array()); 

            
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

        if(count($sk_list) > 0): 
        ?>
        <div class="logicSkillBar <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
            <?php
                foreach ($sk_list as $item):
                    $sk_title       = (isset($item['sk_title']) && $item['sk_title'] !='') ? $item['sk_title'] : esc_html__('AIR FREIGHt', 'themewar');
                    $sk_percent     = (isset($item['sk_percent']) && $item['sk_percent'] !='') ? $item['sk_percent'] : 86;
            ?>
            <div class="singleSkill" data-skill="<?php echo $sk_percent; ?>">
                <h3><?php echo esc_html($sk_title); ?></h3>
                <span><?php echo $sk_percent; ?>%</span>
                <div class="skillWrap">
                    <div class="skill" style="width: <?php echo esc_attr($sk_percent); ?>;"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif;
    }
    
    protected function content_template() {

    }
}