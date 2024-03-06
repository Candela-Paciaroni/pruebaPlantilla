<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Fof_Content_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-fof-mail';
    }

    public function get_title() {
        return esc_html__('404 Content', 'themewar');
    }

    public function get_icon() {
        return 'eicon-error-404';
    }

    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( '404 Info', 'themewar' ),
        ]);
                $this->add_control( 'fof_title', [
                            'label'         => esc_html__( 'Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("404 title here...", 'themewar'),
                            'default'   => esc_html__("404", 'themewar'),
                    ]
                );
                $this->add_control( 'is_subtitle',[
                            'label' => esc_html__( 'Show SubTitle', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Show', 'themewar' ),
                            'label_off' => esc_html__( 'Hide', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                    ]
                );
                $this->add_control( 'fof_subtitle', [
                            'label'         => esc_html__( 'Sub Title', 'themewar' ),
                            'type'          => Controls_Manager::TEXTAREA,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("404 sub title here...", 'themewar'),
                            'default'   => esc_html__("The Link You Followed Probably Broken, or the page has been removed...", 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'is_subtitle',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'is_btn',[
                            'label' => esc_html__( 'Show Button', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Show', 'themewar' ),
                            'label_off' => esc_html__( 'Hide', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                    ]
                );
                $this->add_control( 'fof_btn', [
                            'label'             => esc_html__( 'Button Lable', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'default'   => esc_html__("Back to home", 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'is_btn',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control('fof_aligment',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'center',
                            'toggle' => true,
                            'selectors' => [
                                '{{WRAPPER}} .foferrorContent ' => 'text-align: {{VALUE}};',
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
                'label'         => esc_html__( '404 Content Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'fof_content_area_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .foferrorContent',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fof_content_area_border',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .foferrorContent',
                    ]
                );
                $this->add_responsive_control('fof_content_area_mr', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .foferrorContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fof_content_area_pd', [
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .foferrorContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'fof_title_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .foferrorContent h2',
                    ]
                );
                $this->add_responsive_control('fof_title_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .foferrorContent h2' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Background::get_type(),[
                        'name' => 'text_background_img',
                        'types' => [ 'classic',],
                        'selector' => '{{WRAPPER}} .foferrorContent h2',
                    ]
                );
                $this->add_responsive_control( 'fof_title_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .foferrorContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('fof_title_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .foferrorContent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Sub Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'is_subtitle',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'fof_sub_title_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .foferrorContent p',
                    ]
                );
                $this->add_responsive_control('fof_sub_title_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .foferrorContent p' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'fof_sub_title_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .foferrorContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('fof_sub_title_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .foferrorContent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__( 'Button Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'is_btn',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'fof_btn_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .logicBtn ',
                    ]
                );
                $this->start_controls_tabs('fof_btn_tabs');
                        $this->start_controls_tab('btn_normarl_style',[
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]);
                                $this->add_responsive_control('fof_btn_color_nr', [
                                            'label'		 => esc_html__( 'Color', 'themewar' ),
                                            'type'		 => Controls_Manager::COLOR,
                                            'selectors'	 => [
                                                '{{WRAPPER}} .logicBtn' => 'color: {{VALUE}};'
                                            ],
                                    ]
                                );
                                $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'btn_background_nr',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .logicBtn',
                                    ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('btn_hover_style',[
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]);
                                $this->add_responsive_control('fof_btn_color_hr', [
                                            'label'		 => esc_html__( 'Color', 'themewar' ),
                                            'type'		 => Controls_Manager::COLOR,
                                            'selectors'	 => [
                                                '{{WRAPPER}} .logicBtn:hover' => 'color: {{VALUE}};'
                                            ],
                                    ]
                                );
                                $this->add_group_control(Group_Control_Background::get_type(),[
                                            'name' => 'btn_background_hr',
                                            'types' => [ 'classic', 'gradient' ],
                                            'selector' => '{{WRAPPER}} .logicBtn',
                                    ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fof_btn_border',
                            'label' => esc_html__( 'Box Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logicBtn',
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'fof_btn_boxshadow',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .logicBtn',
                    ]
                );
                $this->add_responsive_control( 'fof_btn_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('fof_btn_width',[
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('fof_btn_height',[
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logicBtn' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fof_btn_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .logicBtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('fof_btn_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .logicBtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $fof_title              = (isset($settings['fof_title']) && ($settings['fof_title']) != '') ? $settings['fof_title'] : '';
        $is_subtitle            = (isset($settings['is_subtitle']) && ($settings['is_subtitle']) != '') ? $settings['is_subtitle'] : 'no';
        $fof_subtitle           = (isset($settings['fof_subtitle']) && ($settings['fof_subtitle']) != '') ? $settings['fof_subtitle'] : '';
        $is_btn                 = (isset($settings['is_btn']) && ($settings['is_btn']) != '') ? $settings['is_btn'] : 'no';
        $fof_btn_label          = (isset($settings['fof_btn']) && ($settings['fof_btn']) != '') ? $settings['fof_btn'] : '';
        
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
        <div class="foferrorContent <?php echo $animClass;?>" <?php echo $animAttr; ?>>
            <?php
                if(!empty($fof_title)):
            ?>
                <h2><?php echo logisfare_kses($fof_title); ?></h2>
            <?php endif;
            if(!empty($fof_subtitle) && $is_subtitle == 'yes'): ?>
                <p><?php echo logisfare_kses($fof_subtitle); ?></p>
            <?php endif; 
            if(!empty($fof_btn_label) && $is_btn == 'yes'): ?> 
                <a class="logicBtn"  href="<?php echo esc_url(home_url());?>"><span><?php echo esc_html($fof_btn_label); ?></span></a>
            <?php endif; ?>
        </div>
        <?php

    }
    
    protected function content_template() {}
}