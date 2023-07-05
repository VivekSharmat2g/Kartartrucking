<?php

namespace Bdevs\Elementor;


defined( 'ABSPATH' ) || die();

class AdvancedCasesStudy extends \Generic\Elements\GenericWidget
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
        return 'court-advanced-cases-study';
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
        return __('Advanced Cases Study', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevs-elementoror/advanced-price/';
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
        return 'eicon-tabs gen-icon';
    }

    public function get_keywords()
    {
        return ['tabs', 'section', 'advanced', 'toggle', 'price'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }


    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design',
            [
                'label' => __( 'Presets', 'bdevs-elementor' ),
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

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Type Sub Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
                ]
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
                    'designs' => ['design_1', 'design_2'],
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Subtitle here', 'bdevs-elementor'),
                'placeholder' => __('Subtitle', 'bdevs-elementor'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2'],
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

        // Background Overlay
        $this->start_controls_section(
            '_section_background_overlay',
            [
                'label' => __( 'Background Overlay', 'elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_111'],
                ]
            ]
        );

        $this->start_controls_tabs( 'tabs_background_overlay' );

        $this->start_controls_tab(
            'tab_background_overlay_normal',
            [
                'label' => __( 'Normal', 'elementor' ),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'bdevs-elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .zt-item',
            ]
        );

        $this->add_control(
            'background_overlay_opacity',
            [
                'label' => __( 'Opacity', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => .5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}  .zt-item' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_background_overlay_hover',
            [
                'label' => __( 'Hover', 'elementor' ),
                'condition' => [
                    'design_style' => ['style_111'],
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_hover',
                'label' => __( 'Background', 'bdevs-elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .zt-item:hover::after',
            ]
        );

        $this->add_control(
            'background_hover_overlay_opacity',
            [
                'label' => __( 'Opacity', 'elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => .5,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .zt-item:hover::after' => 'opacity: {{SIZE}};',
                ],
                // 'condition' => [
                //     'background_overlay_background' => [ 'classic', 'gradient' ],
                // ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        // overlay end
        $this->start_controls_section(
            '_section_price_extra',
            [
                'label' => __('Extra', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ]
            ]
        );

        $this->add_control(
            'extra_active',
            [
                'label' => __('Extra (ON/OFF)', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementor'),
                'label_off' => __('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'extra_title',
            [
                'label' => __('Extra Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs Extra Title', 'bdevs-elementor'),
                'placeholder' => __('Type Extra Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_price_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('image', 'bdevs-elementor'),
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


        $this->start_controls_section(
            '_section_price_tabs',
            [
                'label' => __('Cases Tabs', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Tab Title', 'bdevs-elementor'),
                'placeholder' => __('Type Tab Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'active_tab',
            [
                'label' => __('Is Active Tab?', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementor'),
                'label_off' => __('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $repeater->add_control(
            'template',
            [
                'label' => __('Section Template', 'bdevs-elementor'),
                'placeholder' => __('Select a section template for as tab content', 'bdevs-elementor'),
                'description' => sprintf(__('Wondering what is section template or need to create one? Please click %1$shere%2$s ', 'bdevs-elementor'),
                    '<a target="_blank" href="' . esc_url(admin_url('/edit.php?post_type=elementor_library&tabs_group=library&elementor_library_type=section')) . '">',
                    '</a>'
                ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => \Bdevs\Elementor\HelperFunction::get_bdevs_elementor_templates()
            ]
        );

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Tab 1',
                    ],
                    [
                        'title' => 'Tab 2',
                    ]
                ]
            ]
        );

        $this->end_controls_section();


        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'filter_pos',
            [
                'label' => __('Filter Position', 'bdevs-elementor'),
                'label_block' => false,
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'top',
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __('Top', 'bdevs-elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevs-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __('Filter Align', 'bdevs-elementor'),
                'label_block' => false,
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'left',
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
                'condition' => [
                    'filter_pos' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-elementoror-post-tab .bdevs-elementoror-post-tab-filter' => 'text-align: {{VALUE}};',
                ],
                'style_transfer' => true,
            ]
        );


        $this->add_responsive_control(
            'event',
            [
                'label' => __('Tab action', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'click' => __('On Click', 'bdevs-elementor'),
                    'hover' => __('On Hover', 'bdevs-elementor'),
                ],
                'default' => 'click',
                'render_type' => 'template',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls(){

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Title / Content', 'bdevs-elementor' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
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
                'label' => __( 'Title', 'bdevs-elementor' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
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
                'label' => __( 'Text Color', 'bdevs-elementor' ),
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
                'label' => __( 'Subtitle', 'bdevs-elementor' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
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
                'label' => __( 'Text Color', 'bdevs-elementor' ),
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
                'label' => __( 'Description', 'bdevs-elementor' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'bdevs-elementor' ),
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
                'label' => __( 'Text Color', 'bdevs-elementor' ),
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

        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        $settings = $this->get_settings_for_display();
        if (!$settings['tabs'])
            return;


        $event = 'click';
        if ('hover' === $settings['event']) {
            $event = 'hover touchstart';
        }

        $wrapper_class = [
            'price__area pricing-' . $settings['filter_pos'],
        ];
        $this->add_render_attribute('wrapper', 'class', $wrapper_class);
        $this->add_render_attribute('wrapper', 'data-event', $event);
        $this->add_render_attribute('project-filter', 'class', ['nav nav-tabs justify-content-center']);
        $this->add_render_attribute('project-body', 'class', ['tab-content']);
        $i = 1;

       ?>

        <?php if ($settings['designs'] == 'design_3') : ?>

        <!-- project-area-start -->
        <div class="projects-area projects-area-five wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row mt-30">
                    <div class="col-lg-12">
                        <div class="portfolio-menu filter-button-group mb-55">

                            <ul class="nav nav-tabs justify-content-center" id="priceTab" role="tablist">
                                <?php foreach ($settings['tabs'] as $key => $tab):
                                    if ($key == 0) {
                                        $tab['active_tab'] = 'yes';
                                    } else {
                                        $tab['active_tab'] = 'no';
                                    }
                                    if (!empty($tab['template'])):
                                    $tab_title = str_replace(' ', '_', $tab['title']);
                                ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>"
                                    id="nav-<?php echo $tab_title; ?>-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-<?php echo $tab_title; ?>"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-<?php echo $tab_title; ?>"
                                    aria-selected="true">
                                        <?php echo wp_kses_post($tab['title']); ?>
                                    </button>
                                </li>
                                <?php endif; endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="tab-content" id="priceTabContent">
                        <?php foreach ($settings['tabs'] as $key => $tab):
                            if ($key == 0) {
                                $tab['active_tab'] = 'yes';
                            } else {
                                $tab['active_tab'] = 'no';
                            }
                            if (!empty($tab['template'])):
                                $tab_title = str_replace(' ', '_', $tab['title']);
                        ?>
                        <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" id="nav-<?php echo $tab_title; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $tab_title; ?>-tab">
                        <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- project-area-start -->


        <?php elseif ($settings['designs'] == 'design_2') : ?>

        <div class="portfolio-area-three second-portfolio-area fix wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-12">
                        <div class="case-study-header-two">
                        <?php if ($settings['sub_title']) : ?>
                            <div class="section-title-subtitle-three">
                                <p class="gradient-subtitle bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?>
                                <span></span>
                                </p>
                           </div>
                           <?php endif; ?>
                           <div class="section-title-three">
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
                      </div>
                    </div>
                    <div class="col-xl-8 col-12">
                        <div class="case-study-right-tab-area d-flex justify-content-end align-items-center">
                            <div class="case-study-filter-content">
                                <ul class="nav nav-tabs justify-content-center" id="priceTab" role="tablist">
                                    <?php foreach ($settings['tabs'] as $key => $tab):
                                        if ($key == 0) {
                                            $tab['active_tab'] = 'yes';
                                        } else {
                                            $tab['active_tab'] = 'no';
                                        }
                                        if (!empty($tab['template'])):
                                        $tab_title = str_replace(' ', '_', $tab['title']);
                                    ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>"
                                        id="nav-<?php echo $tab_title; ?>-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#nav-<?php echo $tab_title; ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="nav-<?php echo $tab_title; ?>"
                                        aria-selected="true">
                                            <?php echo wp_kses_post($tab['title']); ?>
                                        </button>
                                    </li>
                                    <?php endif; endforeach; ?>
                                </ul>
                            </div>
                            <div class="case-study-nav-gradin">
                               <div class="portfolio-prev-case-study-two-button-prev"><i class="far fa-long-arrow-left"></i></div>
                               <div class="case-study-two-button-next"><i class="far fa-long-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="container-fluid">
                <div class="row">
                    <div class="course-study-two-wrapper third-cas-stydy">
                        <div class="tab-content" id="priceTabContent">
                            <?php foreach ($settings['tabs'] as $key => $tab):
                                if ($key == 0) {
                                    $tab['active_tab'] = 'yes';
                                } else {
                                    $tab['active_tab'] = 'no';
                                }
                                if (!empty($tab['template'])):
                                    $tab_title = str_replace(' ', '_', $tab['title']);
                            ?>
                            <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" id="nav-<?php echo $tab_title; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $tab_title; ?>-tab">
                            <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                            </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php else : ?>

        <div class="course-study-two wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".5s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-12">
                          <?php if ($settings['sub_title']) : ?>
                           <div class="hero-subtitle-two mb-15">
                               <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                           </div>
                        <?php endif; ?>
                        <div class="hero-title-two">
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
                    </div>
                    <div class="col-xl-8 col-12">
                        <div class="case-study-right-tab-area d-flex justify-content-end align-items-center">
                           <div class="case-study-filter-content">
                            <ul class="nav nav-tabs justify-content-center" id="priceTab" role="tablist">
                            <?php foreach ($settings['tabs'] as $key => $tab):
                                if ($key == 0) {
                                    $tab['active_tab'] = 'yes';
                                } else {
                                    $tab['active_tab'] = 'no';
                                }
                                if (!empty($tab['template'])):
                                $tab_title = str_replace(' ', '_', $tab['title']);
                            ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>"
                                id="nav-<?php echo $tab_title; ?>-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#nav-<?php echo $tab_title; ?>"
                                type="button"
                                role="tab"
                                aria-controls="nav-<?php echo $tab_title; ?>"
                                aria-selected="true">
                                    <?php echo wp_kses_post($tab['title']); ?>
                                </button>
                            </li>
                            <?php endif; endforeach; ?>
                         </ul>

                           </div>
                           <div class="case-study-nav-gradin">
                               <div class="case-study-two-button-prev eur-nav-btn"><i class="far fa-long-arrow-left"></i></div>
                               <div class="case-study-two-button-next eur-nav-btn"><i class="far fa-long-arrow-right"></i></div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="course-study-two-wrapper">
                    <div class="tab-content" id="priceTabContent">
                        <?php foreach ($settings['tabs'] as $key => $tab):
                            if ($key == 0) {
                                $tab['active_tab'] = 'yes';
                            } else {
                                $tab['active_tab'] = 'no';
                            }
                            if (!empty($tab['template'])):
                                $tab_title = str_replace(' ', '_', $tab['title']);
                        ?>
                        <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" id="nav-<?php echo $tab_title; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $tab_title; ?>-tab">
                        <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                        </div>
                        <?php endif; endforeach; ?>
                   </div>
                    </div>
                </div>
            </div>
        </div>


        <?php endif; ?>
    <?php

    }
}