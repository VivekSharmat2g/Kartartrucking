<?php
namespace Bdevs\Elementor;

defined( 'ABSPATH' ) || die();

class CallToAction extends \Generic\Elements\GenericWidget
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
    public function get_name() {
        return 'cust-cta';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'CallToAction', 'bdevs-elementor' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/widgets/gradient-heading/';
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
    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_keywords() {
        return [ 'gradient', 'advanced', 'heading', 'title', 'colorful' ];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

     public function get_tp_contact_form()
    {
        if (!class_exists('WPCF7')) {
            return;
        }
        $tp_cfa         = array();
        $tp_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
        $tp_forms       = get_posts($tp_cf_args);
        $tp_cfa         = ['0' => esc_html__('Select Form', 'bdevs-elementor')];
        if ($tp_forms) {
            foreach ($tp_forms as $tp_form) {
                $tp_cfa[$tp_form->ID] = $tp_form->post_title;
            }
        } else {
            $tp_cfa[esc_html__('No contact form found', 'bdevs-elementor')] = 0;
        }
        return $tp_cfa;
    }


    // Register Content Controls
    protected function register_content_controls()
    {
        $this->design_style();
        $this->title_and_desc();
        $this->cta_images_control();
        $this->contact_list();
        $this->button();
        $this->contact_form07();
    }

    // Design Style Content Control
    public function design_style()
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

    // Title and Description Content Control
    public function title_and_desc()
    {
        //desc
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Desccription', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Sub Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_2', 'design_4', 'design_5'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'CTA Title',
                'placeholder' => __( 'Heading Text', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __('Description', 'bdevs-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Hero description goes here', 'bdevs-elementor'),
                'placeholder' => __('Enter Hero description', 'bdevs-elementor'),
                'rows'        => 5,
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_4'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'bdevs-elementor' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'align',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__( 'Alignment', 'bdevs-elementor' ),
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'text-align: {{VALUE}};'
                ]
            ]
        );
        $this->end_controls_section();
    }

    // cta_images_content_control
    public function cta_images_control(){
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'bdevselementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_3'],
                ],
            ]
        );
        $this->add_control(
            'cta_bg',
            [
                'label' => __( 'CTA BG', 'bdevselementor' ),
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

    // Contact List Content Controls
    public function contact_list()
    {
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Contact List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_3'],
                ],
            ]
        );
        $this->add_control(
            'contact_title',
            [
                'label' => __( 'Contact Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'call us on',
                'placeholder' => __( 'Heading Text', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
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
                        'icon' => 'eicon-nerd-wink',
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
                ],
                'condition' => [
                    'type' => 'image'
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'type' => ['icon'],
                ],
            ]
        );

        $this->add_control(
            'contact_phone',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'title_field' => '<# print(contact_phone || "Carousel Item"); #>',
                'label' => __('Phone', 'bdevs-elementor'),
                'default' => __('899 000 999 88', 'bdevs-elementor'),
                'placeholder' => __('Type content phone', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Button Content Control
    public function button()
    {
        // Button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1', 'design_2' , 'design_4', 'design_5'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __('Text', 'bdevs-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->end_controls_section();
    }

    // Contact Form Controls
    public function contact_form07() {
        $this->start_controls_section(
            'tpcore_contact',
            [
                'label' => esc_html__('Contact Form', 'bdevs-elementor'),
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'tpcore_select_contact_form',
            [
                'label'   => esc_html__('Select Form', 'bdevs-elementor'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_tp_contact_form(),
            ]
        );

        $this->end_controls_section();
    }


    // Register Style Controls
    protected function register_style_controls(){
        $this->title_style_controls();
        $this->button_style_controls();

    }

    // Title and Description Style Controls
    protected function title_style_controls() {

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

    // Button Style Controls
    protected function button_style_controls() {
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
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}} !important;',
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
    protected function render() {
            $settings = $this->get_settings_for_display();
        ?>

        <?php if ($settings['designs'] === 'design_5'):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'title white bdevs-el-title' );

            $this->add_render_attribute('button', 'class', 'dp-up-btn white-btn bdevs-el-btn');
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

        ?>

        <!-- Contact Cta Area Start Here  -->
        <section class="contact__cta bg-css overlay-red bdevs-el-content" data-wow-delay=".3s">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="contact__cta-text text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                        <div class="section__title mb-50">

                            <?php if ($settings['subtitle']): ?>
                                <span class="sub-title white bdevs-el-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></span>
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
                        <div class="contact__cat-btn">
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
                </div>
            </div>
        </section>
        <!-- Contact Cta Area End Here  -->




        <?php elseif ($settings['designs'] === 'design_4'):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'bdevs-el-title' );

            $this->add_render_attribute('button', 'class', 'dp-up-btn white-btn bdevs-el-btn');
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

        ?>
        <!-- cta-area-start -->
        <div class="cta-area bdevs-el-content">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="col-xl-12 col-lg-12 col-sm-12">
                        <div class="cta-wrapper text-center">
                            <div class="cta-text">
                                <?php if ($settings['subtitle']): ?>
                                    <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></span>
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
                                <?php if ($settings ['description']): ?>
                                    <p><?php echo wp_kses_post($settings['description']); ?></p>
                                <?php endif; ?>

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
                </div>
            </div>
        </div>
        <!-- cta-area-end -->

        <?php elseif ($settings['designs'] === 'design_3'):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'bdevs-el-title' );

            if ( !empty($settings['cta_bg']['id']) ) {
                $cta_bg = wp_get_attachment_image_url( $settings['cta_bg']['id'], $settings['bg_thumbnail_size'] );
            }
        ?>

        <!-- Services Cta Area Start Here  -->
        <section class="services__cta">
            <div class="container-fluid container-lg">
                <div class="services__cta-box p-relative services__cta-overlay" data-background="<?php echo esc_url($cta_bg); ?>">
                    <div class="services__cta-wrapper">
                        <div class="services__cta-item t-right mb-15">
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
                        <div class="services__cta-item text-center mb-15">
                            <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                                $this->get_render_attribute_string('image');
                                $settings['hover_animation'] = 'disable-animation';
                            ?>
                                <figure>
                                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                                </figure>
                            <?php elseif (!empty($settings['icon']) || !empty($settings['selected_icon']['value'])) : ?>
                                <figure>
                                    <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                                </figure>
                            <?php endif; ?>
                        </div>
                        <div class="services__cta-item mb-15">
                            <?php if ($settings['contact_title']) : ?>
                                <h3 class="bdevs-el-title"><?php echo wp_kses_post($settings['contact_title']); ?>
                                    <?php if (!empty($settings['contact_phone'])) : ?>
                                        <a href="tel:<?php echo esc_attr($settings['contact_phone']); ?>"><?php echo wp_kses_post($settings['contact_phone']); ?></a>
                                    <?php endif; ?>
                                </h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Cta Area End Here  -->

        <?php elseif ($settings['designs'] === 'design_2'):

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'title white bdevs-el-title' );
            $this->add_render_attribute('button', 'class', 'fill-btn clip-btn lv-theme-btn bdevs-el-btn');

            if ( !empty($settings['cta_bg']['id']) ) {
                $cta_bg = wp_get_attachment_image_url( $settings['cta_bg']['id'], $settings['bg_thumbnail_size'] );
            }

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'edu-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }
        ?>

        <!-- Contact Cta Area Start Here  -->
        <section class="contact__cta pt-120 pb-120 bg-css overlay overlay-red"
         data-wow-delay=".3s" data-background="<?php echo esc_url($cta_bg); ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="contact__cta-text text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="section__title mb-50">
                                <?php if ($settings['subtitle']): ?>
                                    <span class="sub-title white bdevs-el-subtitle"><?php echo wp_kses_post($settings['subtitle']); ?></span>
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
                            <div class="contact__cat-btn">
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
            </div>
        </section>
      <!-- Contact Cta Area End Here  -->

        <?php else:

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'class', 'bdevs-el-title' );

            $this->add_render_attribute('button', 'class', 'skew-btn bdevs-el-btn');
            if ( !empty( $settings['button_link'] ) ) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            if ( !empty($settings['cta_bg']['id']) ) {
                $cta_bg = wp_get_attachment_image_url( $settings['cta_bg']['id'], $settings['bg_thumbnail_size'] );
            }
        ?>

            <!-- CTA Area Start  -->
            <section class="help__cta overlay bg-css overlay-red pt-50 pb-20" data-background="<?php echo esc_url($cta_bg); ?>">
                <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="help__cta-title mb-30">
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

                        <?php if(!empty($settings['button_text'])) : ?>
                            <div class="col-md-4">
                                <div class="help__cta-btn text-lg-end mb-30">
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
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <!-- CTA Area end  -->
            <?php endif; ?>
        <?php
    }
}
