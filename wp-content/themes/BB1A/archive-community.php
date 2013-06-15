<?php
/*
  Template Name: Community Home
*/
?><?php get_template_part('parts/global/header'); ?>

  <main class="container" id="main" role="main">

    <?php query_posts('post_type=community'); ?>
    <div class="media-grid">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          if ( has_post_thumbnail() ) {
          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), array(420,10000));
        ?>
        <figure class="media photo">
          <div class="media-item">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo $image_url[0]; ?>" alt="">
            </a>
          </div>
        </figure>
        <?php } ?>
      <?php endwhile; ?>
    </div>
  </main>

<?php get_template_part('parts/global/footer'); ?> 