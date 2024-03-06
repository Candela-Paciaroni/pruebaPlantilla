<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Post_Featured_Fmage_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-post-featured-image';
    }
    
    public function get_title() {
        return esc_html__( 'Post Featured Image', 'themewar' );
    }

    public function get_icon() {
        return ' eicon-featured-image';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('Preview', 'themewar')
        ]);
               
                $this->add_control( 'pfi_hover_effect', [
                            'label' => esc_html__('Hover Effect', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 0,
                            'options' => [
                                    0 => esc_html__('None', 'themewar'),
                                    1 => esc_html__('Flash', 'themewar'),
                                    2 => esc_html__('Shine', 'themewar'),
                                    3 => esc_html__('Circle', 'themewar'),
                            ],
                    ]
                );
                $this->add_control('pfi_featured_img', [
                            'label'             => esc_html__( 'Current Post Featured Image?', 'themewar' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'themewar' ),
                            'label_off'         => esc_html__( 'No', 'themewar' ),
                            'description'       => esc_html__('Do you want to show current post featured image?', 'themewar'),
                            'return_value'      => 'yes',
                            'default'           => 'yes',
                    ]
                );
                $this->add_control('pfi_note', [
                            'label' => esc_html__( 'Important Note', 'themewar' ),
                            'type' => Controls_Manager::RAW_HTML,
                            'raw' => __( 'This shortcode specialy build for <strong>Service, Portfolio, Team, Or Post</strong> details page content. If your using this outside of those page then please turn it to No and choose your Custom Image.', 'themewar' ),
                            'content_classes' => 'alert alert-warning',
                            'conditions'    => [
                                    'terms' => [
                                            [
                                                    'name'      => 'pfi_featured_img',
                                                    'operator'  => '==',
                                                    'value'     => 'yes',
                                            ]
                                    ],
                            ],
                    ]
                );
                $this->add_control('pfi_img', [
                            'label'         => esc_html__( 'Custom Image', 'themewar' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Leave blank if you want to show current post featured image. Or upload your custom image', 'themewar'),
                            'conditions'    => [
                                'terms' => [
                                        [
                                                'name'      => 'pfi_featured_img',
                                                'operator'  => '!=',
                                                'value'     => 'yes',
                                        ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'pfi_width', [
                            'label' => esc_html__( 'Image Width', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 2000,
                            'step' => 1,
                            'default' => '',
                    ]
                );
                $this->add_control( 'pfi_height', [
                            'label' => esc_html__( 'Image Height', 'themewar' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 2000,
                            'step' => 1,
                            'default' => '',
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

        
        $this->start_controls_section('section_img_style', [
                'label'         => esc_html__('Image Styling', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control('area_style',[
                            'label'     => esc_html__( 'Area Style', 'themewar' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_responsive_control('pfi_bg',[
                            'label'     => esc_html__( 'BG Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .featured_image' => 'background-color: {{VALUE}}'
                            ],
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                            'name'      => 'pfi_shadow2',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .featured_image',
                    ]
                ); 
                $this->add_group_control( Group_Control_Border::get_type(),[
                            'name' => 'pfi_border1',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .featured_image',
                    ]
                );
                $this->add_responsive_control('pfi_radius1',[
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .featured_image'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                ); 
                $this->add_responsive_control('pfi_margin',[
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .featured_image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                ); 
                $this->add_responsive_control('pfi_padding',[
                            'label'      => esc_html__( 'Paddigs', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .featured_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );     
                $this->add_control('img_style',[
                            'label'     => esc_html__( 'Image Style', 'themewar' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(),[
                            'name'      => 'pfi_shadow1',
                            'label'     => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .featured_image img',
                    ]
                );  
                $this->add_group_control(Group_Control_Border::get_type(),[
                            'name' => 'pfi_border2',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .featured_image img',
                    ]
                );
                $this->add_responsive_control('pfi_radius2',[
                            'label'      => esc_html__( 'Border Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .featured_image img'       => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                ); 
                $this->add_responsive_control('img_margin',[
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .featured_image img'       => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );  
        $this->end_controls_section();
    }
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $pfi_featured_img   = (isset($settings['pfi_featured_img']) ? $settings['pfi_featured_img'] : 'yes');
        $pfi_img            = (isset($settings['pfi_img']['id']) && $settings['pfi_img']['id'] != '' ? $settings['pfi_img']['id'] : '');
        $pfi_width          = (isset($settings['pfi_width']) && $settings['pfi_width'] > 0 ? $settings['pfi_width'] : 'full');
        $pfi_height         = (isset($settings['pfi_height']) && $settings['pfi_height'] > 0 ? $settings['pfi_height'] : '');
        $pfi_hover_effect   = (isset($settings['pfi_hover_effect']) && $settings['pfi_hover_effect'] > 0 ? $settings['pfi_hover_effect'] : 0);

        $class              = ($pfi_hover_effect > 0 ? ($pfi_hover_effect == 1 ? 'logisFlash' : ($pfi_hover_effect == 2 ? 'logisShine' : 'logisCircle')) : '');
            
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
        <?php
        
        if($pfi_featured_img != 'yes' && $pfi_img > 0): ?>
            <div class="featured_image featured_img_custom <?php echo esc_attr($class); echo $animClass; ?>" <?php echo $animAttr; ?>>
                <img src="<?php echo logisfare_attachment_url($pfi_img, $pfi_width, $pfi_height); ?>" alt="<?php echo get_the_title($post_id); ?>"/>
            </div>
        <?php
         else:
            if(is_singular()):
                global $post;
                $post_id = $post->ID;
                if (get_post_type($post_id) == 'service' || get_post_type($post_id) == 'folio' || get_post_type($post_id) == 'team' || get_post_type($post_id) == 'post'):
                    $post_type = get_post_type($post_id); 
                    ?>
                    <div class="featured_image singleImgThumb featured_img_<?php echo $post_type." " ; echo $animClass; ?>" <?php echo $animAttr; ?>>
                        <div class="thumbImg <?php echo esc_attr($class);?>">
                            <img src="<?php echo logisfare_post_thumbnail($post_id, $pfi_width, $pfi_height); ?>" alt="<?php echo get_the_title($post_id); ?>"/>
                        </div>
                    </div>
                <?php 
                else:
                    echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong>Service, Portfolio, Team, Or Post</strong> details page content.', 'themewar').'</div>';
                endif;
            else:
                echo '<div class="alert alert-warning">'.__('This shortcode specialy build for <strong>Service, Portfolio, Team, Or Post</strong> details page content.', 'themewar').'</div>';
            endif;
        endif;
    }
    
    protected function content_template() {}
}