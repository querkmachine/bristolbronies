<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
?>

        <?php
          if(has_post_thumbnail()):
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
          else:
            $image_url[0] = "//placeponi.es/1280/720";
          endif;
        ?>
        <div class="row">
          <div class="jumbotron" style="background-image: url('<?php echo $image_url[0]; ?>')">
            <div class="jumbotron__inner">
              <div class="jumbotron__caption">
                <h1 class="jumbotron__title">Meets</h1>
                <p>Meets, socials, festivals, birthdays, movies. We have them all.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <article class="post post--special vevent">
            <header class="post__header">
              <ul class="post__meta">
                <li class="post__meta__category">
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
              <h1 class="post__title summary"><?php the_title(); ?></h1>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time')); ?></li>
                <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo bb_meet_location(get_field('meet_location')); ?></li>
              </ul>
            </header>
            <div class="post__body">
              <?php 
                if(strlen(get_the_content()) > 0): 
                  the_content(); 
                else: 
                  echo '<p><em>No meet plans announced.</em></p>'; 
                endif; 
              ?>
            </div>
            <div class="post__sidebar">
              <?php if(bb_custom_field('meet_end_time') > time()): ?>
              <aside class="forecast js-forecast postcard" 
                data-latitude="<?php echo bb_meet_location(get_field('meet_location'), "latitude"); ?>" 
                data-longitude="<?php echo bb_meet_location(get_field('meet_location'), "longitude"); ?>" 
                data-timestamp="<?php echo date("U", bb_custom_field('meet_start_time')); ?>">
                <div class="forecast__icon js-forecast__icon postcard__title"></div>
                <div class="forecast__data postcard__data">
                  <p>
                    <span class="js-forecast__summary">Loading...</span><br>
                    <strong>High:</strong> <span class="js-forecast__temp-high">0</span>&deg;C &emsp; <strong>Low:</strong> <span class="js-forecast__temp-low">0</span>&deg;C
                  </p>
                </div>
              </aside>
              <?php endif; ?>
              <?php 
                $runners = get_field('meet_runner');
                foreach($runners as $runner):
              ?>
              <aside class="profile postcard">
                <header class="profile__header">
                  <div class="profile__media">
                    <div class="profile__banner"><?php // <img src="//placeponi.es/550/200" alt=""> ?> </div>
                    <img class="profile__avatar" src="<?php echo bb_profile_avatar($runner); ?>" alt="<?php echo get_the_title($runner); ?>">
                  </div>
                  <h1 class="profile__captain"><small>Meet runner</small> <?php echo get_the_title($runner); ?></h1>
                  <ul class="profile__social-links">
                    <?php if(bb_custom_field("runner_twitter", $runner)): ?><li><a href="http://twitter.com/<?php echo bb_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-fw fa-twitter"></i> <span class="hidden">Twitter</span></a></li><?php endif; ?>
                    <?php if(bb_custom_field("runner_facebook", $runner)): ?><li><a href="http://facebook.com/<?php echo bb_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-fw fa-facebook"></i> <span class="hidden">Facebook</span></a></li><?php endif; ?>
                  </ul>
                </header>
                <div class="profile__biography postcard__data">
                  <p><?php echo bb_profile_biography($runner); ?></p>
                </div>
              </aside>
              <?php 
                endforeach;
              ?>
              <?php 
                if(get_the_date('U') <= strtotime("2014-03-31")):
              ?>
              <aside class="alert">
                <i class="fa fa-warning fa-2x"></i>
                <p>This page was created in a previous version of the <?php bloginfo('name'); ?> site. Images and styling may not appear as originally intended.</p>
              </aside>
              <?php
                endif;
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