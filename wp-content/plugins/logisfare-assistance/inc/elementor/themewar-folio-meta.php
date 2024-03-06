<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Folio_meta_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-folio-meta';
    }
    
    public function get_title() {
        return esc_html__( 'Folio Meta', 'themewar' );
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
                    $repeater->add_control('meta_title', [
                                'label'             => esc_html__('Meta Title', 'themewar'),
                                'type'              => Controls_Manager::TEXT,
                                'label_block'       => TRUE,
                                'default'           => '',
                            ]
                    );
                    $repeater->add_control('meta_type', [
                            'label' => esc_html__( 'Meta Type', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'Category',
                            'options' => [
                                'Default' => esc_html__( 'Default', 'themewar' ),
                                'Category'  => esc_html__( 'Category', 'themewar' ),
                            ],
                        ]
                    );  
                    $repeater->add_control( 'meta_info', [
                                    'label'             => esc_html__( 'Meta Info Content', 'themewar' ),
                                    'type'              => Controls_Manager::TEXTAREA,
                                    'label_block'       => true,           
                                    'description'       => esc_html__('Use {} for link text.', 'themewar'),
                                    'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'meta_type',
                                                    'operator'  => '==',
                                                    'value'     => 'Default',
                                            ]
                                        ],
                                    ]
                            ]
                    );
                    $repeater->add_control( 'meta_url', [
                                'label'             => esc_html__( 'Meta URL', 'themewar' ),
                                'type'              => Controls_Manager::URL,
                                'input_type'        => 'url',
                                'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                                'show_external'     => true,
                                'default'           => [
                                        'url'            => '',
                                        'is_external'    => false,
                                        'nofollow'       => false,
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'meta_type',
                                                'operator'  => '==',
                                                'value'     => 'Default',
                                        ]
                                    ],
                                ]
                            ]
                    );
                $this->add_control( 'meta_list', [
                                'label'         => esc_html__( 'Meta Item', 'Themewar_Folio_meta_Widgets' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'meta_type'                 => 'Default',
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
                            'selector' => '{{WRAPPER}} .foliotMeta.singlefolioMeta',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'blg_meta_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .foliotMeta.singlefolioMeta ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'blg_meta_area_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .foliotMeta.singlefolioMeta',
                    ]
                );
                $this->add_responsive_control( 'blg_meta_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .foliotMeta.singlefolioMeta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_meta_area_mr',[
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .foliotMeta.singlefolioMeta ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_meta_area_pd',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .foliotMeta.singlefolioMeta ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab__wid_title', [
                        'label'         => esc_html__( 'Title Style', 'themewar' ),
                        'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_title_typo',
                                'label' => esc_html__( 'Title Typo', 'themewar' ),
                                'selector' => '{{WRAPPER}} .folioMetaTitle',
                        ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                                'label' => esc_html__( 'Color', 'themewar' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .folioMetaTitle'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .folioMetaTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3',[
                'label'         => esc_html__('Content Cat/Link Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name' => 'blg_cat_typo',
                            'label' => esc_html__( 'Cate/Link Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .folioMeta_cat a,{{WRAPPER}} .folioMeta_df span a',
                    ]
                );
                $this->add_responsive_control('blg_cat_color', [
                            'label' => esc_html__( 'Cate/Link Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_cat a' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .folioMeta_df span a' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('blg_cat_color_hr', [
                            'label' => esc_html__( 'Cat/Link Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_cat a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .folioMeta_df span a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('cat_margin_mr',[
                            'label' => esc_html__( 'Indicator margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_cat a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .folioMeta_df span a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
                );
                
                $this->add_control('blg_cat_style',[
                        'label'     => esc_html__( 'Category Indicator Style', 'orientate' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                        
                );
                $this->add_responsive_control('blg_cat_indicator_color', [
                            'label' => esc_html__( 'Cate Indicator Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_cat span' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name' => 'blg_cat_indicator_typo',
                            'label' => esc_html__( 'Cate Indicator Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .folioMeta_cat span',
                    ]
                );
                $this->add_responsive_control('content_margin_0988',[
                            'label' => esc_html__( 'Indicator margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_cat span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4',[
                'label'         => esc_html__('Normal Content Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name' => 'df_cnt_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .folioMeta_df span',
                    ]
                );
                $this->add_responsive_control('df_cnt_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_df span' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('df_cnt_margin',[
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .folioMeta_df span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
            <div class="foliotMeta singlefolioMeta clearfix <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <?php
                $terms  = get_the_terms($postID, 'folio_cat');
                $cats   = '';
                if (!empty($terms)){
                    $p = 1;
                    $c = count($terms);
                    foreach ($terms as $term){
                        if($p > 2){break;};
                        $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                        $cats .= ($p != $c && $p < 2 ? '<span>,&nbsp;</span>' : '');
                        $p++;
                    }
                }
                foreach($meta_list as $ts):
                    $meta_type          = (isset($ts['meta_type']) ? $ts['meta_type'] : '');
                    $meta_title         = (isset($ts['meta_title']) && $ts['meta_title'] != '') ? $ts['meta_title'] : '';
                    $meta_info          = (isset($ts['meta_info']) && $ts['meta_info'] != '') ? $ts['meta_info'] : '';
                    $meta_url           = (isset($ts['meta_url']['url']) && $ts['meta_url']['url'] != '') ? $ts['meta_url']['url'] : '';
                    $nofollow           = isset($ts['btn_url']['nofollow']) && !empty($ts['btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
                    $target             = isset($ts['btn_url']['is_external']) && !empty($ts['btn_url']['is_external']) ? ' target="_blank"' : '' ;
                    $meta_info_url      = str_replace(['{', '}'], ['<a class="folioMetaLink" '.esc_attr($target.' '.$nofollow).' href="'.esc_url($meta_url).'">', '</a>'], $meta_info);
                    switch($meta_type){
                        case('Category'):
                            if(!empty($cats)):
                                if(!empty($meta_title)): 
                                ?>
                                    <h3  class="folioMetaTitle"><?php echo esc_html($meta_title); ?></h3>
                                <?php endif; ?>
                                <div class="folioMeta_cat">
                                    <?php echo logisfare_kses($cats); ?>
                                </div>
                                <?php
                            endif;
                            break;
                        case('Default'):
                            if(!empty($meta_title)): 
                            ?>
                                <h3  class="folioMetaTitle"><?php echo esc_html($meta_title); ?></h3>
                            <?php endif; 
                            if(!empty($meta_info)): 
                            ?>
                                <div class="folioMeta_df">
                                    <span><?php echo wp_kses_post($meta_info_url); ?></span>
                                </div>
                            <?php
                            endif;
                            break;
                    }
                endforeach; 
                ?>
            </div>
        <?php endif;        
    }
    
    protected function content_template() {}
    
}