<?php
	/*
	 *	Template Name: page-news
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span>新闻中心</span>
</div>
</div>

<div class="alldivwid clearfix">
<ul class="clearfix">
<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'category_name'=>'news',
		'posts_per_page'=>10,
		'paged'=> $paged,
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
	
?>
<li class="newslists clearfix">
<div class="contactpic">
<a href="<?php the_permalink();?>"> <?php  the_post_thumbnail();?></a>
</div>
<div class="contactinfo">
<h2>
<a href="<?php the_permalink();?>"> <?php the_title();?></a>
</h2>
<p class="nn_time">
<span>Date：<?php the_time('Y-m-d');?></span>
</p>
<p><?php  the_excerpt();?></p>
</div>
</li>


<?php
	endwhile;
	endif;
	
?>	
</ul>

<div class="pagestyle clearfix" style="margin-top:30px;float: right;">
<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $the_query) );  ?>
</div>
</div>
<?php
	get_footer();
?>
