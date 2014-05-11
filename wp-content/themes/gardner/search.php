<?php
  /* 
  Template Name: Search - Results
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <?php get_search_form(true); ?>
        <?php
          $results = new WP_Query($query_string . '&posts_per_page=-1');
          if($results->have_posts()):
        ?>
        <div class="search-results js-search-results">
          <ul id="results">
        <?php
            while($results->have_posts()): $results->the_post(); 
        ?>
            <li class="search-results__item">
              <div class="search-results__content">
                <h4 class="search-results__title"><a href="<?php the_permalink(); ?>"><?php echo bb_search_highlight_term(get_search_query(), get_the_title()); ?></a></h4>
                <p class="search-results__url"><?php echo bb_search_highlight_term(get_search_query(), get_permalink()); ?></p>
                <?php echo bb_search_highlight_term(get_search_query(), get_the_excerpt()) ?>
              </div>
            </li>
        <?php
            endwhile;
        ?>
          </ul>
        </div>
        <?php
          else:
        ?>
          <div class="search-results">
            <ul id="results">
              <li class="search-results__item">
                No results found.
              </li>
            </ul>
          </div>
        <?php
          endif;
          wp_reset_postdata(); 
        ?>

<!-- search.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>