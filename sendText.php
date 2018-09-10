<?php 
  include '../databases/cbtConnect.php';
  $phone = $_POST['phone'];
  $phone = str_replace(" ", "", $phone);
  $phone = str_replace("-", "", $phone);
  if(strlen($phone) == 10){
    $code = genRandomString(4);
    $time = time();
    //shell_exec("python confirmationCode.py $phone $code");
    $phone = mysqli_real_escape_string($connect, $phone);
    
    $sql  = "INSERT INTO `codes` (`id`, `phone`, `code`, `datetime`) VALUES (NULL, '$phone', '$code', '$time')";
    $query = mysqli_query($connect, $sql);
    echo $phone;
  }else{
    echo "E";
  }

  

  function genRandomString($length) 
    //generates a random string of numbers
  { //used for confirmation code
      $characters = "123456789";
      $real_string_length = strlen($characters) ;     
      $string="";
      for ($p = 0; $p < $length; $p++) 
      {
          $string .= $characters[mt_rand(0, $real_string_length-1)];
      }
      return strtolower($string);
  }
?>