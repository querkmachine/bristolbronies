<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <?php
          if(have_posts()) :
        ?>
        <div class="search-results">
          <ul id="results">
        <?php
            while(have_posts()) : the_post(); 
        ?>
            <li class="search-results__item">
              <div class="search-results__content">
                <h4 class="search-results__title"><a href="<?php the_permalink(); ?>"><?php echo ashman_search_highlight_term(get_search_query(), get_the_title()); ?></a></h4>
                <p class="search-results__url"><?php echo ashman_search_highlight_term(get_search_query(), get_permalink()); ?></p>
                <?php echo ashman_search_highlight_term(get_search_query(), get_the_excerpt()) ?>
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
        ?>

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>