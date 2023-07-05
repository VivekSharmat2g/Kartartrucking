<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class PostList extends \Generic\Elements\GenericWidget {

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
    public function get_name() {
        return 'cust-post-list';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return esc_html__( 'Post List', 'bdevs-elementor' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/bdevs-elementoror/post-list/';
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
    public function get_icon() {
        return ' eicon-post-list gen-icon';
    }

    public function get_keywords() {
        return [ 'post', 'post-list', 'post-lists' ];
    }

    public function get_categories() {
        return [ 'bdevs-elementor' ];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types( $args = array() ){
        $default = [
            'public' => true,
            'show_in_nav_menus' => true
        ];
        $args = array_merge($default, $args);
        $post_types = get_post_types($args, 'objects');
        $post_types = wp_list_pluck($post_types, 'label', 'name');

        if (!empty($diff_key)) {
            $post_types = array_diff_key($post_types, $diff_key);
        }
        return $post_types;
    }

    // Register Content Controls
    protected function register_content_controls() {
        $this->design_style();
        $this->title_desc_content_controls();
        $this->post_list_content_controls();
        $this->post_list_settings_controls();
    }

    // Design Style Content Controls
    public function design_style(){
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
                    'design_6' => __('Design 6', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // Title and Description Content Controls
    protected function title_desc_content_controls() {
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
            'shape_switch',
            [
                'label' => __('Shape SWITCHER', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
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
                    'designs' => ['design_6'],
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
                ]
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
                    'designs' => ['design_1'],
                ],
            ]
        );

        $this->add_control(
            'title_tag2',
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
            'align2',
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

    // Post List Content Controls
    protected function post_list_content_controls(){
        // List
        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => esc_html__('List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => esc_html__('Source', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key($this->get_post_types()),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label' => esc_html__('Show post by:', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent' => esc_html__('Recent Post', 'bdevs-elementor'),
                    'selected' => esc_html__('Selected Post', 'bdevs-elementor'),
                ],
                'condition' => [
                    'post_type' => ['post'],
                ],

            ]
        );

        $this->add_control(
            'manual_include',
            [
                'label' => esc_html__('Posts', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'show_label' => false,
                'label_block' => true,
                'multiple' => true,
                'options' => $this->get_posts_list(),
                'condition' => [
                    'show_post_by' => ['selected'],
                    'post_type' => ['post'],
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Item Limit', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent']
                ]
            ]
        );

        $this->add_control(
            'eur_blog_title_word',
            [
                'label' => esc_html__('Title Word Count', 'bdevs-elementor'),
                'description' => esc_html__('Set how many word you want to displa!', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '6',
            ]
        );

        $this->add_control(
            'post_column',
            [
                'label' => __( 'Design Style', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '6' => __( '2 Column', 'bdevs-elementor' ),
                    '4' => __( '3 Column', 'bdevs-elementor' ),
                ],
                'default' => '4',
                'frontend_available' => true,
                'style_transfer' => true,
                'condition' => [
                    'designs' => ['design_6'],
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Post List Settings Controls
    protected function post_list_settings_controls(){
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => esc_html__('Settings', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => esc_html__('Layout', 'bdevs-elementor'),
                'label_block' => false,
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'list',
                'options' => [
                    'list' => [
                        'title' => esc_html__('List', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'inline' => [
                        'title' => esc_html__('Inline', 'bdevs-elementor'),
                        'icon' => 'eicon-ellipsis-h',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'title_switch',
            [
                'label' => __('Title On/Off Switch', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label' => esc_html__('Featured Image', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'bdevs-elementor'),
                'label_off' => esc_html__('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'post_image',
                'default' => 'thumbnail',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'feature_image' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'list_icon',
            [
                'label' => esc_html__('List Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'bdevs-elementor'),
                'label_off' => esc_html__('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'feature_image!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-check-circle',
                    'library' => 'reguler'
                ],
                'condition' => [
                    'list_icon' => 'yes',
                    'feature_image!' => 'yes'
                ]
            ]
        );


        $this->add_control(
            'content',
            [
                'label' => __('Content', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'content_limit',
            [
                'label' => __('Content Limit', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '14',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'meta',
            [
                'label' => __('Show Meta', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'category_meta',
            [
                'label' => __('Category', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'condition' => [
                    'design_style' => ['style_10'],
                ],
                'default' => '',
            ]
        );

        $this->add_control(
            'author_meta',
            [
                'label' => __('Author', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'author_icon',
            [
                'label' => __('Author Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'author_meta' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'comments_meta',
            [
                'label' => __('Comments', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'comments_icon',
            [
                'label' => __('Comments Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-comment-alt',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'comments_meta' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'date_meta',
            [
                'label' => __('Date', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'meta' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'date_icon',
            [
                'label' => __('Date Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-calendar-check',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                    'design_style' => ['style_10']
                ]
            ]
        );

        $this->add_control(
            'category_icon',
            [
                'label' => __('Category Icon', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-folder-open',
                    'library' => 'reguler',
                ],
                'condition' => [
                    'meta' => 'yes',
                    'category_meta' => 'yes',
                    'post_type' => 'post',
                    'design_style' => ['style_1', 'style_2', 'style_3']
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'bdevs-elementor'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'item_align',
            [
                'label'     => esc_html__( 'Alignment', 'bdevs-elementor' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'bdevs-elementor' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_title',
            [
                'label' => __('Button Text Title', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Text Title', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Text Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_3'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => esc_html__('Button Text', 'bdevs-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Read More', 'bdevs-elementor'),
                'placeholder' => esc_html__('Type text here', 'bdevs-elementor'),
                'condition' => [
                    'designs' => ['design_5'],
                ],
            ]
        );

        $this->end_controls_section();
    }


    // Register Style Controls
    protected function register_style_controls()
    {
        $this-> post_list_style_controls();
        $this-> title_desc_style_controls();
        $this-> post_list_meta_style_controls();
        $this-> post_list_date_meta_style_controls();
        $this-> gen_blog_button_style_controls();
    }

    // post_list_style_controls
    public function post_list_style_controls() {
        $this->start_controls_section(
            '_section_post_list_style',
            [
                'label' => esc_html__('List', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'list_item_common',
            [
                'label' => esc_html__('Common', 'bdevs-elementor'),
                'type'  => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_responsive_control(
            'list_item_margin',
            [
                'label' => esc_html__('Margin', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bd-blog-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'list_item_padding',
            [
                'label' => esc_html__('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bd-blog-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'list_item_background',
                'label' => esc_html__('Background', 'bdevs-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bd-blog-text',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'list_item_box_shadow',
                'label' => esc_html__('Box Shadow', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bd-blog',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'list_item_border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bd-blog',
            ]
        );

        $this->add_responsive_control(
            'list_item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bd-blog' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    // title_desc_style_controls
    public function title_desc_style_controls() {
         //Title Style
         $this->start_controls_section(
            '_section_post_list_title_style',
            [
                'label' => esc_html__('Title & Description', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-title',
            ]
        );

        $this->add_responsive_control(
            'blog_title_spacing',
            [
                'label' => __( 'Title Bottom Spacing', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('title_tabs');
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title, .blog__item-title.dp-blog-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'title_hvr_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title:hover, .blog__item-content h2:hover a, .blog-two .blog__title-inner:hover h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


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

    // post_list_meta_style_controls
    public function post_list_meta_style_controls() {
         //Blog Meta
         $this->start_controls_section(
            '_section_blog_meta_style',
            [
                'label' => esc_html__('Blog Meta', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_4'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'blog_meta_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-blog-meta',
            ]
        );

        $this->start_controls_tabs('blog_meta_title_tabs');
        $this->start_controls_tab(
            'blog_meta_normal_tab',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'blog_meta_color',
            [
                'label' => esc_html__('Meta Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-blog-meta, .blog-two .blog__meta' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'blog_meta_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-two .blog__meta::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_meta_icon_color',
            [
                'label' => esc_html__('Meta Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-two .blog__meta a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'blog_meta_hover_tab',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'blog_meta_hover_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__meta.dp-blog-meta1 span:hover a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'blog_meta_icon_hover_color',
            [
                'label' => esc_html__('Meta Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-two .blog__meta a i:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // post_list_date_meta_style_controls
    public function post_list_date_meta_style_controls(){
        $this->start_controls_section(
            '_section_blog_date_meta_style',
            [
                'label' => esc_html__('Blog Date Meta', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_3', 'design_4'],
                ],
            ]
        );

        $this->add_control(
            'blog_date_color',
            [
                'label' => esc_html__('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__item-date span, .blog__item-date span b' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'blog_date_meta_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog__item-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Blog Button Style Controls
    public function gen_blog_button_style_controls()
    {
        // Button style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => esc_html__('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_5'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .generic-el-btn a'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .generic-el-btn a',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .generic-el-btn a',
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
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'postlist_button_border_color',
            [
                'label' => esc_html__('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'postlist_button_before_color',
            [
                'label' => esc_html__('Button Before Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_service_button_hover',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a:hover, {{WRAPPER}} .generic-el-btn a:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn a:hover, {{WRAPPER}} .generic-el-btn a:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn:hover, {{WRAPPER}} .generic-el-btn a:hover, {{WRAPPER}} .generic-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'postlist_button_before_hover_color',
            [
                'label' => esc_html__('Button Before Hover Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .generic-el-btn:hover a:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


    // Render function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);

        if (!$settings['post_type']) return;
        $args = [
            'post_status' => 'publish',
            'post_type' => $settings['post_type'],
        ];
        if ('recent' === $settings['show_post_by']) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $selected_post_type = 'selected_list_' . $settings['post_type'];

        $customize_title = [];

        if ('selected' === $settings['show_post_by'] ) {

            $args = array(
                'post_type' => $post_type,
                'post__in' => $manual_include
            );
            $posts = get_posts($args);
        } else {
            $posts = get_posts($args);
        }

        ?>

        <?php if ($settings['designs'] === 'design_6'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

        <section class="dp-blog-grid-area">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $inx => $post):
                        $categories = get_the_category($post->ID);
                    ?>
                    <div class="col-xl-<?php echo esc_attr($settings['post_column']); ?> col-lg-6 col-md-6 col-12">
                        <div class="dp-blog-grid-wrapper mb-30">
                            <!-- Blog thumb start  -->
                            <?php if ( ('yes' === $feature_image ) && !empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
                            <div class="dp-blog-grid-thumb">
                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                    <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="Blog">
                                </a>
                            </div>
                            <?php endif; ?>
                            <!-- Blog thumb end  -->

                            <div class="dp-blog-grid-content-wrapper">

                                <!-- Blog Meta Start  -->
                                <div class="dp-blog-grid-meta-wrapper">

                                    <!-- blog-author-meta-start -->
                                    <?php if ('yes' === $settings['author_meta']) : ?>
                                    <span>
                                        <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php if ($settings['author_icon']) :
                                                \Elementor\Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                            endif;
                                            echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                        </a>
                                    </span>
                                    <?php endif; ?>
                                    <!-- blog-author-meta-end -->

                                    <!-- blog-comments-meta start  -->
                                    <?php if ('yes' === $settings['comments_meta']) : ?>
                                    <span>
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                            <?php if ($settings['comments_icon']) :
                                                \Elementor\Icons_Manager::render_icon($settings['comments_icon'], ['aria-hidden' => 'true']);
                                                endif;
                                                echo get_comments_number($post->ID); ?> <?php print esc_html__('Comments', 'bdevs-elementor');
                                            ?>
                                        </a>
                                    </span>
                                    <?php endif; ?>
                                    <!-- blog-comments-meta end  -->

                                    <!-- blog date meta start  -->
                                    <?php if ('yes' === $settings['date_meta']) : ?>
                                    <div class="dp-blog-date-meta">
                                        <span><i class="far fa-calendar-alt"></i><?php echo get_the_date("d M Y"); ?> </span>
                                    </div>
                                    <?php endif; ?>
                                    <!-- blog date meta end  -->

                                </div>
                                <!-- Blog Meta end  -->

                                <!-- Blog Content Start  -->
                                <div class="dp-blog-grid-content bdevs-el-content">
                                    <!-- Blog title start  -->
                                    <?php if ('yes' === $settings['title_switch']): ?>
                                        <h2 class="dp-grid-title bdevs-el-title"><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?></a></h2>
                                    <?php endif; ?>
                                    <!-- Blog title end  -->

                                    <!-- Blog Description start  -->
                                    <?php if (!empty($settings['content'])) :
                                        $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                    ?>
                                    <div class="blog__item-text">
                                        <p><?php print wp_trim_words(get_the_excerpt($post->ID), $content_limit, ''); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog Description end  -->
                                </div>
                                <!-- Blog Content end  -->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <?php elseif ($settings['designs'] === 'design_5'):

            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

        <!-- blog-area-start -->
        <div class="blog-area wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $inx => $post):
                        $categories = get_the_category($post->ID);
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30">
                            <div class="blog-img">

                                <!-- Blog thumb start  -->
                                <?php if ( ('yes' === $feature_image ) && !empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                    <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="Blog">
                                </a>
                                <?php endif; ?>
                                <!-- Blog thumb end  -->

                                <!-- blog date meta start  -->
                                <?php if ('yes' === $settings['date_meta']) : ?>
                                <div class="blog-date">
                                    <a href=""><?php echo get_the_date("d"); ?> <br><?php echo get_the_date("M"); ?></a>
                                </div>
                                <?php endif; ?>
                                <!-- blog date meta end  -->

                                <div class="blog-text bdevs-el-content">
                                    <!-- Blog title start  -->
                                    <?php if ('yes' === $settings['title_switch']): ?>
                                        <h3><a class="bdevs-el-title" href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?></a></h3>
                                    <?php endif; ?>
                                    <!-- Blog title end  -->

                                    <!-- Blog Description start  -->
                                    <?php if (!empty($settings['content'])) :
                                        $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                    ?>
                                        <p><?php print wp_trim_words(get_the_excerpt($post->ID), $content_limit, ''); ?></p>
                                    <?php endif; ?>
                                    <!-- Blog Description end  -->

                                    <?php if (!empty($button_text)) : ?>
                                    <div class="b-button b-02-button generic-el-btn">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php print esc_html($button_text ?? ''); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- blog-area-end -->


        <?php elseif ($settings['designs'] === 'design_4'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

        <!-- Blog Area Start Here  -->
        <section class="blog wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="blog-two mt-45">
                    <div class="row">
                        <?php foreach ($posts as $inx => $post):
                            $categories = get_the_category($post->ID);
                        ?>
                       <div class="col-xl-6 col-lg-6 col-md-6">
                          <article>
                             <div class="blog__item mb-60 w-img wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                                <div class="blog__item-img mb-35">
                                    <!-- Blog thumb start  -->
                                    <?php if ( ('yes' === $feature_image ) && !empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                        <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="Blog">
                                    </a>
                                    <?php endif; ?>
                                    <!-- Blog thumb end  -->

                                    <!-- Blog meta start  -->
                                    <?php if ('yes' === $settings['meta']): ?>
                                    <div class="blog__meta dp-blog-meta1">
                                        <!-- blog-comments-meta start  -->
                                        <?php if ('yes' === $settings['comments_meta']) : ?>
                                        <span>
                                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                                <?php if ($settings['comments_icon']) :
                                                    \Elementor\Icons_Manager::render_icon($settings['comments_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo get_comments_number($post->ID); ?> <?php print esc_html__('Comments', 'bdevs-elementor');
                                                ?>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                        <!-- blog-comments-meta end  -->

                                        <!-- blog-author-meta-start -->
                                        <?php if ('yes' === $settings['author_meta']) : ?>
                                        <span>
                                            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php if ($settings['author_icon']) :
                                                    \Elementor\Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                endif;
                                                echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                        <!-- blog-author-meta-end -->
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog meta end  -->
                                </div>

                                <!-- blog date meta start  -->
                                <?php if ('yes' === $settings['date_meta']) : ?>
                                <div class="blog__item-date">
                                    <span><b><?php echo get_the_date("d"); ?> </b> <?php echo get_the_date("M"); ?> </span>
                                </div>
                                <?php endif; ?>
                                <!-- blog date meta end  -->

                                <div class="blog__item-content bdevs-el-content">
                                    <!-- Blog title start  -->
                                    <?php if ('yes' === $settings['title_switch']): ?>
                                        <h2 class="bdevs-el-title"><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?></a></h2>
                                    <?php endif; ?>
                                    <!-- Blog title end  -->

                                    <!-- Blog Description start  -->
                                    <?php if (!empty($settings['content'])) :
                                        $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                    ?>
                                    <div class="blog__item-text">
                                        <p><?php print wp_trim_words(get_the_excerpt($post->ID), $content_limit, ''); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog Description end  -->
                                </div>
                             </div>
                          </article>
                       </div>
                       <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here  -->


        <?php elseif ($settings['designs'] === 'design_3'):

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'bdevs-el-title');

        ?>

        <div class="blog-two dp-blog-right">
            <div class="blog__title-wrapper mb-60 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".9s">
                <?php foreach ($posts as $inx => $post):
                    $categories = get_the_category($post->ID);
                ?>
                <div class="blog__title-inner ">
                    <!-- blog date meta start  -->
                    <?php if ('yes' === $settings['date_meta']) : ?>
                    <div class="blog__item-date">
                        <span><b><?php echo get_the_date("d"); ?> </b> <?php echo get_the_date("M"); ?> </span>
                    </div>
                    <?php endif; ?>
                    <!-- blog date meta end  -->

                    <!-- Blog title start  -->
                    <?php if ('yes' === $settings['title_switch']): ?>
                    <div class="blog__item-title dp-blog-title">
                        <h4><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?></a></h4>
                    </div>
                    <?php endif; ?>
                    <!-- Blog title end  -->
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php elseif ($settings['designs'] === 'design_2'):

            $this->add_inline_editing_attributes('title', 'basic');
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        ?>

        <!-- Blog Area Start Here  -->
        <section class="blog">
            <div class="container">
                <div class="blog__box">
                    <div class="row">
                        <?php foreach ($posts as $inx => $post):
                            $categories = get_the_category($post->ID);
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <article>
                                <div class="blog__item mb-60 w-img wow fadeInUp bdevs-el-content" data-wow-duration="1.5s" data-wow-delay=".6s">
                                    <!-- Blog thumb start  -->
                                    <?php if ( ('yes' === $feature_image ) && !empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
                                    <div class="blog__item-img mb-35">
                                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="Blog"></a>
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog thumb end  -->

                                    <!-- blog date meta start  -->
                                    <?php if ('yes' === $settings['date_meta']) : ?>
                                    <div class="blog__item-date">
                                        <span><b><?php echo get_the_date("d"); ?> </b> <?php echo get_the_date("M"); ?> </span>
                                    </div>
                                    <?php endif; ?>
                                    <!-- blog date meta end  -->

                                    <div class="blog__item-content">
                                        <!-- Blog title start  -->
                                        <?php if ('yes' === $settings['title_switch']): ?>
                                        <h2>
                                            <a class="bdevs-el-title" href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?>
                                            </a>
                                        </h2>
                                        <?php endif; ?>
                                        <!-- Blog title end  -->

                                        <!-- Blog meta start  -->
                                        <?php if ('yes' === $settings['meta']): ?>
                                        <div class="blog__meta bdevs-el-blog-meta">
                                            <!-- blog-comments-meta start  -->
                                            <?php if ('yes' === $settings['comments_meta']) : ?>
                                            <span>
                                                <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                                    <?php if ($settings['comments_icon']) :
                                                        \Elementor\Icons_Manager::render_icon($settings['comments_icon'], ['aria-hidden' => 'true']);
                                                        endif;
                                                        echo get_comments_number($post->ID); ?> <?php print esc_html__('Comments', 'bdevs-elementor');
                                                    ?>
                                                </a>
                                            </span>
                                            <?php endif; ?>
                                            <!-- blog-comments-meta end  -->

                                            <!-- blog-author-meta-start -->
                                            <?php if ('yes' === $settings['author_meta']) : ?>
                                            <span>
                                                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php if ($settings['author_icon']) :
                                                        \Elementor\Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                                </a>
                                            </span>
                                            <?php endif; ?>
                                            <!-- blog-author-meta-end -->
                                        </div>
                                        <?php endif; ?>
                                        <!-- Blog meta end  -->


                                        <!-- Blog Description start  -->
                                        <?php if (!empty($settings['content'])) :
                                            $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                        ?>
                                        <div class="blog__item-text">
                                            <p><?php print wp_trim_words(get_the_excerpt($post->ID), $content_limit, ''); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <!-- Blog Description end  -->
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here  -->


        <?php else:
            $this->add_render_attribute('title', 'class', 'item_title');
            $this->add_render_attribute('title', 'class', 'lv-blog-box-title bdevs-el-title');
            $title = wp_kses_post( $settings['title'] ?? '' );
            if (!empty($posts)):
        ?>

        <!-- Blog Area Start Here  -->
        <section class="blog wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="blog-two mt-45">
                    <div class="row">
                        <?php foreach ($posts as $inx => $post):
                            $categories = get_the_category($post->ID);
                        ?>
                       <div class="col-xl-4 col-lg-4 col-md-6">
                          <article>
                             <div class="blog__item mb-60 w-img wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                                <div class="blog__item-img mb-35">
                                    <!-- Blog thumb start  -->
                                    <?php if ( ('yes' === $feature_image ) && !empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                        <img src="<?php print get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="Blog">
                                    </a>
                                    <?php endif; ?>
                                    <!-- Blog thumb end  -->

                                    <!-- Blog meta start  -->
                                    <?php if ('yes' === $settings['meta']): ?>
                                    <div class="blog__meta dp-blog-meta1 bdevs-el-blog-meta">
                                        <!-- blog-comments-meta start  -->
                                        <?php if ('yes' === $settings['comments_meta']) : ?>
                                        <span>
                                            <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>">
                                                <?php if ($settings['comments_icon']) :
                                                    \Elementor\Icons_Manager::render_icon($settings['comments_icon'], ['aria-hidden' => 'true']);
                                                    endif;
                                                    echo get_comments_number($post->ID); ?> <?php print esc_html__('Comments', 'bdevs-elementor');
                                                ?>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                        <!-- blog-comments-meta end  -->

                                        <!-- blog-author-meta-start -->
                                        <?php if ('yes' === $settings['author_meta']) : ?>
                                        <span>
                                            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php if ($settings['author_icon']) :
                                                    \Elementor\Icons_Manager::render_icon($settings['author_icon'], ['aria-hidden' => 'true']);
                                                endif;
                                                echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?>
                                            </a>
                                        </span>
                                        <?php endif; ?>
                                        <!-- blog-author-meta-end -->
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog meta end  -->
                                </div>

                                <!-- blog date meta start  -->
                                <?php if ('yes' === $settings['date_meta']) : ?>
                                <div class="blog__item-date">
                                    <span><b><?php echo get_the_date("d"); ?> </b> <?php echo get_the_date("M"); ?> </span>
                                </div>
                                <?php endif; ?>
                                <!-- blog date meta end  -->

                                <div class="blog__item-content bdevs-el-content">
                                    <!-- Blog title start  -->
                                    <?php if ('yes' === $settings['title_switch']): ?>
                                        <h2 class="bdevs-el-title"><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo wp_trim_words(get_the_title($post->ID), $settings['eur_blog_title_word'], ''); ?></a></h2>
                                    <?php endif; ?>
                                    <!-- Blog title end  -->

                                    <!-- Blog Description start  -->
                                    <?php if (!empty($settings['content'])) :
                                        $content_limit = (!empty($settings['content_limit'])) ? $settings['content_limit'] : '';
                                    ?>
                                    <div class="blog__item-text">
                                        <p><?php print wp_trim_words(get_the_excerpt($post->ID), $content_limit, ''); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <!-- Blog Description end  -->
                                </div>
                             </div>
                          </article>
                       </div>
                       <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here  -->

        <?php
        else:
            printf('%1$s %2$s %3$s',
                esc_html__('No ', 'bdevs-elementor'),
                esc_html($settings['post_type']),
                esc_html__('Found', 'bdevs-elementor')
            );
        endif; ?>
        <?php endif;
    }

    public function get_posts_list() {

        $list = get_posts(
            array(
                'post_type' => 'post',
                'posts_per_page' => -1,
            )
        );

        $options = array();

        if (!empty($list) && !is_wp_error($list)) {
            foreach ($list as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }

        return $options;
    }
}
