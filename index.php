<?php get_header(); ?>

<div class="main_container">
	<?php //print_r( $_SERVER['HTTP_USER_AGENT'] ); ?>
	<?php if ( have_posts() ) : ?>
		<div class="center_container posts_container">
			
			<?php if (is_search() ){?>
					<div> Risultato ricerca <?php the_search_query(); ?> : </div>
			<?php }elseif (is_tag() ) { ?>
					<div> <?php single_tag_title('Currently browsing Tag: '); ?> </div>
			<?php }elseif (is_category() ) { ?>
					<div> <?php single_cat_title('Currently browsing Category: '); ?> </div>
			<?php }elseif (is_archive() ) { ?>
					<div> pippo paranza </div>
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
	<?php 
	else:?>
		<div class="center_container">
			<?php if (is_search()){?>
				<div>
					Il termine "<?php the_search_query(); ?>" ricercato non esiste</br>
					Torna in <a href="<?php echo home_url();?>" >home page</a>
				</div>
			<?php } ?>
		</div>
	<?php endif; ?>
<?php get_sidebar('info');?>
</div>


<?php get_footer(); ?>
