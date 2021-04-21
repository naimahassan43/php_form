<?php

  $db = mysqli_connect("localhost","root","","php_form");

  if($db){
    // echo "Server connection established";
  }
  else{
    die("Server connection failed" . mysqli_error($db));
  }
?>