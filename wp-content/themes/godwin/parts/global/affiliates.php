<?php
  $posts=query_posts('post_type=affiliates&posts_per_page=-1');
  if(have_posts()) : 
?>
            <div class="footer-links__column footer-links__affiliate">
              <h6>In Affiliation With</h6>
              <ul>
<?php
    while(have_posts()) : the_post();
?>
                <li>
                  <a href="<?php echo get_field("affiliate_url"); ?>" target="_blank">
                    <img src="<?php echo get_field("affiliate_image"); ?>" alt="<?php the_title(); ?>">
                  </a>
                </li>
<?php
    endwhile;
?>
              </ul>
            </div>
<?php
  endif;
  wp_reset_query();
?>