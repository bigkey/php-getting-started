<?php
/*
 Template Name: page-contact
*/
//And start to write your code here...
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/contact">联系我们</a></span>
</div>
</div>


<div class="alldivwid clearfix">
<h1 class="bigh1">联系我们</h1>
<div class="alldivwid paddingmr40 clearfix">
<div class="contactpic">
<?php 
	$args = array(
		'name'=>'contact1',
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
	if(have_posts()):
		while(have_posts()):
			the_post();
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
		'name'=>'contact2',
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
		'name' => 'contact-form',
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
</div>


<?php
	get_footer();
?>