<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" type="text/css">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
	</head>
<body>
	<header>
		<h1><?php bloginfo('name'); ?></h1>
	</header>
	<nav>
		
		<?php //wp_list_pages(array('title_li' => null )); ?>
		<?php wp_page_menu(array( 'show_home' => 1)); ?>
	</nav>