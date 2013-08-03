<?php
/*
  Template Name: Community Home
*/
?><?php get_template_part('parts/global/header'); ?>

  <main class="media-container" id="main" role="main">

    <?php query_posts('post_type=community'); ?>
    <div class="media-grid">
      <?php while ( have_posts() ) : the_post(); ?>

        <?php if(in_array("youtube_id", get_post_custom_keys(get_the_ID()))) { ?>

          <?php /*
          <figure class="media video">
            <div class="media-title">
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <div class="media-item">
              <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), 'youtube_id', true); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
          </figure>
          */ ?>

          <figure class="media video">
            <div class="media-item">
              <a href="<?php the_permalink(); ?>">
                <img class="lazy" src="//i1.ytimg.com/vi/<?php echo get_post_meta(get_the_ID(), 'youtube_id', true); ?>/2.jpg" data-src="//i1.ytimg.com/vi/<?php echo get_post_meta(get_the_ID(), 'youtube_id', true); ?>/0.jpg" alt="">
              </a>
            </div>
          </figure>

        <?php } else { // format check ?>

          <?php
            if ( has_post_thumbnail() ) {
            $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
          ?>
          <figure class="media photo">
            <div class="media-item">
              <a href="<?php the_permalink(); ?>">
                <img class="lazy" src="<?php echo $thumbnail_url[0]; ?>" data-src="<?php echo $thumbnail_url[0]; ?>" alt="">
              </a>
            </div>
          </figure>
          <?php } ?>

        <?php } // format check ?>

      <?php endwhile; ?>
    </div>
  </main>
  
<?php get_template_part('parts/global/footer'); ?> 