<?php get_header(); ?>

<?php $wp_object = get_post(); ?>
<div class="main_container">
	<div class="page_container">
		<?php if ( $wp_object != null ) : ?>
				<?php print_post_date("page_post_date");  ?>
			<h2 class="page_post_title" ><?php echo $wp_object->post_title; ?></h2>
			<?php echo $wp_object->post_content; ?>
			
			<?php //wp_list_comments(); ?>
			<?php //comment_form(); ?>
			<?php comments_template(); ?>
			
		<?php else : ?>
			<h2>No post</h2>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
