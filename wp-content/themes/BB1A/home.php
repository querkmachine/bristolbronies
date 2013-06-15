<?php
/*
  Template Name: Homepage
*/
?><?php get_template_part('parts/global/header'); ?>

  <main class="container" id="main" role="main">
    <?php 
      echo EM_Events::output(array(
        'limit' => 1
      ));
    ?>
  </main>

<?php get_template_part('parts/global/footer'); ?>