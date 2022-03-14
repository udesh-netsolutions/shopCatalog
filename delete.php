<?php
  include "connection.php";

  if(isset($_GET["deleteProduct"])) {
    $id = $_GET["deleteProduct"];
    $sql = "delete from products where product_id = '".$id."'";
    $result = mysqli_query($connection, $sql);
    if($result) {
      header("location:products.php");
    }
  }
  if (isset($_GET["removeItemId"])) {
    $id = $_GET["removeItemId"];
    $sql = "delete from cart where id = '".$id."'";
    $res = mysqli_query($connection, $sql);
    if($res) {
      header("location:manageCart.php");
    }
  }
  if (isset($_GET["removeItemByAd"])) {
    $id = $_GET["removeItemByAd"];
    $query = "select * from cart where id = '".$id."'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $sql = "delete from cart where id = '".$id."'";
    $res = mysqli_query($connection, $sql);
    if($res) {
      $customerId = $row['customer_id'];
      header("location:bill.php?getId=$customerId");
    }
  }
  if (isset($_POST['deleteBtn'])) {
    $id = $_POST['customerId'];
    $sql = "delete from customer where customer_id = '".$id."'";
    $result = mysqli_query($connection, $sql);

    if($result) {
      header("location:customerList.php");
    } else {
      echo "something went wrong";
    }
   }





 ?>
