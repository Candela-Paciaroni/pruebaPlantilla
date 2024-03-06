<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Category_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-category-post';
    }
    
    public function get_title() {
        return esc_html__( 'Category Widget', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-product-categories';
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
                $this->add_control('lb_category', [
                            'label' => esc_html__('Blog Category', 'themewar'),
                            'type' => 'themewar_autocomplete',
                            'description' => esc_html__('Select blog category.', 'themewar'),
                            'action' => 'themewar_get_taxonomy',
                            'taxonomy' => 'category',
                            'multiple' => true,
                    ]
                );
                $this->add_control( 'lb_num_of_item', [
                            'label' => esc_html__( 'Number of Items', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                            'default' => 5
                    ]
                );
                $this->add_control( 'lb_order_by', [
                            'label' => esc_html__( 'Order By', 'themewar' ),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                    'id'                  => esc_html__( 'ID', 'themewar' ),
                                    'name'                 => esc_html__( 'Name', 'themewar' ),
                                    'count'                  => esc_html__( 'Count', 'themewar' ),
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
                'label'         => esc_html__( 'Widget Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_item_bg',
                                'label' => esc_html__( 'Item Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .post_category_widget',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_item_border',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .post_category_widget',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_item_shadow',
                                'label' => esc_html__( 'Widget Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .post_category_widget',
                        ]
                );
                $this->add_responsive_control( 'lb_item_readius', [
                                'label'      => esc_html__( 'Border Radius', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .post_category_widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_margin', [
                                'label'      => esc_html__( 'Margin', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .post_category_widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_padding', [
                                'label'      => esc_html__( 'Padding', 'themewar' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .post_category_widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__( 'Navigation Area', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control( 'nav_area_magrins', [
                            'label'      => esc_html__( 'Area Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postCategorys' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'nav_area_paddings', [
                            'label'      => esc_html__( 'Area Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .postCategorys' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__( 'Navigation Items', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'wid_heading_02', [
                        'label' => esc_html__( 'List Item Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'widget_li_border',
                            'label' => esc_html__( 'Item Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .post_category_widget ul li',
                    ]
                );
                $this->add_responsive_control( 'wid_li_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .post_category_widget ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                
                $this->add_control( 'wid_heading_03', [
                        'label' => esc_html__( 'Nav Item Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'wid_a_typo',
                            'label' => esc_html__( 'Nav Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .post_category_widget ul li a',
                    ]
                );
                $this->start_controls_tabs( 'style_nav_01' );
                    $this->start_controls_tab('style_nav_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ), ]);
                        $this->add_responsive_control( 'wid_a_color', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .post_category_widget ul li a'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'wid_a_bg_color', [
                                    'label' => esc_html__( 'BG Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .post_category_widget ul li a'   => 'background: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'wid_a_padding', [
                                    'label' => esc_html__( 'Padding', 'themewar' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .post_category_widget ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('style_nav_hover', [ 'label' => esc_html__( 'Hover/Active', 'themewar' ), ]);
                        $this->add_responsive_control( 'wid_a_color_h', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .post_category_widget ul li a:hover'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'wid_a_bg_color_h', [
                                    'label' => esc_html__( 'BG Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .post_category_widget .postCategorys li a:hover'   => 'background: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_responsive_control( 'wid_a_padding_h', [
                                    'label' => esc_html__( 'Padding', 'themewar' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .post_category_widget .postCategorys li a:hover ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'wid_a_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .post_category_widget .postCategorys li a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            
                    ]
                );
                
                $this->add_control( 'wid_heading_04', [
                        'label' => esc_html__( 'Nav Items Icon', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'wid_ai_typo',
                            'label' => esc_html__( 'Nav Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .post_category_widget ul li a i',
                    ]
                );
                $this->add_responsive_control( 'wid_ai_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .post_category_widget ul li a i'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'wid_ai_color_hr', [
                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .post_category_widget ul li a:hover i'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'wid_ai_position', [
                            'label' => esc_html__( 'Icon Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['top', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .post_category_widget ul li a i' => 'top: {{TOP}}{{UNIT}}; left: {{left}}{{UNIT}}',
                            ],
                    ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();

        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $lb_category            = (isset($settings['lb_category']) && !empty($settings['lb_category'])? $settings['lb_category'] : array());
        $lb_order_by            = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'id';
        $lb_order               = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';

        $lb_num_of_item         = (isset($settings['lb_num_of_item']) && $settings['lb_num_of_item'] > 0) ? $settings['lb_num_of_item'] : 5;

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
  
  

        if (($key = array_search(0, $lb_category)) !== false) {
            unset($lb_category[$key]);
        }
        $args = [
            'taxonomy'      => 'category',
            'orderby'       => $lb_order_by,
            'number'        => $lb_num_of_item,
            'order'         => $lb_order
        ];
        if(!empty($lb_category)):
            $args['include']    = $lb_category;
        endif;
        ?>
        
        <aside class="widget post_category_widget <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if(!empty($widget_title)): ?>
                <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <?php
            $cats = get_categories($args);
            $termID = get_queried_object()->term_id;
            if(!empty($cats)):
                echo '<ul class="postCategorys">';
                    $i = 1;
                    foreach($cats as $cat):
                        if($cat->count > 0):
                            ?>
                            <li class="blogCatItem cat-item-<?php echo $i;?>">
                                <a class=" <?php echo ($termID == $cat->term_id ? 'active' : ''); ?>" href="<?php echo get_category_link($cat->term_id);?>">
                                    <span><?php echo esc_html($cat->name)?></span>
                                    <i class="themewar_arrow-right"></i>
                                </a>
                            </li>
                        <?php
                        endif;
                        $i++; 
                    endforeach;
                echo '</ul>';
            endif;
            ?>
        </aside>
      <?php
    }
    
    protected function content_template() {
        
    }
}