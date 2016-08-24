<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

		<footer>
			<?php bloginfo('name'); ?>
			<?php
				echo '<p>' . gimi_creation_blog_date() . '</p>';
			?>
			<?php //dynamic_sidebar( 'footer_widget_container' ); ?>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
