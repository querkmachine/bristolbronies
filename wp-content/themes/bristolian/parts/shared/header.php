  <div class="breakpoint-meter">
    <strong>Active stylesheets:</strong>
    <div class="mobile">MOBILE</div>
    <div class="tablet">TABLET</div>
    <div class="screen">SCREEN</div>
  </div>

  <!--[if lt IE 8]>
  <div class="browser-alert">You are using an obsolete and insecure browser. To get the best experience here and elsewhere, <a href="http://browsehappy.org/">please upgrade your browser</a>.</div>
  <![endif]-->

  <div class="guns-dont-kill-people-wrappers-do">
  <!-- Sound of the police! Woo woo woo! -->

    <header class="global-header" role="banner">
      <div class="container">
        <div class="branding">
          <strong>
            <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
          </strong>
        </div>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'global-navigation'
          ) );
        ?>
      </div>
    </header><!-- /.global-header -->

    <?php 
      if ( have_posts() ) while ( have_posts() ) : the_post(); 
        if ( has_post_thumbnail() ) {
          $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
    ?>
    <div class="the-big-picture">
      <img src="<?php echo $large_image_url[0]; ?>" alt="">
    </div><!-- /.the-big-picture -->
    <?php 
        }
        else {
    ?>
    <div class="the-big-picture">
      <img src="http://lorempixel.com/1280/480/" alt="">
    </div><!-- /.the-big-picture -->
    <?php
        }
      endwhile; 
      rewind_posts(); 
    ?>

    <main class="global-main" role="main">
      <div class="container">
        <div class="ticker">
          <strong>Coming up:</strong>
          <a href="#">ESWE presents: The Grand Galloping Gala cosplay meet</a>
        </div><!-- /.ticker -->
      </div>
      <div class="container">
        <div class="global-content">