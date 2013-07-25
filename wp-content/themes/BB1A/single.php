<?php get_template_part('parts/global/header'); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <?php
    if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
  ?>
    <div class="feature-image" style="background-image: url('<?php echo $large_image_url[0]; ?>')">
    </div>
  <?php } ?>

  <main class="container" id="main" role="main">

      <article class="post">
        <header class="post-header">
          <div class="post-leader">
            <time datetime="<?php the_time('c'); ?>"><?php the_time(get_option('date_format')); ?></time>
          </div>
          <h1 class="post-title">
            <?php the_title(); ?>
          </h1>
        </header>
        <div class="post-body">
          <?php the_content(); ?>
        </div>
      </article>

  </main>

<?php endwhile; ?>

<?php get_template_part('parts/global/footer'); ?>