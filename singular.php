<?php
get_header();
?>
<main class="singular" id="site-content" role="main">
<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        if ( has_post_thumbnail()) {
            $full_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $large_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        } else {
            $fallback_url = KAGAMI_FALLBACK_COVER_URL;
            $full_thumbnail_url = array($fallback_url);
            $large_thumbnail_url = $full_thumbnail_url;
        }
        get_template_part( 'template-parts/hero' );
?>
<div class="fill">
    <div class="hero-box">
        <div class="container">
            <?php get_template_part( 'template-parts/post-cover', null, array('is_hero' => true) ); ?>
            <div class="hero-box-content">
                <?php echo get_the_content(); ?>
                <?php if ( ! is_page() ) {
                    $author_slug = get_the_author_meta('user_login');
                    $author_display_name = get_the_author_meta('display_name');
                    $author_avatar_url = get_avatar_url(get_the_author_meta('user_email'));
                    $author_description = get_the_author_meta('description');
                ?>
                <div class="divider">
                    <div class="inner-text"><?php _e('Tags', 'kagami') ?></div>
                </div>
                <div class="post-tags">
                <?php $tags = get_the_tags();
                foreach ( $tags as $tag ) {
                    printf('<a class="btn post-tag" href="%1$s">%2$s</a>', get_tag_link($tag->term_id), $tag->name);
                }
                ?>
                </div>
                <div class="divider">
                    <div class="inner-text"><?php _e('About the author', 'kagami') ?></div>
                </div>
                <div class="post-author">
                    <div class="post-author-avatar"><?php printf('<img class="avatar" alt="%1$s" src="%2$s" />', $author_display_name, $author_avatar_url); ?></div>
                    <div class="post-author-name"><?php echo $author_display_name ?></div>
                    <div class="post-author-description"><?php echo $author_description ?></div>
                </div>
                <?php } ?>
                <?php if ( comments_open() || get_comments_number() ) {
                    comments_template();
                } ?>
            </div><!-- kagami:singular:hero-box-content -->
        </div>
    </div><!-- kagami:singular:hero-box -->
</div><!-- kagami:fill -->

</main>

<?php
    }
}
get_footer();
?>