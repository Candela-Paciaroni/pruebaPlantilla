<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Video_Btn_Widgets extends Widget_Base {
    public function get_name() {
        return 'themewar-video-image';
    }

    public function get_title() {
        return esc_html__('Video BTN', 'themewar');
    }

    public function get_icon() {
        return 'eicon-favorite';
    }

    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab01', [
                'label'         => esc_html__( 'Video Wrapper', 'themewar' ),
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'vdi_wrapper_background',
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .videoPlayWrapper01',
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab', [
                'label'         => esc_html__( 'Video BTN', 'themewar' ),
        ]);
                $this->add_control('video_icons',[
                            'label'         => esc_html__( 'Icon', 'themewar' ),
                            'type'          => Controls_Manager::ICON,
                            'label_block'   => TRUE,
                    ]
                );
                $this->add_control( 'vi_embed_url', [
                            'label'             => esc_html__('Video Embed URL', 'themewar'),
                            'type'              => Controls_Manager::TEXTAREA,
                            'label_block'       => TRUE,
                            'placeholder'       => esc_html__('https://www.youtube.com/embed/videoid', 'themewar')
                    ]
                ); 
                $this->add_control('hv_btn_bdcolor',[
                            'label' => esc_html__( 'Hover Cursor Border Color', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
                            ],
                    ]
                );		
                $this->add_control('bh_btn_bdradius',[
                            'label' => esc_html__( 'Hover Cursor Border Radius', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 100,
                            'step' => 0,
                            'default' => 50,
                    ]
                );
                $this->add_responsive_control('video_align', [
                            'label'                     =>esc_html__( 'Button Alignment', 'themewar' ),
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
                            'default'                   => 'center',
                            'prefix_class'              => 'video_align elementor%s-align-',
                    ]
            );
            $this->add_responsive_control('video_iconx_align', [
                            'label'                     =>esc_html__( 'Icon Alignment X', 'themewar' ),
                            'type'                      => Controls_Manager::CHOOSE,
                            'options'                   => [
                                    'left'       => [
                                            'title'  => esc_html__( 'Left', 'themewar' ),
                                            'icon'   => 'eicon-h-align-left',
                                    ],
                                    'center'     => [
                                            'title'  => esc_html__( 'Center', 'themewar' ),
                                            'icon'   => 'eicon-h-align-center',
                                    ],
                                    'right'      => [
                                            'title'  => esc_html__( 'Right', 'themewar' ),
                                            'icon'   => 'eicon-h-align-right',
                                    ]
                            ],
                            'default'                   => 'center',
                            'prefix_class'              => 'iconX%s-align-',
                    ]
            );
            $this->add_responsive_control('video_icony_align', [
                            'label'                     =>esc_html__( 'Icon Alignment Y', 'themewar' ),
                            'type'                      => Controls_Manager::CHOOSE,
                            'options'                   => [
                                    'left'       => [
                                            'title'  => esc_html__( 'Top', 'themewar' ),
                                            'icon'   => 'eicon-v-align-top',
                                    ],
                                    'center'     => [
                                            'title'  => esc_html__( 'Middle', 'themewar' ),
                                            'icon'   => 'eicon-v-align-middle',
                                    ],
                                    'right'      => [
                                            'title'  => esc_html__( 'Buttom', 'themewar' ),
                                            'icon'   => 'eicon-v-align-bottom',
                                    ]
                            ],
                            'default'                   => 'center',
                            'prefix_class'              => 'iconY%s-align-',
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

        $this->start_controls_section('section_tab_02', [
                'label'  => esc_html__( 'Wrapper Style', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(\Elementor\Group_Control_Box_Shadow::get_type(),[
                            'label' => esc_html__( 'Wrapper Shadow', 'themewar' ),
                            'name' => 'wrapper_shadow',
                            'selector' => '{{WRAPPER}} .videoPlayWrapper01',
                    ]
                );
                $this->add_control('wrapper_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .videoPlayWrapper01'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('wrapper_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .videoPlayWrapper01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('wrapper_paddings', [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .videoPlayWrapper01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_2', [
                'label'  => esc_html__( 'Btn Style', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control('video_btn_height',[
                            'label' => esc_html__( 'BTN Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .playBTn01' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('video_btn_width',[
                            'label' => esc_html__( 'BTN Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .playBTn01' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'video_icon_btn_typography',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .playBTn01 i',
                    ]
                );
                $this->add_control('btn_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .playBTn01'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('btn_paddings', [
                            'label' => esc_html__( 'Paddings', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .playBTn01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('btn_left',[
                            'label'      => esc_html__( 'Left', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'range'      => [
                                    '%'  => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .playBTn01' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('btn_top',[
                            'label'      => esc_html__( 'Top', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'range'      => [
                                    '%'  => [
                                            'min' => 0,
                                            'max' => 100,
                                    ],
                            ],
                            'default'   => [],
                            'selectors' => [
                                    '{{WRAPPER}} .playBTn01' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->start_controls_tabs('section_tabing_1');
                    $this->start_controls_tab('btn_style_normal',[
                            'label'     => esc_html__( 'Normal', 'themewar' ),
                    ]);
                        $this->add_control('btn_color', [
                                    'label' => esc_html__( 'Icon Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .playBTn01 i' => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Background::get_type(),[
                                    'name' => 'v_btn_bg_color',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .playBTn01',
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(),[
                                    'name' => 'btn_box_border',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .playBTn01',
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_style_hover',[
                            'label'     => esc_html__( 'Hover', 'themewar' ),
                    ]);
                        $this->add_control('btn_color_hover',[
                                    'label' => esc_html__( 'Icon Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .playBTn01:hover i' => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Background::get_type(),[
                                    'name' => 'v_btn_bg_color_hover',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .playBTn01:hover',
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(),[
                                    'name' => 'btn_box_border_hover',
                                    'label' => esc_html__( 'Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .playBTn01:hover',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $vi_embed_url       = (isset($settings['vi_embed_url']) && $settings['vi_embed_url'] !='') ? $settings['vi_embed_url'] : 'https://www.youtube.com/embed/1Ai3gcsiK70';
        $video_icons        = (isset($settings['video_icons']) && $settings['video_icons'] !='') ? $settings['video_icons'] : 'logisfare-play';
        $cursor_bdColor = (isset($settings['hv_btn_bdcolor']) && $settings['hv_btn_bdcolor'] != '') ? $settings['hv_btn_bdcolor'] : '#ff5100';
        $cursor_bdradius = (isset($settings['bh_btn_bdradius']) && $settings['bh_btn_bdradius'] != '') ? $settings['bh_btn_bdradius'] : '0';

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
        
        <div class="videoPlayWrapper01  <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($vi_embed_url)): ?>
            <a href="<?php echo esc_url($vi_embed_url) ?>" class="playBTn01 magic-hover <?php echo $animClass; ?>" data-radius="<?php echo esc_attr($cursor_bdradius); ?>%" data-border-color="<?php echo esc_attr($cursor_bdColor); ?>" <?php echo $animAttr; ?>>
                <i class="<?php echo esc_attr($video_icons); ?>"></i>
            </a>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function content_template() {}
}