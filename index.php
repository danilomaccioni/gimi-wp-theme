<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="posts_container main_container">
		<?php get_sidebar('info');?>
		<ul class="posts_list">
			<?php $post_while_counter = 0; global $wp_query;?>
			<?php while ( have_posts() ) : the_post(); $post_while_counter++ ?>
			<li>
				<div class="container_thumbnail">
					<?php if ( has_post_thumbnail() ) : ?>
							<a class="post_preview_thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,150)); ?></a>
					<?php endif; ?> 
				</div>
				<div class="post_preview">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<?php print_post_date("post_preview_date");?>
					<?php /*echo get_the_excerpt();*/   the_content('[ suka... ]'); ?>
				</div>
				<?php print_category_and_tag(); ?>
				<?php print_post_separator($post_while_counter); ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php print_prev_next_links(); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
