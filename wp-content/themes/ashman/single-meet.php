<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>

        <?php
          if(has_post_thumbnail()) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
        ?>
        <div class="hero-image" style="background-image: url('<?php echo $large_image_url[0]; ?>')"></div>
        <?php 
          } 
        ?>
        <div class="row">
          <article class="post vevent">
            <header class="post__header">
              <ul class="post__meta">
                <li class="post__meta__category">
                  <?php 
                    $categories = ashman_meet_category(get_the_ID());
                    for($i = 0; $i < count($categories); $i++) {
                      echo $categories[$i];
                      if(!empty($categories[$i+1])) { echo " / "; }
                    } 
                  ?>
                </li>
              </ul>
              <h2 class="post__title summary"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
                <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo ashman_meet_location(get_field('meet_location')); ?></li>
              </ul>
            </header>
            <div class="post__body">
              <?php if(strlen(get_the_content()) > 0) { the_content(); } else { echo '<p><em>No meet plans announced.</em></p>'; } ?>
            </div>
            <div class="post__sidebar">
              <?php 
                $runners = get_field('meet_runner');
                foreach($runners as $runner) {
              ?>
              <aside class="profile postcard">
                <div class="profile__avatar">
                  <img src="<?php echo ashman_profile_avatar($runner); ?>" alt="">
                </div>
                <div class="profile__biography postcard__data">
                  <h1 class="profile__captain"><small>Meet Runner</small> <?php echo get_the_title($runner); ?></h1>
                  <p><?php echo ashman_profile_biography($runner); ?></p>
                </div>
                <div class="profile__social-links">
                  <ul>
                    <?php if(ashman_custom_field("runner_twitter", $runner)) { ?><li><a href="http://twitter.com/<?php echo ashman_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li><?php } ?>
                    <?php if(ashman_custom_field("runner_facebook", $runner)) { ?><li><a href="http://facebook.com/<?php echo ashman_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li><?php } ?>
                  </ul>
                </div>
              </aside>
              <?php 
                } 
              ?>
              <?php 
                if(get_the_date('U') <= strtotime("2014-03-25")) { 
              ?>
              <aside class="alert">
                <i class="fa fa-warning fa-2x"></i>
                <p>This page was created in a previous version of the <?php bloginfo('name'); ?> site. Images and styling may not appear as originally intended.</p>
              </aside>
              <?php
                }
              ?>
            </div>
          </article>
        </div>
<?php
    endwhile;
  endif; 
?>

<!-- single-meet.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>