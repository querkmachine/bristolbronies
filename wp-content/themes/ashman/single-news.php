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
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
              </ul>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
            <div class="post__sidebar">
              <?php 
                if(get_the_date('U') <= strtotime("2014-03-31")) { 
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

<!-- single-news.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>