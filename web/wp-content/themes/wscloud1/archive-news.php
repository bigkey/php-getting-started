<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="sub-main-wrap">
            <section class="sub-main">
               <header class="main-title-bar">
                  <h3 class="main-title">News List</h3>
               </header>
            <ul class="news-list">
            <?php while ( have_posts() ) : the_post(); ?>
               <li>
                  <div class="hd">
                     <h4><a href="<?php the_permalink() ?>" title="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?></a></h4>
                     <div class="meta">Post Time: <?php the_time('m-d-y') ?>; By: <?php echo home_url(); ?></div>
                  </div>
                  <div class="txt"><?php the_excerpt(); ?></div>
                  <div class="more"><a href="<?php the_permalink() ?>" title="<?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 200,"..."); ?>">Read More</a></div>
               </li>
            <?php endwhile; ?></ul>  
            <?php echo izt_pagenavi();?>
            </section>
         </section>
         <!--// main end -->
      </section>
   </section>
   <!--// layout end -->

<?php get_footer();?>