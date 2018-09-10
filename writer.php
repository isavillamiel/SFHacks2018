<?php 

  $content = $_POST['text'];
  $number = $_POST['number'];


  $today = date("Y-m-d h:i");
  $today = str_replace(" ", "", $today);
  $my_file = 'log'.$today."+".$number;
  $handle = fopen('journals/'.$my_file, 'w') or die('Cannot open file:  '.$my_file);

  $text = $content;
  file_put_contents("tmp.txt", "");
  file_put_contents("tmp.txt", $text);

  $command = "python emotion.py";
  $output = shell_exec($command);
  echo $output;
  
  $data = $content."\n\n".$output;
  fwrite($handle, $data);//*/
?>