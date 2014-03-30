$(document).ready(function() {
  initAshmanSearch();
  initAshman404();
  initFitVids();
});

$(window).load(function() {
  initAshmanCommunity();
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

function initAshman404() {
  var $errorpage = $("body.error404");
  var children = $errorpage.find("*");
  children.each(function(i) {
    $(this).css({
      "-webkit-transform": "rotate("+((Math.random()*6)-3)+"deg)",
      "   -moz-transform": "rotate("+((Math.random()*6)-3)+"deg)",
      "        transform": "rotate("+((Math.random()*6)-3)+"deg)"
    });
  });
}

function initAshmanCommunity() {
  var $container = $('.media-grid');
  $container.packery({ 
    itemSelector: '.media-grid__item',
    gutter: 0,
    columnWidth: ".media-grid__item",
    transitionDuration: "0.3s"
  });
  $("img.lazy").unveil();
}