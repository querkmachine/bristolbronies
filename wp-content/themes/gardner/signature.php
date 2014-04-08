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
        $datetime = bb_meet_dates(bb_custom_field('meet_start_time'), bb_custom_field('meet_end_time'));
        $categories = bb_meet_category(get_the_ID());
        $title = get_the_title();
        $found = true;
      }
    endwhile;
    $category = "";
    for($i = 0; $i < count($categories); $i++) {
      $category .= $categories[$i];
      if(!empty($categories[$i+1])) { $category .= " / "; }
    } 
  endif;
  $image = imagecreatetruecolor(750, 120);
  $color['background'] = imagecolorallocate($image, 255, 255, 255);
  $color['meta'] = imagecolorallocate($image, 149, 149, 153);
  $color['title'] = imagecolorallocate($image, 200, 16, 46);
  $font['icon'] = "wp-content/themes/".BB_VERSION."/assets/type/fontawesome-webfont.ttf";
  $font['meta'] = "wp-content/themes/".BB_VERSION."/assets/type/Lato-Regular.ttf";
  $font['title'] = "wp-content/themes/".BB_VERSION."/assets/type/Lato-Black.ttf";
  $size['meta'] = 10;
  $size['title'] = 24;
  imagefill($image, 0, 0, $color['background']);
  $logo = imagecreatefromstring(file_get_contents("wp-content/themes/".BB_VERSION."/assets/img/logo-signature.png"));
  imagecopy($image, $logo, 10, 10, 0, 0, imagesx($logo), imagesy($logo));
  if($found) { 
    $datetime = strtoupper(str_replace("&ndash;", "–", strip_tags($datetime))); 
    $category = strtoupper($category);
  }
  else {
    $datetime = "We didn't find any upcoming meets...";
    $title = "...but there'll be another one soon!";
  }
  /*Category*/  imagettftext($image, $size['meta'], 0, 120, 13+(12+$size['meta']), $color['meta'], $font['title'], "NEXT MEET: ");
  /*Category*/  imagettftext($image, $size['meta'], 0, 200, 13+(12+$size['meta']), $color['meta'], $font['meta'], $category);
  /*Title*/     imagettftext($image, ($size['title']+5), 0, 120, 13+(6+$size['title'])+(6+$size['title']), $color['title'], $font['title'], $title);
  /*Calicon*/   imagettftext($image, $size['meta'], 0, 120, 12+(6+$size['title'])+(6+$size['title'])+(12+$size['meta']), $color['title'], $font['icon'], "");
  /*Datetime*/   imagettftext($image, $size['meta'], 0, 135, 13+(6+$size['title'])+(6+$size['title'])+(12+$size['meta']), $color['meta'], $font['meta'], $datetime);
  imagepng($image);
?>