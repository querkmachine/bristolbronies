$(document).ready(function() {  
  initFitVids();
  initMediaGrid();
});

$(window).resize(function() {
  initMediaGrid();
});

function initFitVids() {
  $(".media.video .media-item, .post .post-media").fitVids();
}

function initMediaGrid() {
  // var $win = $(window),
  //     $con = $(".media-grid"),
  //     $imgs = $("img.lazy");
  // $con.isotope({
  //   itemSelector: ".media",
  //   masonry: { columnWidth: Math.floor($con.width() / 4) },
  //   onLayout: function() {
  //     $win.trigger("scroll");
  //   }
  // });
  // $imgs.unveil();
  var $container = $('.media-grid');
  $container.packery({ 
    itemSelector: '.media',
    gutter: 0,
    columnWidth: ".media",
    transitionDuration: "0s"
  });
  $("img.lazy").unveil();
}

// $(window).load(function() {

//   $mediaGrid.fadeIn().isotope({
//     itemSelector: ".media",
//     resizable: false,
//     masonry: { columnWidth: $mediaGrid.width() / 4 }
//   });

// });

// $(window).resize(function() {

//   $mediaGrid.isotope({
//     itemSelector: ".media",
//     resizable: false,
//     masonry: { columnWidth: $mediaGrid.width() / 4 }
//   });

// });