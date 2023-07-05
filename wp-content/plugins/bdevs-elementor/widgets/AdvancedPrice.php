<?php

namespace Bdevs\Elementor;


defined( 'ABSPATH' ) || die();

class AdvancedPrice extends \Generic\Elements\GenericWidget {

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
        return 'advanced-price';
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
        return __('Advanced Price', 'bdevs-elementor');
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


    protected function register_content_controls() {
        $this->design_style_content_controls();
        $this->pricing_tab_content_controls();
    }

    // design_style_content_controls
    protected function design_style_content_controls(){

        $this->start_controls_section(
            '_section_design_style',
            [
                'label' => __('Design Style', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevs-elementor'),
                    'style_2' => __('Style 2', 'bdevs-elementor'),
                    'style_3' => __('Style 3', 'bdevs-elementor'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // pricing_tab_content_controls
    protected function pricing_tab_content_controls(){
        $this->start_controls_section(
            '_section_price_tabs',
            [
                'label' => __('Price Tabs', 'bdevs-elementor'),
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

        $repeater->add_control(
            'list_icon',
            [
                'label' => esc_html__( 'Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-meh-rolling-eyes',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{title}}',
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
    }


    // register_style_controls
    protected function register_style_controls(){
        $this->tab_content_style_controls();
        
    }

    // tab_content_style_controls
    protected function tab_content_style_controls(){
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


    // Render function
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        if (!$settings['tabs'])
            return;
        $this->add_render_attribute('project-filter', 'class', ['nav nav-tabs justify-content-center']);
        $this->add_render_attribute('project-body', 'class', ['tab-content']);
        $i = 1;

        ?>

        <?php if ($settings['design_style'] == 'style_3') : ?>


        <!-- quote area start -->
        <div class="order__form-details">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-12">
                     <div class="quote-tab mb-30">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                                id="home-tab-<?php echo $tab_title; ?>" 
                                data-bs-toggle="tab" 
                                data-bs-target="#home-<?php echo $tab_title; ?>-tab" 
                                type="button" 
                                role="tab" 
                                aria-controls="home-<?php echo $tab_title; ?>-tab" 
                                aria-selected="true">
                                    <span class="order__form-button">
                                        <?php if (!empty($tab['list_icon']['value'])) : ?>
                                            <i class="<?php echo esc_attr($tab['list_icon']['value']); ?>"></i>
                                        <?php endif; ?>

                                        <span><?php echo wp_kses_post($tab['title']); ?></span>
                                    </span>
                                </button>
                            </li>
                            <?php endif; endforeach; ?>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xxl-9 col-xl-8 col-lg-12">
                     <div class="quote-features mb-30">
                        <div class="tab-content">
                            <?php foreach ($settings['tabs'] as $key => $tab):
                                if ($key == 0) {
                                    $tab['active_tab'] = 'yes';
                                } else {
                                    $tab['active_tab'] = 'no';
                                }
                                if (!empty($tab['template'])):
                                    $tab_title = str_replace(' ', '_', $tab['title']);
                            ?>
                            <div class="tab-pane <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" 
                            id="home-<?php echo $tab_title; ?>-tab" 
                            role="tabpanel" 
                            aria-labelledby="home-tab-<?php echo $tab_title; ?>">
                                <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                            </div>
                            <?php endif; endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        <!-- quote area end -->


        <?php elseif ($settings['design_style'] == 'style_2') : ?>

        <!-- laction area start  -->
        <section class="location-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="country-tab mb-40">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php foreach ($settings['tabs'] as $key => $tab):
                                        if ($key == 0) {
                                            $tab['active_tab'] = 'yes';
                                        } else {
                                            $tab['active_tab'] = 'no';
                                        }
                                        if (!empty($tab['template'])):
                                        $tab_title = str_replace(' ', '_', $tab['title']);
                                        ?>
                                        <button class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>" id="monthly-tab-<?php echo $tab_title; ?>" data-bs-toggle="tab" data-bs-target="#monthly-<?php echo $tab_title; ?>-tab" type="button" role="tab" aria-controls="monthly-<?php echo $tab_title; ?>-tab" aria-selected="true"><?php echo wp_kses_post($tab['title']); ?></button>
                                    <?php endif; endforeach; ?>
                                </div>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <?php foreach ($settings['tabs'] as $key => $tab):
                                if ($key == 0) {
                                    $tab['active_tab'] = 'yes';
                                } else {
                                    $tab['active_tab'] = 'no';
                                }
                                if (!empty($tab['template'])):
                                    $tab_title = str_replace(' ', '_', $tab['title']);
                            ?>
                            <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" id="monthly-<?php echo $tab_title; ?>-tab" role="tabpanel" aria-labelledby="monthly-tab-<?php echo $tab_title; ?>">
                            <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                            </div>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- laction area end  -->

        <?php else : ?>

            <!-- Pricing Table Start Here  -->
            <?php if (!empty($settings['tabs'])) :?>
            <section class="pricing__area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-7">
                        <div class="pricing-tab mb-60">
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
                                    <button class="nav-link <?php echo ($tab['active_tab'] == 'yes') ? 'active' : ''; ?>" id="monthly-tab-<?php echo $tab_title; ?>" 
                                    data-bs-toggle="tab"
                                    data-bs-target="#monthly-<?php echo $tab_title; ?>-tab" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="monthly-<?php echo $tab_title; ?>-tab"
                                    aria-selected="true"><?php echo wp_kses_post($tab['title']); ?></button>
                                </li>
                                <?php endif; endforeach; ?>
                            </ul>
                        </div>
                     </div>
                  </div>
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
                     <div class="tab-pane fade <?php echo ($tab['active_tab'] == 'yes') ? 'show active' : ''; ?>" 
                     id="monthly-<?php echo $tab_title; ?>-tab" role="tabpanel" 
                     aria-labelledby="monthly-tab-<?php echo $tab_title; ?>">
                        <?php echo \Elementor\plugin::instance()->frontend->get_builder_content($tab['template'], true); ?>
                     </div>
                     <?php endif; endforeach; ?>
                  </div>
               </div>
            </section>
            <?php endif; ?>
            <!-- Pricing Table End Here  --> 
        <?php endif; ?>
    <?php
    }
}