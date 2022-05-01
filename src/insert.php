<?php
  include "connection.php";

  if(isset($_POST["button"])) {
  $firstName = $_POST["fname"];
  $lastName = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $mobile = $_POST["mobile"];
  $passwordError = "";
  $confirmPasswordError = "";
  $emailError = "";
  $canLogin = true;

  if (strlen($password) < 6) {
    $passwordError = "password must be greater than 6 characters";
    $canLogin=false;
  }
  if ($password != $confirmPassword) {
    $confirmPasswordError = "password does not match";
    $canLogin=false;
  }
   if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
     $canLogin = false;
     $emailError = "Invalid email";
   }
  if ($canLogin) {
    $insertQuery = "insert into customer (first_name, Last_name, email, password, mobile) values ( '".$firstName."', '".$lastName."', '".$email."', '".$password."', '".$mobile."')";

    $res = mysqli_query($connection, $insertQuery);
    print_r($res);
    if($res) {
      ?>
      <script>
        alert("Account");
      </script>
  <?php
    header("location:index.php");
    } else {
      ?>
      <script>
        alert("data not submitted");
      </script>
      <?php
    }
  } else {
    header("location:customerForm.php?pError=$passwordError&confirmPassError=$confirmPasswordError&emailError=$emailError");
  }
  }



 ?>
