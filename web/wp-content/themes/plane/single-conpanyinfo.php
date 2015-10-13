<?php
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
<?php 
	if ( have_posts() ): 
		while ( have_posts() ) : the_post(); 
		$name = get_the_title();
?>	
<div class="alldivwid clearfix">
<div class="about_left">
<?php
$args=array(
  'cat'=>'3',//查找出所有页面（多个结果集，复数）
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
<li <?php if($name == get_the_title()) echo "class='on'";?>><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
</ul>
<?php		
		}
}
wp_reset_postdata();
?>
</div>
<div class="right_content">
<p style="margin-bottom:10px">	
			<?php the_content();?>
<?php		 endwhile;
	endif;
?>
</div>
</div>








<?php
	get_footer();
?>	 
	 