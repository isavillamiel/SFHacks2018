<!DOCTYPE html>
<html>


<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
	  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 

  </head>
  <body>
    
    
        <center>
	<a href='index.php'>
           <img src="LOGO.png"></img>
        </a>
	
</center>
  
  
      <?php 
    session_start();
		$number = $_SESSION['phone'];
    if(!isset($number)){
        include '../databases/cbtConnect.php';
        $phone = $_GET["phone"];
        $code = $_GET["code"];
        include 'scripts/checkCode.php';
      echo "<script>location.reload();</script>";
    }
	?>

  
	<div id='Welcome'>
   		Welcome
	</div>
  
	<br />
	

	<center>
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

    
<script>
  
		function analyze(){
			journal = document.getElementById('entry');
			jqStuff(journal.value, journal);
		}
	    function jqStuff(text, jr){
        $.ajax({
          type: 'post',
          url: "scripts/writer.php",
          data: {
              'text': text,
              'number': <?php echo $number; ?>
          },
          cache: false,
          success: function(data) {
            alert("Journal entry successful\n"+data);
            jr.value = "";
          }
      });
      
    }
</script>
    </body>

</html>
