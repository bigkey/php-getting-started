<?php get_header();?>
<?php $options = get_option('eocms_options'); ?>
<?php get_sidebar();?>
         <!-- main begin -->
         <section class="sub-main-wrap">
            <section class="sub-main">
               <article class="article-detail">
                  <header class="main-title-bar">
                     <h1 class="main-title"><?php wp_title(); ?></h1>
                  </header>
                  <div class="article-content">
                  </div>
               </article>
            </section>
         </section>
         <!--// main end -->
      </section>
   </section>
   <!--// layout end -->
<?php get_footer();?>