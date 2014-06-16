<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="jumbotron" style="background-image: url('//placeponi.es/1280/720')">
            <div class="jumbotron__inner">
              <div class="jumbotron__caption">
                <h1 class="jumbotron__title">Meets</h1>
                <p>Meets, socials, festivals, birthdays, movies. We have them all.</p>
              </div>
            </div>
          </div>
        </div>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
?>

        <?php
          if(has_post_thumbnail()):
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
          endif;
        ?>

        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__item"><i class="fa fa-fw fa-pencil"></i> Written by <?php echo get_the_author(); ?> on <time datetime="<?php echo get_the_date("c"); ?>"><?php echo get_the_date("jS F Y, g:ia"); ?></time></li>
              </ul>
            </header>
            <div class="post__body">
              <?php
                if(has_post_thumbnail()):
                  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
              ?>
              <p><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>"></p>
              <?php 
                endif; 
              ?>
              <?php the_content(); ?>
            </div>
          </article>
        </div>
<?php
    endwhile;
  endif; 
?>

<!-- single-news.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>