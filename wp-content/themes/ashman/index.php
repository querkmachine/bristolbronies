<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
<?php
    endwhile;
  endif; 
?>

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>