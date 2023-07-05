<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package delport
 */

/**
 *
 * delport header
 */

add_action('delport_header_style', 'delport_header_default_style', 10);

// Header deafult
function delport_header_default_style()
{

    $delport_button_text = get_theme_mod('delport_button_text', __('get estimation', 'delport'));
    $delport_button_link = get_theme_mod('delport_button_link', __('#', 'delport'));
    $delport_header_right = get_theme_mod('delport_header_right', false);
    $delport_search = get_theme_mod('delport_search', false);
    $delport_menu_col = $delport_header_right ? 'col-xl-7 col-lg-7 col-md-6 col-4' : 'col-xl-10 col-lg-10 col-md-6 col-4';
?>
    <!-- header area start  -->
    <header>
        <div class="default-header header__two white-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                        <div class="logo">
                            <?php delport_header_logo(); ?>
                        </div>
                    </div>
                    <div class="<?php print esc_attr($delport_menu_col); ?>">
                        <div class="main-menu main-menu-2 t-right">
                            <nav id="mobile-menu">
                                <?php delport_header_menu(); ?>
                            </nav>
                        </div>
                        <div class="header__toggle-btn sidebar-toggle-btn text-end d-lg-none d-block">
                            <div class="header__bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($delport_header_right)) : ?>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <?php if (!empty($delport_button_text)) : ?>
                                <div class="header__two-btn lh-1 t-right d-none d-lg-block">
                                    <a href="<?php print esc_url($delport_button_link); ?>" class="fill-btn clip-btn"><?php print esc_html($delport_button_text); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- Header Side Info -->
    <?php delport_mobile_info(); ?>
    <!--End Header Side Info -->

<?php
}


// delport_mobile_info
function delport_mobile_info()
{
    $delport_contact_info_hide = get_theme_mod('delport_contact_info_hide', false);
    $delport_side_info_social = get_theme_mod('delport_side_info_social', false);
    $delport_side_info_search_form = get_theme_mod('delport_side_info_search_form', false);

    $delport_extra_phone_text = get_theme_mod('delport_extra_phone_text', __('Call us now', 'delport'));
    $delport_extra_phone = get_theme_mod('delport_extra_phone', __('326 222 666 00', 'delport'));
    $delport_extra_email_text = get_theme_mod('delport_extra_email_text', __('Email now', 'delport'));
    $delport_extra_email = get_theme_mod('delport_extra_email', __('info@webdow.com', 'delport'));
    $delport_extra_address_text = get_theme_mod('delport_extra_address_text', __('12/A, New Boston Hall', 'delport'));
    $delport_extra_address = get_theme_mod('delport_extra_address', __('New york, united states', 'delport'));
?>
    <!-- Sidebar Area Start Here  -->
    <div class="sidebar__area">
        <div class="sidebar__wrapper">
            <div class="sidebar__close">
                <button class="sidebar__close-btn" id="sidebar__close-btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="sidebar__content">
                <div class="sidebar__logo mb-40">
                    <?php delport_header_logo(); ?>
                </div>
                <?php if (!empty($delport_side_info_search_form)) : ?>
                    <div class="sidebar__search mb-25">
                        <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                            <div class="single-input-field">
                                <input type="search" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search here', 'delport'); ?>">
                                <i class="fas fa-search"></i>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

                <div class="mobile-menu fix mb-10 mean-container">
                </div>
                <?php if (!empty($delport_contact_info_hide)) : ?>
                    <div class="sidebar__contact mb-30">
                        <div class="sidebar__info fix">
                            <?php if (!empty($delport_extra_phone_text)) : ?>
                                <div class="sidebar__info-item">
                                    <div class="sidebar__info-icon">
                                        <i class="flaticon-telephone-call"></i>
                                    </div>
                                    <div class="sidebar__info-text">
                                        <span><?php print esc_html($delport_extra_phone_text); ?></span>
                                        <h5><a href="tel:<?php print esc_url($delport_extra_phone) ?>"><?php print esc_html($delport_extra_phone) ?></a></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($delport_extra_email_text)) : ?>
                                <div class="sidebar__info-item">
                                    <div class="sidebar__info-icon">
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                    <div class="sidebar__info-text">
                                        <span><?php print esc_html($delport_extra_email_text); ?></span>
                                        <h5><a href="mailto:<?php print esc_url($delport_extra_email) ?>"><?php print esc_html($delport_extra_email) ?></a></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($delport_extra_address_text)) : ?>
                                <div class="sidebar__info-item">
                                    <div class="sidebar__info-icon">
                                        <i class="flaticon-pin"></i>
                                    </div>
                                    <div class="sidebar__info-text">
                                        <span><?php print esc_html($delport_extra_address_text); ?></span>
                                        <h5><?php print esc_html($delport_extra_address); ?></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($delport_side_info_social)) : ?>
                    <div class="sidebar__social">
                        <?php delport_header_social_profiles(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Sidebar Area Start Here  -->
    <div class="body-overlay"></div>

    <?php
}


/**
 * [delport_header_lang description]
 * @return [type] [description]
 */
function delport_header_lang_defualt()
{
    $delport_header_lang = get_theme_mod('delport_header_lang', false);
    if ($delport_header_lang) : ?>

        <ul>
            <li><a href="#0" class="lang__btn"><?php print esc_html__('EN', 'delport'); ?> <i class="ti-arrow-down"></i></a>
                <?php do_action('delport_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
<?php
}

/**
 * [delport_language_list description]
 * @return [type] [description]
 */
function _delport_language($mar)
{
    return $mar;
}
function delport_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<ul>';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__('USA', 'delport') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('UK', 'delport') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('CA', 'delport') . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__('AU', 'delport') . '</a></li>';
        $mar .= ' </ul>';
    }
    print _delport_language($mar);
}
add_action('delport_language', 'delport_language_list');



// Preloader Function

function delport_preloader_func()
{
    $delport_preloader = get_theme_mod('delport_preloader', true);
    $delport_preloader_icon = get_template_directory_uri() . '/assets/img/logo/preloader-icon.gif';
    $delport_preloader_icon2 = get_theme_mod('delport_preloader_icon', $delport_preloader_icon);
?>
    <?php if (!empty($delport_preloader)) : ?>
        <div class="preloader">
            <img src="<?php print esc_url($delport_preloader_icon2); ?>" alt="<?php print esc_attr__('preloader-icon', 'delport'); ?>">
        </div>
    <?php endif; ?>
<?php
}
add_action('wp_body_open', 'delport_preloader_func');

// BackToTop Function
function delport_backtotop_func()
{
    $delport_backtotop = get_theme_mod('delport_backtotop', true);
?>
    <?php if (!empty($delport_backtotop)) {

        $enable = 'progress-wrap';
    } else {
        $enable = 'progress-wrap d-none';
    }
    ?>
    <div class="<?php echo esc_attr($enable); ?>">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
<?php
}
add_action('wp_body_open', 'delport_backtotop_func');


/*
* Header logo
*
* return string
*/


// header logo
function delport_header_logo()
{
?>
    <?php
    // Main logo
    $delport_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
    $delport_site_logo = get_theme_mod('main_logo', $delport_logo);
    ?>

    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        ob_start();
        $delport_site_logo = !empty($delport_site_logo) ? $delport_site_logo : $delport_logo;
    ?>
        <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($delport_site_logo); ?>" alt="<?php print esc_attr__('logo', 'delport'); ?>" />
        </a>
    <?php
        print ob_get_clean();
    }
    ?>
<?php
}

// footer logo
function delport_footer_logo()
{ ?>
    <?php
    $delport_footer_logo = get_template_directory_uri() . '/assets/img/logo/logo-white.png';
    $delport_footer_logo2 = get_theme_mod('delport_footer_logo', $delport_footer_logo);
    ?>
    <a href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($delport_footer_logo2); ?>" alt="<?php print esc_attr__('footer logo', 'delport'); ?>">
    </a>
<?php
}


/**
 * [delport_header_social_profiles description]
 * @return [type] [description]
 */
function delport_header_social_profiles()
{
    $delport_topbar_fb_url = get_theme_mod('delport_topbar_fb_url', __('#', 'delport'));
    $delport_topbar_twitter_url = get_theme_mod('delport_topbar_twitter_url', __('#', 'delport'));
    $delport_topbar_instagram_url = get_theme_mod('delport_topbar_instagram_url', __('#', 'delport'));
    $delport_topbar_vimeo_url = get_theme_mod('delport_topbar_vimeo_url', __('#', 'delport'));
    $delport_topbar_linkedin_url = get_theme_mod('delport_topbar_linkedin_url', __('#', 'delport'));
    $delport_topbar_youtube_url = get_theme_mod('delport_topbar_youtube_url', __('#', 'delport'));
?>

    <ul>
        <?php if (!empty($delport_topbar_fb_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_fb_url); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($delport_topbar_twitter_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_twitter_url); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($delport_topbar_instagram_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_instagram_url); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($delport_topbar_vimeo_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_vimeo_url); ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($delport_topbar_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_linkedin_url); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($delport_topbar_youtube_url)) : ?>
            <li><a href="<?php print esc_url($delport_topbar_youtube_url); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function delport_footer_social_profiles()
{
    $delport_footer_fb_url = get_theme_mod('delport_footer_fb_url', __('#', 'delport'));
    $delport_footer_twitter_url = get_theme_mod('delport_footer_twitter_url', __('#', 'delport'));
    $delport_footer_instagram_url = get_theme_mod('delport_footer_instagram_url', __('#', 'delport'));
    $delport_footer_linkedin_url = get_theme_mod('delport_footer_linkedin_url', __('#', 'delport'));
    $delport_footer_youtube_url = get_theme_mod('delport_footer_youtube_url', __('#', 'delport'));
?>

    <ul>
        <?php if (!empty($delport_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($delport_footer_fb_url); ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($delport_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($delport_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($delport_footer_instagram_url)) : ?>
            <li>
                <a href="<?php print esc_url($delport_footer_instagram_url); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($delport_footer_linkedin_url)) : ?>
            <li>
                <a href="<?php print esc_url($delport_footer_linkedin_url); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($delport_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($delport_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}


/**
 * [delport_header_menu description]
 * @return [type] [description]
 */
function delport_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'delport_Navwalker_Class::fallback',
        'walker'         => new delport_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [delport_header_menu description]
 * @return [type] [description]
 */
function delport_mobile_menu()
{
?>
    <?php
    $delport_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $delport_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $delport_menu);
    echo wp_kses_post($delport_menu);
    ?>
<?php
}

/**
 * [delport_search_menu description]
 * @return [type] [description]
 */
function delport_header_search_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'delport_Navwalker_Class::fallback',
        'walker'         => new delport_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [delport_footer_menu description]
 * @return [type] [description]
 */
function delport_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0',
        'container'      => '',
        'fallback_cb'    => 'delport_Navwalker_Class::fallback',
        'walker'         => new delport_Navwalker_Class,
    ]);
}



/**
 *
 * delport footer
 */
add_action('delport_footer_style', 'delport_footer_default_style', 10);


/**
 * footer  style_defaut
 */
function delport_footer_default_style()
{

    $footer_bg_img = get_theme_mod('delport_footer_bg');
    $delport_footer_logo = get_theme_mod('delport_footer_logo');
    $delport_copyright_center = $delport_footer_logo  ? 'col-xxl-5 col-lg-7 text-end' : 'col-md-12 text-center';
    $delport_footer_bg_url_from_page = function_exists('get_field') ? get_field('delport_footer_bg') : '';
    $delport_footer_bg_color_from_page = function_exists('get_field') ? get_field('delport_footer_bg_color') : '';
    $delport_footer_bottom_bg_color_from_page = function_exists('get_field') ? get_field('delport_footer_bottom_bg_color') : '';
    $footer_bg_color = get_theme_mod('delport_footer_bg_color');
    $footer_bottom_bg_color = get_theme_mod('delport_footer_bottom_bg_color');

    // bg image
    $bg_img = !empty($delport_footer_bg_url_from_page['url']) ? $delport_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty($delport_footer_bg_color_from_page) ? $delport_footer_bg_color_from_page : $footer_bg_color;

    //bottom bg color
    $bottom_bg_color = !empty($delport_footer_bottom_bg_color_from_page) ? $delport_footer_bottom_bg_color_from_page : $footer_bottom_bg_color;

    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    for ($num = 1; $num <= $footer_widgets; $num++) {
        if (is_active_sidebar('footer-' . $num)) {
            $footer_columns++;
        }
    }

    switch ($footer_columns) {
        case '1':
            $footer_class[1] = 'col-lg-12';
            break;
        case '2':
            $footer_class[1] = 'col-lg-6 col-md-6';
            $footer_class[2] = 'col-lg-6 col-md-6';
            break;
        case '3':
            $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
            $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
            $footer_class[3] = 'col-xl-4 col-lg-6';
            break;
        case '4':
            $footer_class[1] = 'col-lg-3 col-sm-6';
            $footer_class[2] = 'col-lg-3 col-sm-6';
            $footer_class[3] = 'col-lg-3 col-sm-6';
            $footer_class[4] = 'col-lg-3 col-sm-6';
            break;
        default:
            $footer_class = 'col-xl-3 col-lg-3 col-md-6';
            break;
    }

?>

    <!-- footer area start  -->
    <footer class="footer-area1-bg" data-bg-color="<?php print esc_attr($bg_color); ?>" data-background="<?php print esc_url($bg_img); ?>">
        <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
            <div class="footer-area p-relative pt-100 pb-50">
                <div class="container">
                    <div class="row">
                        <?php

                        if ($footer_columns > 3) {
                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-1');
                            print '</div>';

                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-2');
                            print '</div>';

                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-3');
                            print '</div>';

                            print '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">';
                            dynamic_sidebar('footer-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-' . $num);
                                print '</div>';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer-menu-area red-bg" data-bg-color="<?php print esc_attr($bottom_bg_color); ?>">
            <div class="container">
                <div class="footer-menu-box">
                    <div class="col-xl-12 text-center">
                        <div class="copy-right">
                            <p><?php print delport_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- footer area end  -->

    <?php
}


// delport_copyright_text
function delport_copyright_text()
{
    print get_theme_mod('delport_copyright', esc_html__('© 2022 All rights reserved | Design & Develop by BDevs', 'delport'));
}

/**
 * [delport_breadcrumb_func description]
 * @return [type] [description]
 */
function delport_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'delport'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'delport'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif ('product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_shop_title', __('Shop', 'delport'));
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'delport'));
    } elseif (is_single() && 'bdevs-services' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'courses' == get_post_type()) {
        $title = esc_html__('Course Details', 'delport');
    } elseif (is_single() && 'bdevs-event' == get_post_type()) {
        $title = esc_html__('Event Details', 'delport');
    } elseif (is_single() && 'bdevs-cases' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_search()) {

        $title = esc_html__('Search Results for : ', 'delport') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'delport');
    } elseif (is_archive()) {

        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $bg_img_url = get_template_directory_uri() . '/assets/img/page-title/page-title.jpg';
        $bg_img = get_theme_mod('breadcrumb_bg_img');
        $delport_breadcrumb_shape_switch = get_theme_mod('delport_breadcrumb_shape_switch', true);
        $breadcrumb_info_switch = get_theme_mod('breadcrumb_info_switch', true);

        $delport_breadcrumb_padding_top = function_exists('get_field') ? get_field('delport_breadcrumb_padding_top') : '175px';
        $delport_breadcrumb_padding_bottom = function_exists('get_field') ? get_field('delport_breadcrumb_padding_bottom') : '180px';

        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        }
    ?>

        <!-- page title area  -->
        <section class="page-title-area breadcrumb-spacing <?php print esc_attr($breadcrumb_class); ?>" data-background="<?php print esc_attr($bg_img); ?>" data-top-space="<?php print esc_attr($delport_breadcrumb_padding_top); ?>px" data-bottom-space="<?php print esc_attr($delport_breadcrumb_padding_bottom); ?>px">
            <div class="container">
                <div class="row justify-content-center">
                    <?php if (!empty($breadcrumb_info_switch)) : ?>
                        <div class="col-xxl-9">
                            <div class="page-title-wrapper text-center">
                                <h3 class="page-title mb-25"><?php echo wp_kses_post($title); ?></h3>
                                <div class="breadcrumb-menu">
                                    <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                        <?php
                                        if (function_exists('bcn_display')) {
                                            bcn_display();
                                        } ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- page title area end -->

    <?php
    }
}

add_action('delport_before_main_content', 'delport_breadcrumb_func');

// delport_search_form
function delport_search_form()
{
    ?>
    <div class="search-wrap">
        <div class="search-inner">
            <i class="fal fa-times search-close" id="search-close"></i>
            <div class="search-cell">
                <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                    <div class="search-field-holder">
                        <input type="search" class="main-search-input" name="s" value="<?php print esc_attr(get_search_query()) ?>" placeholder="<?php print esc_attr__('Search here...', 'delport'); ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}

add_action('delport_before_main_content', 'delport_search_form');


/**
 *
 * pagination
 */
if (!function_exists('delport_pagination')) {

    function _delport_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function delport_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _delport_pagi_callback($pagi);
    }
}


function delport_style_functions()
{
    wp_enqueue_style('delport-custom', DELPORT_THEME_CSS_DIR . 'delport-custom.css', []);

    // breadcrumb-bg-color
    $color_code = get_theme_mod('delport_breadcrumb_bg_color', '#222');
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('delport-breadcrumb-bg', $custom_css);
    }

    // breadcrumb-spacing top
    $padding_px = get_theme_mod('delport_breadcrumb_spacing', '160px');
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('delport-breadcrumb-top-spacing', $custom_css);
    }

    // breadcrumb-spacing bottom
    $padding_px = get_theme_mod('delport_breadcrumb_bottom_spacing', '160px');
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style('delport-breadcrumb-bottom-spacing', $custom_css);
    }

    // scrollup
    $scrollup_switch = get_theme_mod('delport_scrollup_switch', false);
    if ($scrollup_switch) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style('delport-scrollup-switch', $custom_css);
    }

    $logo_size = get_theme_mod('delport_logo_size', '165');
    if ($logo_size != '') {
        $custom_css = '';
        $custom_css .= ".standard-logo img { max-width: " . $logo_size . "px}";
        wp_add_inline_style('delport-custom', $custom_css);
    }

    // theme color
    $color_code = get_theme_mod('delport_color_option', '#012863');
    if ($color_code != '') {
        $custom_css = '';
        //background color
        $custom_css .= ".services-two .services__item:hover, .team__overlay::before, .about__content-tab-2 li button.active,
        .fill-btn:hover, .dp-gallery-link a:hover, .testimonial-two .testimonial__item:hover .testimonial__item-content,
        .blog-two .blog__title-inner:hover .blog__item-date, .services-two .services__item-shape, .dp-play-btn:hover, 
        .about__3-content-num:hover, .services__3-item-title::before, .about__3-content-btn .skew-btn:hover, .price__cta-3::before,
        .team__3-item-content, .services__cta-3-btn .fill-btn:hover, .contact__info-item::before, .about__3-content-btn .skew-btn:hover::before, .dp-single-gallery-03::after, .dp-gallery-nav-03 button:hover, .b-button > a::before,
        .services-img::before, .services-wrapper:hover .services-content, .blog-wrapper .b-button > a::before,
        .working-wrapper:hover .working-icon, .our-services-img::before, .inner-our-services .our-services-text h3 a::before,
        .counter-wrapper-six .counter-text, .team-area-six .team__item .team-text, .single-02-newsletters .newsletter-form form button:hover, .sidebar__widget ul.widget-services li:hover a, .basic-pagination ul li span.current,
        .basic-pagination ul li a:hover, .basic-pagination ul li span:hover, .tagcloud a:hover, .dp-cart-btn:hover,
        .dp-blog-btn:hover, .dp-award-thumb::before, .job-btn, .career-cta-content .job-btn:hover, .quote-tab .nav-tabs .nav-link.active,
        .portfolio-menu button.active::before, .contact__cat-btn .fill-btn:hover, .tmd__skill .progress-bar, .pricing-tab .nav .nav-item .nav-link::after, .pricing__badge, .ablog__sidebar .widget_tag_cloud a:hover, .ablog__text4 blockquote p cite::before,
        #dl-header-style .side-info-close, #dl-header-style .side-info .generic-el-contact-info-social a { background-color: " . $color_code . "}";
        // color
        $custom_css .= ".banner-content2 .banner-title, div.section__title .title, .services-slider-title,
        .dp-funfact-wrapper .dp-funfact-content h3, .dp-testimonial-client-name, .accordion__wrapper-1 .accordion-button,
        .blog__item-content h2, .blog__item-title.dp-blog-title, .btn-round, .services-two-nav div, .dp-play-btn,
        .dp-gallery-content .dp-gallery-title, .dp-gallery-content span, .dp-gallery-link a, .progress-wrap::after,
        .subscribe-form .s-input i, .about__3-content-btn .skew-btn, .services__3-item-title, .single-input-field .nice-select span,
        .single-input-field i, .dp-portfolio-menu button, .services__cta-3-btn .fill-btn, .dp-contact-info-title, .dp-contact-info-title2,
        .testimonial-one .testimonial__auth-text h4, .dp-gallery-nav-03 button, .features-text h3 a, .b-button > a, .section-title h2,
        .nice-select, .form-box::after, .appiontment-area-four .appiontment-form .dp-up-btn.white-btn, .testimonial-wrapper h3,
        .features-02-info h3, .progress-bar span, .bar-title h4, .project-content h3 > a,  .inner-project .b-02-button > a,
        .project-meta > a i, .blog-text h3 > a, .blog-wrapper .b-button > a, .about__content-tab-2 li button,
        .about-us-area-five .about-contact-info .about-contact-content h4 a,
        .about-us-area-five .about-contact-info .about-contact-content span,
        .about-us-area-five .about-author-info .about-author-content h4, .services-area-five .services-02-wrapper h3,
        .services-area-five .services-02-wrapper .b-button a, .services-area-five .services-two-nav div,
        .appiontment-tab .nav-link, .progress-circular input, .our-skills-area .our-skills-content h3,
        .working-wrapper .working-text h3, .portfolio-item .portfolio-content .portfolio-content-title h5 a, 
        .portfolio-item .portfolio-content .black-b-button > a, .about-info-text h4, .about-info-content h3,
        .inner-our-services .our-services-text h3 a, .section__title .title-sm, .sidebar__widget, .sidebar__widget ul.widget-services li a,
        div .product-widget-title, .product__title, .basic-pagination ul li a, .basic-pagination ul li span, .woocommerce-tabs h2,
        .bd-section-title, .product_meta b,.product-additional-tab .nav-tabs .nav-item .nav-links, #customer_form_details h3,
        .woocommerce-checkout input, .woocommerce-checkout textarea, .contact-info-text h5, div.job-tag span,
        .job-instructor-title h3 a, .product__data label, .order__form-button span, .order__form-button i, .wpcf7-list-item-label,
        .country-tab .nav-link, .office-item h4, .partner-content h3 a, .portfolio-menu button, .portfolio__sd-box-content h6,
        .contact__cat-btn .fill-btn, .team__founder-text .contact, .skill-category, .edu-text h5, .edu-icon i,
        .pricing-tab .nav .nav-item .nav-link.active, .pricing__package-price, .pricing__package-name, .section__title .testimonial__title,
        .bd-blog-title, .sidebar__widget--title, .widget-post-title, .ablog__sidebar .widget_tag_cloud a,
        .dp-blog-grid-wrapper .dp-blog-grid-content-wrapper .dp-blog-grid-content .dp-grid-title, .dp-blog-grid-wrapper .dp-blog-grid-content-wrapper span, .post-comments-title h2, .blog__details__tag.tagcloud span, .ablog__text4 blockquote p cite,
        .ablog__text4 blockquote::before, .post-text h3, .blog__meta span:hover a i, .services-one .services__item-btn a, 
        .about__content-tab-2 button:hover, .sidebar-contact p, .approach__text ul li i, .career-cta-content .job-btn,
        .bd-blog-meta ul li:hover a, .bd-blog-meta ul li:hover a i, .sidebar-search-form button, .skew-btn:hover, .services__cta-item h3 a:hover, .slider-video-icon a, .video-icon a, .overview-list ul li::before, .country-tab .nav-tabs .nav-link:hover,
        .services-one .services__item-content h3.dp-fea-title-03, #dl-header-style .generic-el-side-info-contact-wrapper ul li a { color: " . $color_code . "}";
        // border color
        $custom_css .= ".dp-gallery-link a:hover, .about__3-content-btn .skew-btn:hover::before, .tagcloud a:hover,
        .basic-pagination ul li span.current, .pr-select.nice-select.open, .portfolio-menu button.active::before,
        .pricing-tab .nav .nav-item .nav-link::before, .pricing__box.active, .ablog__sidebar .widget_tag_cloud a:hover,
        .basic-pagination ul li a:hover, .basic-pagination ul li span:hover { border-color: " . $color_code . "}";
        $custom_css .= ".ddddtre { stroke: " . $color_code . "}";
        wp_add_inline_style('delport-custom', $custom_css);
    }


    // Primary color
    $color_code = get_theme_mod('delport_primary_color_option', '#DB1C29');
    if ($color_code != '') {
        $custom_css = '';
        //background color
        $custom_css .= ".banner-content2 .btn-round.pulse-btn:hover, .services-two-nav div:hover, .fill-btn,.services-two-nav div:hover,
        .accordion__wrapper-1 .accordion-button:not(.collapsed), .blog-two .blog__meta::before, .blog__item-date,
        .blog-two .blog__title-inner .blog__item-date, .slider__active-3 .slider-nav div:hover, .about__3-text,
        .services__3-item:hover .services__3-item-num, .team__3-item-social::before, .dot, .services-one .services__box::after, 
        .work__item::before, .work__item-num, .testimonial-active .swiper-slide-active .testimonial-items, .dp-up-btn.slider-btn, 
        .b-button > a:hover::before, .dp-up-btn::before, .services-content, .appiontment-area-four .appiontment-form .white-btn::before,
        .features-02-link li:hover .features-02-icon i, .line::before, .border-left-1, .border-right-1, .testimonial-wrapper span::before,
        .progress-bar, .project-b-button > a, .blog-wrapper .b-button > a:hover::before, .slider-area-five .slider-nav div:hover,
        .services-area-five .services-two-nav div:hover, .appiontment-tab .nav-link::before, .working-wrapper .working-icon,
        .projects-area-five .portfolio-menu button.active, .slider-video-icon a:hover, .features-01-wrapper .overlay-image-layer::before,
        .about-info-date, .about-info-list:hover .about-info-icon i, .single-02-newsletters .newsletter-form form button,
        .contact-us-icon, .blog-date > a, .inner-our-services .our-services-text h3 a:hover::before, h6.product-widget-title::before,
        .ui-widget-content .ui-slider-range, .ui-widget-content .ui-slider-handle, .woocommerce span.onsale, .product__icon a:hover,
        .dp-cart-btn, .product-additional-tab .nav-tabs .nav-item.active .nav-links, .dp-blog-btn, .tinv-wishlist button,
        .single-contact-info .contact-info-icon:hover a, .job-btn:hover, .career-cta-wrapper, .country-tab .nav-tabs .nav-link.active,
        .sidebar__widget--title::before, .appiontment-area-four .appiontment-form .white-btn:hover::before, 
        #dl-header-style .side-info .generic-el-contact-info-social a:hover, #dl-header-style .side-info-close:hover  { background-color: " . $color_code . "}";
        // color
        $custom_css .= ".section__title .sub-title, .section__title span, .dp-funfact-wrapper .dp-funfact-icon i, 
        .services-two .services__item-icon, .testimonial-two .testimonial__item-auth h6, .testimonial-two .testimonial__item-rate i,
        .blog-two .blog__title-inner:hover h4, .services-two .services__item h3:hover, .about__3-content-num h2, .services__3-item-icon,
        .services__3-item-num h3, .dp-portfolio-menu button.active, .contact__info-icon, .dp-gallery-content .dp-gallery-title:hover a,
        .services-one .services__item-icon, .services__cta-item i, .testimonial-one .testimonial__icon, .testimonial-one .testimonial__auth-text span, .blog__meta span i, .services-one .services__item-btn a:hover, .slider-content h2 span, .features-icon, .features-text h3 span, .section-title > span, .dp-up-btn, .testimonial-wrapper span, .features-02-icon i,
        .about-us-area-five .about-contact-info .about-contact-icon, .services-area-five .services-02-wrapper .services-02-icon,
        .appiontment-tab .nav-link.active, .projects-area-five .portfolio-menu button, .portfolio-item .portfolio-content .portfolio-content-title h5 a:hover, .blog-wrapper:hover .blog-text h3 a, .about-us-area-five .about-contact-info .about-contact-content h4 a:hover, .services-area-five .services-02-wrapper h3:hover,
        .services-area-five .services-02-wrapper .b-button a:hover, .blog-wrapper .b-button > a:hover, .features-text h3 a:hover,
        .b-button > a:hover, .project-content h3 > a:hover, .blog__item-content h2:hover a, .team__item-text h3:hover,
        .about-info-icon i, .inner-our-services .our-services-text h3 a:hover, .counter-icon, .team-area-six .team__item .team-text h3 a:hover, .single-02-newsletters .news-box::before, .sidebar-contact h2, .product_list_widget .woocommerce-Price-amount.amount, 
        .product-widget-title:hover, .widget_product_categories li a:hover, .widget_product_categories ul li a::before,
        .woocommerce-Price-amount.amount bdi, .product__title:hover, .tinvwl_add_to_wishlist-text:hover,
        .tp-single-content-info .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart::before, 
        .bd-section-box .bd-section-subtitle, .delport-page-content table a, .tinv-wishlist .social-buttons li a.social:hover,
        .approach__text ul li:hover i, .contact-info-icon a, .contact-info-text h5:hover, .job-instructor-title h3 a:hover,
        .job-instructor-title span i, .laction-county ul li:hover, .laction-county ul li span:hover, .singel-addresss:hover,
        .partner-content h3 a:hover, .portfolio__sd-box-content i, .team__founder-item-icon i, .team__founder-text .contact:hover,
        .bd-blog-meta ul li i, .bd-blog-meta ul li a i, .bd-blog-title:hover, .widget ul li a:hover, .widget ul li a::before,
        .widget-post-title:hover, .dp-blog-grid-wrapper .dp-blog-grid-content-wrapper span a:hover,
        .dp-blog-grid-wrapper .dp-blog-grid-content-wrapper .dp-blog-grid-content .dp-grid-title:hover, .logged-in-as a:hover, 
        .dp-contact-info-title:hover, .dp-contact-info-title2:hover, .dp-up-btn.slider-btn:hover, 
        .dp-up-btn.slider-btn:focus, .slider-area .slider-nav .dp-nav-btn:hover, .portfolio-item .portfolio-content .black-b-button > a:hover, .team-area-six .team__item .team-text .team__social a:hover, .woocommerce-form-coupon-toggle::before,
        .order-review-wrapper .woocommerce-checkout-payment .woocommerce-privacy-policy-text p a, 
        .services-one .services__item-content h3:hover, .contact__info-item  .dp-contact-info-title:hover, .dp-contact-info-title2:hover,  #dl-header-style .generic-el-side-info-contact-wrapper ul li i { color: " . $color_code . "}";
        // border color
        $custom_css .= ".services-one .services__item:hover .services__item-icon, .dp-up-btn, .services-area-five .services-02-wrapper:hover, .projects-area-five .portfolio-menu button, .order-review-wrapper, .country-tab .nav-tabs .nav-link.active, .projects-area-five .portfolio-menu button { border-color: " . $color_code . "}";
        $custom_css .= ".dsdsdsds { stroke: " . $color_code . "}";
        wp_add_inline_style('delport-custom', $custom_css);
    }

}
add_action('wp_enqueue_scripts', 'delport_style_functions');


// delport_kses_intermediate
function delport_kses_intermediate($string = '')
{
    return wp_kses($string, delport_get_allowed_html_tags('intermediate'));
}

function delport_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function delport_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
