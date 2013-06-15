<?php

require('inc/config.inc.php');

function log_it($err_no, $err_msg) {
  error_log("[".date('Y-m-d H:i:s T')."] (".$err_no.") ".$err_msg."\n", 3, "error_log");
}

error_reporting(E_ALL);
set_error_handler("log_it");

function parse_feed($feed) {
  $stepOne = explode("<content type=\"html\">", $feed);
  $stepTwo = explode("</content>", $stepOne[1]);
  $tweet = $stepTwo[0];
  $tweet = htmlspecialchars_decode($tweet,ENT_QUOTES);
  return $tweet;
}

function latest_tweet($username) { 
  $feed = "http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=1";
  $twitterFeed = file_get_contents($feed);
  return parse_feed($twitterFeed);
}

function next_meet() {
  global $connection;
  $now['date'] = date('Y-m-d');
  $now['time'] = date('H:i:s');
  $request = $connection->prepare("SELECT * FROM meet WHERE StartDate > '".$now['date']." ".$now['time']."' ORDER BY StartDate ASC LIMIT 1");
  $request->execute();
  if($request->rowCount() > 0) {
    while($row = $request->fetch(PDO::FETCH_ASSOC)) {
      $return = date('jS F Y', strtotime($row['StartDate']));
    }
  }
  else {
    $return = "No date found";
  }
  return $return;
  // for($i=0; $i<$result->rowCount(); $i++) {
  //   if(strtotime(mysql_result($result, $i, "meet.EndDate")) > time()) {
  //     if($found == false) {
  //       $return = date('jS F Y', strtotime(mysql_result($result, $i, 'meet.StartDate')));
  //       $found = true;
  //     }
  //   }
  //   else {
  //     $return = "No date found.";
  //   }
  // }
  // return $return;
}

header("Content-type: image/png");

$cacheFile = '-/img/signature_cache.png';
$cacheTime = 60*10; // 10 minutes
$cacheFileCreated = ((@file_exists($cacheFile))) ? @filemtime($cacheFile) : 0;

if(time() - $cacheTime < $cacheFileCreated) {

  @readfile($cacheFile);

}
else {

  ob_start();

  $tweet = latest_tweet("bristolbronies");
  $tweet = str_replace("&apos;", "'", html_entity_decode(strip_tags($tweet), ENT_QUOTES));
  //$tweet = preg_replace("/RT \@[a-zA-Z0-9_]+\:* /", "", $tweet, 1);
  if(!$tweet) { $tweet = "There was an error retrieving the tweet. The account may be protected or Twitter is down."; } 

  $lpl = floor((420 - 14) / (12 - 2));
  $lines = explode('|', wordwrap($tweet, $lpl, '|')); 

  $image = imagecreatetruecolor(750,140);

  $white = imagecolorallocate($image, 255, 255, 255);
  $red = imagecolorallocate($image, 200, 16, 46);
  $derpy_grey = imagecolorallocate($image, 137, 144, 157);

  $font = "-/type/OpenSans-Light.ttf";
  $fontBold = "-/type/OpenSans-Bold.ttf";
  $fontTitle = "-/type/Arvo-Bold.ttf";
  $fontSize = 12;
  $fontSizeBig = 22;

  imagefill($image, 0, 0, $red);

  $logo = imagecreatefromstring(file_get_contents('-/img/logo-small.png'));
  // $logo = imagecreatefromstring(file_get_contents('-/img/logo-small-derpy.png'));
  // $logo = imagecreatefromstring(file_get_contents('-/img/logo-small-izzie.png'));

  imagecopy($image, $logo, 10, 10, 0, 0, imagesx($logo), imagesy($logo));

  imagettftext($image, $fontSize, 0, 160, 22+(12+$fontSize), $white, $font, "Next Bristol Bronies meet");
  imagettftext($image, $fontSize, 0, 160, 22+(12+$fontSize)+(10+$fontSize), $white, $fontBold, next_meet());
  //imagettftext($image, $fontSizeBig, 0, 150, 22+(12+$fontSize)+(10+$fontSize)+(10+$fontSizeBig), $white, $fontTitle, "2nd November");

  $y = 22+12+$fontSize;
  foreach($lines as $line) {
    imagettftext($image, $fontSize, 0, 400, $y, $white, $font, $line);
    $y += $fontSize*1.8;
  }

  imagepng($image);
  imagedestroy($image);

  $writeCache = @fopen($cacheFile, 'w');
  @fwrite($writeCache, ob_get_contents());
  @fclose($writeCache);
  ob_end_flush();

}

?>