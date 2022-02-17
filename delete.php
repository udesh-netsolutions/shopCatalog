<?php
  include "connection.php";

  $id = $_GET['del'];
  $sql = "delete from customer where customer_id = '".$id."'";
  $result = mysqli_query($connection, $sql);

  if($result) {
    header("location:customerList.php");
  } else {
    echo "something went wrong";
  }



 ?>
