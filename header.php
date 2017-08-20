<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name=viewport content="width=device-width,initial-scale=1">
		<?php wp_head(); ?>
	</head>
	
<body <?php body_class(); ?> style="background-color: #E9ECEF;">

	<header class="header">
		<img src="<?php header_image(); ?>" style="width: 100%;" class="img-responsive nav-image">
		<a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri();?>/images/three_logo.png"></a>
		
		<nav class="menu_header">
			<?php 
			$args = array(
				'theme_location' => 'primary'
			);
			?>
			<?php wp_nav_menu($args); ?>
		</nav>
		<div class="bar-container" onclick="changeBar(this)">
			<div class="bar1"></div>
		  	<div class="bar2"></div>
		  	<div class="bar3"></div>
		</div>
		<h1>
		<?php 
            if(is_home()){
            	echo "SOLUTIONS";
            }elseif(is_category()){
            	single_cat_title();
            }elseif(is_tag()){
            	single_tag_title();
            }elseif (is_author()){
              	the_post();//for multiple author
              	echo get_the_author();
              	rewind_posts();//unaffected loop
            }elseif(is_day()){
              	get_the_date();
            }elseif(is_month()){
              	get_the_date('F Y');//month an year name
            }elseif(is_year()){
              	get_the_date('Y');//year name
            }elseif(is_page() ){
            	the_title();
            }
          ?>
		</h1>
	</header>
	