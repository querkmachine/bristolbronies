      </main>

      <?php 
        if(is_front_page()):
          get_template_part('parts/global/donate-cta');
        endif; 
      ?>

      <footer class="footer" id="bottom" role="contentinfo">
      <?php if(function_exists('bcn_display') && !is_front_page()): ?>
        <div class="row">
          <nav class="breadcrumbs footer__breadcrumbs">
            <?php bcn_display(); ?>
          </nav>
        </div>
      <?php endif; ?>
        <div class="footer-links">
          <div class="row">
            <div class="footer-links__group footer-links__group--site">
              <h6><?php bloginfo('name'); ?></h6>
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container' => false
                ));
              ?>
            </div>
            <div class="footer-links__group footer-links__group--details">
              <h6>More Information</h6>
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'footer',
                  'container' => false
                ));
              ?>
            </div>
            <div class="footer-links__group footer-links__group--social">
              <h6>Find Us Online</h6>
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'social',
                  'container' => false
                ));
              ?>
            </div>
            <?php
              get_template_part('parts/global/affiliates');
            ?>
          </div>
        </div>
        <div class="boilerplate">
          <div class="row">
            <p>
              <small>
                &copy;<?php echo date('Y'); ?> Bristol Bronies. All rights reserved. Another one of <a href="http://greysadventures.com/">Grey's Adventures</a>.<br>
                My Little Pony: Friendship is Magic is &copy; Hasbro. Bristol Bronies is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended.
              </small>
            </p>
          </div>
        </div>
      </footer>