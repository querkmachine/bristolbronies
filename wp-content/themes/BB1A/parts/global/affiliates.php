  <?php query_posts('post_type=affiliates'); ?>
  <?php if(have_posts()) { ?>
  <aside id="affiliates">
    <div class="container">
      <header>
        <h1>Affiliates</h1>
      </header>
      <ul>
        <?php 
          while ( have_posts() ) : the_post();
            if ( has_post_thumbnail() ) {
              $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), array(188,188));
        ?>
        <li>
          <a href="<?php echo get_post_meta(get_the_ID(), 'affiliate_url', true); ?>" onclick="_gaq.push(['_trackEvent', 'Affliate Link', 'Click', '<?php echo addslashes(get_the_title()); ?>']);">
            <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>">
          </a>
        </li>
        <?php 
            } 
          endwhile; 
        ?>
      </ul>
    </div>
  </aside>
  <?php } ?>