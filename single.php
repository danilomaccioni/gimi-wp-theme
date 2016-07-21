<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
	<div class="post_container main_container">
		<pre><?php //print_r (wp_get_attachment_metadata(get_post_thumbnail_id())); ?></pre>
				<?php //$thumb_img = get_post_meta( get_post_thumbnail_id() ); // Get post meta by ID
					//echo $thumb_img['_wp_attachment_image_alt']['0']; // Display Alt text 
					//echo $thumb_img->post_excerpt . "--"; // Display Caption
					//echo $thumb_img->post_content . "--"; // Display Description
					?>
					
				<pre><?php //print_r (get_post_meta( get_post_thumbnail_id() )); ?></pre>
		<?php if ( has_post_thumbnail() ): ?>
			<div class="post_thumbnail">
				<?php the_post_thumbnail(array(250,250));
				the_post_thumbnail_caption();
				//print_r (wp_get_attachment_image_src(get_post_thumbnail_id()));
				//print_r (get_attached_media(get_post_thumbnail_id()));
				?>
				
			</div>
		<?php endif; ?> 
		<h1><?php the_title();?></h1>
		<?php print_post_date("single_post_date");?>
		<?php the_content();?>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
