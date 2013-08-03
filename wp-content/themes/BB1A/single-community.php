<?php get_template_part('parts/global/header'); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <main class="container" id="main" role="main">

      <article class="post">
        <?php
          if ( has_post_thumbnail() ) {
          $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), array(940,10000));
          $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
          $cleansed_image_url = str_replace(site_url().'/', '', $full_image_url[0]);
        ?>
        <!-- <?php echo $cleansed_image_url; ?> -->
        <figure class="post-media">
          <a href="<?php echo $full_image_url[0]; ?>">
            <img src="<?php echo $large_image_url[0]; ?>" alt="">
          </a>
        </figure>
        <?php } ?>
        <div class="post-body">
          <p><?php the_title(); ?></p>
          <?php the_content(); ?>
        </div>
        <?php $camera = cameraUsed($cleansed_image_url); ?>
        <aside class="post-card post-aside post-event-details">
          <?php if($camera['latitude']['ref'] && $camera['longitude']['ref']) { ?>
          <div class="post-card-map" style="background-image: url('http://maps.googleapis.com/maps/api/staticmap?zoom=14&amp;size=480x160&amp;scale=2&amp;maptype=roadmap&amp;markers=icon:http://bristolbronies.co.uk/wp-content/themes/BB1A/assets/img/map_marker2.png%7Cshadow:false%7C<?php echo $camera['latitude']['deg']; ?>,<?php echo $camera['longitude']['deg']; ?>&amp;sensor=false');">
          </div>
          <?php } ?>
          <div class="post-card-details">
            <ul class="meta">
              <?php if(get_post_meta(get_the_ID(), 'author', true)) { ?>
              <li class="photographer">
                <i class="icon-user"></i>
                Photographed by <strong><?php echo get_post_meta(get_the_ID(), 'author', true); ?></strong>
              </li>
              <?php } ?>
              <?php if($camera['date']) { ?>
              <li class="dates">
                <i class="icon-time"></i>
                <time datetime="<?php echo date("c", strtotime($camera['date'])); ?>"><?php echo date("jS F Y, g:ia", strtotime($camera['date'])); ?></time>
              </li>
              <?php } ?>
              <?php if($camera['latitude']['ref'] && $camera['longitude']['ref']) { ?>
              <li class="location">
                <i class="icon-map-marker"></i>
                <abbr title="<?php echo $camera['latitude']['deg']; ?>"><?php echo $camera['latitude']['gps']; ?></abbr>
                <abbr title="<?php echo $camera['longitude']['deg']; ?>"><?php echo $camera['longitude']['gps']; ?></abbr>
              </li>
              <?php } ?>
              <?php if($camera['make'] && $camera['model']) { ?>
              <li class="camera">
                <i class="icon-camera"></i>
                <?php echo $camera['make']; ?> <?php echo $camera['model']; ?><br>
                <?php if($camera['exposure']) { ?><abbr title="<?php echo $camera['exposure']; ?> exposure"><?php echo $camera['exposure']; ?></abbr><?php } ?>
                <?php if($camera['aperture']) { ?><abbr title="<?php echo $camera['aperture']; ?> aperture"><?php echo $camera['aperture']; ?></abbr><?php } ?>
                <?php if($camera['iso']) { ?><abbr title="ISO <?php echo $camera['iso']; ?>">ISO <?php echo $camera['iso']; ?></abbr><?php } ?>
              </li>
              <?php } ?>
            </ul>
          </div>
        </aside>
      </article>

  </main>

<?php endwhile; ?>

<?php get_template_part('parts/global/footer'); ?>