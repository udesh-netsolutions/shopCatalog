<?php
  include "connection.php";
  session_start();

  $id = $_GET["editItemId"];



  if (isset($_POST["update"])) {
    $quantity = $_POST["quantity"];
    $query = "update cart set quantity = '".$quantity."' where id = '".$id."'";
    $res = mysqli_query($connection, $query);
    if($res) {
       header("location:manageCart.php");
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
     <title>Customer</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="styles.css">

     <script src="js/jquery.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

     <script src="js/mains.js"></script>


   </head>
   <body style="background-color: #777777;">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
         <a class="navbar-brand" href="customerPanel.php">Customer</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" href="customerInvoice.php">Invoice</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="customerPanel.php">Products</a>
             </li>
             <li class="nav-item">
               <a class="nav-link " href="manageCart.php">Mycart</a>
             </li>
             <li class="nav-item">
               <a class="nav-link " href="index.php">Logout</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     <h1 class="d-flex justify-content-center my-5">PLEASE UPDATE YOUR CART DETAILS</h1>
     <div class="container d-flex justify-content-center mt-5 text-white w-25 h-25 rounded">
       <form id="validateQuantity" class="" action="editItem.php?editItemId=<?php echo $id ?>" method="post">
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
