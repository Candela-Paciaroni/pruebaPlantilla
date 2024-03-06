<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Heading_Widget extends Widget_Base {
    public function get_name() {
        return 'themewar-heading';
    }

    public function get_title() {
        return esc_html__('Headings', 'themewar');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['themewar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Heading', 'themewar' ),
            ]
        );
            $this->add_control('heading_style', [
                            'label' => esc_html__( 'Heading Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '0',
                            'options' => [
                                    '0'  => esc_html__( 'None', 'themewar' ),
                                    '1' => esc_html__( 'Section Sub Title', 'themewar' ),
                                    '2' => esc_html__( 'Section Title', 'themewar' )
                            ],
                    ]
            );
            $this->add_control( 'heading_tag', [
                            'label' => esc_html__( 'Tag', 'themewar' ),
                            'type' => Controls_Manager::SELECT,
                            'description'   => esc_html__('Select HTML tag that you want to use.', 'themewar'),
                            'default' => '2',
                            'options' => [
                                    '1' => esc_html__( 'H1', 'themewar' ),
                                    '2' => esc_html__( 'H2', 'themewar' ),
                                    '3' => esc_html__( 'H3', 'themewar' ),
                                    '4' => esc_html__( 'H4', 'themewar' ),
                                    '5' => esc_html__( 'H5', 'themewar' ),
                                    '6' => esc_html__( 'H6', 'themewar' ),
                            ],
                            'conditions'        => [
                                'terms'         => [
                                    [
                                            'name'      => 'heading_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control( 'show_icon', [
                            'label'             => esc_html__( 'Show Subtitle Icon?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Show', 'themewar' ),
                            'label_off'         => esc_html__( 'Hide', 'themewar' ),
                            'return_value'      => 'yes',
                            'default'           => 'yes',
                            'conditions'        => [
                                'terms'         => [
                                    [
                                            'name'      => 'heading_style',
                                            'operator'  => 'in',
                                            'value'     => ['1'],
                                    ]
                                ],
                            ],
                    ]
            ); 
            $this->add_control('show_icon_style', [
                            'label' => esc_html__( 'Icon Style', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                    '1' => esc_html__( 'Single Icon', 'themewar' ),
                                    '2' => esc_html__( 'Double Icon', 'themewar' )
                            ],
                            'conditions'        => [
                                'terms'         => [
                                    [
                                            'name'      => 'heading_style',
                                            'operator'  => 'in',
                                            'value'     => ['1'],
                                    ],
                                    [
                                            'name'      => 'show_icon',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control('sub_title_icon1',[
                        'label' => esc_html__( 'Title Before Icon', 'themewar' ),
                        'type' => Controls_Manager::ICONS,
                        'label_block'   => TRUE,
                        'default' => [
                            'value' => 'logisfare-left_sec',
                            'library' => 'tw_icon',
                        ],
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'heading_style',
                                        'operator'  => 'in',
                                        'value'     => ['1'],
                                ],
                                [
                                        'name'      => 'show_icon',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                                [
                                        'name'      => 'show_icon_style',
                                        'operator'  => '==',
                                        'value'     => 2,
                                ]
                            ],
                        ],
                ]
            );
            $this->add_control('sub_title_icon2',[
                        'label' => esc_html__( 'Title After Icon', 'themewar' ),
                        'type' => Controls_Manager::ICONS,
                        'label_block'   => TRUE,
                        'default' => [
                            'value' => 'logisfare-right_sec',
                            'library' => 'tw_icon',
                        ],
                        'conditions'        => [
                            'terms'         => [
                                [
                                        'name'      => 'heading_style',
                                        'operator'  => 'in',
                                        'value'     => ['1'],
                                ],
                                [
                                        'name'      => 'show_icon',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ]
                            ],
                        ],
                ]
            );
            $this->add_control('heading_text', [
                        'label'             => esc_html__('Heading Text', 'themewar'),
                        'type'              => Controls_Manager::TEXTAREA,
                        'label_block'       => TRUE,
                        'default'           => esc_html__('This is Heading', 'themewar')
                    ]
            );
            $this->add_responsive_control('heading_alignment', [
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
                            'prefix_class'              => 'themewar_headings elementor%s-align-',
                    ]
            );
        $this->end_controls_section(); 
        
        $this->start_controls_section('section_tab_logisAnimation', [
                'label' => esc_html__( 'LogisFare Animation', 'themewar' ),
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
                    'label'         => esc_html__( 'Heading Style', 'themewar' ),
                    'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control('heading_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .subTitle' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .secTitle' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h1' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h2' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h3' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h4' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h5' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} h6' => 'color: {{VALUE}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'heading_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .subTitle, {{WRAPPER}} .secTitle, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
                        ]
                );
                $this->add_responsive_control( 'heading_margin', [
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .secTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_2', [
                    'label'         => esc_html__( 'Icon Style', 'themewar' ),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'heading_style',
                                    'operator'  => 'in',
                                    'value'     => ['1'],
                            ]
                        ],
                    ],
            ]
        );
                $this->add_responsive_control('icon_color', [
                                'label'		 => esc_html__( 'Color', 'themewar' ),
                                'type'		 => Controls_Manager::COLOR,
                                'selectors'	 => [
                                    '{{WRAPPER}} .subTitle i' => 'color: {{VALUE}};'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .subTitle i',
                        ]
                );
                $this->add_responsive_control( 'icon_margin', [
                                'label' => esc_html__( 'Before Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .subTitle > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'show_icon_style',
                                                'operator'  => 'in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_margin_after', [
                                'label' => esc_html__( 'After Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .subTitle i:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('sub_title_svg',[
                'label'         => esc_html__('SVG Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'        => [
                    'terms'         => [
                        [
                                'name'      => 'heading_style',
                                'operator'  => 'in',
                                'value'     => ['1'],
                        ]
                    ],
                ],
        ]);     
                $this->add_responsive_control( 'sub_title_svg_fill',[
                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle svg' => 'fill: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'sub_title_svg_stroke',[
                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .subTitle svg' => 'stroke: {{VALUE}}',
                            ]
                    ]
                );
                $this->add_responsive_control( 'sub_title_svg_stroke_width',[
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
                                    '{{WRAPPER}} .subTitle svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                            ]
                    ]
                );	
                $this->add_responsive_control( 'sub_title_svg_width', [
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
                                        '{{WRAPPER}} .subTitle svg' => 'width: {{SIZE}}{{UNIT}};',

                                ]
                        ]
                );
                $this->add_responsive_control( 'sub_title_svg_height', [
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
                                        '{{WRAPPER}} .subTitle svg' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'svg_before_margin', [
                                'label' => esc_html__( 'Before Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .subTitle > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'show_icon_style',
                                                'operator'  => 'in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'svg_after_margin', [
                                'label' => esc_html__( 'After Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .subTitle svg:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        $heading_style          = (isset($settings['heading_style']) && $settings['heading_style'] !='') ? $settings['heading_style'] : 0;
        $heading_tag            = (isset($settings['heading_tag']) && $settings['heading_tag'] !='') ? $settings['heading_tag'] : '2';
        $heading_text           = (isset($settings['heading_text']) && $settings['heading_text'] !='') ? $settings['heading_text'] : esc_html__('LogisFare Heading', 'themewar');
        
        $show_icon              = (isset($settings['show_icon']) && $settings['show_icon'] != '' ? $settings['show_icon'] : 'yes');
        $show_icon_style        = (isset($settings['show_icon_style']) && $settings['show_icon_style'] !='') ? $settings['show_icon_style'] : 1;
        $sub_title_icon1        = (isset($settings['sub_title_icon1']) && $settings['sub_title_icon1'] !='') ? $settings['sub_title_icon1'] : '';
        $sub_title_icon2        = (isset($settings['sub_title_icon2']) && $settings['sub_title_icon2'] !='') ? $settings['sub_title_icon2'] : '';

        
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
        
        
        $headingClass = '';
        if($heading_style == 1):
            $heading_tag = 3;
            $headingClass = 'subTitle '.$animClass;
        elseif($heading_style == 2):
            $heading_tag = 2;
            $headingClass = 'secTitle '.$animClass;
        endif;
        
        if($heading_text != ''): ?>
            <h<?php echo $heading_tag; ?> class="<?php echo esc_attr($headingClass); ?>" <?php echo $animAttr; ?>>
                <?php if ($heading_style == 1 && $show_icon == 'yes') : 
                    if($show_icon_style == 2) : 
                    ?>
                        <?php if(!empty($sub_title_icon1)) :?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['sub_title_icon1'], [ 'aria-hidden' => 'true' ] ); ?>
                        <?php endif; endif;
                    ?>
                    <?php echo wp_kses_post($heading_text); ?>
                    <?php if ($show_icon_style == 1 || $show_icon_style == 2): ?>
                        <?php if(!empty($sub_title_icon2)) :?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['sub_title_icon2'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif; endif; ?>
                <?php elseif($heading_style == 2): ?>
                    <?php echo wp_kses_post($heading_text); ?>
                <?php else: ?>
                    <?php echo wp_kses_post($heading_text); ?>
                <?php endif; ?>
            </h<?php echo $heading_tag; ?>>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
}