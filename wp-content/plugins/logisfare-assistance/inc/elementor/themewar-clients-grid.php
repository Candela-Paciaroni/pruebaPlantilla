<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Clients_Grid_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-clients-grid';
    }
    
    public function get_title() {
        return esc_html__( 'Client Grid', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Client Logo Grid View', 'themewar')
        ]);
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'client_logo', [
                                'label'         => esc_html__( 'Logo Items', 'themewar' ),
                                'type'          => Controls_Manager::MEDIA,
                                'description'   => esc_html__('Upload your client logo.', 'themewar'),
                        ]
                    );
                    $repeater->add_control( 'clinet_url', [
                                'label'             => esc_html__( 'Client URL', 'themewar' ),
                                'type'              => Controls_Manager::URL,
                                'input_type'        => 'url',
                                'placeholder'       => esc_html__( 'https://your-link.com', 'themewar' ),
                                'show_external'     => true,
                                'default'           => [
                                        'url'            => '',
                                        'is_external'    => false,
                                        'nofollow'       => false,
                                ],
                        ]
                    );
                    $repeater->add_control('is_animation',[
                                    'label' => esc_html__( 'Is Animation', 'themewar' ),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'label_on' => esc_html__( 'Yes', 'themewar' ),
                                    'label_off' => esc_html__( 'No', 'themewar' ),
                                    'return_value' => 'yes',
                                    'default' => 'no',
                            ]
                    );
                    $repeater->add_control('animation_name',[
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
                    $repeater->add_control('animation_duration_id',[
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
                    $repeater->add_control('animation_delay',[
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
                $this->add_control( 'list', [
                            'label'   => esc_html__( 'Client Logo', 'themewar' ),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeater->get_controls(),
                            'default' => [
                                    [
                                            'client_logo'           => array(),
                                            'clinet_url'            => array(),
                                            'is_animation'          => 'no',
                                            'animation_name'        => 'none',
                                            'animation_delay'       => '50',
                                    ],
                            ],
                            'title_field' => esc_html__( 'Client Logo', 'themewar' ),
                    ]
                );
                $this->add_control( 'items_xxl_col', [
                            'label'     => esc_html__( 'Select XXL Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '5',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                                    '5'       => esc_html__( '5 Column', 'themewar' ),
                                    '6'       => esc_html__( '6 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_xl_col', [
                            'label'     => esc_html__( 'Select XL Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '4',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                                    '5'       => esc_html__( '5 Column', 'themewar' ),
                                    '6'       => esc_html__( '6 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_lg_col', [
                            'label'     => esc_html__( 'Select LG Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '3',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                                    '5'       => esc_html__( '5 Column', 'themewar' ),
                                    '6'       => esc_html__( '6 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_md_col', [
                            'label'     => esc_html__( 'Select MD Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '3',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                                    '5'       => esc_html__( '5 Column', 'themewar' ),
                                    '6'       => esc_html__( '6 Column', 'themewar' ),
                            ],
                    ]
                );
                $this->add_control( 'items_sm_col', [
                            'label'     => esc_html__( 'Select SM Col', 'themewar' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '2',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'themewar' ),
                                    '3'       => esc_html__( '3 Column', 'themewar' ),
                                    '4'       => esc_html__( '4 Column', 'themewar' ),
                                    '5'       => esc_html__( '5 Column', 'themewar' ),
                                    '6'       => esc_html__( '6 Column', 'themewar' ),
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_2', [
                'label'             => esc_html__('Grid Area', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'cs_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .clientLogoGrid',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'cs_area_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clientLogoGrid',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'cs_area_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .clientLogoGrid',
                    ]
                );
                $this->add_responsive_control( 'cs_area_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .clientLogoGrid' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_mr', [
                            'label' => esc_html__( 'margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientLogoGrid' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
                $this->add_responsive_control( 'cs_area_pd', [
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientLogoGrid' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3', [
                'label'             => esc_html__('Item Styling', 'themewar'),
                'tab'               => Controls_Manager::TAB_STYLE
        ]);
                $this->start_controls_tabs( 'item_styling_tab' );
                        $this->start_controls_tab('item_styling_tab_normal', ['label' => esc_html__( 'Normal', 'themewar' )]);
                            $this->add_responsive_control( 'cl_item_bg', [
                                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .cleintLogo' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'cl_item_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'cl_item_border',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo',
                                    ]
                            );
                        $this->end_controls_tab();
                        $this->start_controls_tab('item_styling_tab_hover',['label' => esc_html__( 'Hover', 'themewar' )]);
                            $this->add_responsive_control( 'cl_item_bg_hover', [
                                            'label' => esc_html__( 'Item BG Color', 'themewar' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .cleintLogo:hover' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'cl_item_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'cl_item_border_hover',
                                            'label' => esc_html__( 'Border', 'themewar' ),
                                            'selector' => '{{WRAPPER}} .cleintLogo:hover',
                                    ]
                            );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_responsive_control( 'cl_item_radius', [
                                'label' => esc_html__( 'Item Radius', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cleintLogo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cl_item_margin', [
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cmb_30' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cl_item_padding', [
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .cleintLogo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('cl_logo_style', [
                        'label' => esc_html__( 'Logo Image Style', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_control('cl_logo_width',[
                            'label' => esc_html__( 'Logo Width', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cleintLogo img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control('cl_logo_height',[
                            'label' => esc_html__( 'Logo Height', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%', 'em'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cleintLogo img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'cl_logo_opacity',[
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
                                '{{WRAPPER}} a.cleintLogo' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
                $this->add_control( 'cl_logo_opacity_hr',[
                            'label' => esc_html__( 'Hover Opacity', 'themewar' ),
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
                                '{{WRAPPER}} a.cleintLogo:hover' => 'opacity: {{SIZE}};',
                            ],
                    ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $items_xxl_col  = (isset($settings['items_xxl_col']) && $settings['items_xxl_col'] > 0 ? $settings['items_xxl_col'] : 5);
        $items_xl_col   = (isset($settings['items_xl_col']) && $settings['items_xl_col'] > 0 ? $settings['items_xl_col'] : 5);
        $items_lg_col   = (isset($settings['items_lg_col']) && $settings['items_lg_col'] > 0 ? $settings['items_lg_col'] : 4);
        $items_md_col   = (isset($settings['items_md_col']) && $settings['items_md_col'] > 0 ? $settings['items_md_col'] : 3);
        $items_sm_col   = (isset($settings['items_sm_col']) && $settings['items_sm_col'] > 0 ? $settings['items_sm_col'] : 2);
        
        $clients_list         = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
        ?>
        <div class="clientLogoGrid">
            <div class="row">
                <?php if(!empty($clients_list)):
                    foreach($clients_list as $client):
                            $logo       = (isset($client['client_logo']['url']) && !empty($client['client_logo']['url'])) ? $client['client_logo']['url'] : 'https://via.placeholder.com/228x64.png?text=Logisfare';

                            $url        = (isset($client['clinet_url']['url'])) ? $client['clinet_url']['url'] : 'javascript:void(0);';
                            $target     = (isset($client['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                            $nofollow   = (isset($client['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;

                            $is_animation           = (isset($client['is_animation']) && $client['is_animation'] == 'yes') ? $client['is_animation'] : 'no';
                            $animation_name         = (isset($client['animation_name']) && $client['animation_name'] != '') ? $client['animation_name'] : '';
                            $animation_duration     = (isset($client['animation_duration_id']) && $client['animation_duration_id'] != '') ? $client['animation_duration_id'] : '';
                            $animation_delay        = (isset($client['animation_delay']) && $client['animation_delay'] != '') ? $client['animation_delay'] : '';
                            
                            $animAttr = '';
                            $animClass = $animAttr;
                            if($is_animation == 'yes' && $animation_name !='none'){
                                $animClass = ' enable_animation aos-animate';
                                $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
                                $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
                                $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
                            }
                    ?>
                    <div class="col-xxl-<?php echo str_replace('.', '-', 12 / $items_xxl_col); ?> col-xl-<?php echo str_replace('.', '-', 12 / $items_xl_col); ?> col-lg-<?php echo str_replace('.', '-', 12 / $items_lg_col); ?> col-md-<?php echo str_replace('.', '-', 12 / $items_md_col); ?> col-sm-<?php echo str_replace('.', '-', 12 / $items_sm_col)?> <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                            <a <?php echo esc_attr($target.' '.$nofollow); ?> href="<?php echo esc_attr($url); ?> " class="cleintLogo">
                            <?php if(!empty($logo)): ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            <?php endif; ?>
                            </a> 
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        <?php
    }
        
    protected function content_template() {}
}