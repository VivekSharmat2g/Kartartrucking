<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class Team extends \Generic\Elements\GenericWidget
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
        return 'cust-team';
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
        return __('Team', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/team/';
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
        return 'eicon-lock-user gen-icon';
    }
    public function get_keywords()
    {
        return ['slider', 'memeber', 'gallery', 'carousel'];
    }
    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // register_content_controls
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design_style',
            [
                'label' => __('Presets', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'shape_switch',
            [
                'label' => __('Shape Show/Hide', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
                'condition' => [
                    'design_style' => ['design_10'],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['design_1', 'design_2'],
                ],
            ]
        );

        $this->add_control(
            'icon_switch',
            [
                'label' => __('Subtitle Icon Show/Hide', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'design_style' => ['design_1'],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'heading_title_icon',
            [
                'label' => __('Title Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['design_1', 'design_3'],
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => __('Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevs-elementor'),
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
                'placeholder' => __('Heading Description Text', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['design_2'],
                ],
            ]
        );

        $this->add_control(
            'sec_title_tag',
            [
                'label'   => __('Title HTML Tag', 'bdevs-elementor'),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevs-elementor'),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h2',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'sec_align',
            [
                'label'     => __('Alignment', 'bdevs-elementor'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __('Left', 'bdevs-elementor'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevs-elementor'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'bdevs-elementor'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_button_style',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['design_2'],
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
        $this->end_controls_section();



        // member list
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Members List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

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
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('BDevs Member Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Designation', 'bdevs-elementor'),
                'default' => __('BDevs Officer', 'bdevs-elementor'),
                'placeholder' => __('Type designation here', 'bdevs-elementor'),
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
                'placeholder' => __('Type link here', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
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

        // REPEATER
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
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls() {
        $this->team_member_style_controls();
    }

    // team_member_style_controls
    protected function team_member_style_controls(){
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Team style Controls', 'bdevselementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Team name
        $this->add_control(
            '_team_member_name',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Member Name', 'bdevselementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'team_member_name_bottom_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'team_member_name_color',
            [
                'label' => __('Text Color', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-member-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name-title',
                'selector' => '{{WRAPPER}} .bdevs-el-member-name',
            ]
        );

        // Subtitle
        $this->add_control(
            '_team_member_designation',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Member Designation', 'bdevselementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'team_member_designation_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-member-designation' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'team_member_designation_color',
            [
                'label' => __('Text Color', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-member-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'team-member-designation-typography',
                'selector' => '{{WRAPPER}} .bdevs-el-member-designation',
            ]
        );

        // Member Social
        $this->add_control(
            '_team_member_social',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Member Social', 'bdevselementor'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'team_member_social_color',
            [
                'label' => __('Color', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__social a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'team_member_social_hover_color',
            [
                'label' => __('Hover Color', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team__social a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_member_social_right_spacing',
            [
                'label' => __('Right Spacing', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team__social a' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_member_social_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team__social a' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'team-member-social-typography',
                'selector' => '{{WRAPPER}} .team__social a',
            ]
        );

        $this->end_controls_section();
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'team-title');
        $this->add_render_attribute('name', 'class', 'name');

        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text');

        if (!empty($title)) {
            $title = wp_kses_post($settings['title']);
        }

        if (empty($settings['slides'])) {
            return;
        }

        if (!empty($settings['heading_title_icon']['id'])) {
            $heading_title_icon = wp_get_attachment_image_url($settings['heading_title_icon']['id'], $settings['thumbnail_size']);
        }

        ?>

        <?php if ($settings['designs'] === 'design_3') : ?>

            <!-- team-area-start -->
            <div class="team-area team-area-six team-padding wow bdevs-el-content fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = wp_kses_post($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!$image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="team__item mb-30">
                                    <div class="team__item-img">
                                        <img src="<?php print esc_url($image); ?>">
                                    </div>
                                    <div class="team-text">

                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title_slider'),
                                            $title,
                                            $slide_url
                                        );
                                        ?>

                                        <?php if (!empty($slide['designation'])) : ?>
                                            <span class="bdevs-el-member-designation">
                                                <?php echo wp_kses_post($slide['designation']); ?>
                                            </span>
                                        <?php endif; ?>
                                    
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="team__social">
                                                <?php if (!empty($slide['facebook_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?> 

                                                <?php if (!empty($slide['twitter_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?> 

                                                <?php if (!empty($slide['instagram_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram-square"></i></a> 
                                                <?php endif; ?> 

                                                <?php if (!empty($slide['linkedin_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-google"></i></a>
                                                <?php endif; ?> 
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- team-area-end -->

            <!-- style 2 -->
        <?php elseif ($settings['designs'] === 'design_2') :
            $this->add_inline_editing_attributes('title_slider', 'basic');
            $this->add_render_attribute('title_slider', 'class', 'team__3-item-title bdevs-el-member-name');
        ?>
            <!-- Team Area 2 Start Here  -->
            <section class="team__3">
                <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = wp_kses_post($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!$image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="team__3-item mb-50">
                                <div class="team__3-item-img w-img">
                                    <a href="<?php echo esc_url($slide_url); ?>"><img src="<?php print esc_url($image); ?>" alt="Team"></a>

                                    <?php if (!empty($slide['show_social'])) : ?>
                                    <div class="team__3-item-social">
                                        <ul>
                                            <?php if (!empty($slide['web_title'])) : ?>
                                               <li><a href="<?php echo esc_url($slide['web_title']); ?>"><i class="far fa-globe"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['email_title'])) : ?>
                                                <li><a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i class="fal fa-envelope"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['phone_title'])) : ?>
                                                <li><a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i class="fas fa-phone"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['facebook_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['twitter_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['instagram_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['linkedin_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['youtube_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['youtube_title']); ?>"><i class="fab fa-youtube"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['googleplus_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['flickr_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['flickr_title']); ?>"><i class="fab fa-flickr"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['vimeo_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i class="fab fa-vimeo-v"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['behance_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['behance_title']); ?>"><i class="fab fa-behance"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['dribble_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['dribble_title']); ?>"><i class="fab fa-dribbble"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['pinterest_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['gitub_title'])) : ?>
                                                <li><a href="<?php echo esc_url($slide['gitub_title']); ?>"><i class="fab fa-github"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>

                                    <div class="team__3-item-content">
                                        <?php if (!empty($slide['designation'])) : ?>
                                            <span class="team__3-item-subtitle bdevs-el-member-designation"><?php echo wp_kses_post($slide['designation']); ?></span>
                                        <?php endif; ?>
                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title_slider'),
                                            $title,
                                            $slide_url
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Team Area 2 End Here  -->

        <?php else :
            $settings = $this->get_settings_for_display();
            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title_slider', 'class', 'bdevs-el-member-name');
        ?>
            <!-- Team Area Start Here  -->
            <section class="team__area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="container">
                    <div class="row 25">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = wp_kses_post($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!$image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="team__item team__overlay p-relative mb-50 clip-box">
                                    <div class="team__item-img w-img">
                                        <img src="<?php print esc_url($image); ?>" alt="team-image">
                                    </div>
                                    <div class="team__item-text p-absolute">
                                        <?php if (!empty($slide['designation'])) : ?>
                                            <span class="bdevs-el-member-designation"><?php echo wp_kses_post($slide['designation']); ?></span>
                                        <?php endif; ?>

                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title_slider'),
                                            $title,
                                            $slide_url
                                        );
                                        ?>
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="team__social">
                                                <?php if (!empty($slide['web_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['web_title']); ?>"><i class="far fa-globe"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['email_title'])) : ?>
                                                    <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i class="fal fa-envelope"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['phone_title'])) : ?>
                                                    <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i class="fas fa-phone"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['facebook_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['twitter_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['instagram_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['linkedin_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-linkedin-in"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['youtube_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['youtube_title']); ?>"><i class="fab fa-youtube"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['googleplus_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i class="fab fa-google-plus-g"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['flickr_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i class="fab fa-flickr"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['vimeo_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i class="fab fa-vimeo-v"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['behance_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['behance_title']); ?>"><i class="fab fa-behance"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['dribble_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i class="fab fa-dribbble"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['pinterest_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i class="fab fa-pinterest-p"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['gitub_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i class="fab fa-github"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Team Area End Here  -->
        <?php endif; ?>
<?php
    }
}
