<?php
  $billboards = new WP_Query('post_type=billboard&orderby=date&order=DESC&posts_per_page=2');
  if($billboards->have_posts()):
    while($billboards->have_posts()): $billboards->the_post(); 
?>
          <figure class="billboard billboard--inline">
            <?php
              $image_url = get_field("billboard_image"); 
            ?>
            <div class="billboard__media">
              <a href="<?php echo get_field("billboard_url"); ?>">
                <img src="<?php echo $image_url['url']; ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
            <figcaption class="billboard__caption">
              <h4 class="billboard__title"><a href="<?php echo get_field("billboard_url"); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
            </figcaption>
          </figure>
<?php
    endwhile;
  endif; 
  wp_reset_postdata();
?>