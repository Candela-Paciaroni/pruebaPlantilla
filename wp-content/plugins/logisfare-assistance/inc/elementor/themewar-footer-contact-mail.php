<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Fw_Contact_Email_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-contact-mail';
    }

    public function get_title() {
        return esc_html__('Contact Email/Phone', 'themewar');
    }

    public function get_icon() {
        return 'eicon-email-field';
    }

    public function get_categories() {
        return ['themewar-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Contact Info', 'themewar' ),
        ]);
                $this->add_control( 'fw_cnt_lable', [
                            'label'         => esc_html__( 'Info Lable', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("Your Info Lable", 'themewar'),
                    ]
                );
                $this->add_control( 'fw_cont_show_icon', [
                            'label'             => esc_html__( 'Show Icon Info', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control('fw_cnt_icon', [
                        'label'         => esc_html__( 'Info Icon', 'themewar' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'fw_cont_show_icon',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]);
                $this->add_control( 'fw_cnt_title', [
                            'label'         => esc_html__( 'Info Email/Phone', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'label_block'   => true,
                            'placeholder'   => esc_html__("info@example.com", 'themewar'),
                    ]
                );
                $this->add_control( 'fw_email_link', [
                            'label'             => esc_html__( 'Email/Phone Link', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'label_block'       => true,
                            'placeholder'       => esc_html__( 'mailto:info@example.com/ tel:+47........', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => false,
                                    'nofollow'       => false,
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
                'label'         => esc_html__( 'Widget Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'info_widget_area_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .widget.fwContactEmail',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'info_widget_area_border',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .widget.fwContactEmail',
                    ]
                );
                $this->add_responsive_control('info_widget_area_mr', [
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .widget.fwContactEmail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'info_widget_area_pd', [
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .widget.fwContactEmail' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Contact Lable', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('mt_widget_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fw_contactLabel' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'mt_widget_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .fw_contactLabel',
                    ]
                );
                $this->add_responsive_control( 'mt_widget_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fw_contactLabel' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('mt_widget_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fw_contactLabel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Contact Content', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'fw_cnt_mail_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .fwContactEmail > a, {{WRAPPER}} .logisfareLinkBTN',
                    ]
                );
                $this->add_responsive_control('fw_cnt_mail_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fwContactEmail > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .logisfareLinkBTN' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_responsive_control('fw_cnt_mail_color_hr', [
                            'label'		 => esc_html__( 'Hover Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fwContactEmail > a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .logisfareLinkBTN:hover' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_responsive_control('fw_cnt_mail_vdr_color_nr', [
                            'label'		 => esc_html__( 'Border Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fwContactEmail > a::after' => 'background: {{VALUE}};',
                                '{{WRAPPER}} .logisfareLinkBTN:after' => 'background: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_responsive_control('fw_cnt_mail_vdr_color_ht', [
                            'label'		 => esc_html__( 'Hover Border Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .fwContactEmail > a:hover::after' => 'background: {{VALUE}};',
                                '{{WRAPPER}} .logisfareLinkBTN:hover::after' => 'background: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_control('fw_cnt_mail_bdr_width',[
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
                                '{{WRAPPER}} .fwContactEmail > a::after' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareLinkBTN:after' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('fw_cnt_mail_bdr_height',[
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
                                '{{WRAPPER}} .fwContactEmail > a::after' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logisfareLinkBTN:after' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fw_cnt_mail_bdr_position', [
                            'label' => esc_html__( 'Border Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['bottom', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .fwContactEmail > a::after' => 'bottom: {{bottom}}{{UNIT}}; left: {{left}}{{UNIT}};',
                                    '{{WRAPPER}} .logisfareLinkBTN:after' => 'bottom: {{bottom}}{{UNIT}}; left: {{left}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fw_cnt_mail_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fwContactEmail > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logisfareLinkBTN' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('fw_cnt_mail_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .fwContactEmail > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logisfareLinkBTN' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_12', [
                'label'         => esc_html__('Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'fw_cont_show_icon',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ]
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'btn_icon_typography',
                            'label' => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareLinkBTN i',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('icon_button_style_normal',['label' => esc_html__( 'Normal', 'themewar' ),]);
                        $this->add_responsive_control( 'icon_label_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareLinkBTN i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_button_style_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                        $this->add_responsive_control( 'icon_label_hover_color', [
                                        'label'     => esc_html__( 'Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .logisfareLinkBTN:hover i'   => 'color: {{VALUE}}'
                                        ]
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'btn_icon_positioning', [
                                'label' => esc_html__( 'Icon Position', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareLinkBTN i' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control('btn_icon_rotate',[
                            'label' => esc_html__( 'Icon Rotate', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['deg'],
                            'range' => [
                                'deg' => [
                                    'min' => -360,
                                    'max' => 360,
                                    'step' => 0,
                                ],
                            ],
                            'default' => [
                                'unit' => 'deg',
                                'size' => -46.97,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareLinkBTN i' => 'transform: rotate({{SIZE}}{{UNIT}}) !important;',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $fw_cont_show_icon      = (isset($settings['fw_cont_show_icon']) && !empty($settings['fw_cont_show_icon'])) ? $settings['fw_cont_show_icon'] : 'no';
        $fw_cnt_icon            = (isset($settings['fw_cnt_icon']) && ($settings['fw_cnt_icon']) != '') ? $settings['fw_cnt_icon'] : '';
        $fw_cnt_lable           = (isset($settings['fw_cnt_lable']) && ($settings['fw_cnt_lable']) != '') ? $settings['fw_cnt_lable'] : '';
        $fw_cnt_title           = (isset($settings['fw_cnt_title']) && ($settings['fw_cnt_title']) != '') ? $settings['fw_cnt_title'] : '';

        $email_link             = (isset($settings['fw_email_link']['url']) && ($settings['fw_email_link']['url']) != '') ? $settings['fw_email_link']['url'] : '';
        $target                 = (isset($settings['fw_email_link']['is_external']) && !empty($settings['fw_email_link']['is_external'])) ? ' target="_blank"' : '' ;
        $nofollow               = (isset($settings['fw_email_link']['nofollow']) && !empty($settings['fw_email_link']['nofollow'])) ? ' rel="nofollow"' : '' ;


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
        <div class="widget fwContactEmail <?php echo $animClass; ?>" <?php echo $animAttr ?>>
            <?php if($fw_cnt_lable != ''): ?>
                <h3 class="fw_contactLabel"><?php echo logisfare_kses($fw_cnt_lable); ?></h3>
            <?php endif;
            if(!empty($fw_cont_show_icon == 'yes')): ?>
                <?php if(!empty($fw_cnt_title)): ?>
                    <div class="button-wrap right">
                        <a class="logisfareLinkBTN" href="<?php echo esc_attr($email_link); ?>" <?php echo esc_attr($target.' '.$nofollow); ?>>
                            <div class="button-text sticky right"><span><?php echo esc_html($fw_cnt_title) ?></span></div>
                            <div class="iconWrapper parallax-wrap">
                                <div class="button-icon parallax-element">
                                    <i class="<?php echo esc_attr($fw_cnt_icon); ?>"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <a class="dfCursor" <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_attr($email_link); ?>"><?php echo esc_html($fw_cnt_title) ?></a>
            <?php endif; ?>
        </div>
        <?php

    }
    
    protected function content_template() {}
}