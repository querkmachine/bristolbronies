      </main>

      <?php if(function_exists('bcn_display') && !is_front_page()) { ?>
        <div class="breadcrumbs">
          <?php bcn_display(); ?>
        </div>
      <?php } ?>

      <footer class="footer" id="bottom" role="contentinfo">
        <div class="footer-links">
          <div class="row">
            <div class="footer-links__column">
              <h6><?php bloginfo('name'); ?></h6>
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container' => false
                ));
              ?>
            </div>
            <div class="footer-links__column">
              <h6>More Information</h6>
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'footer',
                  'container' => false
                ));
              ?>
            </div>
            <div class="footer-links__column">
              <h6>Find Us Online</h6>
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'social',
                  'container' => false
                ));
              ?>
            </div>
            <div class="footer-links__column footer-links__affiliate">
              <h6>In Affiliation With</h6>
              <ul>
                <li>
                  <a href="#" target="_blank">
                    <img src="http://bristolbronies.co.uk/wp-content/uploads/2013/08/ib1SJr1c7a0HZI.png" alt="Bronies UK">
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                    <img src="http://bristolbronies.co.uk/wp-content/uploads/2013/07/sonicradioboom.png" alt="Sonic Radioboom">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="boilerplate">
          <div class="row">
            <small>
              &copy;2014 Bristol Bronies. All rights reserved. Another one of <a href="http://greysadventures.com/">Grey's Adventures</a>.<br>
              My Little Pony: Friendship is Magic is &copy; Hasbro. Bristol Bronies is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended.
            </small>
          </div>
        </div>
      </footer>