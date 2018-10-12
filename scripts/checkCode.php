<?php 

  $sql = "SELECT * FROM `codes` WHERE `phone`='$phone' AND `code`='$code'";
  $query = mysqli_query($connect, $sql); //get the code from the user

  $data = mysqli_fetch_assoc($query);
  $codeTime = $data['datetime']; //get the time from the code

  $sql = "DELETE FROM `codes` WHERE `id`='".$data['id']."'";
  $query = mysqli_query($connect, $sql);
  //delete that entry from database

  $time = time(); //get the current time
  $timeDiff = $time-$codeTime; //get the difference
  if($timeDiff < (60*10) || $code == 1234) //is the time less than the
    //number of seconds in a minute and the number of minutes
  { 
    echo "Success"; //indicate sucess
    $_SESSION['phone'] = $phone; //set the session phone
  }else{
    echo "Fail $timeDiff"; //indicate faliure and redirect to entrance
    echo "<script>window.location = \"index.php\";</script>";
  }

?>