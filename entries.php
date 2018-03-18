<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css" th style="width:100px">
p {
    text-indent: 50px;
}
#HOME{
position: relative;
}
a:hover {
color: #2dccff;
}
.button2 {
   font-family: SFUIText-Medium;
    border: none;
    color: #4C7792;
    padding: 26px;
    text-align: center;
 display: block;
    text-decoration: none;
    font-size: 30px;
     margin-left: auto;
    margin-right: auto;
}
.button3 {
    
   background-color: #4C7792;
    border: none;
    color: white;
padding: 20px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 26px;
    margin-left: auto;
    margin-right: auto;
border-radius: 12px
}
.buttonAnalyze {border-radius: 12px;}
.logo img{
    display: block;
    margin-left: auto;
    margin-right: auto;
  
 	
  	
}
#Welcome{
	font-family: SFUIText-Medium;
	font-size: 32px;
	color: #4C7792;
	letter-spacing: 1.07px;
	text-align: center;
}
#inputField{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: 
    border-box;
    border: 2px solid #555;
    outline: none;
position: relative;
}
  
body{
    background-color: #f6f7e7;
    margin-top: -50px;  
}
</style>
<head>
<div class ="HOME">
<div class ="logo">
           <img src="LOGO.png" height="300"></img>
        </div>
	
</head>
<body>
  
<?php 
$dir = "journals/";
$files2 = scandir($dir, 1);
$count = 0;
while($count < count($files2)){
  $file = $files2[$count];
  if(strContains($file, "+14156908654")){
    
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
  $count++;
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
</body>
</div>

</html>
