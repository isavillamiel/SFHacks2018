<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
	  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 

  </head>
  
  

	
<body>
    <div class ="HOME">
	<a href='index.php'>
<div class ="logo">
           <img src="LOGO.png" height="300"></img>
        </div></a>
  
<?php 
  session_start();
  $number = $_SESSION['phone'];
$dir = "journals/";
$journalEntries = scandir($dir, 1);
$count = 0;
foreach($journalEntries as $entry){
  $file = $entry;
  //TODO: impractical to go through each file,
  //give each number their own folder
  if(strContains($file, $number)){
    $fin = fopen($dir.$file, "r") or die("Unable to open file!");
    $printJson = false;
    $json = "";
    $x = fgets($fin);

    while (!feof($fin)) {
      if(strContains($x, "{") && !$printJson){
        $printJson = true;
      }
      if($printJson){
        $json = $json.$x;
      }else{
        echo $x;
      }
      $x = fgets($fin);
    }
    
    //echo "<br />".$json;
    $decode = json_decode($json, true);

    echo "<br />Anger: ".($decode['emotion']['document']['emotion']['anger']*100)."%";
    echo "<br />Joy: ".($decode['emotion']['document']['emotion']['joy']*100)."%";
    echo "<br />Sadness: ".($decode['emotion']['document']['emotion']['sadness']*100)."%";
    echo "<br />Fear: ".($decode['emotion']['document']['emotion']['fear']*100)."%";
    echo "<br />Disgust: ".($decode['emotion']['document']['emotion']['disgust']*100)."%";
    echo "<hr />";
    fclose($fin);//*/
  }
}


function strContains($toSearchIn, $toSearchWith)
{
    if (strpos($toSearchIn, $toSearchWith) === false) {
        return false;
    } else {
        return true;
    }
}
?>
  </div>

</body>

</html>
