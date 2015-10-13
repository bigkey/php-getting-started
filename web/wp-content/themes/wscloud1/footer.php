<?php $options = get_option('eocms_options'); ?>
   <!-- footer begin -->
   <footer class="footer">
      <section class="foot-wrap">
         <div class="foot-info"><?php echo $options['footer_content']; ?> <?php echo $options['footer_code']; ?></div>
         <ul class="foot-nav">
	  <?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'footer', 'echo' => false)) ));?>
         </ul>
      </section>
   </footer>
   <!--// footer end -->

</section>
<!--// container end -->
<script src="<?php echo home_url(); ?>/template/js/view.js" type="text/javascript"></script>
   <script>
      //products scroll
          $(window).load(function(){
          $('.products-scroll').flexslider({
             animation: "slide",
			 slideshow:false,
			 controlNav:false,
             animationLoop: true,
             slideshowSpeed:5000,
             animationSpeed:800,		
             itemWidth: 187,
             itemMargin:17,
			 direction: "horizontal"
          });
       });
	</script>
<script type="text/javascript">   
$(window).load(function(){
     $('.slide-banners').flexslider({
        animation: "slide",
		slideshowSpeed:5000,
		animationSpeed:800,
		pauseOnAction:false
     });  
});
</script>
<script>
$(function() {
	//small image scroll
	$(".small-img-scroll").jCarouselLite({
	btnPrev: ".small-btn-prev",
	btnNext: ".small-btn-next",
	speed:100,
	auto:false,
	scroll:1,
	visible:4,
	vertical:false,
	circular:false,
	onMouse:true
	});
s});

</script>    
 <script>
   //about us - slide
   $(window).load(function(){
     $('.about-slide').flexslider({
        animation: "slide",
		slideshowSpeed:5000,
		animationSpeed:800,
		pauseOnAction:false
     }); 
	 //hover
	 $('.about-slide .flex-control-nav li').each(function(){
        $(this).hover(function(){
		   $(this).find('a').click()
		})
	 })
   });
   </script>

<?php if($options['kefu_show']<>'') { ?>
<!-- online service -->
<aside class="popbox">
   <header class="hd">
      <h4>Online</h4>
      <i class="close" title="close"></i>
   </header>
   <figure class="img"><img src="<?php echo home_url(); ?>/template/img/chat_girl.jpg" /></figure>
   <ul class="cont">
         <li><a class="skype" href="skype:<?php echo $options['skype']; ?>?chat" target="_blank">Skype Chat</a></li>
         <li><a class="msn" href="msnim:chat?contact=<?php echo $options['msn']; ?>">MSN Chat</a></li>
         <li><a class="btn-get-quote" href="<?php echo home_url(); ?>/contact-us">Send Inquiry</a></li>
   </ul>
</aside>
<?php     } ?>
<?php wp_footer();?><script type="text/javascript">/*<![CDATA[*/!window.jQuery && document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"><\/script>')/*]]>*/</script><script type="text/javascript" src="http://cms.web-sun.cn/wp-content/plugins/wp-translator-revolution/javascript/jquery.translator.min.js?ver=1.5.2"></script><script type="text/javascript">/*<![CDATA[*/jQuery.translator.loader({languages: ["en","es","fr","de","ja","it","pt","ko","ru","sr","is"],flagsFolder: "http:\/\/cms.web-sun.cn\/wp-content\/plugins\/wp-translator-revolution\/images\/",actionsUrl: "http:\/\/cms.web-sun.cn\/wp-admin\/admin-ajax.php",clsKey: "ac5b153462e694fc2d5d1579ab928522"});/*]]>*/</script><link rel='stylesheet' id='contact-form-7-css'  href='http://cms.web-sun.cn/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.4.1' type='text/css' media='all' />
<script type='text/javascript'>
/* <![CDATA[ */
var SlimStatParams = {"ajaxurl":"http:\/\/cms.web-sun.cn\/wp-admin\/admin-ajax.php","id":"124478.ddc923d5081a9ec831f4414c3d547844"};
/* ]]> */
</script>
</body>
</html>
