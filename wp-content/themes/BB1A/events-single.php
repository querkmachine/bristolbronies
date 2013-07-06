<?php
/*
  Template Name: Events Single
*/
?><?php get_template_part('parts/global/header'); ?>

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

      <?php the_content(); ?>

      <?php 
        $event_meta = em_get_event(get_the_ID(), 'post_id');
        $location_meta = em_get_location($event_meta->location_id);
      ?>

      <?php if($event_meta->end > time()) { ?>
      <aside class="post-card post-event-weather" id="ajax-forecast"></aside>
      <script>
        $(document).ready(function() {
          $.get('/forecast?lat=<?php echo $location_meta->latitude; ?>&lng=<?php echo $location_meta->longitude; ?>&start=<?php echo $event_meta->start; ?>', function(data) {
            $('#ajax-forecast').html(data);
            console.log("Forecast loading...")
          }).done(function() { console.log("Forecast loaded."); 
          }).fail(function() { console.log("Forecast failed."); 
          });
        });
      </script>
      <?php } ?>

    </article>
  </main>

<?php endwhile; ?>

<?php get_template_part('parts/global/footer'); ?>