<?php
  include "connection.php";
  session_start();

  if(isset($_GET["getId"])) {
    $id = $_GET["getId"];
    $query = "select * from products where product_id = '".$id."'";
    $res = mysqli_query($connection, $query);

  }


  $query = "select * from products";
  $res = mysqli_query($connection, $query);

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="styles.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark horizontal-nav">
      <!-- <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="admin.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
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
             <li class="activeSideLink">
               <a class="sidebarLinks" href="products.php">Products</a>
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
      <h1 class="d-flex">Products</h1>
      <form class="d-flex justify-content-end my-2" action="addProducts.php" method="">
        <button class="btn btn-primary" type="" name="button">Add Products</button>
      </form>
      <table class="table">
        <thead>
          <tr>
            <th scope = "col">Product Image</th>
            <th scope = "col">Title</th>
            <th scope = "col">Description</th>
            <th scope = "col">Price</th>
            <th scope = "col">Operations</th>
          </tr>
        </thead>
        <tbody>
          <?php   while($row = mysqli_fetch_array($res)) {?>

          <tr>
            <td><img src="<?php echo $row["product_image"] ?>" alt="cap" width="200px" height="200px"></td>
            <td><?php echo $row['product_title']; ?></td>
            <td><?php echo $row['product_desc']; ?></td>
            <td><?php echo $row['product_price']; ?></td>
            <td>
              <input class="btn btn-outline-dark" type="button" onclick="location.href='delete.php?deleteProduct=<?php echo $row['product_id'] ?>';" value="Delete"/>
              <input class="btn btn-outline-dark my-2" type="button" onclick="location.href='editProducts.php?getId=<?php echo $row['product_id'] ?>';" value="  Edit  " />
            </td>
          </tr>
         <?php  } ?>
        </tbody>
      </table>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
