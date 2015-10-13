<?php
	$options = get_option('eocms_Options');	

	$photo_cats = explode(',',$options["style_photo"]);
	$news_cats = explode(',',$options["style_news"]);

	//得到分类标题但不echo
	$cat_title = single_cat_title("", false);
	//把标题转成ID
	$cat_ID = get_cat_ID($cat_title);	

	if( in_array($cat_ID,$photo_cats) ):
		include(TEMPLATEPATH . '/archive-products.php');
	elseif( in_array($cat_ID,$news_cats) ):
		include(TEMPLATEPATH . '/archive-news.php');
	else: 
		include(TEMPLATEPATH . '/archive-products.php');

?><?php endif; ?>