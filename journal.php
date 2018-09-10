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
      <?php 
    session_start();
		$number = $_SESSION['phone'];
    if(!isset($number)){
        include '../databases/cbtConnect.php';
        $phone = $_GET["phone"];
        $code = $_GET["code"];
        include 'checkCode.php';
        header('location: journal.php');
    }else{
	?>
<div class ="HOME">
	<a href='index.php'>
<div class ="logo">
           <img src="LOGO.png" height="300"></img>
        </div></a>
	

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
            alert("Journal entry successful\n"+data);
            jr.value = "";
          }
      });
      
    }
</script>
    <?php } ?>
    </body>

</html>
