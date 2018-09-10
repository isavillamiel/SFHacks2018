<html lang="en">

<head>

  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="http://gigahornet.com/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/input.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
</head>

<body translate="no">
  <center>
    <a href='index.php'>
               <img src="LOGO.png"></img>
    </a>
    <br />
  <h1>
    Enter Code
  </h1>
    <input type="number" id="input" class="Input-text" placeholder="Enter your code">
  <br /><button onclick='checkConfirmationCode()' class='button'>
    Send
  </button>
  <?php 
    session_start();
  ?>



  </center>
  <script>
    function checkConfirmationCode(){

      var input = document.getElementById("input").value;
      var phone = <?php echo $_GET['phone']; ?>;
      window.location = "journal.php?code="+input+"&phone="+phone;

   
}
  </script>
</body>

</html>