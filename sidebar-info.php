<div class="right_sidebar info_sidebar"> 
	<?php the_widget('WP_Widget_Categories', 'count=1', array( 'before_title' => '<h5>', 'after_title' => '</h5>') ); ?>
	<?php the_widget('WP_Widget_Tag_Cloud', '', array( 'before_title' => '<h5>', 'after_title' => '</h5>')); ?>
	<?php dynamic_sidebar( 'right_sidebar_widget_container' ); ?>
</div>
