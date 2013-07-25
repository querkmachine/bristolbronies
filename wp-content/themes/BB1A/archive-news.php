<?php
/*
  Template Name: Flugelhorn Home
*/
?><?php get_template_part('parts/global/header'); ?>

  <main class="container" id="main" role="main">

    <?php query_posts('post_type=news'); ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <article class="post">
        <header class="post-header">
          <div class="post-leader">
            <time datetime="<?php the_time('c'); ?>"><?php the_time(get_option('date_format')); ?></time>
          </div>
          <h1 class="post-title">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
        </header>
      </article>

    <?php endwhile; ?>

  </main>

<?php get_template_part('parts/global/footer'); ?> 