<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
   <!-- about us begin -->
   <section class="layout">
      <section class="index-about">
         <header class="title-bar">
            <h3 class="title">About Us</h3>
         </header>
         <article class="about-content">
            <div class="about-slide">
               <ul class="slides">
                  <li><img src="<?php echo $options['about_img_1']; ?>" width="240" height="160" alt=""></li>
                  <li><img src="<?php echo $options['about_img_2']; ?>" width="240" height="160" alt=""></li>
                  <li><img src="<?php echo $options['about_img_3']; ?>" width="240" height="160" alt=""></li>
               </ul>
            </div>
<?php echo $options['about_text']; ?>
            <div class="read-more"><a href="<?php echo home_url(); ?>/about-us">Read more >></a></div>
         </article>
      </section>
   </section>
   <!--// about us end -->
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="index-main-wrap">
            <section class="index-main">
               <div class="index-products">
               <header class="main-title-bar">
                  <h3 class="main-title">Featured Products</h3>
               </header>
                  <div class="products-list products-scroll">
<?php
					$Catalogno= $options['head_products_no'];
					$sticky = get_option('sticky_posts');
					rsort( $sticky );
					$sticky = array_slice( $sticky, 0);
					query_posts(array('cat' => 1, 'caller_get_posts' => 1 , 'post__in' => $sticky,  'showposts' => $Catalogno ));
?>
                     <ul class="slides">
<?php $i=1;while (have_posts()) : the_post(); ?>		
                     <li>
                        <a class="pd-item" href="<?php the_permalink() ?>">
                           <span class="pd-img"><img src="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail");echo $img_src[0];?>" width="185" height="185" alt="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>"></span>
                           <span class="pd-tit"><em><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?></em></span>
                        </a>
                     </li>
<?php $i++;endwhile; wp_reset_query();?> 
                     </ul>
                  </div>
               </div>
               <hr>
               <div class="index-products">
               <header class="main-title-bar">
                  <h3 class="main-title">Latest Products</h3>
               </header>
                  <div class="products-list">
<?php
					$Catalogno= $options['head_la_products_no'];
					query_posts(array('cat' => 1, 'caller_get_posts' => 1 , 'showposts' => $Catalogno ));
?>
                     <ul>
<?php $i=1;while (have_posts()) : the_post(); ?>		
                     <li>
                        <a class="pd-item" href="<?php the_permalink() ?>">
                           <span class="pd-img"><img src="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail");echo $img_src[0];?>" width="185" height="185" alt="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>"></span>
                           <span class="pd-tit"><em><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?></em></span>
                        </a>
                     </li>
<?php $i++;endwhile; wp_reset_query();?> 
                     </ul>
                  </div>
               </div>

            </section>
         </section>
         <!--// main end -->
      </section>
   </section>
   <!--// layout end -->
<?php get_footer();?>