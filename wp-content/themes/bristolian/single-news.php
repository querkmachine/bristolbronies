<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
  require(locate_template('parts/news/masthead.php'));
?>

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
                <?php if(have_comments() || comments_open()): ?><li class="post__meta__item"><i class="fa fa-fw fa-comments"></i> <a href="#comments"><?php printf( _n( '1 comment', '%1$s comments', get_comments_number() ), number_format_i18n( get_comments_number() ) ); ?></a></li><?php endif; ?>
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
        <div class="row">
          <?php comments_template(); ?>
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