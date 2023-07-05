<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class FooterInfo extends \Generic\Elements\GenericWidget {

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
        return 'cust-footerinfo';
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
        return __('Footer Info', 'bdevs-elementor');
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/bdevselementor/footerinfo/';
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
        return ['info', 'footer', 'box', 'text', 'content'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }


    // get_profile_names
    protected static function get_profile_names() {
        return [
            'fal fa-comments' => __('Comments', 'bdevs-elementor'),
            'apple' => __('Apple', 'bdevs-elementor'),
            'behance' => __('Behance', 'bdevs-elementor'),
            'bitbucket' => __('BitBucket', 'bdevs-elementor'),
            'codepen' => __('CodePen', 'bdevs-elementor'),
            'delicious' => __('Delicious', 'bdevs-elementor'),
            'deviantart' => __('DeviantArt', 'bdevs-elementor'),
            'digg' => __('Digg', 'bdevs-elementor'),
            'dribbble' => __('Dribbble', 'bdevs-elementor'),
            'email' => __('Email', 'bdevs-elementor'),
            'facebook' => __('Facebook', 'bdevs-elementor'),
            'flickr' => __('Flicker', 'bdevs-elementor'),
            'foursquare' => __('FourSquare', 'bdevs-elementor'),
            'github' => __('Github', 'bdevs-elementor'),
            'houzz' => __('Houzz', 'bdevs-elementor'),
            'instagram' => __('Instagram', 'bdevs-elementor'),
            'jsfiddle' => __('JS Fiddle', 'bdevs-elementor'),
            'linkedin' => __('LinkedIn', 'bdevs-elementor'),
            'medium' => __('Medium', 'bdevs-elementor'),
            'pinterest' => __('Pinterest', 'bdevs-elementor'),
            'product-hunt' => __('Product Hunt', 'bdevs-elementor'),
            'reddit' => __('Reddit', 'bdevs-elementor'),
            'slideshare' => __('Slide Share', 'bdevs-elementor'),
            'snapchat' => __('Snapchat', 'bdevs-elementor'),
            'soundcloud' => __('SoundCloud', 'bdevs-elementor'),
            'spotify' => __('Spotify', 'bdevs-elementor'),
            'stack-overflow' => __('StackOverflow', 'bdevs-elementor'),
            'tripadvisor' => __('TripAdvisor', 'bdevs-elementor'),
            'tumblr' => __('Tumblr', 'bdevs-elementor'),
            'twitch' => __('Twitch', 'bdevs-elementor'),
            'twitter' => __('Twitter', 'bdevs-elementor'),
            'vimeo' => __('Vimeo', 'bdevs-elementor'),
            'vk' => __('VK', 'bdevs-elementor'),
            'website' => __('Website', 'bdevs-elementor'),
            'whatsapp' => __('WhatsApp', 'bdevs-elementor'),
            'wordpress' => __('WordPress', 'bdevs-elementor'),
            'xing' => __('Xing', 'bdevs-elementor'),
            'yelp' => __('Yelp', 'bdevs-elementor'),
            'youtube' => __('YouTube', 'bdevs-elementor'),
        ];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()  {

        $this->design_style_content_controls();
        $this->footer_logo_content_controls();
        $this->title_desc_content_controls();
        $this->button_content_controls();
        $this->menu_list_content_controls();
        $this->social_profile_content_controls();
    }    

    // design_style_content_controls
    public function design_style_content_controls() {

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

        $this->end_controls_section();

    }

    // footer_logo_content_controls
    public function footer_logo_content_controls(){
        
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Logo', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'logo_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Logo', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                
            ]
        );

        $this->add_control(
            'logo_url',
            [
                'label' => __( 'Logo URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Set Logo URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
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


    // title_desc_content_controls
    public function title_desc_content_controls() {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_3'],
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
                    'designs' => ['design_1', 'design_2'],
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Description Goes Here', 'bdevs-elementor'),
                'placeholder' => __('Type Description Here', 'bdevs-elementor'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1'],
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
                'default' => 'h4',
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


    // menu_list_content_controls
    public function menu_list_content_controls(){
     // Project Slider List
        $this->start_controls_section(
            '_menu_list',
            [
                'label' => __('Menu List', 'bdevs-element'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2', 'design_3'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevs-element'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevs-element'),
                    'style_2' => __('Style 2', 'bdevs-element'),
                    'style_3' => __('Style 3', 'bdevs-element'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
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
            'menu',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Menu', 'bdevs-element'),
                'default' => __('Menu', 'bdevs-element'),
                'placeholder' => __('Type menu here', 'bdevs-element'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2', 'style_3']
                ],
            ]
        );


        $repeater->add_control(
            'menu_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Menu URL', 'bdevs-element'),
                'default' => __('Menu URL', 'bdevs-element'),
                'placeholder' => __('Menu title url here', 'bdevs-element'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2', 'style_3']
                ],
            ]
        );


        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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

    // social_profile_content_controls
    public function social_profile_content_controls() {
        $this->start_controls_section(
            '_section_social',
            [
                'label' => __('Social Profiles', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => __('Profile Name', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => __('Profile Link', 'bdevs-elementor'),
                'placeholder' => __('Add your profile link', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'label_block' => true,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email', [
                'label' => __('Email Address', 'bdevs-elementor'),
                'placeholder' => __('Add your email address', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'input_type' => 'email',
                'condition' => [
                    'name' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'customize',
            [
                'label' => __('Want To Customize?', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementor'),
                'label_off' => __('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_responsive_control(
            'footer_icon_right_spacing',
            [
                'label' => __('Icon Right Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .footer-widget-link-icon li' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->start_controls_tabs(
            '_tab_icon_colors',
            [
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $repeater->add_control(
            'color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}' => 'border-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->start_controls_tab(
            '_tab_icon_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $repeater->add_control(
            'hover_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:focus' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:focus' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .contact-social > {{CURRENT_ITEM}}:focus' => 'border-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ],
            ]
        );

        $this->add_control(
            'show_profiles',
            [
                'label' => __('Show Profiles', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

    }

    // button_content_controls
    public function button_content_controls() {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
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
        $this->menu_list_style_controls();
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

    // menu_list_style_controls
    protected function menu_list_style_controls(){
        $this->start_controls_section(
            '_section_footer_menu_style',
            [
                'label' => __('Footer Menu', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'footer_menu_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-footer-menu' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'footer_menu_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-footer-menu' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->add_control(
            'footer_menu_hover_color',
            [
                'label' => __('Text Hover Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-footer-menu:hover' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->add_control(
            'footer_menu_before_color',
            [
                'label' => __('Menu Before Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-footer-menu::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'footer_menu_typography',
                'label' => __('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-footer-menu',
            ]
        );


        $this->add_control(
            'menu_icon_label',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Menu Icon', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        ); 

        $this->add_control(
            'footer_menu_icon_color',
            [
                'label' => __('Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-widget-link i' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'footer_menu_icon_right_spacing',
            [
                'label' => __('Icon Right Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .footer-widget-link i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'footer_menu_icon_typography',
                'label' => __('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .footer-widget-link i',
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
                    'designs' => ['design_3'],
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
                    '{{WRAPPER}} .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .btn',
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
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
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
                    '{{WRAPPER}} .btn:hover, {{WRAPPER}} .btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:hover, {{WRAPPER}} .btn:focus' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .btn:hover, {{WRAPPER}} .btn:focus' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .btn.btn--icon-before:hover .btn-icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .btn.btn--icon-after:hover .btn-icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    // Render Function
    protected function render(){
       $settings = $this->get_settings_for_display(); ?>

        <?php if ($settings['designs'] === 'design_3'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title bdevs-el-title' );

        if (!empty($settings['logo_image']['id'])) {
            $logo_image = wp_get_attachment_image_url($settings['logo_image']['id'], 'full');
        }

        ?>

        <div class="footer-widget footer2-widget footer2-widget3">
            <div class="footer-widget-title">
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

            <ul class="footer-widget-link-2">
                <?php foreach ($settings['slides'] as $key => $slide) :
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                    }
                ?>
                <li>
                    <?php if (!empty($slide['selected_icon'])) : ?>
                        <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                    <?php endif; ?>

                    <a href="<?php echo esc_url($slide['menu_url']); ?>"><?php echo wp_kses_post($slide['menu']); ?></a>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>


    <?php elseif ($settings['designs'] === 'design_2'):

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title bdevs-el-title' );

        if (!empty($settings['logo_image']['id'])) {
            $logo_image = wp_get_attachment_image_url($settings['logo_image']['id'], 'full');
        }
    ?>
        <div class="footer-widget footer2-widget footer2-widget2">
            <div class="footer-widget-title">
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
            <div class="footer-widget-link dp-footer-menu-half">
                <ul>
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                    ?>
                    <li>
                        <?php if (!empty($slide['selected_icon'])) : ?>
                            <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                        <?php endif; ?>

                        <a class="bdevs-el-footer-menu" href="<?php echo esc_url($slide['menu_url']); ?>">
                            <?php echo wp_kses_post($slide['menu']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


    <?php else:

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title bdevs-el-title' );

        if (!empty($settings['logo_image']['id'])) {
            $logo_image = wp_get_attachment_image_url($settings['logo_image']['id'], 'full');
        }

        if ( !empty($settings['button_link']) ) {
            $this->add_render_attribute( 'button', 'class', 'service-btn bdevs-el-btn' );
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }
    ?>

        <div class="footer-widget footer2-widget footer2-widget1 bdevs-el-content">
            <div class="footer-widget-title">
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

            <?php if(!empty($settings['description'])) : ?>
                <p><?php echo wp_kses_post($settings['description']); ?></p>
            <?php endif; ?>

            <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                <div class="footer-social-link mt-40">
                    <ul class="footer-widget-link-icon">
                    <?php
                    foreach ($settings['profiles'] as $profile) :
                        $icon = !empty($profile['name']) ? $profile['name'] : '';
                        $url = !empty($profile['link']['url']) ? $profile['link']['url'] : '';

                        if ($profile['name'] === 'website') {
                            $icon = 'globe';
                        } elseif ($profile['name'] === 'email') {
                            $icon = 'envelope';
                            $url = 'mailto:' . antispambot($profile['email']);
                        }

                        printf('<li class="contact-social"><a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s comments-btn"><i class="fab fa-%s" aria-hidden="true"></i></a></li>',
                            $url,
                            esc_attr($profile['_id']),
                            esc_attr($icon),
                            esc_attr($icon)
                        );
                    endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        <?php
    }
}
