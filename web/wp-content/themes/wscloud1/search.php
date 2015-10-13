<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="index-main-wrap">
            <section class="index-main">
               <div class="index-products">
                  <ul class="index-tabs">
                     <li class="current"><?php wp_title(); ?></li>
                  </ul>
                  <div class="products-list">
                     <ul>
<?php $i=1;while (have_posts()) : the_post(); ?>		
                     <li>
                        <a class="pd-item" href="<?php the_permalink() ?>">
                           <span class="pd-img"><img src="<?php $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail");echo $img_src[0];?>" width="185" height="185" alt="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>"></span>
                           <span class="pd-tit"><em><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?></em></span>
                        </a>
                     </li>
<?php endwhile; ?>
                     </ul>
<?php echo izt_pagenavi();?>
                  </div>
               </div>
            </section>
         </section>
         <!--// main end -->
      </section>
   </section>
   <!--// layout end -->
<?php get_footer();?>