<?php 
  include '../includes/functions.php';

  $content = $_POST['text'];
  $number = $_POST['number'];


  $today = date("Y-m-d h:i");
  $today = str_replace(" ", "", $today);
  $my_file = 'log'.$today."+".$number;
  $handle = fopen('../journals/'.$my_file, 'w') or die('Cannot open file:  '.$my_file);
  $tmpFile = genRandomString(4).".txt";
  $text = $content;
  file_put_contents("../tmp/".$tmpFile, "");
  file_put_contents("../tmp/".$tmpFile, $text);

  $command = "python emotion.py $tmpFile";
  $output = shell_exec($command);
  echo $output;
  
  $data = $content."\n\n".$output;
  fwrite($handle, $data);

?>