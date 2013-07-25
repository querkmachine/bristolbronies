<?php
/*
  Template Name: Meets Home
*/
?><?php get_template_part('parts/global/header'); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <main class="container" id="main" role="main">

    <section class="meets-section meets-section-upcoming">
      <header class="meets-section-header">
        <h1>Upcoming meets</h1>
      </header>
      <?php echo EM_Events::output(); ?>
    </section>

    <section class="meets-section meets-section-past">
      <header class="meets-section-header">
        <h1>Past meets</h1>
      </header>
      <?php echo EM_Events::output(array(
        'scope' => 'past',
        'orderby' => 'event_start_date',
        'order' => 'DESC'
      )); ?>
    </section>

  </main>

<?php endwhile; ?>

<?php get_template_part('parts/global/footer'); ?>