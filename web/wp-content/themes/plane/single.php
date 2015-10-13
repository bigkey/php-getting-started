<?php
	if(in_category('companyinfo') || is_category('companyinfo')){ //关于企业
		include (TEMPLATEPATH .'/single-conpanyinfo.php');	
	}else if(in_category('contact-form')){						// 询盘提交成功
		include (TEMPLATEPATH .'/single-contactform.php');
	}else if(in_category('product') || is_category('product')){                           //产品页
		include (TEMPLATEPATH .'/single-products.php');
	}else if(in_category('videos')){
		include (TEMPLATEPATH .'/single-video.php');
	}else if(in_category('news')){
		include (TEMPLATEPATH .'/single-news.php');
	}
	