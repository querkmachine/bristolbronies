<?php
  /* 
  Template Name: Search - Home
  */
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <?php get_search_form(true); ?>
        <div class="search-results js-search-results">
          <ul id="results"></ul>
        </div>

<!-- page-search.php -->

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>