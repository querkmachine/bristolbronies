<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Pattern Primer</title>
<link rel="stylesheet" href="/wp-content/themes/bristolian/assets/css/stylesheet.css">
<script src="//use.typekit.net/rvj6shm.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<script src="/wp-content/themes/bristolian/assets/js/modernizr-2.7.1.min.js"></script>
<script src="/wp-content/themes/bristolian/assets/js/pace.min.js"></script>
<style>
body {
    padding: 2%;
    background-color: #fff;
}
.pattern {
    margin-bottom: 2em;
    border: 1px solid #dedede;
    clear: both;
    overflow: hidden;
}
.pattern .display {
    padding: 2%;
}
.pattern .source {
    padding: 0.5em 1em;
    background: #dedede;
}
.pattern .source a {
    float: right;
}
.pattern .source textarea {
    margin-top: 0.5em;
    width: 100%;
    resize: vertical;
    font-family: monospace;
    font-size: smaller;
}
</style>
</head>
<body>

<?php
$files = array();
$handle=opendir('patterns');
while (false !== ($file = readdir($handle))):
    if(stristr($file,'.html')):
        $files[] = $file;
    endif;
endwhile;
sort($files);
foreach ($files as $file):
    echo '<div class="pattern" id="'.str_replace(".html", "", $file).'"">';
    echo '<details class="source">';
    echo '<summary>'.$file.' <a href="#'.str_replace(".html", "", $file).'">#</a></summary>';
    echo '<textarea rows="6" cols="30">';
    echo htmlspecialchars(file_get_contents('patterns/'.$file));
    echo '</textarea>';
    echo '</details>';
    echo '<div class="display">';
    include('patterns/'.$file);
    echo '</div>';
    echo '</div>';
endforeach;
?>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/wp-content/themes/bristolian/assets/js/jquery-1.11.0.min.js"><\/script>')</script>
  <script src="/wp-content/themes/bristolian/assets/js/jquery.fitvids.js"></script>
  <script src="/wp-content/themes/bristolian/assets/js/packery-1.1.0.min.js"></script>
  <script src="/wp-content/themes/bristolian/assets/js/jquery.unveil.min.js"></script>
  <script src="/wp-content/themes/bristolian/assets/js/script.js"></script>

</body>
</html>
