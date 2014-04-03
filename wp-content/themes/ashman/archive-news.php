<?php
  /* 
  Template Name: News - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="post post--wide">
            <header class="post__header">
              <h1 class="post__title">Bristol Bronies News</h1>
            </header>
            <div class="post__body">
              <p>Your one-stop-shop for all the developments in the Bristol Bronies meet-verse.</p>
            </div>
          </div>
        </div>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
?>
        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-pencil-square-o fa-fw"></i> Posted on <time datetime="<?php echo get_the_date("c"); ?>"><?php echo get_the_date("jS F Y, H:ia"); ?></time></li>
                <li class="post__meta__author"><i class="fa fa-user fa-fw"></i> Written by <?php echo get_the_author(); ?></li>
              </ul>
            </header>
            <div class="post__body">
              <?php the_excerpt(); ?>
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