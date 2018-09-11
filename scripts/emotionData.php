
<?php 
$dir = "journals/".$number."/";
$journalEntries = scandir($dir, 1);
$emotions = array("anger","joy","sadness","fear","disgust");
$emotionData = array();

$count = 0;
foreach($emotions as $emotion){
  $handle = fopen($dir.$emotion.".txt", "r");
  $fullString = "";
  while (($line = fgets($handle)) !== false) {
    $lineSplit = explode("|", $line);
    $data = $lineSplit[0];
    
    $date = $lineSplit[1];
    $dateSplit = explode("-", $date);
    $fixedDate = $dateSplit[0].", ".($dateSplit[1]-1).", ".$dateSplit[2];

    $fullString= $fullString.",{x: new Date(".$fixedDate."), y: $data}";
      // process the line read.
  }
  fclose($handle);
  $fullString[0] = " ";
  $emotionData[$count] = $fullString;
  $count++;
}  //*/

$count = 0;
while($count < count($emotionData)){
  $chartData = file_get_contents("scripts/chartData.txt");
  $chartData = str_replace("*emotion*", $emotions[$count], $chartData);
  $chartData = str_replace("*data*", $emotionData[$count], $chartData);
  if($count != count($emotionData)-1){
    echo $chartData.",\n";

  }else{
    echo $chartData."\n";
  }
  $count++;
}

?>