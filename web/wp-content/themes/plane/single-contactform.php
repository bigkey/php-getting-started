<?php
	get_header();
?>
<div class="imgb"><?php 
	$args = array(
		'p'=>'111',
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/contact">联系我们</a></span>
</div>
</div>


<div class="alldivwid clearfix">
<h1 class="bigh1">联系我们</h1>
<div class="alldivwid paddingmr40 clearfix">
<div class="contactpic">
<?php 
	$args = array(
		'p'=>'88',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			the_content();
		endwhile;
	endif;
?>
</div>
<div class="contactinfo">

<?php 
	$args = array(
		'page_id'=>'85',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			the_content();
		endwhile;
	endif;	
?>


</div>
</div>
<h1 class="bigh1 clearfix">给我们留言</h1>
<div class="alldivwid paddingmr40 clearfix">
<div class="contactpic">
<?php 
	$args = array(
		'p'=>'90',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			the_content();
		endwhile;
	endif;
?>
</div>
<div class="contactinfo">
<p>非常感谢！你的数据已经提交成功了。</p>
</div>
</div>
</div>


<?php
	get_footer();
?>