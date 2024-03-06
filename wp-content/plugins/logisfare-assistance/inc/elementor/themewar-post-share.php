<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Share_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-shares';
    }
    
    public function get_title() {
        return esc_html__( 'Post Share', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-share';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Post Share', 'themewar' ),
        ]);      

                $this->add_control('is_social_tile',[
                            'label' => esc_html__( 'Is Title', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__( 'Yes', 'themewar' ),
                            'label_off' => esc_html__( 'No', 'themewar' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                    ]
                );
                $this->add_control('social_title',[
                            'label' => esc_html__( 'Social Title', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => esc_html__( 'Follow Us:', 'themewar' ),
                            'placeholder' => esc_html__( 'Type your Social Title....', 'themewar' ),
                            'separator' => 'after',
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'is_social_tile',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control('social_share', [
                            'label' => esc_html__( 'Social Media', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'Facebook',
                            'options' => [
                                'Facebook'  => esc_html__( 'Facebook', 'themewar' ),
                                'Twitter' => esc_html__( 'Twitter', 'themewar' ),
                                'LinkedIn' => esc_html__( 'LinkedIn', 'themewar' ),
                                'Pinterest' => esc_html__( 'Pinterest', 'themewar' ),
                                'Dribbble' => esc_html__( 'Dribbble', 'themewar' ),
                                'Whatsapp' => esc_html__( 'Whatsapp', 'themewar' ),
                                'google_plus' => esc_html__( 'Google Plus', 'themewar' ),
                                'Digg' => esc_html__( 'Digg', 'themewar' ),
                                'Tumblr' => esc_html__( 'Tumblr', 'themewar' ),
                                'Reddit' => esc_html__( 'Reddit', 'themewar' ),
                                'Email' => esc_html__( 'Email', 'themewar' ),
                            ],
                        ]
                    );
                    $repeater->add_control('social_icon_bg_color',[
                                'label' => esc_html__( 'Icon Bg Color', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                        ]
                    );
                $this->add_control( 'share_list', [
                            'label'         => esc_html__( 'Share Item', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                    [
                                            'social_share'          => 'Facebook',
                                    ],
                                    [
                                            'social_share'          => 'Twitter',
                                    ],
                                    [
                                            'social_share'          => 'LinkedIn',
                                    ],
                                    [
                                            'social_share'          => 'google_plus',
                                    ],
                                    [
                                        'social_icon_bg_color'      => ''
                                    ],
                            ],
                            'title_field' => '{{{ social_share }}}',
                    ]
                );
                $this->add_responsive_control( 'social_shr_aligment', [
                            'label'                     => esc_html__( 'Alignment', 'themewar' ),
                            'type'                      => Controls_Manager::CHOOSE,
                            'options'                   => [
                                    'flex-start'       => [
                                            'title'  => esc_html__( 'Left', 'themewar' ),
                                            'icon'   => 'eicon-text-align-left',
                                    ],
                                    'center'     => [
                                            'title'  => esc_html__( 'Center', 'themewar' ),
                                            'icon'   => 'eicon-text-align-center',
                                    ],
                                    'flex-end'      => [
                                            'title'  => esc_html__( 'Right', 'themewar' ),
                                            'icon'   => 'eicon-text-align-right',
                                    ]
                            ],
                            'default' => 'right',
                            'selectors' => [
                                '{{WRAPPER}} .postSocialShare ' => 'justify-content: {{VALUE}};',
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

        $this->start_controls_section('post_share_area_style', [
                'label'         => esc_html__( 'Post Share Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'post_post_share_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .postSocialShare  ',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'post_post_share_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postSocialShare  ',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'post_post_share_area_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postSocialShare  ',
                    ]
                );
                $this->add_responsive_control('post_post_share_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare  ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_post_share_area_margin', [
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_post_share_area_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('post_share_title_styles', [
                'label'         => esc_html__( 'Post Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_social_tile',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'post_share_title_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postSocialShare h4',
                    ]
                );
                
                $this->add_responsive_control( 'post_share_title_color', [
                            'label' => esc_html__( 'color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postSocialShare h4'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('post_share_content_styles', [
                'label'         => esc_html__( 'Post Icon Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'post_share_content_typo',
                            'label' => esc_html__( 'Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postSocialShare a',
                    ]
                );
                $this->add_responsive_control( 'post_share_content_color', [
                            'label' => esc_html__( 'color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postSocialShare a'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'post_share_content_color_hr', [
                            'label' => esc_html__( 'Hover color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postSocialShare a:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_bg_color',[
                            'label' => esc_html__( 'Bg Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postSocialShare a'   => 'background: {{VALUE}} !important',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_bg_color_hr',[
                            'label' => esc_html__( 'Bg Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .postSocialShare a:hover'   => 'background: {{VALUE}} !important',
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'post_share_content_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postSocialShare a',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'post_share_content_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postSocialShare a',
                    ]
                );
                $this->add_responsive_control('post_share_content_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postSocialShare a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_width', [
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .postSocialShare a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_content_height', [
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .postSocialShare a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_col_gap', [
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
                                '{{WRAPPER}} .postSocialShare' => 'column-gap: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_share_rpw_gap', [
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
                                '{{WRAPPER}} .postSocialShare' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $is_social_tile         = (isset($settings['is_social_tile']) && $settings['is_social_tile'] == 'yes') ? $settings['is_social_tile'] : 'no';
        $social_title           = (isset($settings['social_title']) && $settings['social_title'] !='') ? $settings['social_title'] : '';

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


        global $post;
        $postID                 = $post->ID;
        $share_list             = (isset($settings['share_list']) && $settings['share_list'] !='') ? $settings['share_list'] : '';

        if(!empty($share_list) && $postID > 0 && (is_single() || is_page())):
            echo '<div class="postSocialShare socialShare'.$animClass.'" '.$animAttr.'>'; 
            if($is_social_tile == 'yes' && $social_title != ''):
            ?>
                <h4><?php echo esc_html($social_title); ?></h4> 
            <?php endif; 
                foreach($share_list as $share):
                    $social_share       = (isset($share['social_share']) && !empty($share['social_share']) ? $share['social_share'] : '');
                    $social_i_bg_color  = (isset($share['social_icon_bg_color']) && !empty($share['social_icon_bg_color']) ? $share['social_icon_bg_color'] : '#ffffff00');
                    switch($social_share):
                        case('Facebook'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="themewar_facebook-f"></i></a>';
                            break;
                        case('Twitter'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink($postID) . '&text=' . esc_url(get_the_title($postID)) . '"><i class="themewar_twitter"></i></a>';
                            break;
                        case('Pinterest'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="themewar_pinterest-p"></i></a>';
                            break;
                        case('Dribbble'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://Dribbble.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="themewar_dribbble"></i></a>';
                            break;
                        case('LinkedIn'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="themewar_linkedin-in"></i></a>';
                            break;
                        case('Whatsapp'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="themewar_whatsapp"></i></a>';
                            break;
                        case('google_plus'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="themewar_google-plus-g"></i></a>';
                            break;
                        case('Digg'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://digg.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="themewar_digg"></i></a>';
                            break;
                        case('Tumblr'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title($postID)) . '"><i class="themewar_tumblr"></i></a>';
                            break;
                        case('Reddit'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="themewar_reddit-alien"></i></a>';
                            break;
                        case('Email'):
                            echo '<a class="social-icon-link" style="background:'.$social_i_bg_color.'" target="_blank" href="mailto:?subject=' . get_the_permalink($postID) . '"><i class="themewar_envelope"></i></a>';
                            break;
                    endswitch;
                endforeach;
            echo '</div>';
        endif;
    }
    
    protected function content_template() {
        
    }
}