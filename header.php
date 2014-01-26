<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if($title != ''): echo $title.' :: '; endif; ?>High Technology High School</title>
        <link type="text/css" href="<?=get_stylesheet_directory_uri()?>/style.css" rel="stylesheet" />
        <link type="text/css" href="<?=get_stylesheet_directory_uri()?>/css/mobile.css" rel="stylesheet" />
		<link type="text/css" href="<?=get_stylesheet_directory_uri()?>/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
		<script src="<?=get_stylesheet_directory_uri()?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
		<script src="<?=get_stylesheet_directory_uri()?>/js/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
		<script src="<?=get_stylesheet_directory_uri()?>/js/main.js" type="text/javascript"></script>
		
		<!-- IE version specific stylesheets/scripts -->
		<!--[if IE 7]>
            <link type="text/css" rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/css/ie7.css">
            <script src="<?=get_stylesheet_directory_uri()?>/js/ie7.js" type="text/javascript"></script>
        <![endif]-->
        <!--[if IE 8]>
            <link type="text/css" rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/css/ie8.css">
            <script src="<?=get_stylesheet_directory_uri()?>/js/ie8.js" type="text/javascript"></script>
        <![endif]-->
        <!--[if IE 9]>
            <link type="text/css" rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/css/ie9.css">
        <![endif]-->

        <?php wp_head(); ?>
	</head>

	<body>
		<div id="header">
			<div id="header_container">
				<div id="header_logo"></div>
				<div id="header_links">
					<form action="<?php echo home_url( '/' ); ?>" method="get">
						<input type="text" name="s" size="25" />
						<input type="submit" value="Search" />
					</form>
				</div>
				
				<div id="title_wrapper">
					<h1>High Technology High School</h1>
				</div>
				
				<div id="navbar">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    )); ?>
				</div>
				
				<div id="navbar_mobile_outer"><div id="navbar_mobile"></div></div>
			</div>
        </div>
        
        <div id="container">