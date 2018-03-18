<?php 
$dir = "journals/";
$files2 = scandir($dir, 1);
$count = 0;
while($count < count($files2)){
  echo $files2[$count];
  $count++;
}
?>