<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class Brand extends \Generic\Elements\GenericWidget
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
        return 'cust-brand';
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
        return __('Brand', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/brand/';
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
        return 'eicon-photo-library gen-icon';
    }

    public function get_keywords()
    {
        return ['brand', 'image', 'counter'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    protected function register_content_controls()
    {
        $this->design_style();
        $this->title_and_desc();
        $this->brand_slides();
        $this->brand_images();
        $this->brand_settings();
    }

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
                    // 'design_2' => __('Design 2', 'bdevs-elementor'),
                    'design_3' => __('Design 3', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    public function title_and_desc()
    {

        // Title & Description
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_2', 'design_3'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Brand Title', 'bdevs-elementor'),
                'placeholder' => __('Enter Brand Title Here', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
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
                'default' => 'h1',
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
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    public function brand_slides()
    {

        // Brand Item
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Brand Item', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

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
            'image2',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Image 02', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_10'],
                ],
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
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Brand Item', 'bdevs-elementor'),
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

    public function brand_images()
    {
        // image
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __('Image', 'bdevselementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );
        $this->add_control(
            'brand_bg',
            [
                'label' => __('Brand BG Image', 'bdevselementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
                'name' => 'bg_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();
    }


    public function brand_settings()
    {
        // Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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

    protected function register_style_controls()
    {

        $this->title_style_controls();
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


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // ================
        $show_navigation   =   $settings["ts_slider_nav_show"] == "yes" ? true : false;
        $auto_nav_slide    =   $settings['ts_slider_autoplay'];
        $dot_nav_show      =   $settings['ts_slider_dot_nav_show'];
        $ts_slider_speed   =   $settings['ts_slider_speed'] ? $settings['ts_slider_speed'] : '5000';

        $slide_controls    = [
            'show_nav' => $show_navigation,
            'dot_nav_show' => $dot_nav_show,
            'auto_nav_slide' => $auto_nav_slide,
            'ts_slider_speed' => $ts_slider_speed,
        ];

        $slide_controls = \json_encode($slide_controls);
        // ================


        // bg_image
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['bg_thumbnail_size']);
            if (!$bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }
        }

        $title = wp_kses_post($settings['title'] ?? '');

        if (empty($settings['slides'])) {
            return;
        }
?>

        <?php if ($settings['designs'] === 'design_3') : ?>


            <!-- Brand Area Start Here  -->
            <div class="brand__3 pt-70 pb-70">
                <div class="container">
                    <div class="swiper-container brand-3-active wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".6s">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php
                            foreach ($settings['slides'] as $slide) :
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                if (!$image) {
                                    $image = $slide['image']['url'];
                                }
                            ?>
                                <div class="swiper-slide">
                                    <div class="brand__3-items">
                                        <a href="<?php echo esc_url($slide['slide_url']); ?>"><img src="<?php print esc_url($image); ?>" alt="Brand"></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brand Area End Here  -->

        <?php elseif ($settings['designs'] === 'design_2') : ?>

            <!-- brand area start -->
            <div class="brand-area lv-brand-negative-space-2">
                <div class="container">
                    <div class="row mb-15">
                        <div class="col-xxl-12">
                            <div class="text-center">
                                <div class="d-inline-block p-rel fix">
                                    <div class="lv-brand-title-sudo-lines-2 d-none d-lg-block">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>

                                    <?php if ($settings['title']) : ?>
                                        <h3 class="lv-brand-title-2 text-center fix">
                                            <?php echo wp_kses_post($settings['title']); ?>
                                        </h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-100 justify-content-center">
                        <div class="col-xxl-10">
                            <div class="row">
                                <?php
                                foreach ($settings['slides'] as $slide) :
                                    $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                    if (!$image) {
                                        $image = $slide['image']['url'];
                                    }
                                ?>
                                    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                                        <div class="lv-brand-flex-single">
                                            <img src="<?php print esc_url($image); ?>" alt="img">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand area end -->

        <?php else : ?>


            <!-- Brand Area Start Here  -->
            <section class="brand white-bg bdevs-el-content two border-tb wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                <div class="container-fluid p-0">
                    <div class="swiper-container brand-active-2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper text-center">
                            <!-- Slides -->
                            <?php
                            foreach ($settings['slides'] as $slide) :
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                if (!$image) {
                                    $image = $slide['image']['url'];
                                }
                            ?>
                                <div class="swiper-slide">
                                    <div class="brand-items-2">
                                        <a href="<?php echo esc_url($slide['slide_url']); ?>"><img src="<?php print esc_url($image); ?>" alt="i"></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Brand Area End Here  -->


            <!-- brand area start -->
            <div class="brand-area d-none">
                <div class="container">
                    <div class="lv-brand-flex-wrap">
                        <?php
                        foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (!$image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="lv-brand-flex-single">
                                <img src="<?php print esc_url($image); ?>" alt="img">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- brand area end -->


        <?php endif; ?>

<?php
    }
}
