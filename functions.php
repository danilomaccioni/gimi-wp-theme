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

/******/

function print_post_date($class_div = Null){
	$wp_post_object = get_post();
	$str = ($class_div != Null)? ' class="' . $class_div .'"'  : '';
	echo "<div" . $str . ">" . date_i18n( get_option( 'date_format' ), strtotime($wp_post_object->post_date ) ) . "</div>";
}

/*****/

add_action( 'wp_enqueue_scripts', 'register_gimi_styles' );

function register_gimi_styles() {
	wp_register_style( 'gimi', get_stylesheet_directory_uri() . "/style.css" );
	wp_enqueue_style( 'gimi' );
}

/*********/

function print_category_and_tag(){
		
	$cat_array = get_the_category();
	$tag_array = get_the_tags();
	$category_list = array();
	$tag_list = array();
	
	foreach ($cat_array as $wp_term_object_array){
		if ($wp_term_object_array->cat_ID != 1){
			$category_list[$wp_term_object_array->cat_ID] = $wp_term_object_array->name;
		}
	}
		//print_r ( $category_list );
		//echo count($category_list);
	switch ($category_counter = count($category_list) ) {
		case 0:
			break;
		
		case 1:
			echo '<div class="post_category">';
			echo 'Category: <a href="' . get_category_link(key($category_list)) . '">' . array_shift($category_list) . '</a>';
			echo '</div>';
			break;
			
		default:
			$counter = 0;
			$str = "Categories: ";
			foreach($category_list as $key => $value){
				$str .= '<a href="' . get_category_link($key) . '">' . $value . '</a>';
				$str .= ($counter < $category_counter - 1)?', ':'';
				$counter++;
			}
			echo '<div class="post_category">' . $str . '</div>';
			break;
	}
				
				
	if ($tag_array ){
		foreach($tag_array as $wp_term_object_tag){
			$tag_list[$wp_term_object_tag->term_id] = $wp_term_object_tag->name;
		}
	}
	
	switch ($tag_counter = count($tag_list) ) {
		case 0:
			break;
		
		case 1:
			echo '<div class="post_tags">';
			echo 'Tag: <a href="' . get_tag_link(key($tag_list)) . '">' . array_shift($tag_list) . '</a>';
			echo '</div>';
			break;
		
		default:
			$counter = 0;
			$str = "Tags: ";
			foreach($tag_list as $key => $value){
				$str .= '<a href="' . get_tag_link($key) . '">' . $value . '</a>';
				$str .= ($counter < $tag_counter - 1)?', ':'';
				$counter++;
			}
			echo '<div class="post_tags">' . $str . '</div>';
			break;
	}
		
		
}

?>
