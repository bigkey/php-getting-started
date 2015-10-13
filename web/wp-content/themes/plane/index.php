<?php
	get_header();
?>	
	

<div class="mainbanner">
	<div class="mainbanner_window">
		<ul id="slideContainer">
			<?php 
				$args = array(
					'category_name'=>'banner',
				);
				$the_query = new WP_Query($args);
				if($the_query->have_posts()):
					while($the_query->have_posts()):
						$the_query->the_post();
						echo '<li>';
						the_content();
						echo '</li>';
					endwhile;
				endif;
			?>			
		</ul>
	</div>
	<ul class="mainbanner_list">
		<li><a href="javascript:void(0);">1</a></li>
		<li><a href="javascript:void(0);">2</a></li>
		<li><a href="javascript:void(0);">3</a></li>
		<li><a href="javascript:void(0);">4</a></li>
		<li><a href="javascript:void(0);">5</a></li>
	</ul>
	<div class="leftarrow"><</div>
	<div class="rightarrow">></div>
</div>


<div class="alldivwid clearfix">
<?php 
	$args = array(
		'category_name'=>'indexcp',
		'order'=>'ASC',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		$i = 1;
		while($the_query->have_posts()):
			$the_query->the_post();
?>
<div class="servies" <?php if($i==4){echo 'style="margin-right:0;"';}?>>
<?php
			the_content();
?>	
<a class="thumb-info" id='thumb-info' href="<?php echo get_post_meta(get_the_id(), 'link', true)?>">
<?php if($i==1):?>
<span class="bfpic"><img src="<?php bloginfo('template_url');?>/images/arrow_r.png" /></span>
<?php endif;?>
<span class="biaoti"><h1><?php the_title();?></h1></span></a>
</div>
<?php
			$i++;
		endwhile;
	endif;
?>
</div>



<div class="alldivwid clearfix">
<div class="dabiaoti clearfix"><h1>产  品  新  动  向<h1></div>

<?php
	$args = array(
		'category_name'=>'product',
		'tag'=>'new_products',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
?>
<div class="col-xs-4">
<div class="item">
<a class="new-item" href="<?php the_permalink();?>">
<div class="item-box">
<div class="cover">
<?php the_post_thumbnail();?>
</div>
<div class="name-normal"><?php the_title();?></div>
<?php the_excerpt();?>
</div>
</a>
</div>
</div>
<?php			
			
		endwhile;
	endif;
?>

</div>
	
	
<?php	
	get_footer();
?>	