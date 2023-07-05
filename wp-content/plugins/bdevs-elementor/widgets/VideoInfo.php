<?php
namespace Bdevs\Elementor;

defined( 'ABSPATH' ) || die();

class VideoInfo extends \Generic\Elements\GenericWidget {

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
    public function get_name() {
        return 'video-info';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Video Info', 'bdevs-elementor' );
    }
    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net//widgets/video-info/';
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
    public function get_icon() {
        return 'eicon-video-camera';
    }

    public function get_keywords() {
        return [ 'info', 'video', 'box', 'text', 'content' ];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls() {
        $this->design_style();
        $this->title_and_desc();
        $this->video_image();
        $this->button();
        $this->button2();
    }    


    // design_style
    public function design_style() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Presets', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'designs',
            [
                'label' => __('Designs', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'design_1' => __('Design 1', 'bdevs-elementor'),
                    'design_2' => __('Design 2', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

    }

    // video_image
    public function video_image() {
        // img
        $this->start_controls_section(
            '_section_bg_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Bg Image', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'bdevs video url goes here', 'bdevs-elementor' ),
                'placeholder' => __( 'Set Video URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
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

    // title_and_desc
    public function title_and_desc() {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs Info Box Title', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box description goes here', 'bdevs-elementor' ),
                'placeholder' => __( 'Type info box description', 'bdevs-elementor' ),
                'condition' => [
                    'designs' => ['design_2'],
                ],
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    // Button Content Control
    public function button()
    {
        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
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
                'condition' => [
                    'designs' => ['design_10'],
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
                 'condition' => [
                    'designs' => ['design_10'],
               ],
            ]

        );

        $this->end_controls_section();
    }

    // Button2 Content Control
    public function button2()
    {
        // Button
        $this->start_controls_section(
            '_section_button2',
            [
                'label' => __('Button 2', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'button_text2',
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
            'button_link2',
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
            'button_icon2',
            [
                'label' => __('Icon', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
            ]
        );

        $this->add_control(
            'button_selected_icon2',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'button_icon',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_icon_position2',
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
                'condition' => [
                    'designs' => ['design_10'],
                ],
                'default' => 'after',
                'toggle' => false,
                'style_transfer' => true,
            ]


        );

        $this->add_control(
            'button_icon_spacing2',
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
                 'condition' => [
                    'designs' => ['design_10'],
               ],
            ]

        );

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls() {
        $this->title_description_style_controls();
        $this->video_button_style_controls();
        $this->button_style_controls();
        $this->button_style_controls2();
    }

    // Title and Descriptions content controls
    protected function title_description_style_controls() {

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
                'separator' => 'before'
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
    protected function video_button_style_controls()
    {
        $this->start_controls_section(
            '_section_video_button_style',
            [
                'label' => esc_html__('Video Button', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_video_button');

        $this->start_controls_tab(
            '_tab_video_button_normal',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'video_icon_color',
            [
                'label' => esc_html__('Play Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'video_icon_bg_color',
            [
                'label' => esc_html__('Play Icon BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'play_icon_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn',
            ]
        );

        $this->add_responsive_control(
            'button_size',
            [
                'label' => esc_html__('Button Size', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-popup-video',
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_video_button_hover',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'video_icon_hover_color',
            [
                'label' => esc_html__('Play Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'video_icon_hover_bg_color',
            [
                'label' => esc_html__('Play Icon BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'play_icon_hover_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn:hover',
            ]
        );

        $this->add_responsive_control(
            'button__hover_size',
            [
                'label' => esc_html__('Button Size', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'hover-border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-popup-video:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        // video text
        $this->add_control(
            '_video_button_text',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Video Button Text', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->add_control(
            'video_button_text_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video-button-text',
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn span',
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->end_controls_section();
    }

    // button_style_controls
    protected function button_style_controls() {

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
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
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
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

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
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
                'label' => __( 'Background Color', 'bdevs-elementor' ),
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
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
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
    
    // button_style_controls2
    protected function button_style_controls2() {

        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __( 'Button 2', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding2',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography2',
                'selector' => '{{WRAPPER}} .bdevs-el-btn2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border2',
                'selector' => '{{WRAPPER}} .bdevs-el-btn2',
            ]
        );

        $this->add_control(
            'button_border_radius2',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow2',
                'selector' => '{{WRAPPER}} .bdevs-el-btn2',
            ]
        );

        $this->start_controls_tabs( '_tabs_button2' );

        $this->start_controls_tab(
            '_tab_button_normal2',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_color2',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color2',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover2',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_hover_color2',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2:hover, {{WRAPPER}} .bdevs-el-btn2:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color2',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2:hover, {{WRAPPER}} .bdevs-el-btn2:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color2',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn2:hover, {{WRAPPER}} .bdevs-el-btn2:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    // Render Function 
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'services__cta-3-title bd-video-title bdevs-el-title' );

        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }

    ?>

        <?php if ($settings['designs'] === 'design_2') :

            if (!empty($settings['bg_image']['url'])) {
                $bg_image = !empty($settings['bg_image']['id']) ? wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']) : $settings['bg_image']['url'];
                $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>

        <!-- video-area-start -->
        <div class="video-area">
            <div class="container">
                <div class="video-bg bdevs-el-content" data-background="<?php print esc_url($bg_image) ?>">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="video-icon text-center bdevs-el-video-btn">
                                <a class="popup-video play-btn-style bdevs-el-video-btn bdevs-el-popup-video" href="https://www.youtube.com/watch?v=LTXD6XZXc3U"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- video-area-end -->


        <?php else :
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'services__cta-3-title bdevs-el-title');

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'fill-btn grading-two-style mr-30 bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            if ( !empty($settings['button_link2']) ) {
                $this->add_render_attribute('button2', 'class', 'skew-btn white-two-style bdevs-el-btn2');
                $this->add_link_attributes( 'button2', $settings['button_link2'] );
            }
        ?>

        <!-- Services CTA Area Start Here  -->
        <section class="services__cta bg-css overlay pt-125 pb-120 wow fadeInUp" data-wow-duration="1.5s"
         data-wow-delay=".3s" data-background="<?php print esc_url($image); ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="services__cta-3-content text-center bdevs-el-content">
                            <div class="services__cta-3-play bdevs-el-video-btn">
                                <a href="<?php echo esc_url($settings['video_url']); ?>"
                                    class="popup-video dp-play-btn play-btn-white bdevs-el-video-btn bdevs-el-popup-video"><i class="fas fa-play"></i></a>
                            </div>
                            <?php
                                if ($settings['title']) :
                                    printf(
                                        '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        wp_kses_post($settings['title'])
                                    );
                                endif;
                            ?>
                            
                            <div class="services__cta-3-btn">
                                <?php if ( !empty($settings['button_text']) ) : ?> 
                                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                    printf('<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string('button'),
                                        esc_html($settings['button_text'])
                                    );
                                    elseif (empty($settings['button_text']) && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) : ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                        <?php elseif ($settings['button_text'] && ((!empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || !empty($settings['button_icon']))) :
                                        if ($settings['button_icon_position'] === 'before'): ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                        <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                                <span><?php echo esc_html($settings['button_text']); ?></span>
                                                <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                <?php endif; ?>  

                                <?php if ( !empty($settings['button_text2']) ) : ?> 
                                    <?php if ($settings['button_text2'] && ((empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) && empty($settings['button_icon2']))) :
                                        printf('<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string('button2'),
                                            esc_html($settings['button_text2'])
                                        );
                                        elseif (empty($settings['button_text2']) && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon2', 'button_selected_icon2'); ?></a>
                                        <?php elseif ($settings['button_text2'] && ((!empty($settings['button_selected_icon2']) || empty($settings['button_selected_icon2']['value'])) || !empty($settings['button_icon2']))) :
                                            if ($settings['button_icon_position2'] === 'before'): ?>
                                                <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_elementor_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?>
                                                    <span><?php echo esc_html($settings['button_text2']); ?></span></a>
                                            <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string('button2'); ?>>
                                                <span><?php echo esc_html($settings['button_text2']); ?></span>

                                                <?php bdevs_elementor_render_icon($settings, 'button_icon2', 'button_selected_icon2', ['class' => 'bdevs-btn-icon2']); ?>
                                            </a>
                                        <?php
                                        endif;
                                    endif; ?>
                                <?php endif; ?>  
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
        </section>
        <!-- Services CTA Area End Here  -->

        <?php endif; ?>
    <?php  
    }
}