<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class AboutTab extends \Generic\Elements\GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'about-tab';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('About TAB', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/about-tab/';
    }

    public function get_script_depends()
    {
        return ['bootstrap', 'genwow', 'swiper', 'bdevs-elementor-js'];
    }
    public function get_style_depends()
    {
        return ['bootstrap', 'fontawesome', 'swiper', 'bdevs-elementor-flaticon', 'bdevs-elementor-css'];
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-favorite';
    }

    public function get_keywords()
    {
        return ['about', 'tab'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    public function get_tp_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $tp_cfa         = array();
        $tp_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $tp_forms       = get_posts( $tp_cf_args );
        $tp_cfa         = ['0' => esc_html__( 'Select Form', 'tpcore' ) ];
        if( $tp_forms ){
            foreach ( $tp_forms as $tp_form ){
                $tp_cfa[$tp_form->ID] = $tp_form->post_title;
            }
        }else{
            $tp_cfa[ esc_html__( 'No contact form found', 'tpcore' ) ] = 0;
        }
        return $tp_cfa;
    }


    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {
        $this->design_style_content_controls();
        $this->title_and_desc_content_controls();
        $this->images_content_controls();
        $this->about_tab_list_content_controls();
        $this->contact_form07();
        $this->button_content_controls();
    }

    // design_style_content_controls
    public function design_style_content_controls()
    {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'designs',
            [
                'label' => __('Design Style', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'design_1' => __('Style 1', 'bdevs-elementor'),
                    'design_2' => __('Style 2', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // title_and_desc_content_controls
    public function title_and_desc_content_controls()
    {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Title', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevs-elementor'),
                'placeholder' => __('Type info box description', 'bdevs-elementor'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );
        $this->add_control(
            'align',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'bdevs-elementor'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // images_content_controls
    public function images_content_controls()
    {
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('BG Image', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1']
                ],

            ]
        );

        $this->add_control(
            'bg_shape_image',
            [
                'label' => __('Bg Shape Image', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10']
                ],
            ]

        );
        $this->add_control(
            'video_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Video URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1']
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->end_controls_section();
    }

    // about_tab_list_content_controls
    public function about_tab_list_content_controls()
    {
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'design_1' => __('Style 1', 'bdevs-elementor'),
                    'design_2' => __('Style 2', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-smile-o',
                'condition' => [
                    'field_condition' => ['design_10']
                ],
            ]
        );


        $repeater->add_control(
            'selected_icon',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-smile-wink',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'field_condition' => ['design_10']
                ],
            ]
        );

        $repeater->add_control(
            'tab_sub_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Sub Title', 'bdevs-elementor'),
                'default' => __('Tab Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Type sub title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_10']
                ],
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Tab Title', 'bdevs-elementor'),
                'default' => __('Tab Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['design_1', 'design_2']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['design_10']
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_video_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Video URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_10']
                ],
            ]
        );

        $repeater->add_control(
            'tab_content_title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Tab Content Title', 'bdevs-elementor'),
                'default' => __('Content Here', 'bdevs-elementor'),
                'placeholder' => __('Type Content here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_10']
                ],
            ]
        );


        $repeater->add_control(
            'tab_content_des',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Tab Content Description', 'bdevs-elementor'),
                'default' => __('Content designation Here', 'bdevs-elementor'),
                'placeholder' => __('Type Content designation here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_1']
                ],
            ]
        );

        $repeater->add_control(
            'tab_content_btn_text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Button Text', 'bdevs-elementor'),
                'default' => __('Tab Button Text', 'bdevs-elementor'),
                'placeholder' => __('Type content text here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_1']
                ],
            ]
        );

        $repeater->add_control(
            'tab_content_btn_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Button URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['design_1']
                ],
            ]
        );

        // REPEATER
        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function contact_form07() {
        $this->start_controls_section(
            'tpcore_contact',
            [
                'label' => esc_html__('Contact Form', 'tpcore'),
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'tpcore_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'tpcore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_tp_contact_form(),
            ]
        );

        $this->end_controls_section();
    }

    // button_content_controls
    public function button_content_controls()
    {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevs-elementor'),
                'placeholder' => __('Type button text here', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __('Icon', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
            ]
        );

        $this->add_control(
            'button_selected_icon',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'button_icon',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'after',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {
        $this->title_style_controls();
        $this->description_style_controls();
        $this->video_button_style_controls();
        $this->about_tab_cotent_style_controls();
        $this->button_style_controls();
    }

    // register_style_controls
    protected function title_style_controls()
    {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title / Content', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Title', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

        // Subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Subtitle', 'bdevs-elementor'),
                'separator' => 'before',

            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],


            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
    }

    // description_style_controls
    protected function description_style_controls()
    {

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
            ]
        );


        $this->end_controls_section();
    }

    // video_button_style_controls
    protected function video_button_style_controls(){
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __( 'Video Button Style', 'bdevs-elementor' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Size', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                     'type' => 'icon'
                ]
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __( 'Width', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Height', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'vieeo_button_line_height',
            [
                'label' => __( 'Line Height', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __( 'Offset', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'bdevs-elementor' ),
                'label_on' => __( 'Custom', 'bdevs-elementor' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'media_offset_x',
            [
                'label' => __( 'Offset Left', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui',
            ]
        );

        $this->add_responsive_control(
            'media_offset_y',
            [
                'label' => __( 'Offset Top', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Media translate styles
                    '(desktop){{WRAPPER}} .dp-play-btn' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .dp-play-btn' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .dp-play-btn' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Body text styles
                    '{{WRAPPER}} .dp-play-btn' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'media_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-infobox-figure--image img, {{WRAPPER}} .dp-play-btn' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'media_border',
                'selector' => '{{WRAPPER}} .bdevs-infobox-figure--image img, {{WRAPPER}} .dp-play-btn',
            ]
        );

        $this->add_responsive_control(
            'media_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-infobox-figure--image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .dp-play-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'media_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .bdevs-infobox-figure--image img, {{WRAPPER}} .dp-play-btn'
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Hover Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Hover Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-play-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // about_tab_cotent_style_controls
    protected function about_tab_cotent_style_controls(){
        $this->start_controls_section(
            '_section_about_tab_content_style_controls',
            [
                'label' => __('Tab Content Style', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],
            ]
        );


        // Tab description
        $this->add_control(
            '_content_tab_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'designs!' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'tab_description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs!' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_description',
                'selector' => '{{WRAPPER}} .bdevs-el-tab-desc',
                'condition' => [
                    'designs!' => ['design_2'],
                ],
            ]
        );

        // About Tab BTN
        $this->add_control(
            '_about_tab_button_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Tab Button', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        // About Tab Style
        $this->start_controls_tabs('_about_tabs_button');

        $this->start_controls_tab(
            '_about_tab_button_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'tab_button_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_button_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'about_tab_button_active',
            [
                'label' => __('Active', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'about_tab_button_active_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-btn.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'about_tab_button_active_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-btn.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'about_tab_button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tab-btn.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // button_style_controls
    protected function button_style_controls()
    {
        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    // Render Function
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title', 'class', ' title bdevs-el-title');
        $this->add_render_attribute('subtitle', 'class', 'bdevs-el-subtitle');

        if (empty($settings['slides'])) {
            return;
        }

?>


        <?php if ($settings['designs'] === 'design_1') :
            // bg_image
            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
                if (!$bg_image) {
                    $bg_image = $settings['bg_image']['url'];
                }
            }
        ?>

            <!-- About Us 2 Area Start Here  -->
            <section class="about__area-2 pt-120 pb-60 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-xl-5">
                            <div class="about__content-2 mb-60 wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".5s">
                                <div class="section__title mb-50">
                                    <?php if (!empty($settings['sub_title'])) : ?>
                                        <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                                    <?php endif; ?>
                                    <?php
                                    if (!empty($settings['title'])) :
                                        printf(
                                            '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            wp_kses_post($settings['title'])
                                        );
                                    endif;
                                    ?>
                                </div>
                                <div class="about__content-tab-2 mt-40">
                                    <ul class="nav mb-5" id="myTab" role="tablist">
                                        <?php foreach ($settings['slides'] as $id => $slide) :
                                            // active class
                                            $active_tab_menu = ($id == 0) ? 'active' : '';
                                        ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="bdevs-el-tab-btn nav-link clip-lg-btn <?php echo esc_attr($active_tab_menu); ?>" id="approch-tab<?php echo esc_attr($id); ?>" data-bs-toggle="tab" data-bs-target="#approch<?php echo esc_attr($id); ?>" type="button" role="tab" aria-controls="approch<?php echo esc_attr($id); ?>" aria-selected="true">
                                                    <?php echo wp_kses_post($slide['tab_title']); ?>
                                                </button>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <?php foreach ($settings['slides'] as $id => $slide) :
                                            // active class
                                            $active_tab = ($id == 0) ? 'show active' : '';
                                        ?>
                                            <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="approch<?php echo esc_attr($id); ?>" role="tabpanel" aria-labelledby="approch-tab<?php echo esc_attr($id); ?>">
                                                <?php if (!empty($slide['tab_content_des'])) : ?>
                                                    <p class="bdevs-el-content bdevs-el-tab-desc"><?php echo wp_kses_post($slide['tab_content_des']); ?></p>
                                                <?php endif; ?>
                                                <div class="about__content-tab-btn mt-35">
                                                    <?php if (!empty($slide['tab_content_btn_text'])) : ?>
                                                        <a class="fill-btn clip-md-btn bdevs-el-btn" href="<?php echo esc_url($slide['tab_content_btn_url']); ?>">
                                                            <?php echo wp_kses_post($slide['tab_content_btn_text']); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <?php if (!empty($bg_image)) : ?>
                                <div class="about__img-2 mb-60 ml-60 w-img p-relative wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s">
                                    <img src="<?php echo esc_url($bg_image); ?>" alt="About">

                                    <?php if (!empty($settings['video_url'])) : ?>
                                    <div class="about__btn-2">
                                        <a href="<?php echo esc_url($settings['video_url']); ?>" class="popup-video dp-play-btn play-btn-white"><i class="fas fa-play"></i></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us 2 Area End Here  -->

        <?php elseif ($settings['designs'] === 'design_2') : 

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'b-button white-b2-button bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }
            ?>
        <!-- appiontment-area-start -->
        <div class="appiontment-02-area appiontment-05-area bdevs-el-content">
            <div class="container">
                <div class="row align-items-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="col-xl-6 col-lg-6 order-lg-1 order-xl-1 order-xxl-1 order-2">
                        <div class="appiontment-02-wrapper">
                            <div class="appiontment-tab mb-35">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <?php foreach ($settings['slides'] as $id => $slide) :
                                            // active class
                                            $active_tab_menu = ($id == 0) ? 'active' : '';
                                            ?>
                                            <button class="nav-link bdevs-el-tab-btn <?php echo esc_attr($active_tab_menu); ?>" 
                                                id="nav-home-tab<?php echo esc_attr($id); ?>" 
                                                data-bs-toggle="tab" 
                                                data-bs-target="#nav-home<?php echo esc_attr($id); ?>" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="nav-home<?php echo esc_attr($id); ?>" 
                                                aria-selected="true">
                                                <?php echo wp_kses_post($slide['tab_title']); ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>
                                </nav>
                            </div>

                            <div class="appiontment-tab-content">
                                <div class="tab-content" id="nav-tabContent">
                                    <?php foreach ($settings['slides'] as $id => $slide) :
                                        $active_tab = ($id == 0) ? 'show active' : '';
                                        ?>
                                        <div class="tab-pane fade show <?php echo esc_attr($active_tab); ?>" 
                                        id="nav-home<?php echo esc_attr($id); ?>" 
                                        role="tabpanel" 
                                        aria-labelledby="nav-home-tab<?php echo esc_attr($id); ?>" 
                                        tabindex="0">
                                            <div class="inner-appiontment">
                                                <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                                                    <div class="appiontment-form">
                                                        <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                                                    </div>
                                                <?php else : ?>
                                                    <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-2 order-xxl-2 order-1">
                        <div class="single-appiontment mb-30">
                            <div class="section-title white-title pos-rel mb-30">
                                <?php if($settings['sub_title']): ?>
                                    <span class="line line-white bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                                <?php endif; ?>

                                <?php
                                    if (!empty($settings['title'])) :
                                        printf(
                                            '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            wp_kses_post($settings['title'])
                                        );
                                    endif;
                                ?>

                            </div>
                            <div class="appiontment-text">
                                <?php if($settings['description']): ?>
                                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($settings['button_text'])) : ?>
                                    <div class="b-button white-b2-button bdevs-el-btn">
                                        <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                            printf(
                                                '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string('button'),
                                                esc_html($settings['button_text'])
                                            );
                                        elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                            <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                            if ($settings['button_icon_position'] === 'before') : ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <?php echo esc_html($settings['button_text']); ?></a>
                                            <?php
                                            else : ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                                    <?php echo esc_html($settings['button_text']); ?>
                                                    <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                </a>
                                        <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- appiontment-area-end -->



    <?php endif; ?>
        <?php
    }
}
