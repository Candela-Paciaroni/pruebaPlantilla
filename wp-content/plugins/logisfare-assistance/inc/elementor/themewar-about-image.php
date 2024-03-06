<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Themewar_About_Image_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'themewar-about';
    }
    
    public function get_title() {
        return esc_html__( 'About Image', 'themewar' );
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return [ 'themewar-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section('section_tab_1', [
                'label'     => esc_html__('About', 'themewar')
        ]);
                $this->add_control( 'abi_style', [
                                'label' => esc_html__('Select Style', 'themewar'),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 1,
                                'options' => [
                                    1 => esc_html__('Style 01', 'themewar'),
                                    2 => esc_html__('Style 02', 'themewar'),
                                    3 => esc_html__('Style 03', 'themewar'),
                                    4 => esc_html__('Style 04', 'themewar'),
                                    5 => esc_html__('Style 05', 'themewar'),
                                    6 => esc_html__('Style 06', 'themewar'),
                                ],
                        ]
                );
                $this->add_control( 'abi_image_1', [
                                'label' => esc_html__( 'About Image 01', 'themewar' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                        ]
                );
                $this->add_control( 'abi_image_2', [
                                'label'         => esc_html__( 'About Image 02', 'themewar' ),
                                'label_block'   => TRUE,
                                'type'          => Controls_Manager::MEDIA,
                                'default'       => [], 
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => '!in',
                                                    'value'     => ['2'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'abi_circle_logo', [
                                'label'         => esc_html__( 'About Image 03 ', 'themewar' ),
                                'label_block'   => TRUE,
                                'type'          => Controls_Manager::MEDIA,
                                'default'       => [],
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => '!in',
                                                    'value'     => ['2','6'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control('abi_image_effect', [
                                'label' => esc_html__( 'About Image 01 Hover Effect', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                $this->add_control( 'abi_hover_effect', [
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
                $this->add_control('abi_image_effect2', [
                                'label' => esc_html__( 'About Image 02 Hover Effect', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => '!in',
                                                    'value'     => ['2'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'abi_hover_effect2', [
                            'label' => esc_html__('Hover Effect', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 0,
                            'options' => [
                                    0 => esc_html__('None', 'themewar'),
                                    1 => esc_html__('Flash', 'themewar'),
                                    2 => esc_html__('Shine', 'themewar'),
                                    3 => esc_html__('Circle', 'themewar'),
                            ],
                            'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                            ],
                    ]
                );
                $this->add_control('abi_image_effect3', [
                                'label' => esc_html__( 'About Image 03 Hover Effect', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => '!in',
                                                    'value'     => ['1','2', '4', '6'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'abi_hover_effect3', [
                            'label' => esc_html__('Hover Effect', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 0,
                            'options' => [
                                    0 => esc_html__('None', 'themewar'),
                                    1 => esc_html__('Flash', 'themewar'),
                                    2 => esc_html__('Shine', 'themewar'),
                                    3 => esc_html__('Circle', 'themewar'),
                            ],
                            'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['1','2', '4', '6'],
                                        ]
                                    ],
                            ],
                    ]
                );
                
                $this->add_control('ab_image_title_hd', [
                                'label' => esc_html__( 'About Image Title Content', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['3'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'ab_img_title__01', [
                                'label'     => esc_html__( 'About Image Title 01', 'themewar' ),
                                'type'      => Controls_Manager::TEXT,
                                'default'   => esc_html__('15000+ Successful Transportation'),
                                'placeholder'   => esc_html__('Type about Title 01', 'themewar'),
                                'label_block' => true,
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['3'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'ab_img_title__02', [
                                'label'     => esc_html__( 'About Image Title 02', 'themewar' ),
                                'type'      => Controls_Manager::TEXT,
                                'default'   => esc_html__('25+ Years Working Experience'),
                                'placeholder'   => esc_html__('Type about Title 02', 'themewar'),
                                'label_block' => true,
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['3'],
                                            ]
                                        ],
                                ],
                        ]
                );

        $this->end_controls_section();
        
        $this->start_controls_section('about_img_funfact', [
                'label' => esc_html__( 'About Funfact', 'themewar' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'abi_style',
                                    'operator'  => 'in',
                                    'value'     => ['2','5','6'],
                            ]
                        ],
                ],
        ]);
                $this->add_control( 'ff_number', [
                        'label'         => esc_html__( 'Fact Amount', 'themewar' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => esc_html__('458', 'themewar')
                ]);
                $this->add_control( 'ff_suffix', [
                        'label'         => esc_html__( 'Number Suffix', 'themewar' ),
                        'type'          => Controls_Manager::TEXT,
                        'description'   => esc_html__( 'Insert suffix for fact.', 'themewar' ),
                        'default'       => '', 
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'abi_style',
                                        'operator'  => '!==',
                                        'value'     => '5',
                                ]
                            ],
                    ],
                ]);
                $this->add_control( 'ff_fraction', [
                                'label'         => esc_html__( 'Fact Fraction ', 'themewar' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'themewar' ),
                                'label_off'         => esc_html__( 'No', 'themewar' ),
                                'description'       => esc_html__('Do you want to show Fraction?', 'themewar'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['6'],
                                            ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'ff_title', [
                                'label'         => esc_html__( 'Fact Title', 'themewar' ),
                                'type'          => Controls_Manager::TEXT,
                                'label_block'   => TRUE,
                                'default'       => esc_html__('Delivered Goods', 'themewar'),
                        ]
                );
                $this->add_control('ff_icon', [
                            'label' => esc_html__( 'FunFact Icon', 'textdomain' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'default' => [
                                'value' => 'logisfare-delivary_goods',
                                'library' => 'tw_icon',
                            ],
                            'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['5','6'],
                                        ]
                                    ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'ff_align', [
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
                                'prefix_class'              => 'logisfareFactAlign-',
                                'conditions'    => [
                                        'terms'     => [
                                            [
                                                    'name'      => 'abi_style',
                                                    'operator'  => '!in',
                                                    'value'     => ['5','6'],
                                            ]
                                        ],
                                ],
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
                $this->add_control('abi_image_anim01', [
                                'label' => esc_html__( 'Set Animation For Item 01', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
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

                // Image 02 Animation 
                $this->add_control('abi_image_anim02', [
                                'label' => esc_html__( 'Set Animation For Item 02', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
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
                $this->add_control('animation_name2',[
                                'label' => esc_html__( 'Set Animation', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'label_block' => true,
                                'multiple' => true,
                                'default' => 'none',
                                'seperator' => 'before',
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
                $this->add_control('animation_duration_id2',[
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
                $this->add_control('animation_delay2',[
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

                // Image 03 Animation 
                $this->add_control('abi_image_anim03', [
                                'label' => esc_html__( 'Set Animation For Item 03', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'is_animation',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['2','3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('animation_name3',[
                                'label' => esc_html__( 'Set Animation', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'label_block' => true,
                                'multiple' => true,
                                'default' => 'none',
                                'seperator' => 'before',
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
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['2','3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('animation_duration_id3',[
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
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['2','3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('animation_delay3',[
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
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['2','3'],
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section('section_tab_2', [
                'label'         => esc_html__('Image 01 Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['1', '2','3','4','5','6'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_images_border',
                                'label' => esc_html__( 'Images Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .ab01 img, {{WRAPPER}} .featureLook01 img, {{WRAPPER}} .abItm3_01 img, {{WRAPPER}} .aboutLook03 .ab01 img, {{WRAPPER}} .logicImg02 .ab_imgC_01 img, {{WRAPPER}} .abLookImg01 img',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'abi_images_shadow',
                                'label' => esc_html__( 'Image Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .ab01 img, {{WRAPPER}} .featureLook01 img, {{WRAPPER}} .abItm3_01 img, {{WRAPPER}} .aboutLook03 .ab01 img, {{WRAPPER}} .logicImg02 .ab_imgC_01 img, {{WRAPPER}} .abLookImg01 img',
                        ]
                );
                $this->add_responsive_control('abi_img01_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureLook01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg01 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img01_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureLook01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img01_paddings', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .featureLook01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg01 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section('section_tab_3', [
                'label'         => esc_html__('Image 02 Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['1','3','4','5','6'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_images2_border',
                                'label' => esc_html__( 'Images Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .ab02 img, {{WRAPPER}} .abItm3_02 img, {{WRAPPER}} .aboutLook03 .ab02 img, {{WRAPPER}} .logicImg02 .ab_imgC_02 img, {{WRAPPER}} .abLookImg02 img',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'abi_images2_shadow',
                                'label' => esc_html__( 'Image Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .ab02 img, {{WRAPPER}} .abItm3_02 img, {{WRAPPER}} .aboutLook03 .ab02 img, {{WRAPPER}} .logicImg02 .ab_imgC_02 img, {{WRAPPER}} .abLookImg02 img',
                        ]
                );
                $this->add_responsive_control('abi_img02_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg02 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img02_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg02 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img02_paddings', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .ab02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .ab02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abLookImg02 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );    

                $this->add_responsive_control( 'abi_img02_offset_y',  [
                            'label' => esc_html__( 'Offset Y', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
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
                            'selectors' => [
                                '{{WRAPPER}} .aboutLook .ab02' => 'bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .aboutLook03 .ab02' => 'top: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .ab_imgC_02' => 'top: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .abLookImg02' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['3'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'abi_img02_offset_x',[
                            'label' => esc_html__( 'Offset X', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
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
                            'selectors' => [
                                '{{WRAPPER}} .aboutLook .ab02' => 'left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .aboutLook03 .ab02' => 'left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .ab_imgC_02' => 'left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .abLookImg02' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['3'],
                                    ]
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_4', [
                'label'         => esc_html__('Image 03 Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['1','3', '4', '5'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_images3_border',
                                'label' => esc_html__( 'Images Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .welcomeBox img, {{WRAPPER}} .abItm3_03 img, {{WRAPPER}} .aboutLook03 .welcomeBox img, {{WRAPPER}} .logicImg02 .ab_imgC_03 img',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'abi_images3_shadow',
                                'label' => esc_html__( 'Image Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .aboutLook .welcomeBox, {{WRAPPER}} .abItm3_03 img, {{WRAPPER}} .aboutLook03 .welcomeBox, {{WRAPPER}} .logicImg02 .ab_imgC_03 img',
                        ]
                );
                $this->add_responsive_control('abi_img03_radius', [
                                'label' => esc_html__( 'Radius', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .welcomeBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook .welcomeBox img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_03 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .welcomeBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .welcomeBox img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_03 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img03_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .welcomeBox img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_03 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .welcomeBox img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLlogicImg02 .ab_imgC_03 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img03_paddings', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutLook .welcomeBox img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abItm3_03 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .aboutLook03 .welcomeBox img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .ab_imgC_03 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );    

                $this->add_responsive_control( 'abi_img03_offset_y', [
                            'label' => esc_html__( 'Offset Y', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
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
                            'selectors' => [
                                '{{WRAPPER}} .aboutLook .welcomeBox' => 'bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .aboutLook03 .welcomeBox' => 'bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .ab_imgC_03' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],  
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['3'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'abi_img03_offset_x', [
                            'label' => esc_html__( 'Offset X', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%'],
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
                            'selectors' => [
                                '{{WRAPPER}} .aboutLook .welcomeBox' => 'left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .aboutLook03 .welcomeBox' => 'left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .ab_imgC_03' => 'left: {{SIZE}}{{UNIT}};',
                            ],  
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['3'],
                                    ]
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();  
        
        $this->start_controls_section('section_tab_5', [
                'label'         => esc_html__('About Content Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['3'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'abi_img_title_typo',
                            'label'     => esc_html__( 'Title Typography', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .abGalleryItem h3, {{WRAPPER}} .abGalleryItem.abGal02 h3',
                    ]
                );
                $this->add_responsive_control( 'abi_img_title_color',[
                            'label'     => esc_html__( 'Title Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .abGalleryItem h3' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .abGalleryItem.abGal02 h3' => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control('abi_img_title_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .abGalleryItem h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abGalleryItem.abGal02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_img_title_paddings', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .abGalleryItem h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abGalleryItem.abGal02 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );    
        $this->end_controls_section();

        $this->start_controls_section('section_tab_556', [
                'label'         => esc_html__('About Title Container', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['3'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control(Group_Control_Background::get_type(),[
                            'name' => 'abi_img_cnt_bg',
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .abGalleryItem.abGal02',
                    ]
                );

                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'abi_img_cnt_bdr',
                            'label' => esc_html__( 'Images Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .abGalleryItem.abGal02',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'abi_img_cnt_shadow',
                            'label' => esc_html__( 'Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .abGalleryItem.abGal02',
                    ]
                );
                $this->add_responsive_control('abi_img_cnt_radius', [
                            'label' => esc_html__( 'Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .abGalleryItem.abGal02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('abi_img_cnt_margin', [
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .abGalleryItem.abGal02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control('abi_img_cnt_padding', [
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .abGalleryItem.abGal02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_6', [
                'label'         => esc_html__('About FunFact', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms'     => [
                        [
                                'name'      => 'abi_style',
                                'operator'  => 'in',
                                'value'     => ['2', '5', '6'],
                        ]
                    ],
                ],
        ]);
                $this->add_group_control( Group_Control_Background::get_type(),[
                            'name' => 'abi_funfact_bg',
                            'label' => esc_html__( 'FunFact Bg', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .featureLook01 .featureBox, {{WRAPPER}} .logicImg02 .abCount02, {{WRAPPER}} .abJobCount',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_funfact_bdr',
                                'label' => esc_html__( 'Outer Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .featureLook01 .featureBox, {{WRAPPER}} .logicImg02 .abCount02, {{WRAPPER}} .abJobCount',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name' => 'abi_funfact_shadow',
                            'label' => esc_html__( 'Box Shadow', 'themewar' ),
                            'selector' => '{{WRAPPER}} .featureLook01 .featureBox, {{WRAPPER}} .logicImg02 .abCount02, {{WRAPPER}} .abJobCount',
                    ]
                );
                $this->add_responsive_control( 'abi_funfact_radius', [
                            'label'      => esc_html__( 'Radius', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .featureLook01 .featureBox' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .abCount02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .abJobCount' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'abi_funfact__mar', [
                            'label'      => esc_html__( 'Margin', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .featureLook01 .featureBox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .abCount02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .abJobCount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_responsive_control( 'abi_funfact_pd', [
                            'label'      => esc_html__( 'Padding', 'themewar' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .featureLook01 .featureBox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicImg02 .abCount02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .abJobCount' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                    ]
                );
                $this->add_control('abi_funfact_icon_hd',[
                        'label' => esc_html__( 'Icon STyle', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before', 
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'abi_style',
                                        'operator'  => '!in',
                                        'value'     => ['5', '6'],
                                ]
                            ],
                        ],
                ]);
                $this->start_controls_tabs('abi_funfact_icon_tabs', [
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'abi_style',
                                        'operator'  => '!in',
                                        'value'     => ['5', '6'],
                                ]
                            ],
                        ],
                    ]
                );
                        $this->start_controls_tab('style_icon_tab',[
                                'label' => esc_html__( 'Icon', 'themewar' ),
                        ]);
                                $this->add_group_control( Group_Control_Typography::get_type(), [
                                                'name'      => 'abi_funfact_i_typography',
                                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .featureLook01 .featureBox i'
                                        ]
                                );
                                $this->add_responsive_control( 'abi_funfact_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .featureLook01 .featureBox i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                        $this->end_controls_tab();

                        $this->start_controls_tab('style_svg_tab',[
                                'label' => esc_html__( 'SVG', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'abi_funfact_svg_fill_nr',[
                                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .featureLook01 .featureBox svg' => 'fill: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'abi_funfact_svg_stroke',[
                                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .featureLook01 .featureBox svg' => 'stroke: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'abi_funfact_svg_stroke_width',[
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
                                                    '{{WRAPPER}} .featureLook01 .featureBox svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                            ]
                                    ]
                                );	
                                $this->add_responsive_control( 'abi_funfact_svg_width', [
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
                                                        '{{WRAPPER}} .featureLook01 .featureBox svg' => 'width: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'abi_funfact_svg_height', [
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
                                                        '{{WRAPPER}} .featureLook01 .featureBox svg' => 'height: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_control('abi_funfact_content_hd',[
                        'label' => esc_html__( 'Counter Number', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_num_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .featureBox h3, {{WRAPPER}} .logicImg02 .abCount02 h2, {{WRAPPER}} .abJobCount h2',
                        ]
                );
                $this->add_responsive_control('ff_num_color', [
                                'label'      => esc_html__( 'Color', 'themewar' ),
                                'type'       => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .featureBox h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .logicImg02 .abCount02 h2' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .abJobCount h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_num_margin', [
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .featureBox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .logicImg02 .abCount02 h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .abJobCount h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control('ff_num_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                                'selectors' => [
                                    '{{WRAPPER}} .featureBox h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .abCount02 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abJobCount h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'heading_un_one', [
                        'label'     => esc_html__( 'Number Suffix Style', 'themewar' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                        'conditions'    => [
                            'terms'     => [
                                [
                                        'name'      => 'abi_style',
                                        'operator'  => '!in',
                                        'value'     => ['5'],
                                ]
                            ],
                        ],
                ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'heading1_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => '{{WRAPPER}} .counterSuffix',
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['5'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control('heading1_color', [
                                'label'      => esc_html__( 'Suffix Color', 'themewar' ),
                                'type'       => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .counterSuffix' => 'color: {{VALUE}}',
                                ],
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_style',
                                                'operator'  => '!in',
                                                'value'     => ['5'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'ff_sufix_position', [
                            'label' => esc_html__( 'Suffix Position', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px'],
                            'allowed_dimensions' => ['top'],
                            'selectors' => [
                                    '{{WRAPPER}} .counterSuffix' => 'top: {{TOP}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['5'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_responsive_control( 'mt_margin', [
                            'label' => esc_html__( 'Marign', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'allowed_dimensions' => ['left', 'right'],
                            'selectors' => [
                                    '{{WRAPPER}} .counterSuffix' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
                            ],
                            'conditions'    => [
                                'terms'     => [
                                    [
                                            'name'      => 'abi_style',
                                            'operator'  => '!in',
                                            'value'     => ['5'],
                                    ]
                                ],
                            ],
                    ]
                );
                $this->add_control( 'heading_funf_title', [
                        'label'     => esc_html__( 'Funfact Title', 'themewar' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->add_control( 'ff_title_color', [
                                'label'     => esc_html__( 'Color', 'themewar' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .featureBox h4' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .logicImg02 .abCount02 p' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .abJobCount p' => 'color: {{VALUE}}',
                                ],
                        ]
                );    
                
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'ff_title_typography',
                                'label'     => esc_html__( 'Typography', 'themewar' ),
                                'selector'  => ' {{WRAPPER}} .featureBox h4, {{WRAPPER}} .logicImg02 .abCount02 p, {{WRAPPER}} .abJobCount p',
                        ]
                );
                $this->add_control( 'ff_title_margin', [
                                'label' => esc_html__( 'Marign', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .featureBox h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .logicImg02 .abCount02 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .abJobCount p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section(); 
        
    }
    protected function render() {
        $settings           = $this->get_settings_for_display();

        
        $abi_style          = (isset($settings['abi_style']) && $settings['abi_style'] > 0) ? $settings['abi_style'] : 1;
        $abi_hover_effect   = (isset($settings['abi_hover_effect']) && $settings['abi_hover_effect'] > 0 ? $settings['abi_hover_effect'] : 0);
        $abi_hover_effect2  = (isset($settings['abi_hover_effect2']) && $settings['abi_hover_effect2'] > 0 ? $settings['abi_hover_effect2'] : 0);
        $abi_hover_effect3  = (isset($settings['abi_hover_effect3']) && $settings['abi_hover_effect3'] > 0 ? $settings['abi_hover_effect3'] : 0);
        
        $ff_number          = (isset($settings['ff_number']) && $settings['ff_number'] != '') ? $settings['ff_number'] : 458;
        $ff_suffix          = (isset($settings['ff_suffix']) && $settings['ff_suffix'] != '') ? $settings['ff_suffix'] : '';
        $ff_fraction        = (isset($settings['ff_fraction']) && $settings['ff_fraction'] != '' ? $settings['ff_fraction'] : 'no');
        $ff_title           = (isset($settings['ff_title']) && $settings['ff_title'] != '') ? $settings['ff_title'] : esc_html__('Delivered Goods', 'themewar');
        $ff_icon            = (isset($settings['ff_icon']) && $settings['ff_icon'] != '') ? $settings['ff_icon'] : 'logisfare-delivary_goods';
        

        $class              = ($abi_hover_effect > 0 ? ($abi_hover_effect == 1 ? 'logisFlash' : ($abi_hover_effect == 2 ? 'logisShine' : 'logisCircle')) : '');
        $class2             = ($abi_hover_effect2 > 0 ? ($abi_hover_effect2 == 1 ? 'logisFlash' : ($abi_hover_effect2 == 2 ? 'logisShine' : 'logisCircle')) : '');
        $class3             = ($abi_hover_effect3 > 0 ? ($abi_hover_effect3 == 1 ? 'logisFlash' : ($abi_hover_effect3 == 2 ? 'logisShine' : 'logisCircle')) : '');
        
        $abi_image_1        = (isset($settings['abi_image_1']['id']) && $settings['abi_image_1']['id'] != '') ? $settings['abi_image_1']['id'] : 0;
        $abi_image_2        = (isset($settings['abi_image_2']['id']) && $settings['abi_image_2']['id'] != '') ? $settings['abi_image_2']['id'] : 0;
        $abi_circle_logo    = (isset($settings['abi_circle_logo']['id']) && $settings['abi_circle_logo']['id'] != '') ? $settings['abi_circle_logo']['id'] : 0;

        $ab_img_title__01   = (isset($settings['ab_img_title__01']) && $settings['ab_img_title__01'] != '') ? $settings['ab_img_title__01'] : esc_html__('15000+ Successful Transportation', 'themewar');
        $ab_img_title__02   = (isset($settings['ab_img_title__02']) && $settings['ab_img_title__01'] != '') ? $settings['ab_img_title__02'] : esc_html__('25+ Years Working Experience', 'themewar');

        $ab1_w   = ($abi_style == 1 ? 423 : ($abi_style == 2 ? 494 : ($abi_style == 3 ? 285 : ($abi_style == 4 ? 460 : ($abi_style == 5 ? 387 : 558)))));
        $ab1_h   = ($abi_style == 1 ? 500 : ($abi_style == 2 ? 500 : ($abi_style == 3 ? 400 : ($abi_style == 4 ? 500 : ($abi_style == 5 ? 400 : 600)))));

        $ab2_w   = ($abi_style == 1 ? 299 : ($abi_style == 3 ? 285 : ($abi_style == 4 ? 340 : ($abi_style == 5 ? 313 : 430))));
        $ab2_h   = ($abi_style == 1 ? 344 : ($abi_style == 3 ? 200 : ($abi_style == 4 ? 364 : ($abi_style == 5 ? 269 : 300))));

        $ab3_w   = ($abi_style == 1 ? 214 : ($abi_style == 3 ? 285 : ($abi_style == 4 ? 214 : ($abi_style == 5 ? 224 : 450))));
        $ab3_h   = ($abi_style == 1 ? 214 : ($abi_style == 3 ? 400 : ($abi_style == 4 ? 214 : ($abi_style == 5 ? 139 : 480))));


        $abi_image_1_url    = ($abi_image_1 > 0 ? logisfare_attachment_url($abi_image_1, $ab1_w, $ab1_h) : 'https://via.placeholder.com/'.$ab1_w.'x'.$ab1_h.'.png');
        $abi_image_2_url    = ($abi_image_2 > 0 ? logisfare_attachment_url($abi_image_2, $ab2_w, $ab2_h) : 'https://via.placeholder.com/'.$ab2_w.'x'.$ab2_h.'.png');
        $abi_image_3_url    = ($abi_image_1 > 0 ? logisfare_attachment_url($abi_circle_logo, $ab3_w, $ab3_h) : 'https://via.placeholder.com/'.$ab3_w.'x'.$ab3_h.'.png');

        
        $is_animation           = (isset($settings['is_animation']) && $settings['is_animation'] == 'yes') ? $settings['is_animation'] : 'no';
        $animation_name         = (isset($settings['animation_name']) && $settings['animation_name'] != '') ? $settings['animation_name'] : '';
        $animation_duration     = (isset($settings['animation_duration_id']) && $settings['animation_duration_id'] != '') ? $settings['animation_duration_id'] : '';
        $animation_delay        = (isset($settings['animation_delay']) && $settings['animation_delay'] != '') ? $settings['animation_delay'] : '';
        $animAttr = '';
        $animClass = $animAttr;
        if($is_animation == 'yes' && $animation_name !='none'){
            $animClass = ' enable_animation aos-animate';
            $animAttr .= (!empty($animation_name) ? ' data-aos='.$animation_name.' ' : '');
            $animAttr .= (!empty($animation_duration) ? ' data-aos-duration='.$animation_duration.' ' : '');
            $animAttr .= (!empty($animation_delay) ? ' data-aos-delay='.$animation_delay.' ' : '');
        }  
        
        $animation_name2        = (isset($settings['animation_name2']) && $settings['animation_name2'] != '') ? $settings['animation_name2'] : '';
        $animation_duration2    = (isset($settings['animation_duration_id2']) && $settings['animation_duration_id2'] != '') ? $settings['animation_duration_id2'] : '';
        $animation_delay2       = (isset($settings['animation_delay2']) && $settings['animation_delay2'] != '') ? $settings['animation_delay2'] : '';
        $animAttr2 = '';
        $animClass2 = $animAttr2;
        if($is_animation == 'yes' && $animation_name2 !='none'){
            $animClass2 = ' enable_animation aos-animate';
            $animAttr2 .= (!empty($animation_name2) ? ' data-aos='.$animation_name2.' ' : '');
            $animAttr2 .= (!empty($animation_duration2) ? ' data-aos-duration='.$animation_duration2.' ' : '');
            $animAttr2 .= (!empty($animation_delay2) ? ' data-aos-delay='.$animation_delay2.' ' : '');
        }
        
        $animation_name3        = (isset($settings['animation_name3']) && $settings['animation_name3'] != '') ? $settings['animation_name3'] : '';
        $animation_duration3    = (isset($settings['animation_duration_id3']) && $settings['animation_duration_id3'] != '') ? $settings['animation_duration_id3'] : '';
        $animation_delay3       = (isset($settings['animation_delay3']) && $settings['animation_delay3'] != '') ? $settings['animation_delay3'] : '';
        $animAttr3 = '';
        $animClass3 = $animAttr3;
        if($is_animation == 'yes' && $animation_name3 !='none'){
            $animClass3 = ' enable_animation aos-animate';
            $animAttr3 .= (!empty($animation_name3) ? ' data-aos='.$animation_name3.' ' : '');
            $animAttr3 .= (!empty($animation_duration3) ? ' data-aos-duration='.$animation_duration3.' ' : '');
            $animAttr3 .= (!empty($animation_delay3) ? ' data-aos-delay='.$animation_delay3.' ' : '');
        }
        

        if ($abi_style == 6) : 
        ?>
            <div class="aboutLook04">
                <div class="abLookImg01 <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class);?>">
                        <?php if(!empty($abi_image_1_url)): ?>
                            <img src="<?php echo esc_url($abi_image_1_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="abLookImg02 <?php echo esc_attr($animClass2); ?>" <?php echo esc_attr($animAttr2); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class2);?>">
                        <?php if(!empty($abi_image_2_url)): ?>
                            <img src="<?php echo esc_url($abi_image_2_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="abJobCount countfact <?php echo esc_attr($animClass3); ?> <?php echo esc_attr($ff_fraction == 'yes' ? 'hasFraction' : ''); ?>" data-count="<?php echo esc_attr($ff_number) ?>" <?php echo esc_attr($animAttr3); ?>>
                    <?php if(!empty($ff_number)): ?>
                        <h2>
                            <span class="counter"><?php echo esc_html($ff_number) ?></span>
                            <?php if(!empty($ff_suffix)) : ?>
                                <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>
                    <?php if(!empty($ff_title)): ?>
                        <p><?php echo logisfare_kses($ff_title); ?></p>
                    <?php endif; ?> 
                </div>
            </div>
        <?php elseif($abi_style == 5) : ?>
            <div class="logicImg02">
                <div class="ab_imgC_01 <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class);?>">
                        <?php if(!empty($abi_image_1_url)): ?>
                            <img src="<?php echo esc_url($abi_image_1_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="ab_imgC_02 <?php echo esc_attr($animClass2); ?>" <?php echo esc_attr($animAttr2); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class2);?>">
                        <?php if(!empty($abi_image_2_url)): ?>
                            <img src="<?php echo esc_url($abi_image_2_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="ab_imgC_03 <?php echo esc_attr($animClass3); ?>" <?php echo esc_attr($animAttr3); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class3);?>">
                        <?php if(!empty($abi_image_3_url)): ?>
                            <img src="<?php echo esc_url($abi_image_3_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="abCount02 countfact" data-count="<?php echo esc_attr($ff_number) ?>">
                    <?php if(!empty($ff_number)): ?>
                        <h2>
                            <span class="counter"><?php echo esc_html($ff_number) ?></span>
                            <?php if(!empty($ff_suffix)) : ?>
                                <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>
                    <?php if(!empty($ff_title)): ?>
                        <p><?php echo logisfare_kses($ff_title); ?></p>
                    <?php endif; ?> 
                </div>
            </div>
        <?php elseif($abi_style == 4) : ?>
            <div class="aboutLook03">
                <div class="ab01 <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class);?>">
                        <?php if(!empty($abi_image_1_url)): ?>
                            <img src="<?php echo esc_url($abi_image_1_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="ab02 <?php echo esc_attr($animClass2); ?>" <?php echo esc_attr($animAttr2); ?>>
                    <span class="aboutLookThumb <?php echo esc_attr($class2);?>">
                        <?php if(!empty($abi_image_2_url)): ?>
                            <img src="<?php echo esc_url($abi_image_2_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
                <div class="welcomeBox <?php echo esc_attr($animClass3); ?>" <?php echo esc_attr($animAttr3); ?>>
                    <span class="aboutLookThumb">
                        <?php if(!empty($abi_image_3_url)): ?>
                            <img src="<?php echo esc_url($abi_image_3_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        <?php elseif($abi_style == 3) : ?>
            <div class="abGallery02">
                <div class="row">
                    <div class="col-sm-6 <?php echo esc_attr($animClass); ?>" <?php echo esc_attr($animAttr); ?>>
                        <div class="abGalleryItem abItm3_01">
                            <span class="aboutLookThumb <?php echo esc_attr($class);?>">
                                <?php if(!empty($abi_image_1_url)): ?>
                                    <img src="<?php echo esc_url($abi_image_1_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="abGalleryItem abGale01 abItm3_02">
                            <span class="aboutLookThumb <?php echo esc_attr($class2);?>">
                                <?php if(!empty($abi_image_2_url)): ?>
                                    <img src="<?php echo esc_url($abi_image_2_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                <?php endif; ?>
                            </span>
                            <h3><?php echo esc_html($ab_img_title__01); ?></h3>
                        </div>
                    </div>
                    <div class="col-sm-6 <?php echo esc_attr($animClass3); ?>" <?php echo esc_attr($animAttr2); ?>>
                        <div class="abGalleryItem abGal02 ">
                            <h3><?php echo esc_html($ab_img_title__02); ?></h3>
                        </div>
                        <div class="abGalleryItem abGal03 abItm3_03">
                            <span class="aboutLookThumb <?php echo esc_attr($class3);?>">
                                <?php if(!empty($abi_image_3_url)): ?>
                                    <img src="<?php echo esc_url($abi_image_3_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif($abi_style == 2) : ?>
        <div class="featureLook01 about_imglk02">
            <?php if(!empty($abi_image_1_url)): ?>
                <span class="about_imglk02_thumb aboutLookThumb <?php echo esc_attr($class.' '.$animClass);?>" <?php echo esc_attr($animAttr); ?>>
                    <img src="<?php echo esc_url($abi_image_1_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </span>
            <?php endif; ?>
            <div class="featureBox <?php echo esc_attr($animClass2);?>" <?php echo esc_attr($animAttr2); ?>>
                <?php if (!empty($ff_icon)): ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['ff_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
                <?php if(!empty($ff_number)): ?>
                    <h3 class="countfact"  data-count="<?php echo esc_attr($ff_number) ?>">
                        <span class="counter"><?php echo esc_html($ff_number) ?></span>
                        <?php if(!empty($ff_suffix)) : ?>
                            <span class="counterSuffix"><?php echo esc_html($ff_suffix); ?></span>
                        <?php endif; ?>
                    </h3>
                <?php endif; ?>
                <?php if(!empty($ff_title)): ?>
                    <h4><?php echo logisfare_kses($ff_title); ?></h4>
                <?php endif; ?> 
            </div>
        </div>
        <?php else: ?>
            <div class="aboutLook">
                <div class="ab01 <?php echo esc_attr($class.' '.$animClass);?>" <?php echo esc_attr($animAttr); ?>>
                    <?php if(!empty($abi_image_1_url)): ?>
                        <span class="aboutLookThumb">
                            <img src="<?php echo esc_url($abi_image_1_url);?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </span>
                    <?php endif; ?>
                </div>
                <div class="ab02 <?php echo esc_attr($class2.' '.$animClass2);?>" <?php echo esc_attr($animAttr2);?>>
                    <?php if(!empty($abi_image_2_url)): ?>
                        <span class="aboutLookThumb">
                            <img src="<?php echo esc_url($abi_image_2_url);?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </span>
                    <?php endif; ?>
                </div>
                <div class="welcomeBox <?php echo esc_attr($animClass3);?>" <?php echo esc_attr($animAttr3); ?>>
                    <?php if(!empty($abi_image_3_url)): ?>
                        <span class="aboutLookThumb">
                            <img src="<?php echo esc_url($abi_image_3_url);?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php  endif; 
    }
    
    protected function content_template() {}
}