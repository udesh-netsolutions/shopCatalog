<?php
  include "connection.php";


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="products.php">Products</a>
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
              <input class="btn btn-outline-dark" type="button" onclick="location.href='editProducts.php?getId=<?php echo $row['product_id'] ?>';" value="  Edit  " />
            </td>
          </tr>
         <?php  } ?>
        </tbody>
      </table>
      <input class="btn btn-primary" type="button" onclick="location.href='addProducts.php'" name="" value="Add Products">
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
