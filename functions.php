<?php

// ************************************************************************** //

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

// ************************************************************************** //

function gimi_widgets_init() {

	register_sidebar( array(
		'name'          => 'footer widget container',
		'id'            => 'footer_widget_container',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<b class="footer_widget">',
		'after_title'   => '</b>',
	) );

}
add_action( 'widgets_init', 'gimi_widgets_init' );

// ************************************************************************** //

function gimi_include_function() {
	wp_register_script(
		'gimi-footer-script',
		get_stylesheet_directory_uri() . '/js/footer.js',
		array('jquery'),
		false,
		true
	);
	
	
	wp_enqueue_script('gimi-footer-script');
}

add_action( 'wp_enqueue_scripts', 'gimi_include_function' );

// ************************************************************************** //


function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

function print_post_date($class_div = Null){
	$wp_post_object = get_post();
	$str = ($class_div != Null)? ' class="' . $class_div .'"'  : '';
	echo "<div" . $str . ">" . date_i18n( get_option( 'date_format' ), strtotime($wp_post_object->post_date ) ) . "</div>";
}

?>


