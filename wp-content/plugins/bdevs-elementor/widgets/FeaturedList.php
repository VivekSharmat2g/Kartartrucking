<?php
namespace Bdevs\Elementor;


defined( 'ABSPATH' ) || die();

class FeaturedList extends \Generic\Elements\GenericWidget
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
        return 'featured_list';
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
        return __( 'Featured List', 'bdevs-elementor' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.bdevs.net/bdevselementor/featured_list/';
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
        return 'eicon-editor-list-ul';
    }

    public function get_keywords() {
        return [ 'featured', 'list', 'icon' ];
    }


    public function get_categories()
    {
        return ['bdevs-elementor'];
    }


    protected function register_content_controls()
    {
        $this->design_style();
        $this->title_and_desc();
        $this->location_map();
        $this->images();
        $this->feature_slides();
        $this->button_content_controls();
    }

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
                    'design_6' => __('Design 6', 'bdevs-elementor'),
                    'design_7' => __('Design 7', 'bdevs-elementor'),
                    'design_8' => __('Design 8', 'bdevs-elementor'),
                    'design_9' => __('Design 9', 'bdevs-elementor'),
                    'design_10' => __('Design 10', 'bdevs-elementor'),
                    'design_11' => __('Design 11', 'bdevs-elementor'),
                    'design_12' => __('Design 12', 'bdevs-elementor'),
                    'design_13' => __('Design 13', 'bdevs-elementor'),
                    'design_14' => __('Design 14', 'bdevs-elementor'),
                    'design_15' => __('Design 15', 'bdevs-elementor'),
                    'design_16' => __('Design 16', 'bdevs-elementor'),
                    'design_17' => __('Design 17', 'bdevs-elementor'),
                    'design_18' => __('Design 18', 'bdevs-elementor'),
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
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Desccription', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_3', 'design_4', 'design_6', 'design_14'],
                ],
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
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
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
                    'designs' => ['design_3'],
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

    public function location_map()
    {
       $this->start_controls_section(
            '_location_map',
            [
                'label' => __('Location Map', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        $this->add_control(
            'map_url',
            [
                'label' => __( 'Map URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Url here', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();
    }

    public function images(){
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs!' => ['design_9', 'design_10', 'design_13', 'design_15', 'design_16', 'design_17'],
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
                    'designs' => ['design_3', 'design_4'],
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
                    'designs' => ['design_12', 'design_14'],
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __( 'Video URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Set Video URL', 'bdevs-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs' => ['design_4', 'design_14'],
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function feature_slides()
    {
        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Featured List', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'bdevs-elementor' ),
                    'style_2' => __( 'Style 2', 'bdevs-elementor' ),
                    'style_3' => __( 'Style 3', 'bdevs-elementor' ),
                    'style_4' => __( 'Style 4', 'bdevs-elementor' ),
                    'style_5' => __( 'Style 5', 'bdevs-elementor' ),
                    'style_6' => __( 'Style 6', 'bdevs-elementor' ),
                    'style_7' => __( 'Style 7', 'bdevs-elementor' ),
                    'style_8' => __( 'Style 8', 'bdevs-elementor' ),
                    'style_9' => __( 'Style 9', 'bdevs-elementor' ),
                    'style_10' => __( 'Style 10', 'bdevs-elementor' ),
                    'style_11' => __( 'Style 11', 'bdevs-elementor' ),
                    'style_12' => __( 'Style 12', 'bdevs-elementor' ),
                    'style_13' => __( 'Style 13', 'bdevs-elementor' ),
                    'style_14' => __( 'Style 14', 'bdevs-elementor' ),
                    'style_15' => __( 'Style 15', 'bdevs-elementor' ),
                    'style_16' => __( 'Style 16', 'bdevs-elementor' ),
                    'style_17' => __( 'Style 17', 'bdevs-elementor' ),
                    'style_18' => __( 'Style 18', 'bdevs-elementor' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
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
                'condition' => [
                    'field_condition' => ['style_1', 'style_3', 'style_4','style_5','style_7', 'style_8', 'style_9', 'style_10', 'style_12', 'style_14', 'style_16', 'style_17', 'style_18'],
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'type' => ['image'],
                    'field_condition' => ['style_1', 'style_3', 'style_4','style_5','style_7', 'style_8', 'style_9', 'style_10', 'style_12', 'style_14', 'style_16', 'style_17', 'style_18'],
                ],
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
                    'type' => 'image',
                    'field_condition' => ['style_1', 'style_3', 'style_4','style_5','style_7', 'style_8', 'style_9', 'style_10', 'style_12', 'style_14', 'style_16', 'style_17', 'style_18'],
                ],
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'type' => ['icon'],
                    'field_condition' => ['style_1', 'style_3', 'style_4','style_5','style_7', 'style_8', 'style_9', 'style_10', 'style_12', 'style_14', 'style_16', 'style_17', 'style_18'],
                ],
            ]
        );

        $repeater->add_control(
            'bg_image',
            [
                'label' => __( 'BG Image', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_10', 'style_16', 'style_17'],
                ],
            ]
        );

        $repeater->add_control(
            'bg_image2',
            [
                'label' => __( 'BG Image 2', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_17'],
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        
        $repeater->add_control(
            'title2',
            [
                'label' => __( 'Title2', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Title2', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Icon Box Title', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_17', 'style_18'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'f_url',
            [
                'label' => __( 'URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'bdevs-elementor' ),
                'placeholder' => __( 'Url here', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1', 'style_3', 'style_4', 'style_5', 'style_9', 'style_10', 'style_11', 'style_15', 'style_16', 'style_17', 'style_18'],
                ],
            ]
        );

        $repeater->add_control(
            'number',
            [
                'label' => __( 'Number Title', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '01', 'bdevs-elementor' ),
                'placeholder' => __( 'Type Number', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_2', 'style_4', 'style_15'],
                ],
            ]
        );

        $repeater->add_control(
            'contact_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Contact Title', 'bdevs-elementor'),
                'placeholder' => __('Type content Title', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1','style_5'],
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Description', 'bdevs-elementor' ),
                'default' => __( 'bdevs features description', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_2', 'style_3', 'style_4','style_7', 'style_8', 'style_10', 'style_14', 'style_17', 'style_18'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'description2',
            [
                'label' => __( 'Description2', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Description', 'bdevs-elementor' ),
                'default' => __( 'bdevs features description', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_17'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
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
                'condition' => [
                    'field_condition' => ['style_11'],
                ],
			]
		);

        $repeater->add_control(
            'location',
            [
                'label' => __( 'Location', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Location Title', 'bdevs-elementor' ),
                'default' => __( '205 Main Road, New York', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_9', 'style_13'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email',
            [
                'label' => __( 'Email', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Email Title', 'bdevs-elementor' ),
                'default' => __( 'equita@farost.com', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_13'],
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'email_url',
            [
                'label' => __( 'Email URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'mailto:equita@farost.com', 'bdevs-elementor' ),
                'placeholder' => __( 'Url here', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_13'],
                ],
            ]
        );

        $repeater->add_control(
            'phone',
            [
                'label' => __( 'Phone', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'phone number', 'bdevs-elementor' ),
                'default' => __( '(002) 01061245741', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_13'],
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'phone_url',
            [
                'label' => __( 'Number URL', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'tel:(002) 01061245741', 'bdevs-elementor' ),
                'placeholder' => __( 'Url here', 'bdevs-elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_13'],
                ],
            ]
        );

        $repeater->add_control(
            'meta',
            [
                'label' => __( 'Meta', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Meta Title', 'bdevs-elementor' ),
                'default' => __( '250 - 495', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_9'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tag1',
            [
                'label' => __( 'Tag 1', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __( 'tag title 1', 'bdevs-elementor' ),
                'placeholder' => __( 'Tag Title', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_9', 'style_15'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tag2',
            [
                'label' => __( 'Tag 2', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Tag 2 Title', 'bdevs-elementor' ),
                'default' => __( 'tag title 2', 'bdevs-elementor' ),
                'condition' => [
                    'field_condition' => ['style_9'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_text2',
            [
                'label' => __( 'Button Text2', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevs-elementor' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_17'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'bdevs-elementor' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_3', 'style_9', 'style_15', 'style_16', 'style_17', 'style_18'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_3', 'style_9', 'style_15', 'style_16', 'style_17', 'style_18'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_icon',
            [
                'label' => __( 'Icon', 'bdevs-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
                'condition' => [
                    'field_condition' => ['style_3', 'style_9'],
                ],
            ]
        );

        $repeater->add_control(
            'button_selected_icon',
            [
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'button_icon',
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_3', 'style_9'],
                ],
            ]
        );

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'bdevs-elementor' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'bdevs-elementor' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'condition' => [
                    'field_condition' => ['style_3', 'style_9'],
                ],
                'default' => 'before',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'condition' => [
                    'field_condition' => ['style_3', 'style_9'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'country_img',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Country Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_12'],
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

        $this->add_responsive_control(
            'align_slide',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
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
                    'designs' => ['design_14', 'design_15'],
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
    protected function register_style_controls(){
        $this->title_style_controls();
        $this->repeater_button_style_controls();
        $this->video_button_style_controls();
        $this->button_style_controls();
    }
    

    // title_style_controls
    protected function title_style_controls() {
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
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_9', 'design_10', 'design_13', 'design_12', 'design_15', 'design_16', 'design_17'],
                ],
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
                'condition' => [
                    'designs!' => ['design_9', 'design_10', 'design_13', 'design_12', 'design_15', 'design_16', 'design_17'],
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
                'condition' => [
                    'designs!' => ['design_9', 'design_10', 'design_13', 'design_12', 'design_15', 'design_16', 'design_17'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-subtitle',
                'condition' => [
                    'designs!' => ['design_9', 'design_10', 'design_12', 'design_13', 'design_15', 'design_16', 'design_17'],
                ],
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Description', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs!' => ['design_9', 'design_12', 'design_13', 'design_15', 'design_16'],
                ],
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
                'condition' => [
                    'designs!' => ['design_9', 'design_12', 'design_13', 'design_15', 'design_16'],
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
                'condition' => [
                    'designs!' => ['design_9', 'design_12', 'design_13', 'design_15', 'design_16'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .bdevs-el-content p',
                'condition' => [
                    'designs!' => ['design_9', 'design_12', 'design_13', 'design_15', 'design_16'],
                ],
            ]
        );

        // tag
        $this->add_control(
            '_content_tag',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Tag', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_9', 'design_15'],
                ],
            ]
        );

        $this->add_control(
            'tag_color',
            [
                'label' => __( 'Tag Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-tag' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_9', 'design_15'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tag',
                'selector' => '{{WRAPPER}} .bdevs-el-tag',
                'condition' => [
                    'designs' => ['design_9', 'design_15'],
                ],
            ]
        );

        // location
        $this->add_control(
            '_content_location',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Location', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_9', 'design_13'],
                ],
            ]
        );

        $this->add_control(
            'location_color',
            [
                'label' => __( 'Location Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-location' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_9', 'design_13'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'location',
                'selector' => '{{WRAPPER}} .bdevs-el-location',
                'condition' => [
                    'designs' => ['design_9', 'design_13'],
                ],
            ]
        );

        // meta
        $this->add_control(
            '_content_meta',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Meta', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_9'],
                ],
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __( 'Meta Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-meta' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_9'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'meta',
                'selector' => '{{WRAPPER}} .bdevs-el-meta',
                'condition' => [
                    'designs' => ['design_9'],
                ],
            ]
        );

        // email
        $this->add_control(
            '_content_email',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Email', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        $this->add_control(
            'email_color',
            [
                'label' => __( 'Email Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-email' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'email',
                'selector' => '{{WRAPPER}} .bdevs-el-email',
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        // phone
        $this->add_control(
            '_content_phone',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __( 'Phone', 'bdevs-elementor' ),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        $this->add_control(
            'phone_color',
            [
                'label' => __( 'Phone Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-phone' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'phone',
                'selector' => '{{WRAPPER}} .bdevs-el-phone',
                'condition' => [
                    'designs' => ['design_13'],
                ],
            ]
        );


        $this->end_controls_section();
    }

    // repeater_button_style_controls
    protected function repeater_button_style_controls() {
        // Button style
        $this->start_controls_section(
            '_section_repeater_style_button',
            [
                'label' => __( 'Repeater Button', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_3', 'design_9', 'design_15', 'design_16', 'design_17', 'design_18'],
                ],
            ]
        );

        $this->add_responsive_control(
            'repeater_button_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'repeater_button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'repeater_button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_control(
            'repeater_button_border_radius',
            [
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'repeater_button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-reptr-btn',
            ]
        );

        $this->add_control(
            'hr_repet',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_repeater_button' );

        $this->start_controls_tab(
            '_tab_repeater_button_normal',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'repeater_button_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_repeater_button_hover',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'repeater_button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'repeater_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-reptr-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    // video_button_style_controls
    protected function video_button_style_controls()
    {
        $this->start_controls_section(
            '_section_video_button_style',
            [
                'label' => esc_html__('Video Button', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_14'],
                ],
            ]
        );



        $this->start_controls_tabs('_tabs_video_button');

        $this->start_controls_tab(
            '_tab_video_button_normal',
            [
                'label' => esc_html__('Normal', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'video_icon_color',
            [
                'label' => esc_html__('Play Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'video_icon_bg_color',
            [
                'label' => esc_html__('Play Icon BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'play_icon_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn',
            ]
        );

        $this->add_responsive_control(
            'button_size',
            [
                'label' => esc_html__('Button Size', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-popup-video',
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_video_button_hover',
            [
                'label' => esc_html__('Hover', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'video_icon_hover_color',
            [
                'label' => esc_html__('Play Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'video_icon_hover_bg_color',
            [
                'label' => esc_html__('Play Icon BG Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'play_icon_hover_typography',
                'label' => esc_html__('Typography', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn:hover',
            ]
        );

        $this->add_responsive_control(
            'button__hover_size',
            [
                'label' => esc_html__('Button Size', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-popup-video:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'hover-border',
                'label' => esc_html__('Border', 'bdevs-elementor'),
                'selector' => '{{WRAPPER}} .bdevs-el-popup-video:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        // video text
        $this->add_control(
            '_video_button_text',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => esc_html__('Video Button Text', 'bdevs-elementor'),
                'separator' => 'before',
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->add_control(
            'video_button_text_color',
            [
                'label' => esc_html__('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video-btn span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video-button-text',
                'selector' => '{{WRAPPER}} .bdevs-el-video-btn span',
                'condition' => [
                    'designs' => ['design_19'],
                ],
            ]
        );

        $this->end_controls_section();
    }

    // button_style_controls
    protected function button_style_controls() {
        // Button 1 style
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'bdevs-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_3', 'design_9', 'design_14', 'design_15'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
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
                'label' => __( 'Border Radius', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
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

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __( 'Hover', 'bdevs-elementor' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Text Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __( 'Border Color', 'bdevs-elementor' ),
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


    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', 'content-desc' );

        ?>

        <?php if ( $settings['designs'] === 'design_18' ): ?>

        <!-- services-area-start -->
        <div class="services-area services-area-six bdevs-el-content">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <?php foreach ($settings['slides'] as $key => $slide): 
                        $this->add_render_attribute('button_' . $key, 'class', 'b-button b-button-w bdevs-el-reptr-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="our-services-wrapper mb-30">
                                <div class="our-services-img">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                    ?>
                                        <figure>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <figure>
                                            <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                                <div class="inner-our-services">
                                    <?php if($slide['title2']): ?>
                                        <h1><?php echo wp_kses_post($slide['title2']) ?></h1>
                                    <?php endif; ?> 

                                    <?php if($slide['title']): ?>
                                        <div class="our-services-text">
                                            <h3 class="bdevs-el-title">
                                                <a class="bdevs-el-title" href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post($slide['title']) ?></a>
                                            </h3>
                                        </div>
                                    <?php endif; ?> 

                                    <?php if ($slide['description']): ?>
                                        <p><?php echo wp_kses_post($slide['description']); ?></p>
                                    <?php endif; ?>

                                    <div class="b-button bdevs-el-reptr-btn">
                                        <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                            printf(
                                                '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string('button_' . $key),
                                                esc_html($slide['button_text'])
                                            );
                                        elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                            <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                            if ($slide['button_icon_position'] === 'before') : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                            <?php
                                            else : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                        <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- services-area-end -->
        
        <?php elseif ( $settings['designs'] === 'design_17' ): ?>

        <!-- features-area-start -->
        <div class="features-01-area service-block-three bdevs-el-content">
            <div class="container">
                <div class="row features-item">
                    <?php foreach ($settings['slides'] as $key => $slide): 
                        $this->add_render_attribute('button_' . $key, 'class', 'b-button b-button-w bdevs-el-reptr-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);

                        $bg_image = wp_get_attachment_image_url($slide['bg_image']['id'], $settings['thumbnail_size']);
                        if (!$bg_image) {
                            $bg_image = $slide['bg_image']['url'];
                        }

                        $bg_image2 = wp_get_attachment_image_url($slide['bg_image2']['id'], $settings['thumbnail_size']);
                        if (!$bg_image2) {
                            $bg_image2 = $slide['bg_image2']['url'];
                        }

                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="features-01-wrapper mb-30">
                                <div class="image-layer" data-background="<?php print esc_url($bg_image); ?>"></div>
                                <div class="features-text">
                                    <?php if($slide['title']): ?>
                                        <h3 class="bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if ($slide['description']): ?>
                                        <p><?php echo wp_kses_post($slide['description']); ?></p>
                                    <?php endif; ?>

                                    <div class="b-button bdevs-el-reptr-btn">
                                        <?php if ($slide['button_text2'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                            printf(
                                                '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string('button_' . $key),
                                                esc_html($slide['button_text2'])
                                            );
                                        elseif (empty($slide['button_text2']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                            <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                            <?php elseif ($slide['button_text2'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                            if ($slide['button_icon_position'] === 'before') : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text2']); ?></a>
                                            <?php
                                            else : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text2']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                        <?php
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="overlay-box">
                                    <div class="overlay-image-layer" data-background="<?php print esc_url($bg_image2); ?>"></div>
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <div class="icon-box">
                                                <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                    $this->get_render_attribute_string('image');
                                                    $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                                ?>
                                                    <figure>
                                                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                                    </figure>
                                                <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                    <figure>
                                                        <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                                    </figure>
                                                <?php endif; ?>
                                            </div>

                                            <?php if($slide['title']): ?>
                                                <h5 class="bdevs-el-title">
                                                    <a class="bdevs-el-title" href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post($slide['title']) ?></a>
                                                </h5>
                                            <?php endif; ?>  

                                            <?php if ($slide['description']): ?>
                                                <p><?php echo wp_kses_post($slide['description']); ?></p>
                                            <?php endif; ?>

                                            <div class="b-button b-button-w bdevs-el-reptr-btn">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf(
                                                        '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                    <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before') : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                    else : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- features-area-end -->


        <?php elseif ( $settings['designs'] === 'design_16' ): ?>

        <!-- features-area-start -->
        <div class="features-area features-area-five bdevs-el-content features-03-padding  wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide): 
                        $bg_image = wp_get_attachment_image_url($slide['bg_image']['id'], $settings['thumbnail_size']);
                        if (!$bg_image) {
                            $bg_image = $slide['bg_image']['url'];
                        }
                        $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-reptr-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="features-03-wrapper mb-30">
                                <div class="features-03-img pos-rel">
                                    <img src="<?php print esc_url($bg_image); ?>" alt="">

                                    <div class="features-03-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                $this->get_render_attribute_string('image');
                                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                                <figure>
                                                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                                </figure>
                                            <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                <figure>
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                                </figure>
                                        <?php endif; ?>
                                    </div>

                                    <div class="features-03-text">
                                        <?php if($slide['title']): ?>
                                            <h3 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                        <?php endif; ?>

                                        <div class="b-button services-b-btton bdevs-el-reptr-btn">
                                            <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                printf(
                                                    '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string('button_' . $key),
                                                    esc_html($slide['button_text'])
                                                );
                                            elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                if ($slide['button_icon_position'] === 'before') : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                <?php
                                                else : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                            <?php
                                                endif;
                                            endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- features-area-end -->

        <?php elseif ( $settings['designs'] === 'design_15' ): 

            if (!empty($settings['button_link'])) {
                $this->add_render_attribute('button', 'class', 'dp-up-btn bdevs-el-btn');
                $this->add_link_attributes('button', $settings['button_link']);
            }
        ?>

        <!-- project-area-start -->
        <div class="project-area wow fadeInUp bdevs-el-content" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($settings['slides'] as $key => $slide): 
                        $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-reptr-btn');
                        $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                        ?>
                        <div class="col-xl-6 col-lg-5 col-md-6 col-sm-12">
                            <div class="single-project ">
                                <div class="inner-project">
                                    <div class="project-text">
                                        <div class="project-link-info">
                                            <div class="project-link f-left">
                                                <?php if($slide['tag1']): ?>
                                                    <a class="bdevs-el-tag" href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post ($slide['tag1']); ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="project-meta f-right">
                                                <?php if($slide['number']): ?>
                                                    <a class="bdevs-el-title" href="<?php echo esc_url($slide['f_url']); ?>">
                                                        <i class="far fa-heart"></i> 
                                                        <?php echo wp_kses_post($slide['number']); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="project-content">
                                            <?php if($slide['title']): ?>
                                                <h3 class="bdevs-el-title"><a class="bdevs-el-title" href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                            <?php endif; ?>
                                        </div>
                                        <div class="project-button">
                                            <div class="b-button b-02-button f-left bdevs-el-reptr-btn">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf(
                                                        '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                    <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before') : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                    else : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                            <div class="project-b-button f-right">
                                                <a href="<?php echo esc_url($slide['f_url']); ?>"><i class="far fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="projects-button text-center mt-20">
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
        <!-- project-area-start -->



        <?php elseif ( $settings['designs'] === 'design_14' ): 
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

        <!-- features-02-area-start -->
        <div class="features-02-area pos-rel grey-bg bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="features-bg-img" data-background="<?php print esc_url($bg_image); ?>">
                <div class="play-video-icon">
                    <a class="popup-video bdevs-el-video-btn bdevs-el-popup-video play-btn-style" href="<?php echo esc_url($settings['video_url']); ?>"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6">
                        <div class="features-02-wrapper">
                            <div class="about-us-wrapper">
                                <div class="section-title pos-rel mb-35">
                                    <?php if($settings['sub_title']): ?>
                                        <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if($settings['title']): ?>
                                        <h2 class="bdevs-el-title"><?php echo wp_kses_post($settings['title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <div class="features-02-link">
                                    <ul>
                                        <?php foreach ( $settings['slides'] as $slide ): ?>
                                            <li>
                                                <div class="features-02-icon f-left">
                                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                            $this->get_render_attribute_string('image');
                                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                                        ?>
                                                            <figure>
                                                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                                            </figure>
                                                        <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                            <figure>
                                                                <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                                            </figure>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="features-02-info">
                                                    <h3><?php echo wp_kses_post($slide['title']); ?></h3>
                                                    <p><?php echo wp_kses_post($slide['description']); ?></p>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="about-button mt-30">
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
        </div>
        <!-- features-02-area-end -->


        <?php elseif ( $settings['designs'] === 'design_13' ): ?>

        <!-- our office area start -->
        <section class="office-location-area p-relative bdevs-el-content">
            <div class="office-map">
                <iframe src="<?php echo esc_url( $settings['map_url'] ); ?>">
                </iframe>
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-7">
                            <div class="office-wrapper">
                                <?php foreach ( $settings['slides'] as $slide ): ?>
                                    <div class="office-item">
                                        <?php if ($slide['title']) : ?>
                                            <h4 class="bdevs-el-title">
                                                <?php echo wp_kses_post($slide['title']); ?>
                                            </h4>
                                        <?php endif; ?>
                                        <div class="office-content">
                                            <div class="singel-addresss">
                                                <span class="bdevs-el-location">
                                                    <i class="far fa-map-marker-alt"></i>
                                                </span>
                                                <?php if ($slide['location']) : ?>
                                                    <span class="bdevs-el-location">
                                                        <?php echo wp_kses_post($slide['location']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="singel-addresss">
                                                <a href="<?php echo esc_url($slide['email_url']); ?>">
                                                    <span class="bdevs-el-email">
                                                        <i class="far fa-envelope"></i></span></i>
                                                    </span>
                                                    <?php if ($slide['email']) : ?>
                                                        <span class="bdevs-el-email">
                                                            <?php echo wp_kses_post($slide['email']); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="singel-addresss">
                                                <a href="<?php echo esc_url($slide['phone_url']); ?>">
                                                    <span class="bdevs-el-phone">
                                                        <i class="far fa-phone-alt"></i>
                                                    </span>
                                                    <?php if ($slide['phone']) : ?>
                                                        <span class="bdevs-el-phone">
                                                            <?php echo wp_kses_post($slide['phone']); ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- our office area end -->

        <?php elseif ( $settings['designs'] === 'design_12' ):

            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (!$bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        ?>
        <!-- laction map area start -->
        <section class="location-map-area devs-el-content">
            <div class="container">
                <div class="location-map-bg" data-background="<?php print esc_url($bg_image); ?>">
                    <?php foreach ( $settings['slides'] as $slide ): 
                        $country_img = wp_get_attachment_image_url($slide['country_img']['id'], $settings['thumbnail_size']);
                        if (!$country_img) {
                            $country_img = $slide['country_img']['url'];
                        }
                        ?>
                        <div class="location-item">
                            <div class="location-icon">
                                <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                    $this->get_render_attribute_string('image');
                                    $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                    <figure>
                                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                    </figure>
                                <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                    <figure>
                                        <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                    </figure>
                                <?php endif; ?>
                            </div>
                            <div class="location-content">
                                <div class="location-counrty">
                                    <img src="<?php print esc_url($country_img); ?>" alt="country-img">
                                </div>
                                <?php if ($slide['title']) : ?>
                                    <div class="location-text">
                                        <span class="bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </section>
      <!-- laction map area end -->

        <?php elseif ( $settings['designs'] === 'design_11' ):
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        ?>

        <div class="loaction-box mb-30">
            <div class="laction-county">
                <ul>
                    <?php foreach ( $settings['slides'] as $slide ): ?>
                        <li>
                            <span><a href="<?php echo esc_url( $slide['f_url'] ); ?>">
                                <i class="<?php echo esc_attr($slide['list_icon']['value']); ?>"></i></a>
                            </span>
                            <?php if ($slide['title']) : ?>
                                <span><a href="<?php echo esc_url( $slide['f_url'] ); ?>" class="bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></a></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <?php elseif ( $settings['designs'] === 'design_10' ):
            $this->add_render_attribute('title', 'class', 'bdevs-el-title');
        ?>

        <!-- partner area start  -->
        <section class="partner-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ): ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="partner-item mb-30">
                                <div class="partner-thumb">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                    ?>
                                        <figure>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <figure>
                                            <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                                <div class="partner-content">
                                    <?php if ($slide['title']) : ?>
                                        <h3>
                                            <a href="<?php echo esc_url( $slide['f_url'] ); ?>" class="bdevs-el-title">
                                                <?php echo wp_kses_post($slide['title']); ?>
                                            </a>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if ($slide['description']) : ?>
                                        <p><?php echo wp_kses_post($slide['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- partner area end  -->

        <?php elseif ( $settings['designs'] === 'design_9' ):
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        ?>

        <!-- job area start -->
        <section class="job-area bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="container">
                <div class="row">
                    <?php foreach ($settings['slides'] as $key => $slide):
                       $this->add_render_attribute('button_' . $key, 'class', 'job-btn bdevs-el-btn');
                       $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                    ?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="job-wrapper mb-30">
                                <div class="job-instructor-profile">
                                    <div class="job-instructor-img">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                            <figure>
                                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                        <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <div class="job-instructor-title">
                                        <div class="job-tag mb-20">
                                            <?php if ($slide['tag1']) : ?>
                                                <span class="tag-normal bdevs-el-tag">
                                                    <?php echo wp_kses_post($slide['tag1']); ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ($slide['tag2']) : ?>
                                                <span class="tag-urgent bdevs-el-tag">
                                                    <?php echo wp_kses_post($slide['tag2']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($slide['title']) : ?>
                                            <h3>
                                                <a href="<?php echo esc_url( $slide['f_url'] ); ?>" class="bdevs-el-title">
                                                    <?php echo wp_kses_post($slide['title']); ?>
                                                </a>
                                            </h3>
                                        <?php endif; ?>
                                        <div class="job-meta mt-15">
                                            <?php if ($slide['location']) : ?>
                                                <span class="bdevs-el-location">
                                                    <i class="far fa-map-marker-alt"></i>
                                                    <?php echo wp_kses_post($slide['location']); ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ($slide['meta']) : ?>
                                                <span class="bdevs-el-meta">
                                                    <i class="fal fa-usd-circle"></i>
                                                    <?php echo wp_kses_post($slide['meta']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="job-btn-inner mt-30">
                                            <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                printf(
                                                    '<a %1$s>%2$s</a>',
                                                    $this->get_render_attribute_string('button_' . $key),
                                                    esc_html($slide['button_text'])
                                                );
                                            elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                if ($slide['button_icon_position'] === 'before') : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                <?php
                                                else : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                            <?php
                                                endif;
                                            endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- job area end -->

        <?php elseif ( $settings['designs'] === 'design_8' ):
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        ?>

        <!-- dp-tmd__qualification Start Here  -->
        <div class="tmd__qualification wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="tmd__education">
                <ul>
                    <?php foreach ( $settings['slides'] as $slide ): ?>
                        <li>
                            <div class="edu-icon">
                                <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                $this->get_render_attribute_string('image');
                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                <figure>
                                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                </figure>
                                <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                    <figure>
                                        <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                    </figure>
                                <?php endif; ?>
                            </div>
                            <div class="edu-text">
                                <?php if ($slide['title']) : ?>
                                    <h5 class="bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></h5>
                                <?php endif; ?>
                                <?php if ($slide['description']) : ?>
                                    <p><?php echo wp_kses_post($slide['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- dp-tmd__qualification end Here  -->

        <?php elseif ( $settings['designs'] === 'design_7' ):
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        ?>

        <!-- dp-portfolio-details-area Start Here  -->
        <section class="dp-portfolio-details-iconbox">
            <div class="row portfolio__sd-box">
                <?php foreach ( $settings['slides'] as $slide ): ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio__sd-box-content mb-25">
                            <div class="portfolio_dp_icon">
                                <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                $this->get_render_attribute_string('image');
                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                ?>
                                <figure>
                                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                </figure>
                                <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                    <figure>
                                        <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                    </figure>
                                <?php endif; ?>
                            </div>
                            <?php if ($slide['title']) : ?>
                                <h6 class="bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></h6>
                            <?php endif; ?>
                            <?php if ($slide['description']) : ?>
                                <p><?php echo wp_kses_post($slide['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- dp-portfolio-details-area end Here  -->

        <?php elseif ( $settings['designs'] === 'design_6' ):
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        ?>
        <!-- Services 3 Area Start Here  -->
        <section class="services__3">
            <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">

                <div class="row">
                    <?php foreach ($settings['slides'] as $slide) : ?>
                        <div class="col-xl-4 col-md-6">
                                <div class="services__3-item bdevs-el-content mb-30">
                                    <?php if ($slide['number']) : ?>
                                        <div class="services__3-item-num">
                                            <h3><?php echo wp_kses_post($slide['number']); ?></h3>
                                        </div>
                                    <?php endif; ?>
                                    <div class="services__3-item-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <figure>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                        <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($slide['title']) : ?>
                                        <h3 class="services__3-item-title bdevs-el-title"><a href="<?php echo esc_url( $slide['f_url'] ); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                    <?php endif; ?>
                                    <?php if ($slide['description']) : ?>
                                        <p class="services__3-item-text "><?php echo wp_kses_post($slide['description']); ?></p>
                                    <?php endif; ?>
                                </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Services 3 Area End Here  -->

        <?php elseif ( $settings['designs'] === 'design_5' ): ?>
        <!-- Services Area Start Here  -->
        <section class="services__area pb-60">
            <div class="container">
                <div class="services-one">
                    <div class="services__box services__box--space wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                        <div class="row">
                            <?php foreach ($settings['slides'] as $key => $slide) :
                                $this->add_render_attribute('button_' . $key, 'class', 'bdevs-el-btn');
                                $this->add_render_attribute('button_' . $key, 'href', $slide['button_link']['url']);
                            ?>
                                <div class="col-lg-3 col-xl-3 col-md-6">
                                    <div class="services__item text-center">
                                        <div class="services__item-icon">
                                            <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                $this->get_render_attribute_string('image');
                                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                            <figure>
                                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                            <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                <figure>
                                                    <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                                </figure>
                                            <?php endif; ?>
                                        </div>
                                        <div class="services__item-content bdevs-el-content">
                                            <?php if ($slide['title']) : ?>
                                                <h3 class="dp-fea-title-03 bdevs-el-title"><a href="<?php echo esc_url( $slide['f_url'] ); ?>"><?php echo wp_kses_post($slide['title']); ?></a></h3>
                                            <?php endif; ?>

                                            <?php if ($slide['description']) : ?>
                                                <p><?php echo wp_kses_post($slide['description']); ?>
                                                </p>
                                            <?php endif; ?>
                                            <div class="services__item-btn">
                                                <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                    printf(
                                                        '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string('button_' . $key),
                                                        esc_html($slide['button_text'])
                                                    );
                                                elseif (empty($slide['button_text']) && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) : ?>
                                                    <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                    <?php elseif ($slide['button_text'] && ((!empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || !empty($slide['button_icon']))) :
                                                    if ($slide['button_icon_position'] === 'before') : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                    <?php
                                                    else : ?>
                                                        <a <?php $this->print_render_attribute_string('button_' . $key); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php bdevs_elementor_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></span></a>
                                                <?php
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End Here  -->

        <?php elseif ( $settings['designs'] === 'design_4' ):

            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            }
        ?>
        <!-- Work Precess Start Here  -->
        <section class="works">
            <div class="container">
                <div class="work__wrapper p-relative wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="row align-items-center align-items-xxl-end">
                        <div class="col-xl-5 col-lg-5">
                            <div class="work__content">
                                <div class="section__title mb-45">
                                    <?php if ($settings['sub_title']) : ?>
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
                                <div class="work__content-list pr-60">
                                    <?php foreach ($settings['slides'] as $slide) : ?>
                                        <div class="work__item bdevs-el-content">
                                            <div class="work__item-num">
                                                <?php if ($slide['number']) : ?>
                                                    <h5><?php echo wp_kses_post($slide['number']); ?></h5>
                                                <?php endif; ?>
                                            </div>
                                            <div class="work__item-text">
                                                <?php if ($slide['title']) : ?>
                                                    <h4 class="dp-contact-info-title2"><?php echo wp_kses_post($slide['title']); ?></h4>
                                                <?php endif; ?>
                                                <?php if ($slide['description']) : ?>
                                                    <p><?php echo wp_kses_post($slide['description']); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="work__img white-bg p-relative ml-30">
                                <?php if ( !empty($image) ) : ?>
                                    <img src="<?php print esc_url($image); ?>" alt="Work">
                                <?php endif; ?>
                                <div class="work__btn">
                                    <a href="<?php echo esc_url($settings['video_url']); ?>" class="popup-video dp-play-btn play-btn-white"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Work Precess End Here  -->


        <?php elseif ( $settings['designs'] === 'design_3' ):

            if (!empty($settings['image']['id'])) {
                $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
            }
            $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        ?>

        <!-- approach area start  -->
        <section class="approach__area fix">
            <?php if ( !empty($image) ) : ?>
                <div class="approach__img m-img">
                    <img src="<?php print esc_url($image); ?>" alt="approach">
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="row g-0 justify-content-end">
                    <div class="col-lg-6">
                        <div class="approach__content bdevs-el-content wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <div class="section__title mb-35">
                                <?php if ($settings['sub_title']) : ?>
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
                            <div class="approach__text">
                                <?php if ($settings['description']) : ?>
                                    <p><?php echo wp_kses_post($settings['description']); ?>
                                    </p>
                                <?php endif; ?>
                                <ul>
                                    <?php foreach ( $settings['slides'] as $slide ): ?>
                                        <li><i class="fal fa-check-circle"></i><?php echo wp_kses_post( $slide['title'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- approach area end -->

        <?php elseif ( $settings['designs'] === 'design_2' ):

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'contact-btn bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }
        ?>
        <div class="team__founder-info wow fadeInUp mb-45" data-wow-duration="1.5s" data-wow-delay=".3s">
            <?php foreach ($settings['slides'] as $slide) : ?>
                <div class="team__founder-item">

                    <div class="team__founder-item-icon">
                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                        $this->get_render_attribute_string('image');
                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                        ?>
                        <figure>
                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                        </figure>
                        <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                            <figure>
                                <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                            </figure>
                        <?php endif; ?>
                    </div>

                    <div class="team__founder-text">
                    <?php if ($slide['title']) : ?>
                        <span class="title bdevs-el-title"><?php echo wp_kses_post($slide['title']); ?></span>
                    <?php endif; ?>
                    <?php if ($slide['contact_title']) : ?>
                        <h4 class="contact"><a href="<?php echo esc_url($slide['f_url']); ?>">
                        <?php echo wp_kses_post($slide['contact_title']); ?></a>
                    </h4>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <?php else:

            $this->add_inline_editing_attributes( 'title', 'basic' );

            if ( !empty($settings['button_link']) ) {
                $this->add_render_attribute( 'button', 'class', 'edu-six-btn bdevs-el-btn' );
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            if ( !empty($settings['image']['id']) ) {
                $image = wp_get_attachment_image_url( $settings['image']['id'], $settings['thumbnail_size'] );
            }

        ?>

        <div class="contact__info">
            <div class="row">
                <?php foreach ($settings['slides'] as $slide) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact__shadow">
                            <div class="contact__info-item mb-30">
                                <div class="contact__info-text">
                                    <?php if ($slide['title']) : ?>
                                        <span><?php echo wp_kses_post($slide['title']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['contact_title'])) : ?>
                                        <h3 class="dp-contact-info-title"><a href="<?php echo esc_url($slide['f_url']); ?>"><?php echo wp_kses_post($slide['contact_title']); ?></a></h3>
                                    <?php endif; ?>
                                </div>
                                <div class="contact__info-icon">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                    ?>
                                        <figure>
                                            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                        </figure>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <figure>
                                            <?php \Elementor\Icons_Manager::render_icon($slide['icon'], ['aria-hidden' => 'true']); ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php endif; ?>

        <?php
    }

}
