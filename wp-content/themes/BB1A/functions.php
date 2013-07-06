<?php

  //
  //
  // ADD SUPPORT FOR FEATURED POST IMAGES
  add_theme_support('post-thumbnails');
  
  //
  //
  // REGISTER SITE MENUS
  register_nav_menus(array('primary' => 'Primary Navigation'));
  register_nav_menus(array('secondary' => 'Secondary Navigation'));

  //
  //
  // ADD SUPPORT FOR UPLOADING SVGS
  function my_mime_types($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
  }
  add_filter('upload_mimes', 'my_mime_types', 1, 1);

  //
  //
  // NEWS POST TYPE
  function my_custom_post_news() {
    $labels = array(
      'name' => _x('News', 'post type general name'),
      'singular_name' => _x('News', 'post type singular name'),
      'add_new' => _x('Add New', 'book'),
      'add_new_item' => __('Add New News'),
      'edit_item' => __('Edit News'),
      'new_item' => __('New News'),
      'all_items' => __('All News'),
      'view_item' => __('View News'),
      'search_items' => __('Search News'),
      'not_found' => __('No news found'),
      'not_found_in_trash' => __('No news found in the trash'),
      'parent_item_colon' => '',
      'menu_name' => 'The Flugelhorn'
    );
    $args = array(
      'labels' => $labels,
      'description' => 'Holds news items',
      'public' => true,
      'menu_position' => 5,
      'supports' => array('title', 'editor', 'thumbnail', 'author', 'custom-fields', 'revisions', 'page-attributes'),
      'has_archive' => true
    );
    register_post_type('news', $args);
  }
  add_action('init', 'my_custom_post_news');

  //
  //
  // COMMUNITY POST TYPE
  function my_custom_post_community() {
    $labels = array(
      'name' => _x('Media', 'post type general name'),
      'singular_name' => _x('Media', 'post type singular name'),
      'add_new' => _x('Add New', 'book'),
      'add_new_item' => __('Add New Media'),
      'edit_item' => __('Edit Media'),
      'new_item' => __('New Media'),
      'all_items' => __('All Media'),
      'view_item' => __('View Media'),
      'search_items' => __('Search Media'),
      'not_found' => __('No media found'),
      'not_found_in_trash' => __('No media found in the trash'),
      'parent_item_colon' => '',
      'menu_name' => 'Community'
    );
    $args = array(
      'labels' => $labels,
      'description' => 'Holds community uploaded media',
      'public' => true,
      'menu_position' => 5,
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
      'has_archive' => true
    );
    register_post_type('community', $args);
  }
  add_action('init', 'my_custom_post_community');

  //
  //
  // GRAB EXIF DATA FROM PHOTOGRAPHS
  // http://www.php.net/manual/en/function.exif-read-data.php#107888
  function cameraUsed($imagePath) {

    // Check if the variable is set and if the file itself exists before continuing
    if ((isset($imagePath)) and (file_exists($imagePath))) {
    
      // There are 2 arrays which contains the information we are after, so it's easier to state them both
      $exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);       
      $exif_exif = read_exif_data($imagePath ,'EXIF' ,0);
      
      //error control
      $notFound = false;
      
      // Make 
      if (@array_key_exists('Make', $exif_ifd0)) {
        $camMake = $exif_ifd0['Make'];
      } else { $camMake = $notFound; }
      
      // Model
      if (@array_key_exists('Model', $exif_ifd0)) {
        $camModel = $exif_ifd0['Model'];
      } else { $camModel = $notFound; }
      
      // Exposure
      if (@array_key_exists('ExposureTime', $exif_ifd0)) {
        $camExposure = $exif_ifd0['ExposureTime'];
      } else { $camExposure = $notFound; }

      // Aperture
      if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
        $camAperture = $exif_ifd0['COMPUTED']['ApertureFNumber'];
      } else { $camAperture = $notFound; }
      
      // Date
      if (@array_key_exists('DateTime', $exif_ifd0)) {
        $camDate = $exif_ifd0['DateTime'];
      } else { $camDate = $notFound; }
      
      // ISO
      if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
        $camIso = $exif_exif['ISOSpeedRatings'];
      } else { $camIso = $notFound; }

      // Focal Length
      // if (@array_key_exists('FocalLength',$exif_ifd0)) {
      //   $camFocalLength = $exif_ifd0['FocalLength'];
      // } else { $camFocalLength = $notFound; }

      // GPS data
      if(@array_key_exists('GPSLatitudeRef', $exif_ifd0)) {
        $camLatitude = $exif_ifd0['GPSLatitudeRef'];
      } else { $camLatitude = $notFound; }

      if($camLatitude != false) { 
        if(@array_key_exists('GPSLatitude', $exif_ifd0)) {
          $camLatitudeDegrees = explode("/", $exif_ifd0['GPSLatitude'][0]);
          $camLatitudeSeconds = explode("/", $exif_ifd0['GPSLatitude'][1]);
          $camLatitudeSecondsCalc = ((substr($camLatitudeSeconds[0],0,2)*60)+substr($camLatitudeSeconds[0],2,2));
          $camLatitudeReadableDeg = round(($camLatitudeSecondsCalc / 3600) + $camLatitudeDegrees[0], 6);
          if(strtoupper($camLatitude) == "S") { $camLatitudeReadableDeg = "-".$camLatitudeReadableDeg; }
          $camLatitudeReadableGPS = $camLatitude . " " . $camLatitudeDegrees[0] . "&deg; " . ($camLatitudeSeconds[0]/1000);
        } else { $camLatitudeDegrees = $notFound; $camLatitudeSeconds = $notFound; }
      }

      if(@array_key_exists('GPSLongitudeRef', $exif_ifd0)) {
        $camLongitude = $exif_ifd0['GPSLongitudeRef'];
      } else { $camLongitude = $notFound; }

      if($camLongitude != false) {
        if(@array_key_exists('GPSLongitude', $exif_ifd0)) {
          $camLongitudeDegrees = explode("/", $exif_ifd0['GPSLongitude'][0]);
          $camLongitudeSeconds = explode("/", $exif_ifd0['GPSLongitude'][1]);
          $camLongitudeSecondsCalc = ((substr($camLongitudeSeconds[0],0,2)*60)+substr($camLongitudeSeconds[0],2,2));
          $camLongitudeReadableDeg = round(($camLongitudeSecondsCalc / 3600) + $camLongitudeDegrees[0], 6);
          if(strtoupper($camLongitude) == "W") { $camLongitudeReadableDeg = "-".$camLongitudeReadableDeg; }
          $camLongitudeReadableGPS = $camLongitude . " " . $camLongitudeDegrees[0] . "&deg; " . ($camLongitudeSeconds[0]/1000);
        } else { $camLongitudeDegrees = $notFound; $camLongitudeSeconds = $notFound; }
      }

      $return = array();
      $return['make'] = $camMake;
      $return['model'] = $camModel;
      $return['exposure'] = $camExposure;
      $return['aperture'] = $camAperture;
      $return['date'] = $camDate;
      $return['iso'] = $camIso;
      //$return['focallength'] = $camFocalLength;
      $return['latitude'] = array(
        'ref' => $camLatitude,
        'deg' => $camLatitudeReadableDeg,
        'gps' => $camLatitudeReadableGPS
      );
      $return['longitude'] = array(
        'ref' => $camLongitude,
        'deg' => $camLongitudeReadableDeg,
        'gps' => $camLongitudeReadableGPS
      );
      return $return;
    
    } else {
      return false; 
    } 
  }