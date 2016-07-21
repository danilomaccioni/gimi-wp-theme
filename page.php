<?php get_header(); ?>

<?php $wp_object = get_post(); ?>
<div class="page_container main_container">
	<?php if ( $wp_object != null ) : ?>
			<?php print_post_date("page_post_date");  ?>
		<h2><?php echo $wp_object->post_title; ?></h2>
		<?php echo $wp_object->post_content; ?>
	<?php else : ?>
		<h2>No post</h2>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
