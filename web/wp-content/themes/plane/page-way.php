<?php
	/*
	 * Template Name:page-way
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/aboutus">解决方案</a></span>
</div>
</div> 
<div class="alldivwid clearfix">
<div class="yingyong">
<h1>应用领域/Working Field</h1>
</div>
<?php
	if(have_posts()):
		while(have_posts()):
			the_post();
			the_content();
		endwhile;
	endif;			
?>

</div>
<?php
	get_footer();
?>
	 