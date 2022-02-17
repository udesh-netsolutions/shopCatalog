<?php
  $dbhost = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "shopcatalog"; 
  $connection = mysqli_connect($dbhost, $username, $pass, $dbname);

  if(!$connection) {
    echo "not connected";
  }


 ?>
