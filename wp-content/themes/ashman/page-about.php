<?php
  /*
  Template Name: About - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>
        <div class="row">
          <article class="post post--wide">
            <header class="post__header">
              <h1 class="post__title"><?php the_title(); ?></h1>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
          </article>
        </div>
<?php
    endwhile;
  endif; 
?>

        <hr>

        <div class="row">
          <div class="about-blurb">
            <h2>Meets</h2>
            <p class="lede">We have all sorts of meets going on! </p>
          </div>
        </div>
        <div class="row">
          <div class="about-meets">
<?php
    $categories = get_categories();
    $break = ceil((count($categories)+1)/2); 
    $i = 0;
    foreach($categories as $category) {
      if($i == $break) {
        echo '</div><div class="about-meets">';
      }
      echo '<h4>' . $category->name . '</h4>';
      echo '<p>' . $category->description . '</p>';
      $i++;
    }
?>
          </div>
          <div class="about-meets">
            <p>
              <img src="/wp-content/uploads/2014/03/bb-button-img-300x300.jpg" class="bb-badge" alt="Bristol Bronies buttons, oh yeah!">
              Oh, and you get a free Bristol Bronies button badge when you attend your first meet! Awesome!
            </p>
          </div>
        </div>

        <hr>

<?php 
  $posts = query_posts('post_type=meet_runner&posts_per_page=-1&orderby=title&order=ASC');
  if(have_posts()) :
?>

        <div class="row">
          <div class="about-blurb">
            <h2>Staff</h2>
            <p class="lede">The people who make the magic happen.</p>
          </div>
        </div>

        <div class="media-grid">
<?php 
    while(have_posts()) : the_post();
      if(get_field("runner_staff") == true) : 
?>
          <div class="media-grid__item media-grid__item--staff">
            <div class="profile postcard">
              <div class="profile__avatar">
                <img src="<?php echo ashman_profile_avatar(get_the_ID()); ?>" alt="">
              </div>
              <div class="profile__biography postcard__data">
                <h1 class="profile__captain"><?php echo get_the_title(); ?></h1>
                <p><?php echo ashman_profile_biography(get_the_ID()); ?></p>
              </div>
              <div class="profile__social-links">
                <ul>
                  <?php if(ashman_custom_field("runner_twitter")) { ?><li><a href="http://twitter.com/<?php echo ashman_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li><?php } ?>
                  <?php if(ashman_custom_field("runner_facebook")) { ?><li><a href="http://facebook.com/<?php echo ashman_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li><?php } ?>
                </ul>
              </div>
            </div>
          </div>
<?php
      endif; 
    endwhile;
?>
        </div>
<?php
  endif; 
  wp_reset_query();
?>

<!-- page-about.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>