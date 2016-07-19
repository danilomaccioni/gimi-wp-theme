<?php

// ************************************************************************** //

//include_once(ABSPATH . WPINC . '/plugin.php');

//include( '/wp-admin/includes/plugin.php');

//deactivate_plugins( array('/jetpack/jetpack.php'), true );

/*add_action('wp_head','disable_plugins');
function disable_plugins(){
    include_once(ABSPATH.'wp-admin/includes/plugin.php');
	echo ABSPATH.'wp-admin/includes/plugin.php<br>';
	echo ABSPATH . WPINC . '/plugin.php';
    //$current_theme = wp_get_theme();
    //$current_theme_name = $current_theme->Name;

//    if($current_theme_name == 'Twenty Sixteen'){
        if ( is_plugin_active('jetpack/jetpack.php') ) {
            deactivate_plugins('jetpack/jetpack.php');    
        }
 //   }
}
*/

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

?>


