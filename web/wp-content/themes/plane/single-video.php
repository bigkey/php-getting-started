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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/videos">精彩视频</a></span>
</div>
</div>


<?php 
	if(have_posts()):
		while(have_posts()):the_post();
			$category = get_the_category();
			$my_id = get_the_id();
			//$cat_name = $category['category_nicename'];
		endwhile;
	endif;
	//获得分类id
	$all_videos = get_category_by_slug('videos');
	$all_id = $all_videos->term_id;
	$new_videos = get_category_by_slug('new');
	$new_id = $new_videos->term_id;
	$hot_videos = get_category_by_slug('hot');
	$hot_id = $hot_videos->term_id;
	foreach($category as $val):
		if($val->term_id != $all_id && $val->term_id != $new_id && $val->term_id != $hot_id ){
			$cat_name = $val->category_nicename;
		}
	endforeach;
?>
<div class="alldivwid clearfix">
<div class="left_nav" style="width:24%;padding-bottom: 20px;">
<h2>更多精彩视频</h2>

<?php
	$args = array(
		'category_name'=>$cat_name,
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		$i = 0;
		while($the_query->have_posts()):
			if($i==5){ break;}
			$i++;
			$the_query->the_post();
			if(get_the_id() == $my_id):
				continue;
			endif;
?>
<div class="vd_item">
<a class="thumb-info" href="<?php the_permalink();?>">
<?php the_post_thumbnail();?>
<span class="thumb-info-action">
<span class="bfpic">
<img width="30" src="<?php bloginfo('template_url');?>/images/arrow_r.png">
</span>
</span>
</a>
<div class="vd_info">
<div class="name">
<i class="v-user"></i>
  <?php the_author();?>
</div>
<div class="suitcase">
<i class="v-time"></i>
  <?php the_time('Y-m-d');?>
</div>
<div class="location">
<i class="v_location"></i>
  <?php echo get_post_meta(get_the_id(),'address',true);?>
</div>
</div>
</div>
<?php			
			
		endwhile;
	endif;
	
?>

</div>


<?php
	if(have_posts()):
		while(have_posts()):the_post();
?>
<div class="right_content" style="width:72%">
<h3 class="showcase-title"><?php the_title();?></h3>
<?php the_content();?>
<div class="vd_info"><span class="vdbottom"><i class="v-user"></i> <?php the_author();?></span><span class="vdbottom"><i class="v-time"></i><?php the_time('Y-m-d H:i');?></span><span class="vdbottom"><i class="v_location"></i><?php echo get_post_meta(get_the_id(),'address',true) ?></span></div>
</div>
</div>


<?php
	endwhile;
	endif;
	get_footer();
?>