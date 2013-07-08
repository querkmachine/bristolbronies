<?php 

$latitude = !empty($_GET['lat']) ? $_GET['lat'] : false;
$longitude = !empty($_GET['lng']) ? $_GET['lng'] : false;
$timestamp = !empty($_GET['start']) ? $_GET['start'] : false;

if($latitude && $longitude && $timestamp) {

  // FORECAST.IO API HELPER CLASS
  // https://github.com/tobias-redmann/forecast.io-php-api
  require_once('helpers/forecast.io.php');

  $api_key = '3fa87b97eefb0d1e9b29302779ff6eca';
  $forecast = new ForecastIO($api_key);
  $condition = $forecast->getHistoricalConditions($latitude, $longitude, $timestamp);

  $basecloud = false;
  $icons = array();
  switch($condition->getIcon()) {
    case 'clear-day': 
      $icons[] = 'sun';
      break;
    case 'clear-night':
      $icons[] = 'moon';
      break;
    case 'rain':
      $basecloud = true;
      $icons[] = 'rainy';
      break;
    case 'snow':
      $basecloud = true;
      $icons[] = 'snowy';
      break;
    case 'sleet':
      $basecloud = true;
      $icons[] = 'sleet';
      break;
    case 'wind':
      $basecloud = true;
      $icons[] = 'windy';
      break;
    case 'fog':
      $icons[] = 'mist';
      break;
    case 'cloudy':
      $icons[] = 'cloud';
      break;
    case 'partly-cloudy-day':
      $basecloud = true;
      $icons[] = 'sunny';
      break;
    case 'partly-cloudy-night':
      $basecloud = true;
      $icons[] = 'night';
      break;
    default:
      $basecloud = true;
      break;
  }

?>
        <div class="forecast-icon-wrapper">
          <span class="beta-tag"><a href="/news/beta-forecast/">beta</a></span>
          <?php if($basecloud) { ?><span class="basecloud"></span><?php } ?>
          <?php for($i=0;$i<count($icons);$i++) { ?><span class="forecast-<?php echo $icons[$i]; ?>"></span><?php } ?>
        </div>
        <div class="post-card-details">
          <ul class="meta">
            <li class="forecast"><i class="icon-cloud"></i> <?php echo $condition->getSummary(); ?></li>
            <li class="temp">
              <i class="icon-circle-arrow-up"></i> <?php echo round($condition->getMaxTemperature()); ?>&deg;C
              <i class="icon-circle-arrow-down"></i> <?php echo round($condition->getMinTemperature()); ?>&deg;C
            </li>
          </ul>
        </div>
<?php

}

?>