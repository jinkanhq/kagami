<?php
$full_thumbnail_url = has_post_thumbnail() ?
    wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0] : KAGAMI_FALLBACK_COVER_URL;
?>
<div class="hero">
    <?php if ( !is_singular() ) { ?>
    <div class="hero-box">
        <div class="container">
            <?php get_template_part( 'template-parts/post-cover', null, array('is_hero' => true) ); ?>
            <div class="hero-box-summary">
                <?php echo the_excerpt(); ?>
                <?php printf( '<a class="btn" href="%s">%s</a>', get_permalink(), __('Read more', 'kagami') ); ?>
            </div>
        </div>
    </div><!-- kagami:non-singular:hero-box -->
    <?php } ?>
    <div class="hero-background-wrapper">
        <?php printf( '<div class="hero-background" style="background-image: url(%s)"></div>', $full_thumbnail_url ); ?>
    </div>
</div><!-- kagami:hero -->

