<?php

namespace Bdevs\Elementor;


defined('ABSPATH') || die();

class MemberDetails extends \Generic\Elements\GenericWidget
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
        return 'cust-member-details';
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
        return __('Member Details', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/cust-member-details/';
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
        return ' eicon-nerd-wink';
    }

    public function get_keywords()
    {
        return ['slider', 'memeber', 'map', 'details'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }


    // get_profile_names
    protected static function get_profile_names()
    {
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

    // register_content_controls
    protected function register_content_controls()
    {
        $this->title_description_content_controls();
        $this->contact_list_content_controls();
        $this->button_content_controls();
    }

    // title_description_content_controls
    public function title_description_content_controls()
    {
        $this->start_controls_section(
            '_section_info',
            [
                'label' => __('Information', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'team_image',
            [
                'label' => esc_html__('Team Member Image', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_image',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Name', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Happy Member Name',
                'placeholder' => __('Type Member Name', 'bdevs-elementor'),
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label' => __('Job Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Happy Officer', 'bdevs-elementor'),
                'placeholder' => __('Type Member Job Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'bio',
            [
                'label' => __('Short Bio', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Write something amazing about the happy member', 'bdevs-elementor'),
                'rows' => 5,
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
                'separator' => 'before',
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

    // contact_list_content_controls
    public function contact_list_content_controls()
    {
        // Fact List
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Fact List', 'bdevs-elementor'),
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
            'contact_list_label',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Contact List Label', 'bdevs-elementor'),
                'placeholder' => __('Type sub title here', 'bdevs-elementor'),
                'default' => __('Contact List Label', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $repeater->add_control(
            'contact_list_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Contact List Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'default' => __('+(908)786789786', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'contact_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Contact URL', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(contact_list_label || "Carousel Item"); #>',
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


    // button_content_controls
    public function button_content_controls()
    {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'default' => '',
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
        $this->title_description_style_controls();
        $this->button_style_controls();
    }

    // title_description_style_controls
    protected function title_description_style_controls()
    {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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

    // button_style_controls
    protected function button_style_controls()
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

        if (!empty($settings['team_image']['url'])) {
            $team_image = !empty($settings['team_image']['id']) ? wp_get_attachment_image_url($settings['team_image']['id'], $settings['bg_image_size']) : $settings['team_image']['url'];
            $bg_image_alt = get_post_meta($settings["team_image"]["id"], "_wp_attachment_image_alt", true);
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        $this->add_render_attribute('title', 'data-wow-delay', '.6s');

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'fill-btn clip-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

?>

        <!-- team details area start  -->
        <section class="dp-team-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="tmd-img w-img p-relative wow fadeInUp2 mb-50" data-wow-duration="1.5s" data-wow-delay=".3s">
                                    <?php if (!empty($settings['team_image'])) : ?>
                                        <div class="member-details-thumb">
                                            <img src="<?php echo esc_url($team_image); ?>" alt="team-details">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-12">
                                <div class="tmd__content bdevs-el-content wow fadeInUp2 mb-50" data-wow-duration="1.5s" data-wow-delay=".3s">
                                    <div class="section__title td-section-title mb-25">
                                        <?php if ($settings['job_title']) : ?>
                                            <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['job_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if ($settings['title']) :
                                            printf(
                                                '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['title_tag']),
                                                $this->get_render_attribute_string('title'),
                                                wp_kses_post($settings['title'])
                                            );
                                        endif; ?>
                                        <?php if ($settings['bio']) : ?>
                                            <p><?php echo wp_kses_post($settings['bio']); ?>.</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="team__founder-info mb-45">
                                        <?php foreach ($settings['slides'] as $key => $slide) :
                                            if (!empty($slide['image']['id'])) {
                                                $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                                            }
                                        ?>
                                        <div class="team__founder-item">

                                            <div class="team__founder-item-icon">
                                                <?php if (!empty($slide['selected_icon'])) : ?>
                                                    <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                                <?php endif; ?>
                                            </div>

                                            <div class="team__founder-text">

                                                <?php if (!empty($slide['contact_list_label'])) : ?>
                                                <span class="title">
                                                    <?php echo wp_kses_post($slide['contact_list_label']); ?>
                                                </span>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['contact_list_title'])) : ?>
                                                <h4 class="contact">
                                                    <a href="<?php echo $slide['contact_url']; ?>">
                                                        <?php echo wp_kses_post($slide['contact_list_title']); ?>
                                                    </a>
                                                </h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php if (!empty($settings['button_text'])) : ?>
                                    <div class="tmd__content-btn">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team details area end -->
<?php
    }
}
