<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="sub-main-wrap">
            <section class="sub-main">
               <article class="article-detail">
                  <header class="main-title-bar">
                     <h1 class="main-title"><?php wp_title(); ?> </h1>
                  </header>
                  <div class="article-content">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?> 
<?php endwhile; ?>
<hr>
<?php the_tags(); ?> - Post Time: <?php the_time('m-d-y') ?> - By: <?php echo home_url(); ?>
                  </div>
               </article>
               <hr>
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
            </section>
         </section>
         <!--// main end -->
      </section>
   </section>
   <!--// layout end -->
<?php get_footer();?>