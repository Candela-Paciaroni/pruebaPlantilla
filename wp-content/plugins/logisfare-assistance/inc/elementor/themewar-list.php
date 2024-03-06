<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_List_Widgets extends Widget_Base {

    public function get_name() {
        return 'themewar-lists';
    }
    public function get_title() {
        return esc_html__('List Items', 'themewar');
    }
    public function get_icon() {
        return 'eicon-editor-list-ul';
    }
    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'         => esc_html__( 'List Items', 'themewar' ),
        ]);
                $repeater = new \Elementor\Repeater();
                $repeater->add_control('list_icon_img',[
                            'label'     => esc_html__( 'Icon Or Image', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 1,
                            'options'   => [
                                    1       => esc_html__( 'Icon', 'themewar' ),
                                    2       => esc_html__( 'Image', 'themewar' ),
                            ],
                    ]
                );
                $repeater->add_control('cu_list_icons',[
                            'label' => esc_html__( 'Title After Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_check',
                                'library' => 'tw_icon',
                            ],
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'list_icon_img',
                                            'operator'  => '==',
                                            'value'     => '1',
                                    ]
                                ],
                            ],
                    ]
                );
                $repeater->add_control( 'icon_img', [
                            'label'         => esc_html__( 'Icon Image', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Upload square size image.', 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                    [
                                            'name'      => 'list_icon_img',
                                            'operator'  => '==',
                                            'value'     => '2',
                                    ]
                                ],
                            ],
                    ]
                );
                $repeater->add_control('list_icon_position',[
                            'label'     => esc_html__( 'Icon Or Image Position', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => 'static',
                            'options'   => [
                                    'static'        => esc_html__( 'static', 'themewar' ),
                                    'relative'      => esc_html__( 'relative', 'themewar' ),
                                    'absolute'      => esc_html__( 'absolute', 'themewar' ),
                            ],
                    ]
                );
                $repeater->add_control('cu_list_items', [
                            'label'         => esc_html__( 'Item Content', 'themewar' ),
                            'type'          => Controls_Manager::TEXTAREA,
                            'default'       => esc_html__( 'List Content' , 'themewar' ),
                            'label_block'   => true,
                            'separator'     => 'before',
                    ]
                );
                $this->add_control('cu_list_list',[
                            'label'         => esc_html__( 'List Items', 'themewar' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                [
                                    'list_icon_img'         => 1,
                                    'list_icon_position'    => 'static',
                                    'cu_list_items'         => 'List Content',
                                    'icon_img'              => '',
                                    'cu_list_icons'         => array(),
                                ],
                            ],
                            'title_field' => '{{{ cu_list_items }}}',
                    ]
                );
                $this->add_responsive_control('list_align', [
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
                            'prefix_class'              => 'list_align elementor%s-align-',
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
                                'label' => esc_html__( 'Animation Start Duration(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_duration_inc',[
                                'label' => esc_html__( 'Animation Duration Increment', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_delay',[
                                'label' => esc_html__( 'Animation Start Delay(ms)', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
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
                $this->add_control('animation_delay_inc',[
                                'label' => esc_html__( 'Animation Delay Increment', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 50,
                                'max' => 3000,
                                'step' => 10,
                                'default' => 20,
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
                'label'  => esc_html__( 'Area Style', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);      
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'li_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .logisfareList',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'li_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareList',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'li_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareList',
                    ]
                );
                $this->add_responsive_control( 'li_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareList' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'li_area_mr', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'li_area_pd', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_3', [
                'label'  => esc_html__( 'Listing Icon', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);      
                 $this->add_group_control( Group_Control_Typography::get_type(),[
                                'name'      => 'icon_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logisfareList li i',
                        ]
                );
                $this->add_responsive_control('list_icon_color',[
                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li i' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('list_icon_positioning',[
                                'label' => esc_html__( 'Icon Position', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li i' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'list_icon_margin',[
                                'label' => esc_html__( 'Icon Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['left', 'right'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li i' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_svg', [
                'label'  => esc_html__( 'SVG Icon Style', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);    
                $this->add_responsive_control( 'icon_box_svg_fill_nr',[
                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li > svg' => 'fill: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'icon_box_svg_stroke',[
                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li > svg' => 'stroke: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'icon_box_svg_stroke_width',[
                            'label'     => esc_html__( 'SVG Stroke Width', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 0.1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li > svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                            ]
                    ]
                );	
                $this->add_responsive_control( 'icon_box_svg_width', [
                                'label' => esc_html__( 'SVG Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li > svg' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_svg_height', [
                                'label' => esc_html__( 'SVG Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li > svg' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('list_svg_positioning',[
                                'label' => esc_html__( 'Icon Position', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li > svg' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'list_svg_margin',[
                                'label' => esc_html__( 'Icon Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px'],
                                'allowed_dimensions' => ['left', 'right'],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li > svg' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section( 'section_tab_4', [
                'label'  => esc_html__( 'Image Icon', 'themewar' ),
                'tab'    => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control( 'icon_box_i_width', [
                                'label' => __( 'Width', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li img' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_height', [
                                'label' => __( 'Height', 'themewar' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .logisfareList li img' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('list_img_positioning',[
                            'label' => esc_html__( 'Image Icon Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['top', 'bottom'],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li img' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('list_iimg_margin',[
                            'label' => esc_html__( 'Image Icon Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li img' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label'	 => esc_html__( 'List Content Styling', 'themewar' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_responsive_control('cu_list_color',[
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .logisfareList li' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(),[
                                'name'      => 'cu_list_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .logisfareList li',
                        ]
                );
                $this->add_responsive_control('cu_list_margin',[
                            'label' => esc_html__( 'Item Marign', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareList li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('cu_list_padding',[
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logisfareList li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();
        $lists           = (isset($settings['cu_list_list']) && !empty($settings['cu_list_list']) ? $settings['cu_list_list'] : array()); 
        
            
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.'' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.'' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay. '' : '');
        }


        if(count($lists) > 0): ?>
        
        <ul class="logisfareList <?php echo esc_attr($animClass);?>" <?php echo esc_attr($animAttr); ?>>
            <?php 
                //   list_icon_img
                $i = 1; 
                foreach ($lists as $item):

                    $icon_img   = (isset($item['icon_img']['url'])) ? $item['icon_img']['url'] : '';
                    $icons      = (isset($item['cu_list_icons']) && $item['cu_list_icons'] !='') ? $item['cu_list_icons'] : '';
                    $cu_list_items  = (isset($item['cu_list_items'])) ? $item['cu_list_items'] : '';
                    $list_icon_position  = (isset($item['list_icon_position'])) ? $item['list_icon_position'] : 'static';
                ?>
                <li class="logicList_item icon-<?php echo esc_attr($list_icon_position); ?>" >
                    <?php if($icons != ''): ?>
                        <?php \Elementor\Icons_Manager::render_icon( $item['cu_list_icons'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif; ?>
                    <?php if($icon_img != ''): ?>
                        <img src="<?php echo esc_url($icon_img); ?>" alt="<?php echo esc_attr('icon', 'themewar') ?>" >
                    <?php endif; ?>
                    <?php echo wp_kses_post($cu_list_items); ?>
                </li>
                <?php 
                $i++;
                endforeach;
            ?>
        </ul>
        <?php endif;
    }
    
    protected function content_template() {}
}