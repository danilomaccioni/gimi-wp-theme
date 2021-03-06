<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<?php get_header(); ?>

<div class="main_container">
<?php if ( have_posts() ) : ?>
	<div class="center_container posts_container">
		<div class="author_title">
			<h2>Post di <span><?php the_author(); ?></span></h2>
		</div>
		<ul class="posts_list author_posts_list">
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
					<?php gimi_print_post_date("post_preview_date");?>
					<?php /*echo get_the_excerpt();*/   the_content('[ suka... ]'); ?>
				</div>
				<?php gimi_print_category_and_tag(); ?>
				<?php gimi_print_post_separator($post_while_counter); ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php gimi_print_prev_next_links(); ?>
	</div>
<?php endif; ?>
<?php get_sidebar('author'); ?>
</div>

<?php get_footer(); ?>
