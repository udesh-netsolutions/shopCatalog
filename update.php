<?php

  include "connection.php";
  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "update customer set first_name='".$firstName."', last_name='".$lastName."', email='".$email."', password='".$password."', mobile='".$mobile."' where customer_id='".$id."' ";
    $result = mysqli_query($connection, $sql);

    if($result) {
      header("location:customerList.php");
    }
  }


 ?>
