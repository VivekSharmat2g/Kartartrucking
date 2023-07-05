<?php

/**
 * delport customizer
 *
 * @package delport
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function delport_customizer_panels_sections($wp_customize)
{

    //Add panel
    $wp_customize->add_panel('delport_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Delport Customizer', 'delport'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Topbar Setting', 'delport'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('header_social', [
        'title'       => esc_html__('Header Social', 'delport'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('footer_social', [
        'title'       => esc_html__('Footer Social', 'delport'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'delport'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'delport'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'delport'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'delport'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'delport'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'delport'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'delport'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'delport'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'delport'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => esc_html__('Slug Settings', 'delport'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'delport_customizer',
    ]);
}

add_action('customize_register', 'delport_customizer_panels_sections');

function _header_top_fields($fields)
{

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'delport_preloader_icon',
        'label'       => esc_html__('Preloader Image', 'delport'),
        'description' => esc_html__('Upload Your Image.', 'delport'),
        'section'     => 'header_top_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/preloader-icon.gif',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_preloader',
        'label'    => esc_html__('Preloader On/Off', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_search',
        'label'    => esc_html__('Serach On/Off', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_header_right',
        'label'    => esc_html__('Header Right On/Off', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];


    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_button_text',
        'label'    => esc_html__('Button Text', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('get estimation', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'delport_button_link',
        'label'    => esc_html__('Button URL', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    //login button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_sign_btn_text',
        'label'    => esc_html__('Sign BTN Text', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Sign In', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'delport_sign_btn_link',
        'label'    => esc_html__('Sign URL', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_top_phone',
        'label'    => esc_html__('Phone Number', 'delport'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('+254 - 365 - 980', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');

/*
Header Social
 */
function _header_social_fields($fields)
{
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_fb_url',
        'label'    => esc_html__('Facebook Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_twitter_url',
        'label'    => esc_html__('Twitter Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_instagram_url',
        'label'    => esc_html__('Instagram Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_vimeo_url',
        'label'    => esc_html__('Vimeo Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_topbar_youtube_url',
        'label'    => esc_html__('Youtube Url', 'delport'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_social_fields');



/*
Footer Social
 */
function _footer_social_fields($fields)
{
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_fb_url',
        'label'    => esc_html__('Facebook Url', 'delport'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_twitter_url',
        'label'    => esc_html__('Twitter Url', 'delport'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_instagram_url',
        'label'    => esc_html__('Instagram Url', 'delport'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'delport'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_youtube_url',
        'label'    => esc_html__('Youtube Url', 'delport'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_footer_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields)
{
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'main_logo',
        'label'       => esc_html__('Header Logo', 'delport'),
        'description' => esc_html__('Upload Your Logo.', 'delport'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'slider',
        'settings'    => 'delport_logo_size',
        'label'       => esc_html__('Header Logo Size', 'delport'),
        'description' => esc_html__('Header Logo Size', 'delport'),
        'section'     => 'section_header_logo',
        'default' => '130px',
        'choices'     => [
            'min'  => 100,
            'max'  => 400,
            'step' => 4,
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');


/*
Header Side Info
 */
function _header_side_fields($fields)
{
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_side_info_hide',
        'label'    => esc_html__('Side Info On/Off', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_contact_info_hide',
        'label'    => esc_html__('Side Contact Info On/Off', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_extra_gallery',
        'label'    => esc_html__('Side Gallery On/Off', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_side_info_search_form',
        'label'    => esc_html__('Search On/Off', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_side_info_social',
        'label'    => esc_html__('Social On/Off', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_side_dec',
        'label'    => esc_html__('Side Description', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('We are a creative film and photo production company hungry for quality.', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_side_info_hide',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];



    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_instagram_title',
        'label'    => esc_html__('Instagram Title', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Instagram', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_side_info_hide',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'repeater',
        'label'    => esc_html__('Instagram Repeater', 'delport'),
        'section'  => 'header_side_setting',
        'row_label' => [
            'type'     => 'text',
            'value'    => esc_html__('Client', 'delport'),
        ],

        'button_label' => esc_html__('Add new Photo', 'delport'),
        'settings'     => 'clients_setting',
        'fields' => [
            'image_client' => [
                'type'         => 'image',
                'label'        => esc_html__('Instagram Image', 'delport'),
                'description'  => esc_attr__('Upload Instagram Image', 'delport'),
            ]
        ]
    ];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_button_text',
        'label'    => esc_html__('Button Text', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Follow US', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_side_info_hide',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'delport_extra_button_link',
        'label'    => esc_html__('Button URL', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_side_info_hide',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_contact_title',
        'label'    => esc_html__('Contact Title', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Contact Title', 'delport'),
        'priority' => 10,
    ];

    // Phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_phone_text',
        'label'    => esc_html__('Phone Text', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Call us now', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_phone',
        'label'    => esc_html__('Phone Number', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('326 222 666 00', 'delport'),
        'priority' => 10,
    ];

    // Email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_email_text',
        'label'    => esc_html__('Email Text', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Email now', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_email',
        'label'    => esc_html__('Email ID', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('info@webdow.com', 'delport'),
        'priority' => 10,
    ];

    // Address
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_address_text',
        'label'    => esc_html__('Address Text', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('12/A, New Boston Hall', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_extra_address',
        'label'    => esc_html__('Address', 'delport'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('New york, united states', 'delport'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields)
{
    // Breadcrumb Setting

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_breadcrumb_shape_switch',
        'label'    => esc_html__('Shape Show/Hide', 'delport'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'delport'),
        'description' => esc_html__('Breadcrumb Background Image', 'delport'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'delport_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'delport'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'delport'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__('Breadcrumb Info switch', 'delport'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields)
{
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'delport'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'delport'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'delport'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'delport'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'delport'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_blog_btn',
        'label'    => esc_html__('Blog Button text', 'delport'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'delport'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'delport'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'delport'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields)
{
    // Footer Setting

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__('Widget Number', 'delport'),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__('Select an option...', 'delport'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__('Widget Number 4', 'delport'),
            '3' => esc_html__('Widget Number 3', 'delport'),
            '2' => esc_html__('Widget Number 2', 'delport'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'delport_footer_bg',
        'label'       => esc_html__('Footer Background Image.', 'delport'),
        'description' => esc_html__('Footer Background Image.', 'delport'),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'delport_footer_logo',
        'label'       => esc_html__('Footer Logo', 'delport'),
        'description' => esc_html__('Upload Your Logo.', 'delport'),
        'section'     => 'footer_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'delport_footer_bg_color',
        'label'       => __('Footer BG Color', 'delport'),
        'description' => esc_html__('This is a Footer bg color control.', 'delport'),
        'section'     => 'footer_setting',
        'default'     => '#012863',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'delport_footer_bottom_bg_color',
        'label'       => __('Footer Bottom BG Color', 'delport'),
        'description' => esc_html__('This is a Footer bottom bg color control.', 'delport'),
        'section'     => 'footer_setting',
        'default'     => '#db1c29;',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_phone',
        'label'    => esc_html__('Footer Phone', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('(+88) 258 - 241 - 302', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_footer_email',
        'label'    => esc_html__('Footer Email', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('info@example.com', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'delport_footer_menu_switch',
        'label'    => esc_html__('Footer Menu On/Off', 'delport'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'delport'),
            'off' => esc_html__('Disable', 'delport'),
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'footer_privacy_link',
        'label'    => esc_html__('Privacy URL', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_footer_menu_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'footer_terms_link',
        'label'    => esc_html__('Terms URL', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_footer_menu_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'footer_contact_link',
        'label'    => esc_html__('Contact URL', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('#', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'delport_footer_menu_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_copyright',
        'label'    => esc_html__('Copy Right', 'delport'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('© 2022 All rights reserved | Design & Develop by BDevs', 'delport'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'footer_copyright_switch',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

// color
function delport_color_fields($fields)
{
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'delport_color_option',
        'label'       => __('Theme Color', 'delport'),
        'description' => esc_html__('This is a Theme color control.', 'delport'),
        'section'     => 'color_setting',
        'default'     => '#012863',
        'priority'    => 10,
    ];


    $fields[] = [
        'type'        => 'color',
        'settings'    => 'delport_primary_color_option',
        'label'       => __('Primary Color', 'delport'),
        'description' => esc_html__('This is a Primary color control.', 'delport'),
        'section'     => 'color_setting',
        'default'     => '#DB1C29',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'delport_color_fields');

// 404
function delport_404_fields($fields)
{
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'delport_404_bg',
        'label'       => esc_html__('404 Image.', 'delport'),
        'description' => esc_html__('404 Image.', 'delport'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_error_title',
        'label'    => esc_html__('Not Found Title', 'delport'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'delport'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'delport_error_desc',
        'label'    => esc_html__('404 Description Text', 'delport'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'delport'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_error_link_text',
        'label'    => esc_html__('404 Link Text', 'delport'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'delport'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'delport_404_fields');



/**
 * Added Fields
 */
function delport_typo_fields($fields)
{
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'delport'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'delport_typo_fields');




/**
 * Added Fields
 */
function delport_slug_setting($fields)
{
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_ev_slug',
        'label'    => esc_html__('Event Slug', 'delport'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourevent', 'delport'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'delport_port_slug',
        'label'    => esc_html__('Portfolio Slug', 'delport'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourportfolio', 'delport'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'delport_slug_setting');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function DELPORT_THEME_option($name)
{
    $value = '';
    if (class_exists('delport')) {
        $value = Kirki::get_option(delport_get_theme(), $name);
    }

    return apply_filters('DELPORT_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function delport_get_theme()
{
    return 'delport';
}
