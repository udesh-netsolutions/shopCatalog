<?php
  $dbhost = "db";
  $username = "root";
  $pass = "example";
  $dbname = "mysql"; 
  $connection = mysqli_connect($dbhost, $username, $pass, $dbname);

  if(!$connection) {
    echo "not connected";
  }


 ?>
