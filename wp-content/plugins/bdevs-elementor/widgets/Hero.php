<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class Hero extends \Generic\Elements\GenericWidget
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
        return 'cust-hero';
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
        return __('Hero', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/hero/';
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
        return 'eicon-header gen-icon';
    }

    public function get_keywords()
    {
        return ['hero', 'blurb', 'infobox', 'content', 'block', 'box'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    protected function register_content_controls()
    {

        $this->design_style();
        $this->title_and_desc();
        $this->background_overlay_content_controls();
        $this->hero_images();
        $this->button();
        $this->button2();
    }

    // Design Style Control
    public function design_style(){
        $this->start_controls_section(
            '_section_design',
            [
                'label' => __( 'Presets', 'bdevs-elementor' ),
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

        $this->add_control(
         'scrolldown_switch',
         [
           'label'        => esc_html__( 'ScrollDown Switch', 'bdevs-elementor' ),
           'type'         => \Elementor\Controls_Manager::SWITCHER,
           'label_on'     => esc_html__( 'Show', 'bdevs-elementor' ),
           'label_off'    => esc_html__( 'Hide', 'bdevs-elementor' ),
           'return_value' => 'yes',
           'default'      => 'yes',
           'condition' => [
                'designs' => ['design_1'],
            ],
         ]
        );

        $this->end_controls_section();
    }


    // Title_and_desc
    public function title_and_desc()
    {
        // Title & Description
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => __('Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Enter Sub Title', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Hero Title', 'bdevs-elementor'),
                'placeholder' => __('Enter Hero Title', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __('Description', 'bdevs-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Hero description goes here', 'bdevs-elementor'),
                'placeholder' => __('Enter Hero description', 'bdevs-elementor'),
                'rows'        => 5,
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __('H1', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __('H2', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __('H3', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __('H4', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __('H5', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __('H6', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'align',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    // background_overlay_content_controls
    public function background_overlay_content_controls()
    {
        // Background Overlay
        $this->start_controls_section(
            '_section_background_overlay',
            [
                'label' => __('Background Overlay', 'elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .slider-six::before',
            ]
        );

        $this->add_control(
            'background_overlay_opacity',
            [
                'label' => __('Opacity', 'elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => .85,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-six::before' => 'opacity: {{SIZE}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    // hero_images_Content_Control
    public function hero_images(){
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'bdevselementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'hero_bg',
            [
                'label' => __( 'Hero BG', 'bdevselementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],

            ]
        );

        $this->add_control(
            'hero_shape_image',
            [
                'label' => __( 'Hero Shape Image', 'bdevselementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Set Video URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_thumbnail',
                'default' => 'large',
                'separator' => 'none',
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
                    'designs' => ['design_4'],
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


    // register_style_controls
    protected function register_style_controls(){

        $this->title_style_controls();
        $this->video_button_style_controls();
        $this->button_style_controls();
        $this->button_style_controls2();

    }

    // title_style_controls
    protected function title_style_controls() {

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
                    'designs' => ['design_2'],
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
    protected function button_style_controls()
    {
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_2'],
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

        $this->add_control(
            'button_before_bg_color',
            [
                'label' => __('Hover Before BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.s-btn.bdevs-el-btn:before,
                    {{WRAPPER}}  .dp-up-btn::before,
                    {{WRAPPER}} .btn.s-btn.bdevs-el-btn:focus:before' => 'background: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .bdevs-el-sec-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_before_bg_color',
            [
                'label' => __('Hover Before BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.s-btn.bdevs-el-btn:hover:before,
                    {{WRAPPER}}  .dp-up-btn:hover::before,
                    {{WRAPPER}} .btn.s-btn.bdevs-el-btn:focus:before' => 'background: {{VALUE}} !important;',
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

    // button_style_controls2
    protected function button_style_controls2() {

        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __( 'Button 2', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_4'],
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
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);

    ?>

        <?php if ( $settings['designs'] === 'design_3' ):

        $this->add_inline_editing_attributes('title', 'basic');

        $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        $this->add_render_attribute('title', 'data-wow-delay', '.3s');

        if ( !empty($settings['hero_bg']['id']) ) {
            $hero_bg = wp_get_attachment_image_url( $settings['hero_bg']['id'], $settings['bg_thumbnail_size'] );
        }

        if ( !empty($settings['hero_image']['id']) ) {
            $hero_image = wp_get_attachment_image_url( $settings['hero_image']['id'], $settings['bg_thumbnail_size'] );
        }

        if ( !empty($settings['hero_image2']['id']) ) {
            $hero_image2 = wp_get_attachment_image_url( $settings['hero_image2']['id'], $settings['bg_thumbnail_size'] );
        }


        ?>

        <!-- hero-area start-->
        <div class="hero-area hero-height d-flex align-items-center position-relative">
            <?php if ( !empty($settings['shape_switch']) ): ?>
            <img class="hero-shape-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-02.png" alt="shape">
            <img class="hero-shape-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-03.png" alt="shape">
            <img class="hero-shape-6" src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-01.png" alt="shape">
            <img class="hero-shape-7" src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-10.png" alt="shape">
            <?php endif; ?>

            <div class="hero-shap-5 d-none d-xxl-block">
                <?php if ( !empty($settings['shape_switch']) ): ?>
                <div class="hero-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/slider-card-1.png" alt="image not found">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/slider-card-2.png" alt="image not found">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/slider-card-3.png" alt="image not found">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/slider-card-4.png" alt="image not found">
                    <span><i class="far fa-plus"></i></span>
                </div>
                <?php endif; ?>

                <?php if ($settings['img_text']) : ?>
                <h5 class="bdevs-el-icontext"><?php echo wp_kses_post($settings['img_text']); ?></h5>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="hero-2-content-wrpapper position-relative">
                    <?php if ($settings['icons_text']) : ?>
                    <div class="hero-shape-3 d-none d-xl-block">
                        <?php if ( !empty($hero_image) ) : ?>
                            <img src="<?php print esc_url($hero_image); ?>" alt="shape">
                        <?php endif; ?>

                        <h5 class="slider-shap-text bdevs-el-imgtext"><?php echo wp_kses_post($settings['icons_text']); ?></h5>
                    </div>
                    <?php endif; ?>

                    <?php if ( !empty($settings['shape_switch']) ): ?>
                    <div class="hero-shape-2 d-none d-xl-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-09.png" alt="shape">
                    </div>
                    <div class="hero-shape-4 d-none d-lg-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-8.png" alt="shape">
                    </div>
                    <?php endif; ?>

                    <?php if ( !empty($hero_image2) ) : ?>
                    <div class="hero-thumb-01 d-none d-xl-block">
                        <img src="<?php print esc_url($hero_image2); ?>" alt="shape">
                    </div>
                    <?php endif; ?>

                    <?php if ( !empty($hero_bg) ) : ?>
                    <div class="hero-thumb-02 d-none d-lg-block">
                        <img src="<?php print esc_url($hero_bg); ?>" alt="shape">
                    </div>
                    <?php endif; ?>

                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-10">
                            <div class="slider-content-wrapper">
                                <div class="hero-tittle-info text-center mb-45">
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
                                </div>
                                <?php if ( !empty($settings['search_switch']) ): ?>
                                <div class="slider-search ">
                                    <form action="<?php print esc_url(home_url('/')); ?>" method="get">
                                        <div class="slider-search-icon position-relative">
                                            <input type="text" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php echo wp_kses_post($settings['form_placehorder']); ?>">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <?php endif; ?>

                                <div class="slider-course-content text-center">
                                    <ul>
                                        <?php foreach ($settings['slides'] as $slide): ?>
                                        <li><i class="fas fa-check-circle"></i><span><?php echo wp_kses_post($slide['title']); ?></span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero-area end-->

        <?php elseif ($settings['designs'] === 'design_2'):

            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'dp-up-btn white-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

            $hero_bg = wp_get_attachment_image_url($settings['hero_bg']['id'], $settings['bg_thumbnail_size']);
            if (!$hero_bg) {
                $hero_bg = $settings['hero_bg']['url'];
            }
        ?>

        <!-- slider-start -->
        <div class="slider-area slider-six slider-height bdevs-el-content" data-background="<?php print esc_url($hero_bg); ?>">
            <div class="et-tsparticles dp-particles-background">
                <div id="particles-js"></div>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="slider-text">
                            <?php if($settings['sub_title']): ?>
                                <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                            <?php endif; ?>

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

                            <?php if (!empty($settings['button_text'])) : ?>
                                <div class="slider-button">
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
                    <div class="col-xl-4 col-lg-3">
                        <div class="slider-video-icon bdevs-el-video-btn">
                            <a class="bdevs-el-video-btn bdevs-el-popup-video popup-video play-btn-style" href="<?php echo esc_url($settings['video_url']); ?>"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-start -->

        <?php else:

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'wow fadeInUp banner-title dp-banner1-title bdevs-el-title' );
        $this->add_render_attribute('title', 'data-delay', '.5s');

        if ( !empty($settings['hero_bg']['id']) ) {
            $hero_bg = wp_get_attachment_image_url( $settings['hero_bg']['id'], $settings['bg_thumbnail_size'] );
        }

        ?>

        <!-- banner area start  -->
        <section class="banner-area banner-area2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-banner single-banner-2 dp-banner-01 dp-banner-970">
                            <div class="banner-bg banner-bg2" data-background="<?php print esc_url($hero_bg); ?>">
                            </div>
                            <div class="container pos-rel">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-9">
                                        <div class="banner-content banner-content2 mx-auto text-center banner-content2-1 pt-155 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
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
                                            <?php if(!empty($settings['scrolldown_switch'])) : ?>
                                            <div class="m-auto bounce">
                                                <a class="btn-round pulse-btn" href="#services__area-2"><i class="fal fa-long-arrow-down"></i></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end  -->

        <?php endif; ?>
    <?php
    }
}
