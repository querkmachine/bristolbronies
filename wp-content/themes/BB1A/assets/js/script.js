var $mediaGrid = $(".media-grid");


$(document).ready(function() {
  
  $(".media.video .media-item, .post .post-media").fitVids();

});

$(window).load(function() {

  $mediaGrid.fadeIn().isotope({
    itemSelector: ".media",
    resizable: false,
    masonry: { columnWidth: $mediaGrid.width() / 4 }
  });

});

$(window).resize(function() {

  $mediaGrid.isotope({
    itemSelector: ".media",
    resizable: false,
    masonry: { columnWidth: $mediaGrid.width() / 4 }
  });

});