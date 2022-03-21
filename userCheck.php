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

      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        header("location:index.php?error='invalid email or password'");
      }

      $sql = "select * from customer where email = '".$email."' and password = '".$password."'";
      $result = mysqli_query($connection, $sql);



      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password && $row["status"] == true) {
          session_start();
          $_SESSION["firstName"] = $row["first_name"];
          $_SESSION["customerId"] = $row["customer_id"];
          $_SESSION["email"] = $row["email"];
          $_SESSION["status"] = $row["status"];
          header("location:customerList.php");
      } elseif ($row['email'] === $email && $row['password'] === $password && $row["status"] == false) {
          session_start();
          $_SESSION["customerId"] = $row["customer_id"];
          $_SESSION["firstName"] = $row["first_name"];
          $_SESSION["email"] = $row["email"];
          $_SESSION["status"] = $row["status"];
          //$customerId = $row["customer_id"];
          header("location:customerPanel.php");
      } else {
            echo "wrong password and email";
          }
        } else {
          header("location:index.php?error=invalid email or password");
        }



      }


 ?>
