<?php
  /* 
  Template Name: Meets - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="meets-blurb">
            <h1>Meets</h1>
            <p class="lede">Meets, socials, special events, movies. We have them all.</p>
          </div>
        </div>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
      if(in_array("meet", ashman_meet_category(get_the_ID(), "slug")) || in_array("special", ashman_meet_category(get_the_ID(), "slug"))) {
        $special = true;
      }
      else {
        $special = false;
      }
?>
        <?php
          if($special && has_post_thumbnail()) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
        ?>
        <div class="hero-image" style="background-image: url('<?php echo $large_image_url[0]; ?>')"></div>
        <?php 
          } 
        ?>
        <div class="row">
          <article class="post vevent<?php if(ashman_custom_field('meet_start_time') < time()) { echo " post--past"; } ?>">
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
              <?php if($special) { ?>
              <h2 class="post__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
                <li class="post__meta__location"><i class="fa fa-map-marker fa-fw"></i> <?php echo ashman_meet_location(get_field('meet_location')); ?></li>
              </ul>
              <?php } else { ?>
              <h3 class="post__title summary"><a href="<?php the_permalink(); ?>" class="url"><?php the_title(); ?></a></h3>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-calendar fa-fw"></i> <?php echo ashman_meet_dates(ashman_custom_field('meet_start_time'), ashman_custom_field('meet_end_time')); ?></li>
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
<?php
    endwhile;
  endif; 
?>

        <div class="row">
          <div class="pagination">
            <?php 
              $big = 9999999;
              echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_next' => false,
                'type' => 'list',
                'end_size' => 0,
                'mid_size' => 100
              ));
            ?>
          </div>
        </div>

<!-- archive-meet.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>