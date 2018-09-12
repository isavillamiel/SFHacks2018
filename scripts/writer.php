<?php 
  include '../includes/functions.php';

  $content = $_POST['text'];
  $number = $_POST['number'];
  //get the data from the text

  $today = date("Y-m-d|h:i");
  //format the date in case there are multiple entries
  
  $dir = "../journals/$number/";
  //get the directory that the user has their
  //json, data, and journals

  if(!file_exists($dir)){
    mkdir($dir); //make the directory
    //that all of the json, data, and journals will be stored in
  }
  $handle = fopen($dir.$today, 'w') or die('Cannot open file:  '.$today);
  //open the file
  
  $tmpFile = genRandomString(4).".txt";
  //temporarily store the data in a file in order to
  //pass to the python script for emotion processing

  file_put_contents("../tmp/".$tmpFile, ""); //empty the file
  //just in case
  file_put_contents("../tmp/".$tmpFile, $content);
  //put the journal entry into the tmp file

  $command = "python emotion.py $tmpFile";
  $output = shell_exec($command);
  //get the sentiment analysis from the python script
  
  $data = $content."\n\n";
  fwrite($handle, $data); //put the journal
//into a permenant location for review of entries
  fclose($handle); //close the file

  file_put_contents($dir.$today."-json", $output);
  //put the sentiment analysis in a json file
  $decode = json_decode($output, true); //parse through the json

  $percentArray = $decode['emotion']['document']['emotion']; //get
//the emotion data in an array for easy access
  $emotions = array("anger","joy","sadness","fear","disgust");
  //store the 5 emotions
  foreach($emotions as $emotion){
      //loop through each emotion
      $handle = fopen($dir.$emotion.".txt", 'a');
      //open the emotion data file in append mode
      $todaySplit = explode("|", $today);
      //seperate the date into the actual date and the hours and minutes
      fwrite($handle, $percentArray[$emotion]."|".$todaySplit[0]."\n");
      //write the emotion data from this journal into the data file
      fclose($handle); //close the file
      
  }      
  //the data files are used for charting

  
?>