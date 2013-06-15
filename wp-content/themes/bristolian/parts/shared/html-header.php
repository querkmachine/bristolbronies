<!doctype html>
<!-- 
     Hello there, source code reader!

     I see you have come into the domain of the most 
     sacred markup, a place where only the wisest may 
     confidently tread. 

     When I was first learning to make websites, I spent 
     a hell of a lot of time reading (and occassionally 
     copying and building upon) the source code of other 
     websites. Sometimes I still do, often to find out 
     how a cool little feature or effect is working. 
     Learning by doing is the best way to learn, 
     after all. 

     I do hope you enjoy all this nicely commented code. 
     And also this ASCII art of Rainbow Dash.

     ~ Grey Hargreaves 
     http://greysadventures.com/


             _,..wWWw--.11/+'.            11_      ,.
       ..wwWWWWWWWWW;7ooo8;11++++.        11.ll'  ,.++;"
        `'"">wW7;oOOOOOO8;:11++\++.      11.;;; .;"+++'   ,..
          ,ww7OOOOOOOO8,,,11++++\+++.    11lll',ll'++;  ,++;'
         ,oOOOOOOOO8,,,,11+++++`'++9ll. 11;lll ll:+++' ;+++'
        ;OOOOOOOOO8,,,'11++++++++++9lll 11;lll ll:++:'.+++'
        OOOO;OOO"8,,"/;11++++,+,++++9ll`11:llllll++++'+++
       OOOO;OO"8,,'11++'+++14;14###;"-11++9;;12X11 llll`;+++++++'  ,.    6,.      _
      ;O;'oOOO8 ,'11+++14\,-6:  14###11++++9ll12X 11:l.;;;,--++."-+++++ 6w":---wWWWWWww-._
     ;'  /O'"'"11++++++14' 6:;0";14#11'11+++9lll12XX6,11llll;++.+++++++++6W,6"WWWWWWWWww;""""'`
        ."     11`"+++++14'.13'"''`11;'9ll;12xXX6w11llll++;--.++++6;wWW;12xXXXXXXXXXx"6Ww.
               .+++++++++++';12xXXXXX6;W11ll"+-"++,'---"-12.x""`"9lllllllx12XXx6WWw.
               "12---'11++++++-;12XXXXXX6wWW11l"++++,"---++++"8,,,,,,,,,,;9lll12XXXx6WW,
                 `'""""',+12xXXXXX6;wWW11'+++++++++;;;"4;;;;7;;;;7oOo8,,,,,9;;12XXX6;WW`
                       ,+12xXXXXX6wWw"11++.++++-.0;;11+++<'   4`"WWWww;7Oo8,,,9ll12XXX6"Ww
                       +12xXXX6"wwW"11+++++'"--00'"'  )11+++     4`WWW"Ww7OO8,,9lll12XXX6ww
                      ,X++++;"11+++++++++++0`., )  )11+++     4)W; ,W7OO8,,9lll12X:6"Ww
                      :++++++++++++++++++++4W8'"-12:11++++    4.W'  WW7OO8,,9lll12X; 6`w
                      .++++++++++++++++.+++4"ww 12:11+++'   4,"   ,WW7OO8,,9lll12X;  6;
               ;ll--.-"`.;++++++++++++++.+++;+8.12;11++(         4:WW7OO8,,9lll12Xx
              ,'lllllllll,++++;+++++++++;"++++++++++++-.    4:WW7OO8,,9lll12Xx
              ;llll;;;"';'++++;'"""'''`` `lll;;:+++++++++.  4WW7OOO8,,9lll12X'
             ,lllll,    ;+++++;            `"lllll.++++++++ 4WWw7O8,,,9ll12X;
             lllllll,  ,++++++;               llllll+++++++.4:WWw8',,9ll12x
            ,llllllll, ;++++++;               :llllll+++++++.4"WW8;,,9ll12x
            ;lllllllllV+++++++;               :lllllll+++++++.4`w'8 `.9l12x.
            `lllllllll'+++++++;               :lllllll++++++++  4`4\  12`,X\
             "llllll;++++++++;                ;llllll'+++++++++   4`-  12\X;
              "llll'+++++++++;               ;lllllll"+++++++++        12`)
               `-'`+++++++++;'              ,llllllll++++++++++
                 +++++++++++;              ,llllllll'++++++++++
                '++++++++++"               `""""""""'+++++++++"

-->
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js lt-ie9" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]--><head>

  <!-- Technical meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://microformats.org/profile/hcalendar">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Content meta -->
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="copyright" content="<?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>">
  <meta name="geo.region" content="GB-BST">
  <meta name="geo.placename" content="Bristol">
  <meta name="geo.position" content="51.454513;-2.58791">
  <meta name="ICBM" content="51.454513, -2.58791">

  <!-- Icons -->
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/favicon.ico">
  <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/apple-touch-icon-precomposed.png">
  <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/-/img/icon/windows-8-tile.png">
  <meta name="msapplication-TileColor" content="#C8102E">

  <!-- Stylesheets -->
  <link rel="stylesheet" media="all" href="http://fonts.googleapis.com/css?family=Open+Sans:300,700,300italic,700italic">
  <link rel="stylesheet" media="all" href="http://fonts.googleapis.com/css?family=Arvo:400,700">
  <link rel="stylesheet" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/-/css/stylesheet.css">

  <!-- Scripts -->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/-/vendor/modernizr/modernizr.js"></script>

  <!-- Page title -->
  <title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>

</head>
<body <?php body_class(); ?>>