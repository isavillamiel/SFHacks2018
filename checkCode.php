<?php 

  $sql = "SELECT * FROM `codes` WHERE `phone`='$phone' AND `code`='$code'";
  $query = mysqli_query($connect, $sql);

  $data = mysqli_fetch_assoc($query);
  $codeTime = $data['datetime'];   

  $sql1 = "DELETE FROM `codes` WHERE `id`='".$data['id']."'";
  $query = mysqli_query($connect, $sql1);
  $time = time();
  $timeDiff = $time-$codeTime;
  if($timeDiff < (60*10)){
    echo "Success"; //redirect now
    $_SESSION['phone'] = $phone;
  }else{
    echo "Fail $timeDiff";
  }

?>