
<div class="footer">
<div class="alldivwid clearfix">
<div class="foot_l">
<?php 
	wp_nav_menu(
		array(
			'theme_location'=>'footer-menu',
			'menu_class'	=>'foot_nav clearfix',
			'container'		=>false,
			'depath'		=> 0,
		)
	);
?>

<!--ul class="foot_nav clearfix">
<li><a href="#">关于企业</a></li>
<li><a href="#">产品介绍</a></li>
<li><a href="#">服务支持</a></li>
<li><a href="#">解决方案</a></li>
<li><a href="#">新闻资讯</a></li>
<li><a href="#">精彩视频</a></li>
<li><a href="#">网上商城</a></li>
<li><a href="#">联系我们</a></li>
</ul-->
<div class="foot_info">
<?php 
	$args = array(
		'p'=>'73',
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
<div class="foot_r">
<?php 
	$args = array(
		'category_name'=>'footerpic',
		'order'=>'ASC',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
		while($the_query->have_posts()):
			$the_query->the_post();
			echo '<span class="wxwb">';
			the_content();
			echo '<p>';
			the_title();
			echo '</p></span>';
		endwhile;
	endif;
?>
</div>
</div>
</div>
</body>
</html>