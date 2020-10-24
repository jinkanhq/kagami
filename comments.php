<?php
if ( post_password_required() ) {
	return;
}

if ( $comments ) {
	$comments_number = absint( get_comments_number() );
?>
<div class="comments">
	<div class="comment-reply-title divider">
		<span class="inner-text">
		<?php
		if ( ! have_comments() ) {
			_e( 'Leave a comment', 'kagami' );
		} elseif ( 1 === $comments_number ) {
			/* translators: %s: Post title. */
			printf( _x( 'One reply', 'comments title', 'kagami' ), get_the_title() );
		} else {
			printf(
				/* translators: 1: Number of comments, 2: Post title. */
				_nx(
					'%1$s reply',
					'%1$s replies',
					$comments_number,
					'comments title',
					'kagami'
				),
				number_format_i18n( $comments_number ),
			);
		}
		?>
		</span>
	</div><!-- kagami:comments:divider -->
	<?php
	wp_list_comments(
		array(
			'walker' => new Kagami_Walker_Comment(),
			'avatar_size' => 120,
			'style' => 'div',
		)
	);
	?>
</div><!-- kagami:comments -->
<?php
} else {
?>
<div class="comment-reply-title divider"></div>
<?php
}
if ( comments_open() ) {
	comment_form(
		array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h2>',
            'class_submit' => 'btn'
		)
	);
} elseif ( is_singular() ) { ?>
<p class="comments-closed"><?php _e( 'Comments are closed.', 'kagami' ); ?></p>
<?php } ?>