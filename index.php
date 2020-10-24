<?php
get_header();

$args = array(
    'posts_per_page' => 1,
    'post__in' => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
);
$sticky_query = new WP_Query( $args );
if ( $sticky_query->have_posts() ) {
    $sticky_query->the_post();
}
?>

<main id="site-content" role="main">
    <?php get_template_part( 'template-parts/hero' ); ?>
    <?php wp_reset_postdata(); ?>
    <div class="fill">
        <?php get_template_part( 'template-parts/post-list' ); ?>
        <?php get_template_part( 'template-parts/pagination' ); ?>
    </div><!-- kagami:fill -->
</main>

<?php
get_footer();
?>