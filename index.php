<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<?php get_header(); ?>

<div class="main_container">
	<?php //print_r( $_SERVER['HTTP_USER_AGENT'] ); ?>
	<?php if ( have_posts() ) : ?>
		<div class="center_container posts_container">
			<?php if (is_search() ){?>
					<!-- <h2>Risultato ricerca: <?php //the_search_query(); ?></h2> -->
					<h2><?php printf( __( 'Search Results for: %s', 'gimi' ), get_search_query() ); ?></h2>
			<?php }elseif (is_tag() ) { ?>
					<h2><?php single_tag_title('Currently browsing Tag: '); ?></h2>
			<?php }elseif (is_category() ) { ?>
					<h2><?php single_cat_title('Currently browsing Category: '); ?></h2>
			<?php } ?>
			
			<ul class="posts_list">
				<?php $post_while_counter = 0; global $wp_query;?>
				<?php while ( have_posts() ) : the_post(); $post_while_counter++ ?>
				<li>
					<div class="container_thumbnail">
						<?php if ( has_post_thumbnail() ) : ?>
								<a class="post_preview_thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,150)); ?></a>
						<?php endif; ?> 
					</div>
					<div class="post_preview" <?php post_class(); ?> >
						<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
						<?php gimi_print_post_date("post_preview_date");?>
						<?php /*echo get_the_excerpt();*/   the_content('[ suka... ]'); ?><!-- Da togliere!!!!!!! -->
					</div>
					<?php gimi_print_category_and_tag(); ?>
					<?php gimi_print_post_separator($post_while_counter); ?>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php gimi_print_prev_next_links(); ?>
		</div>
	<?php 
	else:?>
		<div class="center_container">
			<?php if (is_search()){?>
				<div>
					<!-- <h2>Il termine "<?php //the_search_query(); ?>" ricercato non esiste</h2></br> -->
					<h2><?php printf( __( 'Term "%s" don\'t exist', 'gimi' ), get_search_query() ); ?></h2></br>
					<!-- <h3>Torna in <a href="<?php //echo home_url();?>" >home page</a></h3> -->
					<h3><?php _e( 'Goto ', 'gimi' ); ?><a href="<?php echo home_url();?>" >home page</a></h3>
				</div>
			<?php } ?>
		</div>
	<?php endif; ?>
<?php get_sidebar('info');?>
</div>


<?php get_footer(); ?>
