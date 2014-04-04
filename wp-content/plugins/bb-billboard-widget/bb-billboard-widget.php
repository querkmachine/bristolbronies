<?php
/*
Plugin Name: Bristol Bronies Billboards Sidebar Widget
Plugin URI: http://bristolbronies.co.uk/
Description: Show billboard posts in sidebars.
Author: Grey Hargreaves
Author URI: http://greysadventures.com/
Version: 1.0
*/

class bb_billboard_widget extends WP_Widget {
  
  function __construct() {
    parent::__construct(
      'bb_billboard_widget',
      'Bristol Bronies Billboards',
      array(
        'description' => 'Displays billboards as a sidebar widget'
      )
    );
  }

  public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
    echo $args['before_widget'];
    if(!empty($title)) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
    $posts = query_posts('post_type=billboard&orderby=date&order=DESC&posts_per_page=' . $instance['count']);
    if(have_posts()) :
      while(have_posts()) : the_post(); 
?>
          <figure class="billboard">
            <?php
              $image_url = get_field("billboard_image"); 
            ?>
            <a href="<?php echo get_field("billboard_url"); ?>">
              <img src="<?php echo $image_url['url']; ?>" alt="<?php the_title(); ?>">
            </a>
            <figcaption class="billboard__caption">
              <h4 class="billboard__title"><a href="<?php echo get_field("billboard_url"); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
            </figcaption>
          </figure>
<?php
      endwhile;
    endif; 
    wp_reset_query(); 
    echo $args['after_widget'];
  }

  public function form($instance) {
    $title = (isset($instance['title'])) ? $instance['title'] : '';
    echo '<p><label for="' . $this->get_field_id('title') . '">Title:</label><input type="text" class="widefat" id="' . $this->get_field_name('title') . '" name="' . $this->get_field_name('title') . '" value="' . esc_attr($title) . '"></p>';
    echo '<p><label for="' . $this->get_field_id('count') . '">Number of billboards:</label><input type="num" id="' . $this->get_field_name('count') . '" name="' . $this->get_field_name('count') . '" value="' . esc_attr($instance['count']) . '" size="3"></p>';
  }

  public function update($new_instance, $old_instance) {
    $instance = array(); 
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['count'] = (!empty($new_instance['count'])) ? strip_tags($new_instance['count']) : '';
    return $instance; 
  }

}

function bb_load_billboard_widget() {
  register_widget('bb_billboard_widget');
}
add_action('widgets_init', 'bb_load_billboard_widget');