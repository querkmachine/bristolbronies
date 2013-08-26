$(document).ready(function() {  
  initFitVids();
});

$(window).load(function() {
  initMediaGrid();
});

function initFitVids() {
  $(".media.video .media-item, .post .post-media").fitVids();
}

function initMediaGrid() {
  var $container = $('.media-grid');
  $container.packery({ 
    itemSelector: '.media',
    gutter: 0,
    columnWidth: ".media",
    transitionDuration: "0s"
  });
  $("img.lazy").unveil();
}