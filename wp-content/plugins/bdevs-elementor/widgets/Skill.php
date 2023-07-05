<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class Skill extends \Generic\Elements\GenericWidget
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
        return 'skill';
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
        return __('Skill', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/skill/';
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
        return 'eicon-save-o gen-icon';
    }

    public function get_keywords()
    {
        return ['skill', 'blurb', 'infobox', 'content', 'block', 'box'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }


   // register_content_controls
    protected function register_content_controls()
    {
        $this->design_style_controls();
        $this->images();
        $this->title_and_desc_content_controls();
        $this->skill_content_controls();
        $this->button_content_controls();
    }

    // design_style_controls
    protected function design_style_controls(){
        $this->start_controls_section(
            '_section_design',
            [
                'label' => esc_html__('Presets', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'designs',
            [
                'label' => esc_html__('Designs', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'design_1' => esc_html__('Design 1', 'bdevs-elementor'),
                    'design_2' => esc_html__('Design 2', 'bdevs-elementor'),
                    'design_3' => esc_html__('Design 3', 'bdevs-elementor'),
                    'design_4' => esc_html__('Design 4', 'bdevs-elementor'),
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
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
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_4'],
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
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
    public function images(){
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2'],
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
                    'designs' => ['design_4'],
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
                    'designs' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
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
                ]
            ]
        );

        $this->end_controls_section();
    }


    // skill_content_controls
    protected function skill_content_controls()
    {
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => esc_html__('Fact List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => esc_html__('Skill Number', 'bdevs-elementor'),
                'default' => esc_html__('70%', 'bdevs-elementor'),
                'placeholder' => esc_html__('Type Number here', 'bdevs-elementor'),
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
                'label' => esc_html__('Title', 'bdevs-elementor'),
                'default' => esc_html__('Bdevs Title', 'bdevs-elementor'),
                'placeholder' => esc_html__('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // Progress
        $repeater->add_control(
            '_single_progress_color',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Progress Color', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'single-progress-color',
                'label' => esc_html__('Progress Color', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .progress.bdevs-el-progress .progress-bar',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        // Progress Base
        $repeater->add_control(
            '_single_progress_base_color',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Progress Base Color', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'progress-base-color',
                'label' => esc_html__('Progress Base Color', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .progress.bdevs-el-progress',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
                
            ]
        );

        $repeater->add_control(
            'skill_cirle_color',
            [
                'label' => __( 'Circle BG Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f3f3f3',
            ]
        ); 

        $repeater->add_control(
            'skill_color',
            [
                'label' => __( 'Circle Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => ' #bc101c',
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

    // button_content_controls
    public function button_content_controls()
    {

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_4'],
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


    // register_style_controls
    protected function register_style_controls()
    {
        $this->title_style_controls();
        $this->description_style_controls();
        $this->skill_bars_style_controls();
        $this->skill_content_style_controls();
        $this->button_style_controls();
    }

    // skill_bars_style_controls
    protected function skill_bars_style_controls()
    {
        $this->start_controls_section(
            '_section_style_bars',
            [
                'label' => esc_html__('Skill Bars', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__('Height', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .progress.bdevs-el-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .progress.bdevs-el-progress' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'spacing',
            [
                'label' => esc_html__('Spacing Between', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 25,
                        'max' => 550,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-wrapper .bdevs-el-skill-single:not(:first-child)' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .progress.bdevs-el-progress, {{WRAPPER}} .progress-bar.bdevs-el-progress-bar ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .bdevs-el-skill-wrapper .progress'
            ]
        );

        $this->end_controls_section();
    }

    // skill_content_style_controls
    protected function skill_content_style_controls()
    {

        $this->start_controls_section(
            '_section_content',
            [
                'label' => esc_html__('Content', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => esc_html__('Label Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'label_bottom_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-skill-title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'label_text_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-skill-title',
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Percent Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-title-wrap span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'percent_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-skill-title-wrap span',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'level_color',
            [
                'label' => esc_html__('Progress Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-wrapper .progress .progress-bar' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'progress-bar-background',
                'label' => esc_html__('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevs-el-skill-wrapper .progress .progress-bar',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'base_color',
            [
                'label' => esc_html__('Progress Base Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-skill-wrapper .progress' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'progress-base-background',
                'label' => esc_html__('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bdevs-el-skill-wrapper .progress',
                'condition' => [
                    'designs!' => ['design_3'],
                ],
            ]
        );

        $this->end_controls_section();
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'condition' => [
                    'designs' => ['design_2', 'design_3', 'design_4'],
                ],
            ]
        );
    }

    // description_style_controls
    protected function description_style_controls()
    {

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Description', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_2',],
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
                    'designs!' => ['design_2'],
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
                    'designs!' => ['design_2'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'condition' => [
                    'designs!' => ['design_2'],
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
                    'designs' => ['design_2', 'design_3', 'design_4'],
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


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        if (empty($settings['slides'])) {
            return;
        }

?>


    <?php if ($settings['designs'] === 'design_4') :
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'dp-up-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

    ?>

        <!-- skills-area-start -->
        <div class="skills-area pos-rel bdevs-el-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="skills-02-wrapper mb-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                            <div class="section-title pos-rel">
                                <?php if($settings['sub_title']): ?>
                                    <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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

                                <?php if($settings['description']): ?>
                                    <p class="mr-80"><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['button_text'])) : ?>
                                <div class="skills-button mt-40">
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
                    <div class="col-xl-6 col-lg-6">
                        <div class="skills-single-wrapper wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s">
                            <div class="progress-bar-text">
                                <div class="progress-skill">
                                    <?php foreach ($settings['slides'] as $slide) : ?>
                                        <div class="single-skill bdevs-el-skill-wrapper bdevs-el-skill-single elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?> mb-35">

                                            <?php if (!empty($slide['title'])) : ?>
                                                <div class="bar-title">
                                                    <h4 class="bdevs-el-skill-title skill-category">
                                                        <?php echo wp_kses_post($slide['title']); ?>
                                                    </h4>
                                                </div>
                                            <?php endif; ?>

                                            <div class="progress bdevs-el-progress bdevs-el-progress-bar bdevs-el-skill-title-wrap">
                                                <div class="progress-bar bdevs-el-progress-bar Progress Color wow slideInLeft" role="progressbar" style="width: <?php echo esc_html($slide['number']); ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1s" data-wow-delay=".5s">
                                                    <span class="bdevs-el-skill-title-wrap" data-left="<?php echo esc_html($slide['number']); ?>">
                                                        <?php echo wp_kses_post($slide['number']); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- skills-area-end -->

    <?php elseif ($settings['designs'] === 'design_3') :
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'dp-up-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

    ?>

    <!-- our-skills-area-start -->
    <div class="our-skills-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
        <div class="container">
            <div class="row align-items-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="col-xl-6 col-lg-6 order-sm-12 order-lg-1 order-xl-1 order-xxl-1 order-2">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) : ?>
                            <div class="col-sm-6 elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                                <div class="skill__progress-item text-center mb-45 bdevs-el-skill-single bdevs-el-skill-wrapper">
                                    <div class="skill__progress-circle bdevs-el-progress bdevs-el-progress-bar">
                                        <div class="progress-circular bdevs-el-skill-title-wrap bdevs-el-skill-wrapper">
                                            <input type="text" class="knob" value="0" data-rel="<?php echo esc_html($slide['number']); ?>" data-linecap="round" data-width="180" data-height="180" data-bgcolor="<?php echo esc_html( $slide['skill_cirle_color'] ); ?>" data-fgcolor="<?php echo esc_html( $slide['skill_color'] ); ?>" data-thickness=".15" data-readonly="true" disabled/>
                                        </div>
                                    </div>

                                    <?php if (!empty($slide['title'])) : ?>
                                        <div class="our-skills-content">
                                            <h3 class="bdevs-el-skill-title skill-category"><?php echo wp_kses_post($slide['title']); ?></h3>
                                        </div>
                                    <?php endif; ?>
                                                
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 order-sm-12 order-lg-2 order-xl-2 order-xxl-2 order-1">
                    <div class="single-our-skills mb-30">
                        <div class="section-title pos-rel mb-45">
                            <?php if($settings['sub_title']): ?>
                                <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                        <div class="our-skills-text">
                            <?php if($settings['description']): ?>
                                <p><?php echo wp_kses_post($settings['description']); ?></p>
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

    <?php elseif ($settings['designs'] === 'design_2') :
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        if (!$bg_image) {
           $bg_image = $settings['bg_image']['url'];
        }
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'dp-up-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }
    ?>
    <!-- skills-area-start -->
    <div class="skills-area grey-bg pos-rel bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
        <div class="skills-bg-img" data-background="<?php print esc_url($bg_image); ?>"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="skills-wrapper">
                        <div class="section-title pos-rel mb-40">
                            <?php if($settings['sub_title']): ?>
                                <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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

                        <div class="progress-bar-text">
                            <div class="progress-skill">
                            <?php foreach ($settings['slides'] as $slide) : ?>
                                <div class="single-skill bdevs-el-skill-wrapper bdevs-el-skill-single elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?> mb-35">

                                    <?php if (!empty($slide['title'])) : ?>
                                        <div class="bar-title">
                                            <h4 class="bdevs-el-skill-title skill-category">
                                                <?php echo wp_kses_post($slide['title']); ?>
                                            </h4>
                                        </div>
                                    <?php endif; ?>

                                    <div class="progress bdevs-el-progress bdevs-el-progress-bar bdevs-el-skill-title-wrap">
                                        <div class="progress-bar bdevs-el-progress-bar Progress Color wow slideInLeft" role="progressbar" style="width: <?php echo esc_html($slide['number']); ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1s" data-wow-delay=".5s">
                                            <span class="bdevs-el-skill-title-wrap" data-left="<?php echo esc_html($slide['number']); ?>">
                                                <?php echo wp_kses_post($slide['number']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
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
    <!-- skills-area-end -->

    <?php else : ?>
     <div class="tmd__skill">
        <?php foreach ($settings['slides'] as $slide) : ?>
            <div class="bdevs-el-skill-single elementor-repeater-item-<?php echo esc_attr($slide['_id']); ?>">
                <div class="tmd__skill-wrapper">

                    <div class="bdevs-el-skill-title-wrap skill-title">
                        <?php if (!empty($slide['title'])) : ?>
                            <h5 class="bdevs-el-skill-title skill-category">
                                <?php echo wp_kses_post($slide['title']); ?>
                            </h5>
                        <?php endif; ?>

                       <span data-left="<?php echo esc_html($slide['number']); ?>">
                        <?php echo wp_kses_post($slide['number']); ?>
                      </span>
                    </div>
                   <div class="progress bdevs-el-progress">
                      <div class="progress-bar bdevs-el-progress-bar wow slideInLeft" role="progressbar" style="width:<?php echo esc_html($slide['number']); ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                   </div>
                </div>
            </div>
        <?php endforeach; ?>
     </div>
    <?php endif; ?>
<?php
    }
}
