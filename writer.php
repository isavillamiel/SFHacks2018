<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
  $content = $_POST['text'];
  $phone = $_POST['number'];

  $content = "I am happy today, the earth is good";
  $number = "+14156908654";


  $today = date("Y-m-d h:i");
  $today = str_replace(" ", "", $today);
  $my_file = 'log'.$today."".$number;
echo $my_file;

  $handle = fopen('journals/'.$my_file, 'w') or die('Cannot open file:  '.$my_file);
  $json = file_get_contents("http://159.89.151.80/getEmotions.php?text=".str_replace(" ", "%20", $content));
  $data = $content."\n".$json;
  fwrite($handle, $data);//*/
?>