<?php

/**
 * Register post thumbnails
 */

add_theme_support('post-thumbnails');

/**
 * Register navigation menus
 */

register_nav_menus(array('primary' => 'Main navigation'));
register_nav_menus(array('secondary' => 'Secondary navigation'));
register_nav_menus(array('footer' => 'Footer navigation'));
register_nav_menus(array('social' => 'Social links'));

/**
 * Register sidebars
 */

register_sidebar(array('name' => 'Main sidebar', 'id' => 'primary'));

/**
 * Enable HTML5 output
 */

add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));

/**
 * Prettify search URLs because WordPress doesn't do that
 */

function ashman_search_url_rewrite_rule() {
  if(is_search() && !empty($_GET['s'])) {
    wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
    exit();
  } 
}
add_action('template_redirect', 'ashman_search_url_rewrite_rule');

/**
 * Highlight search terms
 */

function ashman_search_highlight_term($term, $string) {
  $keys = explode(" ", $term);
  $string = preg_replace('/('.implode('|', $keys) .')/iu', '<mark>\0</mark>', $string);
  return $string;
}

/**
 * Better excerpts 
 */

function ashman_excerpts($text, $raw_excerpt) {
  if(!$raw_excerpt) {
    $content = apply_filters('the_content', strip_shortcodes(get_the_content()));
    $text = substr($content, 0, strpos($content, '</p>') + 4);
  }
  $text = preg_replace("/<img[^>]+\>/i", "", $text); 
  return $text;
}
add_filter('wp_trim_excerpt', 'ashman_excerpts', 10, 2);

/** 
 * Get custom fields 
 */

function ashman_custom_field($field_name, $id = false) {
  if(strlen(get_field($field_name, $id)) > 0) {
    return get_field($field_name, $id);
  }
  else {
    return false;
  }
}

/**
 * Meet post type
 */

function ashman_meet_post_type() {
  $labels = array(
    'name' => _x('Meets', 'post type general name'),
    'singular_name' => _x('Meet', 'post type singular name'),
    'add_new' => _x('Add New', 'book'),
    'add_new_item' => __('Add New Meet'),
    'edit_item' => __('Edit Meet'),
    'new_item' => __('New Meet'),
    'all_items' => __('All Meets'),
    'view_item' => __('View Meet'),
    'search_items' => __('Search Meets'),
    'not_found' => __('No meets found'),
    'not_found_in_trash' => __('No meets found in the trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Meets'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Contains the meets that we hold.',
    'public' => true,
    'menu_position' => 7,
    'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    'taxonomies' => array('category'),
    'has_archive' => true
  );
  register_post_type('meet', $args);
}
add_action('init', 'ashman_meet_post_type');

/**
 * Location post type
 */

function ashman_location_post_type() {
  $labels = array(
    'name' => _x('Locations', 'post type general name'),
    'singular_name' => _x('Location', 'post type singular name'),
    'add_new' => _x('Add New', 'book'),
    'add_new_item' => __('Add New Location'),
    'edit_item' => __('Edit Location'),
    'new_item' => __('New Location'),
    'all_items' => __('All Locations'),
    'view_item' => __('View Location'),
    'search_items' => __('Search Locations'),
    'not_found' => __('No locations found'),
    'not_found_in_trash' => __('No locations found in the trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Locations'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Contains meet locations and venues.',
    'public' => false,
    'menu_position' => 7,
    'supports' => array('title', 'custom-fields'),
    'has_archive' => false,
    'show_ui' => true,
    'show_in_menu' => true
  );
  register_post_type('location', $args);
}
add_action('init', 'ashman_location_post_type');

/**
 * Meet Runner post type
 */

function ashman_runner_post_type() {
  $labels = array(
    'name' => _x('Meet Runners', 'post type general name'),
    'singular_name' => _x('Meet Runner', 'post type singular name'),
    'add_new' => _x('Add New', 'book'),
    'add_new_item' => __('Add New Meet Runner'),
    'edit_item' => __('Edit Meet Runner'),
    'new_item' => __('New Meet Runner'),
    'all_items' => __('All Meet Runners'),
    'view_item' => __('View Meet Runner'),
    'search_items' => __('Search Meet Runners'),
    'not_found' => __('No meet runners found'),
    'not_found_in_trash' => __('No meet runners found in the trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Meet Runners'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Contains ifnroamtion about meet runners.',
    'public' => false,
    'menu_position' => 7,
    'supports' => array('title', 'editor', 'custom-fields'),
    'has_archive' => false,
    'show_ui' => true,
    'show_in_menu' => true
  );
  register_post_type('meet_runner', $args);
}
add_action('init', 'ashman_runner_post_type');

/**
 * Meet category list
 */

function ashman_meet_category($post_id, $format = 'name') {
  $categories = get_the_category($post_id);
  $output = array();
  foreach($categories as $category) {
    switch($format) {
      case 'name': 
        $output[] = $category->name;
        break;
      case 'slug':
        $output[] = $category->slug;
        break;
    }
  }
  return $output;
}

/**
 * Meet start/end time
 */

function ashman_meet_dates($start, $end) {
  $output = '<time class="dtstart" datetime="'.date("c", $start).'">'.date("jS F Y, h:ia", $start).'</time>&ndash;';
  if(date("Ymd", $start) === date("Ymd", $end)) {
    $output .= '<time class="dtend" datetime="'.date("c", $end).'">'.date("h:ia", $end).'</time>';
  }
  else {
    $output .= '<time class="dtend" datetime="'.date("c", $end).'">'.date("jS F Y, h:ia", $end).'</time>';
  }
  return $output;
}

/**
 * Meet location
 */

function ashman_meet_location($id, $format = 'address') {
  $name = get_the_title($id[0]);
  $data = get_field("location_address", $id[0]);
  switch($format) {
    case 'address':
      $output = $name . ', ' . $data['address'];
      break;
    case 'latitude':
      $output = $data['lat']; 
      break;
    case 'longitude':
      $output = $data['lng'];
      break;
    case 'latlng':
      $output = $data['lat'] . ',' . $data['lng'];
      break;
  }
  return $output;
}

/**
 * Profile bios
 */

function ashman_profile_biography($id) {
  $content_post = get_post($id);
  $content = $content_post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Profile avatars
 */

function ashman_profile_avatar($id) {
  if($url = get_field("runner_avatar", $id)) {
    return $url;
  }
  else {
    return "http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96";
  }
}

/**
 * News post type
 */

function ashman_news_post_type() {
  $labels = array(
    'name' => _x('News', 'post type general name'),
    'singular_name' => _x('News', 'post type singular name'),
    'add_new' => _x('Add New', 'book'),
    'add_new_item' => __('Add News'),
    'edit_item' => __('Edit News'),
    'new_item' => __('New News'),
    'all_items' => __('All News'),
    'view_item' => __('View News'),
    'search_items' => __('Search News'),
    'not_found' => __('No posts found'),
    'not_found_in_trash' => __('No posts found in the trash'),
    'parent_item_colon' => '',
    'menu_name' => 'News'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Newsy bloggy thing.',
    'public' => true,
    'menu_position' => 7,
    'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
    'has_archive' => true
  );
  register_post_type('news', $args);
}
add_action('init', 'ashman_news_post_type');