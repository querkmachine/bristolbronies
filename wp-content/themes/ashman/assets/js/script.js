$(document).ready(function() {
  initAshmanSearch();
  initFitVids();
});

function initFitVids() {
  $(document).fitVids();
}

function initAshmanSearch() {
  $("#search").on('keyup submit', function(e){ 
    var term = $(".search-form__field").val();
    if(term){
      $(".js-search-results").load("/search/" + encodeURIComponent(term) + " #results");
      console.log("Searching for: " + encodeURIComponent(term));
      history.replaceState('', '', '/search/'+encodeURIComponent(term));
    }
    e.preventDefault();
    e.stopPropagation();
  });
}

