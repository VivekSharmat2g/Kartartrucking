<?php
$author_data = get_the_author_meta('description', get_query_var('author'));
$author_info = get_the_author_meta('delport_write_by');
$facebook_url = get_the_author_meta('delport_facebook');
$twitter_url = get_the_author_meta('delport_twitter');
$linkedin_url = get_the_author_meta('delport_linkedin');
$instagram_url = get_the_author_meta('delport_instagram');
$delport_url = get_the_author_meta('delport_youtube');
$delport_write_by = get_the_author_meta('delport_write_by');
$author_bio_avatar_size = 150;
if ($author_data != '') :
?>


    <div class="blog__author d-sm-flex white-bg mb-55">
        <div class="blog__author-thumb mr-20">
            <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
                <?php print get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size, '', '', ['class' => 'media-object img-circle']); ?>
            </a>
        </div>

        <div class="blog__author-content">
            <h5><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php print get_the_author(); ?></a></h5>

            <?php if (!empty($author_info)) : ?>
                <span><?php print esc_html($author_info); ?></span>
            <?php endif; ?>

            <p><?php the_author_meta('description'); ?></p>
        </div>
    </div>

<?php endif; ?>