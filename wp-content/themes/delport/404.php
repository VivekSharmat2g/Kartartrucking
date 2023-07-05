<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package delport
 */

get_header();
?>

<section class="error__area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
            <?php
            $delport_404_bg = get_theme_mod('delport_404_bg', get_template_directory_uri() . '/assets/img/error/error.png');
            $delport_error_404_text = get_theme_mod('delport_error_404_text', __('404', 'delport'));
            $delport_error_title = get_theme_mod('delport_error_title', __('Page not found', 'delport'));
            $delport_error_link_text = get_theme_mod('delport_error_link_text', __('Back To Home', 'delport'));
            $delport_error_desc = get_theme_mod('delport_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'delport'));
            ?>
            <div class="error__item text-center">
               <div class="error__thumb mb-45">
                  <img src="<?php echo esc_url($delport_404_bg); ?>" alt="<?php print esc_attr__('Error 404', 'delport'); ?>">
               </div>
               <div class="error__content">
                  <h3 class="error__title"><?php print esc_html($delport_error_title); ?></h3>
                  <p><?php print esc_html($delport_error_desc); ?></p>
                  <a href="<?php print esc_url(home_url('/')); ?>" class="fill-btn clip-btn mt-20"><?php print esc_html($delport_error_link_text); ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
