<?php
/*
* @package WordPress
* @subpackage gimi
* @since gimi 0.1
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( ); ?> >
		<header>
			<h1><?php bloginfo('name'); ?></h1>
			<div><?php bloginfo('description'); ?></div>
		</header>
		<nav id="header_nav">
			<?php //wp_page_menu(array( 'show_home' => 1)); ?>
			
			<?php
				$args = array( 
					'theme_location' => 'primary' ,
					'show_home' => true
				);
			 ?>
			<?php wp_page_menu( $args ); ?>
			
			<?php the_widget('WP_Widget_Search', array(), 'prova'); ?>
		</nav>
