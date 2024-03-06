<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Tag_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-tags';
    }
    
    public function get_title() {
        return esc_html__( 'Post Tags', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-tags';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label' => esc_html__( 'Post Tag', 'themewar' ),
        ]);      
                $this->add_control('pfi_note', [
                            'label' => esc_html__( 'Important Note', 'themewar' ),
                            'type' => Controls_Manager::RAW_HTML,
                            'raw' => __( 'This widget only work for single post page.', 'themewar' ),
                            'content_classes' => 'alert alert-warning',
                    ]
                );
                $this->add_control( 'tag_limit', [
                        'label' => esc_html__( 'Tag Limit', 'themewar' ),
                        'type' => Controls_Manager::NUMBER,
                        'description' => esc_html__( 'How many tags do you want to show in your display?', 'themewar' ),
                        'min' => 1,
                        'max' => 50,
                        'step' => 1,
                        'default' => 3,
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
                'label'         => esc_html__( 'Post Tag Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'post_tag_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .postTags',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'post_tag_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postTags  ',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'post_tag_area_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .postTags  ',
                    ]
                );
                $this->add_responsive_control('post_tag_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags  ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_tag_area_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('post_tag_area_margin', [
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('tag_content_styles', [
                'label'         => esc_html__( 'Tag Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'tag_content_typo',
                            'label' => esc_html__( 'Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .postTags a',
                    ]
                );
                $this->start_controls_tabs('style_tabs');
                    $this->start_controls_tab('tag_normal_tab',[
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'tag_content_color', [
                                        'label' => esc_html__( 'color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .postTags a'   => 'color: {{VALUE}}',
                                        ],
                                    ]
                            );
                            $this->add_responsive_control( 'tag_content_bg_color', [
                                            'label' => esc_html__( 'Bg color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .postTags a'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'tag_content_border',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .postTags a',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'tag_content_shadow',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .postTags a',
                                    ]
                            );
                    $this->end_controls_tab();

                    $this->start_controls_tab('tag_hover_tab',[
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'tag_content_color_hr', [
                                        'label' => esc_html__( 'color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .postTags a:hover'   => 'color: {{VALUE}}',
                                        ],
                                    ]
                            );
                            $this->add_responsive_control('tag_content_bg_color_hr',[
                                            'label' => esc_html__( 'BG Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .postTags a:hover'   => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'tag_content_border_hr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .postTags a:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'tag_content_shadow_hr',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .postTags a:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_control('hr', ['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_responsive_control('tag_content_border_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postTags a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_width', [
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
                                '{{WRAPPER}} .postTags a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_height', [
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
                                '{{WRAPPER}} .postTags a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_col_gap', [
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
                                '{{WRAPPER}} .postTags' => 'column-gap: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control('tag_content_rpw_gap', [
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
                                '{{WRAPPER}} .postTags' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $tag_limit              = (isset($settings['tag_limit']) && $settings['tag_limit'] != '') ? $settings['tag_limit'] : '1';
        
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
        $postID     = $post->ID;
        $posdcat    = wp_get_object_terms($postID, 'post_tag');

        if($postID > 0 && is_single()):
            echo '<div class="postTags clearfix '.$animClass.'" '.$animAttr.'>';
                $i = 1;
                foreach( $posdcat as $term ) :
                    if($i > $tag_limit){
                        break;
                    };
                    echo '<a href="' . esc_url( get_term_link( $term->slug, 'post_tag' ) ) . '">' . logisfare_kses( $term->name ) . '</a>'; 
                $i++; endforeach;
            echo '</div>';
        endif;
    }
    
    protected function content_template() {
        
    }
}