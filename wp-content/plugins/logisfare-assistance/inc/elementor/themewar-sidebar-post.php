<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-blog-post';
    }
    
    public function get_title() {
        return esc_html__( 'Recent Post Widget', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'themewar-sidebar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Blog Post', 'themewar' ),
        ]);      
                $this->add_control('widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                    ]
                );
                $this->add_control( 'lb_specific', [
                            'label'         => esc_html__( 'Specific Post', 'themewar' ),
                            'type'          => Controls_Manager::SELECT2,
                            'label_block'   => TRUE,
                            'multiple'      => true,
                            'default'       => array('0'),
                            'options'       => logisfare_post_array('post', esc_html__('All Post', 'themewar')),
                    ]
                );
                $this->add_control( 'lb_post_item', [
                            'label'         => esc_html__( 'Number Of Item', 'themewar' ),
                            'type'          => Controls_Manager::NUMBER,
                            'min'           => 1,
                            'max'           => 200,
                            'step'          => 1,
                            'default'       => 3,
                            'description'   => esc_html__( 'How many item you want to show.', 'themewar' ),
                    ]
                );
                $this->add_control( 'lb_order_by', [
                            'label' => esc_html__( 'Order By', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                    'date'                  => esc_html__( 'Date', 'themewar' ),
                                    'title'                 => esc_html__( 'Title', 'themewar' ),
                                    'rand'                  => esc_html__( 'Random', 'themewar' ),
                                    'comment_count'         => esc_html__( 'Comment', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'lb_order', [
                            'label' => esc_html__( 'Order', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                    'asc'        => esc_html__( 'Ascending', 'themewar' ),
                                    'desc'       => esc_html__( 'Descending', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control('lb_category', [
                            'label' => esc_html__('Blog Category', 'themewar'),
                            'type' => 'themewar_autocomplete',
                            'description' => esc_html__('Select blog category.', 'themewar'),
                            'action' => 'themewar_get_taxonomy',
                            'taxonomy' => 'category',
                            'multiple' => true,
                    ]
                );
                $this->add_control('lb_tag', [
                            'label' => esc_html__('Blog Tag', 'themewar'),
                            'type' => 'themewar_autocomplete',
                            'description' => esc_html__('Select blog tags.', 'themewar'),
                            'action' => 'themewar_get_taxonomy',
                            'taxonomy' => 'post_tag',
                            'multiple' => true,
                    ]
                );
                $this->add_control( 'post_title_length', [
                            'label'     => esc_html__( 'Post Title Length', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                            'default' => 43,
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
        
        $this->start_controls_section( 'section_tab_01', [
                'label'         => esc_html__( 'Widget Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_item_bg',
                            'label' => esc_html__( 'Item Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .latest_post_widget',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_item_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latest_post_widget',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_item_shadow',
                            'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latest_post_widget',
                    ]
                );
                $this->add_responsive_control( 'lb_item_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latest_post_widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_item_padding', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latest_post_widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_item_margin', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latest_post_widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab__wid_title', [
                'label'         => esc_html__( 'Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'wid_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .widgetTitle',
                    ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
                
        $this->start_controls_section( 'section_tab_03', [
                'label'         => esc_html__( 'Content Area Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'lb_cont_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .latestPost',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_cont_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latestPost',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_cont_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latestPost',
                    ]
                );
                $this->add_responsive_control( 'lb_cont_readius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_margin', [
                            'label'      => esc_html__( 'Item Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_cont_padding', [
                            'label'      => esc_html__( 'Item Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

                $this->add_control( 'lb_cont_heading_01', [
                            'label' => esc_html__( 'Blog Meta Styling', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_typo',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .latestPost p',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_color',[
                            'label'     => esc_html__( 'Text Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .latestPost p' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_meta_icon_typo',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .latestPost p i',
                    ]
                );
                $this->add_responsive_control( 'lb_meta_icon_color',[
                            'label'     => esc_html__( 'Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .latestPost p i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_area_margin', [
                            'label'      => esc_html__( 'Meta Area Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_meta_area_padding', [
                            'label'      => esc_html__( 'Meta Area Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'lb_cont_heading_02', [
                        'label' => esc_html__( 'Blog Title Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'lb_btitle_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .latestPost h3',
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .latestPost h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_btitle_color_hover',[
                            'label'     => esc_html__( 'Hover Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .latestPost h3 a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_margin', [
                            'label'      => esc_html__( 'Title Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_title_padding', [
                            'label'      => esc_html__( 'Title Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'lb_cont_heading_03', [
                        'label' => esc_html__( 'Blog Image Styling', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'lb_item_img_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latestPost > img',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'lb_item_img_shadow',
                            'label' => esc_html__( 'Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .latestPost > img',
                    ]
                );
                $this->add_responsive_control( 'lb_item_img_readius', [
                            'label'      => esc_html__( 'Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .latestPost > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'lb_item_img_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .latestPost > img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';

        $lb_specific            = (isset($settings['lb_specific']) && !empty($settings['lb_specific'])? $settings['lb_specific'] : array());
        $lb_category            = (isset($settings['lb_category']) && !empty($settings['lb_category'])? $settings['lb_category'] : array());
        $lb_tag                 = (isset($settings['lb_tag']) && !empty($settings['lb_tag'])? $settings['lb_tag'] : array());
        
        $lb_post_item           = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by            = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order               = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        
        $lb_post_thumb_width    = (isset($settings['lb_post_thumb_width']) && $settings['lb_post_thumb_width'] > 0) ? $settings['lb_post_thumb_width'] : '';
        $lb_post_thumb_height   = (isset($settings['lb_post_thumb_height']) && $settings['lb_post_thumb_height'] > 0) ? $settings['lb_post_thumb_height'] : '';
        
        $post_title_length      = (isset($settings['post_title_length']) && $settings['post_title_length'] != '') ? $settings['post_title_length'] : '';
        
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


        include dirname(__FILE__).'/style/widget-post/style1.php';
    }
    
    protected function content_template() {
        
    }
}