<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<div class="right_sidebar info_sidebar"> 
	<?php $cat_widget = ( wp_is_mobile() ) ? 'dropdown=1&count=1' : 'count=1'; ?>
	<?php the_widget('WP_Widget_Categories', $cat_widget, array( 'before_title' => '<h5>', 'after_title' => '</h5>') ); ?>
	<?php the_widget('WP_Widget_Tag_Cloud', '', array( 'before_title' => '<h5>', 'after_title' => '</h5>')); ?>
	<?php dynamic_sidebar( 'right_sidebar_widget_container' ); ?>
</div>
