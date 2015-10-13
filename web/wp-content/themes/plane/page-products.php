<?php
	/*
	 *  Template Name: page-products
	 */
	 get_header();
?>
<div class="imgb" ><?php 
	$args = array(
		'name'=>'topbackgoundpic',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			the_content();
		endwhile;
	endif;
?></div>
<?php
	if ( have_posts() ): 
		while ( have_posts() ) : the_post();
?>

<div class="weizhi clearfix">
<div class="alldivwid clearfix">
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/products">产品介绍</a></span>
</div>
</div>

<div class="alldivwid clearfix">
<div class="left_nav">
<h2>产 品 分 类</h2>
<ul class="clearfix">
<?php
//wp_list_categories("child_of=14&depth=0&hide_empty=0&title_li=");
?>
<?php
		$name = get_the_title();
		endwhile;
	endif;	
	//获得产品页面id
	$names = 'products'; //page别名
	global $wpdb;
	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$names'");
	
	$pro_menu = dit_get_all_children_pages($page_id);
	foreach($pro_menu['html'] as $key=>$val):
		if($name==$pro_menu['title'][$key]){
			echo '<li class="onactive">';
		}else{
			echo '<li>';
		}
		echo $val.'</li>';
	endforeach;
?>
</ul>
</div>
<div class="right_content">
<?php 
	//获得分类id
	$all_products = get_category_by_slug('product');
	$all_id = $all_products->term_id;
	$category = get_categories("child_of=".$all_id);
	foreach($category as $val){
		if($val->name == $name){
		    $category_id = $val->cat_ID;
		}
	}
	if(empty($category_id)){
		$category_id = $all_id;
	}
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'cat'=>$category_id,
		'posts_per_page'=>10,
		'paged'=> $paged,
		'meta_key'   => 'coco_id',
		'orderby'    => 'meta_value_num',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
?>			
			<div class="productbox">
			<div class="col_33">
			<a style="margin:0;" href="<?php the_permalink();?>">
			<?php the_post_thumbnail();?>
			</a>
			</div>
			<div class="col_55">
			<h5>
			<a style="text-transform:none;" href="<?php the_permalink();?>"><?php the_title();?></a>
			</h5>
			<p><?php the_excerpt();?></p>
			</div>
			</div>		
<?php		

		endwhile;
	endif;
?>

<div style="clear:both;"></div>
<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $the_query) );  ?>
</div>
</div>




<?php
	get_footer();
?>	 
	 