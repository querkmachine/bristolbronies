  <footer class="container" id="footer" role="contentinfo">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'secondary',
        'container' => 'nav',
        'container_class' => 'secondary-navigation'
      ) );
    ?>
    <div class="boilerplate">
      <small>
        &copy;<?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.<br>
        My Little Pony: Friendship is Magic is &copy; Hasbro. Bristol Bronies is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended.
      </small>
    </div>
  </footer>

  <?php 
    if( !is_front_page() && !is_404() ) {
      get_template_part('parts/global/affiliates'); 
    }
  ?>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/fitvids.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/packery.pkgd.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/jquery.unveil.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-34034973-1']);
    _gaq.push(['_setDomainName', 'bristolbronies.co.uk']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
  
  <?php if( is_front_page() ) { ?>
  <!--[if !(lte IE 8)]><!--> 
   <script type="text/javascript"> 
     (function(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=document.location.protocol+"//d1agz031tafz8n.cloudfront.net/thedaywefightback.js/widget.min.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})()
   </script>
  <!--<![endif]-->
  <?php } ?>

</body>
</html>
