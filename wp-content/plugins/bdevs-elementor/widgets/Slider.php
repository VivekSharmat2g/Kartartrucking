<?php

namespace Bdevs\Elementor;


defined('ABSPATH') || die();

class Slider extends \Generic\Elements\GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @since 1.0.1
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cust-slider';
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
        return __('Slider', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/slider/';
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
        return ['slider', 'image', 'gallery', 'carousel'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // register_content_controls
    protected function register_content_controls()
    {
        $this->design_style_content_controls();
        $this->background_overlay_content_controls();
        $this->Slider_content_controls();
        $this->slider_settings_controls();
    }

    // design_style_content_controls
    public function design_style_content_controls()
    {
        $this->start_controls_section(
            '_section_design',
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
                    'design_3' => __('Design 3', 'bdevs-elementor'),
                    'design_4' => __('Design 4', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
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
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .banner-overlay-3::before,
                {{WRAPPER}} .slider-height .banner-bg::before,
                {{WRAPPER}} .banner-overlay::before',
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
                    '{{WRAPPER}} .banner-overlay-3::before,
                    {{WRAPPER}} .slider-height .banner-bg::before,
                    {{WRAPPER}} .banner-overlay::before' => 'opacity: {{SIZE}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    // Slider_content_controls
    public function Slider_content_controls()
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
                    'style_1' => __('Style 1', 'bdevs-elementor'),
                    'style_2' => __('Style 2', 'bdevs-elementor'),
                    'style_3' => __('Style 3', 'bdevs-elementor'),
                    'style_4' => __('Style 4', 'bdevs-elementor'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __('Information', 'bdevs-elementor'),
            ]
        );

        $repeater->add_control(
            'shape_switch',
            [
                'label' => __('Shape SWITCHER', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'sub_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Sub Title', 'bdevs-elementor'),
                'default' => __('Subtitle', 'bdevs-elementor'),
                'placeholder' => __('Type subtitle here', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Title Here', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'desc',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevs-elementor'),
                'default' => __('Hero Description', 'bdevs-elementor'),
                'placeholder' => __('Type Hero Description Here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
            ]
        );

        //button one
        $repeater->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevs-elementor'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        // Buton one link
        $repeater->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button two
        $repeater->add_control(
            'button_text2',
            [
                'label' => __('Button Text2', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text2',
                'placeholder' => __('Type button text here', 'bdevs-elementor'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        // Buton two link
        $repeater->add_control(
            'button_link2',
            [
                'label' => __('Button Link2', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3', 'style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_icon',
            [
                'label' => __('Icon', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICON,
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'default' => 'fa fa-angle-right',
            ]
        );

        $repeater->add_control(
            'button_selected_icon',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'button_icon',
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'label_block' => true,
            ]
        );


        $repeater->add_control(
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
                'default' => 'before',
                'toggle' => false,
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn--icon-before .bdevs-el-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-el-btn--icon-after .bdevs-el-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'video_url',
            [
                'label' => __('Video URL', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs video url goes here', 'bdevs-elementor'),
                'placeholder' => __('Set Video URL', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_5', 'style_6'],
                ],
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
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
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();
    }

    // slider_settings_controls
    public function slider_settings_controls()
    {
        // Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'ts_slider_autoplay',
            [
                'label' => esc_html__('Autoplay', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bdevs-elementor'),
                'label_off' => esc_html__('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'no'
            ]
        );

        $this->add_control(
            'ts_slider_speed',
            [
                'label' => esc_html__('Slider Speed', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Slider Speed', 'bdevs-elementor'),
                'default' => '5000',
                // 'default' => 5000,
                'condition' => ["ts_slider_autoplay" => ['yes']],
            ]
        );

        $this->add_control(
            'ts_slider_nav_show',
            [
                'label' => esc_html__('Nav show', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bdevs-elementor'),
                'label_off' => esc_html__('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'ts_slider_dot_nav_show',
            [
                'label' => esc_html__('Dot nav', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'bdevs-elementor'),
                'label_off' => esc_html__('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls()
    {
        $this->title_style_controls();
        $this->button_style_controls_one();
        $this->button_style_controls_two();
        $this->navigation_arrow_style_controls();
        $this->navigation_dots_style_controls();
    }

    // title_style_controls
    public function title_style_controls()
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
                'condition' => [
                    'designs!' => ['design_3'],
                ],
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
                'condition' => [
                    'designs!' => ['design_3'],
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
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_3'],
                ],
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
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_3'],
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
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_3'],
                ],
            ]
        );

        $this->end_controls_section();
    }

    // button_style_controls_01
    protected function button_style_controls_one()
    {
        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
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

    // button_style_controls_02
    protected function button_style_controls_two()
    {
        // Button 2 style
        $this->start_controls_section(
            '_section_style_button2',
            [
                'label' => __('Button2', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button2_padding',
            [
                'label' => __('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button2_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-sec-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button2_border',
                'selector' => '{{WRAPPER}} .bdevs-el-sec-btn',
            ]
        );

        $this->add_control(
            'button2_border_radius',
            [
                'label' => __('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button2_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-sec-btn',
            ]
        );

        $this->add_control(
            'hr2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button2');

        $this->start_controls_tab(
            '_tab_button2_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button2_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'button2_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_before_bg_color',
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
            '_tab_button2_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button2_hover_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn:hover, {{WRAPPER}} .bdevs-el-sec-btn:focus' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_before_bg_color',
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
            'button2_hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sec-btn:hover, {{WRAPPER}} .bdevs-el-sec-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // navigation_arrow_style_controls
    protected function navigation_arrow_style_controls()
    {
        // Navigation - Arrow
        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __('Navigation - Arrow', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __('Position', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'bdevs-elementor'),
                'label_on' => __('Custom', 'bdevs-elementor'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __('Vertical', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __('Horizontal', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'slider_arrow_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev, {{WRAPPER}} .slider-button-next' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-button-prev:hover, {{WRAPPER}} .slider-button-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // navigation_dots_style_controls
    protected function navigation_dots_style_controls()
    {
        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __('Navigation - Dots', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __('Vertical Position', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __('Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __('Alignment', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs('_tabs_dots');
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __('Active', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
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

        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"] == "yes" ? true : false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $slide_controls    = [
            'show_nav' => $show_navigation,
            'dot_nav_show' => $dot_nav_show,
            'auto_nav_slide' => $auto_nav_slide,
            'ts_slider_speed' => $ts_slider_speed,
        ];

        $slide_controls = \json_encode($slide_controls);
        // ================

        if (empty($settings['slides'])) {
            return;
        }

        $this->add_render_attribute('button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp222');

        ?>

        <?php if ($settings['designs'] === 'design_4') :  ?>

        <!-- slider-start -->
        <div class="slider-area-five">
            <div class="swiper-container slider-active-5" data-swipper_autoplay_stop="<?php echo $auto_nav_slide; ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                        <div class="swiper-slide" data-swiper-autoplay="<?php $ts_slider_speed; ?>">
                            <div class="single-banner bdevs-el-content slider-height d-flex align-items-center">
                                <div class="banner-bg banner-bg1 banner-bg1-1" data-background="<?php print esc_url($image); ?>">
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="slider-content slider-02-content pos-rel text-center">
                                                <?php if($slide['sub_title']): ?>
                                                    <span class="subtitle bdevs-el-subtitle" data-animation="fadeInUp" data-delay=".5s">
                                                        <?php echo wp_kses_post($slide['sub_title']); ?>
                                                    </span>
                                                <?php endif; ?>

                                                <?php if($slide['title']): ?>
                                                    <h2 class="bdevs-el-title" data-animation="fadeInUp" data-delay=".5s">
                                                        <?php echo wp_kses_post($slide['title']); ?>
                                                    </h2>
                                                <?php endif; ?>
                                                
                                                <?php if($slide['desc']): ?>
                                                    <p data-animation="fadeInUp" data-delay=".7s">
                                                        <?php echo wp_kses_post($slide['desc']); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <div class="slider-button">

                                                    <a class="dp-up-btn white-btn bdevs-el-sec-btn" href="<?php echo esc_url($slide['button_link2']['url']); ?>" data-animation="fadeInUp" data-delay=".9s">
                                                        <?php echo esc_html($slide['button_text2']); ?>
                                                    </a>

                                                    <a class="dp-up-btn slider-btn bdevs-el-btn" href="<?php echo esc_url($slide['button_link']['url']); ?>" data-animation="fadeInUp" data-delay="1.1s">
                                                        <?php echo esc_html($slide['button_text']); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need navigation buttons -->

                <?php if(!empty($show_navigation)) : ?>
                    <div class="slider-nav d-none d-lg-block">
                        <div class="slider-button-prev dp-nav-btn"><i class="fal fa-long-arrow-left"></i></div>
                        <div class="slider-button-next dp-nav-btn"><i class="fal fa-long-arrow-right"></i></div>
                    </div>
                <?php endif; ?>

                <!-- If we need pagination -->
                <?php if(!empty($dot_nav_show)) : ?>
                    <div class="t-swiper-pagination s"></div>
                <?php endif; ?>
            </div>
        </div>
        <!-- slider-start -->   


        <?php elseif ($settings['designs'] === 'design_3') :  ?>
        <!-- slider-start -->
        <section class="slider-area slider-area-4">
            <div class="swiper-container slider__active-4" data-swipper_autoplay_stop="<?php echo $auto_nav_slide; ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                    ?>
                        <div class="swiper-slide" data-swiper-autoplay="<?php $ts_slider_speed; ?>">
                            <div class="single-banner  bdevs-el-content  slider-height d-flex align-items-center" >
                                <div class="banner-bg banner-bg1 banner-bg1-1" data-background="<?php print esc_url($image); ?>">
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 col-sm-12">
                                            <div class="slider-content pos-rel">
                                                <h2 class="bdevs-el-title" data-animation="fadeInLeft" data-delay=".3s">
                                                    <?php echo wp_kses_post($slide['title']); ?>
                                                </h2>
                                                <div class="slider-button">
                                                    <a class="dp-up-btn slider-btn bdevs-el-btn" href="<?php echo esc_url($slide['button_link']['url']); ?>" data-animation="fadeInUp" data-delay=".4s">
                                                        <?php echo esc_html($slide['button_text']); ?>
                                                    </a>
                                                    <a class="dp-up-btn bdevs-el-sec-btn white-btn" href="<?php echo esc_url($slide['button_link2']['url']); ?>" data-animation="fadeInUp" data-delay=".6s">
                                                        <?php echo esc_html($slide['button_text2']); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need navigation buttons -->
                <?php if(!empty($show_navigation)) : ?>
                    <div class="slider-nav d-none d-md-block">
                        <div class="slider-button-prev dp-nav-btn"><i class="far fa-angle-left"></i></div>
                        <div class="slider-button-next dp-nav-btn"><i class="far fa-angle-right"></i></div>
                    </div>
                <?php endif; ?>

                <!-- If we need pagination -->
                <?php if(!empty($dot_nav_show)) : ?>
                    <div class="t-swiper-pagination s"></div>
                <?php endif; ?>
            </div>
        </section>
        <!-- slider-start -->

        <?php elseif ($settings['designs'] === 'design_2') :  ?>
            <!-- banner area start  -->
            <section class="banner-area banner-area1 pos-rel">
                <div class="swiper-container slider__active" data-swipper_autoplay_stop="<?php echo $auto_nav_slide; ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['slides'] as $key => $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-btn');
                            $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                            <div class="swiper-slide" data-swiper-autoplay="<?php $ts_slider_speed; ?>">
                                <div class="single-banner banner-overlay single-banner-1 dp-slider-02">
                                    <div class="banner-bg banner-bg1 banner-bg1-1" data-background="<?php print esc_url($image); ?>">
                                    </div>
                                    <div class="container pos-rel">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8">
                                                <div class="banner-content banner-content1-1 dp-banner-content-02">
                                                    <?php if (!empty($slide['sub_title'])) : ?>
                                                        <div class="banner-meta-text" data-animation="fadeInUp" data-delay=".3s">
                                                            <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['sub_title']); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($slide['title'])) : ?>
                                                        <h1 class="banner-title bdevs-el-title" data-animation="fadeInUp" data-delay=".5s">
                                                            <?php echo wp_kses_post($slide['title']); ?>
                                                        </h1>
                                                    <?php endif; ?>
                                                    <div class="banner-btn" data-animation="fadeInUp" data-delay=".7s">
                                                        <a href="<?php echo esc_url($slide['button_link']['url']); ?>" class="fill-btn clip-btn  bdevs-el-btn"><?php echo esc_html($slide['button_text']); ?></a>
                                                        <a class="skew-btn bdevs-el-sec-btn" href="<?php echo esc_url($slide['button_link2']['url']); ?>"><?php echo esc_html($slide['button_text2']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <?php if(!empty($show_navigation)) : ?>
                    <div class="slider-nav d-none d-md-block">
                        <div class="dp-nav-btn slider-button-prev"><i class="far fa-angle-left"></i></div>
                        <div class="dp-nav-btn slider-button-next"><i class="far fa-angle-right"></i></div>
                    </div>
                <?php endif; ?>

                <!-- If we need pagination -->
                <?php if(!empty($dot_nav_show)) : ?>
                    <div class="t-swiper-pagination s"></div>
                <?php endif; ?>

            </section>
            <!-- banner area end  -->

        <?php else : ?>

            <!-- banner area start  -->
            <section class="banner-area banner-area3 pos-rel">
                <div class="swiper-container slider__active-3" data-swipper_autoplay_stop="<?php echo $auto_nav_slide; ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['slides'] as $key => $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-btn');
                            $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                            <div class="swiper-slide" data-swiper-autoplay="<?php $ts_slider_speed; ?>">
                                <div class="single-banner banner-overlay-3 single-banner-3 d-flex align-items-center banner-840">
                                    <div class="banner-bg banner-bg3" data-background="<?php print esc_url($image); ?>">
                                    </div>
                                    <div class="container pos-rel">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-xl-12 col-lg-8 col-md-9">
                                                <div class="banner-content banner-content3 text-center">
                                                    <?php if (!empty($slide['sub_title'])) : ?>
                                                        <div class="banner-meta-text" data-animation="fadeInUp" data-delay=".3s">
                                                            <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['sub_title']); ?></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['title'])) : ?>
                                                        <h1 class="banner-title bdevs-el-title" data-animation="fadeInUp" data-delay=".5s">
                                                            <?php echo wp_kses_post($slide['title']); ?>
                                                        </h1>
                                                    <?php endif; ?>

                                                    <div class="banner-btn justify-content-center" data-animation="fadeInUp" data-delay=".7s">
                                                        <?php if (!empty($slide['button_text'])) : ?>
                                                            <a href="<?php echo esc_url($slide['button_link']['url']); ?>" class="fill-btn clip-btn bdevs-el-btn"><?php echo esc_html($slide['button_text']); ?></a>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['button_text2'])) : ?>
                                                            <a href="<?php echo esc_url($slide['button_link2']['url']); ?>" class="skew-btn bdevs-el-sec-btn"><?php echo esc_html($slide['button_text2']); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (!empty($slide['slide_controls'])) : ?>
                                        <div class="banner-content3-round1 vert-move"></div>
                                        <div class="banner-content3-round2 hori-move"></div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <?php if(!empty($show_navigation)) : ?>
                        <div class="slider-nav">
                            <div class="slider-button-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="slider-button-next"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                    <?php endif; ?>

                    <!-- If we need pagination -->
                    <?php if(!empty($dot_nav_show)) : ?>
                        <div class="t-swiper-pagination s"></div>
                    <?php endif; ?>
                </div>
            </section>
            <!-- banner area end  -->

        <?php endif; ?>
<?php
    }
}
