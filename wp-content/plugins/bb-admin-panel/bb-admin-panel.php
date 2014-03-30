<?php
/*
Plugin Name: Bristol Bronies Ashman WordPress Administration Panel
Plugin URI: http://bristolbronies.co.uk/
Description: WP admin panel tweaks for the Bristol Bronies website.
Author: Grey Hargreaves
Author URI: http://greysadventures.com/
Version: 1.0
*/

/* Custom admin panel CSS */
function ashman_admin_theme_style() {
  wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'ashman_admin_theme_style');
add_action('login_enqueue_scripts', 'ashman_admin_theme_style');

/* Add meet dashboard widget */
function ashman_meet_dashboard_widget() {
  wp_add_dashboard_widget(
    'ashman_upcoming_meets',
    'Upcoming Bristol Bronies Meets',
    'ashman_meet_dashboard_widget_content'
  );
}

add_action('wp_dashboard_setup', 'ashman_meet_dashboard_widget');

function ashman_meet_dashboard_widget_content() {
  $posts=query_posts('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=ASC&posts_per_page=-1');
  if(have_posts()) :
    $output = '<ul>';
    while(have_posts()) : the_post(); 
      if(get_field("meet_end_time", get_the_ID()) > time()) { 
        $output .= '<li>'; 
        $output .= '<h4><a href="/wp-admin/post.php?post=' . get_the_ID() . '&action=edit">' . get_the_title() . '</a></h4>';
        $output .= '<small>' . ashman_meet_dates(get_field("meet_start_time", get_the_ID()), get_field("meet_end_time", get_the_ID())) . '</small>';
        $output .= '</li>';
      }
    endwhile;
    $output .= '</ul>';
  endif;
  echo $output;
}

/* Remove unused dashboard widgets */
function ashman_remove_dashboard_widgets() {
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

add_action('wp_dashboard_setup', 'ashman_remove_dashboard_widgets');