<?php
  /*
  Template Name: Page (landing)
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
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


        <div class="row">
<?php 
  $posts = query_posts(array('post_parent' => $post->ID, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC'));
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>
          <div class="billboard-list">
            <figure class="billboard">
              <a href="<?php the_permalink(); ?>">
                <?php
                  if(has_post_thumbnail()) {
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                ?>
                <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>">
                <?php 
                  } 
                ?>
              </a>
              <figcaption class="billboard__caption">
                <h4 class="billboard__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><?php the_excerpt(); ?></p>
              </figcaption>
            </figure>
          </div>
<?php
    endwhile;
  endif; 
?>
        </div>

<!-- landing.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>