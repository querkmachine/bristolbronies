	</div>
      </div>
    </main><!-- /.global-main -->

    <footer class="global-footer" role="contentinfo">
      <div class="container">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'secondary',
            'container' => 'nav',
            'container_class' => 'secondary-navigation'
          ) );
        ?>
        <div class="boilerplate">
          <small>
            &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
            My Little Pony: Friendship is Magic is &copy; Hasbro. Bristol Bronies is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended. Another one of <a href="http://greysadventures.com/">Grey's Adventures</a>.
          </small>
        </div>
      </div>
    </footer><!-- /.global-footer -->

  </div><!-- /.guns-dont-kill-people-wrappers-do -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/-/vendor/jquery/jquery.min.js"><\/script>')</script>

  <!-- Google Analytics -->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-31842948-3']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>