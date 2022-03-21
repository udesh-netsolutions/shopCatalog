<?php
  include "connection.php";
  session_start();

  $id = $_GET["getId"];
  $query = "select * from products where product_id = '".$id."'";
  $res = mysqli_query($connection, $query);

  $row = mysqli_fetch_assoc($res);
  $productImage = $row["product_image"];
  $productTitle = $row["product_title"];
  $productDesc = $row["product_desc"];
  $productPrice = $row["product_price"];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <script src="https://kit.fontawesome.com/56c1183ec7.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="styles.css">
  <title></title>
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
                   <a href="#">Edit Product</a>
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
      <h1>Update Product Details</h1>
      <form class="form" action="update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Add Product Image :</label>
          <input class="form-control rounded-left" type="file" name="img" value="<?php echo $productImage ?>" accept="image/*" required>
        </div>
        <div class="form-group">
          <label for="">Title for product :</label>
          <input class="form-control rounded-left" type="text" name="title" value="<?php echo $productTitle ?>" required>
        </div>
        <div class="form-group">
          <label for="">Product Description :</label>
          <textarea class="form-control rounded-left" name="productDesc" rows="8" cols="80" value="<?php echo $productDesc ?>" required></textarea>
        </div>
        <div class="form-group">
          <label for="">Price of Product :</label>
          <input class="form-control rounded-left" type="number" name="price" value="<?php echo $productPrice ?>" placeholder="In Rupees" required>
        </div>
        <div class="form-group">
          <button class="btn btn-secondary" type="submit" name="updateProduct">Update Details</button>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
