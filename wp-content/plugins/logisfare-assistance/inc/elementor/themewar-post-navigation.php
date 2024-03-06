<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Navigation_widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-navigation';
    }
    
    public function get_title() {
        return esc_html__( 'Post Navigation', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-navigation-horizontal';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Post Author Box', 'themewar' ),
        ]);      
                $this->add_control('show_navigation',[
                            'label'         => esc_html__( 'Show Navigation', 'themewar' ),
                            'type'          => \Elementor\Controls_Manager::SWITCHER,
                            'label_on'      => esc_html__( 'Show', 'themewar' ),
                            'label_off'     => esc_html__( 'Hide', 'themewar' ),
                            'return_value'  => 'yes',
                            'default'       => 'yes',
                            'description'   => esc_html__('Do you want to show Navigation...', 'themewar'),
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



        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'Navigation Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name'      => 'pst_navigation_bg',
                            'label'     => esc_html__( 'Background', 'themewar' ),
                            'types'     => [ 'classic', 'gradient'],
                            'selector'  => '{{WRAPPER}} .postNavigationWrap ',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name'      => 'pst_navigation_border',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postNavigationWrap',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'pst_navigation_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postNavigationWrap',
                    ]
                );
                $this->add_responsive_control('pst_navigation_radius', [
                            'label'     => esc_html__( 'Border Radius', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationWrap ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_navigation_margin', [
                            'label'     => esc_html__( 'Marigns', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationWrap ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_navigation_padding', [
                            'label'     => esc_html__( 'Padding', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationWrap ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__( 'Navigation Items Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'pst_nav_item_prev', [
                        'label' => esc_html__( 'Previous Item', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]); 
                $this->add_responsive_control('pst_nav_item_prev_mar', [
                            'label'     => esc_html__( 'Marigns', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationItem:not(.postNavNextItem)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_nav_item_prev_pd', [
                            'label'     => esc_html__( 'Padding', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationItem:not(.postNavNextItem)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pst_nav_item_next', [
                        'label' => esc_html__( 'Next Item', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]); 
                $this->add_responsive_control('pst_nav_item_next_mar', [
                            'label'     => esc_html__( 'Marigns', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavNextItem ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_nav_item_next_pd', [
                            'label'     => esc_html__( 'Padding', 'themewar' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavNextItem ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'pst_navigation_H', [
                        'label' => esc_html__( 'Post Title', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'pst_navigation_H_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postNavigationItem h3',
                    ]
                );
                $this->add_responsive_control( 'pst_navigation_H_color', [
                            'label' => esc_html__( 'Title Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postNavigationItem h3'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pst_navigation_H_hr', [
                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postNavigationItem:hover h3'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_navigation_H_margin', [
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationItem h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_navigation_H_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationItem h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'pst_sub_H', [
                        'label' => esc_html__( 'Post SubTitle', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'pst_sub_h_typo',
                            'label' => esc_html__( 'SubTitle Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postNavigationItem p',
                    ]
                );
                $this->add_responsive_control( 'pst_sub_h_color', [
                            'label' => esc_html__( 'SubTitle Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postNavigationItem p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('pst_sub_h_mar', [
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postNavigationItem p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Post Nav Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'pst_pagin_nav_i_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postNavigationItem i',
                    ]
                );
                $this->start_controls_tabs('style_tabs');
                        $this->start_controls_tab('style_normal_tab', [
                                'label' => esc_html__( 'Normal', 'textdomain' ),
                        ]);
                            $this->add_responsive_control( 'pst_pagin_nav_i_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .postNavigationItem i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pst_pagin_nav_bg',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .postNavigationItem span',
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'pst_pagin_nav_bdr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .postNavigationItem span',
                                ]
                            );
                        $this->end_controls_tab(); 
                        $this->start_controls_tab('style_hover_tab', [
                                'label' => esc_html__( 'Hover', 'textdomain' ),
                        ]);
                            $this->add_responsive_control( 'pst_pagin_nav_i_color_hr', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .postNavigationItem:hover i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(Group_Control_Background::get_type(),[
                                        'name' => 'pst_pagin_nav_bg_hr',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .postNavigationItem:hover span',
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name' => 'pst_pagin_nav_bdr_hr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .postNavigationItem:hover span',
                                ]
                            );
                        $this->end_controls_tab();
                
                $this->end_controls_tabs();
                $this->add_control('hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'pst_pagin_nav_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'separator'  => 'before',
                            'selector' => '{{WRAPPER}} .postNavigationItem span',
                    ]
                );
                $this->add_responsive_control( 'pst_pagin_nav_radius', [
                                'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .postNavigationItem span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],

                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $show_navigation        = (isset($settings['show_navigation']) && !empty($settings['show_navigation']) ? $settings['show_navigation'] : 'no');
        
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



        if($show_navigation == 'yes'):
            $prevpost = get_previous_post();
            $nextpost = get_next_post();
        ?>
            <div class="postNavigationWrap clearfix <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <div class="row">
                    <div class="col-md-6">
                        <?php if(!empty($prevpost)): ?>
                            <a href="<?php echo esc_url(get_permalink($prevpost->ID)); ?>" class="postNavigationItem">
                                <span><i class="<?php echo esc_attr('logisfare-arrow_prev', 'themewar'); ?>"></i></span>
                                <p><?php echo esc_html('Previous Post','themewar'); ?></p>
                                <h3><?php echo esc_html(get_the_title($prevpost->ID)); ?></h3>
                            </a>
                        <?php endif;?>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <?php if(!empty($nextpost)): ?>
                            <a href="<?php echo esc_url(get_permalink($nextpost->ID)); ?>" class="postNavigationItem postNavNextItem">
                                <span><i class="<?php echo esc_attr('logisfare-arrow_next', 'themewar'); ?>"></i></span>
                                <p><?php echo esc_html('Previous Post','themewar'); ?></p>
                                <h3><?php echo esc_html(get_the_title($prevpost->ID)); ?></h3>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        
    }
    
    protected function content_template() {}
}