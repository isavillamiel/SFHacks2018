<html lang="en">
  
<head>
  <link rel="stylesheet" href="css/input.css">
  <?php 
  //above area is for page specific js/css files
    include 'includes/header.php'; //contains appropriate javascript files and style sheets  
    session_start();
    $phone = $_SESSION['phone'];
    if(strlen($phone) == 10){
      header('Location: journal.php');
    } //redirect user if they are logged in
  
  ?>
  <center>
    <br />
    <h1>Enter Phone</h1> <!-- Give users instructions -->
    <input type="text" id="input" class="Input-text" placeholder="Enter your phone">
    <br />
    <button onclick='sendConfirmationCode()' class='button'>Send</button>
    <br /> Ex: 123 456-7890 <!--Show user expected format -->
  </center>
  <script>
    function sendConfirmationCode(){
      var input = document.getElementById("input").value;
      //get the users phone number
      $.ajax({
        type: 'post',
        url: "scripts/sendText.php",
        data: {
            'phone': input
        },
        cache: false,
        success: function(data) {
          if(data == "E"){ //if there was an error
            document.getElementById("input").value = "";
            //clear the phone field
            alert("Please enter in correct format");
            //inform the user of their mistake
          }else{
            window.location = "enterCode.php?phone="+data;
            //take the user to the page where they can enter their code
          }
          
        }
    });
    }
  </script>
</body>

</html>