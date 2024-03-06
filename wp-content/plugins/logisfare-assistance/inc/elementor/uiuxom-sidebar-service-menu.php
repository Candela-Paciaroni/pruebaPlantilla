<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Service_Menu_Widgets extends Widget_Base {
    public function get_name() {
        return 'uiuxom-service-menu';
    }

    public function get_title() {
        return esc_html__('Service Menu Widget', 'uiuxom');
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['uiuxom-sidebar-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Service Menu Widget', 'uiuxom' ),
            ]
        );
                $menu = wp_get_nav_menus();
                $menulist = array('0' => esc_html__('None', 'uiuxom'));
                if(!empty($menu)){
                    foreach ($menu as $mn){
                        $menulist[$mn->term_id] = $mn->name;
                    }
                }
                $this->add_control(
                        'widget_title', [
                            'label'             => esc_html__('Widget Title', 'uiuxom'),
                            'type'              => Controls_Manager::TEXT,
                            'label_block'       => TRUE,
                            'default'           => '',
                        ]
                );
                $this->add_control(
                        'navigation_select', [
                                'label'     => esc_html__( 'Select Navigation', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '0',
                                'options'   => $menulist,
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab__wid', [
                'label'         => esc_html__( 'Widget Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'widget_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .sdb-widget',
                        ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                                'name' => 'widget_border',
                                'label' => esc_html__( 'Wdiget Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .sdb-widget',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name'      => 'widget_shadow',
                                'label'     => esc_html__( 'Widget Shadow', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .sdb-widget',
                        ]
                );
                $this->add_responsive_control(
                        'widget_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .sdb-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'widget_padding', [
                                'label' => esc_html__( 'Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .sdb-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'widget_margin', [
                                'label' => esc_html__( 'Marigns', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .sdb-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'wid_heading_01', [
				'label' => esc_html__( 'Overlay Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'wid_ov_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .sdb-widget:before',
                        ]
                );
                $this->add_control( 'wid_ov_blend_mode', [
                                'label'   => esc_html__( 'BG Blend Mode', 'uiuxom' ),
                                'type'    => Controls_Manager::SELECT,
                                'default' => 'overlay',
                                'options' => [
                                        'normal'      => esc_html__( 'Normal', 'uiuxom' ),
                                        'multiply'      => esc_html__( 'Multiply', 'uiuxom' ),
                                        'screen'      => esc_html__( 'Screen', 'uiuxom' ),
                                        'overlay'      => esc_html__( 'Overlay', 'uiuxom' ),
                                        'darken'      => esc_html__( 'Darken', 'uiuxom' ),
                                        'lighten'      => esc_html__( 'Lighten', 'uiuxom' ),
                                        'color-dodge'      => esc_html__( 'Color Dodge', 'uiuxom' ),
                                        'color-burn'      => esc_html__( 'Color Burn', 'uiuxom' ),
                                        'difference'      => esc_html__( 'Difference', 'uiuxom' ),
                                        'exclusion'      => esc_html__( 'Exclusion', 'uiuxom' ),
                                        'hue'      => esc_html__( 'Hue', 'uiuxom' ),
                                        'saturation'      => esc_html__( 'Saturation', 'uiuxom' ),
                                        'color'      => esc_html__( 'Color', 'uiuxom' ),
                                        'luminosity'      => esc_html__( 'Luminosity', 'uiuxom' ),
                                ],
				'selectors' => [
                                        '{{WRAPPER}} .sdb-widget:before' => 'mix-blend-mode: {{VALUE}};',
				],
                        ]
                );
                $this->add_responsive_control('wid_ov_width', [
				'label' => esc_html__( 'Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .sdb-widget:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control('wid_ov_height', [
				'label' => esc_html__( 'Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .sdb-widget:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'wid_ov_margin', [
                            'label' => esc_html__( 'Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .sdb-widget:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab__wid_title', [
                'label'         => esc_html__( 'Title Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_title_typo',
                                'label' => esc_html__( 'Title Typo', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .sdb-widgetTitle',
                        ]
                );
                $this->add_responsive_control( 'wid_title_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .sdb-widgetTitle'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_title_margin', [
                            'label' => esc_html__( 'Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .sdb-widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab__wid_nav', [
                'label'         => esc_html__( 'Navigation Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'nav_area_paddings', [
                                'label'      => esc_html__( 'Area Paddings', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serviceCat-menuContent ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'nav_area_magrins', [
                                'label'      => esc_html__( 'Area Margins', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .serviceCat-menuContent ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                
                $this->add_control( 'wid_heading_02', [
				'label' => esc_html__( 'List Item Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control(Group_Control_Border::get_type(), [
                                'name' => 'widget_li_border',
                                'label' => esc_html__( 'Item Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .serviceCat-menuContent ul li',
                        ]
                );
                $this->add_responsive_control( 'wid_li_margin', [
                            'label' => esc_html__( 'Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serviceCat-menuContent ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                
                $this->add_control( 'wid_heading_03', [
				'label' => esc_html__( 'Nav Item Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_a_typo',
                                'label' => esc_html__( 'Nav Typo', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .serviceCat-menuContent ul li a',
                        ]
                );
                $this->start_controls_tabs( 'style_nav_01' );
                    $this->start_controls_tab('style_nav_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ]);
                        $this->add_responsive_control( 'wid_a_color', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serviceCat-menuContent ul li a'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'wid_a_bg_color', [
                                        'label' => esc_html__( 'BG Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serviceCat-menuContent ul li a'   => 'background: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'wid_a_padding', [
                                    'label' => esc_html__( 'Padding', 'uiuxom' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .serviceCat-menuContent ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('style_nav_hover', [ 'label' => esc_html__( 'Hover/Active', 'uiuxom' ), ]);
                        $this->add_responsive_control( 'wid_a_color_h', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serviceCat-menuContent ul li:hover > a'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .serviceCat-menuContent ul li.current-menu-item > a'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'wid_a_bg_color_h', [
                                        'label' => esc_html__( 'BG Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .serviceCat-menuContent ul li:hover > a'   => 'background: {{VALUE}}',
                                                '{{WRAPPER}} .serviceCat-menuContent ul li.current-menu-item > a'   => 'background: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control( 'wid_a_padding_h', [
                                    'label' => esc_html__( 'Padding', 'uiuxom' ),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .serviceCat-menuContent ul li:hover > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .serviceCat-menuContent ul li.current-menu-item > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'wid_a_radius', [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serviceCat-menuContent ul li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
                $this->add_control( 'wid_heading_04', [
				'label' => esc_html__( 'Nav Item Icon Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'wid_ai_typo',
                                'label' => esc_html__( 'Nav Typo', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .serviceCat-menuContent ul li a:before',
                        ]
                );
                $this->add_responsive_control( 'wid_ai_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serviceCat-menuContent ul li a:before'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_ai_bg_color', [
                                'label' => esc_html__( 'BG Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .serviceCat-menuContent ul li a:before'   => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('wid_ai_width', [
				'label' => esc_html__( 'Icon Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .serviceCat-menuContent ul li a:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control('wid_ai_height', [
				'label' => esc_html__( 'Icon Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .serviceCat-menuContent ul li a:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'wid_ai_radius', [
                                'label' => esc_html__( 'Icon Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .serviceCat-menuContent ul li a:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_ai_padding', [
                                'label' => esc_html__( 'Icon Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .serviceCat-menuContent ul li a:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'wid_ai_margin', [
                            'label' => esc_html__( 'Icon Margin', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .serviceCat-menuContent ul li a:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $navigation_select      = (isset($settings['navigation_select']) && $settings['navigation_select'] != '') ? $settings['navigation_select'] : '';
        
        
        ?>
        <aside class="sdb-widget">
            <?php if(!empty($widget_title)): ?>
                <h3 class="sdb-widgetTitle"><?php echo esc_html($widget_title); ?></h3>
            <?php endif; ?>
            <div class="serviceCat-menuContent">
                <?php wp_nav_menu(array('menu' => $navigation_select, 'depth' => 1)); ?>
            </div>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}