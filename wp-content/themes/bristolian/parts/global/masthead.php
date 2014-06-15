      <ul class="hidden">
        <li><a href="#content">Skip to content</a></li>
        <li><a href="#bottom">Skip to navigation</a></li>
      </ul>

      <!--[if lte IE 8]>
        <div class="browser-warning">You are using an <strong>outdated</strong> and <strong>insecure</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your web experience.</div>
      <![endif]-->

      <header role="banner" class="header" id="top">
        <div class="header__inner">
          <div class="branding">
            <a href="/"><?php bloginfo('name'); ?></a>
          </div>
          <a href="#bottom" class="navigation-toggle js-navigation-toggle"><i class="fa fa-bars fa-fw"></i></a>
          <div class="navigation js-navigation">
            <nav class="navigation__primary" role="navigation">
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container' => false
                ));
              ?>
            </nav>
            <nav class="navigation__secondary">
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'secondary',
                  'container' => false
                ));
              ?>
            </nav>
          </div>
        </div>
      </header>

      <main class="main" id="content" role="main">