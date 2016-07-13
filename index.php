<?php get_header(); ?>

	<nav>
		
		<?php //wp_list_pages(array('title_li' => null )); ?>
		<?php wp_page_menu(array( 'show_home' => 1)); ?>
	</nav>
	<?php 
		$wp_object = get_post();
	?>
	<div>
		<?php if ( $wp_object != null ) : ?>
			<h2><?php echo $wp_object->post_title; ?></h2>
			<?php echo $wp_object->post_content; ?>
		<?php else : ?>
			<h2>No post</h2>
		<?php endif; ?>
	</div>
	
<?php get_footer(); ?>
