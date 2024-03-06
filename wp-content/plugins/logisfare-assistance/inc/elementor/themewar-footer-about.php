<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Footer_About_Widgets extends Widget_Base {
    public function get_name() {
        return 'tw-about';
    }

    public function get_title() {
        return esc_html__('About', 'themewar');
    }

    public function get_icon() {
        return 'eicon-wordart';
    }

    public function get_categories() {
        return ['themewar-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
            'label'         => esc_html__( 'Footer About', 'themewar' ),
        ]);

                $this->add_control( 'widget_title', [
                                'label'         => esc_html__( 'Widget Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'label_block'   => true,
                                'saperator'     => 'after'
                        ]
                );
                $this->add_control('is_logo',[
                            'label' => esc_html__( 'Is Logo', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Yes', 'themewar' ),
                            'label_off' => esc_html__( 'No', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                    ]
                );
                $this->add_control('ab_logo_images',[
                        'label'         => esc_html__( 'About Logo Image', 'themewar' ),
                        'label_block'   => TRUE,
                        'type'          => Controls_Manager::MEDIA,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'is_logo',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]);
                $this->add_control('is_content',[
                            'label' => esc_html__( 'Is Content', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Yes', 'themewar' ),
                            'label_off' => esc_html__( 'No', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                    ]
                );
                $this->add_control( 'ab_content_title',[
                        'label'         => esc_html__( 'About Contact Title', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( "Type Your Footer About Title...", 'themewar' ),
                        'label_block'   => true,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'is_content',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]);
                $this->add_control( 'ab_contact_desc',[
                        'label'         => esc_html__( 'About Contact Desc', 'themewar' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'placeholder'       => esc_html__( "Type your Description Here.", 'themewar' ),
                        'label_block'   => true,
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'is_content',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                ]);
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
                'label'     => esc_html__('Widget Area', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'ab_widget_area_bg',
                                'label' => esc_html__( 'Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .footerWidget',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'ab_widget_area_border',
                                'label' => esc_html__( 'Area Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .footerWidget',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'ab_widget_area_shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .footerWidget',
                        ]
                );
                $this->add_responsive_control( 'ab_widget_area_radus', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .footerWidget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('ab_widget_area_mr', [
                                'label' => esc_html__( 'Area Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .footerWidget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ab_widget_area_pd', [
                                'label' => esc_html__( 'Area Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .footerWidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Widget Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('mt_widget_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .widgetTitle' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name'      => 'mt_widget_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .widgetTitle',
                        ]
                );
                $this->add_responsive_control('mt_widget_padding',[
                                'label' => esc_html__( 'padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .widgetTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'mt_widget_margin',[
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control('widget_title_heading',[
                            'label' => esc_html__( 'Widget Title After', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_title_shape',
                                'label' => esc_html__( 'Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .widgetTitle:after',
                        ]
                );
                $this->add_responsive_control('widget_title_shape_w',[
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_title_shape_h',[
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'widget_shape_position', [
                            'label' => esc_html__( 'Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle:after' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_33', [
                'label'         => esc_html__( 'Logo Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_logo',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_responsive_control('logo_box_height',[
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .footer_logo img' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('logo_box_width',[
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .footer_logo img' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('logo_margin',[
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .footer_logo a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Content Title', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_content',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name'      => 'contact_title_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .about_widgetContent h4',
                        ]
                );
                $this->add_responsive_control('contact_title_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .about_widgetContent h4' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_responsive_control('contact_title_mr',[
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .about_widgetContent h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__( 'Content Description', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_content',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name'      => 'contact_edes_typo',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .about_widgetContent p',
                        ]
                );
                $this->add_responsive_control('contact_edes_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .about_widgetContent p' => 'color: {{VALUE}};'
                                ],
                        ]
                ); 
                $this->add_responsive_control('contact_edes_mr',[
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .about_widgetContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings                   = $this->get_settings_for_display();
        
        $widget_title               = (isset($settings['widget_title']) && $settings['widget_title'] != '') ? $settings['widget_title'] : '';
        $is_logo                    = (isset($settings['is_logo']) && $settings['is_logo'] == 'yes') ? $settings['is_logo'] : 'no';
        $ab_logo_images             = (isset($settings['ab_logo_images']['url']) && $settings['ab_logo_images']['url'] != '') ? $settings['ab_logo_images']['url'] : '';

        $is_content                 = (isset($settings['is_content']) && $settings['is_content'] == 'yes') ? $settings['is_content'] : 'no';
        $ab_content_title           = (isset($settings['ab_content_title']) && $settings['ab_content_title'] != '') ? $settings['ab_content_title'] : '';
        $ab_contact_desc            = (isset($settings['ab_contact_desc']) && $settings['ab_contact_desc'] != '') ? $settings['ab_contact_desc'] : '';
    
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
        <aside class="footerWidget footerabout <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <?php if($is_logo == 'yes' && $ab_logo_images != ''): ?>
                <div class="footer_logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($ab_logo_images); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
                </div>
            <?php endif; ?>
            <?php if($is_content == 'yes'): ?>
                <div class="about_widgetContent">
                    <?php if(!empty($ab_content_title)): ?>
                    <h4><?php echo esc_html($ab_content_title); ?></h4>
                    <?php endif; 
                    if(!empty($ab_contact_desc)) : ?>
                        <p><?php echo $ab_contact_desc; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}