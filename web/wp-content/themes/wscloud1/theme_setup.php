<?php
/** eocms options */
class eocmsOptions {
	function getOptions() {
		$options = get_option('eocms_Options');
		if (!is_array($options)) {
			update_option('eocms_Options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['zGauge_save'])) {
			$options = eocmsOptions::getOptions();
			$options['head_products_no'] = stripslashes($_POST['head_products_no']);
			$options['head_la_products_no'] = stripslashes($_POST['head_la_products_no']);
			$options['cate_products_no'] = stripslashes($_POST['cate_products_no']);
			$options['head_news_no'] = stripslashes($_POST['head_news_no']);
			$options['ashu_logo'] = stripslashes($_POST['ashu_logo']);

			$options['meta_title'] = stripslashes($_POST['meta_title']);
			$options['meta_description'] = stripslashes($_POST['meta_description']);
			$options['meta_keywords'] = stripslashes($_POST['meta_keywords']);

			$options['footer_code'] = stripslashes($_POST['footer_code']);

			$options['about_text'] = stripslashes($_POST['about_text']);
			$options['about_img_1'] = stripslashes($_POST['about_img_1']);
			$options['about_img_2'] = stripslashes($_POST['about_img_2']);
			$options['about_img_3'] = stripslashes($_POST['about_img_3']);

			$options['reviews_1'] = stripslashes($_POST['reviews_1']);
			$options['reviews_name_1'] = stripslashes($_POST['reviews_name_1']);
			$options['reviews_2'] = stripslashes($_POST['reviews_2']);
			$options['reviews_name_2'] = stripslashes($_POST['reviews_name_2']);
			$options['reviews_3'] = stripslashes($_POST['reviews_3']);
			$options['reviews_name_3'] = stripslashes($_POST['reviews_name_3']);

			$options['company'] = stripslashes($_POST['company']);
			$options['address'] = stripslashes($_POST['address']);
			$options['phone'] = stripslashes($_POST['phone']);
			$options['fax'] = stripslashes($_POST['fax']);
			$options['email'] = stripslashes($_POST['email']);
			$options['msn'] = stripslashes($_POST['msn']);
			$options['skype'] = stripslashes($_POST['skype']);

			$options['head_logo'] = stripslashes($_POST['head_logo']);
			$options['google_wm'] = stripslashes($_POST['google_wm']);

			if ($_POST['head_sns']) {
				$options['head_sns'] = (bool)true;
			} else {
				$options['head_sns'] = (bool)false;
			}

			if ($_POST['head_topnavi']) {
				$options['head_topnavi'] = (bool)true;
			} else {
				$options['head_topnavi'] = (bool)false;
			}
			$options['inquiry_email'] = stripslashes($_POST['inquiry_email']);

			$options['facebook'] = stripslashes($_POST['facebook']);
			$options['twitter'] = stripslashes($_POST['twitter']);
			$options['linkedin'] = stripslashes($_POST['linkedin']);
			$options['youtube'] = stripslashes($_POST['youtube']);
			$options['google'] = stripslashes($_POST['google']);
			$options['rss'] = stripslashes($_POST['rss']);

			$options['slider_img1'] = stripslashes($_POST['slider_img1']);
			$options['slider_title1'] = stripslashes($_POST['slider_title1']);
			$options['slider_link1'] = stripslashes($_POST['slider_link1']);
			$options['slider_img2'] = stripslashes($_POST['slider_img2']);
			$options['slider_title2'] = stripslashes($_POST['slider_title2']);
			$options['slider_link2'] = stripslashes($_POST['slider_link2']);
			$options['slider_img3'] = stripslashes($_POST['slider_img3']);
			$options['slider_title3'] = stripslashes($_POST['slider_title3']);
			$options['slider_link3'] = stripslashes($_POST['slider_link3']);
			$options['slider_img4'] = stripslashes($_POST['slider_img4']);
			$options['slider_title4'] = stripslashes($_POST['slider_title4']);
			$options['slider_link4'] = stripslashes($_POST['slider_link4']);
			$options['slider_img5'] = stripslashes($_POST['slider_img5']);
			$options['slider_title5'] = stripslashes($_POST['slider_title5']);
			$options['slider_link5'] = stripslashes($_POST['slider_link5']);

			if ($_POST['show_block1']) {
				$options['show_block1'] = (bool)true;
			} else {
				$options['show_block1'] = (bool)false;
			}
			$options['block1_left_title_cn'] = stripslashes($_POST['block1_left_title_cn']);
			$options['block1_left_title_en'] = stripslashes($_POST['block1_left_title_en']);

			if( is_array($_POST['block1_left_cat']) ) {
				$options['block1_left_cat'] = implode(",", $_POST['block1_left_cat']);		
			}
			else
				$options['block1_left_cat'] = '';

			$options['block1_about_title_cn'] = stripslashes($_POST['block1_about_title_cn']);
			$options['block1_about_title_en'] = stripslashes($_POST['block1_about_title_en']);
			$options['block1_about_img'] = stripslashes($_POST['block1_about_img']);
			$options['block1_about_link'] = stripslashes($_POST['block1_about_link']);
			$options['block1_about_content'] = stripslashes($_POST['block1_about_content']);

			$options['block1_news_title_cn'] = stripslashes($_POST['block1_news_title_cn']);
			$options['block1_news_title_en'] = stripslashes($_POST['block1_news_title_en']);

			if( is_array($_POST['block1_news_cat']) ) {
				$options['block1_news_cat'] = implode(",", $_POST['block1_news_cat']);		
			}
			else
				$options['block1_news_cat'] = '';
			
			if ($_POST['show_reviews']) {
				$options['show_reviews'] = (bool)true;
			} else {
				$options['show_reviews'] = (bool)false;
			}
			$options['block2_img1'] = stripslashes($_POST['block2_img1']);
			$options['block2_title1'] = stripslashes($_POST['block2_title1']);
			$options['block2_link1'] = stripslashes($_POST['block2_link1']);
			$options['block2_content1'] = stripslashes($_POST['block2_content1']);

			$options['block2_img2'] = stripslashes($_POST['block2_img2']);
			$options['block2_title2'] = stripslashes($_POST['block2_title2']);
			$options['block2_link2'] = stripslashes($_POST['block2_link2']);
			$options['block2_content2'] = stripslashes($_POST['block2_content2']);

			$options['block2_img3'] = stripslashes($_POST['block2_img3']);
			$options['block2_title3'] = stripslashes($_POST['block2_title3']);
			$options['block2_link3'] = stripslashes($_POST['block2_link3']);
			$options['block2_content3'] = stripslashes($_POST['block2_content3']);

			if ($_POST['show_block3']) {
				$options['show_block3'] = (bool)true;
			} else {
				$options['show_block3'] = (bool)false;
			}
			$options['block3_title_cn'] = stripslashes($_POST['block3_title_cn']);
			$options['block3_title_en'] = stripslashes($_POST['block3_title_en']);
			$options['block3_posts'] = stripslashes($_POST['block3_posts']);
			
			if( is_array($_POST['block3_cat']) ) {
				$options['block3_cat'] = implode(",", $_POST['block3_cat']);		
			}
			else
				$options['block3_cat'] = '';

			if( is_array($_POST['style_photo']) ) {
				$options['style_photo'] = implode(",", $_POST['style_photo']);		
			}
			else
				$options['style_photo'] = '';


			if( is_array($_POST['style_news']) ) {
				$options['style_news'] = implode(",", $_POST['style_news']);		
			}
			else
				$options['style_news'] = '';

			if( is_array($_POST['product_single']) ) {
				$options['product_single'] = implode(",", $_POST['product_single']);		
			}
			else
				$options['product_single'] = '';

			if( is_array($_POST['default_single']) ) {
				$options['default_single'] = implode(",", $_POST['default_single']);		
			}
			else
				$options['default_single'] = '';

			$options['contact_1'] = stripslashes($_POST['contact_1']);
			$options['contact_2'] = stripslashes($_POST['contact_2']);
			$options['contact_3'] = stripslashes($_POST['contact_3']);
			$options['contact_4'] = stripslashes($_POST['contact_4']);
			$options['contact_5'] = stripslashes($_POST['contact_5']);
			$options['contact_6'] = stripslashes($_POST['contact_6']);
			$options['contact_7'] = stripslashes($_POST['contact_7']);
			$options['contact_8'] = stripslashes($_POST['contact_8']);

			if ($_POST['kefu_show']) {
				$options['kefu_show'] = (bool)true;
			} else {
				$options['kefu_show'] = (bool)false;
			}
			$options['kefu_msn1'] = stripslashes($_POST['kefu_msn1']);
			$options['kefu_msn2'] = stripslashes($_POST['kefu_msn2']);
			$options['kefu_skype1'] = stripslashes($_POST['kefu_skype1']);
			$options['kefu_skype2'] = stripslashes($_POST['kefu_skype2']);
			$options['kefu_link_title'] = stripslashes($_POST['kefu_link_title']);
			$options['kefu_link_url'] = stripslashes($_POST['kefu_link_url']);
			$options['kefu_tel1'] = stripslashes($_POST['kefu_tel1']);
			$options['kefu_tel2'] = stripslashes($_POST['kefu_tel2']);

			// foot menu
			if ($_POST['show_footmenu']) {
				$options['show_footmenu'] = (bool)true;
			} else {
				$options['show_footmenu'] = (bool)false;
			}
			// foot content
			$options['footer_content'] = stripslashes($_POST['footer_content']);

			update_option('eocms_Options', $options);

		} else {
			eocmsOptions::getOptions();
		}

		add_theme_page('网站参数设置', '网站参数设置', 'edit_themes', basename(__FILE__), array('eocmsOptions', 'display'));
	}

	function display() {
		

		$options = eocmsOptions::getOptions();
		
		
?>

<script language="JavaScript">
//点击标题隐藏下方表格
function hide(num) {
/*	var menuitems = document.getElementsByName("menuitem");
	for(var i=0;i<=menuitems.length;i++) {
		menuitems[i].className="out";
	}
	document.getElementById('block'+num).style.display="block";
	document.getElementById("menuitem"+num).className="current";

	var blocks = document.getElementsByName("block");
	for(var i=0;i<=blocks.length;i++) {
		menuitems[i].style.display="none";
	}*/
	$("#lmenu li a").attr("class","out");
	$("#menuitem"+num).attr("class","current");

	$("#main ul").css("display","none");
	$("#block"+num).css("display","block");}
	jQuery(document).ready(function() {
    jQuery('#upload_image_button').click(function() {
     formfield = jQuery('#upload_image').attr('name');
     // show WordPress' uploader modal box
     tb_show('', '<?php echo admin_url(); ?>media-upload.php?type=image&amp;TB_iframe=true');
     return false;
    });
    window.send_to_editor = function(html) {
     // this will execute automatically when a image uploaded and then clicked to 'insert to post' button
     imgurl = jQuery('img',html).attr('src');
     // put uploaded image's url to #upload_image
     jQuery('#upload_image').val(imgurl);
     tb_remove();
    }
});
	
</Script>
<?php

	//加载upload.js文件   
			wp_enqueue_script('my-upload', get_bloginfo( 'stylesheet_directory' ) . '/js/upload.js');   
			//加载点击上传图片的js(wp自带)   
			wp_enqueue_script('thickbox');   
			//加载css(wp自带)   
			wp_enqueue_style('thickbox');
	$blocks[] = array(
			'block_title'	=>	'基本设置',
			'block_detail'	=>	array(
				'0'		=>	array(
 					'type'		=>	'text',
					'title'		=>	'网站logo',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'head_logo',
					'value'		=>	$options['head_logo'],
				),
				'2'		=>	array(
					'type'		=>	'text',
					'title'		=>	'网站描述 Description',
					'label'		=>	'SEO提示: 70至160个字符',
					'name'		=>	'meta_description',
					'value'		=>	$options['meta_description']					
				),
				'3'		=>	array(
					'type'		=>	'text',
					'title'		=>	'网站关键词 Keywords',
					'label'		=>	'SEO提示: 10-20个关键词,勿堆砌,关键词请用英文逗号隔开',
					'name'		=>	'meta_keywords',
					'value'		=>	$options['meta_keywords']					
				),
				'4'		=>	array(
					'type'		=>	'text',
					'title'		=>	'全站热门产品显示数量 - Featured Products',
					'label'		=>	'',
					'name'		=>	'head_products_no',
					'value'		=>	$options['head_products_no']					
				),
				'5'		=>	array(
					'type'		=>	'text',
					'title'		=>	'首页最新产品显示数量 - Latest Products',
					'label'		=>	'',
					'name'		=>	'head_la_products_no',
					'value'		=>	$options['head_la_products_no']					
				),
				'6'		=>	array(
					'type'		=>	'text',
					'title'		=>	'分类页产品显示数量',
					'label'		=>	'默认为24 *需要修改请联系客服',
					'name'		=>	'cate_products_no',
					'value'		=>	'24'					
				),
				'7'		=>	array(
					'type'		=>	'text',
					'title'		=>	'询盘接收邮箱',
					'label'		=>	'',
					'name'		=>	'inquiry_email',
					'value'		=>	$options['inquiry_email']					
				),
				'8'		=>	array(
					'type'		=>	'text',
					'title'		=>	'谷歌webmaster Meta验证代码',
					'label'		=>	'请复制Meta代码中的content引号里的字符串;',
					'name'		=>	'google_wm',
					'value'		=>	$options['google_wm']					
				)
			)		
		);
		


	$blocks[] = array(
			'block_title'	=>	'幻灯图片设置',
			'block_detail'	=>	array(
				'0'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片1地址,  图片地址若留空，则不显示',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'slider_img1',
					'value'		=>	$options['slider_img1']					
				),
				'1'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片1说明',
					'label'		=>	'',
					'name'		=>	'slider_title1',
					'value'		=>	$options['slider_title1']					
				),
				'2'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片1链接',
					'label'		=>	'',
					'name'		=>	'slider_link1',
					'value'		=>	$options['slider_link1']					
				),
				'3'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片2地址',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'slider_img2',
					'value'		=>	$options['slider_img2']					
				),
				'4'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片2说明',
					'label'		=>	'',
					'name'		=>	'slider_title2',
					'value'		=>	$options['slider_title2']					
				),
				'5'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片2链接',
					'label'		=>	'',
					'name'		=>	'slider_link2',
					'value'		=>	$options['slider_link2']					
				),
				'6'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片3地址',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'slider_img3',
					'value'		=>	$options['slider_img3']					
				),
				'7'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片3说明',
					'label'		=>	'',
					'name'		=>	'slider_title3',
					'value'		=>	$options['slider_title3']					
				),
				'8'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片3链接',
					'label'		=>	'',
					'name'		=>	'slider_link3',
					'value'		=>	$options['slider_link3']					
				),
				'9'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片4地址',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'slider_img4',
					'value'		=>	$options['slider_img4']					
				),
				'10'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片4说明',
					'label'		=>	'',
					'name'		=>	'slider_title4',
					'value'		=>	$options['slider_title4']					
				),
				'11'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片4链接',
					'label'		=>	'',
					'name'		=>	'slider_link4',
					'value'		=>	$options['slider_link4']					
				),
				'12'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片5地址',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'slider_img5',
					'value'		=>	$options['slider_img5']					
				),
				'13'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片5说明',
					'label'		=>	'',
					'name'		=>	'slider_title5',
					'value'		=>	$options['slider_title5']					
				),
				'14'		=>	array(
					'type'		=>	'text',
					'title'		=>	'图片5链接',
					'label'		=>	'',
					'name'		=>	'slider_link5',
					'value'		=>	$options['slider_link5']					
				)
			)		
		);
		


			$blocks[] = array(
			'block_title'	=>	'联系方式设置',
			'block_detail'	=>	array(
				'7'		=>	array(
					'type'		=>	'checkbox',
					'title'		=>	'显示客服悬浮框',
					'label'		=>	'悬浮框内skype和msn会直接连接您的帐号',
					'name'		=>	'kefu_show',
					'value'		=>	$options['kefu_show']					
				),
				'0'		=>	array(
					'type'		=>	'text',
					'title'		=>	'公司名称',
					'label'		=>	'',
					'name'		=>	'company',
					'value'		=>	$options['company']					
				),
				'1'		=>	array(
					'type'		=>	'text',
					'title'		=>	'公司地址',
					'label'		=>	'',
					'name'		=>	'address',
					'value'		=>	$options['address']					
				),
				'2'		=>	array(
					'type'		=>	'text',
					'title'		=>	'联系Phone',
					'label'		=>	'',
					'name'		=>	'phone',
					'value'		=>	$options['phone']					
				),
				'3'		=>	array(
					'type'		=>	'text',
					'title'		=>	'联系Fax',
					'label'		=>	'',
					'name'		=>	'fax',
					'value'		=>	$options['fax']					
				),
				'4'		=>	array(
					'type'		=>	'text',
					'title'		=>	'联系Email',
					'label'		=>	'',
					'name'		=>	'email',
					'value'		=>	$options['email']					
				),
				'5'		=>	array(
					'type'		=>	'text',
					'title'		=>	'联系MSN帐号',
					'label'		=>	'',
					'name'		=>	'msn',
					'value'		=>	$options['msn']					
				),
				'6'		=>	array(
					'type'		=>	'text',
					'title'		=>	'联系Skype帐号',
					'label'		=>	'',
					'name'		=>	'skype',
					'value'		=>	$options['skype']					
				)
			)		
		);


	$blocks[] = array(
			'block_title'	=>	'关于我们设置',
			'block_detail'	=>	array(
				'0'		=>	array(
					'type'		=>	'text',
					'title'		=>	'关于我们图片-1',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'about_img_1',
					'value'		=>	$options['about_img_1']					
				),
				'1'		=>	array(
					'type'		=>	'text',
					'title'		=>	'关于我们图片-2',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'about_img_2',
					'value'		=>	$options['about_img_2']					
				),
				'2'		=>	array(
					'type'		=>	'text',
					'title'		=>	'关于我们图片-3',
					'label'		=>	'<input type="button" name="upload_button" value="点击上传" class="upbottom"/>',
					'name'		=>	'about_img_3',
					'value'		=>	$options['about_img_3']					
				),
				'3'		=>	array(
					'type'		=>	'textarea',
					'title'		=>	'关于我们文字',
					'label'		=>	'',
					'name'		=>	'about_text',
					'value'		=>	$options['about_text']					
				)
			)		
		);


	$blocks[] = array(
			'block_title'	=>	'新闻风格选择',
			'block_detail'	=>	array(
				'1'		=>	array(
					'type'		=>	'checkbox-cat',
					'title'		=>	'新闻列表风格',
					'label'		=>	'请选择需要显示为新闻列表格式的分类，默认选择News，如果增加了新闻分类，请在这里选择；未选择的分类默认显示为产品图文风格',
					'name'		=>	'style_news',
					'value'		=>	$options['style_news']					
				),
				'3'		=>	array(
					'type'		=>	'text',
					'title'		=>	'侧栏新闻显示数量',
					'label'		=>	'',
					'name'		=>	'head_news_no',
					'value'		=>	$options['head_news_no']					
				)
			)		
		);
	$blocks[] = array(
			'block_title'	=>	'社交栏目设置',
			'block_detail'	=>	array(
			    '0'		=>	array(
					'type'		=>	'checkbox',
					'title'		=>	'显示SNS按钮',
					'title2'	=>	'',
					'label'		=>	'请在下面填写完整网址!',
					'name'		=>	'head_sns',
					'value'		=>	$options['head_sns']					
				),

				'1'		=>	array(
					'type'		=>	'text',
					'title'		=>	'Facebook',
					'title2'	=>	'',
					'label'		=>	'',
					'name'		=>	'facebook',
					'value'		=>	$options['facebook']					
				),
				'2'		=>	array(
					'type'		=>	'text',
					'title'		=>	'Twitter',
					'title2'	=>	'',
					'label'		=>	'',
					'name'		=>	'twitter',
					'value'		=>	$options['twitter']					
				),
				'5'		=>	array(
					'type'		=>	'text',
					'title'		=>	'Google',
					'title2'	=>	'',
					'label'		=>	'',
					'name'		=>	'google',
					'value'		=>	$options['google']					
				),
				'3'		=>	array(
					'type'		=>	'text',
					'title'		=>	'Linkedin',
					'title2'	=>	'',
					'label'		=>	'',
					'name'		=>	'linkedin',
					'value'		=>	$options['linkedin']					
				),
				'4'		=>	array(
					'type'		=>	'text',
					'title'		=>	'Youtube',
					'title2'	=>	'',
					'label'		=>	'',
					'name'		=>	'youtube',
					'value'		=>	$options['youtube']					
				)
			)		
		);
	$blocks[] = array(
			'block_title'	=>	'底部信息设置',
			'block_detail'	=>	array(
				'1'		=>	array(
					'type'		=>	'textarea',
					'title'		=>	'底部版权内容',
					'label'		=>	'支持HTML',
					'name'		=>	'footer_content',
					'value'		=>	$options['footer_content']					
				),
				'2'		=>	array(
					'type'		=>	'textarea',
					'title'		=>	'第三方代码',
					'label'		=>	'例如: CNZZ统计，谷歌统计等代码<br />请直接复制完整的代码',
					'name'		=>	'footer_code',
					'value'		=>	$options['footer_code']					
				)
			)		
		);
	$blocks[] = array(
			'block_title'	=>	'定制项目设置',
			'block_detail'	=>	array(

			)		
		);

?>
<style type="text/css">
/* Shows the same border as on front end */
form {
	margin: 0 0 0 0;
	padding: 0 0 0 0;
}
.title {
	float:left;
	margin:20px 0 0 10px;
	padding:0 0 0 0;
	width:970px;
	height:60px;
	background:url(<?php echo get_bloginfo('template_url'); ?>/images/setup_title.png) no-repeat 0 0px;
}
.title a {
	float:left;
	margin:26px 0 0 200px;
	color:#FFF;
	font-size:12px;
	font-family: '微软雅黑';
	text-shadow: 0 1px 0 #888;
	text-decoration:none;
}
.wrap {
	float:left;
	margin: 0 0 0 10px;
	padding: 0 0 0 0;
	width:990px;
	border: 1px solid #844921;
	background:url(<?php echo get_bloginfo('template_url'); ?>/images/lmenu_bak.png) repeat-y 0 0px;
}
p.submit1 {
	width:970px;
	text-align:right;
	clear:both;
	margin: 0 0 0 0;
	padding: 10px 20px 10px 0;
	border-bottom: 1px solid #E3E3E3;
	background-color: #F5F5F5;
}
p.submit2 {
	width:970px;
	text-align:right;
	clear:both;
	margin: 0 0 0 0;
	padding: 10px 20px 10px 0;
	border-top: 1px solid #E3E3E3;
	background-color: #F5F5F5;
}
p.submit1 span {
	float:left;
	margin: 5px 0 0 20px;
	line-height:20px;
	font-size:16px;
	font-family: '微软雅黑';
	text-shadow: 0 1px 0 #eee;
	text-decoration:none;
}
p.submit1 input, p.submit2 input {
	cursor: pointer;
	font-size: 12px;
	color: #444;
	text-shadow: 0 1px 0 white;
	background: #F3F3F3 url(<?php echo get_bloginfo('template_url'); ?>/images/btn.png) repeat-x 0 0;
	border: 1px solid #BBB;
	padding: 5px 10px 3px 10px;	
}
p.submit1 input:hover, p.submit2 input:hover {
	color: black;
	border-color: #666;	
}

.f_right {
	float:right;
	margin: 8px;
}
#lmenu {
	float:left;
	margin: 0 0 0 0;
	padding: 0 0 20px 0;
	width: 150px;
}
#lmenu ul {
	margin: 0 0 0 0;
	padding: 0 0 0 0;
}
#lmenu ul li {
	margin: 0 0 0 0;
	padding: 0 0 0 0;
}
#lmenu ul li a {
	display: block;
	width: 129px;
	padding: 8px 10px;
	color: #21759B;
	text-shadow: 0 1px 0 white;
	border-top: 1px solid #fff;
	border-right: 1px solid #E3E3E3;
	border-bottom: 1px solid #E3E3E3;
	background-color: #F5F5F5;
	color: #21759B;
	text-decoration: none;
}
#lmenu ul li a:hover {
	background-color: #EAF2FA;
	color: #555;
}
#lmenu ul li a.current {
	border-right: 1px solid #FFFFFF;
	background-color: #FFFFFF;
	color: #D54E45;
}
#lmenu ul li a.out {
	background-color: #F5F5F5;
	color: #21759B;
}
#lmenu ul li a.out:hover {
	background-color: #EAF2FA;
	color: #555;
}
#main {
	float:left;
	overflow: hidden;
	margin: 0 0 0 0;
	padding: 0 20px 20px 23px;
	width: 797px;
	max-height:400px;
	background-color: #FFFFFF;
	overflow-y: auto;
	overflow-x: hidden;
}
label {
	padding:0px;
	margin:0px;
	color:#aaa;
	font-weight: normal;
}
ul.block {
	float:left;
	clear:both;
	min-height:30px;
	margin:0 0 0 0px;
	padding:0 0 0 0;
	width:615px;
	display:none;
}
ul.block h2 {
	margin: 0 0 10px 0;
	line-height:25px;
	font-size:14px;
	font-weight:bold;
	border-bottom:1px solid #eee;
}
ul.block li {
	float:left;
	margin: 0 0 10px 0;
	width:800px;
}
.item_left {
	float:left;
	overflow:hidden;
	width:365px;
	color: #333;
	padding: 0 0 0 0;
}
.item_right {
	float:left;
	overflow:hidden;
	width:400px;
	color: #555;
	font-size:12px;
	padding: 3px 0 0 10px;
}
input.input {
	padding: 4px;
	width: 360px;
	width: 350px\9;
	background: #fafafa;
	border-style: solid;
	border-width: 1px;
	border-color: #BBB #EEE #EEE #BBB;
	color: #666;
}
input:hover.input, input:focus.input {
	color: #333;
	background: white;
}
.textarea {
	border: 1px solid #ccc;
	height:70px;
	width: 360px;
	width: 350px\9;
	line-height:20px;
}
.option-checkbox {
	border: none;
	max-height: 140px;
	height: auto !important;
	height: expression( document.body.clientHeight > 140 ? "140px" : "auto" );
	overflow-y: scroll;
	overflow-x: hidden;
}
.option-checkbox .element {
	float:left;
	padding: 5px 0 0 0;
	width: 350px;
}
label {
	margin: 4px 0 0 0;
	padding: 4px 0 0 0;
	color: #333;
}
.select {
	width: 350px;
}

</style>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.2.min.js"></script>

<form action="#" method="post" enctype="multipart/form-data" name="zuluo_form" id="zuluo_form">

<div class="wrap">

	<p class="submit1"><span>网站参数设置</span><input type="submit" name="zGauge_save" value="保存设置" /></p>

	<div id="lmenu">
		<ul>
<?php
	$num = 0;
	foreach($blocks as $block) {
		if($num == 0) $aclass = 'current';
		else $aclass = 'out';
?>
		<li><a href="#" class="<?php echo $aclass; ?>" id="menuitem<?php echo $num; ?>" onclick="hide(<?php echo $num; ?>);" title="<?php echo $block['block_descrip']; ?>"><?php echo $block['block_title']; ?></a></li>
<?php		
		$num = $num + 1;
	}
?>
		</ul>
	</div>

	<div id="main">

<?php
	$num = 0;
	foreach($blocks as $block) {
?>
		<ul class="block" id="block<?php echo $num; ?>" <?php if($num == 0) echo 'style="display:block;"'; ?>>
		<?php
			foreach($block['block_detail'] as $item) {
				
				echo '<li><h2>'.$item['title'].'</h2>';
				echo '<div class="item_left">';

				switch($item['type']):
					case 'text':
						if($item['name'] == 'ashu_logo')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';
						elseif($item['name'] == 'head_logo')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'slider_img1')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'slider_img2')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'slider_img3')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'slider_img4')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'slider_img5')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'about_img_1')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'about_img_2')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						elseif($item['name'] == 'about_img_3')
						echo '<input  class="ashu_logo input" type="text" name="'.$item['name'].'" size="70%" value="'.$item['value'].'" >';	
						else
						echo '<input class="input" type="text" name="'.$item['name'].'" class="code" size="70%" value="'.$item['value'].'">';
						break;
					case 'textarea':
						echo '<textarea class="textarea" name="'.$item['name'].'">'.$item['value'].'</textarea>';
						break;
					case 'checkbox':
						echo '<input type="checkbox" name="'.$item['name'];
						if($item['value']) echo '" value="checkbox" checked="checked"> '.$item['title'];
						else echo '"> '.$item['title'];
						break;
					case 'checkbox-cat':
						echo '<div class="option-checkbox">';

						global $wpdb;
						$request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
						$request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
						$request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
						$request .= " ORDER BY term_id asc";
						$categorys = $wpdb->get_results($request);
						$i=0;
						foreach ($categorys as $category) {
							echo '<div class="element">';
								echo '<input type="checkbox" name="'.$item['name'].'[]"';
								if(in_array($category->term_id,explode(',',$item['value'])))
									echo ' checked="checked"';
								echo '" value="'.$category->term_id.'"> ';
								echo '<label for="'.$item['name'].'_'.$i.'">'.$category->name.'</label>';							
							echo '</div>';
							$i+=1;
						}

						echo '</div>';
						break;
					case 'radio':
						foreach($item['values'] as $value => $word) {							
							echo '<input type="radio" name="'.$item['name'].'" value="'.$value.'" ';
							if($value==$item['value'])
								echo 'checked';								
							echo '>'.$word.'&nbsp;&nbsp;';		
						}
						break;	
				endswitch;

				echo '</div>';
				echo '<div class="item_right">'.$item['label'].'</li>';
			}
		?>
		</ul>
<?php		
		$num = $num + 1;
	}
?>
	</div>

	<p class="submit2"><input type="submit" name="zGauge_save" value="保存设置" /></p>

</div>

</form>

<?php
	}
}

// Register functions
add_action('admin_menu', array('eocmsOptions', 'add'));
/** l10n */
function theme_init(){
	load_theme_textdomain('zGauge', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

?>
