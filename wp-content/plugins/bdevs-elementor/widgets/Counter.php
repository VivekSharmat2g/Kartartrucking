<?php

namespace Bdevs\Elementor;


defined('ABSPATH') || die();

class Counter extends \Generic\Elements\GenericWidget
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
        return 'cust-counter';
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
        return __('Counter', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/counter/';
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
        return 'eicon-counter';
    }

    public function get_keywords()
    {
        return ['fact', 'image', 'counter'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // register_content_controls
    protected function register_content_controls()
    {
        $this->design_style();
        $this->title_and_desc();
        $this->counter_slides();
        $this->counter_images();
    }

    // Desing Style Content Controls
    public function design_style()
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
                    'design_5' => __('Design 5', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // Title and Descriptions Content Controls
    public function title_and_desc()
    {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Back Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs Info Box Back Title', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Back Title', 'bdevs-elementor'),
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

    // Counter Slides Content Controls
    public function counter_slides()
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
                    'style_2' => __('Style 2', 'bdevs-elementor'),
                    'style_3' => __('Style 3', 'bdevs-elementor'),
                    'style_4' => __('Style 4', 'bdevs-elementor'),
                    'style_5' => __('Style 5', 'bdevs-elementor'),
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
            'number',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Fact Number', 'bdevs-elementor'),
                'default' => __('70', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Sub Title', 'bdevs-elementor'),
                'default' => __('counter sub title here', 'bdevs-elementor'),
                'placeholder' => __('Type sub title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],

            ]
        );

        $repeater->add_control(
            'icon_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('URL', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'label' => __('Description', 'bdevs-elementor'),
                'placeholder' => __('Type description here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_10'],
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(subtitle || "Carousel Item"); #>',
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

    // Counter Images Controls
    public function counter_images(){
        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'counter_bg',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Counter BG', 'bdevs-elementor'),
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
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();
    }



    // register_style_controls
    protected function register_style_controls()
    {
        $this->title_style_controls();
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


        // counter icon
        $this->add_control(
            '_counter_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Counter Icon', 'bdevs-elementor'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'counter_icon_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-counter-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'counter_icon_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-counter-icon, .dp-funfact-wrapper .dp-funfact-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'counter-icon',
                'selector' => '{{WRAPPER}} .bdevs-el-counter-icon',
            ]
        );


        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Number', 'bdevs-elementor'),
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


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title_2', 'class', '');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');


        if (empty($settings['slides'])) {
            return;
        }
?>

        <?php if ($settings['designs'] === 'design_1') :

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            }

        ?>

        <!-- Funfact area start  -->
        <section class="dp-funfact-area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="dp-funfactor-grid">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                    ?>
                        <div class="dp-funfact-wrapper bdevs-el-content mb-30">
                            <div class="dp-funfact-icon bdevs-el-counter-icon">
                                <?php if (!empty($slide['selected_icon'])) : ?>
                                    <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                <?php endif; ?>
                            </div>
                            <div class="dp-funfact-content">
                                <?php if (!empty($slide['number'])) : ?>
                                    <h3 class="counter bdevs-el-title"><?php echo wp_kses_post($slide['number']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($slide['subtitle'])) : ?>
                                    <p class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['subtitle']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Funfact area end  -->

        <?php elseif ($settings['designs'] === 'design_2') :

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            }
        ?>

        <!-- Funfact area 2 start  -->
        <section class="dp-funfact-area dp-funfact-area-02 p-relative">
            <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                    ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="dp-funfact-wrapper dp-funfact-wrapper-02 mb-30">
                                <div class="dp-funfact-icon">

                                    <?php if (!empty($slide['selected_icon'])) : ?>
                                        <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>

                                </div>
                                <div class="dp-funfact-content">
                                    <?php if (!empty($slide['number'])) : ?>
                                        <h3 class="counter bdevs-el-title"><?php echo wp_kses_post($slide['number']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <p class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['subtitle']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Funfact area 2 end  -->

        <?php elseif ($settings['designs'] === 'design_3') :
            if (!empty($settings['counter_bg']['id'])) {
                $counter_bg = wp_get_attachment_image_url($settings['counter_bg']['id'], $settings['thumbnail_size']);
            }
        ?>

        <!-- Funfact area 3 start  -->
        <section class="dp-funfact-area dp-funfact-area-03 grey-bg p-relative pt-120 pb-90" data-background="<?php echo esc_url($counter_bg); ?>">
            <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                    ?>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="dp-funfact-wrapper dp-funfact-wrapper-03 mb-30">
                                <div class="dp-funfact-icon">
                                    <?php if (!empty($slide['selected_icon'])) : ?>
                                        <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                                <div class="dp-funfact-content">
                                    <?php if (!empty($slide['number'])) : ?>
                                        <h3 class="counter counter bdevs-el-title"><?php echo wp_kses_post($slide['number']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <p class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['subtitle']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Funfact area 3 end  -->

        <?php elseif ($settings['designs'] === 'design_4') : ?>                               

        <!-- counter-area-start -->
        <div class="counter-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="counter-wrapper mb-30">
                                <div class="counter-icon bdevs-el-counter-icon">
                                    <?php if (!empty($slide['selected_icon'])) : ?>
                                        <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                                <div class="counter-text">
                                    <?php if($slide['number']): ?>
                                        <h1 class="counter bdevs-el-title"><?php echo wp_kses_post($slide['number']); ?></h1>
                                    <?php endif; ?>

                                    <?php if($slide['subtitle']): ?>
                                        <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['subtitle']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- counter-area-end -->


        <?php elseif ($settings['designs'] === 'design_5') : ?> 
            
        <!-- counter-area-start -->
        <div class="counter-area counter-area-six counter-padding bdevs-el-content">
            <div class="container">
                <div class="row justify-content-between">
                    <?php foreach ($settings['slides'] as $key => $slide) :
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url($slide['image']['id'], 'full');
                        }
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="counter-wrapper counter-wrapper-six mb-90">
                                <div class="counter-icon">
                                    <?php if (!empty($slide['selected_icon'])) : ?>
                                        <?php bdevs_elementor_render_icon($slide, 'icon', 'selected_icon', ['class' => 'bdevs-btn-icon']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                                <div class="counter-text">

                                    <?php if($slide['number']): ?>
                                        <h1 class="counter bdevs-el-title"><?php echo wp_kses_post($slide['number']); ?></h1>
                                    <?php endif; ?>

                                    <?php if($slide['subtitle']): ?>
                                        <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['subtitle']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- counter-area-end -->

        <?php endif; ?>
<?php
    }
}
