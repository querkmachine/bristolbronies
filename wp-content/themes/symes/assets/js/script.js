var BB_VERSION = "symes";

$(document).ready(function() {
  initBBSearch();
  initBB404();
  initBBMobileNavigation();
  initFitVids();
  initForecast();
});

$(window).load(function() {
  initBBCommunity();
});

function initFitVids() {
  $(document).fitVids();
}

function initBBCommunity() {
  var $container = $('.media-grid');
  $container.packery({ 
    itemSelector: '.media-grid__item',
    gutter: 0,
    columnWidth: ".media-grid__item",
    transitionDuration: "0.3s"
  });
  $("img.lazy").unveil();
}

function initForecast() {
  var $forecast = $(".js-forecast");
  var given_latitude = $forecast.attr('data-latitude'),
      given_longitude = $forecast.attr('data-longitude'),
      given_timestamp = $forecast.attr('data-timestamp');
  
  $.getJSON(
    '/wp-content/themes/'+BB_VERSION+'/parts/meet/forecast.php', 
    {
      lat: given_latitude,
      lng: given_longitude,
      start: given_timestamp
    },
    function(data) { 
      $forecast.find(".js-forecast__icon").css('background-image', 'none').html(data.icon);
      $forecast.find(".js-forecast__summary").html(data.summary);
      $forecast.find(".js-forecast__temp-high").html(Math.round(data.temperature_max));
      $forecast.find(".js-forecast__temp-low").html(Math.round(data.temperature_min));
    }
  ); 
}

function initBBSearch() {
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

function initBB404() {
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

function initBBMobileNavigation() {
  var $navigation = $(".primary-navigation"),
      $toggler = $(".mobile-navigation-icon");
  $toggler.on('click', function(e) {
    $(this).toggleClass("mobile-navigation-icon--active");
    $navigation.toggle();
    e.preventDefault();
    e.stopPropagation();
  });
}