<?php
session_start();
  include "connection.php";

  //$customerId = $_GET["customerId"];

  if(isset($_POST["request"])) {
    $sql = "update cart set request = 'Requested' where customer_id='".$_SESSION["customerId"]."'";
    $result = mysqli_query($connection, $sql);
    if($result) {
      header("location:manageCart.php");
    }
  }
  if(isset($_POST["removeRequest"])) {
    $sql = "update cart set request = null where customer_id='".$_SESSION["customerId"]."'";
    $result = mysqli_query($connection, $sql);
    if($result) {
      header("location:manageCart.php");
    }
  }
  if(isset($_POST["button"])) {
    if (isset($_session["cart"])) {
      $sessionArrayId = array_column($_SESSION["cart"], "productId");


    } else {
      $sessionCartArray = array(
        "productId" => $_GET["productId"],
        "name" => $_POST["productName"],
        "desc" => $_POST["productDesc"],
        "price" => $_POST["productPrice"],
        "quantity" => $_POST["quantity"]
      );

      $_SESSION["cart"] = $sessionCartArray;
    }

    $query = "insert into cart (customer_id, product_id, product_name, product_price, quantity) values ('".$_SESSION["customerId"]."', '".$_SESSION['cart']['productId']."', '".$_SESSION['cart']['name']."', '".$_SESSION['cart']['price']."', '".$_SESSION['cart']['quantity']."')";
    $res = mysqli_query($connection, $query);
    if ($res) {
      // header("location:customerPanel.php");
      // echo '<script>alert("item added to cart")</script>';

      // echo "<script>
      //   alert('Item added to cart');
      //   window.location.href='customerPanel.php';
      //   </script>";

    // echo '<script>
    //   document.write("<div class='alert alert-success alert-dismissible'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> This alert box could indicate a successful or positive action.</div>");
    //   </script>';


      // echo "<script>setTimeout(\"location.href = 'customerPanel.php?itemAdded=true';\",0.1);</script>";

      echo "<script>window.location.href = 'customerPanel.php?itemAdded=true';</script>";

    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="customerPanel.php">Customer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="customerInvoice.php">Invoice</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="customerPanel.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="manageCart.php">Mycart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <?php
        $query = "select * from cart where customer_id = '".$_SESSION["customerId"]."'";
        $res = mysqli_query($connection, $query);
        if(mysqli_num_rows($res)>0) {
       ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Product price</th>
            <th>Product quantity</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
              <td><?php echo $row["product_name"]; ?></td>
              <td>Rs. <?php echo $row["product_price"]; ?></td>
              <td><?php echo $row["quantity"]; ?></td>
              <td>
                <input class="btn btn-sm btn-warning"type="button" name="" value="Edit" onclick="location.href='editItem.php?editItemId=<?php echo $row["id"] ?>'">
                <input class="btn btn-sm btn-danger"type="button" name="" value="Remove" onclick="location.href='delete.php?removeItemId=<?php echo $row["id"] ?>'">
                <?php echo $row["request"]; ?>
              </td>
            </tr>
        <?php  } ?>
        </tbody>
      </table>
      <form class="" action="manageCart.php?removeItemId=<?php echo $_SESSION["customerId"] ?>" method="post">
        <button class="btn btn-dark" type="submit" name="request">Request Bill</button>
      </form>
      <form class="" action="manageCart.php?removeItemId=<?php echo $_SESSION["customerId"] ?>" method="post">
        <button class="btn btn-outline-dark" type="submit" name="removeRequest">Remove Request</button>
      </form>
    <?php } else { ?>
      <div class="container emptyCart">
        <img src="images/emptyCart.jpg" alt="">
        <h1>Your Cart is empty!</h1>
        <p>Add items to it now</p>
        <a class="btn btn-outline-dark" href="customerPanel.php">Shop now</a>
      </div>

    <?php } ?>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
