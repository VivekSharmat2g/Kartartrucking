<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class HeaderContact extends \Generic\Elements\GenericWidget
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
        return 'const-header-contact';
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
        return __('Header Contact', 'bdevs-elementoror');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/header-contact/';
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
        return ['header', 'blurb', 'infobox', 'contact', 'block', 'box'];
    }

    public function get_categories()
    {
        return ['bdevs-elementoror'];
    }




    public function get_tp_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $tp_cfa         = array();
        $tp_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $tp_forms       = get_posts( $tp_cf_args );
        $tp_cfa         = ['0' => esc_html__( 'Select Form', 'bdevs-elementoror' ) ];
        if( $tp_forms ){
            foreach ( $tp_forms as $tp_form ){
                $tp_cfa[$tp_form->ID] = $tp_form->post_title;
            }
        }else{
            $tp_cfa[ esc_html__( 'No contact form found', 'bdevs-elementoror' ) ] = 0;
        }
        return $tp_cfa;
    }


    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Presets', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'Designs',
            [
                'label' => __('Designs', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'design_1' => __('Design 1', 'bdevs-elementoror'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'bdevs-elementoror_contact',
            [
                'label' => esc_html__('Contact Form', 'bdevs-elementoror'),
                'condition' => [
                    'designs' => ['design_6'],
                ],
            ]
        );

        $this->add_control(
            'bdevs-elementoror_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'bdevs-elementoror' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_tp_contact_form(),
            ]
        );

        $this->end_controls_section();

        // title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementoror'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_10'],
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevs-elementoror'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_5'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title', 'bdevs-elementoror'),
                'placeholder' => __('Type Info Box Title', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'info_title',
            [
                'label' => __('Info Title', 'bdevs-elementoror'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Title', 'bdevs-elementoror'),
                'placeholder' => __('Type Info Box Title', 'bdevs-elementoror'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'bdevs-elementoror'),
                //'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box description goes here', 'bdevs-elementoror'),
                'placeholder' => __('Type info box description', 'bdevs-elementoror'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_5'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __('H1', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __('H2', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __('H3', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __('H4', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __('H5', 'bdevs-elementoror'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __('H6', 'bdevs-elementoror'),
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
                'label' => __('Alignment', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevs-elementoror'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevs-elementoror'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevs-elementoror'),
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

        
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Contact List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'bdevs-elementoror'),
                    'style_2' => __('Style 2', 'bdevs-elementoror'),
                    'style_3' => __('Style 3', 'bdevs-elementoror'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevs-elementoror'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevs-elementoror'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevs-elementoror'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
            ]
        );

        $repeater->add_control(
            'tab_subtitle',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'label' => __('Sub Title Title', 'bdevs-elementor'),
                'default' => __('Sub Title Title', 'bdevs-elementor'),
                'placeholder' => __('Type here subtitle', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevs-elementor'),
                'default' => __('Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_title_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('URL', 'bdevs-elementor'),
                'default' => __('#', 'bdevs-elementor'),
                'placeholder' => __('#', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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

    protected function register_style_controls() {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title & Description', 'bdevs-elementoror'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'bdevs-elementoror'),
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
                'label' => __('Title', 'bdevs-elementoror'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementoror'),
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
                'label' => __('Text Color', 'bdevs-elementoror'),
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
                'label' => __('Subtitle', 'bdevs-elementoror'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementoror'),
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
                'label' => __('Text Color', 'bdevs-elementoror'),
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


        $this->add_control(
            'header_info_icon_label',
            [
                'label'     => esc_html__('Icon', 'generic-elements'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'generic_info_icon_color',
            [
                'label' => esc_html__('Icon Color', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .cta-icon > figure > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cta-icon > figure > svg'   => 'stroke: {{VALUE}}; fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'generic_info_list_icon_size',
            [
                'label' => esc_html__('Icon Size', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-icon > figure > i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cta-icon > figure > svg' => 'max-width: {{SIZE}}{{UNIT}}; height: auto',
                ],
            ]
        );
        $this->add_responsive_control(
            'generic_info_list_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'generic-elements'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cta-icon > figure > i, {{WRAPPER}} ..cta-icon > figure > svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
        
        
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', '');
        $this->add_render_attribute('title', 'class', 'ab-title bdevs-el-title mb-25');


        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text');

        $title = wp_kses_post($settings['title']);

        if (empty($settings['slides'])) {
            return;
        }
    ?>

        <div class="header__info">
            <?php 
                foreach ( $settings['slides'] as $key => $slide ):
                ?>
            <div class="header__info-item">
                <div class="header__info-icon">
                    <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                        $this->get_render_attribute_string( 'image' );
                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                        </figure>
                        <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                        <figure>
                            <?php \Elementor\Icons_Manager::render_icon( $slide['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </figure>
                    <?php endif; ?>
                </div>
                <div class="header__info-text">
                    <?php if (!empty($slide['tab_subtitle'])) : ?>
                        <span class="bdevs-el-subtitle"><?php echo wp_kses_post($slide['tab_subtitle']); ?></span>
                    <?php endif; ?>

                    <?php if (!empty($slide['tab_title'])) : ?>
                        <h5 class="bdevs-el-title">
                            <a href="<?php echo esc_url($slide['tab_title_url']); ?>"><?php echo wp_kses_post($slide['tab_title']); ?></a>
                        </h5>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}
