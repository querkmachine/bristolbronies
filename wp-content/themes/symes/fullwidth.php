<?php
  /*
  Template Name: Page (full width)
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
?>
        <div class="row">
          <article class="post post--wide">
            <header class="post__header">
              <h1 class="post__title"><?php the_title(); ?></h1>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
          </article>
        </div>
<?php
    endwhile;
  endif; 
?>

<!-- fullwidth.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>