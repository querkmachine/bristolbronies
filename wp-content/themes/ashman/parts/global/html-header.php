<!doctype html>
<!--[if lt IE 7 ]><html class="no-js ie6" <?php language_attributes(); ?>><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" <?php language_attributes(); ?>><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" <?php language_attributes(); ?>><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>

  <!-- Technical metadata -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="all, noydir, noodp">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Content metadata -->
  <meta name="author" content="">
  <meta name="copyright" content="">
  <meta name="geo.region" content="">                       <!-- See http://www.geo-tag.de/ -->
  <meta name="geo.placename" content="">
  <meta name="geo.position" content="">
  <meta name="ICBM" content="">

  <!-- Bookmark icons -->
  <link rel="shortcut icon" href="">                        <!-- 16x16 .ico (legacy browsers) -->
  <link rel="icon" type="image/png" href="">                <!-- 32x32 .png (new browsers) -->
  <link rel="apple-touch-icon" sizes="144x144" href="">     <!-- 144x144 .png (retina iPad) -->
  <link rel="apple-touch-icon" sizes="114x114" href="">     <!-- 114x114 .png (retina iPhone/iPod) -->
  <link rel="apple-touch-icon" sizes="72x72" href="">       <!-- 72x72 .png (standard iPad) -->
  <link rel="apple-touch-icon" href="">                     <!-- 57x57 .png (standard iPhone/iPod) -->
  <meta name="msapplication-TileImage" content="">          <!-- 144x144 .png (Windows 8) -->
  <meta name="msapplication-square70x70logo" content="">    <!-- 70x70 .png (Windows 8.1) -->
  <meta name="msapplication-square150x150logo" content="">  <!-- 150x150 .png (Windows 8.1) -->
  <meta name="msapplication-wide310x150logo" content="">    <!-- 310x150 .png (Windows 8.1) -->
  <meta name="msapplication-square310x310logo" content="">  <!-- 310x310 .png (Windows 8.1) -->
  <meta name="msapplication-TileColor" content="#ffffff">   <!-- (Windows 8/8.1) -->
  <meta name="apple-mobile-web-app-title" content="">       <!-- (iOS) -->
  <meta name="application-name" content="">                 <!-- (Windows 8.1) -->

  <!-- Stylesheets -->
  <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css?v=ashman">

  <!-- Javascripts -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-2.7.1.min.js"></script>

  <!-- Page title -->
  <title>
    <?php 
      if(is_front_page()) {
        bloginfo('name');
        echo " | "; 
        bloginfo('description');
      }
      else {
        wp_title('', true, 'right');
        echo " | ";
        bloginfo('name');
      }
    ?>
  </title>

</head>
<body <?php body_class(); ?>>
  <div class="guns-dont-kill-people"><!-- wrappers do -->