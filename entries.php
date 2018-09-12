<!DOCTYPE html>
<html>


<head>
  <?php 
  //above area is for page specific js/css files
    include 'includes/header.php'; //contains appropriate javascript files and style sheets
  ?>
  
<?php 
  session_start();
  $number = $_SESSION['phone']; //get the user's phone number which serves as an identifier
  $dir = "journals/".$number."/"; //get the directory which contains journal entries of the user
  $journalEntries = scandir($dir, 1); //get an array of files
  
  $count = 0;
  foreach($journalEntries as $entry){ //go through each entry
    //if it is not a directory, a json file, or a data file
    //then proccess it
    if(!strpos($entry, "-json") && $entry != "." && $entry != ".." && !strpos($entry, ".txt")){
      echo "<div style='border-bottom: 2px solid #55768f;'"; //seperate the entries using a div border
      $fullFile = $dir.$entry; //store the full filename
      echo file_get_contents($fullFile); //share the contents
      $json = file_get_contents($fullFile."-json"); //get the json file
      //corresponding to the journal entry
      
      $decode = json_decode($json, true);
      //parse that json

      $percentArray = $decode['emotion']['document']['emotion'];
      //store the array of emotion data
      $emotionKeys = array_keys($percentArray);
      //get the various emotions
      
      $count = 0; //keep track of position in array
      foreach($percentArray as $percentage){
        $emotion = $emotionKeys[$count]; //store the emotion
        echo $emotion.": ".($percentage*100)."%<br />"; //show the emotion and the
        //percent emotion it is
        $count++; //onto next element
      }
      echo "</div><b><hr /></b>";
      //at the end of the file, close the div and start on a new line

    }
  }


?>

</body>

</html>
