<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<div class="right_sidebar e404_sidebar"> 
	<?php the_widget('WP_Widget_Recent_Posts', '5',  array( 'before_title' => '<h5>', 'after_title' => '</h5>')); ?>
	<?php the_widget('WP_Widget_Recent_Comments', '5',  array( 'before_title' => '<h5>', 'after_title' => '</h5>')); ?> 
</div>
