<?php
	/*
	 *	Template Name: page-videos
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
<span>您的位置：</span><a href="/">首页</a><span> > </span><span><a href="/video">精彩视频</a></span>
</div>
</div>

<?php
    //获得分类id
	$all_videos = get_category_by_slug('videos');
	$all_id = $all_videos->term_id;
	$new_videos = get_category_by_slug('new');
	$new_id = $new_videos->term_id;
	$hot_videos = get_category_by_slug('hot');
	$hot_id = $hot_videos->term_id;
	//获取分类id
	$c_id = isset($_GET['id'])?$_GET['id']:'all';
	if($c_id == 'all'){
		$c_id = $all_id;
	}
	if(!empty($_GET['pid'])){
		switch($_GET['pid']){
			case 'all':
				$p_id1 = 'post_date';
				break;
			case 'meta_value_num2':
			    $p_id1 = 'meta_value_mum';
				$my_key = 'like';
				break;
			case 'meta_value_num1':	
				$p_id1 = 'meta_value_num';
				$my_key = 'good';
				break;
			default:
				$p_id1 = $_GET['pid'];
		}
		$p_id = $_GET['pid'];
	}else{
		$p_id1 = 'post_date';
		$p_id = 'post_date';
	}
?>


<div class="alldivwid section-list">
<div class="category">
<div class="selected">
<div class="ng-binding">分类</div>
<i class="fa-angle-down positionab"></i>
</div>
<div class="list-container clearfixed">
<a class="dbitem ng-binding" href="<?php echo '?id=all&pid='.$p_id;?>">全部</a>
<?php
	$args = array(
		'child_of'=>$all_id,
		'hide_empty'=>false,
	);
	$category = get_categories($args);
	foreach($category as $val):
?>
	<a class="dbitem ng-binding" title="<?php echo $val->name;?>" href="?id=<?php echo $val->term_id.'&pid='.$p_id;?>"><?php echo $val->name;?></a>
<?php
	endforeach;
?>

</div>
</div>
<div class="dbmenu">
<a class="dbitem ng-binding <?php if(!empty($_GET['c'])){echo $_GET['c']==1?'active':'';}/*else{echo 'active';}*/?>" href="?id=<?php echo $new_id;?>&c=1&pid=<?php echo $p_id;?>">最新</a>
<a class="dbitem ng-binding <?php if(!empty($_GET['c'])){echo $_GET['c']==2?'active':'';}?>" href="?id=<?php echo $hot_id;?>&c=2&pid=<?php echo $p_id;?>">热门</a>
</div>
<div class="sort">
<div>
<div class="text ng-binding">排序</div>
<i class="fa-angle-down"></i>
</div>
<div class="list-container clearfixed ">
<a class="dbitem ng-binding" href='?id=<?php echo $c_id.'&pid=all';?>'>全部</a>
<a class="dbitem ng-binding" href='?id=<?php echo $c_id.'&pid=meta_value_num2';?>'>喜欢</a>
<a class="dbitem ng-binding" href='?id=<?php echo $c_id.'&pid=meta_value_num1';?>'>赞</a>
</div>
</div>
</div>

<div class="alldivwid mt40">
<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'cat'=>$c_id,
		'posts_per_page'=>9,
		'paged'=> $paged,
		'orderby'=>$p_id1,
	);
	if(!empty($my_key)){
		$args = array(
			'cat'=>$c_id,
			'posts_per_page'=>9,
			'paged'=> $paged,
			'orderby'=>$p_id1,
			'meta_key' => $my_key,
		);
	}
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		$i=0;
		while($the_query->have_posts()):
		$the_query->the_post();
		if($i/3==0):
?>
<div class="res-row clearfix">
<?php  
		endif;
?>
<div class="res-col video">
<div class="img-container loading-gif">
<a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
<div class="des-wrap">
<div class="title ng-binding"><?php the_title();?></div>
<div class="author ng-binding"><?php the_author();?></div>
</div>
</div>
<div class="play">
<div class="time ng-binding"><?php echo get_post_meta(get_the_id(),'time_l',true);?></div>
</div>
<div class="interactive">
<div class="action-btn like ">
<i class='good' uid='<?php the_id();?>' nam='good'></i>
<span class="ng-binding"><?php echo get_post_meta(get_the_id(),'good',true);?></span>
<div></div>
</div>
<div class="action-btn fave">
<i class='good' uid='<?php the_id();?>' nam='like'></i>
<span class="ng-binding"><?php echo get_post_meta(get_the_id(),'like',true);?></span>
<div></div>
</div>
</div>
</div>
<?php 
	if($i/3==2):
?>
</div>
<?php
		endif;
		$i++;
	endwhile;
	endif;
?>
<?php $admin_url=admin_url('admin-ajax.php');?>
<script type="text/javascript">
	$(function(){
		$('.good').click(function(){
			var uid = $(this).attr('uid');
			var unam = $(this).attr('nam');
			$.post("<?php echo $admin_url;?>", {action:'good',nam:unam,nid:uid}, function(res) {
				
			});
			var n = $(this).siblings('span').html();
			$(this).siblings('span').html(parseInt(n)+1);
		});
	});
</script>
<div style="clear:both;"></div>
<div class="pagestyle clearfix video_pgys">
<?php if ( function_exists('wp_pagenavi') ) wp_pagenavi( array('query' => $the_query) );  ?>
</div>

</div>






<?php
	get_footer();
?>	