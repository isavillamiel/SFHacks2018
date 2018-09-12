
<?php 
$dir = "journals/".$number."/";
$emotions = array("anger","joy","sadness","fear","disgust");
//stores all 5 emotions for use in the program
$emotionData = array();

$count = 0;
foreach($emotions as $emotion){ //go through all
  //of the emotions
  $handle = fopen($dir.$emotion.".txt", "r");
  //open the file and go line by line
  $fullString = ""; //this stores the data
  //in a format that javascript will recognize
  while (($line = fgets($handle)) !== false) {
    $lineSplit = explode("|", $line);
    //the data has the emotion data on one side
    //and the date on the other side
    
    $data = $lineSplit[0]; //this is the emotion data 
    $date = $lineSplit[1]; //this is the date corresponding to the emotional data
    
    $dateSplit = explode("-", $date); //this splits up the date into 3 parts
   
    $fixedDate = $dateSplit[0].", ".($dateSplit[1]-1).", ".$dateSplit[2];
    //this formats the data
    
    $fullString= $fullString.",{x: new Date(".$fixedDate."), y: $data}";
      //append the line to the string
      //if this is the first string then 
      //the comma will be added as the first character
  } //go through each line of the file
  fclose($handle);
  //close the file
  $fullString[0] = " ";//remove the comma at the beginning
  $emotionData[$count] = $fullString; //store this in the data array
  $count++; //move onto next element in array
}  //*/

$count = 0; //reset the count
while($count < count($emotionData)){
  $chartData = file_get_contents("scripts/chartData.txt"); //each will serve
  //as a line object
  $chartData = str_replace("*emotion*", $emotions[$count], $chartData);
  //replace the line name with the emotion
  $chartData = str_replace("*data*", $emotionData[$count], $chartData);
  //replace the data with the fullString
  if($count != count($emotionData)-1){ //if
    //it is not the last element,
    //add the comma
    echo $chartData.",\n";

  }else{//if it is the last element
    //then do not add the comma
    echo $chartData."\n";
  }
  $count++; //onto next element in the arrays
}

?>