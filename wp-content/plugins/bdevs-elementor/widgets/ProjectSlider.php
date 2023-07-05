<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class ProjectSlider extends \Generic\Elements\GenericWidget
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
        return 'cust-project-slider';
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
        return __('Project Slider', 'bdevs-elementoror');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/project-slider/';
    }

    public function get_script_depends()
    {
        return ['bootstrap', 'genwow', 'swiper', 'bdevs-elementoror-js'];
    }
    public function get_style_depends()
    {
        return ['bootstrap', 'fontawesome', 'swiper', 'bdevs-elementoror-flaticon', 'bdevs-elementoror-css'];
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
        return 'eicon-gallery-grid';
    }

    public function get_keywords()
    {
        return ['slider', 'image', 'gallery', 'project'];
    }

    public function get_categories()
    {
        return ['bdevs-elementoror'];
    }

    // register_content_controls
    protected function register_content_controls()
    {
        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevs-elementoror'),
                    'style_2' => __('Style 2', 'bdevs-elementoror'),
                    //'style_3' => __('Style 3', 'bdevs-elementoror'),
                    //'style_4' => __('Style 4', 'bdevs-elementoror'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        // Title & Description
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1', 'style_2', 'style_40'],
                ],

            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Description Text', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_20'],
                ],
            ]
        );

        $this->add_control(
            'back_title',
            [
                'label' => __('Back Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'back Sub Title',
                'placeholder' => __('back Sub Text', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __('H2', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __('H3', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __('H4', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __('H5', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __('H6', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'align',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'bdevs-elementor'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'bdevs-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Project Slider List
        $this->start_controls_section(
            '_section_project_list',
            [
                'label' => __('Project Slider List', 'bdevs-elementor'),
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
                    //'style_3' => __('Style 3', 'bdevs-elementor'),
                    //'style_4' => __('Style 4', 'bdevs-elementor'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'project_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Project Image', 'bdevs-elementoror'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
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
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Button text', 'bdevs-elementor'),
                'default' => __('Button text', 'bdevs-elementor'),
                'placeholder' => __('Type Button text here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_50'],
                ],
            ]
        );

        $repeater->add_control(
            'button_url',
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
                    'field_condition' => ['style_50'],
                ],
            ]
        );

        $repeater->add_control(
            'title_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Type title url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_30'],
                ],
            ]
        );
        $repeater->add_control(
            'image_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Image URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('Type title url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2', 'style_30'],
                ],
            ]
        );

        $repeater->add_control(
            'slider_sub_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sub Title', 'bdevs-elementor'),
                'default' => __('Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Type sub title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'slider_description',
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
                    'field_condition' => ['style_20'],
                ],
            ]
        );

        $repeater->add_control(
            'slider_button_text',
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
                    'field_condition' => ['style_20'],
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
                ],
            ]
        );

        $this->end_controls_section();

        // Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __('Animation Speed', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __('Slide speed in milliseconds', 'bdevs-elementoror'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay?', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementoror'),
                'label_off' => __('No', 'bdevs-elementoror'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __('Autoplay speed in milliseconds', 'bdevs-elementoror'),
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __('Infinite Loop?', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementoror'),
                'label_off' => __('No', 'bdevs-elementoror'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical Mode?', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementoror'),
                'label_off' => __('No', 'bdevs-elementoror'),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __('Navigation', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'bdevs-elementoror'),
                    'arrow' => __('Arrow', 'bdevs-elementoror'),
                    'dots' => __('Dots', 'bdevs-elementoror'),
                    'both' => __('Arrow & Dots', 'bdevs-elementoror'),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls() {
        $this->slider_content_style_controls();
    }

    // slider_content_style_controls
    protected function slider_content_style_controls(){
        $this->start_controls_section(
            '_section_slder_content_style_content',
            [
                'label' => __('Slide Content Style', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slide_content_padding',
            [
                'label' => __('Content Padding', 'bdevs-elementoror'),
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
                'name' => 'slider_content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image',
                ],
            ]
        );


        // Title
        $this->add_control(
            '_slide_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Title', 'bdevs-elementoror'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'slider_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slider-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'slider_title_color',
            [
                'label' => __('Title Color', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slider-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'slider_title_hover_color',
            [
                'label' => __('Title Hover Color', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slider-title:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider-title',
                'selector' => '{{WRAPPER}} .bdevs-el-slider-title',
            ]
        );

        // Subtitle
        $this->add_control(
            '_slider_heading_subtitle',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Subtitle', 'bdevs-elementoror'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'slider_subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slider-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'slider_subtitle_color',
            [
                'label' => __('Text Color', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-slider-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider-subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-slider-subtitle',
            ]
        );


        // Slider Icon
        $this->add_control(
            '_content_slide_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Icon Controls', 'bdevs-elementoror'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'slider_iocn_color',
            [
                'label' => __('Icon Color', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-gallery-link a, .dp-gallery-view-03 .dp-gallery-plus-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'slider_iocn_hover_color',
            [
                'label' => __('Icon Hover Color', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dp-gallery-link a:hover, .dp-gallery-view-03 .dp-gallery-plus-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'slider_icon_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'slider_icon_hover_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
            ]
        );

        $this->end_controls_section();
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (empty($settings['slides'])) {
            return;
        }
    ?>
        <?php if ($settings['design_style'] === 'style_4') :

            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

            <div class="portfolio-area-three third-portfolio-area fix wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
                <div class="container-fluid">
                    <div class="row">
                        <div class="portfolio-slider-active swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($settings['slides'] as $key => $slide) :
                                    if (!empty($slide['project_image']['id'])) {
                                        $project_image = wp_get_attachment_image_url($slide['project_image']['id'], 'full');
                                    }
                                ?>
                                    <div class="portfolio-item-three swiper-slide">
                                        <div class="portfolio-item-three-thumb">
                                            <?php if (!empty($project_image)) : ?>
                                                <img src="<?php print esc_url($slide['project_image']['url']); ?>" alt="img">
                                            <?php endif; ?>
                                            <div class="portfolio-item-three-content d-flex align-items-center">
                                                <div class="portfolio-item-three-title-content">
                                                    <?php if (!empty($slide['slider_sub_title'])) : ?>
                                                        <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['slider_sub_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($slide['title'])) : ?>
                                                        <h3><a href="<?php echo esc_url($slide['title_url']); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="portfolio-item-three-icon icon-left-padding">
                                                    <a href="<?php echo esc_url($slide['title_url']); ?>"><i class="far fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="portfolio__pagination text-center"></div>
                        </div>
                        <!-- If we need pagination -->
                    </div>
                </div>
            </div>

        <?php elseif ($settings['design_style'] === 'style_3') :

            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'bd-big__title-4 s-2 mb-15 bdevs-el-title');
        ?>

            <div class="service-slider-three fix wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
                <div class="container-fluid">
                    <div class="service-slider-wrapper-three">
                        <div class="service-slider-active service_slider_active swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($settings['slides'] as $key => $slide) :
                                    if (!empty($slide['project_image']['id'])) {
                                        $project_image = wp_get_attachment_image_url($slide['project_image']['id'], 'full');
                                    }
                                ?>
                                    <div class="service-slider-item-three swiper-slide">
                                        <?php if (!empty($project_image)) : ?>
                                            <div class="service-slider-item-three-thumb">
                                                <img src="<?php print esc_url($slide['project_image']['url']); ?>" alt="img">
                                            </div>
                                        <?php endif; ?>
                                        <div class="service-slider-item-three-title bdevs-el-content">
                                            <?php if (!empty($slide['title'])) : ?>
                                                <h3 class="bdevs-el-title"><a href="<?php echo esc_url($slide['title_url']); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['slider_description'])) : ?>
                                                <p><?php echo wp_kses_post($slide['slider_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['design_style'] === 'style_2') :

            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        ?>

            <!-- Gallery Section Start  -->
            <section class="dp-gallery-area-03 wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-12">
                            <div class="section__title gallery-section-title mb-55 text-center">
                                <?php if (!empty($settings['sub_title'])) : ?>
                                    <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                        </div>
                    </div>
                </div>
                <div class="dp-gallery-slider-03 p-relative">
                    <div class="dp-gallery-active-03 swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($settings['slides'] as $key => $slide) :
                                if (!empty($slide['project_image']['id'])) {
                                    $project_image = wp_get_attachment_image_url($slide['project_image']['id'], 'full');
                                }
                            ?>
                                <div class="dp-single-gallery-03 swiper-slide">
                                    <?php if (!empty($project_image)) : ?>
                                        <div class="dp-single-gallery-thumb-03" data-background="<?php print esc_url($slide['project_image']['url']); ?>"></div>
                                    <?php endif; ?>
                                    <div class="dp-gallery-content-03">
                                        <?php if (!empty($slide['title'])) : ?>
                                            <h3 class="dp-gallery-title-03 bdevs-el-slider-title">
                                                <a href="<?php echo esc_url($slide['title_url']); ?>">
                                                    <?php echo wp_kses_post($slide['title']); ?>
                                                </a>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if (!empty($slide['slider_sub_title'])) : ?>
                                            <div class="dp-gallery-tag-03">
                                                <span class="bdevs-el-slider-subtitle"><?php echo wp_kses_post($slide['slider_sub_title']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="dp-gallery-view-03">
                                        <a href="<?php echo esc_url($slide['image_url']); ?>" class="dp-gallery-plus-btn popup-image">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="dp-gallery-nav-03 d-none d-md-block">
                        <button type="button" class="dp-gallery-button-prev-03"><i class="far fa-arrow-left"></i></button>
                        <button type="button" class="dp-gallery-button-next-03"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </section>
            <!-- Gallery Section End  -->


        <?php else :

            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        ?>

            <!-- Gallery Section Start  -->
            <section class="dp-gallery-area">
                <div class="container">
                    <div class="row align-items-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                        <div class="col-xl-7 col-lg-8 col-12">
                            <div class="section__title gallery-section-title mb-55">
                                <?php if (!empty($settings['sub_title'])) : ?>
                                    <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                        </div>
                        <div class="col-xl-5 col-lg-4 col-12">
                            <div class="services-two-nav dp-gallery-nav text-end">
                                <div class="services-button-prev"><i class="fas fa-long-arrow-left"></i></div>
                                <div class="services-button-next"><i class="fas fa-long-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dp-gallery-active swiper-container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($settings['slides'] as $key => $slide) :
                            if (!empty($slide['project_image']['id'])) {
                                $project_image = wp_get_attachment_image_url($slide['project_image']['id'], 'full');
                            }
                        ?>
                            <div class="swiper-slide">
                                <div class="dp-single-gallery">
                                    <?php if (!empty($project_image)) : ?>
                                        <div class="dp-gallery-thumb">
                                            <img class="img-fluid" src="<?php print esc_url($slide['project_image']['url']); ?>" alt="gallery-image">
                                        </div>
                                    <?php endif; ?>
                                    <div class="dp-gallery-content bdevs-el-content">
                                        <div class="dp-gallery-content-text">
                                            <?php if (!empty($slide['title'])) : ?>
                                                <h4 class="dp-gallery-title bdevs-el-slider-title">
                                                    <a href="<?php echo esc_url($slide['title_url']); ?>"><?php echo wp_kses_post($slide['title']); ?></a>
                                                </h4>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['slider_sub_title'])) : ?>
                                                <span class="bdevs-el-slider-subtitle"><?php echo wp_kses_post($slide['slider_sub_title']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="dp-gallery-link">
                                            <a href="<?php echo esc_url($slide['title_url']); ?>"><i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- Gallery Section End  -->

        <?php endif; ?>
<?php
    }
}
