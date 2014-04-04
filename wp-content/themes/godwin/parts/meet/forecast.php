<?php

function forecast_icon($code) {
  $icons = array();
  switch($code) {
    case 'clear-day': 
      $icons[] = 'sun';
      break;
    case 'clear-night':
      $icons[] = 'moon';
      break;
    case 'rain':
      $icons[] = 'basecloud';
      $icons[] = 'rainy';
      break;
    case 'snow':
      $icons[] = 'basecloud';
      $icons[] = 'snowy';
      break;
    case 'sleet':
      $icons[] = 'basecloud';
      $icons[] = 'sleet';
      break;
    case 'wind':
      $icons[] = 'basecloud';
      $icons[] = 'windy';
      break;
    case 'fog':
      $icons[] = 'mist';
      break;
    case 'cloudy':
      $icons[] = 'cloud';
      break;
    case 'partly-cloudy-day':
      $icons[] = 'basecloud';
      $icons[] = 'sunny';
      break;
    case 'partly-cloudy-night':
      $icons[] = 'basecloud';
      $icons[] = 'night';
      break;
    default:
      $icons[] = 'basecloud';
      break;
  }
  $output = false;
  for($i = 0; $i < count($icons); $i++) { 
    $output .= '<i class="fi fi-'. $icons[$i] . '"></i>'; 
  }
  return $output;
}

header("Content-Type: application/json");

$latitude = !empty($_GET['lat']) ? $_GET['lat'] : false;
$longitude = !empty($_GET['lng']) ? $_GET['lng'] : false;
$timestamp = !empty($_GET['start']) ? $_GET['start'] : false;

if($latitude && $longitude && $timestamp) {
  // FORECAST.IO API HELPER CLASS
  // https://github.com/tobias-redmann/forecast.io-php-api
  require_once('../../functions/forecast.io.php');
  $forecast = new ForecastIO("3fa87b97eefb0d1e9b29302779ff6eca");
  if($condition = $forecast->getHistoricalConditions($latitude, $longitude, $timestamp)) {
    $output['icon'] = forecast_icon($condition->getIcon()); 
    $output['summary'] = $condition->getSummary();
    $output['temperature_max'] = $condition->getMaxTemperature(); 
    $output['temperature_min'] = $condition->getMinTemperature(); 
    echo json_encode($output); 
  }
}
else {
  $output['error'] = "That was wrong.";
  echo json_encode($output);
}

?>