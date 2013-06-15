<?php

// ERROR HANDLING
function log_it($errNo, $errMsg) {
  error_log("[".date('Y-m-d H:i:s T')."] (".$errNo.") ".$errMsg."\n", 3, "error_log");
}
error_reporting(E_ALL);
set_error_handler("log_it");


// FILE HEADER
header("Content-type: image/png");


// CACHE CONFIG
$cacheFile = "signature_cache.png";
$cacheTime = 60*10; // 10 minutes
$cacheFileCreated = ((@file_exists($cacheFile))) ? @filemtime($cacheFile) : 0;
if(time() - $cacheTime < $cacheFileCreated) {
  // JUST GET THE CACHED VERSION
  readfile($cacheFile);
}
else {
  // START CACHE BUFFER
  ob_start();
  // GET THE NECESSARY INFO
  require_once('../wp-config.php');
  $connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
  $request = $connection->prepare("
    SELECT event_name, event_start_date 
    FROM wp_em_events 
    WHERE event_status = 1 
      AND event_start_date >= :date 
    ORDER BY event_start_date ASC 
    LIMIT 1
  ");
  $request->execute(
    array(
      'date' => date('Y-m-d')
    )
  );
  $results = $request->fetchAll(PDO::FETCH_ASSOC);
  // CREATE WORKSPACE
  $image = imagecreatetruecolor(750, 140);
  // DEFINE COLOURS
  $colourGrey = imagecolorallocate($image, 50, 50, 50);
  $colourWhite = imagecolorallocate($image, 255, 255, 255);
  $colourRed = imagecolorallocate($image, 224, 36, 54);
  $colourRedDetail = imagecolorallocate($image, 194, 34, 50);
  // DEFINE TYPEFACES
  $fontTitle = "assets/Lato-Black.ttf";
  $fontBody = "assets/OpenSans-Bold.ttf";
  // DEFINE SIZES
  $size = 12;
  // BACKGROUND COLOUR
  imagefill($image, 0, 0, $colourWhite);
  // BRISTOL BRONIES LOGO
  $logo = imagecreatefromstring(file_get_contents("assets/logo.png"));
  imagecopy($image, $logo, 5, 5, 0, 0, imagesx($logo), imagesy($logo));
  // PLACE TEXT
  if($request->rowCount() > 0) { 
    for($i=0;$i<$request->rowCount();$i++) {
      $textDate = strtoupper(date("jS F Y", strtotime($results[$i]['event_start_date'])));
      $textTitle = strtoupper($results[$i]['event_name']);
      imagettftext($image, $size, 0, 160, 22+(12+$size), $colourRed, $fontBody, $textDate);
      imagettftext($image, ($size+5), 0, 160, 22+(12+$size)+(15+$size), $colourGrey, $fontTitle, $textTitle);
    }
  } 
  else {
    imagettftext($image, $size, 0, 160, 22+(12+$size), $colourRed, $fontBody, "There's nothing here at the moment...");
    imagettftext($image, ($size+5), 0, 160, 22+(12+$size)+(15+$size), $colourGrey, $fontTitle, "but a new Bristol meet is bound to appear soon!");
  }
  // FINALISE IMAGE
  imagepng($image);
  imagedestroy($image);
  // END CACHE BUFFER
  $cacheWriter = @fopen($cacheFile, 'w');
  @fwrite($cacheWriter, ob_get_contents());
  @fclose($cacheWriter);
  ob_end_flush();
}

?>