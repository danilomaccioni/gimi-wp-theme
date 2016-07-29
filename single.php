<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
	<div class="post_container main_container">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="post_thumbnail">
				<?php the_post_thumbnail(array(250,250));
				the_post_thumbnail_caption();
				?>
			</div>
		<?php endif; ?> 
		<h1><?php the_title();?></h1>
		<?php print_post_date("single_post_date");?>
		<?php the_content();?>
		<p>Written by: <?php the_author_posts_link(); ?></p>
		<?php print_category_and_tag(); ?>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
