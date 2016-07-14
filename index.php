<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<ul class="post_list">
		<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="post_thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,150)); ?></a>
			<?php endif; ?> 
			<div class="post_excerpt">
				<h3><?php the_title();?></h3>
				<?php echo get_the_excerpt();?>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
	<div class="navigation">
		<div class="alignleft"><?php previous_posts_link( '&laquo; Next Entries' ); ?></div>
		<div class="alignright"><?php next_posts_link( 'Previous Entries &raquo; ', '' ); ?></div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
