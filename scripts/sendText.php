<?php 

  include '../../databases/cbtConnect.php';
  include '../includes/functions.php';

  $phone = $_POST['phone']; //get the phone number that the user submitted
  $phone = str_replace(" ", "", $phone);
  $phone = str_replace("-", "", $phone); //reformat the phone
  if(strlen($phone) == 10){ //if the phone is not 
    //10 characters, indicate an error
    $code = genRandomString(4); //the confirmation code
    //sent to the user
    $time = time(); //get the time submitted
    //for the time check on confirmation
    shell_exec("python confirmationCode.py $phone $code");
    //send the code to the user
    
    $phone = mysqli_real_escape_string($connect, $phone); //try to prevent injection
    
    $sql  = "INSERT INTO `codes` (`id`, `phone`, `code`, `datetime`) VALUES (NULL, '$phone', '$code', '$time')";
    $query = mysqli_query($connect, $sql);
    //insert the into the database
    echo $phone;
  }else{
    echo "E";
  }

  

?>