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
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;


}

.button3 {
    background-color: #4C7792;
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
border-radius: 12px
}

.buttonAnalyze {border-radius: 12px;}

.logo img{
	float: none;
	right: 50%;
        margin-left: 36.7%;
 	
  	
}


#Welcome{

	font-family: SFUIText-Medium;

	font-size: 26px;

	color: #4C7792;

	letter-spacing: 1.07px;
	position: absolute;
  	left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%)
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
	  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
<head>
	<?php 
		$number = $_GET['number'];
		$number = "+14156908654";
	?>
<div class ="HOME">
	<a href='index.php'>
<div class ="logo">
           <img src="LOGO.png" height="300"></img>
        </div></a>
	

</head>
<body>
	<div id='Welcome'>
   		Welcome, habibi.
	</div>
  
	<br>
	<br>
	<br>	
	<br>
	

	<center><strong>
	<div class = 'inputField'>
	<textarea  style="font-size:35px; width: 100%" id='entry' rows= '10' >
	</textarea
	</div>
	<br>
	<br>
	<a href="#" onclick='analyze()' class="button3">Analyze</a>
	<br>
<br>
	<a href="#" class="button2">Insights</a>
	<a href="entries.php" class="button2">Entries</a>
</body>
</div>
<script>
		function analyze(){
			journal = document.getElementById('entry');
			jqStuff(journal.value, journal);
			
		}
	    function jqStuff(text, jr){
      $.ajax({
        type: 'post',
        url: "writer.php",
        data: {
            'text': text,
            'number': <?php echo $number; ?>
        },
        cache: false,
        success: function(data) {
          alert("Journal entry successful");
					jr.value = "";
				}
    });
      
    }
</script>
</html>
