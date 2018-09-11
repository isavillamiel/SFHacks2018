<html lang="en">

<head>
  <link rel="stylesheet" href="css/input.css">


  <?php 
    include 'includes/header.php';
  ?>
  
  
  
  <center>
    <br />
  <h1>
    Enter Code
  </h1>
    <input type="number" id="input" class="Input-text" placeholder="Enter your code">
  <br /><button onclick='checkConfirmationCode()' class='button'>
    Send
  </button>
    </center>

    <?php 
    session_start();
  if(strlen($_SESSION['phone']) == 10){
    header('Location: journal.php');
  }
  ?>



  <script>
    function checkConfirmationCode(){

      var input = document.getElementById("input").value;
      var phone = <?php echo $_GET['phone']; ?>;
      window.location = "journal.php?code="+input+"&phone="+phone;

   
}
  </script>
</body>

</html>