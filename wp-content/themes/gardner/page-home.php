<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
      $home_blurb = get_the_content();
    endwhile;
  endif; 
?>

<?php
  $meet = new WP_Query('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=ASC&posts_per_page=-1');
  if($meet->have_posts()) : 
    $found = false;
    while($meet->have_posts()) : $meet->the_post();
      if(!$found && bb_custom_field("meet_end_time") > time()) :
        $found = true;
        if(in_array("meet", bb_meet_category(get_the_ID(), "slug")) || in_array("special", bb_meet_category(get_the_ID(), "slug"))) {
          $special = true;
        }
        else {
          $special = false;
        }
        if(has_post_thumbnail()) { 
          $image_id = get_post_thumbnail_id(); 
          $image_url = wp_get_attachment_image_src($image_id, 'full');
        }
        else { 
          $image_url[0] = "/wp-content/themes/".BB_VERSION."/assets/img/banner/banner-1.jpg";
          // $image_array = array(300, 293, 278, 269); 
          // $image_id = rand(0, (count($image_array)-1));
          // $image_id = $image_array[$image_id]; 
        }
?>
        <div class="homepage-image" style="background-image: url('<?php echo $image_url[0]; ?>');">
          <div class="row">
            <div class="home-blurb">
              <p><?php echo $home_blurb; ?></p>
            </div>
          </div>
        </div>
        <div class="next-meet">
          <div class="row row--skinny">
            <article class="post vevent">
              <header class="post__header">
                <ul class="post__meta">
                  <li class="post__meta__category">
                    <strong>Next meet:</strong> 
                    <?php 
                      $categories = bb_meet_category(get_the_ID());
                      for($i = 0; $i < count($categories); $i++) {
                        echo $categories[$i];
                        if(!empty($categories[$i+1])) { echo " / "; }
                      } 
                    ?>
                  </li>
                </ul>
                <?php if($special) { ?>
                <h2 class="post__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h2>
                <ul class="post__meta">
                  <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></li>
                  <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo bb_meet_location(get_field('meet_location')); ?></li>
                </ul>
                <?php } else { ?>
                <h3 class="post__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h3>
                <ul class="post__meta">
                  <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></li>
                </ul>
                <?php } ?>
              </header>
              <?php if($special) { ?>
              <div class="post__body">
                <?php the_excerpt(); ?>
              </div>
              <?php } ?>
            </article>
          </div>
        </div>
<?php
      endif;
    endwhile;
    if(!$found) { 
      $image_url[0] = "/wp-content/themes/".BB_VERSION."/assets/img/banner/banner-1.jpg";
?>
        <div class="homepage-image" style="background-image: url('<?php echo $image_url[0]; ?>');">
          <div class="row">
            <div class="home-blurb">
              <p><?php echo $home_blurb; ?></p>
            </div>
          </div>
        </div>
<?php
    }
  endif;
  wp_reset_postdata();
?>

        <div class="row">
<?php 
  get_template_part('parts/global/billboards');

?>
        </div>

<!-- page-home.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>