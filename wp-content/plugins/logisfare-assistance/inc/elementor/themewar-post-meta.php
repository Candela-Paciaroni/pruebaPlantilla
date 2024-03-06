<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Meta_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-meta';
    }
    
    public function get_title() {
        return esc_html__( 'Post Meta', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-meta-data';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Meta Info', 'themewar' ),
        ]);
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control('meta_type', [
                            'label' => esc_html__( 'Meta Type', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'Category',
                            'options' => [
                                'Category'  => esc_html__( 'Category', 'themewar' ),
                                'Author' => esc_html__( 'Author', 'themewar' ),
                                'Comment' => esc_html__( 'Comment Count', 'themewar' ),
                                'Date' => esc_html__( 'Date', 'themewar' ),
                                'View' => esc_html__( 'View Count', 'themewar' ),
                            ],
                        ]
                    );
                $this->add_control( 'meta_list', [
                                'label'         => esc_html__( 'Meta Item', 'themewar' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'meta_type'                 => 'Category',
                                        ],
                                        [
                                                'meta_type'                 => 'Author',
                                        ],
                                        [
                                                'meta_type'                 => 'Comment',
                                        ],
                                ],
                                'title_field' => '{{{ meta_type }}}',
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
                'label'         => esc_html__('Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'info_box_img_bgcolor_hr',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .singlePostMeta ',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'blg_meta_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singlePostMeta ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'blg_meta_area_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .singlePostMeta',
                    ]
                );
                $this->add_responsive_control( 'blg_meta_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .singlePostMeta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_meta_area_mr',[
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlePostMeta ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_meta_area_pd',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlePostMeta ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__('Item Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('icon_box_item_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .biMeta01 > div' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('icon_box+item_padding',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .biMeta01 > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .biMeta01.singlePostMeta' => 'column-gap: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .biMeta01.singlePostMeta' => 'row-gap: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3',[
                'label'         => esc_html__('Content Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control('content_style_heading',[
                        'label'     => esc_html__( 'Global Content Style', 'orientate' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name' => 'content_typo',
                                'label' => esc_html__( 'Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .postAuthor, {{WRAPPER}} .postComment, {{WRAPPER}} .postDate, {{WRAPPER}} .logisfareViewCount',
                        ]
                );
                $this->add_responsive_control('content_text_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .postAuthor' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .postComment' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .postDate' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .logisfareViewCount' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('content_text_hover_color', [
                                'label' => esc_html__( 'Link Hover Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .postAuthor a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .postComment a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .postDate a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .logisfareViewCount a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control('blg_met_icon',[
                        'label'     => esc_html__( 'Icon Style', 'orientate' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ] 
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name' => 'blg_meta_i_typo',
                                'label' => esc_html__( 'Icon Typography', 'themewar' ),
                                'selector' => '{{WRAPPER}} .postAuthor i, {{WRAPPER}} .postComment i, {{WRAPPER}} .postDate i, {{WRAPPER}} .logisfareViewCount i, {{WRAPPER}} .post_cat i',
                        ]
                );
                $this->add_responsive_control('blg_meta_i_color', [
                                'label' => esc_html__( 'Icon Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .postAuthor i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .postComment i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .postDate i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .logisfareViewCount i' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .post_cat i' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('blg_meta_i_mar',[
                            'label' => esc_html__( 'Icon Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .postAuthor i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .postComment i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .postDate i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logisfareViewCount i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .post_cat i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );

                $this->add_control('blg_cat_style',[
                        'label'     => esc_html__( 'Category Style', 'orientate' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]   
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name' => 'blg_cat_typo',
                            'label' => esc_html__( 'Cate Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .post_cat a',
                    ]
                );
                $this->add_responsive_control('blg_cat_color', [
                            'label' => esc_html__( 'Cate Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .post_cat a' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_cat_color_hr', [
                            'label' => esc_html__( 'Cate Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .post_cat a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_cat_indicator_color', [
                            'label' => esc_html__( 'Cate Indicator Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .post_cat span' => 'background: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('content_margin_0988',[
                            'label' => esc_html__( 'Indicator margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .post_cat span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $meta_list      = (isset($settings['meta_list']) && !empty($settings['meta_list'])) ? $settings['meta_list'] : array();
        
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
        $postID = $post->ID;
        $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'd M, Y');

        if(!empty($meta_list) && $postID > 0 && is_single()): ?>
            <div class="biMeta01 singlePostMeta clearfix <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <?php
                $terms  = get_the_terms($postID, 'category');
                $cats   = '';
                if (!empty($terms)){
                    $p = 1;
                    $c = count($terms);
                    foreach ($terms as $term){
                        if($p > 2){break;};
                        $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                        $cats .= ($p != $c && $p < 2 ? '<span></span>' : '');
                        $p++;
                    }
                }
                foreach($meta_list as $ts):
                    $meta_type       = (isset($ts['meta_type']) ? $ts['meta_type'] : '');
                    switch($meta_type){
                        case('Category'):
                            if(!empty($cats)):
                                ?>
                                <div class="post_cat">
                                    <i class="logisfare-tag"></i>
                                    <?php echo logisfare_kses($cats); ?>
                                </div>
                                <?php
                            endif;
                            break;
                        case('Author'):
                            ?>
                            <div class="postAuthor">
                                <i class="themewar_user"></i>
                                <?php echo esc_html__('By ', 'themewar'); ?>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
                            </div>
                            <?php
                            break;
                        case('Comment'):
                            ?>
                            <div class="postComment">
                                <i class="themewar_comments"></i>
                                <a href="#comments"><?php comments_number( '0 '.esc_html__('Comments', 'themewar'), '1 '.esc_html__('Comment', 'themewar'), '% '.esc_html__('Comments', 'themewar') ); ?></a>
                            </div>
                            <?php
                            break;
                        case('Date'):
                            ?>
                            <div class="postDate">
                                <a href="javascript:void(0);"><?php echo get_the_date('d M , Y') ?></a>
                            </div>
                            <?php
                            break;
                        case('View'):
                            echo do_shortcode('[post_view pid="'.$postID.'"]');
                            break;
                    }
                endforeach; 
                ?>
            </div>
        <?php endif;        
    }
    
    protected function content_template() {}
    
}