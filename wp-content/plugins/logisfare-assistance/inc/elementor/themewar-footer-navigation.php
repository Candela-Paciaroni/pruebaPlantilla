<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Navigation_Widgets extends Widget_Base {

    public function get_name() {
        return 'tw-navigation';
    }

    public function get_title() {
        return esc_html__( 'Navigation Menu', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['themewar-footer-elements'];
    }

    protected function register_controls() {
        
        $menu = wp_get_nav_menus();
        $menulist = array('0' => esc_html__('None', 'themewar'));
        if(!empty($menu)){
            foreach ($menu as $mn){
                $menulist[$mn->term_id] = $mn->name;
            }
        }
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'Navigation', 'themewar' ),
        ]);
                $this->add_control('widget_title', [
                            'label'             => esc_html__('Widget Title', 'themewar'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                    ]
                );
                $this->add_control('navigation_select',[
                            'label'     => esc_html__( 'Select Navigation', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '0',
                            'options'   => $menulist,
                    ]
                );
                $this->add_control( 'is_inline', [
                            'label'             => esc_html__( 'Is Inline?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to make this inline item?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_responsive_control('menu_align', [
                            'label'			=> esc_html__( 'Alignment', 'themewar' ),
                            'type'			=> Controls_Manager::CHOOSE,
                            'options'                => [
                                    'left'           => [
                                            'title'  => esc_html__( 'Left', 'themewar' ),
                                            'icon'   => 'eicon-text-align-left',
                                    ],
                                    'center'         => [
                                            'title'  => esc_html__( 'Center', 'themewar' ),
                                            'icon'   => 'eicon-text-align-center',
                                    ],
                                    'right'          => [
                                            'title'  => esc_html__( 'Right', 'themewar' ),
                                            'icon'   => 'eicon-text-align-right',
                                    ]
                            ],
                            'default'		 => 'left',
                            'prefix_class'           => 'menu_nav elementor%s-align-',
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

        $this->start_controls_section('section_tab_3',[
                'label'         => esc_html__('Navigation Area', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'nav_area_bg',
                            'label' => esc_html__( 'Area Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'nav_area_border',
                            'label' => esc_html__( 'Area Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .footerWidget',
                    ]
                );
                $this->add_responsive_control('nav_area_mr', [
                            'label'      => esc_html__( 'Area margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'nav_area_pd',[
                            'label'      => esc_html__( 'Area padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .footerWidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__( 'Widget Title Style', 'themewar' ),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('st_color', [
                            'label'		 => esc_html__( 'Color', 'themewar' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .widgetTitle' => 'color: {{VALUE}};'
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                            'name'      => 'st_typography',
                            'label'     => esc_html__( 'Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .widgetTitle',
                    ]
                );
                $this->add_responsive_control('st_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .widgetTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'st_margin',[
                            'label' => esc_html__( 'Marigns', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_control('widget_title_heading',[
                            'label' => esc_html__( 'Widget Title After', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_title_shape',
                                'label' => esc_html__( 'Area Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .widgetTitle:after',
                        ]
                );
                $this->add_responsive_control('widget_title_shape_w',[
                                'label'      => esc_html__( 'Width', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('widget_title_shape_h',[
                                'label'      => esc_html__( 'Height', 'themewar' ),
                                'type'       => Controls_Manager::SLIDER,
                                'size_units' => 'px',
                                'range'      => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 500,
                                                'step' => 1,
                                        ],
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .widgetTitle:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'widget_shape_position', [
                            'label' => esc_html__( 'Position', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['top', 'left'],
                            'selectors' => [
                                    '{{WRAPPER}} .widgetTitle:after' => 'top: {{TOP}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_4',[
                'label'         => esc_html__('Navigation Items', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'nav_items_typo',
                            'label'     => esc_html__( 'Text Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} ul.menu li a, {{WRAPPER}} .inlineMenu ul li a',
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                            'name'      => 'nav_items_i_typo',
                            'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} ul.menu li a:before, {{WRAPPER}} .inlineMenu ul li a:before',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(),[
                            'name'      => 'nav_items_color',
                            'label'     => esc_html__( 'Border', 'themewar' ),
                            'selector'  => '{{WRAPPER}} ul.menu li a, {{WRAPPER}} .inlineMenu ul li a',
                    ]
                );
                $this->add_responsive_control( 'nav_items_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} ul.menu li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .inlineMenu ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after'
                    ]
                );
                $this->start_controls_tabs( 'style_tabs_1' );
                        $this->start_controls_tab('btn_1_button_style_normal', [
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'btn_1_label_color',[
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} ul.menu li a' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .inlineMenu ul li a' => 'color: {{VALUE}}',
                                            ],
                                    ]
                                );
                                $this->add_responsive_control( 'btn_1_bg_color',[
                                            'label' => esc_html__( 'BG Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} ul.menu li a' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .inlineMenu ul li a' => 'background: {{VALUE}}',
                                            ],
                                    ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('btn_1_button_style_hover', [
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'btn_label_hover_color',[
                                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} ul.menu li a:hover'  => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .inlineMenu ul li a:hover'  => 'color: {{VALUE}}',
                                            ],
                                    ]
                                );
                                $this->add_responsive_control('btn_1_bg_hover_color',[
                                            'label' => esc_html__( 'Hover BG Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} ul.menu li a:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .inlineMenu ul li a:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                                );
                                $this->add_responsive_control( 'list_hover_padding',[
                                            'label'      => esc_html__( 'Item Hover Margin', 'themewar' ),
                                            'type'       => Controls_Manager::DIMENSIONS,
                                            'size_units' => [ 'px', '%', 'em' ],
                                            'allowed_dimensions' => ['right'],
                                            'selectors'  => [
                                                '{{WRAPPER}} ul.menu li a:hover:before' => 'padding-right: {{RIGHT}}{{UNIT}};',
                                                '{{WRAPPER}} .inlineMenu ul li a:hover:before' => 'padding-right: {{RIGHT}}{{UNIT}};',
                                            ],
                                    ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();

                $this->add_control('nav_item_column_gap',[
                        'label' => esc_html__( 'Column Gap', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .inlineMenu ul' => 'column-gap: {{SIZE}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'is_inline',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control('nav_item_row_gap',[
                        'label' => esc_html__( 'Row Gap', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .inlineMenu ul' => 'row-gap: {{SIZE}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'is_inline',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_responsive_control( 'nav_items_mr', [
                            'label'      => esc_html__( 'List Item margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'separator'  => "before",
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'is_inline',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ],
                                ],
                            ],
                            'selectors'  => [
                                '{{WRAPPER}} ul.menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .inlineMenu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'nav_items_li_mr', [
                            'label'      => esc_html__( 'List Item margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'separator'  => "before",
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'is_inline',
                                            'operator'  => '!=',
                                            'value'     => 'yes',
                                    ],
                                ],
                            ],
                            'selectors'  => [
                                '{{WRAPPER}} ul.menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .inlineMenu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'nav_items_pd',[
                            'label'      => esc_html__( 'List Item padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} ul.menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .inlineMenu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $navigation_select      = (isset($settings['navigation_select']) && $settings['navigation_select'] != '') ? $settings['navigation_select'] : '';
        $is_inline              = $settings['is_inline'];

        
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
        <aside class="footerWidget aboutFooterNav <?php if($is_inline == 'yes'): ?>inlineMenu<?php endif; ?> <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
            <?php if($widget_title != ''): ?>
                <h3 class="widgetTitle"><?php echo logisfare_kses($widget_title); ?></h3>
            <?php endif; ?>
            <?php wp_nav_menu(array('menu' => $navigation_select)); ?>
        </aside>
        <?php
        
    }

    protected function content_template() {}    
}