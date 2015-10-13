<?php
	/*
	 *  Template Name: page-service
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span>服务支持</span>
</div>
</div>


<div id="services4">
	<div class="yingyong">
<h1>服务支持/ Service & Support</h1>
</div>
	<?php the_content();?>
</div>
<div style="clear:both;"></div>

<?php
		endwhile;
	endif;	
	get_footer();
?>	 
	 