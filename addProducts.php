<?php
  include "connection.php";

  if(isset($_POST["button"])) {
    $productImage = $_POST["img"];
    $productTitle = $_POST["title"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["price"];

    $query = "insert into products (product_image, product_title, product_desc, product_price) values ('".$productImage."', '".$productTitle."', '".$productDesc."', '".$productPrice."')";
    $res = mysqli_query($connection, $query);
    if($res) {
      header("location:products.php");
    }
  }

 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="customerList.php">Customers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <h1>Add Products</h1>
      <form class="form-inline" action="addProducts.php" method="post">
        <div class="form-group">
          <label for="">Add Product Image :</label>
          <input class="form-control rounded-left" type="file" name="img" value="" accept="image/*" required>
        </div>
        <div class="form-group">
          <label for="">Title for product :</label>
          <input class="form-control rounded-left" type="text" name="title" value="" required>
        </div>
        <div class="form-group">
          <label for="">Product Description :</label>
          <textarea class="form-control rounded-left" name="productDesc" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group">
          <label for="">Price of Product :</label>
          <input class="form-control rounded-left" type="number" name="price" value="" placeholder="In Rupees" required>
        </div>
        <div class="form-group">
          <button class="btn btn-secondary" type="submit" name="button">Add Product</button>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
