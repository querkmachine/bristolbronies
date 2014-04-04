<?php
  /*
  Template Name: Signature Image
  */
  header("Content-type: image/png");
  $posts=query_posts('post_type=meet&meta_key=meet_start_time&orderby=meta_value_num&order=ASC&posts_per_page=-1');
  if(have_posts()) :
    $found = false;
    while(have_posts()) : the_post(); 
      if(!$found && get_field("meet_end_time", get_the_ID()) > time()) { 
        $datetime = get_field("meet_start_time");
        $title = get_the_title();
        $found = true;
      }
    endwhile;
  endif;
  $image = imagecreatetruecolor(750, 120);
  $color['background'] = imagecolorallocate($image, 255, 255, 255);
  $color['date'] = imagecolorallocate($image, 149, 149, 153);
  $color['title'] = imagecolorallocate($image, 200, 16, 46);
  $font['date'] = "wp-content/themes/godwin/assets/type/Lato-Regular.ttf";
  $font['title'] = "wp-content/themes/godwin/assets/type/Lato-Black.ttf";
  $size['date'] = 10;
  $size['title'] = 22;
  imagefill($image, 0, 0, $color['background']);
  $logo = imagecreatefromstring(file_get_contents("wp-content/themes/godwin/assets/img/logo-signature.png"));
  imagecopy($image, $logo, 10, 10, 0, 0, imagesx($logo), imagesy($logo));
  if($found) { 
    $datetime = strtoupper(date("jS F Y", $datetime)); 
  }
  else {
    $datetime = "We didn't find any upcoming meets...";
    $title = "...but there'll be another one appearing any minute!";
  }
  imagettftext($image, $size['date'], 0, 120, 22+(12+$size['date']), $color['date'], $font['date'], $datetime);
  imagettftext($image, ($size['title']+5), 0, 120, 22+(6+$size['title'])+(6+$size['title']), $color['title'], $font['title'], $title);
  imagepng($image);
?>