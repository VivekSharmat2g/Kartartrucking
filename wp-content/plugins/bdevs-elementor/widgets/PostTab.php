<?php

namespace Bdevs\Elementor;

defined( 'ABSPATH' ) || die();

class PostTab extends \Generic\Elements\GenericWidget {

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
        return 'custom_post_tab';
    }


    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title () {
        return __( 'Post Tab', 'bdevs-elementor' );
    }

    public function get_custom_help_url () {
        return 'http://elementor.bdevs.net/bdevs-elementoror/post-tab/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon () {
        return 'eicon-post';
    }

    public function get_keywords () {
        return [ 'posts', 'post', 'post-tab', 'tab', 'news' ];
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

    /**
     * Get a list of Taxonomy
     *
     * @return array
     */
    public function get_taxonomies($post_type = '')
    {
        $list = [];
        if ($post_type) {
            $taxonomies = get_taxonomies(['public' => true, "object_type" => [$post_type]], 'object', true);
            $list[$post_type] = count($taxonomies) !== 0 ? $taxonomies : '';
        } else {
            $list = get_taxonomies(['public' => true], 'object', true);
        }
        return $list;
    }


    protected function register_content_controls () {
       // back title
        $this->start_controls_section(
            '_section_back_title',
            [
                'label' => __( 'Details URL', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10']
                ],
            ]
        );

        $this->add_control(
            'details_url',
            [
                'label' => __( 'Page URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'bdevs page url goes here', 'bdevs-elementor' ),
                'placeholder' => __( 'Set page URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();
   

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'heading_switch',
            [
                'label' => __( 'Show', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bdevs-elementor' ),
                'label_off' => __( 'Hide', 'bdevs-elementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
                'condition' => [
                    'design_style' => 'style_10'
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Sub Title', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'bdevs Info Box Title', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Info Box Title', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box description goes here', 'bdevs-elementor' ),
                'placeholder' => __( 'Type info box description', 'bdevs-elementor' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => 'style_10'
                ],
            ]
        );        

        $this->add_control(
            'sort_description',
            [
                'label' => __( 'Sort Description', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'bdevs info box sort description goes here', 'bdevs-elementor' ),
                'placeholder' => __( 'Type info box sort description', 'bdevs-elementor' ),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_10'
                ],
                'dynamic' => [
                    'active' => true,
                ]
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

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevs-elementor' ),
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
            '_section_post_tab_query',
            [
                'label' => __( 'Query', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label' => __( 'Source', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key( $this->get_post_types() ),
            ]
        );

        $this->add_control(
            'item_limit',
            [
                'label' => __( 'Item Limit', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
                'dynamic' => [ 'active' => true ],
            ]
        );

        $this->end_controls_section();


        // Button 
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_10'],
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


        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevs-elementor' ),
                    'style_2' => __( 'Style 2', 'bdevs-elementor' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'col_num',
            [
                'label' => __('Column Select', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '6' => __('Column  2', 'bdevs-elementor'),
                    '4' => __('Column  3', 'bdevs-elementor'),
                    '3' => __('Column  4', 'bdevs-elementor')
                ],
                'default' => '4',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'excerpt',
            [
                'label' => __( 'Show Excerpt', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'bdevs-elementor' ),
                'label_off' => __( 'Hide', 'bdevs-elementor' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'filter_pos',
            [
                'label' => __( 'Filter Position', 'bdevs-elementor' ),
                'label_block' => false,
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'top',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevs-elementor' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'bdevs-elementor' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevs-elementor' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __( 'Filter Align', 'bdevs-elementor' ),
                'label_block' => false,
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'left',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'bdevs-elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'condition' => [
                    'filter_pos' => 'top',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-elementor-post-tab .bdevs-elementor-post-tab-filter' => 'text-align: {{VALUE}};',
                ],
                'style_transfer' => true,
            ]
        );


        $this->add_responsive_control(
            'event',
            [
                'label' => __( 'Tab action', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'click' => __( 'On Click', 'bdevs-elementor' ),
                    'hover' => __( 'On Hover', 'bdevs-elementor' ),
                ],
                'default' => 'click',
                'render_type' => 'template',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls () {
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
        
        // Tab 
        $this->start_controls_section(
            '_section_post_tab_filter',
            [
                'label' => __( 'Tab', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tab_line_color',
            [
                'label' => __( 'Tab Line BG', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box::before' => 'background: {{VALUE}}',
                ],
            ]
        );      

        $this->add_control(
            'tab_box_color',
            [
                'label' => __( 'Tab Box BG', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_margin_btm',
            [
                'label' => __( 'Margin Bottom', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'filter_pos' => 'top',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tab_shadow',
                'label' => __( 'Box Shadow', 'bdevs-elementor' ),
                'selector' => '{{WRAPPER}} .project-filter-box',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_border',
                'label' => __( 'Border', 'bdevs-elementor' ),
                'selector' => '{{WRAPPER}} .project-filter-box',
            ]
        );

        $this->add_responsive_control(
            'tab_item',
            [
                'label' => __( 'Tab Item', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_item_margin',
            [
                'label' => __( 'Margin', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tab_item_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs( 'tab_item_tabs' );
        $this->start_controls_tab(
            'tab_item_normal_tab',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'tab_item_color',
            [
                'label' => __( 'Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_background',
                'label' => __( 'Background', 'bdevs-elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_item_hover_tab',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'tab_item_hvr_color',
            [
                'label' => __( 'Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .project-filter-box button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'tab_item_hvr_background',
                'label' => __( 'Background', 'bdevs-elementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .project-filter-box button.active,{{WRAPPER}} .project-filter-box button:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tab_item_typography',
                'label' => __( 'Typography', 'bdevs-elementor' ),
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_item_border',
                'label' => __( 'Border', 'bdevs-elementor' ),
                'selector' => '{{WRAPPER}} .project-filter-box button',
            ]
        );

        $this->add_responsive_control(
            'tab_item_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .project-filter-box button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->end_controls_section();
        
    }

    protected function render () {

        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title bdevs-el-title' );
        $this->add_render_attribute( 'title3', 'class', 'section-title d-block' );

        if (!empty($settings['button_link'])) {
            $this->add_render_attribute('button', 'class', 'fill-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        if ( ! $settings['post_type'] )
            return;


        if ( !empty($settings['post_type']) ) {
            $terms_ids = get_taxonomies(['public' => true, "object_type" => [$settings['post_type']]]);
        }

        $taxonomy = !empty($terms_ids) ? current($terms_ids) : '';

        if ( !empty($terms_ids) ) {
            $terms_args = [
                'taxonomy' => $taxonomy,
                'hide_empty' => true,
                'orderby' => 'term_id',
            ];

            $post_args = [
                'post_status' => 'publish',
                'post_type' => $settings['post_type'],
                'posts_per_page' => $settings['item_limit'],
                // 'tax_query' => [
                //     [
                //         'taxonomy' => $taxonomy,
                //         'field' => 'term_id',
                //         'terms' => $terms_ids ? [51, 52] : '',
                //     ],
                // ],
            ];
        }

        $posts = query_posts($post_args);
        $filter_list = get_terms($terms_args);

        $query_settings = [
            'post_type' => $settings['post_type'],
            'taxonomy' => $taxonomy,
            'item_limit' => $settings['item_limit'],
            'excerpt' => $settings['excerpt'] ? $settings['excerpt'] : 'no',
        ];
        $query_settings = json_encode( $query_settings, true );

        $event = 'click';
        if ( 'hover' === $settings['event'] ) {
            $event = 'hover touchstart';
        }



        $wrapper_class = [
            'project-area',
            'project-' . $settings['filter_pos'],
        ];
        $this->add_render_attribute( 'wrapper', 'class', $wrapper_class );
        $this->add_render_attribute( 'wrapper', 'data-query-args', $query_settings );
        $this->add_render_attribute( 'wrapper', 'data-event', $event );
        $this->add_render_attribute( 'project-filter', 'class', [ 'dp-portfolio-menu dp-filter-button-group mb-55 bdevs-el-tabtitle' ] );
        $this->add_render_attribute( 'project-body', 'class', [ 'row row-portfolio' ] );
        $i = 1;

        if ( !empty( $settings['design_style'] ) AND $settings['design_style'] == 'style_2' ):
        
        if ( !empty($terms_ids) && count( $posts ) !== 0 ) :?>

       <!-- portfolio area start  -->
       <section class="portfolio__area">
          <div class="container wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".3s">
             <div class="row align-items-center">
                <div class="col-lg-12">

                   <div class="portfolio-menu filter-button-group mb-55">
                    <?php foreach ( $filter_list as $list ): ?>
                       <?php if ( $i === 1 ): $i++; ?> 
                            <button class="active" data-filter="*">
                                <?php echo esc_html__( 'View All','bdevs-elementor' ); ?>  
                            </button>
                            <button data-filter=".<?php echo esc_attr( $list->slug ); ?>">
                                <?php echo esc_html( $list->name ); ?>  
                            </button>
                          <?php else: ?>
                          <button data-filter=".<?php echo esc_attr( $list->slug ); ?>">
                                <?php echo esc_html( $list->name ); ?>
                          </button>
                       <?php endif; ?>
                    <?php endforeach; ?>
                   </div>

                </div>
             </div>
             <div class="row grid">
                <?php 
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $cases_author_name = function_exists('get_field') ? get_field('cases_author_name') : '';
                    $feature_image = function_exists('get_field') ? get_field('feature_image') : '';
                    $project_button = function_exists('get_field') ? get_field('project_button') : '';
                    $short_text = function_exists('get_field') ? get_field('short_text') : '';
                    $item_classes = '';
                    $item_cat_names = '';
                    $item_cats = get_the_terms( get_the_id(), $taxonomy );
                    if( !empty($item_cats) ):
                        $count = count($item_cats) - 1;
                        foreach($item_cats as $key => $item_cat) {
                            $item_classes .= $item_cat->slug . ' ';
                            $item_cat_names .= ( $count > $key ) ? $item_cat->name  . ', ' : $item_cat->name;
                        }
                    endif;
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 <?php echo $item_classes; ?>">
                   <div class="portfolio__item mb-30">
                      <div class="dp-single-gallery">

                        <?php if ( has_post_thumbnail() ): ?>
                         <div class="dp-gallery-thumb">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="img">
                            </a>
                         </div>
                         <?php endif; ?>

                         <div class="dp-gallery-content">
                            <div class="dp-gallery-content-text">
                               <h4 class="dp-gallery-title bdevs-el-innertitle">
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
                                </h4>
                               <span><?php echo esc_html($item_cat_names); ?></span>
                            </div>
                            <div class="dp-gallery-link">
                               <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <i class="fal fa-long-arrow-right"></i>
                                </a>
                            </div>
                         </div>

                      </div>
                   </div>
                </div>
                <?php endwhile; 
                wp_reset_query();
                endif; ?>

             </div>
          </div>
       </section>
       <!-- portfolio area end -->

        <?php
        else:
            printf( '%1$s',
                __( 'No  Posts  Found', 'bdevs-elementor' )
            );
        endif;


         else: 
        if ( !empty($terms_ids) && count( $posts ) !== 0 ) :?>


       <!-- portfolio area start  -->
       <section class="portfolio__area">
          <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
             <div class="row align-items-center">
                <div class="col-lg-4">
                   <div class="section__title gallery-section-title mb-55">
                    <?php if ($settings['sub_title']) : ?>
                        <span class="sub-title bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
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
                </div>
                <div class="col-lg-8">

                   <div <?php $this->print_render_attribute_string( 'project-filter' ); ?>>
                    <?php foreach ( $filter_list as $list ): ?>
                       <?php if ( $i === 1 ): $i++; ?> 
                            <button class="active" data-filter="*">
                                <?php echo esc_html__( 'View All','bdevs-elementor' ); ?>  
                            </button>
                            <button data-filter=".<?php echo esc_attr( $list->slug ); ?>">
                                <?php echo esc_html( $list->name ); ?>  
                            </button>
                          <?php else: ?>
                          <button data-filter=".<?php echo esc_attr( $list->slug ); ?>">
                                <?php echo esc_html( $list->name ); ?>
                          </button>
                       <?php endif; ?>
                    <?php endforeach; ?>
                   </div>

                </div>
             </div>
             <div class="row grid mb-30">
                <?php 
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $cases_author_name = function_exists('get_field') ? get_field('cases_author_name') : '';
                    $feature_image = function_exists('get_field') ? get_field('feature_image') : '';
                    $project_button = function_exists('get_field') ? get_field('project_button') : '';
                    $short_text = function_exists('get_field') ? get_field('short_text') : '';
                    $item_classes = '';
                    $item_cat_names = '';
                    $item_cats = get_the_terms( get_the_id(), $taxonomy );
                    if( !empty($item_cats) ):
                        $count = count($item_cats) - 1;
                        foreach($item_cats as $key => $item_cat) {
                            $item_classes .= $item_cat->slug . ' ';
                            $item_cat_names .= ( $count > $key ) ? $item_cat->name  . ', ' : $item_cat->name;
                        }
                    endif;
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6 <?php echo $item_classes; ?>">
                   <div class="portfolio__item mb-30">
                      <div class="dp-single-gallery">

                        <?php if ( has_post_thumbnail() ): ?>
                         <div class="dp-gallery-thumb">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="img">
                            </a>
                         </div>
                         <?php endif; ?>

                         <div class="dp-gallery-content">
                            <div class="dp-gallery-content-text">
                               <h4 class="dp-gallery-title bdevs-el-innertitle">
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
                                </h4>
                               <span><?php echo esc_html($item_cat_names); ?></span>
                            </div>
                            <div class="dp-gallery-link">
                               <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                    <i class="fal fa-long-arrow-right"></i>
                                </a>
                            </div>
                         </div>

                      </div>
                   </div>
                </div>
                <?php endwhile; 
                wp_reset_query();
                endif; ?>

             </div>
          </div>
       </section>
       <!-- portfolio area end -->




        <?php else:
            printf( '%1$s',
                __( 'No  Posts  Found', 'bdevs-elementor' )
            );
        endif; 
        endif;
        

    }
}
