<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>
        <div class="row">
          <article class="post vevent">
            <header class="post__header">
              <ul class="post__meta">
                <li class="post__meta__category"><?php foreach(ashman_meet_category(get_the_ID()) as $category) { echo $category; } ?></li>
              </ul>
              <h2 class="post__title summary"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
                <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo ashman_meet_location(get_field('meet_location')); ?></li>
              </ul>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
            <div class="post__sidebar">
              <aside class="profile postcard">
                <div class="profile__avatar">
                  <?php echo get_avatar(get_the_author_meta('ID')); ?>
                </div>
                <div class="profile__biography postcard__data">
                  <h1 class="profile__captain"><small>Meet Runner</small> <?php echo get_the_author_meta('display_name'); ?></h1>
                  <p><?php echo get_the_author_meta('description'); ?></p>
                </div>
                <div class="profile__social-links">
                  <ul>
                    <li><a href="#"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li>
                    <li><a href="#"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li>
                    <li><a href="#"><i class="fa fa-google-plus fa-fw"></i> <span class="hidden">Google+</span></a></li>
                  </ul>
                </div>
              </aside>
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