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
    <?php 
    session_start();
  ?>
  <center>
    <a href='index.php'>
               <img src="LOGO.png"></img>
    </a>
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
        url: "sendText.php",
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