<html lang="en">
  
<head>
  <link rel="stylesheet" href="css/input.css">

  <?php 
    include 'includes/header.php';
  ?>
   <?php 

    session_start();
  $phone = $_SESSION['phone'];
  if(strlen($phone) == 10){
    //echo "<script>alert('$phone')</script>";
    header('Location: journal.php');
  }
  ?>
  <center>
      <br />
    <h1>
    Enter Phone
  </h1>
    <input type="text" id="input" class="Input-text" placeholder="Enter your phone">
  <br /><button onclick='sendConfirmationCode()' class='button'>
    Send
  </button>
  

    <br /> Ex: 123 456-7890
  
  
  </center>
  <script>
    function sendConfirmationCode(){
      var input = document.getElementById("input").value;
      $.ajax({
        type: 'post',
        url: "scripts/sendText.php",
        data: {
            'phone': input
        },
        cache: false,
        success: function(data) {
          if(data == "E"){
            document.getElementById("input").value = "";
            alert("Please enter in correct format");
          }else{
            window.location = "enterCode.php?phone="+data;
          }
          
        }
    });
    }
  </script>
</body>

</html>