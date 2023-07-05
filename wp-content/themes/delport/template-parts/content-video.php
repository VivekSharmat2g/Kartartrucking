<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delport
 */

$delport_video_url = function_exists('get_field') ? get_field('fromate_style') : NULL;
$categories = get_the_terms($post->ID, 'category');

$delport_blog_date = get_theme_mod('delport_blog_date', true);
$delport_blog_comments = get_theme_mod('delport_blog_comments', true);
$delport_blog_author = get_theme_mod('delport_blog_author', true);
$delport_blog_cat = get_theme_mod('delport_blog_cat', false);

if (is_single()) :
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-60 format-video'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="bd-blog-img position-relative">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </a>

                <?php if (!empty($delport_video_url)) : ?>
                    <a href="<?php print esc_url($delport_video_url); ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="ablog__text ablog__text4">
            <div class="bd-blog-meta mb-20">
                <ul>
                    <?php if (!empty($delport_blog_author)) : ?>
                        <li><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <i class="fas fa-user"></i> <?php print get_the_author(); ?></a></li>
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

<?php
else : ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class('bd-blog mb-60 format-video'); ?> data-wow-delay=".3s">
        <?php if (has_post_thumbnail()) : ?>
            <div class="bd-blog-img position-relative">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </a>

                <?php if (!empty($delport_video_url)) : ?>
                    <a href="<?php print esc_url($delport_video_url); ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="bd-blog-text">
            <div class="bd-blog-meta mb-20">
                <ul>
                    <?php if (!empty($delport_blog_author)) : ?>
                        <li><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <i class="fas fa-user"></i> <?php print get_the_author(); ?></a></li>
                    <?php endif; ?>
                    <?php if (!empty($delport_blog_date)) : ?>
                        <li><i class="fas fa-alarm-clock"></i> <?php the_time(get_option('date_format')); ?></li>
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