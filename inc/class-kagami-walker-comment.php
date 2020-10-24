<?php
class Kagami_Walker_Comment extends Walker_Comment {

    protected function html5_comment( $comment, $depth, $args ) {
        $comment_author_url = get_comment_author_url( $comment );
        $comment_author = get_comment_author( $comment );
        $avatar = get_avatar( $comment, $args['avatar_size'] );
        $parent_comment = get_comment( $comment->comment_parent );
        $comment_reply_link = get_comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => 'comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="comment-reply">',
                    'after'     => '</span>',
                )
            )
        );
        $by_staff = kagami_is_comment_by_staff( $comment );
        printf('<div id="comment-%1$s" class="comment">',$comment->comment_ID);
?>
                <header class="comment-meta">
                    <div class="comment-author-avatar">
                    <?php
                    if ( 0 !== $args['avatar_size'] ) {
                        echo wp_kses_post( $avatar );
                    }
                    if ( $by_staff ) {
                        echo '<div class="comment-by-staff"></div>';
                    }
                    ?>
                    </div><!-- kagami:comment:author-avatar -->
                    <div class="comment-meta-part">
                        <div class="comment-author-name"><?php echo esc_html( $comment_author ) ?></div>
                        <div class="comment-on">
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                <?php
                                /* translators: 1: Comment date, 2: Comment time. */
                                $comment_timestamp = sprintf( __( '%1$s %2$s', 'kagami' ), get_comment_date( 'Y-m-d', $comment ), get_comment_time('H:i:s') );
                                ?>
                                <time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
                                    <?php echo esc_html( $comment_timestamp ); ?>
                                </time>
                            </a>
                        </div>
                    </div>
                    <div class="comment-reply-meta">
                    <?php
                    if ( $comment_reply_link || $by_staff ) {
                        if ( $comment_reply_link ) {
                            echo $comment_reply_link;
                        }
                    }
                    ?>
                    </div><!-- kagami:comment:reply-meta -->
                </header><!-- kagami:comment:meta-->
                <div class="comment-content">
                <?php
                if ( $parent_comment && $parent_comment->comment_ID != $comment->comment_ID ) {
                    $reply_to = $parent_comment->comment_author;
                    printf( __('<p class="parent-comment"><a href="#comment-%1$s">@%2$s</a>&nbsp;%3$s</p>'), $parent_comment->comment_ID , $parent_comment->comment_author, esc_html(get_comment_excerpt($parent_comment)));
                }
                comment_text();
                if ( '0' === $comment->comment_approved ) { ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kagami' ); ?></p>
                <?php
                }
                ?>
                </div><!-- kagami:comment:content -->
            <?php }
        }?>