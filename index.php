<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="post_container main_container">
		<ul class="post_list">
			<?php $post_while_counter = 0; global $wp_query;?>
			<?php while ( have_posts() ) : the_post(); $post_while_counter++ ?>
			<li>
				<div class="container_thumbnail">
					<?php if ( has_post_thumbnail() ) : ?>
							<a class="post_thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,150)); ?></a>
					<?php endif; ?> 
				</div>
				<div class="post_preview">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<?php /*echo get_the_excerpt();*/   the_content('[ suka... ]'); ?>
				</div>
				<?php if ( $post_while_counter <  $wp_query->post_count): ?>
					<hr>
				<?php endif; ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php 	$nav_status_prev = ( get_previous_posts_link() ) ? True : False;
				$nav_status_next = ( get_next_posts_link() ) ? True : False;
				
		if ($nav_status_prev || $nav_status_next ) :?>
			<div class="navigation">
				<?php if( $nav_status_prev ) :?>
					<div class="alignleft"><?php previous_posts_link( '&laquo; Next Entries' ); ?></div>
				<?php endif; ?>
				
				<?php if( $nav_status_prev && $nav_status_next ) :?>
					<div class="nav_separetor"> || </div>
				<?php endif; ?>
				
				<?php if( $nav_status_next ) : ?>
					<div class="alignright"><?php next_posts_link( 'Previous Entries &raquo; ', '' ); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
