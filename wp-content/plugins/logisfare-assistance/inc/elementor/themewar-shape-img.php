<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Shape_img_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-shape-image';
    }
    
    public function get_title() {
        return esc_html__( 'Section Image Shape', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1',[
                    'label'     => esc_html__('Image', 'themewar')
        ]);
                
                $this->add_control('shape_img', [
                                'label'         => esc_html__( 'Image', 'themewar' ),
                                'type'          => Controls_Manager::MEDIA,
                        ]
                );
                $this->add_control( 'img_animation', [
                                'label'   => esc_html__( 'Animation Style', 'themewar' ),
                                'type'    => Controls_Manager::SELECT,
                                'default' => 'animation_none',
                                'options' => [
                                        'animation_none'       => esc_html__( 'No', 'themewar' ),
                                        'animation_swing'       => esc_html__( 'Swing', 'themewar' ),
                                        'animation_shake'       => esc_html__( 'Shake', 'themewar' ),
                                ],
                        ]
                );
                $this->add_responsive_control( 'img_width', [
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range'      => [
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
                                'default'   => [],
                                'selectors' => [
                                        '{{WRAPPER}} .layer_img img' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .layer_img .shape_colorArea' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'img_height', [
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range'      => [
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
                                'default'   => [],
                                'selectors' => [
                                        '{{WRAPPER}} .layer_img img' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .layer_img .shape_colorArea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('img_opacity',[
                            'label' => esc_html__( 'Opacity', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0.01,
                                    'max' => 1,
                                    'step' => 0.01,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img img' => 'opacity: {{SIZE}};',
                                '{{WRAPPER}} .layer_img .shape_colorArea' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
                $this->add_control( 'img_postition', [
                                'label'   => esc_html__( 'Image Align', 'themewar' ),
                                'type'    => Controls_Manager::SELECT,
                                'default' => 'left_top',
                                'options' => [
                                        'left_top'       => esc_html__( 'Left Top', 'themewar' ),
                                        'right_top'       => esc_html__( 'Right Top', 'themewar' ),
                                        'right_bottom'       => esc_html__( 'Right Bottom', 'themewar' ),
                                        'left_bottom'       => esc_html__( 'Left Bottom', 'themewar' ),
                                ],
                        ]
                );
                $this->add_responsive_control( 'img_offset_top',  [
                            'label' => esc_html__( 'Offset Y', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'img_postition',
                                            'operator'  => 'in',
                                            'value'     => ['left_top', 'right_top'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'img_offset_bottom',  [
                            'label' => esc_html__( 'Offset Y', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'img_postition',
                                            'operator'  => 'in',
                                            'value'     => ['left_bottom', 'right_bottom'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'img_offset_left',[
                            'label' => esc_html__( 'Offset X', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'img_postition',
                                            'operator'  => 'in',
                                            'value'     => ['left_top','left_bottom'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'img_offset_right',[
                            'label' => esc_html__( 'Offset X', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => -1000,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'img_postition',
                                            'operator'  => 'in',
                                            'value'     => ['right_top','right_bottom'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'img_rotate',[
                            'label' => esc_html__( 'Rotate', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'deg' => [
                                    'min' => -360,
                                    'max' => 360,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'unit' => 'deg',
                                'size' => 0,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .layer_img img' => 'transform: rotate({{SIZE}}{{UNIT}});',
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
        
        $this->start_controls_section( 'section_tab_2',[
                'label'         => esc_html__('Image Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('image_area_padding',[
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .layer_img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'image_area_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .layer_img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                                'name' => 'icon_box_shadow_hr',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .layer_img img, {{WRAPPER}} .layer_img .shape_colorArea',
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(),[
                                'name' => 'btn_box_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .layer_img img, {{WRAPPER}} .layer_img .shape_colorArea',
                        ]
                );
                $this->add_control('border_radius',[
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .layer_img img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .layer_img .shape_colorArea'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings           = $this->get_settings();

        
        $shape_style   = (isset($settings['shape_style']) && $settings['shape_style'] > 0) ? $settings['shape_style'] : 1;
        $shape_img     = (isset($settings['shape_img']['url']) && $settings['shape_img']['url'] != '') ? $settings['shape_img']['url'] : '';
        
        $img_animation = (isset($settings['img_animation']) && $settings['img_animation'] != '' ? $settings['img_animation'] : 'animation_none');
        $img_postition = (isset($settings['img_postition']) && $settings['img_postition'] != '' ? $settings['img_postition'] : 'img_postition');

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
        
        $c_css = $img_animation;
        $p_css = $img_postition;
        
        if($shape_style == 2):
        ?>
            <div class="layer_img <?php echo esc_attr($c_css); ?> <?php echo esc_attr($p_css); echo $animClass; ?> clearfix" <?php echo $animAttr; ?>>
                <div class="shape_colorArea"></div>
            </div>
        <?php else:?>
            <div class="layer_img <?php echo esc_attr($c_css); ?> <?php echo esc_attr($p_css); echo $animClass; ?> clearfix" <?php echo $animAttr; ?>>
                <img src="<?php echo esc_url($shape_img); ?>" alt="<?php echo get_bloginfo('name'); ?>">
            </div>
        <?php endif;
        
        
    }
    
    protected function content_template() {
        
    }
}