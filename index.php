<?php get_header(); ?>


	<h2>Benvenuto</h2>
	
	<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
	<a href="<?php the_permalink(); ?>"> <?php the_title();?></a>
	<?php echo get_the_excerpt();?>
	<?php endwhile; endif; ?>
	
	
<?php get_footer(); ?>
