<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_Google_Map_Widget extends Widget_Base {
    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
        
        $map_api_code = tw_get_option('_logisfare_customizer_options', 'map_api', '');
        $apic = ($map_api_code != '') ? '?key=' . $map_api_code : '';
        wp_register_script( 'maps-google-api', 'https://maps.google.com/maps/api/js'.$apic, array('jquery'), '', TRUE );
        wp_enqueue_script('gmaps', plugins_url('/logisfare-assistance/assets/js/gmaps.js'), array('maps-google-api'), '', TRUE);
    }
    
    public function get_script_depends() {
        return [ 'maps-google-api', 'gmaps' ];
    }
   
    public function get_name() {
        return 'themewar-google-map';
    }

    public function get_title() {
        return esc_html__( 'Google Map', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section('section_tab', [
                'label' => esc_html__( 'Google Map', 'themewar' ),
        ]);
                $this->add_control( 'map_mode', [
                                'label'             => esc_html__( 'Map Mode', 'themewar' ),
                                'type'              => Controls_Manager::SELECT,
                                'default'           => 1,
                                'label_block'       => true,
                                'options' => [
                                        1       => esc_html__( 'Ifram', 'themewar' ),
                                        2       => esc_html__( 'Custom', 'themewar' ),
                                ],
                        ]
                );
                $this->add_control( 'map_address', [
                                'label'             => esc_html__( 'Address', 'themewar' ),
                                'type'              => Controls_Manager::TEXTAREA,
                                'label_block'       => true,
                                'default'           => '1 Grafton Street, Dublin, Ireland',
                                'placeholder'       => esc_html__( 'Insert a valid address', 'themewar' ),
                                'conditions'        => [
                                    'terms' => [
                                        [
                                                'name'      => 'map_mode',
                                                'operator'  => '!in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'grayscale', [
                                'label'         => esc_html__( 'Show Grayscale', 'themewar' ),
                                'type'          => Controls_Manager::SWITCHER,
                                'label_on'      => esc_html__( 'Show', 'themewar' ),
                                'label_off'     => esc_html__( 'Hide', 'themewar' ),
                                'return_value'  => 'yes',
                                'default'       => 'no',
                        ]
                );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'lati', [
                                    'label'             => esc_html__( 'Location Latitude', 'themewar' ),
                                    'type'              => Controls_Manager::TEXT,
                                    'label_block'       => true,
                                    'default'           => '45.354450',
                                    'placeholder'       => esc_html__( 'Insert your location latitude', 'themewar' ),
                            ]
                    );
                    $repeater->add_control( 'long', [
                                    'label'             => esc_html__( 'Location Longitude', 'themewar' ),
                                    'type'              => Controls_Manager::TEXT,
                                    'label_block'       => true,
                                    'default'           => '-95.802650',
                                    'placeholder'       => esc_html__( 'Insert your location longitude', 'themewar' ),
                            ]
                    );
                    $this->add_control( 'location_list', [
                                    'label'         => esc_html__( 'Loaction Coordinats', 'themewar' ),
                                    'type'          => Controls_Manager::REPEATER,
                                    'fields'        => $repeater->get_controls(),
                                    'default'       => [
                                            [
                                                    'lati'                 => '45.354450',
                                                    'long'                 => '-95.802650',
                                            ],
                                    ],
                                    'title_field' => '{{{ lati }}}',
                                    'condition'         => ['map_mode' => '2']
                            ]
                    );
                $this->add_control( 'map_zoom', [
                                'label'         => esc_html__( 'Zoom', 'themewar' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 50,
                                'step'          => 1,
                                'default'       => 10
                        ]
                );
                $this->add_control( 'marker', [
                                'label'         => esc_html__( 'Map Marker', 'themewar' ),
                                'type'          => Controls_Manager::MEDIA,
                                'description'   => esc_html__('Upload your map marker. Map marker shold be smallar image.', 'themewar'),
                                'condition'     => ['map_mode' => '2'],
                        ]
                );
                $this->add_responsive_control( 'map_height', [
                                'label'         => esc_html__( 'Map Height', 'themewar' ),
                                'type'          => Controls_Manager::SLIDER,
                                'size_units'    => [ 'px' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 2000,
                                                'step' => 1,
                                        ]
                                ],
                                'description'   => esc_html__('Insert your map height. Default height is 380px.', 'themewar'),
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors'     => [
                                        '{{WRAPPER}} .contact-googleMap iframe' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contact-googleMap '        => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'border_radius', [
                                'label'         => esc_html__( 'Border Radius', 'themewar' ),
                                'type'          => Controls_Manager::DIMENSIONS,
                                'size_units'    => [ 'px', '%', 'em' ],
                                'selectors'     => [
                                    '{{WRAPPER}} .contact-googleMap  iframe'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contact-googleMap '  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    }
    
    protected function render() {
        $settings    = $this->get_settings_for_display();
        $map_mode    = (isset($settings['map_mode']) && $settings['map_mode'] > 0) ? $settings['map_mode'] : 1;
        $map_address = (isset($settings['map_address']) && $settings['map_address'] != '') ? $settings['map_address'] : 'Cuauhtémoc, Chihuahua, Mexico';
        
        $location_list  = (isset($settings['location_list']) && !empty($settings['location_list'])) ? $settings['location_list'] : array(array('lati' => '45.354450', 'long' => '-95.802650'));
        
        $zoom       = (isset($settings['map_zoom']) && $settings['map_zoom'] > 0) ? $settings['map_zoom'] : '12';
        $marker     = (isset($settings['marker']['url']) && $settings['marker']['url'] != '') ? $settings['marker']['url'] : '';
        $grayscale  = (isset($settings['grayscale']) && $settings['grayscale'] != '') ? $settings['grayscale'] : 'no';
        
        $map_api_code = tw_get_option('_logisfare_customizer_options', 'map_api', '');

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

        
        if($map_mode == 1 && $map_address != ''):
            $frame = 'https://maps.google.com/maps?q='.urlencode($map_address).'&t=&z='.$zoom.'&ie=UTF8&iwloc=&output=embed';
            ?><div class="contact-googleMap <?php if($grayscale == 'yes'){echo 'blackAndWhite';} echo $animClass; ?>" <?php echo $animAttr; ?>><iframe src="<?php echo esc_url($frame); ?>"></iframe></div><?php   
        elseif($map_mode == 2 && !empty($location_list)):
            $maps_id        = uniqid('gmap_');
            if($map_api_code != ''):
            ?><div data-map-style="<?php if($grayscale == 'yes'){echo 2;}else{echo 1;} ?>" 
                 data-marker="<?php echo esc_url($marker); ?>" 
                 data-coordinates="<?php echo esc_attr(json_encode($location_list)); ?>" 
                 data-zoom="<?php echo esc_attr($zoom); ?>" 
                 class="gmap" 
                 id="<?php echo esc_attr($maps_id); ?>">
            </div><?php
            else:
                ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo esc_html__('Google Map API not set yet. Please insert it under Appearance -> Customize -> Theme Options -> General Settings.', 'themewar'); ?>
                </div>
                <?php
            endif;
        else:
           ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Map Style and fill up all related fields.', 'themewar'); ?>
            </div>
           <?php
        endif;
    }
    
    protected function content_template() {}
}