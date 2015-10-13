<?php 
//load theme setup function	
require_once(TEMPLATEPATH . '/theme_setup.php');	

add_theme_support('post-thumbnails');

//修改登录界面LOGO
add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
    </style>';
}
function custom_loginlogo_url($url) {
    return home_url();
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

	register_nav_menus( array(
	'primary'=> '主菜单(顶部)',
	'sidebar'=> '侧栏菜单',
	'sidebar_products'=> '产品分类菜单',
	'footer_1'=> '底部菜单01',
	'footer_2'=> '底部菜单02'
	));

/**
 * WordPress 后台禁用Google Open Sans字体，加速网站
 * http://www.wpdaxue.com/disable-google-fonts.html
 */
add_filter( 'gettext_with_context', 'wpdx_disable_open_sans', 888, 4 );
function wpdx_disable_open_sans( $translations, $text, $context, $domain ) {
  if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
    $translations = 'off';
  }
  return $translations;
}
/**
 * 移除菜单的多余CSS选择器
 * From http://www.wpdaxue.com/remove-wordpress-nav-classes.html
 */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
}

//去掉头部信息
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action( 'publish_future_post', 'check_and_publish_future_post', 10, 1 );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_footer', 'wp_print_footer_scripts' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
remove_action( 'wp_head', 'index_rel_link' ); // Removes the index link   
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Removes the prev link   
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Removes the start link   
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Removes the relational links for the posts adjacent to the current post. 
add_action('widgets_init', 'my_remove_recent_comments_style');

//禁止加载WP自带的jquery.js
if ( !is_admin() ) { // 后台不禁止
function my_init_method() {
wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
}
add_action('init', 'my_init_method'); 
}
wp_deregister_script( 'l10n' );




function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

// Register three sidebars	
if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name' => 'inquiry',
		'id' => 'inquiry',
		) );
}



function cut_str($sourcestr,$cutlength)
{
	$returnstr='';
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);
	while (($n<$cutlength) and ($i<=$str_length))
	{
		$temp_str=substr($sourcestr,$i,1);
		$ascnum=Ord($temp_str);
		if ($ascnum>=224)
		{
			$returnstr=$returnstr.substr($sourcestr,$i,3);
			$i=$i+3;
			$n++;
		}
		elseif ($ascnum>=192)
		{
			$returnstr=$returnstr.substr($sourcestr,$i,2);
			$i=$i+2;
			$n++;
		}
		elseif ($ascnum>=65 && $ascnum<=90)
		{
			$returnstr=$returnstr.substr($sourcestr,$i,1);
			$i=$i+1;
			$n++;
		}
		else
		{
			$returnstr=$returnstr.substr($sourcestr,$i,1);
			$i=$i+1;
			$n=$n+0.5;
		}
	}
	if (mb_strlen($sourcestr)>$cutlength){
		$returnstr = $returnstr . "…";
	}
	return $returnstr;
}

//get the first photo in content as thumb.
function get_the_thumb($id) {
	$post=get_post($id);
	$first_img = '';

	//get custom field zuluo_thumbnail for thumbnail
	$first_img = get_post_meta($post->ID, "zuluo_thumbnail", true);
	if ($first_img != '') return $first_img;

	//if set the thumbnail, then get the photo url and return
	if ( has_post_thumbnail($id) ) {
		$imgstr = explode('src="', get_the_post_thumbnail($id,'thumbnail'));
		$img = explode('"', $imgstr[1]);
		$first_img = $img[0];
		return $first_img;
	} 
	else {
		$args = array(
			'post_type' => 'attachment',
			'post_mime_type'	=> 'image',
			'numberposts'		=> -1,
			'post_status'		=> null,
			'post_parent'		=> $id,
			'orderby'			=> 'post_date',
			'order'				=> 'DESC'
		);
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$imgstr = explode('src="', wp_get_attachment_image( $attachment->ID, 'thumbnail' ));
				$img = explode('"', $imgstr[1]);
				$first_img = $img[0];
				return $first_img;
			}
		}
		else {
			//get the first photo in content
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
			if ( $matches[1] )
				$first_img = $matches[1][0];
			if ($first_img=='') {
				$first_img = get_template_directory_uri() . "/images/thumb/". rand(1,3) .".jpg";
			}
			return $first_img;
		}
	}	
}
		
function zuluo_pagination($range = 11){
	global $paged, $wp_query;
	if ( !$max_page ) {
		$max_page = $wp_query->max_num_pages;
	}
	if($max_page > 1){
		if(!$paged){
			$paged = 1;
		}
		if($paged != 1){
			echo "<a href='" . get_pagenum_link(1) . "' title='First'>First</a>";
		}
		previous_posts_link('Previous');
		if($max_page > $range){
			if($paged < $range){
				for($i = 1; $i <= $range; $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged)
						echo " class='current'";
					echo ">$i</a>";
				}
			}
			elseif($paged >= ($max_page - ceil(($range/2)))){
				for($i = $max_page - $range + 1; $i <= $max_page; $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged)
						echo " class='current'";
					echo ">$i</a>";
				}
			}
			elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)) + 1; $i < ($paged + ceil(($range/2))); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged)
						echo " class='current'";
					echo ">$i</a>";
				}
			}
		}
		else{
			for($i = 1; $i <= $max_page; $i++){
				echo "<a href='" . get_pagenum_link($i) ."'";
				if($i==$paged)
					echo " class='current'";
				echo ">$i</a>";
			}
		}
		next_posts_link('Next');
		if($paged != $max_page){
			echo "<a href='" . get_pagenum_link($max_page) . "' title='Last'>Last</a>";
		}
	}
}

//自定义分类文章列表小工具
class zuluo_Catpost_Widget extends WP_Widget {
	function zuluo_Catpost_Widget() {
		$widget_ops = array('description' => '分类文章列表', 'description' => '分类文章列表');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='分类文章列表（zuluo）',$widget_ops,$control_ops); 
	}
	function form($instance) {
		$catposts = isset($instance['catposts']) ? esc_attr($instance['catposts']) : '1';
		$number = isset($instance['number']) ? absint($instance['number']) : 8;
?>

	<p><label for="<?php echo $this->get_field_id('catposts'); ?>">分类ID：</label><br>
		<input id="<?php echo $this->get_field_id('catposts'); ?>" name="<?php echo $this->get_field_name('catposts'); ?>" type="text" value="<?php echo $catposts; ?>" size="35" /></p>

	<p><label for="<?php echo $this->get_field_id('number'); ?>">文章列表数目：</label><br>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
    }
    function update($new_instance, $old_instance) { // 更新保存
	    return $new_instance;
    }

	function widget($args, $instance) { // 输出显示在页面上
		extract( $args );
		if ( empty( $instance['catposts'] ) || ! $catposts = esc_attr( $instance['catposts'] ) )
 			$catposts = '1';
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 8;
		//按照列表输入分类标题和副标题链接
		$sidebar_cats1 = explode(',',$catposts);
		$i = 1;
		foreach( $sidebar_cats1 as $catid1 ) {
			$title = get_the_category_by_ID($catid1);
			echo '<li>';
			echo '<h2>'. $title. '<a class="more" href="'.get_category_link($catid1).'">'.'</a></h2>'; 
?>
			<ul>

		<?php
			$popular = new WP_Query( array(
				'cat' => $catid1,
				'showposts' => $number,
				'orderby' => 'date',
				'order' => 'ASC',
			) );	
			while ($popular->have_posts()) : $popular->the_post();
		?>
				<li><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo cut_str(get_the_title(),14); ?></a></li>
		<?php	
			endwhile;
				// Reset Query
			wp_reset_query();
		?>
			</ul> 
<?php	echo '</li>'; ?>
<?php
		}
    }
}
register_widget('zuluo_Catpost_Widget');
// 文章列表特色图像
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
// for post and page
add_theme_support('post-thumbnails', array( 'post', 'page' ) );
function fb_AddThumbColumn($cols) {
$cols['thumbnail'] = __('Thumbnail');
return $cols;
}
function fb_AddThumbValue($column_name, $post_id) {
$width = (int) 100;
if ( 'thumbnail' == $column_name ) {
// thumbnail of WP 2.9
$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
// image from gallery
$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
if ($thumbnail_id)
$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
elseif ($attachments) {
foreach ( $attachments as $attachment_id => $attachment ) {
$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
}
}
if ( isset($thumb) && $thumb ) {
echo $thumb;
} else {
echo __('None');
}
}
}
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
}

//自定义分类标题列表小工具
class zuluo_Catlist_Widget extends WP_Widget {
	function zuluo_Catlist_Widget() {
		$widget_ops = array('description' => '分类标题列表', 'description' => '分类标题列表');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='分类标题列表（zuluo）',$widget_ops,$control_ops); 
	}
	function form($instance) {
		$catparent = isset($instance['catparent']) ? esc_attr($instance['catparent']) : '1';
?>

	<p><label for="<?php echo $this->get_field_id('catparent'); ?>">父分类ID：</label><br>
		<input id="<?php echo $this->get_field_id('catparent'); ?>" name="<?php echo $this->get_field_name('catparent'); ?>" type="text" value="<?php echo $catparent; ?>" size="35" /></p>
<?php
    }
    function update($new_instance, $old_instance) { // 更新保存
	    return $new_instance;
    }

	function widget($args, $instance) { // 输出显示在页面上
		extract( $args );
		if ( empty( $instance['catparent'] ) || ! $catparent = esc_attr( $instance['catparent'] ) )
 			$catparent = '1';
		//显示父分类标题和子分类列表
		$title = get_the_category_by_ID($catparent);
		$titlestr = '<li>';
		$titlestr .= '<h2>'. $title; 
		$titlestr .= '<a class="more" href="'.get_category_link($catparent).'">'.'</a>'; 
		$titlestr .= '</h2><ul>';
		echo $titlestr;
		//$variable = wp_list_categories( array( 
		wp_list_categories( array( 
			'child_of' => $catparent,
			'orderby'	=> 'slug',
			'order'		=> 'ASC',
			'title_li' => '',
			'hide_empty' =>	0,
			'depth' =>	4,
			'hierarchical' => true,
			'current_category' => 0,
			'show_option_none' =>''
			//'echo'	=> 0
		) );
		//echo preg_replace('/title=\"(.*?)\"/','',$variable);
		echo '</ul>';
		echo '</li>'; 
    }
}
register_widget('zuluo_Catlist_Widget');

//自定义分类目录树小工具
class zuluo_Cattree_Widget extends WP_Widget {
	function zuluo_Cattree_Widget() {
		$widget_ops = array('description' => '分类目录树', 'description' => '分类目录树');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='分类目录树（zuluo）',$widget_ops,$control_ops); 
	}
	function form($instance) {
		$catparent = isset($instance['catparent']) ? esc_attr($instance['catparent']) : '1';
?>

	<p><label for="<?php echo $this->get_field_id('catparent'); ?>">父分类ID：</label><br>
		<input id="<?php echo $this->get_field_id('catparent'); ?>" name="<?php echo $this->get_field_name('catparent'); ?>" type="text" value="<?php echo $catparent; ?>" size="35" /></p>
<?php
    }
    function update($new_instance, $old_instance) { // 更新保存
	    return $new_instance;
    }

	function widget($args, $instance) { // 输出显示在页面上
		extract( $args );
		if ( empty( $instance['catparent'] ) || ! $catparent = esc_attr( $instance['catparent'] ) )
 			$catparent = '1';
		//显示父分类标题和子分类列表
		$title = get_the_category_by_ID($catparent);
		$titlestr = '<li class="cattree">';
		$titlestr .= '<h2>'. $title;
		$titlestr .= '<a class="more" href="'.get_category_link($catparent).'">'.'</a>'; 
		$titlestr .= '</h2><ul>';
		echo $titlestr;
		//$variable = wp_list_categories( array( 
		wp_list_categories( array( 
			'child_of' => $catparent,
			'orderby'	=> 'slug',
			'order'		=> 'ASC',
			'title_li' => '',
			'hide_empty' =>	0,
			'depth' =>	4,
			'hierarchical' => true,
			'current_category' => 0,
			'show_option_none' =>''
			//'echo'	=> 0
		) );

		//echo preg_replace('/title=\"(.*?)\"/','',$variable);
		echo '</ul>';
		echo '</li>'; 
    }
}
register_widget('zuluo_Cattree_Widget');
		
// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
/* custom excerpt ellipses for 2.8-
function custom_excerpt_more($excerpt) {
return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'custom_excerpt_more');
*/

// Pagenavi
function izt_pagenavi($range = 9) {
	global $paged, $wp_query;
	if ( !$max_page ) { $max_page = $wp_query->max_num_pages;}
	if($max_page > 1){
		echo '<div class="pagenavi">';
		if(!$paged){$paged = 1;}
		echo '<span>'.$paged.'/'.$max_page.'</span>';
		previous_posts_link('&laquo; Previous');
		if($max_page > $range){
			if($paged < $range){
				for($i = 1; $i <= ($range + 1); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";

				}
			} elseif($paged >= ($max_page - ceil(($range/2)))){
				for($i = $max_page - $range; $i <= $max_page; $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";
				}
			} elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";
				}
			}
		} else {
			for($i = 1; $i <= $max_page; $i++){
				echo "<a href='" . get_pagenum_link($i) ."'";
				if($i==$paged) echo " class='current'";
				echo ">$i</a>";
			}
		}
		next_posts_link('Next &raquo;');
		echo '</div>';
	}
}
add_filter( 'upload_dir', 'wpjam_custom_upload_dir' );
function wpjam_custom_upload_dir( $uploads ) {
	$upload_path = '';
	$upload_url_path = '';
 
	if ( empty( $upload_path ) || 'wp-content/uploads' == $upload_path ) {
		$uploads['basedir']  = WP_CONTENT_DIR . '/uploads';
	} elseif ( 0 !== strpos( $upload_path, ABSPATH ) ) {
		$uploads['basedir'] = path_join( ABSPATH, $upload_path );
	} else {
		$uploads['basedir'] = $upload_path;
	}
 
	$uploads['path'] = $uploads['basedir'].$uploads['subdir'];
 
	if ( $upload_url_path ) {
		$uploads['baseurl'] = $upload_url_path;
		$uploads['url'] = $uploads['baseurl'].$uploads['subdir'];
	}
	return $uploads;
}
include_once('theme_setup.php'); 