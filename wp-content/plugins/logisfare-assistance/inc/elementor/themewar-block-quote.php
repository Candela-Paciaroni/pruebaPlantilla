<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Block_Quote_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-blogQuote';
    }
    
    public function get_title() {
        return esc_html__( 'Blog Quote', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-editor-quote';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__( 'Blog Quote', 'themewar' ),
        ]);
                $this->add_control( 'blog_qoute_content', [
                            'label'     => esc_html__( 'Content', 'themewar' ),
                            'type'      => Controls_Manager::TEXTAREA,
                            'placeholder'   => esc_html__('Insert Quote content', 'themewar')
                    ]
                );
                $this->add_control( 'is_quote_author', [
                            'label'             => esc_html__( 'Is Author?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show Quote Author?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
                );
                $this->add_control( 'blog_qoute_author', [
                            'label'         => esc_html__( 'Author', 'themewar' ),
                            'type'          => Controls_Manager::TEXT,
                            'placeholder'   => esc_html__('Insert Quote Author', 'themewar'),
                            'label_block'   => true,
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'is_quote_author',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                                ],
                            ]
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
                'label'     => esc_html__('Quote Area Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'quote_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .wp_blockQuote ',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'quote_area_border',
                                'label' => esc_html__( 'Item Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .wp_blockQuote',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'quote_area_shadow',
                                'label' => esc_html__( 'Item Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .wp_blockQuote',
                        ]
                );
                $this->add_responsive_control( 'quote_area_radius', [
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .wp_blockQuote' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('quote_area__margin', [
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quote_area_padding', [
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'     => esc_html__('Quote Title Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'quote_content_type',
                                'label'     => esc_html__( 'Quote Typo', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .wp_blockQuote p',
                        ]
                );
                $this->add_responsive_control( 'quote_content_color',[
                                'label'     => esc_html__( 'Quote Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .wp_blockQuote p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quote_content_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .wp_blockQuote p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'quote_content_padding', [
                            'label'      => esc_html__( 'padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .wp_blockQuote p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'     => esc_html__('Quote Author Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'is_quote_author',
                                'operator'  => '==',
                                'value'     => 'yes',
                        ]
                    ],
                ]
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'quote_author_typo',
                            'label'     => esc_html__( 'Quote Author Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .wp_blockQuote cite',
                    ]
                );
                $this->add_responsive_control( 'quote_author_color',[
                            'label'     => esc_html__( 'Quote Author Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote cite' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'quote_author_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .wp_blockQuote cite' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('quote_author_icon_hd',[
                        'label' => esc_html__( 'Quote Author Icon', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_responsive_control( 'quote_icon_color',[
                            'label'     => esc_html__( 'Quote Icon Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote cite:after' => 'background: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_control( 'quote_icon_opacity',[
                            'label' => esc_html__( 'Opacity', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                            'px' => [
                                    'min' => 0.01,
                                    'max' => 1,
                                    'step' => 0.01,
                            ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .wp_blockQuote cite:after' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'ff_sufix_position', [
                            'label' => esc_html__( 'Suffix Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['top','left'],
                            'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote cite:after' => 'top: {{TOP}}{{UNIT}}; Left: {{TOP}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_5', [
                'label'     => esc_html__('Quote Icon Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'quote_content_i_type',
                            'label'     => esc_html__( 'Quote Typo', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .wp_blockQuote > i',
                    ]
                );
                $this->add_responsive_control( 'quote_content_i_color',[
                            'label'     => esc_html__( 'Quote Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .wp_blockQuote > i' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Background::get_type(), [
                            'name' => 'quote_i_background',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .wp_blockQuote > i',
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        
        $blog_qoute_content     = (isset($settings['blog_qoute_content']) && !empty($settings['blog_qoute_content'])) ? $settings['blog_qoute_content'] : '';
        $is_quote_author        = (isset($settings['is_quote_author']) && ($settings['is_quote_author']) != '') ? $settings['is_quote_author'] : 'no';
        $blog_qoute_author      = (isset($settings['blog_qoute_author']) && !empty($settings['blog_qoute_author'])) ? $settings['blog_qoute_author'] : '';

        
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

        
        if(isset($blog_qoute_content) && $blog_qoute_content != ''):
        ?>
            <blockquote class="wp_blockQuote <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                <i class="logisfare-quoat"></i>
                <p><?php echo logisfare_kses($blog_qoute_content);?></p>
                <?php if($is_quote_author == 'yes' && !empty($blog_qoute_author)): ?>
                    <cite><?php echo esc_html($blog_qoute_author); ?></cite>
                <?php endif; ?>
            </blockquote>
        <?php
        endif;
    }
    
    protected function content_template() {}
}