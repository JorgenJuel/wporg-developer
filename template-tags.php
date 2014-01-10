<?php

function wp_doc_comment( $comment, $args, $depth ) {
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment">

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your example is awaiting moderation.', 'wporg' ); ?></em>
			<br />
		<?php endif; ?>

		<pre class="example-content"><?php echo htmlentities( get_comment_text() ); ?></pre>

		<footer class="comment-meta">
			<div class="comment-author vcard">
				<?php
				echo get_avatar( $comment );

				/* translators: 1: comment author, 2: date and time */
				printf( __( 'Contributed by %1$s on %2$s', 'wporg' ),
						sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
						sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'wporg' ), get_comment_date(), get_comment_time() )
						)
				);
				?>

				<?php edit_comment_link( __( 'Edit', 'wporg' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			<!-- .comment-author .vcard -->

		</footer>

	</article>
	<!-- #comment-## -->

<?php
}

/**
 * Get current (latest) since version
 *
 * @return object
 */
function get_current_version() {

	$version = get_terms( 'wpapi-since', array(
			'number' => '1',
			'order'  => 'DESC',
	) );

	return $version[0];
}