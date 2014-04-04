<div class="row">
  <form role="search" id="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
      <span class="hidden">Search for:</span>
      <input type="search" class="search-form__field" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" autofocus>
    </label>
    <button type="submit" class="search-form__submit button--positive hidden"><i class="fa fa-search"></i> Search</button>
  </form>
</div>