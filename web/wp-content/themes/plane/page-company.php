<?php
	/*
	 * Template Name:page-company
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

<div class="weizhi clearfix">
<div class="alldivwid clearfix">
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/aboutus">关于企业</a></span>
</div>
</div>
<div class="alldivwid clearfix">
<div class="about_left">
<?php
$args=array(
  'category_name'=>'companyinfo',//查找出所有页面（多个结果集，复数）
  'order'=>'ASC'
);
// 实例化wp_query
$the_query=new WP_Query($args);
 
// 开始循环
if($the_query->have_posts()){
		while($the_query->have_posts()){
			$the_query->the_post();
?>	
<ul class="clearfix">
<li <?php if( get_the_title() == '公司简介') echo "class='on'";?>><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
</ul>
<?php		
		}
}
wp_reset_postdata();
?>
</div>
<div class="right_content">
<?php 
	$args = array(
		'name'=>'easyinfo',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()){
		while($the_query->have_posts()){
			$the_query->the_post();	
			the_content();
		}
	}
?>
</div>
</div>








<?php
	get_footer();
?>	 
	 