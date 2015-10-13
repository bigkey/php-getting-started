<?php $options = get_option('eocms_options'); ?>
   <!-- layout begin -->
   <section class="layout">
      <section class="index-wrap">
         <!-- aside begin -->
         <aside class="aside">
            <div class="widget">
               <div class="widget-titbar">
                  <h3 class="widget-title">Products Categories</h3>
               </div>
               <ul>
	  <?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'sidebar', 'echo' => false)) ));?>
               </ul>
            </div>
            <div class="widget">
               <div class="widget-titbar">
                  <h3 class="widget-title">News</h3>
               </div>
<?php
					$Catalognewsno= $options['head_news_no'];
					$Catalognews= $options['style_news'];
					query_posts(array('cat' => $Catalognews, 'caller_get_posts' => 1 , 'showposts' => $Catalognewsno ));
?>
<ul>            
<?php $i=1;while (have_posts()) : the_post(); ?>		
                  <li><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$post->post_title)), 0, 120,"..."); ?></a></li>
<?php $i++;endwhile; wp_reset_query();?> 
               </ul>
               <div class="readmore"><a href="<?php echo home_url(); ?>/news">Read more &gt;&gt;</a></div>
            </div>
            <div class="widget widget-contact">
               <div class="widget-titbar">
                  <h3 class="widget-title">Contact Us</h3>
               </div>
               <ul>
                  <?php if($options['company']<>'') { ?><center><b><?php echo $options['company']; ?></b></center><?php     } ?>
                  <?php if($options['address']<>'') { ?><li class="contact-adress">Adress: <?php echo $options['address']; ?></li><?php     } ?>
                  <?php if($options['phone']<>'') { ?><li class="contact-phone">Phone: <?php echo $options['phone']; ?></li><?php     } ?>
                  <?php if($options['email']<>'') { ?><li class="contact-email">E-mail: <?php echo $options['email']; ?></li><?php     } ?>
                  <?php if($options['fax']<>'') { ?><li class="contact-fax">Fax: <?php echo $options['fax']; ?></li><?php     } ?>
                  <?php if($options['skype']<>'') { ?><li class="contact-skype">Skype: <?php echo $options['skype']; ?></li><?php     } ?>
                  <?php if($options['msn']<>'') { ?><li class="contact-key">Msn: <?php echo $options['msn']; ?></li><?php     } ?>
               </ul>
            </div>         
         </aside>
         <!--// aside end -->
         