<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class InfoBox extends \Generic\Elements\GenericWidget {

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
        return 'cust-infobox';
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
        return __('Info Box', 'bdevs-elementor');
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/bdevselementor/infobox/';
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
        return 'eicon-lightbox-expand';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'text', 'content'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()  {
        $this->design_style();
        $this->info_image();
        $this->title_and_desc();
        $this->info_icon();
        $this->info_button();
        $this->icon_info();
    }


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
                    'design_3' => __('Design 3', 'bdevs-elementor'),
                    'design_4' => __('Design 4', 'bdevs-elementor'),
                    'design_5' => __('Design 5', 'bdevs-elementor'),
                    'design_6' => __('Design 6', 'bdevs-elementor'),
                    'design_7' => __('Design 7', 'bdevs-elementor'),
                    'design_8' => __('Design 8', 'bdevs-elementor'),
                    'design_9' => __('Design 9', 'bdevs-elementor'),
                    'design_10' => __('Design 10', 'bdevs-elementor'),
                    'design_11' => __('Design 11', 'bdevs-elementor'),
                    'design_12' => __('Design 12', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

    }


    public function info_icon() {
        $this->start_controls_section(
            '_section_media',
            [
                'label' => __( 'Icon / Image', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1','design_5','design_6', 'design_9', 'design_11'],
                ],
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'bdevs-elementor' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'bdevs-elementor' ),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevs-elementor' ),
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


        $this->end_controls_section();

    }

    public function icon_info() {
        // Project Slider List
        $this->start_controls_section(
            '_section_icon_list',
            [
                'label' => __('Icon List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_4', 'design_8'],
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
                    'style_1' => __('Style 1', 'bdevs-elementor'),
                    'style_2' => __('Style 2', 'bdevs-elementor'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'contact_condition',
            [
                'label' => __('Contact Condition', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1 (phone)', 'bdevs-elementor'),
                    'style_2' => __('Style 2 (email)', 'bdevs-elementor'),
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'circle_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Circle Image', 'bdevs-elementoror'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevs-elementor'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevs-elementor'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevs-elementor'),
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
                    'type' => 'image'
                ]
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'icon_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Icon Image', 'bdevs-elementoror'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
            ]
        );

        $repeater->add_control(
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
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_size',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $repeater->add_control(
            'icon_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'contact_phone',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Phone', 'bdevs-elementor'),
                'default' => __('326 222 666 00', 'bdevs-elementor'),
                'placeholder' => __('Type content phone', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'contact_condition' => ['style_1'],
                ],
            ]
        );

        $repeater->add_control(
            'contact_email',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Email', 'bdevs-elementor'),
                'default' => __('info@webmail.com', 'bdevs-elementor'),
                'placeholder' => __('Type content email', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'contact_condition' => ['style_2'],
                ],
            ]
        );


        $repeater->add_control(
            'icon_title_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title URL', 'bdevs-elementor'),
                'default' => __('Title URL', 'bdevs-elementor'),
                'placeholder' => __('Type title url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );


        $repeater->add_control(
            'icon_description',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Description', 'bdevs-elementor'),
                'default' => __('designation', 'bdevs-elementor'),
                'placeholder' => __('Type designation here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );

        $repeater->add_control(
            'icon_slider_button_text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Button Text', 'bdevs-elementor'),
                'default' => __('button text', 'bdevs-elementor'),
                'placeholder' => __('Type button text here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );

        $repeater->add_control(
            'icon_button_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Button URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Type Button url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(contact_phone || "Carousel Item"); #>',
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


    public function info_image(){
        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1','design_2', 'design_10', 'design_12'],
                ],
            ]
        );

        $this->add_control(
            'info_image',
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
                    'designs' => ['design_1','design_2', 'design_10', 'design_12'],
                ],

            ]
        );

        $this->add_control(
            'info_image1',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('1 Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_4', 'design_5', 'design_6', 'design_7', 'design_8', 'design_9', 'design_10', 'design_11', 'design_12'],
                ],
            ]
        );

        $this->add_control(
            'info_image_2',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('2 Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_4', 'design_5', 'design_6', 'design_7', 'design_8', 'design_9', 'design_10', 'design_11', 'design_12'],
                ],
            ]
        );

        $this->add_control(
            'info_image_3',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('3 Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_1', 'design_2', 'design_4', 'design_5', 'design_6', 'design_7', 'design_8', 'design_9', 'design_10', 'design_11', 'design_12'],
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


    public function title_and_desc() {

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
                'default' => __('Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Sub Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_6', 'design_12'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1','design_2','design_5','design_6','design_7', 'design_9', 'design_10', 'design_11', 'design_12'],
                ],
            ]
        );
        $this->add_control(
            'title2',
            [
                'label' => __('Bottom Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title2', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'gradient_title',
            [
                'label' => __('gradient Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('01', 'bdevs-elementor'),
                'placeholder' => __('01', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_10'],
                ],
            ]
        );

        $this->add_control(
            'title_link',
            [
                'label' => __( 'Title Link', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Set Title URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
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
                    'designs' => ['design_1','design_2','design_3', 'design_9', 'design_10', 'design_11'],
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
                'default' => 'h5',
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

    public function info_button() {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1','design_6', 'design_9', 'design_10', 'design_12'],
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
                    'condition' => [
                    'designs' => ['design_1'],
                ],
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
    protected function register_style_controls() {

        $this->title_style_controls();
        $this->info_button_style_controls();

    }

    // title_style_controls
    protected function title_style_controls() {

        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_overly_color',
            [
                'label' => __('Content Overly Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content-wrapper::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'title_heading',
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
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

        // title2 style
        $this->add_control(
            'title_heading2',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Title 2', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_responsive_control(
            'title_spacing2',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'title_color2',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title2' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'title_overly_color',
            [
                'label' => __('Title Bg Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title_bg' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title2_typography',
                'label' => __('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-title2',
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'description_heading',
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
                    '{{WRAPPER}} .bdevs-el-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
            ]
        );

        $this->end_controls_section();

    }

    // info_button_style_controls
    protected function info_button_style_controls() {

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_3','design_6', 'design_9', 'design_10'],
                ],
            ]
        );

        $this->add_responsive_control(
            'link_padding',
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
                'name' => 'btn_typography',
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
            'link_color',
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
            'button_icon_translate',
            [
                'label' => __('Icon Translate X', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn--icon-before .bdevs-el-btn-icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-btn--icon-after .bdevs-el-btn-icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
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
            'link_hover_color',
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_icon_translate',
            [
                'label' => __('Icon Translate X', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn.bdevs-el-btn--icon-before:hover .bdevs-el-btn-icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .bdevs-el-btn.bdevs-el-btn--icon-after:hover .bdevs-el-btn-icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
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

        ?>

        <?php if ($settings['designs'] === 'design_12'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

            if (!empty($settings['info_image']['url'])) {
                $info_image = !empty($settings['info_image']['id']) ? wp_get_attachment_image_url($settings['info_image']['id'], $settings['bg_thumbnail_size']) : $settings['info_image']['url'];
                $info_image_alt = get_post_meta($settings["info_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'b-button black-b-button bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

        ?>

        <div class="portfolio-item bdevs-el-content">
            <?php if (!empty($info_image)) : ?>
                <div class="portfolio-img popup-image">
                    <img src="<?php print esc_url($info_image); ?>" alt="">
                </div>
            <?php endif; ?>
            <div class="portfolio-content">
                
                <?php if($settings['sub_title']) : ?>
                    <div class="project-link">
                        <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']) ; ?></span>
                    </div>
                <?php endif; ?>

                <?php if($settings['title']) : ?>
                    <div class="portfolio-content-title">
                        <h5 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']) ; ?></a></h5>
                    </div>
                <?php endif; ?>

                <div class="b-button black-b-button bdevs-el-btn">
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
                                <?php echo esc_html($settings['button_text']); ?></a>
                        <?php
                        else: ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                <?php echo esc_html($settings['button_text']); ?>
                                <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                            </a>
                        <?php
                        endif;
                    endif; ?>
                </div>
            </div>
        </div>


        <?php elseif ($settings['designs'] === 'design_11'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

        ?>

        <div class="working-wrapper bdevs-el-titl text-center mb-30">
            <div class="working-icon">
                <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                    $this->get_render_attribute_string( 'image' );
                    $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                    <figure>
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                    </figure>
                    <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                    <figure>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </figure>
                <?php endif; ?>
            </div>
            <div class="working-text bdevs-el-content">
                <?php if($settings['title']): ?>
                    <h3 class="bdevs-el-title">
                        <a class="bdevs-el-title" href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']); ?></a>
                    </h3>
                <?php endif; ?>
                
                <?php if($settings['description']): ?>
                    <p><?php echo wp_kses_post($settings['description']) ; ?></p>
                <?php endif; ?>
            </div>
        </div>


        <?php elseif ($settings['designs'] === 'design_10'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

            if (!empty($settings['info_image']['url'])) {
                $info_image = !empty($settings['info_image']['id']) ? wp_get_attachment_image_url($settings['info_image']['id'], $settings['bg_thumbnail_size']) : $settings['info_image']['url'];
                $info_image_alt = get_post_meta($settings["info_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'b-button white-b-button bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>

        <div class="services-wrapper text-center mb-30 bdevs-el-content">
            <div class="services-img bdevs-el-content-wrapper pos-rel">
                <?php if (!empty($info_image)) : ?>
                    <img src="<?php print esc_url($info_image); ?>" alt="service-image">
                <?php endif ;?>

                <div class="services-text">
                    <?php if ($settings['gradient_title']): ?>
                        <h1><?php echo wp_kses_post($settings['gradient_title']); ?></h1>
                    <?php endif; ?>

                    <?php if($settings['title']): ?>
                        <h2 class="bdevs-el-title">
                            <a class="bdevs-el-title" href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']) ; ?></a>
                        </h2>
                    <?php endif; ?>

                    <?php if($settings ['description']): ?>
                        <p><?php echo wp_kses_post($settings['description']) ; ?></p>
                    <?php endif; ?>

                    <div class="b-button white-b-button bdevs-el-btn">
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
                                    <?php echo esc_html($settings['button_text']); ?></a>
                            <?php
                            else: ?>
                                <a <?php $this->print_render_attribute_string('button'); ?>>
                                    <?php echo esc_html($settings['button_text']); ?>
                                    <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                </a>
                            <?php
                            endif;
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="services-content bdevs-el-title_bg">
                <?php if($settings['title2']): ?>
                    <h3 class="bdevs-el-title2" >
                        <a class="bdevs-el-title2" href="<?php echo esc_url($settings['title_link']); ?>">
                            <?php echo wp_kses_post($settings['title2']); ?>
                        </a>
                    </h3>
                <?php endif; ?>
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_9'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'b-button bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>
        <div class="features-wrapper bdevs-el-content mb-30 ">
            <div class="features-icon">
                <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                    $this->get_render_attribute_string( 'image' );
                    $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                    <figure>
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                    </figure>
                    <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                    <figure>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </figure>
                <?php endif; ?>
            </div>
            <div class="features-text">
                <?php if ($settings['title']): ?>
                    <h3 class="bdevs-el-title">
                        <a class="bdevs-el-title" href="<?php echo esc_url($settings['title_link']); ?>">
                            <?php echo wp_kses_post($settings['title']); ?>
                        </a>
                    </h3>
                <?php endif; ?>

                <?php if ($settings['description']): ?>
                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                <?php endif; ?>
                
                <div class="b-button">
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
                                <?php echo esc_html($settings['button_text']); ?></a>
                        <?php
                        else: ?>
                            <a <?php $this->print_render_attribute_string('button'); ?>>
                                <?php echo esc_html($settings['button_text']); ?>
                                <?php bdevs_elementor_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                            </a>
                        <?php
                        endif;
                    endif; ?>
                </div>
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_8'):

            $this->add_render_attribute('title', 'class', 'item_title');
        ?>
        <!-- CTA Area Start Here  -->
        <div class="call__cta dp-home-cta-info position p-absolute">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) :
                        if (!empty($slide['bg_image']['id'])) {
                            $bg_image = wp_get_attachment_image_url($slide['bg_image']['id'], 'full');
                        }
                    ?>
                        <div class="col-lg-6">
                            <div class="call__cta-wrapper call__cta-padd overlay overlay-red clip-box bg-css"
                                data-background="<?php print esc_url($bg_image); ?>">
                                <div class="call__cta-content">
                                    <h6 class="call__cta-content-small-title"><?php echo wp_kses_post($slide['icon_title']); ?></h6>
                                    <?php if (!empty($slide['contact_phone'])) : ?>
                                        <h3 class="call__cta-content-title"><a href="tel:<?php echo esc_url($slide['contact_phone']); ?>"> <?php echo wp_kses_post($slide['contact_phone']); ?>
                                        </a></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['contact_email'])) : ?>
                                        <h3 class="call__cta-content-title"><a href="mailto:<?php echo esc_url($slide['contact_email']); ?>">
                                            <?php echo wp_kses_post($slide['contact_email']); ?>
                                        </a></h3>
                                    <?php endif; ?>
                                </div>
                                <div class="call__cta-icon">
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
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
         </div>
         <!-- CTA Area End Here  -->


        <?php elseif ($settings['designs'] === 'design_7'): ?>

        <div class="faq-box-wrapper">
            <div class="faq-question-item">
                <?php if ($settings['title']): ?>
              <div class="faq-queastion-text">
                  <a href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']); ?></a>
              </div>
             <?php endif; ?>
                <div class="faq-queastion-icon">
                  <a href="<?php echo esc_url($settings['title_link']); ?>"><i class="far fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_6'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'contact-gradient-btn-three bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>

        <div class="contact-info-box-three text-center wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="contact-info-icon-box">
                <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                    $this->get_render_attribute_string( 'image' );
                    $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                    <figure>
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                    </figure>
                    <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                    <figure>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </figure>
                <?php endif; ?>
            </div>
            <div class="contact-info-content-box">
                <?php if ($settings['sub_title']): ?>
                <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                 <?php endif; ?>
                <?php if ($settings['title']): ?>
                <h4 class="bdevs-el-title"><?php echo wp_kses_post($settings['title']); ?></h4>
                 <?php endif; ?>
            </div>
            <div class="contact-info-btn-three">
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
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_5'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'item_title');

        ?>

        <div class="info-gradint-wrapper-three wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="info-gradint-item-three text-center">
                <div class="info-gradint-item-wrapper-three">
                    <div class="info-gradint-item-thumb-three">
                     <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                        $this->get_render_attribute_string( 'image' );
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                        </figure>
                        <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                        <figure>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </figure>
                    <?php endif; ?>
                    </div>
                    <div class="info-gradint-item-title">
                        <h3 class="bdevs-el-title"><a href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']); ?></a></h3>
                    </div>
                </div>
            </div>
        </div>


        <?php elseif ($settings['designs'] === 'design_4'):
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'item_title');

        ?>

        <div class="icon-box-wrapper-two">
            <div class="container">
                <div class="row icon-box-bg-two">
                    <?php
                        foreach ($settings['slides'] as $key => $slide) :
                            if (!empty($slide['icon_image']['id'])) {
                                $icon_image = wp_get_attachment_image_url($slide['icon_image']['id'], 'full');
                            }
                            if (!empty($settings['info_image_2']['id'])) {
                                $info_image_2 = wp_get_attachment_image_url($settings['info_image_2']['id'], 'full');
                        }
                   ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                      <div class="icon-box-item-wrapper-two">
                        <div class="icon-box-item-two text-center">
                            <div class="icon-wrapper-all-circle">
                            <div class="icon-box-icon-two">
                                <?php if (!empty($icon_image)) : ?>
                                <div class="circle-border">
                                    <img src="<?php print esc_url($slide['circle_image']['url']); ?>" alt="img">
                                </div>
                                  <?php if ($settings['info_image_2']): ?>
                                  <img src="<?php echo esc_url($info_image_2); ?>" alt="img">
                                 <?php endif; ?>
                               <div class="icon-box-icon-wrapper">
                               <img src="<?php print esc_url($slide['icon_image']['url']); ?>" alt="img">
                               </div>
                               <?php endif; ?>
                            </div>
                            </div>
                            <?php if (!empty($slide['icon_title'])) : ?>
                            <div class="icon-box-title-two mb-15">
                                <h3><a href="<?php echo esc_url($slide['icon_title_url']); ?>"><?php echo wp_kses_post($slide['icon_title']); ?></a></h3>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($slide['icon_description'])) : ?>
                            <div class="icon-box-content-two">
                                <p><?php echo wp_kses_post($slide['icon_description']); ?></p>
                                <a class="icon-box-btn-two" href="<?php echo esc_url($slide['icon_button_url']); ?>">
                                    <?php echo wp_kses_post($slide['icon_slider_button_text']); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                         </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_3'):

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'text_btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'item_title');

        if (!empty($settings['info_image1']['id'])) {
            $info_image1 = wp_get_attachment_image_url($settings['info_image1']['id'], 'full');
        }

        if (!empty($settings['info_image_2']['id'])) {
                $info_image_2 = wp_get_attachment_image_url($settings['info_image_2']['id'], 'full');
        }

        if (!empty($settings['info_image_3']['id'])) {
                $info_image_3 = wp_get_attachment_image_url($settings['info_image_3']['id'], 'full');
        }

        ?>

        <div class="skillset-area-info d-flex align-items-center wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="skillset-info-thumb d-flex">
                <?php if ($settings['info_image1']): ?>
                <img src="<?php echo esc_url($info_image1); ?>" alt="img">
                <?php endif; ?>
                <?php if ($settings['info_image_2']): ?>
                <img src="<?php echo esc_url($info_image_2); ?>" alt="img">
                <?php endif; ?>
                <?php if ($settings['info_image_3']): ?>
                <img src="<?php echo esc_url($info_image_3); ?>" alt="img">
                <?php endif; ?>
            </div>
            <?php if ($settings['description']): ?>
            <div class="skillset-info-content">
                <h4><?php echo wp_kses_post($settings['description']); ?></h4>
            </div>
           <?php endif; ?>
        </div>


    <?php elseif ($settings['designs'] === 'design_2'):


    ?>

        <div class="skillset-area-two wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="skillset-item-two">
                <div class="skillset-item-icon">
                   <a href="<?php echo esc_url($settings['title_link']); ?>"><i class="far fa-long-arrow-right"></i></a>
                </div>
                <?php if ($settings['gradient_title']): ?>
                <div class="skillset-item-gradint-title">
                    <h1><?php echo wp_kses_post($settings['gradient_title']); ?></h1>
                </div>
                 <?php endif; ?>
                <div class="skillset-item-title">
                    <h2 class="bdevs-el-title"><a href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']); ?></a></h2>
                </div>
                 <?php if ($settings['description']): ?>
                <div class="skillset-item-content bdevs-el-content">
                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>


    <?php else:
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], 'full');
        }

        if ( !empty($settings['button_link']) ) {
            $this->add_render_attribute( 'button', 'class', 'service-btn bdevs-el-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }
    ?>

        <div class="service-area-one wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="service-item-one mb-30">
                <div class="service-item-wrapper">
                <div class="service-item-thumb">
                    <?php if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
                        $this->get_render_attribute_string( 'image' );
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                        </figure>
                        <?php elseif ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
                        <figure>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </figure>
                    <?php endif; ?>
                </div>
                <div class="service-item-content bdevs-el-content">
                    <h3 class="bdevs-el-title"><a href="<?php echo esc_url($settings['title_link']); ?>"><?php echo wp_kses_post($settings['title']); ?></a></h3>
                    <?php if ($settings['description']): ?>
                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                   <?php endif; ?>
                </div>
                <div class="service-item-one-btn">
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
                </div>
             </div>
            </div>
        </div>


    <?php endif; ?>
        <?php
    }

}
