<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Comment_Form_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-comment-form';
    }
    
    public function get_title() {
        return esc_html__( 'Comment Form', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-comments';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Comments_form', 'themewar' ),
        ]);
                $this->add_control('pfi_note', [
                            'label' => esc_html__( 'Important Note', 'themewar' ),
                            'type' => Controls_Manager::RAW_HTML,
                            'raw' => __( 'This shortcode made to display the comment form on post or page. So, do not use it else where.', 'orientate' ),
                            'content_classes' => 'alert alert-warning',
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


        
        $this->start_controls_section('section_tab__wid', [
                'label'         => esc_html__( 'Post Comment Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);  
                $this->add_control( 'commentlist_area_main_Style', [
                                'label' => esc_html__( 'Comment List Area Style', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                ); 
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'comentlist_area_bg',
                                'label' => esc_html__( 'Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .logisfareCommentsArea ',
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                                'name' => 'comentlist_area_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .logisfareCommentsArea ',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name'      => 'comentlist_area_shadow',
                                'label'     => esc_html__( 'Widget Shadow', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logisfareCommentsArea ',
                        ]
                );
                $this->add_responsive_control('comentlist_area_radius', [
                                'label' => esc_html__( 'Border Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfareCommentsArea ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_margin', [
                                'label' => esc_html__( 'Marigns', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfareCommentsArea ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfareCommentsArea ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'CommentList Item Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'comentlist_area_item_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .singleComment ',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'commentlist_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singleComment',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'commentlist_area_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .singleComment',
                    ]
                );
                $this->add_responsive_control('commentlist_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .singleComment' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );   
                $this->add_responsive_control( 'commentlist_area_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .singleComment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'commentlist_area_Padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .singleComment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_author_title', [
                'label'         => esc_html__( 'CommentList Content Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);      
                $this->add_control( 'author_Image_style', [
                            'label' => esc_html__( 'Author Image Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'author_Image_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singleComment img ',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'author_Image_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .singleComment img',
                    ]
                );
                $this->add_responsive_control('author_Image_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .singleComment img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('author_Image_width', [
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
                                '{{WRAPPER}} .singleComment img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('author_Image_height', [
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
                                '{{WRAPPER}} .singleComment img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('author_Image_margin', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .singleComment img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );


                $this->add_control( 'author_heading_heading', [
                            'label' => esc_html__( 'Author Title Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'author_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .cm_author',
                    ]
                );
                $this->add_responsive_control( 'author_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .cm_author'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_title_typo_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .cm_author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'author_date_heading', [
                            'label' => esc_html__( 'Comment Date', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'author_date_typo',
                            'label' => esc_html__( 'Date Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .commentDate',
                    ]
                );
                $this->add_responsive_control( 'author_date_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commentDate'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_date_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .commentDate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'author_desc_heading', [
                            'label' => esc_html__( 'Comment Description', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'author_desc_typo',
                            'label' => esc_html__( 'Desc Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .commentContent p',
                    ]
                );
                $this->add_responsive_control( 'author_desc_color', [
                            'label' => esc_html__( 'Desc Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .commentContent p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'author_desc_margin', [
                            'label' => esc_html__( 'Desc Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .commentContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('section_tab_author_btn', [
                            'label'     => esc_html__( 'Reply Btn Style', 'themewar' ),
                            'type'      => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_responsive_control( 'commentlist_btn_color', [
                            'label' => esc_html__( 'Btn color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singleComment .comment-reply-link'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'commentlist_btn_color_hr', [
                            'label' => esc_html__( 'Btn Hover color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singleComment .comment-reply-link:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('commentlist_position', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .singleComment .comment-reply-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('section_tab_author_cancle_hd', [
                            'label'     => esc_html__( 'Cancle Btn Style', 'themewar' ),
                            'type'      => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_responsive_control( 'section_tab_author_cancle_color', [
                            'label' => esc_html__( 'Btn color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .cancel_reply_btn a'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'section_tab_author_cancle_color_hr', [
                            'label' => esc_html__( 'Btn Hover color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .cancel_reply_btn a:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('section_tab_author_cancle_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .cancel_reply_btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();  

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Comment Form Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_control( 'comment_form_Area', [
                            'label' => esc_html__( 'Comment Form Area', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );

                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'comment_form_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .comment-respond ',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'comment_form_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .comment-respond',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'comment_form_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .comment-respond',
                        ]
                );
                $this->add_responsive_control('comment_form_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .comment-respond' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control( 'comment_form_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .comment-respond' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'comment_form_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .comment-respond' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_comment_form_style', [
                'label'         => esc_html__( 'Comment Form Content', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_control( 'comment_form_title', [
                                'label' => esc_html__( 'Form Title', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'comment_form_title_type',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .comment-respond h3',
                    ]
                );
                $this->add_responsive_control( 'comment_form_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .comment-respond h3'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'comment_form_title_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .comment-respond h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'comment_form_des', [
                                'label' => esc_html__( 'Form Required Desc', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'comment_form_desc_type',
                            'label' => esc_html__( 'Desc Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} p.commentDesc',
                    ]
                );
                $this->add_responsive_control( 'comment_form_desc_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} p.commentDesc'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'comment_form_desc_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} p.commentDesc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_control( 'comment_form_field', [
                        'label' => esc_html__( 'Form Field', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                        $this->add_group_control( Group_Control_Typography::get_type(), [
                                    'name'      => 'cf_field_typo',
                                    'label'     => esc_html__( 'Field Typography', 'themewar' ),
                                    'selector'  => '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .commentForm textarea, {{WRAPPER}} .commentForm select',
                            ]
                        );
                        $this->add_responsive_control( 'cf_text_color', [
                                    'label' => esc_html__( 'Text Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .concommentForm select' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm textarea' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm textarea::-moz-placeholder' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm form input::-moz-placeholder' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm textarea::-ms-input-placeholder' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm form input::-ms-input-placeholder' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'cf_bg_color', [
                                    'label' => esc_html__( 'Background Color', 'themewar' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .commentForm select' => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'background: {{VALUE}}',
                                            '{{WRAPPER}} .commentForm textarea' => 'background: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cf_borders',
                                    'label' => esc_html__( 'Field Border', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .commentForm select, {{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .commentForm textarea',
                            ]
                        );
                        $this->add_responsive_control( 'cf_field_radius', [
                                    'label' => esc_html__( 'Field Radius', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .commentForm select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .commentForm textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'cf_field_shadow',
                                    'label' => esc_html__( 'Field Shadow', 'themewar' ),
                                    'selector' => '{{WRAPPER}} .commentForm select, {{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .commentForm textarea, {{WRAPPER}} #contactForm select',
                            ]
                        );
                        $this->add_responsive_control( 'cf_field_margin', [
                                    'label' => esc_html__( 'Field Margin', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                            '{{WRAPPER}} .commentForm select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .commentForm textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'cf_field_padding', [
                                    'label' => esc_html__( 'Field Padding', 'themewar' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                            '{{WRAPPER}} .commentForm select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .commentForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .commentForm textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                $this->add_control( 'comment_form_button', [
                        'label' => esc_html__( 'Form Button', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'comment_form_button_type',
                            'label' => esc_html__( 'Button Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .commentForm button[type="submit"]',
                    ]
                );
                $this->start_controls_tabs('comment_frm_btn_tabs');
                        $this->start_controls_tab( 'comment_frm_normal_tab',[
                                'label' => esc_html__( 'Normal', 'textdomain' ),
                        ]);
                                $this->add_responsive_control( 'comment_form_button_color', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .commentForm button[type="submit"]'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                                ); 
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'comment_form_button_bg',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .commentForm button[type="submit"]',
                                    ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'comment_frm_hover_tab',[
                                'label' => esc_html__( 'Hover', 'textdomain' ),
                        ]);
                                $this->add_responsive_control( 'comment_form_button_color_hr', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .commentForm button[type="submit"]:hover'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                                );  
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'comment_form_button_bg_hr',
                                            'label' => esc_html__( 'Background', 'themewar' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .commentForm button[type="submit"]:hover',
                                    ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'comment_form_button_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .commentForm button[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'before',
                        ]
                );


        $this->end_controls_section();
        

    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();

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
  

        global $post;
        
        if (isset($post->ID) && $post->ID > 0 && (is_single() || is_page()) && (comments_open($post->ID) || get_comments_number($post->ID))): ?>
            <div class="logisfareCommentsArea <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <?php comments_template(); ?>
            </div>
        <?php endif; 
        
    }
    
    protected function content_template() {

    }
    
    
}