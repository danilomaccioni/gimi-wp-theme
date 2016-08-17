<?php

// ************************************************************************** //

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

// ************************************************************************** //

function gimi_widgets_footer() {

	register_sidebar( array(
		'name'          => 'footer widget container',
		'id'            => 'footer_widget_container',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<b class="footer_widget">',
		'after_title'   => '</b>',
	) );

}
add_action( 'widgets_init', 'gimi_widgets_footer' );

function gimi_widgets_right_sidebar() {

	register_sidebar( array(
		'name'          => 'right sidebar widget container',
		'id'            => 'right_sidebar_widget_container',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<b class="right_sidebar_widget">',
		'after_title'   => '</b>',
	) );

}
add_action( 'widgets_init', 'gimi_widgets_right_sidebar' );


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
	
	if ( !wp_is_mobile() ) {
		
		wp_enqueue_script('gimi-sidebar-script',
				get_stylesheet_directory_uri() . '/js/sidebar.js',
				array('jquery'),
				false,
				true);
	}
}

add_action( 'wp_enqueue_scripts', 'gimi_include_function' );


// ************************************************************************** //


function the_post_gimi_thumbnail_caption() {
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
	$cat_messages = "Article posted in ";
	$tag_messages = "Article tagged in ";
	
	
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
			$key = key($category_list);
			$cat_shift = array_shift($category_list);
		
			echo ('<div class="post_category">'
					. 'Category: <a href="' . get_category_link( $key ) 
					. '" title="' . $cat_messages . $cat_shift . '">' 
					. $cat_shift . '</a>'
				  . '</div>');
			break;
			
		default:
			$counter = 0;
			$str = "Categories: ";
			foreach($category_list as $key => $value){
				$str .= '<a href="' . get_category_link($key) . '" title="' . $cat_messages . $value . '">' . $value . '</a>';
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
			$key = key($tag_list);
			$tag_shift = array_shift($tag_list);
		
			echo(
				'<div class="post_tags">' .
					'Tag: ' .
					'<a ' .
						'href="' . get_tag_link( $key ) . '" ' .
						'title="' . $tag_messages . $tag_shift . '"' .
					'>' .
						$tag_shift .
					'</a>' .
				'</div>'
			);
			break;
		
		default:
			$counter = 0;
			$str = "Tags: ";
			foreach($tag_list as $key => $value){
				$str .= '<a href="' . get_tag_link($key) . '" title="' . $tag_messages . $value . '">' . $value . '</a>';
				$str .= ($counter < $tag_counter - 1)?', ':'';
				$counter++;
			}
			echo '<div class="post_tags">' . $str . '</div>';
			break;
	}
}


function print_prev_next_links(){
		$nav_status_prev = ( get_previous_posts_link() ) ? True : False;
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
		<?php endif;
}

function print_post_separator($post_while_counter){
		global $wp_query;
		if ( $post_while_counter <  $wp_query->post_count): ?>
			<hr>
		<?php endif;
}

function get_user_info($size = ''){
		$user_info = array();
		$WP_userdata = get_userdata( get_the_author_meta('ID') );
		
		$user_info['description'] = get_the_author_meta('description');
		$user_info['html_tag_avatar'] = get_avatar( get_the_author_meta( 'ID' ), $size);
		$user_info['registered'] =date_i18n( get_option( 'date_format' ), strtotime( $WP_userdata->user_registered ) ) ;
		$user_info['user_name'] = $WP_userdata->display_name;
		$user_info['user_url'] = $WP_userdata->user_url;
		$user_info['roles'] = $WP_userdata->roles[0];
		
		return $user_info;
}

function creation_blog_date(){
	global $wpdb;
	global $table_prefix;
	
	// tentativi
	//$sql ="SELECT create_time FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='" . DB_NAME . "' AND table_name='wp_users'";
	//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='" . DB_NAME . "' AND table_name='" . $table_prefix . "users'";
	//$sql = "SHOW TABLE status WHERE name ='" . $table_prefix . "users'";
	
	$sql = "SELECT MIN(create_time) AS c_date FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='" . DB_NAME . "' AND table_name='" . $table_prefix . "users'";
	
	// ultima versione
	// http://stackoverflow.com/questions/11192885/get-mysql-database-creation-date-with-java
	//$sql = "SELECT MIN(create_time) AS c_date FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '" . DB_NAME . "'";
	$query_result = $wpdb->get_row( $sql )->c_date;
	
	// data completa formattata nel modo canonico del blog
	//return date_i18n( get_option( 'date_format' ), strtotime( $query_result->date ) ) ;
	
	// prendo solo l'anno
	return date_i18n( 'Y', strtotime( $query_result ) ) ;
}

add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($output) {
	$output = str_replace('</a> (','<span> ',$output);
	$output = str_replace(')','</span></a> ',$output);
	return $output;
}

/*
add_filter('wp_tag_cloud', 'tag_cloud_optionList');
function tag_cloud_optionList($output) {
	$output = str_replace('</a> (','<span> ',$output);
	$output = str_replace(')','</span></a> ',$output);
	return $output;
}
* */

?>
