<?php
$html_tag = ( $args['is_hero'] ?? false ) ? 'header' : 'div';
$categories = get_the_category();
$large_thumbnail_url = has_post_thumbnail() ?
    wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0] : KAGAMI_FALLBACK_COVER_URL;
$comments_number = get_comments_number();
$comments_text = sprintf(
    _nx(
        '%1$s reply',
        '%1$s replies',
        $comments_number,
        'comments title',
        'kagami'
    ),
    number_format_i18n( $comments_number )
);
?>

<?php printf( '<%1$s class="post-cover" style="background-image: url(%2$s)">', $html_tag, $large_thumbnail_url ) ?>
    <div class="post-overlay"></div>
    <div class="content">    
        <?php
        if ( ! empty( $categories ) ) {
            printf( '<a class="post-category" href="%1$s">%2$s</a>', 
                get_category_link( $categories[0] ),
                $categories[0]->name );
        } else {
            printf( '<a class="post-category" href="%1$s">%2$s</a>',
                get_category_link( 1 ),
                __( 'Uncategorized', 'kagami' ) );
        }
        ?>
        <div class="post-title-group">
            <?php
            printf( '<a class="post-title-link" href="%1$s"><h2 class="post-title">%2$s</h2></a>',
                get_permalink(),
                get_the_title() );
            ?>
            <div class="post-meta">
                <span class="post-time"><?php printf('%1$s %2$s', __( 'Published on', 'kagami' ), get_the_time( 'Y-m-d' )) ?></span>
                <span class="post-comments"><?php echo $comments_text; ?></span>
            </div>
        </div>
        <?php if ( ! is_singular() ) { ?>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
            <div class="post-author">
            <?php printf( '<img class="post-author-avatar" src="%1$s" /><span class="post-author-name">%2$s</span>',
                get_avatar_url( get_the_author_meta( 'user_email' ) ),
                get_the_author_meta( 'display_name' ) ); ?>
            </div>
        </a>
        <?php } ?>
    </div>
<?php printf( '</%1$s>', $html_tag ) ?><!-- kagami:post-cover -->