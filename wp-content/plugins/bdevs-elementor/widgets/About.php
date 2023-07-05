<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class About extends \Generic\Elements\GenericWidget
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
        return 'cust-about';
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
        return __('About', 'bdevs-elementor');
    }
    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/about/';
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
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'testimonial', 'content'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {
        $this->design_style_content_controls();
        $this->title_and_desc_content_controls();
        $this->images_content_controls();
        $this->counter_content();
        $this->about_contact_info();
        $this->about_author_info();
        $this->about_features_list_content_controls();
        $this->contact_icon_list();
        $this->about_experience_content_controls();
        $this->button_content_controls();
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
                    'design_4' => __('Design 4', 'bdevs-elementor'),
                    'design_5' => __('Design 5', 'bdevs-elementor'),
                    'design_6' => __('Design 6', 'bdevs-elementor'),
                    'design_7' => __('Design 7', 'bdevs-elementor'),
                    'design_8' => __('Design 8', 'bdevs-elementor'),
                    'design_9' => __('Design 9', 'bdevs-elementor'),
                    
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
            'shape_switch',
            [
                'label' => __('Shape SWITCHER', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
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
                    'designs' => ['design_1', 'design_2', 'design_3', 'design_4', 'design_6', 'design_7', 'design_8', 'design_9'],
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
                    'designs' => ['design_1', 'design_2', 'design_3', 'design_4', 'design_5', 'design_6', 'design_7'],
                ],
            ]
        );
        $this->add_control(
            'description2',
            [
                'label' => __('Description 2', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevs-elementor'),
                'placeholder' => __('Type info box description', 'bdevs-elementor'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_6'],
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

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevs-elementor'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevs-elementor'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevs-elementor'),
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

    // images_content_controls
    public function images_content_controls()
    {
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs!' => ['design_5'],
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
                'condition' => [
                    'designs' => ['design_1', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_3','design_4', 'design_6', 'design_7', 'design_8'],
                ],
            ]
        );

        $this->add_control(
            'image1',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 1', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1','design_4', 'design_3'],
                ],
            ]
        );

        $this->add_control(
            'image2',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 2', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_6', 'design_7'],
                ],
            ]
        );

        $this->add_control(
            'image3',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 3', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'image4',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 4', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'image5',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 5', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1'],
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

    // Counter Content Controls
    public function counter_content()
    {
        $this->start_controls_section(
            '_section_slide',
            [
                'label' => __('Counter Content', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_8'],
                ],
            ]
        );

        $this->add_control(
            'counter_number',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Counter Number', 'bdevs-elementor'),
                'default' => __('70', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'counter_sub_title',
            [
                'label' => __('Counter Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('about counter Sub Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'counter_title',
            [
                'label' => __('Counter Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('about counter Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'counter_description',
            [
                'label' => __('Counter Description', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevs-elementor'),
                'placeholder' => __('Type info box description', 'bdevs-elementor'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );
        $this->end_controls_section();
    }

    // Contact List Content Controls
    public function contact_icon_list()
    {
        $this->start_controls_section(
            '_section_feature_list',
            [
                'label' => __('Contact List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_4'],
                ],
            ]
        );
        $this->add_control(
            'contact_title',
            [
                'label' => __( 'Contact List Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => ' info@webdow.com',
                'placeholder' => __( 'Heading Text', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'contact_sub_title',
            [
                'label' => __( 'Contact List Lavel', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'send email',
                'placeholder' => __( 'Heading Text', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'f_url',
            [
                'label' => __( 'URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Url here', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
        'dp_envelop_icon',
            [
                'label' => __( 'Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // about_contact_info
    public function about_contact_info()
    {
        
        $this->start_controls_section(
            '_about_info',
            [
                'label' => __('About info', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_7'],
                ],
            ]
        );

        $this->add_control(
            'about_number_title',
            [
                'label' => __('Number Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Number Title', 'bdevs-elementor'),
                'placeholder' => __('Number Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'about_phone_number',
            [
                'label' => __('Phone Number', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('00 211 232 000', 'bdevs-elementor'),
                'placeholder' => __('00 211 232 000', 'bdevs-elementor'),
                'label_block' => true,
                'condition' => [
                    'designs' => ['design_7'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'about_phone_icon',
            [
                'label' => __( 'Phone Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
            ]
        );

        // about_mail_info
        $this->add_control(
            'about_mail_info_title',
            [
                'label' => __('Mail Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Info Mail Title', 'bdevs-elementor'),
                'placeholder' => __('About Info Mail Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_info_mail',
            [
                'label' => __('Email', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('info@webmail.com', 'bdevs-elementor'),
                'placeholder' => __('info@webmail.com', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'about_mail_icon',
            [
                'label' => __( 'Mail Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-envelope-open-text',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // about_author_info
    public function about_author_info()
    {
        
        $this->start_controls_section(
            '_about_author',
            [
                'label' => __('About Author Info', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_7'],
                ],
            ]
        );

        $this->add_control(
            'about_author_title',
            [
                'label' => __('Author Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Author Title', 'bdevs-elementor'),
                'placeholder' => __('Author Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_author_des',
            [
                'label' => __('Author Designation', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Author Designation', 'bdevs-elementor'),
                'placeholder' => __('Author Designation', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'author_info_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Author Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_7'],
                ],
            ]
        );

        $this->add_control(
            'author_info_signature',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Signature Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_30'],
                ],
            ]
        );


        $this->end_controls_section();
    }

    // about_features_list_content_controls
    public function about_features_list_content_controls()
    {
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2', 'design_8', 'design_9'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_2' => __('Style 2', 'bdevs-elementor'),
                    'style_8' => __('Style 8', 'bdevs-elementor'),
                    'style_9' => __('Style 9', 'bdevs-elementor'),
                ],
                'default' => 'style_2',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevs-elementor' ),
                        'icon' => 'eicon-nerd-wink',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevs-elementor' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_8', 'style_9'],
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'type' => ['image'],
                    'field_condition' => ['style_8', 'style_9'],
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
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
                    'type' => 'image',
                    'field_condition' => ['style_8', 'style_9'],
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'type' => ['icon'],
                    'field_condition' => ['style_8', 'style_9'],
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Title One', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'number',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Number', 'bdevs-elementor'),
                'default' => __('20', 'bdevs-elementor'),
                'placeholder' => __('Type Number here', 'bdevs-elementor'),
                'condition' => [
                    'field_condition' => ['style_2'],
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
                'label' => __('URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Type url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_40'],
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevs-elementor'),
                'default' => __(' Description Title', 'bdevs-elementor'),
                'placeholder' => __('Type Description here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_8', 'style_9'],
                ],
            ]
        );

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
                ]
            ]
        );

        $this->end_controls_section();
    }

    // about_experience_content_controls
    public function about_experience_content_controls()
    {
        $this->start_controls_section(
            '_about_experience',
            [
                'label' => __('About Experience', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
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

        $this->add_control(
            'imageicon',
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

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
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

        $this->add_control(
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

        $this->add_control(
            'about_experience_title',
            [
                'label'       => __('About Experience Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('About Experience Title', 'bdevs-elementor'),
                'placeholder' => __('About Experience Title', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_experience_subtitle',
            [
                'label'       => __('About Experience Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('About Experience Sub Title', 'bdevs-elementor'),
                'placeholder' => __('About Experience Sub Title', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_30'],
                ],
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
                    'designs' => ['design_1', 'design_2', 'design_3' , 'design_5', 'design_6', 'design_9'],
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
        $this->about_contact_info_style();
        $this->about_features_list_style_controls();
        $this->button_style_controls();
    }

    // title_style_controls
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
                'condition' => [
                    'designs!' => ['design_5'],
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
                    'designs!' => ['design_5'],
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
                    'designs!' => ['design_5'],
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
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_8', 'design_9'],
                ],
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'designs!' => ['design_8', 'design_9'],
                ],
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
                'condition' => [
                    'designs!' => ['design_8', 'design_9'],
                ],
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
                'condition' => [
                    'designs!' => ['design_8', 'design_9'],
                ],
            ]
        );

        // description2
        $this->add_control(
            '_content_description2',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description 2', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_6'],
                ],
            ]
        );

        $this->add_responsive_control(
            'description_spacing2',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_6'],
                ],
            ]
        );

        $this->add_control(
            'description_color2',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_6'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description2',
                'selector' => '{{WRAPPER}} .bdevs-el-desc',
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_6'],
                ],
            ]
        );


        $this->end_controls_section();
    }

    // about_features_list_style_controls
    public function about_features_list_style_controls()
    {
        $this->start_controls_section(
            '_section_features_style_content',
            [
                'label' => __('About features', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_8', 'design_9'],
                ],
            ]
        );

        // Title
        $this->add_control(
            '_heading_titles',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Title', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'features_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-rpt-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-rpt-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'features_title',
                'selector' => '{{WRAPPER}} .bdevs-el-rpt-title',
            ]
        );

        // description
        $this->add_control(
            '_content_features_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'features_description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-rpt-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_description_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-rpt-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'features_description',
                'selector' => '{{WRAPPER}} .bdevs-el-rpt-content p',
                
            ]
        );

        $this->end_controls_section();

    }

    // about_contact_info_style
    protected function about_contact_info_style()
    {
        $this->start_controls_section(
            '_section_about_style_content',
            [
                'label' => __('About Contact Info', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_7'],
                ],
            ]
        );

        // About Number
        $this->add_control(
            '_about_number',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('About Number Title', 'bdevs-elementor'),
            ]
        );

        $this->add_responsive_control(
            'nubmer_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'number_title_color',
            [
                'label' => __('Number Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typo',
                'selector' => '{{WRAPPER}} .bdevs-el-number-title',
            ]
        );

        $this->add_control(
            '_about_numbers',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Number', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __('Number Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_title',
                'selector' => '{{WRAPPER}} .bdevs-el-number',
            ]
        );

        $this->add_control(
            '_number_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Phone Icon', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'number_icon_color',
            [
                'label' => __('Phone Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Phone_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-number-icon',
            ]
        );

        // mail_title
        $this->add_control(
            '_mail_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Mail Title', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'mail_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'mail_title_color',
            [
                'label' => __('Mail Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_title',
                'selector' => '{{WRAPPER}} .bdevs-el-mail-title',
            ]
        );

        $this->add_control(
            '_about_mails',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Email', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'mail_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_typo',
                'selector' => '{{WRAPPER}} .bdevs-el-mail',
            ]
        );

        $this->add_control(
            '_mail_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Mail Icon', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'mail_icon_color',
            [
                'label' => __('Mail Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-mail-icon',
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
                    'designs' => ['design_1', 'design_2', 'design_3', 'design_5', 'design_6', 'design_9'],
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
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}} !important;',
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


    // Render function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?>

        <?php if ($settings['designs'] === 'design_9') :
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'dp-up-btn white-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

            if (!empty($settings['bg_image']['url'])) {
                $bg_image = !empty($settings['bg_image']['id']) ? wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']) : $settings['bg_image']['url'];
                $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>

        <!-- features-02-area-start -->
        <div class="features-3-area pos-rel bdevs-el-content">
            <div class="features-bg-img" data-background="<?php print esc_url($bg_image); ?>"> </div>
            <div class="container-fluid">
                <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                    <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6">
                        <div class="single-features-03">
                            <div class="about-us-wrapper">
                                <div class="section-title white-title pos-rel mb-40">
                                    <?php if($settings['sub_title']): ?>
                                        <span class="line line-white bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']) ?></span>
                                    <?php endif; ?>

                                    <?php if($settings['title']): ?>
                                        <h2 class="bdevs-el-title"><?php echo wp_kses_post($settings['title']) ?></h2>
                                    <?php endif; ?>

                                </div>
                                <div class="features-02-link">
                                    <ul>
                                        <?php foreach ($settings['slides'] as $key => $slide) :?>
                                            <li>
                                                <div class="features-02-icon f-left">
                                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                        $this->get_render_attribute_string('image');
                                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                                    ?>
                                                    <figure>
                                                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                                    </figure>
                                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                        <figure>
                                                            <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                                        </figure>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="features-02-info bdevs-el-rpt-content">
                                                    <?php if ($slide['title']) : ?>
                                                        <h3 class="bdevs-el-rpt-title"><?php echo wp_kses_post($slide['title']); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if ($slide['description']) : ?>
                                                        <p><?php echo wp_kses_post($slide['description']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="about-button mt-30">
                                    <?php if (!empty($settings['button_text'])) : ?>
                                        <div class="contact__content-btn">
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
        </div>
        <!-- features-02-area-end -->



        <?php elseif ($settings['designs'] === 'design_8') :
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

            if (!empty($settings['image']['url'])) {
                $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
                $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            }
        ?>

        <!-- about-us-area-start -->
        <div class="about-02-area about-padding wow bdevs-el-content fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-2 order-lg-1 order-xl-1 order-xxl-1">
                        <div class="about-02-img pos-rel">
                            <img src="<?php print esc_url($image); ?>" alt="">
                            <div class="about-02-info">
                                <div class="about-info-date">
                                    <?php if($settings['counter_number']): ?>
                                        <h2 class="counter"><?php echo wp_kses_post($settings['counter_number']); ?></h2>
                                    <?php endif; ?>
                                    <span>+</span>
                                </div>
                                <div class="about-info-content">

                                <?php if($settings['counter_title']): ?>
                                    <h3><?php echo wp_kses_post($settings['counter_title']); ?></h3>
                                <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-1 order-lg-2 order-xl-2 order-xxl-2">
                        <div class="about-02-wrapper mb-30">
                            <div class="section-title pos-rel mb-45">
                                <?php if($settings['sub_title']): ?>
                                    <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']) ?></span>
                                <?php endif; ?>

                                <?php if($settings['title']): ?>
                                    <h2 class="bdevs-el-title"><?php echo wp_kses_post($settings['title']) ?></h2>
                                <?php endif; ?>

                            </div>
                            <?php foreach ($settings['slides'] as $key => $slide) :?>
                                <div class="about-info-list">
                                    <div class="about-info-icon f-left">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                        <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <div class="about-info-text bdevs-el-rpt-content">
                                        <?php if ($slide['title']) : ?>
                                            <h4 class="bdevs-el-rpt-title"><?php echo wp_kses_post($slide['title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if ($slide['description']) : ?>
                                            <p><?php echo wp_kses_post($slide['description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- about-us-area-end -->

        <?php elseif ($settings['designs'] === 'design_7') :
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

            if (!empty($settings['image']['url'])) {
                $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
                $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            }

            if (!empty($settings['image2']['url'])) {
                $image2 = !empty($settings['image2']['id']) ? wp_get_attachment_image_url($settings['image2']['id'], $settings['thumbnail_size']) : $settings['image2']['url'];
                $image2_alt = get_post_meta($settings["image2"]["id"], "_wp_attachment_image_alt", true);
            }

            if (!empty($settings['author_info_image']['url'])) {
                $author_info_image = !empty($settings['author_info_image']['id']) ? wp_get_attachment_image_url($settings['author_info_image']['id'], $settings['thumbnail_size']) : $settings['author_info_image']['url'];
                $author_info_image_alt = get_post_meta($settings["author_info_image"]["id"], "_wp_attachment_image_alt", true);
            }
        ?>

        <!-- about-us-area-start -->
        <div class="about-us-area about-us-area-five wow bdevs-el-content fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-wrapper mb-30">
                            <div class="section-title pos-rel mb-40">
                                <?php if($settings['sub_title']): ?>
                                    <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']) ?></span>
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

                            </div>

                            <?php if($settings['description']): ?>
                                <div class="about-us-text pos-rel">
                                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="row mb-15 align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-15">
                                    <div class="about-contact-info d-flex align-items-center">
                                        <div class="about-contact-icon">
                                            <i class="bdevs-el-number-icon <?php echo esc_attr($settings['about_phone_icon']['value']); ?>"></i>
                                        </div>
                                        <div class="about-contact-content">
                                            <?php if($settings ['about_number_title']): ?>
                                                <span class="bdevs-el-number-title d-block"><?php echo wp_kses_post($settings['about_number_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if($settings['about_phone_number']): ?>
                                                <h4 class="bdevs-el-number">
                                                    <a class="bdevs-el-number" href="tel:<?php echo esc_attr($settings['about_phone_number']); ?>"><?php echo wp_kses_post($settings['about_phone_number']); ?></a>
                                                </h4>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 mb-15">
                                    <div class="about-contact-info d-flex align-items-center">
                                        <div class="about-contact-icon">
                                            <i class="bdevs-el-mail-icon <?php echo esc_attr($settings['about_mail_icon']['value']); ?>"></i>
                                        </div>
                                        <div class="about-contact-content">
                                            <?php if($settings['about_mail_info_title']): ?>
                                                <span class="bdevs-el-mail-title d-block"><?php echo wp_kses_post($settings['about_mail_info_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if($settings['about_info_mail']): ?>
                                                <h4 class="bdevs-el-mail">
                                                    <a class="bdevs-el-mail" href="mailto:<?php echo esc_attr($settings['about_info_mail']); ?>"><?php echo wp_kses_post($settings['about_info_mail']); ?></a>
                                                </h4>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-author-info">
                                <div class="about-author-img">
                                    <img src="<?php print esc_url($author_info_image); ?>" alt="">
                                </div>
                                <div class="about-author-content">
                                    <?php if($settings['about_author_title']): ?>
                                        <h4><?php echo wp_kses_post($settings['about_author_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if($settings['about_author_des']): ?>
                                        <span><?php echo wp_kses_post($settings['about_author_des']); ?> </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-img">
                            <img src="<?php print esc_url($image); ?>" alt="">
                            <div class="about-shape d-none d-lg-block">
                                <img src="<?php print esc_url($image2); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-us-area-end -->

        <?php elseif ($settings['designs'] === 'design_6') :
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'dp-up-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

            if (!empty($settings['image']['url'])) {
                $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
                $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            }

            if (!empty($settings['image2']['url'])) {
                $image2 = !empty($settings['image2']['id']) ? wp_get_attachment_image_url($settings['image2']['id'], $settings['thumbnail_size']) : $settings['image2']['url'];
                $image2_alt = get_post_meta($settings["image2"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>

        <!-- about-us-area-start -->
        <div class="about-us-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-us-wrapper mb-30">
                            <div class="section-title pos-rel mb-30">
                                <?php if ($settings['sub_title']) : ?>
                                    <span class="bdevs-el-subtitle line"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                            </div>
                            <div class="about-us-text pos-rel">
                                <?php if ($settings['description']) : ?>
                                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?> 
                                <?php if ($settings['description2']) : ?>
                                    <span class="bdevs-el-desc"><?php echo wp_kses_post($settings['description2']); ?></span>
                                <?php endif; ?> 

                                <div class="about-button">
                                    <?php if (!empty($settings['button_text'])) : ?>
                                        <div class="contact__content-btn">
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
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-us-img">
                            <?php if (!empty($image)) : ?>
                                <img class="about-img-1" src="<?php print esc_url($image); ?>" alt="">
                            <?php endif ;?>

                            <?php if (!empty($image2)) : ?>
                                <img class="about-img-2" src="<?php print esc_url($image2); ?>" alt="">
                            <?php endif ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-us-area-end -->


        <?php elseif ($settings['designs'] === 'design_5') :
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');
            $this->add_render_attribute('button', 'class', 'job-btn lv-theme-btn bdevs-el-btn');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'secondary-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

        ?>

        <!-- career cta area start -->
        <section class="career-cta-area bdevs-el-content">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="career-cta-inner d-flex justify-content-lg-end">
                            <div class="career-cta-wrapper">
                                <div class="career-cta-content">
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
                                    <?php if ($settings['description']) : ?>
                                        <p><?php echo wp_kses_post($settings['description']); ?> </p>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['button_text'])) : ?>
                                        <div class="">
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
        </section>
        <!-- career cta area end -->

        <?php elseif ($settings['designs'] === 'design_4') :
            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
            }

            if (!empty($settings['contact_images']['id'])) {
                $contact_images = wp_get_attachment_image_url($settings['contact_images']['id']);
            }

            if (!empty($settings['image1']['id'])) {
                $image1 = wp_get_attachment_image_url($settings['image1']['id'], 'full');
            }
            $this->add_render_attribute('title', 'class', 'title mb-35 bdevs-el-title');

        ?>

        <!-- mission area start  -->
        <section class="mission__area p-relative fix grey-bg-4">
            <?php if (!empty($image)) : ?>
                <div class="mission__img m-img">
                    <img src="<?php print esc_url($image); ?>" alt="mission">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="mission__content bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="section__title mb-35">
                                <?php if ($settings['sub_title']) : ?>
                                    <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                            </div>
                            <div class="mission__text">
                                <?php if ($settings['description']) : ?>
                                    <p><?php echo wp_kses_post($settings['description']); ?> </p>
                                <?php endif; ?>
                                <div class="mission__text-inner">
                                    <?php if (!empty($image1)) : ?>
                                        <img src="<?php print esc_url($image1); ?>" alt="mission">
                                    <?php endif; ?>
                                    <div class="mission__text-contact">
                                        <div class="single-contact-info d-flex align-items-center">

                                            <div class="contact-info-icon d-none">
                                                <a href="#"><i class="flaticon-envelope"></i></a>
                                            </div>

                                            <div class="contact-info-icon">
                                                <a href="#">
                                                    <?php \Elementor\Icons_Manager::render_icon( $settings['dp_envelop_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                </a>
                                            </div>

                                            <div class="contact-info-text">
                                                <?php if ($settings['contact_sub_title']) : ?>
                                                    <span><?php echo wp_kses_post($settings['contact_sub_title']); ?></span>
                                                <?php endif; ?>
                                                <?php if ($settings['contact_title']) : ?>
                                                    <h5>
                                                        <a href="<?php echo esc_url($settings['f_url']); ?>"><?php echo wp_kses_post($settings['contact_title']); ?></a>
                                                    </h5>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- mission area end -->

        <?php elseif ($settings['designs'] === 'design_3') :
            if (!empty($settings['image']['url'])) {
                $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
                $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            }

            if (!empty($settings['image1']['url'])) {
                $image1 = !empty($settings['image1']['id']) ? wp_get_attachment_image_url($settings['image1']['id'], $settings['thumbnail_size']) : $settings['image1']['url'];
                $image1_alt = get_post_meta($settings["image1"]["id"], "_wp_attachment_image_alt", true);
            }

            $this->add_render_attribute('title', 'class', 'title mb-35 bdevs-el-title');

            $this->add_render_attribute('button', 'class', 'fill-btn clip-btn lv-theme-btn bdevs-el-btn');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'secondary-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }
        ?>

        <!-- About Us Area Start Here  -->
        <section class="about__area about__area-padding wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="about__img mb-60 p-relative wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <?php if (!empty($image)) : ?>
                                <img src="<?php print esc_url($image); ?>" alt="About">
                            <?php endif; ?>
                            <?php if (!empty($image1)) : ?>
                                <div class="about__time-img p-absolute w-img vert-move">
                                    <img src="<?php print esc_url($image1); ?>" alt="contact img">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7">
                        <div class="about__content bdevs-el-content mb-60 wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".5s">
                            <div class="section__title mb-35">
                                <?php if ($settings['sub_title']) : ?>
                                    <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                            </div>
                            <div class="about__content-inner mb-35">
                                <?php if ($settings['description']) : ?>
                                    <p class="mb-15"><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?>

                                <?php if ($settings['description2']) : ?>
                                    <p><?php echo wp_kses_post($settings['description2']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['button_text'])) : ?>
                                <div class="about__btn">
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
        </section>
        <!-- About Us Area End Here  -->

        <?php elseif ($settings['designs'] === 'design_2') :

            if (!empty($settings['image2']['id'])) {
                $image2 = wp_get_attachment_image_url($settings['image2']['id'], 'full');
            }

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
            }

            if (!empty($settings['imageicon']['id'])) {
                $imageicon = wp_get_attachment_image_url($settings['imageicon']['id'], 'full');
            }
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

            $this->add_render_attribute('button', 'class', 'skew-btn bdevs-el-btn');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'skew-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

        ?>

        <!-- About Us 3 Area Start Here -->
        <section class="about__3 about__gray-bg pt-120 pb-60 p-relative ">
            <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__3-img-wrapper p-relative mb-60">
                            <?php if (!empty($image)) : ?>
                                <div class="about__3-top w-img">
                                    <img src="<?php echo esc_url($image); ?>" alt="About">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($image2)) : ?>
                                <div class="about__3-main w-img">
                                    <img src="<?php echo esc_url($image2); ?>" alt="About">
                                </div>
                            <?php endif; ?>

                            <div class="about__3-text clip-box-sm">
                                <span>
                                    <?php if (!empty($settings['selected_icon'])) : ?>
                                        <?php bdevs_elementor_render_icon($settings, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($imageicon); ?>" alt="icon" />
                                    <?php endif; ?>
                                </span>
                                <?php if ($settings['about_experience_title']) : ?>
                                    <h4 class="about__3-title">
                                        <?php echo wp_kses_post($settings['about_experience_title']); ?>
                                    </h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about__3-content mb-60">
                            <div class="section__title mb-30">
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
                            <div class="about__3-content-inner p-relative">
                                <div class="about__3-content-left bdevs-el-content">
                                    <?php if ($settings['description']) : ?>
                                        <p><?php echo wp_kses_post($settings['description']); ?></p>
                                    <?php endif; ?>

                                    <?php if ($settings['description2']) : ?>
                                        <p><?php echo wp_kses_post($settings['description2']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['button_text'])) : ?>
                                        <div class="about__3-content-btn mt-35">
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
                                                        <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                                <?php
                                                else : ?>
                                                    <a <?php $this->print_render_attribute_string('button'); ?>>
                                                        <span><?php echo esc_html($settings['button_text']); ?></span>
                                                        <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                    </a>
                                            <?php
                                                endif;
                                            endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="about__3-content-right">
                                    <?php foreach ($settings['slides'] as $slide) : ?>
                                        <div class="about__3-shadow">
                                            <div class="about__3-content-num">
                                                <h2><?php echo wp_kses_post($slide['number']); ?></h2>
                                                <h6><?php echo wp_kses_post($slide['title']); ?></h6>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us 3 Area End Here -->

        <?php else :

            if (!empty($settings['bg_image']['id'])) {
                $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], 'full');
            }

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
            }

            if (!empty($settings['image1']['id'])) {
                $image1 = wp_get_attachment_image_url($settings['image1']['id'], 'full');
            }

            if (!empty($settings['image2']['id'])) {
                $image2 = wp_get_attachment_image_url($settings['image2']['id'], 'full');
            }

            if (!empty($settings['image3']['id'])) {
                $image3 = wp_get_attachment_image_url($settings['image3']['id'], 'full');
            }

            if (!empty($settings['image4']['id'])) {
                $image4 = wp_get_attachment_image_url($settings['image4']['id'], 'full');
            }

            if (!empty($settings['image5']['id'])) {
                $image5 = wp_get_attachment_image_url($settings['image5']['id'], 'full');
            }

            $this->add_render_attribute('title', 'class', 'title mb-35 bdevs-el-title');

            $this->add_render_attribute('button', 'class', 'fill-btn lv-theme-btn bdevs-el-btn');

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'secondary-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }

        ?>
        <!-- Contact Info Area Start Here  -->
        <section class="contact__area contact__bg wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s" data-background="<?php print esc_url($bg_image); ?>">
            <div class="container">
                <div class="contact__info-box mb-120">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="contact__content bdevs-el-content">
                                <div class="section__title">
                                    <?php if ($settings['sub_title']) : ?>
                                        <span class="sub_title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                                </div>
                                <?php if ($settings['description']) : ?>
                                    <p class="mb-45"><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($settings['button_text'])) : ?>
                                    <div class="contact__content-btn">
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
                                                    <span><?php echo esc_html($settings['button_text']); ?></span></a>
                                            <?php
                                            else : ?>
                                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                                    <span><?php echo esc_html($settings['button_text']); ?></span>
                                                    <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                </a>
                                        <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="coverage__map p-relative wow slideInUp">
                                <div class="dot-main">
                                    <div class="dot-main-item">
                                        <div class="dot dot-1">
                                            <div class="dot-content p-relative">
                                                <?php if (!empty($image1)) : ?>
                                                    <div class="dot-inner">
                                                        <img src="<?php print esc_url($image1); ?>" alt="contact img">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dot-main-item">
                                        <div class="dot dot-2 active">
                                            <div class="dot-main-item">
                                                <div class="dot-content p-relative">
                                                    <?php if (!empty($image2)) : ?>
                                                        <div class="dot-inner">
                                                            <img src="<?php print esc_url($image2); ?>" alt="contact img">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dot-main-item">
                                        <div class="dot dot-3">
                                            <div class="dot-content p-relative">
                                                <?php if (!empty($image3)) : ?>
                                                    <div class="dot-inner">
                                                        <img src="<?php print esc_url($image3); ?>" alt="contact img">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dot-main-item">
                                        <div class="dot dot-4">
                                            <div class="dot-content p-relative">
                                                <?php if (!empty($image4)) : ?>
                                                    <div class="dot-inner">
                                                        <img src="<?php print esc_url($image4); ?>" alt="contact img">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dot-main-item">
                                        <div class="dot dot-5">
                                            <div class="dot-content p-relative">
                                                <?php if (!empty($image5)) : ?>
                                                    <div class="dot-inner">
                                                        <img src="<?php print esc_url($image5); ?>" alt="contact img">
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
            </div>
        </section>
        <!-- Contact Info Area End Here  -->

        <?php endif; ?>
<?php
    }
}
