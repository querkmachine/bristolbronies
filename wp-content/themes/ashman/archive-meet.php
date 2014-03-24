<?php
  /* 
  Template Name: Meets - Home
  */
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
              <h2 class="post__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
                <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> Location</li>
              </ul>
            </header>
            <?php if(in_array("meet", ashman_meet_category(get_the_ID(), "slug"))) { ?>
            <div class="post__body">
              <?php the_excerpt(); ?>
            </div>
            <?php } ?>
          </article>
        </div>
<?php
    endwhile;
  endif; 
?>

<!-- archive-meet.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>