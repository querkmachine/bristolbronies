<?php
  /* 
  Template Name: Community - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <div class="community-blurb">
            <h1>Community</h1>
            <p class="lede">We've got lots of opportunity in this very community!</p>
          </div>
        </div>

        <div class="media-grid">
<?php 
  $posts=query_posts($query_string . '&posts_per_page=-1');
  if(have_posts()) :
    while(have_posts()) : the_post(); 
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
              <div class="media-grid__meta">
                <i class="fa fa-play-circle-o fa-fw fa-4x"></i>
                <h4><?php the_title(); ?></h4>
              </div>
            </a>
          </figure>
        <?php 
            break;
            case 'text':
            default:
        ?>
          <figure class="media-grid__item media-grid__item--text">
            
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