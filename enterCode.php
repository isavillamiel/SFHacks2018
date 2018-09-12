<html lang="en">

<head>
  <link rel="stylesheet" href="css/input.css">


  <?php 
  //above area is for page specific js/css files
    include 'includes/header.php'; //contains appropriate javascript files and style sheets
  ?>
  
  
  
  <center>
    <h1>Enter Code</h1>
    <input type="number" id="input" class="Input-text" placeholder="Enter your code" />
    <br />
    <button onclick='checkConfirmationCode()' class='button'>Send</button>
    <!--Pressing this button will submit the phone and code to the journal page to process -->  

  </center>

    <?php 
    session_start();
  if(strlen($_SESSION['phone']) == 10){
    header('Location: journal.php');
  } //if the user is already logged in,
  //then redirect to the journal
  //has the additional effect of redirecting to journal
  //on press when logged in
  ?>



  <script>
    function checkConfirmationCode(){
      var input = document.getElementById("input").value; //gets the code
      //that the user submitted
      var phone = <?php echo $_GET['phone']; ?>; //gets the phone
      window.location = "journal.php?code="+input+"&phone="+phone;
      //after submit, redirect the user to the journal which will check the database for
      //the code
    }
  </script>
</body>

</html>