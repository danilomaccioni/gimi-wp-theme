<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
	<?php if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>"> 
		<?php the_post_thumbnail(array(250,250)); ?> 
		</a> 
	<?php endif; ?> 
	<h1><?php the_title();?></h1>
	<?php echo get_the_content();?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>