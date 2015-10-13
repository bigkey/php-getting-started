<?php
	get_header();
?>
<div class="imgb" ><?php 
	$args = array(
		'p'=>'222',
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/news">新闻页面</a></span>
</div>
</div>


<?php 
	if(have_posts()):
		while(have_posts()):the_post();
?>			


<div class="newsdata">
<h1><span><?php the_time('Y-m-d');?> </span><?php the_title();?></h1>
<div class="data_info">
<?php the_content();?>
</div>

</div>

<?php
	endwhile;
	endif;
	get_footer();
?>