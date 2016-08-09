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
			The page doesn't exist on this site.</br>
			If are lost go to <a href="<?php echo home_url();?>" >Index</a>
		</div>
	</div>
	<?php get_sidebar('404'); ?>
</div>

<?php get_footer(); ?>
