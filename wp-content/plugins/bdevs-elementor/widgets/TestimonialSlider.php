<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class TestimonialSlider extends \Generic\Elements\GenericWidget
{

    /**
     * Get widget name.
     *
     * Retrieve Bdevs Element widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'cust-testimonial-slider';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Testimonial Slider', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/testimonial-slider/';
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
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-slider-full-screen gen-icon';
    }

    public function get_keywords()
    {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // register_content_controls
    protected function register_content_controls()
    {
        $this->design_style_content_controls();
        $this->title_and_desc_content_controls();
        $this->image_content_controls();
        $this->slide_content_controls();
        $this->settings_content_controls();
    }

    // design_style_content_controls
    public function design_style_content_controls()
    {
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
                    'design_3' => __('Design 3', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'rating_icon_switch',
            [
                'label' => esc_html__('Rating Switch', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'bdevs-elementor'),
                'label_off' => esc_html__('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ],
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'quote_switch',
            [
                'label' => esc_html__('Quote Switch', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'bdevs-elementor'),
                'label_off' => esc_html__('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'condition' => [
                    'designs' => ['design_2'],
                ],
                'default' => 'yes',
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
                'condition' => [
                    'designs' => ['design_2'],
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
                'condition' => [
                    'designs' => ['design_10'],
                ],
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

    // image_content_controls
    public function image_content_controls()
    {
        // Images
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Bg Image', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );


        $this->end_controls_section();
    }

    // slide_content_controls
    public function slide_content_controls()
    {

        // Slides
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
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('profile Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'signature_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Signature Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Slide Title', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'course_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Course Title', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Slider URL', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'course_subtitle',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Course Sub Title', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_20'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Message', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Client Name', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Designation Name', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'date',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type Date Here', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'day',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type Day Here', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_30'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'nav_bg_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Nav BG Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_4'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __('Links', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __('Show Options?', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementor'),
                'label_off' => __('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'social_title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Social Title', 'bdevs-elementor'),
                'default' => __('Follow', 'bdevs-elementor'),
                'placeholder' => __('Type Social title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Website Address', 'bdevs-elementor'),
                'placeholder' => __('Add your profile link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Email', 'bdevs-elementor'),
                'placeholder' => __('Add your email link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Phone', 'bdevs-elementor'),
                'placeholder' => __('Add your phone link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Facebook', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Add your facebook link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Twitter', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Add your twitter link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Instagram', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Add your instagram link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('LinkedIn', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Add your linkedin link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Youtube', 'bdevs-elementor'),
                'placeholder' => __('Add your youtube link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Google Plus', 'bdevs-elementor'),
                'placeholder' => __('Add your Google Plus link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'flickr_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Flickr', 'bdevs-elementor'),
                'placeholder' => __('Add your flickr link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Vimeo', 'bdevs-elementor'),
                'placeholder' => __('Add your vimeo link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Behance', 'bdevs-elementor'),
                'placeholder' => __('Add your hehance link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Dribbble', 'bdevs-elementor'),
                'placeholder' => __('Add your dribbble link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Pinterest', 'bdevs-elementor'),
                'placeholder' => __('Add your pinterest link', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Github', 'bdevs-elementor'),
                'placeholder' => __('Add your github link', 'bdevs-elementor'),
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
                'title_field' => '<# print(client_name || "Carousel Item"); #>',
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

    // settings_content_controls
    public function settings_content_controls()
    {
        // Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_20'],
                ],
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
        $this->description_style_controls();
    }

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
                    '{{WRAPPER}} .bdevs-el-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-title',
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
    }

    // Description Control
    protected function description_style_controls()
    {
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
                    '{{WRAPPER}} .bdevs-el-content p, .bdevs-el-content' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content p, .bdevs-el-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p, .bdevs-el-content',
            ]
        );
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['slides'])) {
            return;
        }

        ?>
        <?php if ($settings['designs'] == 'design_4') :
        ?>
            <!-- testimonial area start -->
            <div class="testimonial-area testimonial-bg-settings p-rel testimonial-area-spacing">
                <div class="container p-rel">
                    <div class="row justify-content-center">
                        <div class="col-xxl-8">
                            <div class="lv-testimonial-slide-box-wrap p-rel">
                                <div class="testimonial-active swiper-container mb-30 mb-md-0" id="active-testimonial-grub">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['slides'] as $slide) :
                                            if (!empty($slide['image']['id'])) {
                                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                            }
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="lv-testimonial-box">
                                                    <?php if (!empty($image)) : ?>
                                                        <div class="lv-testimonial-img text-center">
                                                            <img src="<?php print esc_url($slide['image']['url']); ?>" alt="img">
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($slide['message']) : ?>
                                                        <div class="lv-testimonial-content bdevs-el-content mb-25">
                                                            <p><?php echo wp_kses_post($slide['message']); ?></p>

                                                            <?php if ($settings['shape_switch']) : ?>
                                                                <div class="lv-testimonial-bg-img-pos">
                                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/path/testimonial-path-1.png" alt="img">
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="lv-testimonial-author-box text-center">
                                                        <?php if ($slide['client_name']) : ?>
                                                            <h5 class="lv-testimonial-author-name bdevs-el-title">
                                                                <?php echo wp_kses_post($slide['client_name']); ?>
                                                            </h5>
                                                        <?php endif; ?>
                                                        <?php if ($slide['date']) : ?>
                                                            <span class="lv-testimonial-author-date bdevs-el-subtitle">
                                                                <?php echo wp_kses_post($slide['date']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="lv-testimonial-pagination-nav-wrap lv-common-pagination text-center">
                                    <div class="swiper-button-prev-2 lv-common-pagination-prev-nav"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/path/testimonial-arrow-prev.png" alt="img"></div>
                                    <div class="testimonial-paginations-2 lv-common-pagination-dots"></div>
                                    <div class="swiper-button-next-2 lv-common-pagination-next-nav"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/path/testimonial-arrow-next.png" alt="img"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- testimonial area end -->

        <?php elseif ($settings['designs'] == 'design_3') : ?>
        <!-- testimonial-area-start -->
        <div class="testimonial-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="swiper-container testimonial-active-4">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['slides'] as $slide) :
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            }
                            ?>
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper mt-30">
                                    <div class="testimonial-inner">
                                        <div class="testi-info-area mb-30">
                                            <?php if ($slide['image']) : ?>
                                                <img class="testimonial-info-img" src="<?php print esc_url($slide['image']['url']); ?>" alt="">
                                            <?php endif ?>
                                            <div class="testi-author-text">
                                                <?php if ($slide['client_name']) : ?>
                                                    <h3 class="bdevs-el-title"><?php echo wp_kses_post($slide['client_name']); ?></h3>
                                                <?php endif; ?>
                                                <?php if ($slide['designation_name']) : ?>
                                                    <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['designation_name']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="testimonial-text">
                                            <?php if ($slide['message']) : ?>
                                                <p><?php echo wp_kses_post($slide['message']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div> 
                </div>
            </div>
        </div>
        <!-- testimonial-area-end -->   


        <?php elseif ($settings['designs'] == 'design_2') :
            $settings = $this->get_settings_for_display();
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'testimonial__title bdevs-el-title');

        ?>
            <!-- testimonial 2 -area-start -->
            <section class="testimonial-area testimonial-space pb-100 pt-120 bg-css">
                <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="section__title text-center mb-35">
                                <span class="sub-title">
                                    <?php if(!empty($settings['sub_title'])) : ?>
                                        <div class="test-gradint-subtitle-two mb-15">
                                            <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </span>
                                <h2 class="title">
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
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- Slider main container -->
                    <div class="testimonial-box">
                        <div class="swiper-container testimonial-active testimonial-one">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php foreach ($settings['slides'] as $slide) :
                                    if (!empty($slide['image']['id'])) {
                                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="testimonial-shadow">
                                            <div class="testimonial-items">
                                                <?php if (!empty($settings['rating_icon_switch'])) : ?>
                                                    <div class="testimonial__icon rate">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['message'])) : ?>
                                                    <div class="testimonial__text">
                                                        <p><?php echo wp_kses_post($slide['message']); ?></p>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="testimonial__auth">
                                                    <div class="testimonial__auth-img f-left mr-20">
                                                    <?php if ($slide['image']) : ?>
                                                        <img src="<?php print esc_url($slide['image']['url']); ?>" alt="Testimonial">
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="testimonial__auth-text fix">
                                                        <?php if ($slide['client_name']) : ?>
                                                            <h4><?php echo wp_kses_post($slide['client_name']); ?></h4>
                                                        <?php endif; ?>
                                                        <?php if ($slide['designation_name']) : ?>
                                                            <span><?php echo wp_kses_post($slide['designation_name']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="testimonial__quote-icon quote">
                                                <?php if (!empty($settings['quote_switch'])) : ?>
                                                    <i class="fas fa-quote-left"></i>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial 2 Area End Here -->

        <?php else :
            $this->add_render_attribute('title', 'class', 'lv-section-title bdevs-el-title');

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            }
        ?>
            <div class="testimonial-two">
                <?php foreach ($settings['slides'] as $slide) :
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                    }
                ?>
                    <div class="swiper-wrapper">
                        <div class="testimonial__item p-relative mb-60">
                            <div class="testimonial__item-img f-left">
                                <?php if ($slide['image']) : ?>
                                    <img src="<?php print esc_url($slide['image']['url']); ?>" alt="Testimonial">
                                <?php endif; ?>
                            </div>
                            <div class="testimonial__item-content white-bg fix">
                                <?php if ($slide['message']) : ?>
                                    <p class="bdevs-el-content"><?php echo wp_kses_post($slide['message']); ?></p>
                                <?php endif; ?>
                                <div class="testimonial__item-bottom">
                                    <div class="testimonial__item-auth">
                                        <?php if ($slide['client_name']) : ?>
                                            <h4 class="dp-testimonial-client-name bdevs-el-title"><?php echo wp_kses_post($slide['client_name']); ?></h4>
                                        <?php endif; ?>
                                        <?php if ($slide['designation_name']) : ?>
                                            <h6 class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['designation_name']); ?></h6>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($settings['rating_icon_switch'])) : ?>
                                        <div class="testimonial__item-rate">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
<?php
    }
}
