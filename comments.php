<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage gimi
 * @since gimi 0.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php /*
				$comments_number = get_comments_number();
				if ( 1 == $comments_number ) {
					echo 'C\'&egrave; un commento in ' . get_the_title();
				} else {
					echo 'Ci sono ' . $comments_number . ' commenti in ' . get_the_title();
				}*/
			?>
			
			<?php
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'gimi' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
			?>
			
		</h4>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 42,
					//'reply_text'  => 'Leave a reply',
					//'reply_text'  => __( 'Leave a reply', 'gimi'),
				) );
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<!-- <p class="no-comments">Comments are closed.</p> -->
		<p class="no-comments"><?php _e( 'Comments are closed.', 'gimi'); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>

</div><!-- .comments-area -->
