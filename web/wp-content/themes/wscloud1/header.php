<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
<?php $options = get_option('eocms_options'); ?>
<title><?php wp_title( ' ', true, 'right' );  ?></title>
<?php if(is_home()){ ?>
<meta name="description" content="<?php echo $options['meta_description']; ?>" />
<meta name="keywords" content="<?php echo $options['meta_keywords']; ?>" />
<?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="google-site-verification" content="<?php echo $options['google_wm']; ?>" />
<link rel="shortcut icon" href="<?php echo home_url(); ?>/favicon.ico" />
<?php wp_head();?>
</head>

<body>
<!-- container begin -->
<section class="container">

   <!-- header begin -->
   <header class="header">
      <div class="head-layout">
         <div class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo $options['head_logo']; ?>" alt="<?php wp_title( ' ', true, 'right' );  ?>"></a></div>
<?php if($options['head_sns']<>'') { ?>
         <ul class="head-social">
            <li><a class="icon-facebook" href="<?php echo $options['facebook']; ?>"></a></li>
            <li><a class="icon-google" href="<?php echo $options['google']; ?>"></a></li>
            <li><a class="icon-tweet" href="<?php echo $options['twitter']; ?>"></a></li>
            <li><a class="icon-linkedin" href="<?php echo $options['linkedin']; ?>"></a></li>
            <li><a class="icon-video" href="<?php echo $options['youtube']; ?>"></a></li>
         </ul>
<?php     } ?>
         <ul class="head-info">
            <li class="email"><?php echo $options['email']; ?></li>
            <li class="phone"><?php echo $options['phone']; ?></li>
         </ul>
      </div>
   </header>
   <!--// header end -->
   
   <!-- navigation begin -->
   <nav class="nav-bar">
      <div class="nav-wrap">
         <ul class="nav">
	  <?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'primary', 'echo' => false)) ));?>
         </ul>
         <div class="head-search">
        <span class="ipt-wrap">
        <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input name="s" id="s"  class="search-ipt" type="text" value="" />
        <input id="searchsubmit" class="search-btn" type="submit" value="" />
        </span>
       </form>
         </div>
      </div>
   </nav>
   <!--// navigation end -->

   <!-- slide begin -->
   <section class="slide-wrapper">
      <div class="slide-banners">
         <ul class="slides">
         <?php if($options['slider_img1']<>'') { ?><li><a href="<?php echo $options['slider_link1']; ?>"><img src="<?php echo $options['slider_img1']; ?>" width="1080" height="340" alt="<?php echo $options['slider_title1']; ?>" /></a></li><?php     } ?>
         <?php if($options['slider_img2']<>'') { ?><li><a href="<?php echo $options['slider_link2']; ?>"><img src="<?php echo $options['slider_img2']; ?>" width="1080" height="340" alt="<?php echo $options['slider_title2']; ?>" /></a></li><?php     } ?>
         <?php if($options['slider_img3']<>'') { ?><li><a href="<?php echo $options['slider_link3']; ?>"><img src="<?php echo $options['slider_img3']; ?>" width="1080" height="340" alt="<?php echo $options['slider_title3']; ?>" /></a></li><?php     } ?>
         <?php if($options['slider_img4']<>'') { ?><li><a href="<?php echo $options['slider_link4']; ?>"><img src="<?php echo $options['slider_img4']; ?>" width="1080" height="340" alt="<?php echo $options['slider_title4']; ?>" /></a></li><?php     } ?>
         <?php if($options['slider_img5']<>'') { ?><li><a href="<?php echo $options['slider_link5']; ?>"><img src="<?php echo $options['slider_img5']; ?>" width="1080" height="340" alt="<?php echo $options['slider_title5']; ?>" /></a></li><?php     } ?>
         </ul>
      </div>
   </section>
   <!--// slide end -->