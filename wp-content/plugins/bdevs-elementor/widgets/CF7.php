<?php

namespace Bdevs\Elementor;

defined('ABSPATH') || die();

class CF7 extends \Generic\Elements\GenericWidget
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
        return 'cust-contact-form';
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
        return __('Contact Form', 'bdevs-elementor');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net/bdevselementor/contact-form/';
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
        return 'eicon-save-o gen-icon';
    }

    public function get_keywords()
    {
        return ['skill', 'blurb', 'infobox', 'contact form', 'block', 'box'];
    }

    public function get_categories()
    {
        return ['bdevs-elementor'];
    }

    // Get Social Profile
    protected static function get_profile_names()
    {
        return [
            'fal fa-comments' => __('Comments', 'bdevs-elementor'),
            'apple' => __('Apple', 'bdevs-elementor'),
            'behance' => __('Behance', 'bdevs-elementor'),
            'bitbucket' => __('BitBucket', 'bdevs-elementor'),
            'codepen' => __('CodePen', 'bdevs-elementor'),
            'delicious' => __('Delicious', 'bdevs-elementor'),
            'deviantart' => __('DeviantArt', 'bdevs-elementor'),
            'digg' => __('Digg', 'bdevs-elementor'),
            'dribbble' => __('Dribbble', 'bdevs-elementor'),
            'email' => __('Email', 'bdevs-elementor'),
            'facebook' => __('Facebook', 'bdevs-elementor'),
            'flickr' => __('Flicker', 'bdevs-elementor'),
            'foursquare' => __('FourSquare', 'bdevs-elementor'),
            'github' => __('Github', 'bdevs-elementor'),
            'houzz' => __('Houzz', 'bdevs-elementor'),
            'instagram' => __('Instagram', 'bdevs-elementor'),
            'jsfiddle' => __('JS Fiddle', 'bdevs-elementor'),
            'linkedin' => __('LinkedIn', 'bdevs-elementor'),
            'medium' => __('Medium', 'bdevs-elementor'),
            'pinterest' => __('Pinterest', 'bdevs-elementor'),
            'product-hunt' => __('Product Hunt', 'bdevs-elementor'),
            'reddit' => __('Reddit', 'bdevs-elementor'),
            'slideshare' => __('Slide Share', 'bdevs-elementor'),
            'snapchat' => __('Snapchat', 'bdevs-elementor'),
            'soundcloud' => __('SoundCloud', 'bdevs-elementor'),
            'spotify' => __('Spotify', 'bdevs-elementor'),
            'stack-overflow' => __('StackOverflow', 'bdevs-elementor'),
            'tripadvisor' => __('TripAdvisor', 'bdevs-elementor'),
            'tumblr' => __('Tumblr', 'bdevs-elementor'),
            'twitch' => __('Twitch', 'bdevs-elementor'),
            'twitter' => __('Twitter', 'bdevs-elementor'),
            'vimeo' => __('Vimeo', 'bdevs-elementor'),
            'vk' => __('VK', 'bdevs-elementor'),
            'website' => __('Website', 'bdevs-elementor'),
            'whatsapp' => __('WhatsApp', 'bdevs-elementor'),
            'wordpress' => __('WordPress', 'bdevs-elementor'),
            'xing' => __('Xing', 'bdevs-elementor'),
            'yelp' => __('Yelp', 'bdevs-elementor'),
            'youtube' => __('YouTube', 'bdevs-elementor'),
        ];
    }

    // Get Contact Form
    public function get_tp_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $tp_cfa         = array();
        $tp_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $tp_forms       = get_posts( $tp_cf_args );
        $tp_cfa         = ['0' => esc_html__( 'Select Form', 'bdevs-elementor' ) ];
        if( $tp_forms ){
            foreach ( $tp_forms as $tp_form ){
                $tp_cfa[$tp_form->ID] = $tp_form->post_title;
            }
        }else{
            $tp_cfa[ esc_html__( 'No contact form found', 'bdevs-elementor' ) ] = 0;
        }
        return $tp_cfa;
    }

    // register_content_controls
    protected function register_content_controls() {
        $this->design_style();
        $this->title_and_desc();
        $this->contact_form07();
        $this->images_content_controls();
        $this->about_contact_info();
        $this->button_content_controls();
        $this->social_profile();
        $this->contact_info_list();
    }

    // Design Style Content Controls
    public function design_style() {
        $this->start_controls_section(
            '_section_design_title',
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
                    'design_6' => __('Design 6', 'bdevs-elementor'),
                    'design_7' => __('Design 7', 'bdevs-elementor'),
                    'design_8' => __('Design 8', 'bdevs-elementor'),
                    'design_9' => __('Design 9', 'bdevs-elementor'),
                ],
                'default' => 'design_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // Title and Description Content Controls
    public function title_and_desc() {
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_6', 'design_7', 'design_8', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'shape_switch',
            [
                'label' => __('Shape SWITCHER', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
                'condition' => [
                    'designs' => ['design_5'],
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
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_6', 'design_7', 'design_8', 'design_9'],
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
                ],
                'condition' => [
                    'designs' => ['design_1', 'design_2', 'design_6', 'design_7', 'design_8', 'design_9'],
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
                    'designs!' => ['design_6', 'design_7', 'design_8', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'placehorder',
            [
                'label'       => __('Placeholder', 'bdevs-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Search...', 'bdevs-elementor'),
                'placeholder' => __('Enter Placeholder', 'bdevs-elementor'),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_6', 'design_7', 'design_8', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'submit_text',
            [
                'label' => __('Button Text', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('button text', 'bdevs-elementor'),
                'placeholder' => __('Type button text', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_6', 'design_7', 'design_8', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label' => __('Phone Number', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('785 680 659 00', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box phone Number', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_6', 'design_7', 'design_8', 'design_9'],
                ],
            ]
        );

        $this->add_control(
            'address',
            [
                'label' => __('Address', 'bdevs-elementor'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('12/A, New York, US', 'bdevs-elementor'),
                'placeholder' => __('Type Info Box Address', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_6', 'design_7', 'design_8', 'design_9'],
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

    // contact_form07
    public function contact_form07() {
        $this->start_controls_section(
            'tpcore_contact',
            [
                'label' => esc_html__('Contact Form', 'bdevs-elementor'),
            ]
        );

        $this->add_control(
            'tpcore_select_contact_form',
            [
                'label'   => esc_html__( 'Select Form', 'bdevs-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => $this->get_tp_contact_form(),
            ]
        );

        $this->end_controls_section();
    }

    // images
    public function images_content_controls() {
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_1','design_2', 'design_8', 'design_9'],
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
            ]
        );

        $this->add_control(
            'shape_image',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => __('Shape Image', 'bdevs-elementor'),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'designs!' => ['design_1','design_2','design_3','design_4','design_5','design_6','design_7','design_9'],
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

    // about_contact_info
    public function about_contact_info()
    {
        $this->start_controls_section(
            '_about_info',
            [
                'label' => __('About info', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_9'],
                ],
            ]
        );

        $this->add_control(
            'about_number_title',
            [
                'label' => __('Number Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Number Title', 'bdevs-elementor'),
                'placeholder' => __('Number Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_phone_number',
            [
                'label' => __('Phone Number', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('00 211 232 000', 'bdevs-elementor'),
                'placeholder' => __('00 211 232 000', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_phone_icon',
            [
                'label' => __( 'Phone Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
            ]
        );

        // about_mail_info
        $this->add_control(
            'about_mail_info_title',
            [
                'label' => __('Mail Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Info Mail Title', 'bdevs-elementor'),
                'placeholder' => __('About Info Mail Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'about_info_mail',
            [
                'label' => __('Email', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('info@webmail.com', 'bdevs-elementor'),
                'placeholder' => __('info@webmail.com', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'about_mail_icon',
            [
                'label' => __( 'Mail Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-envelope-open-text',
                    'library' => 'solid',
                ],
            ]
        );

        // location_info
        $this->add_control(
            'location_sub_title',
            [
                'label' => __('Location Sub Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Location Sub Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'location_title',
            [
                'label' => __('Location Title', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Bdevs Location Title', 'bdevs-elementor'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'location_icon',
            [
                'label' => __( 'Lcation Icon', 'bdevs-elementor' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // contact_info_list
    public function contact_info_list(){
        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Contact List', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_20'],
                ],
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

                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevs-elementor'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevs-elementor'),
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
                'label' => esc_html__('Icon', 'bdevs-elementor'),
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
            'tab_sub_title',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Info Sub Title', 'bdevs-elementor'),
                'default' => __('Info Sub Title', 'bdevs-elementor'),
                'placeholder' => __('Type sub title here', 'bdevs-elementor'),
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
                'label' => __('Info Title', 'bdevs-elementor'),
                'default' => __('Info Title', 'bdevs-elementor'),
                'placeholder' => __('Type title here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'info_url',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Info URL', 'bdevs-elementor'),
                'default' => __('Info URL', 'bdevs-elementor'),
                'placeholder' => __('Type url here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'tab_content',
            [
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type content here', 'bdevs-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_10'],
                ],
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

    // button
    public function button_content_controls(){
        // Button 01
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_40'],
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

    // social_profile
    public function social_profile() {
        $this->start_controls_section(
            '_section_social',
            [
                'label' => __('Social Profiles', 'bdevs-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'designs' => ['design_40'],
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => __('Profile Name', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => __('Profile Link', 'bdevs-elementor'),
                'placeholder' => __('Add your profile link', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'label_block' => true,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email', [
                'label' => __('Email Address', 'bdevs-elementor'),
                'placeholder' => __('Add your email address', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
                'input_type' => 'email',
                'condition' => [
                    'name' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'customize',
            [
                'label' => __('Want To Customize?', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevs-elementor'),
                'label_off' => __('No', 'bdevs-elementor'),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->start_controls_tabs(
            '_tab_icon_colors',
            [
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __('Normal', 'bdevs-elementor'),
            ]
        );

        $repeater->add_control(
            'color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->start_controls_tab(
            '_tab_icon_hover',
            [
                'label' => __('Hover', 'bdevs-elementor'),
            ]
        );

        $repeater->add_control(
            'hover_color',
            [
                'label' => __('Text Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:focus' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'hover_bg_color',
            [
                'label' => __('Background Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:focus' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'hover_border_color',
            [
                'label' => __('Border Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .bdevs-member-links > {{CURRENT_ITEM}}:focus' => 'border-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ],
            ]
        );

        $this->add_control(
            'show_profiles',
            [
                'label' => __('Show Profiles', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevs-elementor'),
                'label_off' => __('Hide', 'bdevs-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls() {
       $this->title_description_style_controls();
       $this->about_contact_info_style();
    }

    // title_description_style_controls
    protected function title_description_style_controls() {

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title & Description', 'bdevs-elementor'),
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

        $this->end_controls_section();



    }

    // about_contact_info_style
    protected function about_contact_info_style()
    {
        $this->start_controls_section(
            '_section_about_style_content',
            [
                'label' => __('About Contact Info', 'bdevs-elementor'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designs' => ['design_9'],
                ],
            ]
        );

        // About Number
        $this->add_control(
            '_about_number',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('About Number Title', 'bdevs-elementor'),
            ]
        );

        $this->add_responsive_control(
            'nubmer_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'number_title_color',
            [
                'label' => __('Number Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typo',
                'selector' => '{{WRAPPER}} .bdevs-el-number-title',
            ]
        );

        $this->add_control(
            '_about_numbers',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Number', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __('Number Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_title',
                'selector' => '{{WRAPPER}} .bdevs-el-number',
            ]
        );

        $this->add_control(
            '_number_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Phone Icon', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'number_icon_color',
            [
                'label' => __('Phone Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-number-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Phone_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-number-icon',
            ]
        );

        // mail_title
        $this->add_control(
            '_mail_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Mail Title', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'mail_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'mail_title_color',
            [
                'label' => __('Mail Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_title',
                'selector' => '{{WRAPPER}} .bdevs-el-mail-title',
            ]
        );

        $this->add_control(
            '_about_mails',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Email', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'mail_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_typo',
                'selector' => '{{WRAPPER}} .bdevs-el-mail',
            ]
        );

        $this->add_control(
            '_mail_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Mail Icon', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'mail_icon_color',
            [
                'label' => __('Mail Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-mail-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mail_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-mail-icon',
            ]
        );



        // location_title
        $this->add_control(
            '_location_title',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Location', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'location_sub_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-location-sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'location_sub_title_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-location-sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'location_sub_title',
                'selector' => '{{WRAPPER}} .bdevs-el-location-sub-title',
            ]
        );

        $this->add_control(
            '_location_mails',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Location Title', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'location_color',
            [
                'label' => __('Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-location-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'location_typo',
                'selector' => '{{WRAPPER}} .bdevs-el-location-title',
            ]
        );

        $this->add_control(
            '_location_icon',
            [
                'type' => \Elementor\Controls_Manager::HEADING,
                'label' => __('Location Icon', 'bdevs-elementor'),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'location_icon_color',
            [
                'label' => __('Location Icon Color', 'bdevs-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-location-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'location_icon',
                'selector' => '{{WRAPPER}} .bdevs-el-location-icon',
            ]
        );
        $this->end_controls_section();
    }


    // Render Function
    protected function render()
    {
        $settings = $this->get_settings_for_display();
    ?>

    <?php if ($settings['designs'] === 'design_2'):
        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
    ?>

    <!-- Price CTA Area Start Here  -->
    <section class="price__cta pt-120 bg-css" data-background="<?php echo esc_url($image); ?>">
        <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <div class="row justify-content-end">
                <div class="col-xxl-7 col-xl-8">
                    <div class="price__cta-content-shadow">
                        <div class="price__cta-content">
                            <div class="section__title mb-55">
                                <?php if ($settings['sub_title']) : ?>
                                    <span class="sub_title bdevs-el-subtitle">
                                        <?php echo wp_kses_post($settings['sub_title']); ?>
                                    </span>
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
                            <div class="price__cta-form">
                                <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                                    <div class="form-wrapper">
                                        <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                                    </div>
                                <?php else : ?>
                                    <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Price CTA Area End Here  -->

    <?php elseif ($settings['designs'] === 'design_3'): ?>
        <div class="contact-form wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
            <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                <div class="form-wrapper">
                    <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                </div>
            <?php else : ?>
                <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
            <?php endif; ?>
        </div>

    <?php elseif ($settings['designs'] === 'design_4'): ?>

        <div class="sd-form tmd-form wow fadeInUp2" data-wow-duration="1.5s" data-wow-delay=".3s">
            <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                <div class="form-wrapper">
                    <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                </div>
            <?php else : ?>
                <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
            <?php endif; ?>
        </div>

    <?php elseif ($settings['designs'] === 'design_5'): ?>

    <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
        <div class="product-action">
            <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
        </div>
        <?php else : ?>
            <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
    <?php endif; ?>


    <?php elseif ($settings['designs'] === 'design_6'):
       $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
    ?>

    <!-- appiontment-area-start -->
    <div class="appiontment-area appiontment-area-four wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-10 col-sm-12">
                    <div class="appiontment-wrapper app-wrapper mb-30">
                        <div class="section-title pos-rel mb-50">
                            <?php if($settings['sub_title']): ?>
                                <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                            <?php endif ?>

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

                        <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                            <div class="appiontment-form">
                                <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                            </div>
                        <?php else : ?>
                            <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- appiontment-area-end -->

    <?php elseif ($settings['designs'] === 'design_7'):
       $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

    ?>

    <!-- appiontment-area-start -->
    <div class="appiontment-02-area bdevs-el-content">
        <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title white-title section-2 text-center pos-rel mb-50">

                        <span class="border-left-1 border-left-white"></span>
                        <?php if($settings['sub_title']): ?>
                            <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                        <?php endif ?>
                        <span class="border-right-1 border-right-white"></span>

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
            <div class="row">
                <div class="col-xl-12">
                    <div class="appiontment-03-wrapper">

                        <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                            <div class="appiontment-form">
                                <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                            </div>
                        <?php else : ?>
                            <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- appiontment-area-end -->


    <?php elseif ($settings['designs'] === 'design_8'):
       $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        if (!empty($settings['image']['url'])) {
            $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
            $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        }

        if (!empty($settings['shape_image']['url'])) {
            $shape_image = !empty($settings['shape_image']['id']) ? wp_get_attachment_image_url($settings['shape_image']['id'], $settings['thumbnail_size']) : $settings['shape_image']['url'];
            $shape_image_alt = get_post_meta($settings["shape_image"]["id"], "_wp_attachment_image_alt", true);
        }

    ?>

    <!-- newsletters-area-start -->
    <div class="newsletters-area newsletters-area-six pos-rel bdevs-el-content">

        <?php if (!empty($shape_image)) : ?>
            <div class="newsletters-shape-img d-none d-xl-block">
                <img src="<?php print esc_url($shape_image); ?>" alt="">
            </div>
        <?php endif; ?>

        <?php if (!empty($image)) : ?>
            <div class="newsletters-img d-none d-xl-block">
                <img src="<?php print esc_url($image); ?>" alt="">
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row align-items-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                <div class="col-xl-6 offset-xl-4  col-lg-10">
                    <div class="single-02-newsletters mb-30">
                        <div class="section-title pos-rel mb-40">

                            <?php if($settings['sub_title']): ?>
                                <span class="line bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                            <?php endif ?>

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

                        <div class="newsletter-form">
                            <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                                <div class="news-box pos-rel">
                                    <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                                </div>
                            <?php else : ?>
                                <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletters-area-end -->


    <?php elseif ($settings['designs'] === 'design_9'):
       $this->add_render_attribute('title', 'class', 'title bdevs-el-title');

        if (!empty($settings['image']['url'])) {
            $image = !empty($settings['image']['id']) ? wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']) : $settings['image']['url'];
            $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        }

    ?>

    <!-- contact-us-area-start -->
    <div class="contact-us-area bdevs-el-content" data-background="<?php echo esc_url($image); ?>">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                <div class="col-xl-12">
                    <div class="section-title white-title section-2 text-center pos-rel mb-65">
                        <span class="border-left-1 border-left-white"></span>
                        <?php if($settings['sub_title']): ?>
                                <span class="bdevs-el-subtitle"><?php echo wp_kses_post($settings['sub_title']); ?></span>
                            <?php endif ?>
                        <span class="border-right-1 border-right-white"></span>
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
            <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
                <div class="col-xl-8">
                    <div class="contact-us-wrapper mb-30">
                        <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                            <div class="contact-form">
                                <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                            </div>
                        <?php else : ?>
                            <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="single-contact-us">

                        <div class="contact-us-list">
                            <div class="contact-us-icon">
                                <i class="bdevs-el-number-icon <?php echo esc_attr($settings['about_phone_icon']['value']); ?>"></i>
                            </div>
                            <div class="contact-us-text">
                                <?php if($settings ['about_number_title']): ?>
                                    <span class="bdevs-el-number-title d-block"><?php echo wp_kses_post($settings['about_number_title']); ?></span>
                                <?php endif; ?>
                                <?php if($settings['about_phone_number']): ?>
                                    <h4 class="bdevs-el-number">
                                        <a class="bdevs-el-number" href="tel:<?php echo esc_attr($settings['about_phone_number']); ?>">
                                            <?php echo wp_kses_post($settings['about_phone_number']); ?>
                                        </a>
                                    </h4>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="contact-us-list">

                            <div class="contact-us-icon">
                                <i class="bdevs-el-mail-icon <?php echo esc_attr($settings['about_mail_icon']['value']); ?>"></i>
                            </div>
                            <div class="contact-us-text">

                                <?php if($settings['about_mail_info_title']): ?>
                                    <span class="bdevs-el-mail-title d-block"><?php echo wp_kses_post($settings['about_mail_info_title']); ?></span>
                                <?php endif; ?>

                                <?php if($settings['about_info_mail']): ?>
                                    <h4 class="bdevs-el-mail">
                                        <a class="bdevs-el-mail" href="mailto:<?php echo esc_attr($settings['about_info_mail']); ?>"><?php echo wp_kses_post($settings['about_info_mail']); ?></a>
                                    </h4>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="contact-us-list">
                            <div class="contact-us-icon">
                                <i class="bdevs-el-location-icon <?php echo esc_attr($settings['location_icon']['value']); ?>"></i>
                            </div>
                            <div class="contact-us-text">

                                <?php if($settings['location_sub_title']): ?>
                                    <span class="bdevs-el-location-sub-title d-block"><?php echo wp_kses_post($settings['location_sub_title']); ?></span>
                                <?php endif; ?>

                                <?php if($settings['location_title']): ?>
                                    <h4 class="bdevs-el-location-title">
                                        <?php echo wp_kses_post($settings['location_title']); ?>
                                    </h4>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-us-area-end -->


    <?php else:
        $this->add_render_attribute('title', 'class', 'title bdevs-el-title');
        if (!empty($settings['image']['id'])) {
            $image = wp_get_attachment_image_url($settings['image']['id'], $settings['thumbnail_size']);
        }
        ?>

        <!-- Price CTA Area Start Here  -->
        <section class="price__cta-3 price__cta3-bg p-relative">
            <?php if (!empty($image)): ?>
                <div class="price__cta-3-img d-none d-xl-block">
                    <img src="<?php echo esc_url($image); ?>" alt="cta">
                </div>
            <?php endif; ?>

            <div class="container wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".3s">
             <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6"></div>
                <div class="col-xl-6">
                   <div class="price__cta-content-3">
                        <div class="section__title mb-55">
                            <?php if ($settings['sub_title']) : ?>
                                <span class="sub_title bdevs-el-subtitle">
                                    <?php echo wp_kses_post($settings['sub_title']); ?>
                                </span>
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

                         <div class="price__cta-form">
                            <?php if (!empty($settings['tpcore_select_contact_form'])) : ?>
                                    <div class="form-wrapper">
                                        <?php echo do_shortcode('[contact-form-7  id="' . $settings['tpcore_select_contact_form'] . '"]'); ?>
                                    </div>
                                <?php else : ?>
                                    <?php echo '<div class="alert alert-info"><p class="m-0">' . __('Please Select contact form.', 'bdevs-elementor') . '</p></div>'; ?>
                            <?php endif; ?>
                      </div>
                   </div>
                </div>
             </div>
            </div>
        </section>
        <!-- Price CTA Area End Here  -->

    <?php endif; ?>
        <?php
    }
}
