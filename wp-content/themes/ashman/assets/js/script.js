$(document).ready(function() {
  initAshmanSearch();
  initFitVids();
});

function initFitVids() {
  $(document).fitVids();
}

function initAshmanSearch() {
  var $results = $(".js-search-overlay");
  var enabled = false;
  $results.hide();
  $(".header a[href='/search']").on('click', function(e) {
    if(enabled == false) {
      $(this).parent("li").addClass("highlight");
      //$results.show().load("/search #content");
      $results.show();
      $("html").css("overflow", "hidden");
      enabled = true;
    }
    else {
      $(this).parent("li").removeClass("highlight");
      //$results.hide().html("");
      $results.hide();
      $("html").css("overflow", "auto");
      enabled = false;
    }
    e.preventDefault();
    e.stopPropagation();
  });
  $("#search").on('keyup submit', function(e){ 
    var term = $(".search-form__field").val();
    if(term){
      $(".js-search-results").load("/search/" + encodeURIComponent(term) + " #results");
      console.log("Searching for: " + encodeURIComponent(term));
    }
    e.preventDefault();
    e.stopPropagation();
  });
}

