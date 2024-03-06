<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Themewar_Header_Widgets extends Widget_Base{
    public function get_name(){
        return 'themewar-header';
    }

    public function get_title(){
        return esc_html__('Headers', 'themewar');
    }

    public function get_icon(){
        return 'eicon-header';
    }

    public function get_categories(){
        return ['themewar-header-elements'];
    }

    protected function register_controls(){
        $this->start_controls_section('headers_style_tab',[
                'label' => esc_html__('Select Headers', 'themewar'),
                'tab' => Controls_Manager::TAB_CONTENT,
        ]);
                $this->add_control('header_style', [
                            'label' => esc_html__('Select Header Style', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'default' => 1,
                            'options' => [
                                1 => esc_html__('Style 01', 'themewar'),
                                2 => esc_html__('Style 02', 'themewar'),
                                3 => esc_html__('Style 03', 'themewar'),
                            ],
                    ]
                );
                $this->add_control('is_topbar',[
                            'label' => esc_html__('Is Topbar?', 'themewar'),
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show header Topbar?', 'themewar'),
                            'return_value' => 'yes',
                            'default' => 'yes',
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1', '3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control('header_position',[
                            'label' => esc_html__('Header Position', 'themewar'),
                            'type'  => Controls_Manager::SELECT,
                            'description' => esc_html__('You Can Set Your Header Position?', 'themewar'),
                            'default' => 1,
                            'options' => [
                                1 => esc_html__('Static', 'themewar'),
                                2 => esc_html__('Absolute', 'themewar'),
                            ],
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1', '2'],
                                    ],
                                ],
                            ],
                    ]
                );
        $this->end_controls_section(); 
        $this->start_controls_section('headers_content_01',[
                'label' => esc_html__('Topbar Content', 'themewar'),
                'tab' => Controls_Manager::TAB_CONTENT,
        ]); 
                $repeaters1 = new \Elementor\Repeater(); 
                $repeaters1->add_control('tpbr_icon',[
                            'label' => esc_html__( 'Info Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-tell',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeaters1->add_control('topbar_info', [
                            'label' => esc_html__('Info Text', 'themewar'),
                            'type'  => Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Type your info lable...'),
                            'label_block' => TRUE,
                        ]
                );
                $repeaters1->add_control( 'topbar_info_url', [
                            'label'             => esc_html__( 'Info URL', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
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
                $this->add_control('tpbr_info_list', [
                            'label'   => esc_html__('TopBar Info Show Max 3', 'themewar'),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeaters1->get_controls(),
                            'default' => [
                                [
                                    'tpbr_icon'         => esc_html__('logisfare-tell', 'themewar'),
                                    'topbar_info'         => '',
                                    'topbar_info_url'     => '',
                                ],
                            ],
                            'title_field' => '{{{ topbar_info }}}',
                            'separator'     => 'after',
                    ]
                );
                $this->add_control('is_tbr_social',[
                            'label' => esc_html__('Is Topbar Social?', 'themewar'),
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show Topbar Social Icon?', 'themewar'),
                            'return_value' => 'yes',
                            'default' => 'yes',
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1', '3'],
                                    ],
                                ],
                            ],
                    ]
                );
                $repeaters2 = new \Elementor\Repeater();
                $repeaters2->add_control('tpbr_s_icon',[
                            'label' => esc_html__( 'Social Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'themewar_facebook-f',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeaters2->add_control( 'tpbr_s_url', [
                            'label' => esc_html__('Social Url', 'themewar'),
                            'type'  => Controls_Manager::URL,
                            'input_type' => 'url',
                            'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                            ],
                    ]
                );
                $repeaters2->add_control( 'tpbr_s_color', [
                            'label'     => esc_html__( 'Color', 'themewar' ),
                            'type'      => Controls_Manager::COLOR,
                            'description' => esc_html__('social icon color.', 'themewar'),
                    ]
                );
                $this->add_control( 'tpbr_s_list', [
                            'label'   => esc_html__('Topbar Social Items', 'themewar'),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeaters2->get_controls(),
                            'default' => [
                                [
                                    'tpbr_s_icon'   => '',
                                    'tpbr_s_url'     => '',
                                    'tpbr_s_color'   => '',
                                ],
                            ],
                            'conditions'  => [
                                'terms'   => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1','3'],
                                    ],
                                    [
                                        'name'      => 'is_topbar',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                    [
                                        'name'      => 'is_tbr_social',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );

                $this->add_control('tpbr_right_info_hd',[
                            'label' => esc_html__( 'Topbar Right Info', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'conditions'  => [
                                'terms'   => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                    ],
                                ],
                            ],
                    ]
                );
                $repeaters3 = new \Elementor\Repeater();
                $repeaters3->add_control('tpbr_right_icon',[
                            'label' => esc_html__( 'Info Right Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-location_root',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeaters3->add_control('topbar_right_info', [
                            'label' => esc_html__('Info Text', 'themewar'),
                            'type'  => Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Type your info lable...', 'themewar'),
                            'default'   => esc_html__('325 Buffet Line, Australia', 'themewar'),
                            'label_block' => TRUE,
                        ]
                );
                $repeaters3->add_control( 'topbar_right_info_url', [
                            'label'             => esc_html__( 'Right Info URL', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
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
                $this->add_control('tpbr_right_info_list', [
                            'label'   => esc_html__('TopBar Right Info Show Only 1', 'themewar'),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeaters3->get_controls(),
                            'default' => [
                                [
                                    'tpbr_right_icon'         => esc_html__('logisfare-location_root', 'themewar'),
                                    'topbar_right_info'         => '',
                                    'topbar_right_info_url'     => '',
                                ],
                            ],
                            'title_field' => '{{{ topbar_right_info }}}',
                            'separator'     => 'after',
                            'conditions'  => [
                                'terms'   => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                    ],
                                ],
                            ],
                    ]
                );

        $this->end_controls_section();

        $this->start_controls_section('headers_content_02',[
                'label' => esc_html__('Main Headers Style', 'themewar'),
                'tab' => Controls_Manager::TAB_CONTENT,
        ]); 
                $this->add_control('logo',[
                            'label' => esc_html__('Logo', 'themewar'),
                            'type'  => Controls_Manager::MEDIA,
                            'description' => esc_html__('Upload your site logo and your logo size should be 145x41.', 'themewar'),
                    ]
                );
                $this->add_control('is_hdr_contact_info',[
                            'label' => esc_html__('Is Header Contact Info?', 'themewar'),
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show cart btn hover mini cart?', 'themewar'),
                            'return_value' => 'yes',
                            'default'    => 'yes',
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => '==',
                                        'value'     => '3',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control('is_search_btn',[
                            'label' => esc_html__('Is Search?', 'themewar'),
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show header contact btn?', 'themewar'),
                            'return_value' => 'yes',
                            'default' => 'no',
                    ]
                );
                $this->add_control('is_cart',[
                            'label' => esc_html__('Is Cart Btn?', 'themewar'),
                            'type'  => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show cart btn?', 'themewar'),
                            'return_value' => 'yes',
                            'default'    => 'no',
                    ]
                );
                $this->add_control('is_mini_cart',[
                            'label' => esc_html__('Is Hover Mini Cart?', 'themewar'),
                            'type' => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show cart btn hover mini cart?', 'themewar'),
                            'return_value' => 'yes',
                            'default'    => 'no',
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'is_cart',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'is_user', [
                            'label' => esc_html__('Is User?', 'themewar'),
                            'type'  => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show User Btn?', 'themewar'),
                            'return_value' => 'yes',
                            'default'    => 'no',
                    ]
                );
                $this->add_control( 'is_btn', [
                            'label' => esc_html__('Is Button?', 'themewar'),
                            'type'  => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show login Btn?', 'themewar'),
                            'return_value' => 'yes',
                            'default'    => 'no',
                    ]
                );
                $this->add_control( 'btn_lable',[
                            'label'       => esc_html__('Button Label', 'themewar'),
                            'type'        => Controls_Manager::TEXT,
                            'label_block' => TRUE,
                            'default'     => esc_html__("Get a Quote", 'themewar'),
                            'conditions'  => [
                                'terms'   => [
                                    [
                                        'name'      => 'is_btn',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control('btn_url', [
                            'label' => esc_html__('Button Url', 'themewar'),
                            'type'  => Controls_Manager::URL,
                            'input_type' => 'url',
                            'placeholder' => esc_html__('https://your-link.com', 'themewar'),
                            'show_external' => true,
                            'default' => [
                                'url' => '',
                                'is_external' => false,
                                'nofollow' => false,
                            ],
                            'conditions'  => [
                                'terms'   => [
                                    [
                                        'name'      => 'is_btn',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );
                
                $this->add_control('is_sticky',[
                            'label' => esc_html__('Is Sticky Header?', 'themewar'),
                            'type'  => Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'themewar'),
                            'label_off' => esc_html__('No', 'themewar'),
                            'description' => esc_html__('Do you want to show sticky header?', 'themewar'),
                            'return_value' => 'yes',
                            'default' => 'no',
                    ]
                );
                $this->add_control( 'search_popup_logo',[
                            'label' => esc_html__('Search Popup Logo', 'themewar'),
                            'type'  => Controls_Manager::MEDIA,
                            'description' => esc_html__('Upload your popup area search logo. logo size should be 183x37px.', 'themewar'),
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'is_search_btn',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                    [
                                        'name'      => 'header_style',
                                        'operator'  => '!=',
                                        'value'     => '3',
                                    ],
                                ],
                            ],
                    ]
                );
                $this->add_control( 'input_placeholder',[
                            'label' => esc_html__('Search Input Placeholder', 'themewar'),
                            'type'  => Controls_Manager::TEXT,
                            'label_block' => 'true',
                            'default'     => esc_html__('Type Words and Hit Enter', 'themewar'),
                            'description' => esc_html__('Type your search input placeholder...', 'themewar'),
                            'conditions' => [
                                'terms'  => [
                                    [
                                        'name'      => 'is_search_btn',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                    ],
                                ],
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_hdr_contact_ifno', [
                'label'         => esc_html__('Header Contact Info', 'themewar'),
                'tab'           => Controls_Manager::TAB_CONTENT,
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '3',
                        ],
                        [
                            'name'      => 'is_hdr_contact_info',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $repeater4 = new \Elementor\Repeater();
                $repeater4->add_control('hdr_contact_info_icon',[
                            'label' => esc_html__( 'Info Right Icon', 'themewar' ),
                            'type' => Controls_Manager::ICONS,
                            'label_block'   => TRUE,
                            'default' => [
                                'value' => 'logisfare-call1',
                                'library' => 'tw_icon',
                            ],
                    ]
                );
                $repeater4->add_control('hdr_contact_info_title', [
                            'label' => esc_html__('Info Text', 'themewar'),
                            'type'  => Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Type your info lable...', 'themewar'),
                            'default'   => esc_html__('Phone Number', 'themewar'),
                            'label_block' => TRUE,
                        ]
                );
                $repeater4->add_control('hdr_contact_info_lable', [
                            'label' => esc_html__('Info Text', 'themewar'),
                            'type'  => Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Type your info lable...', 'themewar'),
                            'default'   => esc_html__('(+202) 2156-2145', 'themewar'),
                            'label_block' => TRUE,
                        ]
                );
                $repeater4->add_control( 'hdr_contact_info_url', [
                            'label'             => esc_html__( 'Right Info URL', 'themewar' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'themewar' ),
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
                $this->add_control('hd_contact_list',[
                        'label' => esc_html__( 'Header Contact Items', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => $repeater4->get_controls(),
                        'default' => [
                            [
                                'hdr_contact_info_icon'   => array(),
                                'hdr_contact_info_title'  => esc_html__( 'Phone Number', 'themewar' ),
                                'hdr_contact_info_lable'  => esc_html__( '(+202) 2156-2145', 'themewar' ),
                                'hdr_contact_info_url'    => array(),
                            ],
                        ],
                        'title_field' => '{{{ hdr_contact_info_title }}}', 
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_header253', [
                'label'         => esc_html__('Topbar Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'topbar_area_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .topBar01, {{WRAPPER}} .header02:before, {{WRAPPER}} .headerArea03',
                    ]
                );
                $this->add_responsive_control('header_topbar_bg_opacity',[
                        'label' => esc_html__( 'Background Opacity', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1,
                                'step' => 0.01,
                            ],
                        ],
                        'default' => [
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .header02:before' => 'opacity: {{SIZE}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ],
                                [
                                        'name'      => 'header_position',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'topbar_area_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .topBar01, {{WRAPPER}} .header02:before, {{WRAPPER}} .headerArea03',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'topbar_area_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .topBar01, {{WRAPPER}} .header02:before, {{WRAPPER}} .headerArea03',
                    ]
                );
                $this->add_responsive_control('tw_topbar_top',[
                        'label' => esc_html__( 'Top', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                            'px' => [
                                'min' => -1000,
                                'max' => 1000,
                                'step' => 0,
                            ],
                        ],
                        'default' => [
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .topBar01.absoluteTopB' => 'top: {{SIZE}}{{UNIT}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1'],
                                ],
                                [
                                        'name'      => 'is_topbar',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                                [
                                        'name'      => 'header_position',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_control('tw_topbar_zindex',[
                        'label' => esc_html__( 'z Index', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 10000,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'size' => 999,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .topBar01.absoluteTopB' => 'z-index: {{SIZE}};',
                        ],
                        'conditions'    => [
                            'terms' => [
                                [
                                        'name'      => 'header_style',
                                        'operator'  => 'in',
                                        'value'     => ['1'],
                                ],
                                [
                                        'name'      => 'is_topbar',
                                        'operator'  => '==',
                                        'value'     => 'yes',
                                ],
                                [
                                        'name'      => 'header_position',
                                        'operator'  => 'in',
                                        'value'     => ['2'],
                                ]
                            ],
                        ],
                    ]
                );
                $this->add_responsive_control('topbar_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .topBar01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .header02:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .headerArea03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'topbar_area_mr',[
                            'label' => esc_html__( 'Area Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .topBar01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .header02:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .headerArea03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'topbar_area_pd',[
                            'label' => esc_html__( 'Area Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .topBar01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .header02:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .headerArea03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_header254', [
                'label'         => esc_html__('Topbar Info Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,  
        ]);
        
                $this->add_control( 'tpbr_info_content_hed', [
                            'label' => esc_html__( 'Topbar Info Label', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'tpbr_info_content_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .topDesc p, {{WRAPPER}} .tpRight p',
                    ]
                );
                $this->add_responsive_control( 'tpbr_info_content_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .topDesc p'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .tpRight p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tpbr_info_content_hr_color', [
                            'label' => esc_html__( 'Link Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .topDesc p a:hover'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .tpRight p a:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tpbr_info_content_mr',[
                                'label' => esc_html__( 'Lable Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .topDesc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tpbr_info_content_pd',[
                                'label' => esc_html__( 'Lable Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .topDesc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'tpbr_info_content_i_hed02', [
                            'label' => esc_html__( 'Topbar Info Icon', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->start_controls_tabs('topbar_info_style_tabs');
                    $this->start_controls_tab( 'topbar_info_icon_tab',[
                            'label' => esc_html__( 'Icon', 'themewar' ),]
                    );
                            $this->add_group_control( Group_Control_Typography::get_type(), [
                                        'name' => 'tpbr_info_content_i_typo',
                                        'label' => esc_html__( 'Typography', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .topDesc p i, {{WRAPPER}} .tpRight p i',
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_info_content_i_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topDesc p i'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .tpRight p i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                    $this->end_controls_tab(); 
                    $this->start_controls_tab( 'topbar_info_svg_tab',[
                            'label' => esc_html__( 'SVG', 'themewar' ),]
                    );
                            $this->add_responsive_control( 'hd_c_box_svg_fill_nr',[
                                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topDesc p > svg' => 'fill: {{VALUE}}',
                                                '{{WRAPPER}} .tpRight p > svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'hd_c_box_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topDesc p > svg' => 'stroke: {{VALUE}}',
                                                '{{WRAPPER}} .tpRight p > svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'hd_c_box_svg_stroke_width',[
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
                                                '{{WRAPPER}} .topDesc p > svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                                '{{WRAPPER}} .tpRight p > svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                        ]
                                ]
                            );	
                            $this->add_responsive_control( 'hd_c_box_svg_width', [
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
                                                    '{{WRAPPER}} .topDesc p > svg' => 'width: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .tpRight p > svg' => 'width: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'hd_c_box_svg_height', [
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
                                                    '{{WRAPPER}} .topDesc p > svg' => 'height: {{SIZE}}{{UNIT}};',
                                                    '{{WRAPPER}} .tpRight p > svg' => 'height: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_responsive_control( 'tpbr_info_content_i_mr',[
                                'label' => esc_html__( 'Icon Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'separator' => 'before',
                                'selectors'  => [
                                    '{{WRAPPER}} .topDesc p i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight p i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .topDesc p > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight p > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tpbr_info_content_i_pd',[
                                'label' => esc_html__( 'Icon Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .topDesc p i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight p i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .topDesc p > svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .tpRight p > svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_header255', [
                'label'         => esc_html__('Topbar Social Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,  
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'is_topbar',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                        [
                            'name'      => 'header_style',
                            'operator'  => '!=',
                            'value'     => '2',
                        ],
                    ],
                ],
        ]);
                $this->start_controls_tabs('topbar_social_tabs');
                
                    $this->start_controls_tab('topbar_social_icon',[
                            'label' => esc_html__( 'Icon', 'Themewar' ),
                    ]);
                            $this->add_group_control( Group_Control_Typography::get_type(), [
                                        'name' => 'tpbr_social_typo',
                                        'label' => esc_html__( 'Typography', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .topSocial a',
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_social_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_social_color_hr', [
                                        'label' => esc_html__( 'Link Hover Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a:hover'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('topbar_social_svg',[
                            'label' => esc_html__( 'SVG', 'Themewar' ),
                    ]);
                            $this->add_responsive_control( 'tpbr_s_svg_fill_nr',[
                                        'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_s_svg_fill_hr',[
                                        'label'     => esc_html__( 'Hover Fill Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a:hover svg' => 'fill: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_s_svg_stroke',[
                                        'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_s_svg_stroke_hr',[
                                        'label'     => esc_html__( 'Hover Stroke Color', 'themewar' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .topSocial a:hover svg' => 'stroke: {{VALUE}}',
                                        ]
                                ]
                            );
                            $this->add_responsive_control( 'tpbr_s_svg_stroke_width',[
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
                                                '{{WRAPPER}} .topSocial a svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                        ]
                                ]
                            );	
                            $this->add_responsive_control( 'tpbr_s_svg_width', [
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
                                                    '{{WRAPPER}} .topSocial a svg' => 'width: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'tpbr_s_svg_height', [
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
                                                    '{{WRAPPER}} .topSocial a svg' => 'height: {{SIZE}}{{UNIT}};',
                                            ],
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'tpbr_social_mr',[
                                'label' => esc_html__( 'Icon Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'separator' => 'before',
                                'selectors'  => [
                                    '{{WRAPPER}} .topSocial a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .topSocial a svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tpbr_social_pd',[
                                'label' => esc_html__( 'Icon Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .topSocial a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .topSocial a svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_header123', [
                'label'         => esc_html__('Headers Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_control( 'main_header_area_style', [
                            'label' => esc_html__( 'Header Area', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->start_controls_tabs('section_tab_nr_header');
                    $this->start_controls_tab('style_normal_header_tab',[
                            'label' => esc_html__( 'Default', 'themewar' ),
                    ]);
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'header_area_bg_nr',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .header01, {{WRAPPER}} .header02, {{WRAPPER}} .headerArea03',
                                ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'header_area_border_nr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .header01, {{WRAPPER}} .header02, {{WRAPPER}} .headerArea03',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'header_area_shadow_nr',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .header01, {{WRAPPER}} .header02, {{WRAPPER}} .headerArea03',
                                ]
                            );
                            $this->add_responsive_control('tw_absolute_header_top',[
                                    'label' => esc_html__( 'Top', 'themewar' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px'],
                                    'range' => [
                                        'px' => [
                                            'min' => -1000,
                                            'max' => 1000,
                                            'step' => 0,
                                        ],
                                    ],
                                    'default' => [
                                        'size' => 0,
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .header01.absoluteHeader' => 'top: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .header02.absoluteHeader' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                    'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'header_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['1','2'],
                                            ],
                                            [
                                                    'name'      => 'header_position',
                                                    'operator'  => 'in',
                                                    'value'     => ['2'],
                                            ]
                                        ],
                                    ],
                                ]
                            );
                            $this->add_control('tw_absolute_header_zindex',[
                                    'label' => esc_html__( 'z Index', 'themewar' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px'],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 10000,
                                            'step' => 1,
                                        ],
                                    ],
                                    'default' => [
                                        'size' => 999,
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .header01.absoluteHeader' => 'z-index: {{SIZE}};',
                                        '{{WRAPPER}} .header02.absoluteHeader' => 'z-index: {{SIZE}};',
                                    ],
                                    'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'header_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['1','2'],
                                            ],
                                            [
                                                    'name'      => 'header_position',
                                                    'operator'  => 'in',
                                                    'value'     => ['2'],
                                            ]
                                        ],
                                    ],
                                ]
                            );
                            $this->add_responsive_control('header_area_radius_nr', [
                                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .headerArea03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'header_area_margin_nr',[
                                        'label' => esc_html__( 'Area Margin', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .headerArea03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'header_area_padding_nr',[
                                        'label' => esc_html__( 'Area Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .headerArea03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_control( 'main_header_logo_bg', [
                                        'label' => esc_html__( 'Header Left BG', 'themewar' ),
                                        'type' => \Elementor\Controls_Manager::HEADING,
                                        'separator' => 'before',
                                        'conditions'  => [
                                            'terms'   => [
                                                [
                                                    'name'      => 'header_style',
                                                    'operator'  => '==',
                                                    'value'     => '2',
                                                ],
                                            ],
                                        ],
                                ]
                            );   
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'header_area_logo_bg',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .header02::after',
                                        'conditions'  => [
                                            'terms'   => [
                                                [
                                                    'name'      => 'header_style',
                                                    'operator'  => '==',
                                                    'value'     => '2',
                                                ],
                                            ],
                                        ],
                                ]
                            );
                            $this->add_responsive_control('header_area_logo_bg_opacity',[
                                    'label' => esc_html__( 'Opacity', 'themewar' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px'],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 1,
                                            'step' => 0.01,
                                        ],
                                    ],
                                    'default' => [
                                        'size' => 0,
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .header02::after' => 'opacity: {{SIZE}};',
                                    ],
                                    'conditions'  => [
                                        'terms'   => [
                                            [
                                                'name'      => 'header_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                            ],
                                        ],
                                    ],
                                ]
                            );
                    $this->end_controls_tab();

                    $this->start_controls_tab('style_is_sticky_header_tab',[
                            'label' => esc_html__( 'Is Sticky', 'themewar' ),
                    ]);
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'header_area_bg_st',
                                        'label' => esc_html__( 'Background', 'themewar' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .header01.isSticky.fixedHeader, {{WRAPPER}} .header02.isSticky.fixedHeader, {{WRAPPER}} .stickyHeader03.isSticky.fixedHeader, {{WRAPPER}} header.fixedHeader.absoluteHeader',
                                ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'header_area_border_st',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .header01.isSticky.fixedHeader, {{WRAPPER}} .header02.isSticky.fixedHeader, {{WRAPPER}} .stickyHeader03.isSticky.fixedHeader, {{WRAPPER}} header.fixedHeader.absoluteHeader',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'header_area_shadow_st',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .header01.isSticky.fixedHeader, {{WRAPPER}} .header02.isSticky.fixedHeader, {{WRAPPER}} .stickyHeader03.isSticky.fixedHeader, {{WRAPPER}} header.fixedHeader.absoluteHeader',
                                ]
                            );
                            $this->add_responsive_control('tw_sticky_header_top',[
                                    'label' => esc_html__( 'Top', 'themewar' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px'],
                                    'range' => [
                                        'px' => [
                                            'min' => -1000,
                                            'max' => 1000,
                                            'step' => 0,
                                        ],
                                    ],
                                    'default' => [
                                        'size' => 0,
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} .header01.fixedHeader.absoluteHeader' => 'top: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .header02.fixedHeader.absoluteHeader' => 'top: {{SIZE}}{{UNIT}};',
                                    ],
                                    'conditions'    => [
                                        'terms' => [
                                            [
                                                    'name'      => 'header_style',
                                                    'operator'  => 'in',
                                                    'value'     => ['1','2'],
                                            ],
                                            [
                                                    'name'      => 'header_position',
                                                    'operator'  => 'in',
                                                    'value'     => ['2'],
                                            ],
                                            [
                                                    'name'      => 'is_sticky',
                                                    'operator'  => '==',
                                                    'value'     => 'yes',
                                            ]
                                        ],
                                    ],
                                ]
                            );
                            $this->add_responsive_control('header_area_radius_st', [
                                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01.isSticky.fixedHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02.isSticky.fixedHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .stickyHeader03.isSticky.fixedHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} header.fixedHeader.absoluteHeader' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'header_area_margin_st',[
                                        'label' => esc_html__( 'Area Margin', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01.isSticky.fixedHeader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02.isSticky.fixedHeader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .stickyHeader03.isSticky.fixedHeader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} header.fixedHeader.absoluteHeader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'header_area_padding_st',[
                                        'label' => esc_html__( 'Area Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .header01.isSticky.fixedHeader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .header02.isSticky.fixedHeader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .stickyHeader03.isSticky.fixedHeader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} header.fixedHeader.absoluteHeader' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                    $this->end_controls_tab(); 
                $this->end_controls_tabs();
        $this->end_controls_section(); 

        $this->start_controls_section('section_header_logo', [
                'label'         => esc_html__('Headers Logo Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE
        ]);
                $this->add_responsive_control('header_logo_width', [
                            'label' => esc_html__( 'Logo Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logo img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'description' => esc_html__( 'Your Logo width should be 145px', 'themewar' ),
                        ]
                );
                $this->add_responsive_control('header_logo_height', [
                            'label' => esc_html__( 'Logo Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logo img' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'description' => esc_html__( 'Your Logo height should be 41px', 'themewar' ),
                        ]
                );
                $this->add_responsive_control( 'hd_logo_padding',[
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logo img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_logo_margin',[
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .logo img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section(); 
        
        $this->start_controls_section('section_tab_hd_contact_ifno',[
                'label'         => esc_html__('Header Contact Info Icon Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '3',
                        ],
                        [
                            'name'      => 'is_hdr_contact_info',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->start_controls_tabs('hd_c_Box_icon_tabs');
                        $this->start_controls_tab('style_icon_tab',[
                                'label' => esc_html__( 'Icon', 'themewar' ),
                        ]);
                                $this->add_group_control( Group_Control_Typography::get_type(), [
                                                'name'      => 'hd_c_Box_i_typography',
                                                'label'     => esc_html__( 'Icon Typography', 'themewar' ),
                                                'selector'  => '{{WRAPPER}} .headIbox span i'
                                        ]
                                );
                                $this->add_responsive_control( 'hd_c_Box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'themewar' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .headIbox i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                        $this->end_controls_tab();

                        $this->start_controls_tab('style_svg_tab',[
                                'label' => esc_html__( 'SVG', 'themewar' ),
                        ]);
                                $this->add_responsive_control( 'hd_c_Box_svg_fill_nr',[
                                            'label'     => esc_html__( 'SVG Fill Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .headIbox span svg' => 'fill: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'fContact_info span ',[
                                            'label'     => esc_html__( 'SVG Stroke Color', 'themewar' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .headIbox span svg' => 'stroke: {{VALUE}}',
                                            ]
                                    ]
                                );
                                $this->add_responsive_control( 'fContact_svg_stroke_width',[
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
                                                    '{{WRAPPER}} .headIbox span svg' => 'stroke-width: {{SIZE}}{{UNIT}};',
                                            ]
                                    ]
                                );	
                                $this->add_responsive_control( 'fContact_box_svg_width', [
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
                                                        '{{WRAPPER}} .headIbox span svg' => 'width: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'fContact_box_svg_height', [
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
                                                        '{{WRAPPER}} .headIbox span svg' => 'height: {{SIZE}}{{UNIT}};',
                                                ],
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control('fContact_box_hr',['type' => \Elementor\Controls_Manager::DIVIDER,]);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'fContact_box_i_bg_color',
                                'label' => esc_html__( 'Icon Background', 'themewar' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .headIbox span',
                        ]
                );
                
                $this->add_responsive_control( 'fContact_box_i_width', [
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
                                        '{{WRAPPER}} .headIbox span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'fContact_box_i_height', [
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
                                        '{{WRAPPER}} .headIbox span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'hd_c_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'themewar' ),
                                'selector' => '{{WRAPPER}} .headIbox span',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'hd_c_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'themewar' ),
                                'selector' => '{{WRAPPER}} .headIbox span',
                        ]
                );
                $this->add_responsive_control( 'hd_c_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .headIbox span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_c_box_i_padding', [
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'hd_c_box_i_margin', [
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .headIbox span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        $this->start_controls_section('section_tab_hd_contact_content',[
                'label'         => esc_html__('Header Contact Info Content Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '3',
                        ],
                        [
                            'name'      => 'is_hdr_contact_info',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                    ],
                ],
        ]);
                $this->add_control( 'hd_contect_content_hd1', [
                            'label' => esc_html__( 'Contact Title', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_contact_info_cnt_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .headIbox p',
                    ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .headIbox p'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_mr',[
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_pd',[
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'hd_contect_content_hd2', [
                            'label' => esc_html__( 'Contact Lable', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_contact_info_cnt_lb_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .headIbox h3',
                    ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_lb_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .headIbox h3'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_lb_color_hr', [
                            'label' => esc_html__( 'Link Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .headIbox h3 a:hover'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_lb_mr',[
                                'label' => esc_html__( 'Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_lb_pd',[
                                'label' => esc_html__( 'Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'hd_contect_content_hd3', [
                            'label' => esc_html__( 'Contact Item Area', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                ); 
                $this->add_responsive_control( 'hd_contact_info_cnt_ar_mr',[
                                'label' => esc_html__( 'Item Area Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_contact_info_cnt_ar_pd',[
                                'label' => esc_html__( 'Item Area Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .headIbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section('hd_nav_area_section', [
                'label'         => esc_html__('Nav Area Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'  => [
                    'terms'   => [
                        [
                            'name'      => 'header_style',
                            'operator'  => '==',
                            'value'     => '3',
                        ],
                    ],
                ],
        ]);
                $this->start_controls_tabs( 'nav_area_tab_style');
                
                    $this->start_controls_tab('nav_area_tab_normal_style', [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
                                        'name' => 'nav_area_background',
                                        'label' => esc_html__( 'Nav Area Bg', 'themewar' ),
                                        'types' => [ 'classic', 'gradient',],
                                        'selector' => '{{WRAPPER}} .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'nav_area_snormal_shadow',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'nav_area_snormal_bdr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_responsive_control('nav_area_normal_radius', [
                                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .mainMenu03.mainMenu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'nav_area_normal_mr',[
                                        'label' => esc_html__( 'Margin', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%'],
                                        'separator' => 'before',
                                        'selectors'  => [
                                            '{{WRAPPER}} .mainMenu03.mainMenu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'nav_area_normal_pd',[
                                        'label' => esc_html__( 'Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%'],
                                        'selectors'  => [
                                            '{{WRAPPER}} .mainMenu03.mainMenu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_area_tab_sticky_style', [
                            'label' => esc_html__( 'Sticky', 'themewar' ),
                    ]);
                            $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
                                        'name' => 'nav_area_stciky_background',
                                        'label' => esc_html__( 'Nav Area Sticky Bg', 'themewar' ),
                                        'types' => [ 'classic', 'gradient',],
                                        'selector' => '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name'      => 'nav_area_stciky_shadow',
                                        'label'     => esc_html__( 'Shadow', 'themewar' ),
                                        'selector'  => '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                        'name' => 'nav_area_stciky_bdr',
                                        'label' => esc_html__( 'Border', 'themewar' ),
                                        'selector' => '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu',
                                ]
                            );
                            $this->add_responsive_control('nav_area_stciky_radius', [
                                        'label' => esc_html__( 'Border Radius', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'nav_area_stciky_mr',[
                                        'label' => esc_html__( 'Margin', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%'],
                                        'separator' => 'before',
                                        'selectors'  => [
                                            '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_responsive_control( 'nav_area_stciky_pd',[
                                        'label' => esc_html__( 'Padding', 'themewar' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%'],
                                        'selectors'  => [
                                            '{{WRAPPER}} .stickyHeader03 .mainMenu03.mainMenu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section(); 
        $this->start_controls_section('section_header_menu', [
                'label'         => esc_html__('Headers Menu Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_control( 'hd_main_menu_content', [
                            'label' => esc_html__( 'Main Menu', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_main_menu_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .mainMenu > ul > li > a',
                    ]
                );
                $this->add_responsive_control( 'hd_main_menu_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu > ul > li > a'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_main_menu_color_hr', [
                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu > ul > li:hover>a'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_main_menu_underln_color', [
                            'label' => esc_html__( 'Menu Underline Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu > ul > li:after'   => 'background: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_main_menu_margin',[
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .header01 .mainMenu > ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .header02 .mainMenu > ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_main_menu_padding',[
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .header01 .mainMenu > ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .header02 .mainMenu > ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'hd_main_menu_content_arrow', [
                            'label' => esc_html__( 'Menu Dropdown Arrow', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_main_menu_ar_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .mainMenu ul li.menu-item-has-children>a:after',
                    ]
                );
                $this->add_responsive_control( 'hd_main_menu_ar_margin',[
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors'  => [
                                '{{WRAPPER}} .mainMenu ul li.menu-item-has-children>a:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );  
        $this->end_controls_section(); 

        $this->start_controls_section('hd_main_menu_dp_area', [
                'label'         => esc_html__('Menu Dropdown Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);      
                $this->add_control( 'dp_area_styles', [
                            'label' => esc_html__( 'Dropdown Area', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'hd_main_menu_dp_bg',
                            'label' => esc_html__( 'Background', 'themewar' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .mainMenu ul li ul, {{WRAPPER}} .header01.header02',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'hd_main_menu_dp_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .mainMenu ul li ul, {{WRAPPER}} .header01.header02',
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'hd_main_menu_dp_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .mainMenu ul li ul, {{WRAPPER}} .header01.header02',
                    ]
                );
                $this->add_responsive_control('hd_main_menu_dp_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .mainMenu ul li ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('menu_dp_area_width', [
                            'label' => esc_html__( 'Dropdown Area Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .mainMenu ul li ul' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                );
                $this->add_responsive_control( 'hd_main_menu_dp_padding',[
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mainMenu ul li ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'hd_main_menu_dp_margin',[
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mainMenu ul li ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'dp_area_label_styles', [
                            'label' => esc_html__( 'Dropdown Label', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'dp_menu_typo',
                            'label' => esc_html__( 'Label Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .mainMenu ul li ul li a',
                    ]
                );
                $this->add_responsive_control( 'dp_menu_color', [
                            'label' => esc_html__( 'Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu ul li ul li a'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .mainMenu > ul > li ul li.menu-item-has-children:after'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_color_hr', [
                            'label' => esc_html__( 'Hover Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu ul li > ul > li:hover > a'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .mainMenu ul li > ul li > ul > li:hover > a'   => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .mainMenu > ul > li ul li.menu-item-has-children:hover:after'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_border_color_hr', [
                            'label' => esc_html__( 'Hover Border Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .mainMenu ul > li ul li:hover > a:after'   => 'border-color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_padding',[
                                'label' => esc_html__( 'Item Padding', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mainMenu ul li ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dp_menu_margin',[
                                'label' => esc_html__( 'Item Margin', 'themewar' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .mainMenu ul li ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section(); 

        $this->start_controls_section('hd_nav_access_1', [
                'label'         => esc_html__('Nav Access Search', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_nav_Icon_sr_type',
                            'label' => esc_html__( 'Icon Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .accessNav .anSearch a, {{WRAPPER}} .anSearchBar button i',
                    ]
                );
                $this->start_controls_tabs( 'nav_acc_search');
                    $this->start_controls_tab('nav_acc_search_nr',[
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                    ); 
                            $this->add_responsive_control( 'hd_nav_access_sr_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .accessNav .anSearch a'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .anSearchBar button i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( \Elementor\Group_Control_Background::get_type(),[
                                    'name' => 'nav_acc_background',
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .accessNav .anSearch a, {{WRAPPER}} .anSearchBar button',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_acc_search_hr',[
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                    ); 
                            $this->add_responsive_control( 'hd_nav_access_sr_color_hr', [
                                        'label' => esc_html__( 'Hover Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .accessNav .anSearch a:hover i'   => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .anSearchBar button:hover i'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control( \Elementor\Group_Control_Background::get_type(),[
                                        'name' => 'nav_acc_background_hr',
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .accessNav .anSearch a:hover, {{WRAPPER}} .anSearchBar button:hover',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'nv_acc_search_bdr',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'separator' => 'before',
                            'selector' => '{{WRAPPER}} .accessNav .anSearch a, {{WRAPPER}} .anSearchBar button',
                    ]
                );
                $this->add_responsive_control('nv_acc_search_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .accessNav .anSearch a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .anSearchBar button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_access_sr_margin',[
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .accessNav .anSearch a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .anSearchBar button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_access_sr_padding',[
                            'label' => esc_html__( 'Item Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .accessNav .anSearch a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .anSearchBar button' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'nv_acc_search_area_hd2', [
                        'label' => esc_html__( 'Search Area', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);

                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_nav_access_sr_input_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .anSearchBar input',
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access_sr_input_color', [
                            'label' => esc_html__( 'Input Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .anSearchBar input'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access_sr_input_plc_color', [
                            'label' => esc_html__( 'Placeholder Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .anSearchBar input::placeholder'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_group_control( \Elementor\Group_Control_Background::get_type(),[
                        'name' => 'hd_nav_access_sr_area_bg',
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .anSearchBar form',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'hd_nav_access_sr_area_bd',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .anSearchBar form',
                    ]
                );
                $this->add_responsive_control('hd_nav_access_sr_area_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .anSearchBar form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access_sr_area_mr',[
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .anSearchBar form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access_sr_area_pd',[
                            'label' => esc_html__( 'Item Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .anSearchBar form' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );

        $this->end_controls_section(); 

        $this->start_controls_section('hd_nav_access_2', [
                'label'         => esc_html__('Nav Access Style', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]); 
                
                $this->add_control( 'hd_nav_access2_login', [
                        'label' => esc_html__( 'Gird ', 'themewar' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                ]);
                $this->start_controls_tabs( 'hamb_tabs2');
                    $this->start_controls_tab('hamb_tab_nr2',[
                                'label' => esc_html__( 'Normal', 'themewar' ),
                        ]
                    ); 
                        $this->add_responsive_control( 'hamb_icon_color2', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logisfareGridMenu a span'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Background::get_type(),[
                                    'name' => 'hamb_nr_bg2',
                                    'types' => [ 'classic', 'gradient' ],
                                    'selector' => '{{WRAPPER}} .logisfareGridMenu a',
                                    'separator' => 'after',
                            ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('hamb_tab_hr2',[
                                'label' => esc_html__( 'Hover', 'themewar' ),
                        ]
                    ); 
                        $this->add_responsive_control( 'hamb_icon_color_hr2', [
                                    'label' => esc_html__( 'Color', 'themewar' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .logisfareGridMenu a span'   => 'color: {{VALUE}}',
                                    ],
                            ]
                        );
                        $this->add_group_control(Group_Control_Background::get_type(),[
                                    'name' => 'hamb_hr_bg2',
                                    'types' => [ 'classic', 'gradient' ],
                                    'selector' => '{{WRAPPER}} .logisfareGridMenu a:hover',
                                    'separator' => 'after',
                            ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                            'name'      => 'hd_nav_access2_grid_shadow',
                            'label'     => esc_html__( 'Shadow', 'themewar' ),
                            'selector'  => '{{WRAPPER}} .logisfareGridMenu a',
                    ]
                );
                $this->add_group_control(Group_Control_Border::get_type(), [
                            'name' => 'hd_nav_access2_grid_border',
                            'label' => esc_html__( 'Border', 'themewar' ),
                            'selector' => '{{WRAPPER}} .logisfareGridMenu a',
                    ]
                );
                $this->add_responsive_control('hd_nav_access2_grid_radius', [
                            'label' => esc_html__( 'Border Radius', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareGridMenu a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('hd_nav_access2_grid_width', [
                            'label' => esc_html__( 'Width', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareGridMenu a' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control('hd_nav_access2_grid_height', [
                            'label' => esc_html__( 'Height', 'themewar' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [],
                            'selectors' => [
                                '{{WRAPPER}} .logisfareGridMenu a' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access2_grid_mr',[
                            'label' => esc_html__( 'Item Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareGridMenu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_access2_grid_pd',[
                            'label' => esc_html__( 'Item Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', ],
                            'selectors'  => [
                                '{{WRAPPER}} .logisfareGridMenu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                
        
        $this->end_controls_section();
        $this->start_controls_section('hd_nav_access_contact', [
                'label'         => esc_html__('Nav Button', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
        ]);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_nav_contact_btn_type',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .accessNav .logicBtn, {{WRAPPER}} .logicBtn',
                    ]
                );
                $this->start_controls_tabs( 'style_tabs');
                    $this->start_controls_tab( 'nav_btn_normal_tab', [
                            'label' => esc_html__( 'Normal', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'hd_nav_contact_btn_color', [
                                        'label' => esc_html__( 'Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .accessNav .logicBtn'   => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .logicBtn'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
                                        'name' => 'nav_btn_background',
                                        'types' => [ 'classic', 'gradient',],
                                        'selector' => '{{WRAPPER}} .accessNav .logicBtn, {{WRAPPER}} .logicBtn',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'nav_btn_hover_tab', [
                            'label' => esc_html__( 'Hover', 'themewar' ),
                    ]);
                            $this->add_responsive_control( 'hd_nav_contact_btn_color_hr', [
                                        'label' => esc_html__( 'Hover Color', 'themewar' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} .accessNav .logicBtn:hover'   => 'color: {{VALUE}}',
                                            '{{WRAPPER}} .logicBtn:hover'   => 'color: {{VALUE}}',
                                        ],
                                ]
                            );
                            $this->add_group_control(\Elementor\Group_Control_Background::get_type(), [
                                        'name' => 'nav_btn_background_hr',
                                        'types' => [ 'classic', 'gradient',],
                                        'selector' => '{{WRAPPER}} .accessNav .logicBtn:hover, {{WRAPPER}} .logicBtn:hover',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                
                $this->add_responsive_control( 'dp_menu_contact_ar_mr',[
                            'label' => esc_html__( 'Margin', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'separator' => 'before',
                            'selectors'  => [
                                '{{WRAPPER}} .accessNav .logicBtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicBtn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'dp_menu_contact_ar_pd',[
                            'label' => esc_html__( 'Padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%'],
                            'selectors'  => [
                                '{{WRAPPER}} .accessNav .logicBtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .logicBtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('hd_nav_ac_dts', [
                'label'         => esc_html__('Search Popup', 'themewar'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms'  => [
                        [
                            'name'      => 'is_search_btn',
                            'operator'  => '==',
                            'value'     => 'yes',
                        ],
                        [
                            'name'      => 'header_style',
                            'operator'  => '!=',
                            'value'     => '3',
                        ],
                    ],
                ],
        ]); 
                $this->add_control( 'hd_nav_ac_s_dts', [
                            'label' => esc_html__( 'Search Popup', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name' => 'hd_nav_ac_s_typo',
                            'label' => esc_html__( 'Typography', 'themewar' ),
                            'selector' => '{{WRAPPER}} .popup_search_form input[type="search"]',
                    ]
                );
                $this->add_responsive_control( 'hd_nav_ac_s_color_plc', [
                            'label' => esc_html__( 'Placeholder Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popup_search_form input[type="search"]::placeholder'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_ac_s_color', [
                            'label' => esc_html__( 'Input Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popup_search_form input[type="search"]'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_ac_s_icon_cl', [
                            'label' => esc_html__( 'Icon Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popup_search_form button[type="submit"] i'   => 'color: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_ac_s_bd_color', [
                            'label' => esc_html__( 'Border Color', 'themewar' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popup_search_form::after'   => 'background: {{VALUE}}',
                            ],
                    ]
                );
                $this->add_responsive_control( 'hd_nav_ac_s_padding',[
                            'label' => esc_html__( 'padding', 'themewar' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', ],
                            'selectors'  => [
                                '{{WRAPPER}} .popup_search_form input[type="search"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'hd_nav_ac_s_pup_background', [
                            'label' => esc_html__( 'Search Popup Background', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                    'name' => 'hd_nav_ac_s_pup_bg',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .pop_search_background',
                            ]
                        );
                $this->add_control( 'hd_nav_ac_s_pup_overlay', [
                            'label' => esc_html__( 'Search Popup Overlay Bg', 'themewar' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                    ]
                );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                    'name' => 'hd_nav_ac_s_pup_ov',
                                    'label' => esc_html__( 'Background', 'themewar' ),
                                    'types' => [ 'classic', 'gradient'],
                                    'selector' => '{{WRAPPER}} .popup_search_overlay',
                            ]
                        );
        $this->end_controls_section(); 
        
    }

    protected function render(){
        $settings               = $this->get_settings_for_display();
        
        
        $header_style           = (isset($settings['header_style']) && $settings['header_style'] > 0) ? $settings['header_style'] : 1;
        $is_topbar              = (isset($settings['is_topbar']) && $settings['is_topbar'] != '') ? $settings['is_topbar'] : 'no';
        $header_position        = (isset($settings['header_position']) && $settings['header_position'] > 0) ? $settings['header_position'] : 1;
        $is_tbr_social          = (isset($settings['is_tbr_social']) && $settings['is_tbr_social'] != '') ? $settings['is_tbr_social'] : 'no';

        $tpbr_info_list         = (isset($settings['tpbr_info_list']) && $settings['tpbr_info_list'] != '') ? $settings['tpbr_info_list'] : array();
        $tpbr_s_list            = (isset($settings['tpbr_s_list']) && $settings['tpbr_s_list'] != '') ? $settings['tpbr_s_list'] : array();
        $tpbr_right_info_list   = (isset($settings['tpbr_right_info_list']) && $settings['tpbr_right_info_list'] != '') ? $settings['tpbr_right_info_list'] : array();
        $hd_contact_list        = (isset($settings['hd_contact_list']) && $settings['hd_contact_list'] != '') ? $settings['hd_contact_list'] : array();

        $logo                   = (isset($settings['logo']['url']) && $settings['logo']['url'] != '') ? $settings['logo']['url'] : '';


        $is_search_btn          = (isset($settings['is_search_btn']) && $settings['is_search_btn'] != '' ? $settings['is_search_btn'] : 'no');
        $search_popup_logo      = (isset($settings['search_popup_logo']['url']) && $settings['search_popup_logo']['url'] != '') ? $settings['search_popup_logo']['url'] : '';
        $input_placeholder      = (isset($settings['input_placeholder']) && $settings['input_placeholder'] != '') ? $settings['input_placeholder'] : '';

        $is_cart            = (isset($settings['is_cart']) && $settings['is_cart'] != '' ? $settings['is_cart'] : 'no');
        $is_mini_cart       = (isset($settings['is_mini_cart']) && $settings['is_mini_cart'] != '' ? $settings['is_mini_cart'] : 'no');
        $is_user            = (isset($settings['is_user']) && $settings['is_user'] != '' ? $settings['is_user'] : 'no');

        $is_btn             = (isset($settings['is_btn']) && $settings['is_btn'] != '' ? $settings['is_btn'] : 'no');
        $is_sticky          = (isset($settings['is_sticky']) && $settings['is_sticky'] != '' ? $settings['is_sticky'] : 'no');


        $btn_lable          = (isset($settings['btn_lable']) && $settings['btn_lable'] != '') ? $settings['btn_lable'] : '';
        $btn_url            = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : 'javascript:void(0);';
        $target             = (isset($settings['btn_url']['is_external']) && $settings['btn_url']['is_external']) ? ' target=_blank' : '';
        $nofollow           = (isset($settings['btn_url']['nofollow']) && $settings['btn_url']['nofollow']) ? ' rel=nofollow' : '';

        
        

        include dirname(__FILE__) . '/style/header/style' . $header_style . '.php';
    }
}