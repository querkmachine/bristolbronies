$(document).ready(function() {
  initAshmanSearch();
  initFitVids();
});

function initFitVids() {
  $(document).fitVids();
}

function initAshmanSearch() {
  var $results = $(".results");
  var enabled = false;
  $results.hide();
  $(".header a[href='/search']").on('click', function(e) {
    if(enabled == false) {
      $(this).parent("li").addClass("highlight");
      $results.show().load("/search #content");
      $("html").css("overflow", "hidden");
      enabled = true;
    }
    else {
      $(this).parent("li").removeClass("highlight");
      $results.hide().html("");
      $("html").css("overflow", "auto");
      enabled = false;
    }
    e.preventDefault();
    e.stopPropagation();
  });
}