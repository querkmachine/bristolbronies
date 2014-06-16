<?php
  /* 
  Template Name: News - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="jumbotron jumbotron--large" style="background-image: url('//placeponi.es/1280/720')">
            <div class="jumbotron__inner">
              <div class="jumbotron__caption">
                <h1 class="jumbotron__title">News</h1>
                <p>Your one-stop-shop for all the developments in the Bristol Bronies meet-verse.</p>
              </div>
            </div>
          </div>
        </div>

<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 
?>
        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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

        <div class="row">
          <div class="pagination">
            <?php 
              $big = 9999999;
              echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_next' => false,
                'type' => 'list',
                'end_size' => 0,
                'mid_size' => 100
              ));
            ?>
          </div>
        </div>

<!-- archive-news.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>