<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<?php get_header(); ?>

<?php $wp_object = get_post(); ?>
<div class="main_container">
	<div class="center_container page_container">
		<?php if ( $wp_object != null ) : ?>
				<?php gimi_print_post_date("page_post_date");  ?>
			<h2 class="page_post_title" >
				<?php //echo $wp_object->post_title; ?>
				<?php echo apply_filters( 'post_title', $wp_object->post_title ); ?>
			</h2>
			<?php //echo $wp_object->post_content; ?>
			<?php echo apply_filters( 'the_content', $wp_object->post_content ); ?>
			<?php wp_link_pages(); ?>
			
			<?php //wp_list_comments(); ?>
			<?php //comment_form(); ?>
			<?php comments_template(); ?>
			
		<?php else : ?>
			<h2><?php __( 'No post', 'gimi' ) ?></h2>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
