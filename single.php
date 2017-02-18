<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<?php get_header(); ?>

<div class="main_container">
	<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
		<div <?php post_class( array('center_container', 'post_container') ); ?> >
			<?php if ( has_post_thumbnail() ): ?>
				<figure class="post_thumbnail">
					<?php the_post_thumbnail(array(250,250)); ?>
					<?php the_post_thumbnail_caption(); ?>
				</figure>
			<?php endif; ?> 
			<h1><?php the_title();?></h1>
			<?php gimi_print_post_date("single_post_date");?>
			<?php the_content();?>
			<?php wp_link_pages(); ?>
			<div class="post_writer"><h6>Written by:</h6> <?php the_author_posts_link(); ?></div>
			<?php gimi_print_category_and_tag(); ?>
			
			
			<?php //wp_list_comments(); ?>
			<?php comments_template(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
