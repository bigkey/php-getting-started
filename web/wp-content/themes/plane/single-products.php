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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span>产品详情</span>
</div>
</div>	
	
<div class="alldivwid clearfix">
<div class="left_nav">
<h2>产 品 分 类</h2>
<ul class="clearfix">
<?php 
	if ( have_posts() ): 
		while ( have_posts() ) : the_post(); 
		$cat = get_the_category();
		endwhile;
	endif;
	//var_dump($cat);exit;
	$name = array();
	foreach($cat as $na){
		$name[] = $na->name;
	}
	$pro_menu = dit_get_all_children_pages('147');
	foreach($pro_menu['html'] as $key=>$val):
		if(in_array($pro_menu['title'][$key],$name)){
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
	if(have_posts()):
		while(have_posts()):the_post();
?>
<div id='pro_img'>
<?php the_post_thumbnail();?>
</div>
<h1><?php the_title();?></h1>
<div class="pro_info">
<p><?php the_content();?></p>
</div>
</div>
</div>	
<?php 
	endwhile;
	endif;
?>	
	
<?php
	get_footer();
?>	
	