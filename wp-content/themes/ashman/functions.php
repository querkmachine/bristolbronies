<?php

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
 * Get custom fields 
 */

function ashman_custom_field($field_name) {
  if(strlen(get_field($field_name)) > 0) {
    return get_field($field_name);
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
    'view_item' => __('View Meets'),
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
 * Meet category list
 */

function ashman_meet_category($post_id, $output = 'name') {
  $categories = get_the_category($post_id);
  $output = array();
  foreach($categories as $category) {
    switch($output) {
      case 'name': 
      default: 
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
  $output = '<time class="dtstart" datetime="'.date("c", $start).'">'.date("dS F Y, h:ia", $start).'</time>&ndash;';
  if(date("Ymd", $start) === date("Ymd", $end)) {
    $output .= '<time class="dtend" datetime="'.date("c", $end).'">'.date("h:ia", $end).'</time>';
  }
  else {
    $output .= '<time class="dtend" datetime="'.date("c", $end).'">'.date("dS F Y, h:ia", $end).'</time>';
  }
  return $output;
}