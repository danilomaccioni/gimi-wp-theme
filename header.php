<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<h1><?php bloginfo('name'); ?></h1>
		</header>
		<nav>
			<?php wp_page_menu(array( 'show_home' => 1)); ?>
			<?php the_widget('WP_Widget_Search', array(), 'prova'); ?>
		</nav>
