<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php 
	if(is_home()):
		echo '汇星海科技';
	else:	
		if(have_posts()):
			while(have_posts()):
				the_post();
				the_title();
			endwhile;
	
	    endif;
	endif;   
?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/css/index.css" />
<script type="text/javascript" src="<?php bloginfo('template_url');?>/script/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/script/index.js"></script>
</head>

<body>
<div class="header-top">
<div class="alldivwid">

<?php 
	$args = array(
		'name' =>'logo',
	);	
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			the_content();
		endwhile;
	endif;
	
	wp_nav_menu( array(
	'theme_location'  =>  'header-menu',
	'menu_class'      =>  'nav',
	'container'       =>  false,
	'depth' 		  =>  2,
	'link_after' => "<i class='fa-angle-down'></i>",
  ) ); ?>
<div class="searchform">

<?php get_search_form(); ?>
</div>
</div>
</div>