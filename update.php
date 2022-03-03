<?php

  include "connection.php";
  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $mobile = $_POST['mobile'];
    $passwordError = "";
    $confirmPasswordError = "";
    $emailError = "";
    $canLogin = true;

    if (strlen($password) < 6) {
      $passwordError = "password must be greater than 6 characters";
      $canLogin=false;
    }
    if (!($password == $confirmPassword)) {
      $confirmPasswordError = "password does not match";
      $canLogin=false;
    }
     if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
       $canLogin = false;
       $emailError = "Invalid email";
     }

     if($canLogin) {
       $sql = "update customer set first_name='".$firstName."', last_name='".$lastName."', email='".$email."', password='".$password."', mobile='".$mobile."' where customer_id='".$id."' ";
       $result = mysqli_query($connection, $sql);

       if($result) {
         header("location:customerList.php");
       }
       } else {
         header("location:edit.php?pError=$passwordError&confirmPassError=$confirmPasswordError&emailError=$emailError&getId=$id");
     }


  } else {
    if(isset($_POST["updateProduct"])) {
      $id = $_GET["id"];
      $productImage = $_POST["img"];
      $productTitle = $_POST["title"];
      $productDesc = $_POST["productDesc"];
      $productPrice = $_POST["price"];

      $query = "update products set product_image = '".$productImage."', product_title = '".$productTitle."',product_desc = '".$productDesc."',product_price = '".$productPrice."' where product_id = '".$id."'";
      $res = mysqli_query($connection, $query);

      if($res) {
        header("location:products.php");
      } else {

      }
    }
  }


 ?>
