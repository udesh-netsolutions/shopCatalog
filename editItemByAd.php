<?php
  include "connection.php";
  session_start();

  $id = $_GET["editItemId"];

  if (isset($_POST["update"])) {
    $quantity = $_POST["quantity"];
    $query = "update cart set quantity = '".$quantity."' where id = '".$id."'";
    $res = mysqli_query($connection, $query);
    if($res) {
       $sql = "select * from cart where id = '".$id."'";
       $res = mysqli_query($connection, $sql);
       $row = mysqli_fetch_assoc($res);
       $customerId = $row['customer_id'];
       header("location:bill.php?getId=$customerId");
    }
  }

  $query = "select * from cart where id='".$id."'";
  $res = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($res)
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   </head>
   <body style="background-color: #777777;">
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
     <h1 class="d-flex justify-content-center my-5">PLEASE UPDATE YOUR CART DETAILS</h1>
     <div class="container d-flex justify-content-center mt-5 text-white w-25 h-25 rounded">
       <form class="" action="editItemByAd.php?editItemId=<?php echo $id ?>" method="post">
         <label for="">Product Name: </label><br>
         <input class="my-2 rounded" type="text" name="" value="<?php echo $row["product_name"] ?>" readonly><br>
         <label for="">Product Price: </label><br>
         <input class="my-2 rounded" type="text" name="" value="<?php echo $row["product_price"] ?>" readonly><br>
         <label for="">Product Quantity: </label><br>
         <input class="my-2 rounded" type="number" min="1" name="quantity" value="<?php echo $row["quantity"] ?>"><br>
         <button class=" btn btn-dark" type="submit" name="update">Update</button>
       </form>
     </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
 </html>
