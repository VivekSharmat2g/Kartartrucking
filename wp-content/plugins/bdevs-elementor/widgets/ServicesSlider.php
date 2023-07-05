<?php

namespace Bdevs\Elementor;


defined('ABSPATH') || die();

class ServicesSlider extends \Generic\Elements\GenericWidget
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
        return 'cust-services-slider';
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
        return __('Services Slider', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/cust-services-slider/';
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
        return 'eicon-slider-3d gen-icon';
    }

    public function get_keywords()
    {
        return ['services', 'slider', 'image', 'gallery', 'carousel'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // register_content_controls
    protected function register_content_controls()
    {
        $this->design_style_content_controls();
        $this->title_and_desc();
        $this->images();
        $this->services_slide_content_controls();
    }

    // Design Style Content Controls
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
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // tite and description Content Controls
    public function title_and_desc()
    {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
                ],
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

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    // image
    public function images()
    {

        $this->start_controls_section(
            '_section_service_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Bg Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();
    }

    // services_slide_content_controls
    public function services_slide_content_controls()
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
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
                'default' => 'yes',
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => esc_html__('Media Type', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => esc_html__('Icon', 'bdevs-elementor'),
                        'icon' => 'eicon-nerd-wink',
                    ],
                    'image' => [
                        'title' => esc_html__('Image', 'bdevs-elementor'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail3',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ]
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
                    'type' => 'icon'
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
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
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
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'title_url',
            [
                'label' => __('Title URL', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Set Title URL', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'service_slider_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Slider Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ],
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevs-elementor' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
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

    // register_style_controls
    protected function register_style_controls()
    {
        $this->title_style_controls();
        $this->service_slider_list_style_control();
        $this->repeater_button_style_controls();
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
                    'designs!' => ['design_2'],
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
                    'designs!' => ['design_2'],
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
                    'designs!' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'condition' => [
                    'designs!' => ['design_2'],
                ],
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

    // service_slider_list_style_control
    protected function service_slider_list_style_control(){
        $this->start_controls_section(
            '_section_service_list_style_content',
            [
                'label' => __('Service Slider List', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_responsive_control(
            'slider_list_content_padding',
            [
                'label' => __('Content Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .services__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Tab Start
        $this->start_controls_tabs('_tabs_service_slider_list_content');

		$this->start_controls_tab(
			'_tab_service_slider_list_normal',
			[
				'label' => esc_html__('Normal', 'bdevs-elementor'),
			]
		);

        // Content Background
        $this->add_control(
            '_service_slide_content_box_background',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Content Background', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'service_list_content_background',
                'selector' => '{{WRAPPER}} .services__item',
                'exclude' => [
                    'image'
                ]
            ]
        );


        // service box icon
        $this->add_control(
            '_service_slide_box_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Service Icon', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'service_slide_icon_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'service_slide_icon_color',
            [
                'label' => esc_html__('Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_slide_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-slide-icon',
            ]
        );


        // Title
        $this->add_control(
            '_service_slide_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Title', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'service_slide_title_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'service_slide_title_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_slide_title',
                'selector' => '{{WRAPPER}} .bdevs-el-slide-title',
            ]
        );

        // description
        $this->add_control(
            '_service_slide_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Description', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'service_slide_description_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'service_slide_description_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_slide_description',
                'selector' => '{{WRAPPER}} .bdevs-el-slide-desc',
            ]
        );



		$this->end_controls_tab();

		// Hover
		$this->start_controls_tab(
			'_tab_service_slider_content_hover',
			[
				'label' => esc_html__('Hover', 'bdevs-elementor'),
			]
		);


        // Content Background
        $this->add_control(
            '_service_slide_content_box_background_hover',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Content Background', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'service_list_content_hover_background',
                'selector' => '{{WRAPPER}} .services-two .services__item:hover',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // shape Background
        $this->add_control(
            '_service_slide_content_shape_background_hover',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Shape Background', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'service_list_content_hover_shape_background',
                'selector' => '{{WRAPPER}} .services-two .services__item:hover .services__item-shape',
                'exclude' => [
                    'image'
                ]
            ]
        );

		// service box icon
        $this->add_control(
            '_service_slide_box_icon_hover',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Service Icon', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'service_slide_icon_hover_color',
            [
                'label' => esc_html__('Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title
        $this->add_control(
            '_service_slide_heading_title_hover',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Title', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'service_slide_title_hover_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slide-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


		$this->end_controls_tab();
		$this->end_controls_tabs();


        $this->end_controls_section();
    }

    // repeater_button_style_controls
    protected function repeater_button_style_controls() {

        $this->start_controls_section(
            '_section_repeater_style_button',
            [
                'label' => __( 'Repeater Button', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'repeater_button_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'repeater_button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'repeater_button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_control(
            'repeater_button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'repeater_button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_control(
            'hr_repet',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_repeater_button' );

        $this->start_controls_tab(
            '_tab_repeater_button_normal',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'repeater_button_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_repeater_button_hover',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'repeater_button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
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

        if (empty($settings['slides'])) {
            return;
        }

        $this->add_render_attribute('button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp222');

        ?>

        <?php if ($settings['designs'] === 'design_3') :

            $this->add_render_attribute('button', 'class', 'z-btn z-btn-border  bdevs-el-btn');
        ?>
        <section class="bd-slider-area">
            <div class="bd-slider-actives">
                <div class="swiper-wrappers">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                        $this->add_render_attribute('button_' . $key, 'class', 'theme-btn-black bdevs-el-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                    ?>
                        <div class="bd-single-slider bd-slider-height bd-single-slider-overlay-invisible d-flex align-items-center">
                            <div class="bd-slide-bg" data-background="<?php print esc_url($image); ?>"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="bd-slider z-index pt-125">
                                            <?php if (!empty($slide['title'])) : ?>
                                                <h1 class="bd-slider-title bdevs-el-title bd-slider-title-three mb-30 wow fadeInUp" data-wow-delay=".3s"><?php echo wp_kses_post($slide['title']); ?></h1>
                                            <?php endif; ?>

                                            <div class="bd-slider-btn mb-95 wow fadeInUp" data-wow-delay=".6s">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf(
                                                        '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                    <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before') : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                    else : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                    endif;
                                                endif; ?>
                                            </div>

                                            <?php if (!empty($slide['show_social'])) : ?>
                                                <div class="bd-slider-social-three wow fadeInUp" data-wow-delay=".9s">
                                                    <?php if (!empty($slide['social_title'])) : ?>
                                                        <h6><?php echo wp_kses_post($slide['social_title']); ?></h6>
                                                    <?php endif; ?>

                                                    <ul>
                                                        <?php if (!empty($slide['web_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['web_title']); ?>">
                                                                    <i class="far fa-globe"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['email_title'])) : ?>
                                                            <li>
                                                                <a href="mailto:<?php echo esc_url($slide['email_title']); ?>">
                                                                    <i class="fal fa-envelope"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['phone_title'])) : ?>
                                                            <li>
                                                                <a href="tell:<?php echo esc_url($slide['phone_title']); ?>">
                                                                    <i class="fas fa-phone"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['facebook_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['facebook_title']); ?>">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['twitter_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['twitter_title']); ?>">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['instagram_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['instagram_title']); ?>">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['linkedin_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['linkedin_title']); ?>">
                                                                    <i class="fab fa-linkedin-in"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['youtube_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['youtube_title']); ?>">
                                                                    <i class="fab fa-youtube"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['googleplus_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['googleplus_title']); ?>">
                                                                    <i class="fab fa-google-plus-g"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['flickr_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['flickr_title']); ?>">
                                                                    <i class="fab fa-flickr"></i>
                                                                </a>
                                                            <?php endif; ?>

                                                            <?php if (!empty($slide['vimeo_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['vimeo_title']); ?>">
                                                                    <i class="fab fa-vimeo-v"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['behance_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['behance_title']); ?>">
                                                                    <i class="fab fa-behance"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['dribble_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['dribble_title']); ?>">
                                                                    <i class="fab fa-dribbble"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['pinterest_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['pinterest_title']); ?>">
                                                                    <i class="fab fa-pinterest-p"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($slide['gitub_title'])) : ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($slide['gitub_title']); ?>">
                                                                    <i class="fab fa-github"></i>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php elseif ($settings['designs'] === 'design_2') :  ?>

        <!-- services-area-start -->
        <div class="services-area services-area-five bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row"> 
                    <div class="swiper-container service-active-five wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['slides'] as $key => $slide) :
                                if (!empty($slide['image']['id'])) {
                                    $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                                }

                                $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-reptr-btn');
                                $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                                ?>
                                <div class="swiper-slide">
                                    <div class="services-02-wrapper">
                                        <div class="services-02-icon">
                                            <?php if (!empty($slide['selected_icon'])) : ?>
                                                <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url($image); ?>" alt="img" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="services-02-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                                <a class="bdevs-el-title" href="<?php echo esc_url($slide['title_url']); ?>">
                                                    <h3 class="bdevs-el-title">
                                                        <?php echo wp_kses_post($slide['title']); ?>
                                                    </h3>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['desc'])) : ?>
                                                <p>
                                                    <?php echo wp_kses_post($slide['desc']); ?>
                                                </p>
                                            <?php endif; ?>

                                            <div class="b-button black-b-button bdevs-el-reptr-btn">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf(
                                                        '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                    <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before') : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                    else : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="services-two-nav text-sm-center d-none d-xl-block">
                        <div class="services-button-prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="services-button-next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services-area-end -->



    <!-- portfolio slider 2 start-->
    <div class="portfolio-slider mb-45 d-none">
        <div class="portfolio-box">
            <div class="swiper-container portfolio-slider-active mb-20">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides Start -->
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['service_slider_image']['id'])) {
                            $service_slider_image = wp_get_attachment_image_url($slide['service_slider_image']['id'], 'full');
                        }
                    ?>
                        <div class="swiper-slide">
                            <div class="portfolio-slider-item dp-portfolio-slider-item">
                                <img src="<?php echo esc_url($service_slider_image); ?>" alt="portfolio">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Slides End-->
                </div>
            </div>
            <div class="portfolio-slider-pagination"></div>
        </div>
    </div>
    <!-- portfolio slider 2 end-->




        <?php else :

            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            }
        ?>

            <!-- Services Area Start Here  -->
            <section id="services__area-2" class="services__area-2 fix grey-bg-2 pt-120 pb-120" data-background="<?php echo esc_url($bg_image); ?>">
                <div class="services__section-area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="services__section">
                                    <div class="section__title mb-95">
                                        <?php if ($settings['sub_title']) : ?>
                                            <span class="sub-title bdevs-el-subtitle">
                                                <?php echo wp_kses_post($settings['sub_title']); ?>
                                            </span>
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
                                    <div class="services-two-nav">
                                        <div class="services-button-prev"><i class="fas fa-long-arrow-left"></i></div>
                                        <div class="services-button-next"><i class="fas fa-long-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="services-two">
                                    <div class="swiper-container services-two-active">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides start -->
                                            <?php foreach ($settings['slides'] as $key => $slide) :
                                                if (!empty($slide['image']['id'])) {
                                                    $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                                                }
                                            ?>
                                                <div class="swiper-slide">
                                                    <div class="services__item text-center">
                                                        <div class="services__item-icon bdevs-el-slide-icon mb-35">
                                                            <?php if (!empty($slide['selected_icon'])) : ?>
                                                                <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                            <?php else : ?>
                                                                <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="services__item-content">
                                                            <?php if (!empty($slide['title'])) : ?>
                                                                <a href="<?php echo esc_url($slide['title_url']); ?>">
                                                                    <h3 class="services-slider-title bdevs-el-slide-title">
                                                                        <?php echo wp_kses_post($slide['title']); ?>
                                                                    </h3>
                                                                </a>
                                                            <?php endif; ?>
                                                            <?php if (!empty($slide['desc'])) : ?>
                                                                <p class="bdevs-el-slide-desc">
                                                                    <?php echo wp_kses_post($slide['desc']); ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="services__item-shape">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <!-- Slides end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Services Area End Here  -->
        <?php endif; ?>
    <?php
    }
}
