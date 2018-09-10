<?php 
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