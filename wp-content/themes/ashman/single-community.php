<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

<?php 
  if(have_posts()) :
    while(have_posts()) : the_post(); 
      switch(get_field("community_type")) {
        case 'image':
          $hires = wp_get_attachment_image_src(get_field("community_image"), "large");
          $full = wp_get_attachment_image_src(get_field("community_image"), "full");
          $cleansed = str_replace(site_url().'/', '', $full[0]);
?>
        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-pencil-square-o fa-fw"></i> Uploaded <time datetime="<?php echo get_the_date("c"); ?>"><?php echo get_the_date("jS F Y"); ?></time></li>
              </ul>
            </header>
            <div class="post__body">
              <figure class="figure">
                <a href="<?php echo $full[0]; ?>"><img src="<?php echo $hires[0]; ?>" alt="<?php the_title(); ?>"></a>
                <figcaption class="figcaption"><?php the_content(); ?></figcaption>
              </figure>
            </div>
            <div class="post__sidebar">
              <?php 
                $runners = get_field('community_creator');
                foreach($runners as $runner) {
              ?>
              <aside class="profile postcard">
                <div class="profile__avatar">
                  <img src="<?php echo ashman_profile_avatar($runner); ?>" alt="">
                </div>
                <div class="profile__biography postcard__data">
                  <h1 class="profile__captain"><small>Created by</small> <?php echo get_the_title($runner); ?></h1>
                  <p><?php echo ashman_profile_biography($runner); ?></p>
                </div>
                <div class="profile__social-links">
                  <ul>
                    <?php if(ashman_custom_field("runner_twitter", $runner)) { ?><li><a href="http://twitter.com/<?php echo ashman_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li><?php } ?>
                    <?php if(ashman_custom_field("runner_facebook", $runner)) { ?><li><a href="http://facebook.com/<?php echo ashman_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li><?php } ?>
                  </ul>
                </div>
              </aside>
              <?php 
                } 
              ?>
              <?php 
                $camera = community_camera_metadata($cleansed);
                if($camera['date'] || ($camera['make'] && $camera['model']) || $camera['exposure'] || $camera['aperture'] || $camera['iso']) { 
              ?>
              <aside class="camera-meta postcard">
                <div class="postcard__title">
                  <h1>Meta</h1>
                </div>
                <div class="postcard__data">
                  <p>Photographed<?php if($camera['date']) { ?> on <strong>10th August 2013 at 9:02pm</strong><?php } if($camera['make'] && $camera['model']) { ?> using a <?php echo $camera['make']; ?> <?php echo $camera['model']; ?><?php } ?>.</p>
                  <p>
                    <?php if($camera['exposure']) { ?><abbr title="<?php echo $camera['exposure']; ?> exposure"><?php echo $camera['exposure']; ?></abbr><?php } ?>
                    <?php if($camera['aperture']) { ?><abbr title="<?php echo $camera['aperture']; ?> aperture"><?php echo $camera['aperture']; ?></abbr><?php } ?>
                    <?php if($camera['iso']) { ?><abbr title="ISO <?php echo $camera['iso']; ?>">ISO <?php echo $camera['iso']; ?></abbr><?php } ?>
                  </p>
                </div>
              </aside>
              <?php 
                }
              ?>
            </div>
          </article>
        </div>
<?php
        break;
        case 'video':
?>
        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-pencil-square-o fa-fw"></i> Uploaded <time datetime="<?php echo get_the_date("c"); ?>"><?php echo get_the_date("jS F Y"); ?></time></li>
              </ul>
            </header>
            <div class="post__body">
              <figure class="figure">
                <?php echo get_field("community_video"); ?>
                <figcaption class="figcaption"><?php the_content(); ?></figcaption>
              </figure>
            </div>
            <div class="post__sidebar">
              <?php 
                $runners = get_field('community_creator');
                foreach($runners as $runner) {
              ?>
              <aside class="profile postcard">
                <div class="profile__avatar">
                  <img src="<?php echo ashman_profile_avatar($runner); ?>" alt="">
                </div>
                <div class="profile__biography postcard__data">
                  <h1 class="profile__captain"><small>Created by</small> <?php echo get_the_title($runner); ?></h1>
                  <p><?php echo ashman_profile_biography($runner); ?></p>
                </div>
                <div class="profile__social-links">
                  <ul>
                    <?php if(ashman_custom_field("runner_twitter", $runner)) { ?><li><a href="http://twitter.com/<?php echo ashman_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li><?php } ?>
                    <?php if(ashman_custom_field("runner_facebook", $runner)) { ?><li><a href="http://facebook.com/<?php echo ashman_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li><?php } ?>
                  </ul>
                </div>
              </aside>
              <?php 
                } 
              ?>
            </div>
          </article>
        </div>
<?php
        break;
        case 'text':
        default:
?>
        <div class="row">
          <article class="post">
            <header class="post__header">
              <h2 class="post__title"><?php the_title(); ?></h2>
              <ul class="post__meta">
                <li class="post__meta__date"><i class="fa fa-pencil-square-o fa-fw"></i> Uploaded <time datetime="<?php echo get_the_date("c"); ?>"><?php echo get_the_date("jS F Y"); ?></time></li>
              </ul>
            </header>
            <div class="post__body">
              <?php the_content(); ?>
            </div>
            <div class="post__sidebar">
              <?php 
                $runners = get_field('community_creator');
                foreach($runners as $runner) {
              ?>
              <aside class="profile postcard">
                <div class="profile__avatar">
                  <img src="<?php echo ashman_profile_avatar($runner); ?>" alt="">
                </div>
                <div class="profile__biography postcard__data">
                  <h1 class="profile__captain"><small>Created by</small> <?php echo get_the_title($runner); ?></h1>
                  <p><?php echo ashman_profile_biography($runner); ?></p>
                </div>
                <div class="profile__social-links">
                  <ul>
                    <?php if(ashman_custom_field("runner_twitter", $runner)) { ?><li><a href="http://twitter.com/<?php echo ashman_custom_field("runner_twitter", $runner); ?>"><i class="fa fa-twitter fa-fw"></i> <span class="hidden">Twitter</span></a></li><?php } ?>
                    <?php if(ashman_custom_field("runner_facebook", $runner)) { ?><li><a href="http://facebook.com/<?php echo ashman_custom_field("runner_facebook", $runner); ?>"><i class="fa fa-facebook fa-fw"></i> <span class="hidden">Facebook</span></a></li><?php } ?>
                  </ul>
                </div>
              </aside>
              <?php 
                } 
              ?>
            </div>
          </article>
        </div>
<?php
        break;
      }
    endwhile;
  endif; 
?>

<!-- index.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>