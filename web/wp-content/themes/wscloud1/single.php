<?php
	$options = get_option('eocms_Options');	

	$product_single = explode(',',$options["style_photo"]);
	$default_single = explode(',',$options["style_news"]);

	if( in_category($product_single) )
		include(TEMPLATEPATH . '/single-product.php');
	elseif( in_category($default_single) )
		include(TEMPLATEPATH . '/single-news.php');
	else
		include(TEMPLATEPATH . '/single-product.php');	
?>
