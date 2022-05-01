<?php
  include "connection.php";
  session_start();
  if(isset($_POST["button"])) {
    $imgName = $_FILES["img"]["name"];
    $tmpName = $_FILES["img"]["tmp_name"];
    $folder = "images/" . $imgName;
    move_uploaded_file($tmpName, $folder);
    $productTitle = $_POST["title"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["price"];

    $query = "insert into products (product_image, product_title, product_desc, product_price) values ('".$folder."', '".$productTitle."', '".$productDesc."', '".$productPrice."')";
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark horizontal-nav">
        <a class="navbar-brand" href="#">
          <img src="images/logo.png" alt="logo" width="200" height="150">
        </a>
        <a class="navbar-brand navbar-name" href="">Admin,<?php echo $_SESSION["firstName"]; ?></a>
      </div>
    </nav>
      <div class="vertical-nav" id="sidebar">
       <div class="py-4 px-3 mb-4">
         <div class="sidebar">
           <ul>
             <li class="">
               <a class="sidebarLinks" href="products.php">Products</a>
               <ul class="sublink">
                 <li class="activeSideLink">
                   <a href="#">Add Product</a>
                 </li>
             </li>
             <li class="">
               <a class="sidebarLinks" href="customerList.php">Customers</a>
             </li>
             <li class="logoutLink">
               <a class="sidebarLinks " href="index.php">Logout <img src="images/login.png" alt="logout"></a>
             </li>
           </ul>
         </div>
       </div>
      </div>
    <div class="container page-content">
      <h1>Add Products</h1>
      <form class="" action="addProducts.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <h5>Add Product Image:</h5>
          <input class="form-control rounded-left" type="file" name="img" value="" accept="image/*" required>
        </div><br>
        <div class="form-group">
          <h5>Title for Product:</h5>
          <input class="form-control rounded-left" type="text" name="title" value="" required>
        </div>
        <div class="form-group">
          <h5>Product Description:</h5>
          <textarea class="form-control rounded-left" name="productDesc" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group">
          <h5>Price of Product:</h5>
          <input class="form-control rounded-left" type="number" name="price" value="" placeholder="In Rupees" required>
        </div>
        <div class="form-group">
          <button class="btn btn-secondary" type="submit" name="button">Add Product</button>
        </div>
      </form>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
