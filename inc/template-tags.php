<?php
function kagami_is_comment_by_post_author( $comment = null ) {
    if ( is_object( $comment ) && $comment->user_id > 0 ) {

        $user = get_userdata( $comment->user_id );
        $post = get_post( $comment->comment_post_ID );

        if ( ! empty( $user ) && ! empty( $post ) ) {

            return $comment->user_id === $post->post_author;

        }
    }
    return false;
}

function kagami_is_comment_by_staff( $comment = null ) {
    if ( is_object( $comment ) && $comment->user_id > 0 ) {

        $staff_roles = array(
            'administrator',
            'editor',
            'author'
        );
        $user = get_userdata( $comment->user_id );

        if ( ! empty( $user ) ) {
            foreach ( $user->roles as $role ) {
                if ( in_array( $role, $staff_roles ) ) {
                    return true;
                }
            }
        }
    }
    return false;
}

function kagami_get_cover_url( $type, $name, $fallback = KAGAMI_FALLBACK_COVER_URL ) {
    $extensions = array('jpg', 'png');
    foreach ( $extensions as $extension ) {
        $relative_path = sprintf( '/assets/images/%1$s/%2$s.%3$s', $type, $name, $extension );
        $cover_path = get_theme_file_path( $relative_path );
        if ( is_file( $cover_path ) ) {
            return  get_theme_file_uri( $relative_path );
        }
    }
    return $fallback;
}

function kagami_get_theme_mod_image_url( $name, $fallback ) {
    $image_id = get_theme_mod( $name );
    if ( ! $image_id ) {
        return $fallback;
    }
    $image = wp_get_attachment_image_src( $image_id , 'full' );
    return $image[0];
}
?>