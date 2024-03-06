<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Mailchimp_Widgets extends Widget_Base {

    public function get_name() {
        return 'themewar-mailchimp';
    }

    public function get_title() {
        return esc_html__( 'Mailchimp From', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }

    protected function register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="mc4wp-form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('Select', 'themewar'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'Mail Form', 'themewar' ),
        ]);
                $this->add_control(
                        'mail_form',
                        [
                                'label'     => esc_html__( 'Select Form', 'themewar' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '0',
                                'options'   => $shortcodes,
                        ]
                );	
                $this->add_control('important_note',[
                            'label' => esc_html__( 'Note', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::RAW_HTML,
                            'raw' => esc_html__( 'If you want a submit button hover effect then you need to add the class name ("magic-hover") & add an attribute like (data-radius="0%" data-border-color="#ff5100"). you can change the radius % & border color.', 'themewar' ),
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
                'label'         => esc_html__('Form Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'sb_icon_box_bg',
                                'label' => esc_html__( 'Box Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .subscribe-Form',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'sb_icon_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .subscribe-Form',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'sb_box_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .subscribe-Form',
                        ]
                );
                $this->add_responsive_control( 'sb_icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'sb_icon_box_margin', [
                                'label' => esc_html__( 'margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'sb_icon_box_padding', [
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'	 => esc_html__( 'Mail From Field Style', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('input_color',[
                                'label'     => esc_html__( 'Email Field Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-moz-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-ms-input-placeholder' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('input_opacity',[
                                'label' => esc_html__( 'Placeholder Opacity', 'themewar' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 1,
                                'step' => .10,
                                'default' => '',
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]'       => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-moz-placeholder'       => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                                        '{{WRAPPER}} .subscribe-Form form input[type=email]::-ms-input-placeholder'  => 'opacity: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('input_bg_color',[
                                'label'     => esc_html__( 'Email Field BG Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(),[
                                'name'      => 'input_border',
                                'label'     => esc_html__( 'Border', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .subscribe-Form form input[type="email"]',
                        ]
                );
                $this->add_responsive_control('input_border_radius',[
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('input_height',[
                                'label' => esc_html__( 'Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                 $this->add_responsive_control('input_width',[
                                'label' => esc_html__( 'Width', 'themewar' ),
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
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name'      => 'input_typography',
                                'label'     => esc_html__( 'Input Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .subscribe-Form form input[type="email"]',
                        ]
                );
                $this->add_responsive_control('input_margin',[
                                'label' => esc_html__( 'margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('input_padding',[
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('input_align', [
                                'label'   => esc_html__( 'Alignment', 'themewar' ),
                                'type'    => Controls_Manager::CHOOSE,
                                'options'            => [
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
                                'default'   => 'left',
                                'selectors' => [
                                    '{{WRAPPER}} .subscribe-Form form input[type="email"]'   => 'text-align: {{VALUE}};',
                                ],
                        ]
                );
            $this->end_controls_section();

            $this->start_controls_section('section_tab_4',[
                    'label'         => esc_html__('Button Style', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
            ]);
                    $this->add_group_control(Group_Control_Typography::get_type(),[
                                    'name'      => 'btn_typography',
                                    'label'     => esc_html__( 'Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .subscribe-Form form button',
                            ]
                    );
                    $this->add_responsive_control('btn_padding',[
                                    'label'      => esc_html__( 'padding', 'themewar' ),
                                    'type'       => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .subscribe-Form form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control('btn_margin',[
                                    'label'      => esc_html__( 'margin', 'themewar' ),
                                    'type'       => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                        '{{WRAPPER}} .subscribe-Form form button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                    ],
                            ]
                    );
                    $this->add_responsive_control('btn_border_radius',[
                                    'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                    'type'       => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors'  => [
                                            '{{WRAPPER}} .subscribe-Form form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control('btn_height',[
                                    'label' => esc_html__( 'Height', 'themewar' ),
                                    'type'  => Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'range'      => [
                                            'px' => [
                                                    'min' => 0,
                                                    'max' => 500,
                                                    'step' => 1,
                                            ],
                                            '%' => [
                                                    'min' => 0,
                                                    'max' => 100,
                                            ],
                                    ],
                                    'default'   => [],
                                    'selectors' => [
                                            '{{WRAPPER}} .subscribe-Form form button'  => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control('btn_width',[
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
                                            '{{WRAPPER}} .subscribe-Form form button'  => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->start_controls_tabs( 'style_tabs_sdf' );
                            $this->start_controls_tab('btn_2_button_style_normal',[
                                            'label' => esc_html__( 'Normal', 'themewar' ),
                                    ]
                            );
                            $this->add_responsive_control('btn_e_label_color', [
                                            'label' => esc_html__( 'Label Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .subscribe-Form form button i' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'btn_3_bg_color',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .subscribe-Form form button'
                                    ]
                            );
                            $this->end_controls_tab();
                            $this->start_controls_tab('btn_2_button_style_hover',[
                                            'label' => esc_html__( 'Hover', 'themewar' ),
                                    ]
                            );
                            $this->add_responsive_control('btn_label_hover_color',[
                                            'label' => esc_html__( 'Label Hover Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .subscribe-Form form button:hover i'  => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'btn_1_bg_hover_color',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .subscribe-Form form button:hover'
                                    ]
                            );
                            $this->end_controls_tab();
                        $this->end_controls_tabs();
            $this->end_controls_section();
            
            $this->start_controls_section('section_tab_5',[
                    'label'         => esc_html__('From Field Prev Icon', 'themewar'),
                    'tab'           => Controls_Manager::TAB_STYLE,
            ]);
                    $this->add_group_control(Group_Control_Typography::get_type(),[
                                    'name'      => 'prev_icon_typo',
                                    'label'     => esc_html__( 'Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .subscribe-Form form p > i',
                            ]
                    );
                    $this->add_responsive_control( 'prev_icon_position', [
                                    'label' => esc_html__( 'Position', 'themewar' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px'],
                                    'allowed_dimensions' => ['top','left'],
                                    'selectors' => [
                                            '{{WRAPPER}} .subscribe-Form form p > i' => 'top: {{top}}{{UNIT}}; left: {{left}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->start_controls_tabs( 'prev_icon_hover_tab_group' );
                            $this->start_controls_tab('prev_icon_hover_tab1',[
                                    'label' => esc_html__( 'Normal', 'themewar' ),
                            ]);
                                    $this->add_responsive_control('prev_icon_color_nr',[
                                                    'label' => esc_html__( 'Prev Icon Color', 'themewar' ),
                                                    'type' => Controls_Manager::COLOR,
                                                    'selectors' => [
                                                            '{{WRAPPER}} .subscribe-Form form p > i' => 'color: {{VALUE}}',
                                                    ],
                                            ]
                                    );
                            $this->end_controls_tab();
                            $this->start_controls_tab('prev_icon_hover_tab2',[
                                    'label' => esc_html__( 'Hover', 'themewar' ),
                            ]);
                                    $this->add_responsive_control('prev_icon_color_hr',[
                                                    'label' => esc_html__( 'Prev Icon Color', 'themewar' ),
                                                    'type' => Controls_Manager::COLOR,
                                                    'selectors' => [
                                                            '{{WRAPPER}} .subscribe-Form form p > i:hover' => 'color: {{VALUE}}',
                                                    ],
                                            ]
                                    );
                            $this->end_controls_tab();
                    $this->end_controls_tabs();
            $this->end_controls_section();

            

        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $mail_form      = (isset($settings['mail_form']) && $settings['mail_form'] != '') ? $settings['mail_form'] : 0;

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
        <div class="subscribe-Form <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <?php
                if($mail_form > 0){
                        echo do_shortcode('[mc4wp_form id="'.$mail_form.'"]');
                }else{
                        ?>
                        <div class="alert alert-warning" role="alert">
                        <?php echo esc_html__('Please Select Mail Chimp Form.', 'themewar'); ?>
                        </div>
                        <?php
                }
                ?>
        </div>
        <?php
        
    }

    protected function content_template() {}    
}