<?php 
  include '../includes/functions.php';

  $content = $_POST['text'];
  $number = $_POST['number'];


  $today = date("Y-m-d|h:i");
  $today = str_replace(" ", "", $today);
  $my_file = $today;
  $dir = "../journals/$number/";

  if(!file_exists($dir)){
    mkdir($dir);
  }
  $handle = fopen($dir.$my_file, 'w') or die('Cannot open file:  '.$my_file);
  $tmpFile = genRandomString(4).".txt";
  file_put_contents("../tmp/".$tmpFile, "");
  file_put_contents("../tmp/".$tmpFile, $content);

  $command = "python emotion.py $tmpFile";
  $output = shell_exec($command);
  
  $data = $content."\n\n";
  fwrite($handle, $data);
  fclose($handle);
  file_put_contents($dir.$my_file."-json", $output);
  
    $decode = json_decode($output, true);
    
    $percentArray = $decode['emotion']['document']['emotion'];
$emotions = array("anger","joy","sadness","fear","disgust");
  foreach($emotions as $emotion){
      $handle = fopen($dir.$emotion.".txt", 'a');
      $todaySplit = explode("|", $today);
      fwrite($handle, $percentArray[$emotion]."|".$todaySplit[0]."\n");
      fclose($handle);
  }
  echo $output;

?>