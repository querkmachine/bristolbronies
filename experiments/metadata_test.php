<?php
// function cameraUsed($imagePath) {

//     // Check if the variable is set and if the file itself exists before continuing
//     if ((isset($imagePath)) and (file_exists($imagePath))) {
    
//       // There are 2 arrays which contains the information we are after, so it's easier to state them both
//       $exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);       
//       $exif_exif = read_exif_data($imagePath ,'EXIF' ,0);
      
//       //error control
//       $notFound = "Unavailable";
      
//       // Make 
//       if (@array_key_exists('Make', $exif_ifd0)) {
//         $camMake = $exif_ifd0['Make'];
//       } else { $camMake = $notFound; }
      
//       // Model
//       if (@array_key_exists('Model', $exif_ifd0)) {
//         $camModel = $exif_ifd0['Model'];
//       } else { $camModel = $notFound; }
      
//       // Exposure
//       if (@array_key_exists('ExposureTime', $exif_ifd0)) {
//         $camExposure = $exif_ifd0['ExposureTime'];
//       } else { $camExposure = $notFound; }

//       // Aperture
//       if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) {
//         $camAperture = $exif_ifd0['COMPUTED']['ApertureFNumber'];
//       } else { $camAperture = $notFound; }
      
//       // Date
//       if (@array_key_exists('DateTime', $exif_ifd0)) {
//         $camDate = $exif_ifd0['DateTime'];
//       } else { $camDate = $notFound; }
      
//       // ISO
//       if (@array_key_exists('ISOSpeedRatings',$exif_exif)) {
//         $camIso = $exif_exif['ISOSpeedRatings'];
//       } else { $camIso = $notFound; }
      
//       $return = array();
//       $return['make'] = $camMake;
//       $return['model'] = $camModel;
//       $return['exposure'] = $camExposure;
//       $return['aperture'] = $camAperture;
//       $return['date'] = $camDate;
//       $return['iso'] = $camIso;
//       return $return;
    
//     } else {
//       return false; 
//     } 
// }



//   $camera = cameraUsed("myphoto.jpg");
//   echo "Camera Used: " . $camera['make'] . " " . $camera['model'] . "<br />";
//   echo "Exposure Time: " . $camera['exposure'] . "<br />";
//   echo "Aperture: " . $camera['aperture'] . "<br />";
//   echo "ISO: " . $camera['iso'] . "<br />";
//   echo "Date Taken: " . $camera['date'] . "<br />";







 $imagePath = "myphoto.jpg";
 //var_dump($exif);

 $exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);

 if(@array_key_exists('GPSLatitudeRef', $exif_ifd0)) {
  $camLatitude = $exif_ifd0['GPSLatitudeRef'];
 }
 if(@array_key_exists('GPSLatitude', $exif_ifd0)) {
  $camLatitudeDegrees = explode("/", $exif_ifd0['GPSLatitude'][0]);
  $camLatitudeSeconds = explode("/", $exif_ifd0['GPSLatitude'][1]);
 }
 if(@array_key_exists('GPSLongitudeRef', $exif_ifd0)) {
  $camLongitude = $exif_ifd0['GPSLongitudeRef'];
 }
 if(@array_key_exists('GPSLongitude', $exif_ifd0)) {
  $camLongitudeDegrees = explode("/", $exif_ifd0['GPSLongitude'][0]);
  $camLongitudeSeconds = explode("/", $exif_ifd0['GPSLongitude'][1]);
 }

 if($camLatitude == "S") { echo "-"; }
 $camLatitudeSecondsCalc = ((substr($camLatitudeSeconds[0],0,2)*60)+substr($camLatitudeSeconds[0],2,2));
 echo round(($camLatitudeSecondsCalc / 3600) + $camLatitudeDegrees[0], 5);

 if($camLongitude == "W") { echo "-"; }
 $camLongitudeSecondsCalc = ((substr($camLongitudeSeconds[0],0,2)*60)+substr($camLongitudeSeconds[0],2,2));
 echo round(($camLongitudeSecondsCalc / 3600) + $camLongitudeDegrees[0], 5);

?>
<br><br>
<?php echo $camLatitude; ?><br>
<?php echo $camLatitudeDegrees[0]; ?><br>
<?php echo $camLatitudeSeconds[0]; ?><br>
<?php echo $camLongitude; ?><br>
<?php echo $camLongitudeDegrees[0]; ?><br>
<?php echo $camLongitudeSeconds[0]; ?><br>