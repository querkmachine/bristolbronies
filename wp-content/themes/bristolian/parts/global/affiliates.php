<?php
  $affiliates = new WP_Query('post_type=affiliates&posts_per_page=-1');
  if($affiliates->have_posts()): 
?>
            <div class="footer-links__group footer-links__group--affiliates">
              <h6>In Affiliation With</h6>
              <ul>
<?php
    while($affiliates->have_posts()): $affiliates->the_post();
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
  wp_reset_postdata();
?>