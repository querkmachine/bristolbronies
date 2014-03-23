<?php
  get_template_part('parts/global/html-header');
  get_template_part('parts/global/masthead');
?>

        <div class="row">
          <?php get_search_form(true); ?>
          <ul class="search-results js-search-results">
          </ul>
        </div>

<?php
  get_template_part('parts/global/footer');
  get_template_part('parts/global/html-footer');
?>