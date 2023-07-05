<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  delport
 */
get_header(); ?>

   <!-- service details area start -->
   <section class="services__details pt-120 pb-60">
      <div class="container">
         <?php 
            if( have_posts() ):
            while( have_posts() ): the_post();
            $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
         ?>
         <div class="row">
            <div class="col-xl-8 col-lg-8">
               <div class="services__details-wrapper mb-60">

                  <div class="services__details-img mb-35 m-img">
                     <?php the_post_thumbnail(); ?>
                  </div>

                  <div class="service__details-content mb-25">
                     <div class="section__title mb-20">
                        <h3 class="title-sm"><?php the_title(); ?></h3>
                     </div>
                     <?php the_content(); ?>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4">
               <div class="service-details-sidebar mb-60">
                  <?php do_action("delport_service_sidebar"); ?>
               </div>
            </div>
         </div>
         <?php 
             endwhile; wp_reset_query();
         endif; 
         ?>
      </div>
   </section>
   <!-- service details area end -->

<?php get_footer();  ?>