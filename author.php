<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="posts_container main_container">
		<div class="user_sidebar"> 
			<?php $user_info = get_user_info('150'); ?>
			<div class="box_avatar"> <?php echo $user_info['html_tag_avatar']; ?> </div>
			<div class="box_name"> <?php echo $user_info['user_name']; ?> </div>
			<div class="box_roles box_small_text"> <?php echo $user_info['roles']; ?> </div>
			<div class="box_registered box_small_text"> <?php echo $user_info['registered']; ?> </div>
			<div class="box_url box_small_text"> <a href="<?php echo $user_info['user_url']; ?>"> Site Url</a> </div>
			<div class="box_description box_small_text"> <?php echo $user_info['description']; ?> </div>
		</div>
		
		<div class="author_title">Post di <?php the_author(); ?></div>
		
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
