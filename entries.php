<!DOCTYPE html>
<html>


<head>
  

  <?php 
    include 'includes/header.php';
  ?>
  
<?php 
  session_start();
  $number = $_SESSION['phone'];
$dir = "journals/".$number."/";
$journalEntries = scandir($dir, 1);
$count = 0;
  
foreach($journalEntries as $entry){
  if(!strpos($entry, "-json") && $entry != "." && $entry != ".."){
    $fullFile = $dir.$entry;
    echo file_get_contents($fullFile);
    $json = file_get_contents($fullFile."-json");
    $decode = json_decode($json, true);
    
    $percentArray = $decode['emotion']['document']['emotion'];
    $emotionKeys = array_keys($percentArray);
    $count = 0;
    foreach($percentArray as $percentage){
      $emotion = $emotionKeys[$count];
      echo $emotion.": ".$percentage."<br />";
      $emotionFile = $dir.$emotion.".txt";
      $count++;
    }
  }

  
}  //*/


?>

</body>

</html>
