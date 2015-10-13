<?php
	function wordpress1_setup() {
		// 注册菜单
		register_nav_menus( 
			array(
				'header-menu' => __( 'Header','plane' ),
				'footer-menu' => __( 'Footer' ,'plane')
				)
		);  

	}
	add_action( 'after_setup_theme', 'wordpress1_setup' );

	
	// 添加特色图像功能
	add_theme_support('post-thumbnails');
	//set_post_thumbnail_size(720, 540, true); // 图片宽度与高度
	
	
	//获取分类下的子分类
	function get_category_root_id($cat)
	{
	$this_category = get_category($cat);   // 取得当前分类
	while($this_category->category_parent) // 若当前分类有上级分类时,循环
	{
	$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类(往上爬)
	}
	return $this_category->term_id; // 返回根分类的id号
	}

	
	//获取页面下的子页面
	function dit_get_all_children_pages($current_obj_id){ 
		//if ( is_page() ){ 
			//当前页面的ID 
			//$current_obj_id = get_queried_object_id();    
			$args = array(        
				'post_status' => 'publish',        
				'post_type' => 'page',        
				'post_parent' => $current_obj_id,        
				'orderby' => 'menu_order',        
				'order' => 'ASC',        
				'nopaging' => true,    
			);	        
			$child_pages = get_posts($args);    
			$html = array(); 
			foreach ($child_pages as $post) {        
				setup_postdata($post);        
				$url = get_permalink($post->ID);        
				$title = $post->post_title;        
				$html['html'][] = sprintf("<a href='%s'>%s</a>", $url, $title);    
				$html['title'][]= $title;
			}    
			wp_reset_postdata();    
			if ( !empty( $html ) ){    	
				return $html;    
			} 
		//}
	}
	
	
	//搜索功能的html样式修改
	function my_search_form( $form ) {
		$form = '<form role="search" method="get" id="searchform" class="searchform" action="'.home_url('/').'">
				<div>
					<input type="text" name="s" id="s" placeholder="搜索">
					<input type="submit" value="" id="searchsubmit">
				</div>
			</form>';

		return $form;
	}
	add_filter( 'get_search_form', 'my_search_form' );

	//点赞和点喜欢 的ajax
	function good(){
		$uid = $_POST['nid'];
		$nam = $_POST['nam'];
		$num = get_post_meta($uid,$nam,true);
		$bool = update_post_meta($uid,$nam,$num+1);
		echo $bool;
		die();
	}
	add_action('wp_ajax_good', 'good');
	add_action('wp_ajax_nopriv_good', 'good');
	