<?php
  /* 
  Template Name: Community - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="post post--wide">
            <header class="post__header">
              <h1 class="post__title">Community</h1>
            </header>
            <div class="post__body">
              <p>We've got lots of opportunity in this very community!</p>
            </div>
          </div>
        </div>

        <div class="media-grid">
<?php 
  $posts = new WP_Query($query_string . '&posts_per_page=-1');
  if($posts->have_posts()):
    while($posts->have_posts()): $posts->the_post(); 
?>
        <?php 
          switch(get_field("community_type")) {
            case 'image':
              $thumbnail = wp_get_attachment_image_src(get_field("community_image"), "thumbnail");
              $hires = wp_get_attachment_image_src(get_field("community_image"), "large");
        ?>
          <figure class="media-grid__item media-grid__item--image">
            <a href="<?php the_permalink(); ?>">
              <img class="lazy" src="<?php echo $thumbnail[0]; ?>" data-src="<?php echo $hires[0]; ?>" alt="<?php the_title(); ?>">
            </a>
          </figure>
        <?php 
            break;
            case 'video':
              $thumbnail = wp_get_attachment_image_src(get_field("community_thumb"), "thumbnail");
              $hires = wp_get_attachment_image_src(get_field("community_thumb"), "large");
        ?>
          <figure class="media-grid__item media-grid__item--video">
            <a href="<?php the_permalink(); ?>">
              <img class="lazy" src="<?php echo $thumbnail[0]; ?>" data-src="<?php echo $hires[0]; ?>" alt="<?php the_title(); ?>">
              <figcaption class="media-grid__meta">
                <i class="fa fa-play-circle-o fa-fw fa-4x"></i>
                <h4><?php the_title(); ?></h4>
              </figcaption>
            </a>
          </figure>
        <?php 
            break;
            case 'text':
            default:
        ?>
          <figure class="media-grid__item media-grid__item--text">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
            </a>
          </figure>
        <?php 
            break;
          }
        ?>
<?php
    endwhile;
  endif; 
?>
        </div>

<!-- archive-community.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>