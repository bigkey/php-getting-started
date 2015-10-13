<?php
	/*
	 *  Template Name: page-city
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span>网站商城</span>
</div>
</div>


<div id="services3">
	<ul>
		<li>
			<a href="<?php echo get_post_meta(get_the_id(),'taobao',true);?>" target="_blank">
				<img src="<?php bloginfo('template_url');?>/images/20150723021002.png" width="260px" height="120px">	
			</a>
		</li>
		
		<li>
			<a href="<?php echo get_post_meta(get_the_id(),'suling',true);?>" target="_blank">
				<img src="<?php bloginfo('template_url');?>/images/20150723021038.png" width="260px" height="120px">
			</a>
		</li>
		
		<li>
			<a href="<?php echo get_post_meta(get_the_id(),'jingdong',true);?>" target="_blank">
				<img src="<?php bloginfo('template_url');?>/images/20150723021112.png" width="260px" height="120px">
			</a>
		</li>
		
		<li>
			<a href="<?php echo get_post_meta(get_the_id(),'amazon',true);?>" target="_blank">
				<img src="<?php bloginfo('template_url');?>/images/20150723021211.png" width="260px" height="120px">
			</a>
		</li>
		</ul>
</div>
<div style="clear:both;"></div>

<?php
		endwhile;
	endif;	
	get_footer();
?>	 
	 