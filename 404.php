<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<?php get_header(); ?>

<div class="main_container">
	<div class="center_container e404">
		<div class="e404_number">
			404
		</div>
		<div class="e404_not_found">
			Page not Found
		</div>
		<div class="e404_messages">
			<!-- The page doesn't exist on this site.</br> -->
			<?php _e( 'The page doesn\'t exist on this site.', 'gimi' ); ?></br>
			<!-- If are lost go to <a href="<?php //echo home_url();?>" >Home page</a> -->
			<?php _e( 'If are lost go to ', 'gimi' ); ?>
			</br>
			<a href="<?php echo home_url();?>" >home page</a>
		</div>
	</div>
	<?php get_sidebar('404'); ?>
</div>

<?php get_footer(); ?>
