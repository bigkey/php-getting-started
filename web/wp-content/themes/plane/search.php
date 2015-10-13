<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hotlink
 * @subpackage Hotlink <a href="https://www.baidu.com/s?wd=Theme&tn=44039180_cpr&fenlei=mv6quAkxTZn0IZRqIHckPjm4nH00T1dWPhfLrAcLnhD4rHFbuW010ZwV5Hcvrjm3rH6sPfKWUMw85HfYnjn4nH6sgvPsT6K1TL0qnfK1TL0z5HD0IgF_5y9YIZ0lQzqlpA-bmyt8mh7GuZR8mvqVQL7dugPYpyq8Q1csnjbLnjDsnjb3nHDkPjDkPj6" target="_blank" class="baidu-highlight">Theme</a>
 */

get_header(); ?>

<div id="pc_log">
<?php
	$args = array('p'=>'196');
	$the_query = new WP_Query($args);
	if ( $the_query->have_posts() ): 
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$link = get_post_meta(196,'link',true);
			echo '<a href="'.$link.'" >';
			the_post_thumbnail();
			echo '</a>';
		endwhile;
	endif;	
?>
</div>

<div class="weizhi clearfix">
<div class="alldivwid clearfix">
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/prodcuts">产品介绍</a></span>
</div>
</div>

<div class="alldivwid clearfix">
<div class="left_nav">
<h2>产 品 分 类</h2>
<ul class="clearfix">
<?php
	/*if(have_posts()):
		while(have_posts()): the_post();
			//$category = get_the_category();
			//$name = $category['term_id'];
		endwhile;
	endif;	*/

	$pro_menu = dit_get_all_children_pages('147');
	foreach($pro_menu['html'] as $key=>$val):
		echo '<li>'.$val.'</li>';
	endforeach;
?>
</ul>
</div>
<div class="right_content">
 <?php 
	// 検索结果用 
	//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  //不能用分页，因为url不能跳转到原网页（添加的page形式有问题）
	$args = array(
		's'=>$s,
		'showposts'=>-1,
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
?>			
			<div class="productbox">
			<div class="col_33">
			<a style="margin:0;" href="<?php the_permalink();?>">
			<?php 
				if(get_the_post_thumbnail()){
					the_post_thumbnail();
				}else{
					echo '<img src="'.get_bloginfo('template_url').'/images/none.jpg">';
				}
			?>
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
	endwhile; else: ?>
    <p class="search_text"></p class="search_text">
      <?php _e('您要搜索的内容不存在'); ?>
    <p></p>
 <?php endif; ?>

<div style="clear:both;"></div>
</div>
</div>
     
 
<?php get_footer(); ?>
	