<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
      $home_blurb = get_the_content();
    endwhile;
  endif; 
?>

<?php
  $meet = new WP_Query('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=ASC&posts_per_page=-1');
  if($meet->have_posts()): 
    $found = false;
    while($meet->have_posts()): $meet->the_post();
      if(!$found && bb_custom_field("meet_end_time") > time()):
        $found = true;
        if(in_array("meet", bb_meet_category(get_the_ID(), "slug")) || in_array("special", bb_meet_category(get_the_ID(), "slug"))):
          $special = true;
        else:
          $special = false;
        endif;
        if(has_post_thumbnail()): 
          $image_id = get_post_thumbnail_id(); 
          $image_url = wp_get_attachment_image_src($image_id, 'full');
        elseif(strlen($custom_image_url = get_theme_mod('bb_homepage_banner_image')) > 0): 
          $image_url[0] = $custom_image_url;
        else: 
          $image_url[0] = "/wp-content/themes/".BB_VERSION."/assets/img/banner/banner-1.jpg";
        endif;
?>
        <div class="row row--fullwidth">
          <div class="cover" style="background-image: url('<?php echo $image_url[0]; ?>');">
            <figcaption class="cover__caption">
              <h4 class="cover__title"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h4>
              <p><strong><?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></strong></p>
              <?php the_excerpt(); ?>
            </figcaption>
          </div>
        </div>
        <!--<div class="row">
          <div class="__home__next-meet">
            <article class="meet <?php if($special): ?>meet--special <?php endif; ?>vevent">
              <header class="meet__header">
                <ul class="meet__meta">
                  <li class="meet__meta__category">
                    <strong>Next meet:</strong> 
                    <?php 
                      $categories = bb_meet_category(get_the_ID());
                      for($i = 0; $i < count($categories); $i++):
                        echo $categories[$i];
                        if(!empty($categories[$i+1])): 
                          echo " / ";
                        endif;
                      endfor; 
                    ?>
                  </li>
                </ul>
                <h1 class="meet__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h1>
                <ul class="meet__meta">
                  <li class="meet__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></li>
                <?php if($special): ?>
                  <li class="meet__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo bb_meet_location(get_field('meet_location')); ?></li>
                <?php endif; ?>
                </ul>
              </header>
              <?php if($special): ?>
              <div class="meet__body">
                <?php the_excerpt(); ?>
              </div>
              <?php endif; ?>
            </article>
          </div>
        </div>-->
<?php
      endif;
    endwhile;
    if(!$found):
      if(strlen($custom_image_url = get_theme_mod('bb_homepage_banner_image')) > 0): 
        $image_url[0] = $custom_image_url;
      else: 
        $image_url[0] = "/wp-content/themes/".BB_VERSION."/assets/img/banner/banner-1.jpg";
      endif;
?>
        <div class="row row--fullwidth">
          <div class="cover" style="background-image: url('<?php echo $image_url[0]; ?>');">
            <div class="cover__caption">
              <p><?php echo $home_blurb; ?></p>
            </div>
          </div>
        </div>
<?php
    endif;
  endif;
  wp_reset_postdata();
?>

        <div class="row row--fullwidth">
<?php 
  get_template_part('parts/global/billboards');

?>
        </div>

<!-- page-home.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>