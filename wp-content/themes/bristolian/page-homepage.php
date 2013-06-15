<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <div class="homepage-blurb">
            <div class="hero">
              <?php the_content(); ?>
            </div>
          </div><!-- /.homepage-blurb -->
          <div class="module-group row">
            <aside class="one-third">
              <div class="module module-twitter">
                <a href="http://twitter.com/bristolbronies">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/-/img/module-twitter.jpg" alt="">
                  <div href="#" class="caption">
                    <strong>Follow us on Twitter</strong>
                    Up-to-the-minute meet information!
                  </div>
                </a>
              </div>
            </aside>
            <aside class="one-third">
              <div class="module module-badges">
                <a href="/resources/badges">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/-/img/module-badges.jpg" alt="">
                  <div class="caption">
                    <strong>Get your free badge when you attend your first meet!</strong>
                  </div>
                </a>
              </div>
            </aside>
            <aside class="one-third">
              <div class="module module-facebook">
                <a href="http://facebook.com/bristolbronies">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/-/img/module-facebook.jpg" alt="">
                  <div class="caption">
                    <strong>Like us on Facebook</strong>
                    People posting things!
                  </div>
                </a>
              </div>
            </aside>
          </div><!-- /.module-group -->
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>