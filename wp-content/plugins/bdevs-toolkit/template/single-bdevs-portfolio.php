<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  delport
 */
get_header(); ?>

    <!-- project details area start -->
    <div class="project__details pt-120 pb-60">
       <div class="container">
            <?php 
                if( have_posts() ):
                while( have_posts() ): the_post();
                    $categories = get_the_terms( get_the_id(), 'portfolio-categories' );
                    $post_tags = get_the_terms( get_the_id(), 'project-tags' );
                    $portfolio_details_image = function_exists('get_field') ? get_field('portfolio_details_image') : '';
                    $portfolio_button_text = function_exists('get_field') ? get_field('portfolio_button_text') : '';
                    $portfolio_button_url = function_exists('get_field') ? get_field('portfolio_button_url') : '';

                    $portfolio_info_list = function_exists('get_field') ? get_field('portfolio_info_list') : '';
            ?> 
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="portfolio__details-wrapper mb-60">
                        <?php if( !empty($portfolio_details_image['url']) ) : ?>
                        <div class="portfolio__details-img mb-35 m-img">
                            <img src="<?php echo esc_html($portfolio_details_image['url']); ?>" alt="portfolio">
                        </div>
                        <?php endif; ?>

                        <div class="service-details-content">
                            <div class="section__title mb-20">
                                <h3 class="title-sm"><?php the_title(); ?></h3>
                            </div>

                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="service-details-sidebar mb-60">
                        <?php do_action("delport_portfolio_sidebar"); ?>
                    </div>
                </div>
            </div>
            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>
        </div>
    </div>
    <!-- project details area end -->

<?php get_footer();  ?>