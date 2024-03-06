<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Page_Banner_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-page-anner';
    }
    
    public function get_title() {
        return esc_html__( 'Page Banner', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Page Banner', 'themewar')
        ]);
                $this->add_control( 'is_breadcurmb', [
                                'label'             => esc_html__( 'Is Breadcrumb?', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                        ]
                );
                $this->add_control( 'banner_title',  [
                                'label'         => esc_html__( 'Banner Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXTAREA,
                                'label_block'   => true,
                        ]
                );
                $this->add_responsive_control( 'banner_alignment', [
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
                                'default'                   => 'center',
                                'prefix_class'              => 'logisfareBanner elementor%s-align-',
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
        
        
        $this->start_controls_section('section_tab_2', [
                'label'     => esc_html__('Area Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'pb_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .pageBanner01',
                    ]
                );
                $this->add_responsive_control('pb_height', [
                            'label' => esc_html__( 'Banner Height', 'themewar' ),
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
                                    '{{WRAPPER}} .pageBanner01' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pb_padding', [
                            'label' => esc_html__( 'Banner Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pageBanner01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pb_margin', [
                            'label' => esc_html__( 'Banner Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pageBanner01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'     => esc_html__('Content Style', 'themewar'),
                'tab'       => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'pb_ca_heading', [
                        'label' => esc_html__( 'Breadcrumb Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'pb_br_typo',
                            'label' => esc_html__( 'Default Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .breadcrumbs',
                    ]
                );
                    $this->start_controls_tabs( 'style_tabs_1' );
                        $this->start_controls_tab('btn_1_button_style_normal', [ 'label' => esc_html__( 'Normal', 'themewar' ), ]);
                            $this->add_responsive_control( 'btn_1_label_color', [
                                            'label' => esc_html__( 'Normal Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .breadcrumbs'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'btn_active_label_color', [
                                            'label' => esc_html__( 'Active Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .breadcrumbs span:not(.brdSeparator)'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                        $this->end_controls_tab();
                        $this->start_controls_tab('btn_1_button_style_lh', [ 'label' => esc_html__( 'Link Hover', 'themewar' ), ]);
                            $this->add_responsive_control( 'btn_1_label_color_h', [
                                            'label' => esc_html__( 'Color', 'themewar' ),
                                            'type' => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .breadcrumbs a:hover'   => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                        $this->end_controls_tab();
                    $this->end_controls_tabs();
                $this->add_responsive_control( 'pb_brd_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .breadcrumbs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                    ]
                );
                $this->add_control( 'pb_ca_heading_02', [
                        'label' => esc_html__( 'Title Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'pb_br_title_typo',
                            'label' => esc_html__( 'Title Typo', 'themewar' ),
                            'selector' => '{{WRAPPER}} .pgBanner-title',
                    ]
                );
                $this->add_responsive_control( 'pb_br_title_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .pgBanner-title'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'pb_br_title_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pgBanner-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $is_breadcurmb = (isset($settings['is_breadcurmb']) && $settings['is_breadcurmb'] != '' ? $settings['is_breadcurmb'] : 'no');
        $banner_title = (isset($settings['banner_title']) && $settings['banner_title'] != '' ? $settings['banner_title'] : '');

            
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


        if(empty($banner_title)):
            if(is_singular()):
                global $post;
                if(is_single() && get_post_type($post->ID) == 'post'):
                    $banner_title = esc_html__('Blog', 'themewar');
                else:
                    $banner_title = get_the_title ($post->ID);
                endif;
            elseif(is_archive()):
                $banner_title = wp_strip_all_tags(get_the_archive_title());
                $banner_title = str_replace(['Category:', 'Tag:', 'Date:', 'Month:', 'Day:', 'Week:', 'Author:'], '', $banner_title);
            elseif(is_search()):
                $banner_title = wp_strip_all_tags(get_search_query());
            elseif(is_404()):
                $banner_title = esc_html__('404 Error', 'themewar');
            elseif(is_home() && !is_front_page()):
                $postsPageID = (get_option('page_for_posts', '') > 0 ? get_option('page_for_posts', '') : 0);
                $banner_title = ($postsPageID > 0 ? get_the_title($postsPageID) : esc_html__('Blog', 'themewar'));
            endif;
        endif;
        
        ?>
        <section class="pageBanner01 <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
            <div class="container">
                <div class="row">
                <div class="col-lg-12">
                    <?php if($is_breadcurmb == 'yes'): ?>
                        <?php echo logisfare_breadcrumbs(); ?>
                    <?php endif; ?>
                    <h2 class="pgBanner-title"><?php echo esc_html($banner_title) ?></h2>
                </div>
                </div>
            </div>
        </section>
        <?php
    }
        
    protected function content_template() {}
}