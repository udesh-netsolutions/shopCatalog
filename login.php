<?php
  include "connection.php";



  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
      header("location:index.php?error=fill your credentials");
    } elseif (empty($password)) {
      header("location:inderx.php?error=fill your credentials");
    }

    $sql = "select * from customer where email = '".$email."' and password = '".$password."'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['email'] === $email && $row['password'] === $password) {
        echo "logged in";
      } else {
        echo "wrong password and email";
      }
    } else {
      echo "not found any account";
    }



  }



 ?>
