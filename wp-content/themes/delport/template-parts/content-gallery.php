<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delport
 */

$post_gallery = function_exists('get_field') ? get_field('post_gallery') : '';
$delport_blog_date = get_theme_mod('delport_blog_date', true);
$delport_blog_comments = get_theme_mod('delport_blog_comments', true);
$delport_blog_author = get_theme_mod('delport_blog_author', true);
$delport_blog_cat = get_theme_mod('delport_blog_cat', false);
$categories = get_the_terms($post->ID, 'category');
if (is_single()) : ?>



    <article id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-60 format-gallery'); ?>>
        <?php if (!empty($post_gallery)) : ?>
            <div class="post_gallery blog_gallery_active swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($post_gallery as $key => $image) : ?>
                        <div class="swiper-slide mblog_image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php print esc_attr__('gallery image', 'delport'); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-blog-button slide-prev"><i class="far fa-chevron-left"></i></div>
                <div class="swiper-blog-button slide-next"><i class="far fa-chevron-right"></i></div>
            </div>
        <?php endif; ?>

        <div class="ablog__text ablog__text4">
            <div class="bd-blog-meta mb-20">
                <ul>
                    <?php if (!empty($delport_blog_author)) : ?>
                        <li><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fas fa-user"></i> <?php print get_the_author(); ?></a></li>
                    <?php endif; ?>
                    <?php if (!empty($delport_blog_date)) : ?>
                        <li><i class="fas fa-alarm-clock"></i> <?php the_time(get_option('date_format')); ?></li>
                    <?php endif; ?>

                    <?php if (!empty($delport_blog_comments)) : ?>
                        <li><a href="<?php comments_link(); ?>"> <i class="fas fa-comments"></i> <?php comments_number(); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <h4 class="bd-blog-details-title mb-25">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <div class="post-text mb-20">
                <?php the_content(); ?>
                <?php
                wp_link_pages([
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'delport'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ]);
                ?>
            </div>
            <?php print delport_get_tag(); ?>
        </div>
    </article>

<?php else : ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class('bd-blog mb-60 format-gallery'); ?> data-wow-delay=".3s">
        <?php if (!empty($post_gallery)) : ?>
            <div class="post_gallery blog_gallery_active swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($post_gallery as $key => $image) : ?>
                        <div class="swiper-slide mblog_image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php print esc_attr__('gallery image', 'delport'); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-blog-button slide-prev"><i class="far fa-chevron-left"></i></div>
                <div class="swiper-blog-button slide-next"><i class="far fa-chevron-right"></i></div>
            </div>
        <?php endif; ?>
        <div class="bd-blog-text">
            <div class="bd-blog-meta mb-20">
                <ul>
                    <?php if (!empty($delport_blog_author)) : ?>
                        <li><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fas fa-user"></i> <?php print get_the_author(); ?></a></li>
                    <?php endif; ?>
                    <?php if (!empty($delport_blog_date)) : ?>
                        <li><i class="fas fa-alarm-clock"></i><?php the_time(get_option('date_format')); ?></li>
                    <?php endif; ?>

                    <?php if (!empty($delport_blog_comments)) : ?>
                        <li><a href="<?php comments_link(); ?>"> <i class="fas fa-comments"></i> <?php comments_number(); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <h4 class="bd-blog-title mb-20">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>

            <div class="post-text mb-20">
                <?php the_excerpt(); ?>
            </div>


            <!-- blog btn -->

            <?php
            $delport_blog_btn = get_theme_mod('delport_blog_btn', 'Read More');
            $delport_blog_btn_switch = get_theme_mod('delport_blog_btn_switch', true);
            ?>

            <?php if (!empty($delport_blog_btn_switch)) : ?>
                <div class="read-more-btn mt-30">
                    <a href="<?php the_permalink(); ?>" class="dp-blog-btn"><?php print esc_html($delport_blog_btn); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </article>

<?php
endif; ?>