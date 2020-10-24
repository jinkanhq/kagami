<?php
get_header();

$title = get_the_archive_title();
$posts_number = 0;
$description = get_the_archive_description();
$cover_url = KAGAMI_FALLBACK_PAGE_NOT_FOUND_COVER_URL;
$has_button = false;
$button_text = '';
$button_link = '/';

if ( is_author() ) {
    $posts_number = get_the_author_posts();
    $cover_url = kagami_get_cover_url( 'author', get_the_author_meta( 'login' ), KAGAMI_FALLBACK_AUTHOR_COVER_URL );
    $description = '<p>' . $description . '</p>';
    $email = get_the_author_meta( 'email' ) ;
    if ( $email ) {
        $has_button = true;
        $button_text = __('Contact the author', 'kagami');
        $base64_mailto = base64_encode( sprintf( 'mailto:%1$s', get_the_author_meta( 'email' ) ) );
        $button_link = sprintf( 'javascript:(()=>{window.location.href=atob(\'%1$s\')})()', $base64_mailto );
    }
} elseif ( is_category() ) {
    $category = get_queried_object();
    $posts_number = $category->count;
    $cover_url = kagami_get_cover_url( 'category', $category->slug, KAGAMI_FALLBACK_CATEGORY_COVER_URL );
} elseif ( is_tag() ) {
    $tag = get_queried_object();
    $posts_number = $tag->count;
    $cover_url = kagami_get_cover_url( 'tag', $category->slug, KAGAMI_FALLBACK_TAG_COVER_URL );
}

$hero_args = array(
    'title' => $title,
    'subtitle' => sprintf(
        _nx(
            '%1$s post',
            '%1$s posts',
            $posts_number,
            'posts title',
            'kagami'
        ),
        number_format_i18n( $posts_number ) ),
    'description' => $description,
    'cover_url' => $cover_url,
    'has_button' => $has_button,
    'button_text' => $button_text,
    'button_link' => $button_link
);

?>

<main id="site-content" role="main">
    <?php get_template_part( 'template-parts/hero', 'archive', $hero_args ) ?>
    <div class="fill">
        <?php get_template_part( 'template-parts/post-list' ); ?>
        <?php get_template_part( 'template-parts/pagination' ); ?>
    </div><!-- kagami:fill -->
</main>

<?php
get_footer();
?>