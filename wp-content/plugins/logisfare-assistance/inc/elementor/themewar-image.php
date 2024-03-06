<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Image_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-image';
    }
    
    public function get_title() {
        return esc_html__( 'Image', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-image-rollover';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('Image', 'themewar')
        ]);
                $this->add_control( 'g_imgage', [
                            'label' => esc_html__( 'Image', 'themewar' ),
                            'label_block'   => TRUE,
                            'type' => Controls_Manager::MEDIA,
                            'default'       => [],
                    ]
                );
                $this->add_control( 'pfi_hover_effect', [
                            'label' => esc_html__('Hover Effect', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 0,
                            'options' => [
                                    0 => esc_html__('None', 'themewar'),
                                    1 => esc_html__('Flash', 'themewar'),
                                    2 => esc_html__('Shine', 'themewar'),
                                    3 => esc_html__('Circle', 'themewar'),
                            ],
                    ]
                );
                $this->add_control( 'img_is_full', [
                                'label'             => esc_html__( 'Image is Full', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Show', 'themewar' ),
                                'label_off'         => esc_html__( 'Hide', 'themewar' ),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'separator'         => 'before',
                        ]
                );
                $this->add_control('img_thumb_width', [
                                'label' => esc_html__( 'Image Width', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 2500,
                                'step' => 1,
                                'default' => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'img_is_full',
                                                'operator'  => '!=',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control('img_thumb_height', [
                                'label' => esc_html__( 'Image Height', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 2500,
                                'step' => 1,
                                'default' => '',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'img_is_full',
                                                'operator'  => '!=',
                                                'value'     => 'yes',
                                        ],
                                    ],
                                ],
                        ]
                );	
                $this->add_responsive_control('img_aligment',[
                            'label' => esc_html__( 'Alignment', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'start' => [
                                    'title' => esc_html__( 'Left', 'themewar' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'themewar' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__( 'Right', 'themewar' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'default' => 'center',
                            'selectors' => [
                                '{{WRAPPER}} .themeWar_image' => 'text-align: {{VALUE}};',
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
        
        $this->start_controls_section('section_tab_30', [
                'label'         => esc_html__('Images Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'background',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .themeWar_image img',
                    ]
                );

                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'g_img_border',
                            'label' => esc_html__( 'Images Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .themeWar_image img',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'g_img_shadow',
                            'label' => esc_html__( 'Image Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .themeWar_image img',
                    ]
                );
                $this->add_responsive_control('g_img_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .themeWar_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('g_img_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .themeWar_image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('g_img_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'separator' => 'after',
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .themeWar_image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->start_controls_tabs('style_tabs');
                    $this->start_controls_tab( 'style_normal_tab',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_group_control(Group_Control_Css_Filter::get_type(),[
                                        'label'   => esc_html__( 'Image Filter', 'themewar' ),
                                        'name' => 'custom_css_filters',
                                        'selector' => '{{WRAPPER}} .themeWar_image img',
                                ]
                            );	
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'style_hover_tab',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                            $this->add_group_control(Group_Control_Css_Filter::get_type(),[
                                        'label'   => esc_html__( 'Image Filter', 'themewar' ),
                                        'name' => 'custom_css_filters_hr',
                                        'selector' => '{{WRAPPER}} .themeWar_image img:hover',
                                ]
                            );	
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
    }
    protected function render() {
        $settings           = $this->get_settings_for_display();
        

        $pfi_hover_effect   = (isset($settings['pfi_hover_effect']) && $settings['pfi_hover_effect'] > 0 ? $settings['pfi_hover_effect'] : 0);

        $img_is_full        = (isset($settings['img_is_full']) && $settings['img_is_full'] == 'yes' ? $settings['img_is_full'] : 'no');
        $img_thumb_width    = (isset($settings['img_thumb_width']) && $settings['img_thumb_width'] > 0 ? $settings['img_thumb_width'] : 350);
        $img_thumb_height   = (isset($settings['img_thumb_height']) && $settings['img_thumb_height'] > 0 ? $settings['img_thumb_height'] : 350);
        
        
        $g_imgage           = (isset($settings['g_imgage']['id']) && $settings['g_imgage']['id'] > 0) ? $settings['g_imgage']['id'] : 'https://via.placeholder.com/350x350.png?text=Logisfare';

        $class              = ($pfi_hover_effect > 0 ? ($pfi_hover_effect == 1 ? 'logisFlash' : ($pfi_hover_effect == 2 ? 'logisShine' : 'logisCircle')) : '');

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
        
        if(!empty($g_imgage)):
            if($img_is_full == 'yes'): 
                $w = ($img_is_full != '' ? 'full' : '') ;
                $h = '';
            else: 
                $w = $img_thumb_width > 0 ? $img_thumb_width : 350;
                $h = $img_thumb_height > 0 ? $img_thumb_height : 350;
            endif;
        ?>
            <div class="themeWar_image <?php echo esc_attr($class)." "; echo esc_attr($animClass);?>" <?php echo esc_attr($animAttr); ?>>
                <img src="<?php echo logisfare_attachment_url($g_imgage, $w, $h); ?>" alt="<?php echo get_bloginfo('name')?>">
            </div>
        <?php endif;
    }
    
    protected function content_template() {}
}