<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Social_Widgets extends Widget_Base {
    
    public function get_name() {
        return 'themewar-social';
    }
    
    public function get_title() {
        return esc_html__('Social Links Widget', 'themewar');
    }
    
    public function get_icon() {
        return 'eicon-social-icons';
    }
    
    public function get_categories() {
        return ['themewar-footer-elements'];
    }
    
    protected function register_controls() {
        
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Social Links', 'themewar' ),
        ]);
                $repeater = new \Elementor\Repeater();
                $repeater->add_control('s_icons',[
                            'label'         => esc_html__( 'Social Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_facebook-f',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeater->add_control('s_icon_color',[
                            'label' => esc_html__( 'Icon Bg Color', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                    ]
                );
                $repeater->add_control('s_url', [
                            'label'             => esc_html__( 'Social Url', 'themewar' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => false,
                                    'nofollow'       => false,
                            ],
                    ]
                );
                $this->add_control( 's_list',[
                            'label'         => esc_html__( 'Social Item', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [],
                    ]
                );
                $this->add_responsive_control('st_alignment', [
                            'label'                     => esc_html__( 'Alignment', 'themewar' ),
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
                            'default'                   => 'left',
                            'prefix_class'              => 'fSocial_align elementor%s-align-',
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
                'label'         => esc_html__( 'Widget Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'fs_item_bg',
                            'label' => esc_html__( 'Item Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'fs_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'fs_item_shadow',
                            'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_responsive_control( 'fs_item_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'fs_item_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Social Items', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'          => 'icon_typography',
                            'label'         => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'      => '{{WRAPPER}} .footerSocial a i',
                    ]
                );
                $this->start_controls_tabs( 'social_styling_tab' );
                    $this->start_controls_tab('social_tab_normal',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                        $this->add_responsive_control('social_icon_color',[
                                    'label'     => esc_html__( 'Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .footerSocial a'    => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'social_hover_bg',[
                                    'label' => esc_html__( 'Box Background', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .footerSocial a'    => 'background: {{VALUE}} !important',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(),[
                                    'name'      => 's_border',
                                    'label'     => esc_html__( 'Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .footerSocial a',
                            ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                                    'name'      => 's_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .footerSocial a',
                            ]
                        );
                    $this->end_controls_tab();  

                    $this->start_controls_tab('social_tab_hover',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                        $this->add_responsive_control( 'social_icon_hover_color',[
                                    'label'     => esc_html__( 'Color', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .footerSocial a:hover'    => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'social_hover_bg_hr',[
                                    'label' => esc_html__( 'Box Background', 'themewar' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .footerSocial a:after'    => 'background: {{VALUE}} !important',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Border::get_type(),[
                                    'name'      => 's_hover_border',
                                    'label'     => esc_html__( 'Border', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .footerSocial a:hover',
                            ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                                    'name'      => 's_hover_box_shadow',
                                    'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .footerSocial a:hover',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control('icon_box_width',[
                            'label'      => esc_html__( 'Width', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => 'px',
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .footerSocial a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('icon_box_height',[
                            'label'      => esc_html__( 'Height', 'themewar' ),
                            'type'       => Controls_Manager::SLIDER,
                            'size_units' => 'px',
                            'range'      => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 300,
                                            'step' => 1,
                                    ],
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .footerSocial a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('icon_box_border_radius',[
                            'label'         => esc_html__( 'Border Radius', 'themewar' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .footerSocial a'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .footerSocial a:after'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_responsive_control('tags_items_col_gap', [
                            'label' => esc_html__( 'Column Gap', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .footerSocial' => 'column-gap: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('tags_items_rpw_gap', [
                            'label' => esc_html__( 'Row Gap', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .footerSocial' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $s_list             = (isset($settings['s_list']) && !empty($settings['s_list'])) ? $settings['s_list'] : array();


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
        <aside class="footerWidget <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <div class="footerSocial">
                <?php 
                    if(!empty($s_list)):
                        foreach($s_list as $sl):
                            $s_icons            = (isset($sl['s_icons']) && $sl['s_icons'] != '' ? $sl['s_icons'] : '');
                            $s_icon_color       = (isset($sl['s_icon_color']) ? $sl['s_icon_color'] : '');
                            $s_url              = (isset($sl['s_url']['url']) && !empty($sl['s_url']['url']) ? $sl['s_url']['url'] : 'javascript:void(0);');
                            $target             = $sl['s_url']['is_external'] && !empty($sl['s_url']['nofollow']) ? ' target="_blank"' : '' ;
                            $nofollow           = $sl['s_url']['nofollow'] && !empty($sl['s_url']['nofollow'])? ' rel="nofollow"' : '' ;
                            
                            if($s_icons != ''):
                            ?>
                            <a <?php if(($s_icon_color) != ''):?> style="background:<?php echo esc_attr($s_icon_color); ?>"<?php endif; echo esc_attr($target.' '.$nofollow); ?> href="<?php echo $s_url; ?>">
                                <?php if(!empty($s_icons)): ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $sl['s_icons'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif; ?>
                            </a>
                            <?php
                            endif;
                        endforeach;
                    endif;
                ?>
            </div>
        </aside>
        
        <?php
    }
    
    protected function content_template() {}
}