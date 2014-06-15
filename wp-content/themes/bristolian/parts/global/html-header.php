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
  <link rel="profile" href="http://microformats.org/profile/hcalendar">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Content metadata -->
  <meta name="author" content="<?php bloginfo('name'); ?>">
  <meta name="copyright" content="<?php echo date('Y'); ?> <?php bloginfo('name'); ?>">
  <meta name="geo.region" content="GB-BST">
  <meta name="geo.placename" content="Bristol">
  <meta name="geo.position" content="51.454513;-2.58791">
  <meta name="ICBM" content="51.454513, -2.58791">

  <!-- Bookmark icons -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon-32.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed-144x144.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed-72x72.png">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/windows-8.png">
  <meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/windows-8-70x70.png">
  <meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/windows-8-150x150.png">
  <meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/windows-8-310x150.png">
  <meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/windows-8-310x310.png">
  <meta name="msapplication-TileColor" content="#e02436">
  <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
  <meta name="application-name" content="<?php bloginfo('name'); ?>">

  <!-- Stylesheets -->
  <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/stylesheet.css?v=<?php echo BB_VERSION; ?>">

  <!-- Javascripts -->
  <script src="//use.typekit.net/rvj6shm.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr-2.7.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/pace.min.js"></script>

  <!-- Page title -->
  <title>
    <?php 
      if(is_front_page()):
        bloginfo('name');
        echo " | "; 
        bloginfo('description');
      else:
        wp_title('', true, 'right');
        echo " | ";
        bloginfo('name');
      endif;
    ?>
  </title>

</head>
<body <?php body_class(); ?>>
  <div class="guns-dont-kill-people"><!-- wrappers do -->