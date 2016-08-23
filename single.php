<?php get_header(); ?>

<div class="main_container">
	<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
		<div class="center_container post_container" <?php post_class(); ?> >
			<?php if ( has_post_thumbnail() ): ?>
				<div class="post_thumbnail">
					<?php the_post_thumbnail(array(250,250));
					the_post_thumbnail_caption();
					?>
				</div>
			<?php endif; ?> 
			<h1><?php the_title();?></h1>
			<?php gimi_print_post_date("single_post_date");?>
			<?php the_content();?>
			<div class="post_writer"><h6>Written by:</h6> <?php the_author_posts_link(); ?></div>
			<?php gimi_print_category_and_tag(); ?>
			
			<?php wp_list_comments(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
