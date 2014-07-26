<?php
  /*
  Template Name: About - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
?>
        <div class="row">
          <div class="post post--wide">
            <header class="post__header">
              <h1 class="post__title"><?php the_title(); ?></h1>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
<?php
    endwhile;
  endif; 
?>

        <hr>

        <div class="row">
          <div class="post post--wide">
            <header class="post__header">
              <h2 class="post__title">Meets</h2>
            </header>
            <div class="post__body">
              <p>We have all sorts of meets going on!</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="about-meets">
            <div class="about-meets__item">
<?php
    $categories = get_categories();
    $break = ceil((count($categories)+1)/2); 
    $i = 0;
    foreach($categories as $category):
      if($i == $break):
        echo '</div><div class="about-meets__item">';
      endif;
      echo '<h4>' . $category->name . '</h4>';
      echo '<p>' . $category->description . '</p>';
      $i++;
    endforeach;
?>
            </div>
            <div class="about-meets__item">
              <p>
                <img src="/wp-content/uploads/2014/03/bb-button-img-300x300.jpg" class="bb-badge" alt="Bristol Bronies buttons, oh yeah!">
                Oh, and you get a free Bristol Bronies button badge when you attend your first meet! Awesome!
              </p>
            </div>
          </div>
        </div>

        <hr>

<?php 
  $staff = new WP_Query('post_type=meet_runner&posts_per_page=-1&orderby=title&order=ASC');
  if($staff->have_posts()):
?>

        <div class="row">
          <div class="post post--wide">
            <header class="post__header">
              <h2 class="post__title">Staff</h2>
            </header>
            <div class="post__body">
              <p>The people who make the magic happen.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="profile-grid">
            <?php 
              while($staff->have_posts()): $staff->the_post();
                if(get_field("runner_staff") == true): 
            ?>
            <div class="profile-grid__item">
              <article class="profile postcard">
                <header class="profile__header">
                  <div class="profile__media">
                    <div class="profile__banner"<?php if($banner = bb_profile_banner($runner)): ?> style="background-image: url('<?php echo $banner; ?>');"<?php endif; ?>></div>
                    <img class="profile__avatar" src="<?php echo bb_profile_avatar($runner); ?>" alt="<?php echo get_the_title($runner); ?>">
                  </div>
                  <h1 class="profile__captain"> <?php echo get_the_title($runner); ?></h1>
                  <ul class="profile__social-links">
                    <?php if(bb_custom_field("runner_twitter", $runner)): ?><li><a href="http://twitter.com/<?php echo bb_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-fw fa-twitter"></i> <span class="hidden">Twitter</span></a></li><?php endif; ?>
                    <?php if(bb_custom_field("runner_facebook", $runner)): ?><li><a href="http://facebook.com/<?php echo bb_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-fw fa-facebook"></i> <span class="hidden">Facebook</span></a></li><?php endif; ?>
                  </ul>
                </header>
                <div class="profile__biography postcard__data">
                  <p><?php echo bb_profile_biography($runner); ?></p>
                </div>
              </article>
            </div>
            <?php 
                endif;
              endwhile;
            ?>
          </div>
        </div>
<?php
  endif; 
  wp_reset_postdata();
?>

<!-- page-about.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>