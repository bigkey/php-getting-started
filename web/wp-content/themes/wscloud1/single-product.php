<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="sub-main-wrap">
            <section class="sub-main">
               <header class="main-title-bar">
                  <ul class="main-path">
                     <li><a href="<?php echo home_url(); ?>">Home</a></li><?php the_category() ?>
                  </ul>
               </header>
               <!-- product intro begin -->
               <section class="product-intro">
                  <section class="product-view">
				  <div class="product-img jqzoom"><img id="bigImg" src="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");echo $img_src[0];?>" jqimg="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "medium");echo $img_src[0];?>" alt="" /></div>
                     <!-- small img -->
                     <div class="small-img-wrap">
                        <a class="small-btn-prev" href="javascript:"><b></b></a>
                        <div class="small-img-scroll">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

<?php
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	foreach( $images as $image ) {
		$imgArray[] = $image->guid;
	}
	//获得插入到文章中的图片
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	//过滤掉已经插入到文章中的图片
	$imgArray = array_diff($imgArray,$matches[1]);
	for($i=0,$j=0;$i<=count($imgArray);$i++) {
		if($imgArray[$i]<>'') {
			$imgActual[$j]=$imgArray[$i];
			$j = $j+1;
		}		
	}
	//print_r($imgActual);

?>
                        <ul>
			<?php
				for($i=0;$i<=count($imgActual);$i++) {
					if($imgActual[$i]<>'')
						echo '<li>
                           <img src_big="'.$imgActual[$i].'" src_mid="'.$imgActual[$i].'" src="'.$imgActual[$i].'">
                        </li>';
				}
			?>
                        </ul>
		<?php endwhile; ?>

		<?php endif; ?>

                        </div>
                        <a class="small-btn-next" href="javascript:"><b></b></a>
                     </div>
                     <!--// small img end -->
                  </section>
                  <section class="product-info">
                     <div class="product-info-wrap">
                        <h1 class="pdoduct-title"><?php wp_title(); ?> </h1>
                        <div class="product-summary">
                           <h5>Shot Description:</h5>
                           <p><?php the_excerpt(); ?></p>
                        </div>
                        <!-- inquiry -->
                        <section class="inquiry-form">
                           <h4>*Enter your inquiry details</h4>
<?php 
	if (function_exists('dynamic_sidebar')){
			dynamic_sidebar('inquiry');
	}
?>
                        </section>
                     </div>
                  </section>
               </section>
               <!--// product intro end -->
               
               <!-- Description begin -->
               <section class="product-detail">
                  <header class="main-title-bar">
                     <h3 class="main-title">Description:</h3>
                  </header>
                  <div class="entry product-content">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?> 
<?php endwhile; ?>
<hr>
<?php the_tags(); ?>
<hr>
                  </div>
               </section>
               <!--// Description end -->
            </section>
         </section>
         <!--// main end -->
         <!-- main begin -->
         <section class="index-main-wrap">
            <section class="index-main">
               <div class="index-products">
               <header class="main-title-bar">
                  <h3 class="main-title">Related Products</h3>
               </header>
                  <div class="products-list products-scroll">
                     <ul class="slides">
       <?php
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$cat = get_category( $cats[0] );
$first_cat = $cat->cat_ID;
$args = array(
        'category__in' => array($first_cat),
        'post__not_in' => array($post->ID),
        'showposts' => 12,
        'caller_get_posts' => 1);
query_posts($args);
if (have_posts()) :
 while (have_posts()) : the_post(); update_post_caches($posts); ?>
                     <li>
                        <a class="pd-item" href="<?php the_permalink() ?>">
                           <span class="pd-img"><img src="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail");echo $img_src[0];?>" width="185" height="185" alt="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>"></span>
                           <span class="pd-tit"><em><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?></em></span>
                        </a>
                     </li>
<?php endwhile; else : ?>
<?php endif; wp_reset_query(); } ?>
                     </ul>
                  </div>
               </div>
            </section>
         </section>
         <!--// main end -->
      </section>
      <!--// index wrap end -->
   </section>
   <!--// layout end -->
<?php get_footer();?>