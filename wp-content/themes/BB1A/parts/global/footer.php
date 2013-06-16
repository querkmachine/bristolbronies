
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

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/fitvids.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/jquery.isotope-min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-34034973-1']);
    _gaq.push(['_setDomainName', 'bristolbronies.co.uk']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>

  <?php wp_footer(); ?>

</body>
</html>