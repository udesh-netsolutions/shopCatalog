<?php
session_start();
  include "connection.php";

  //$customerId = $_GET["customerId"];
  $query = "select * from products";
  $res = mysqli_query($connection, $query);
  if(isset($_GET["itemAdded"])) {
    echo "<div class='alert alert-success alert-dismissible'> <strong>Item Added to cart</strong><a href='' class='close btn' data-dismiss='alert' aria-label='close' style='text-align:right;'>&times;</a></div>";

  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
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

         </script>
       </head>
       <body>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
           <div class="container-fluid">
             <a class="navbar-brand" href="customerPanel.php">Customer,(<?php echo $_SESSION["firstName"]; ?>)</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                 <li class="nav-item">
                   <a class="nav-link" href="customerInvoice.php">Invoice</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" href="customerPanel.php">Products</a>
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
         <div class="container">
           <?php if(mysqli_num_rows($res)>0) {
             while($row = mysqli_fetch_assoc($res)) { ?>
               <form class="" action="manageCart.php?productId=<?php echo $row["product_id"] ?>" method="post">
                 <div class="card w-75 mt-4 mx-5">
                   <div class="row d-flex">
                     <div class="col-md-4">
                       <img src="<?php echo $row["product_image"] ?>" alt="image" height="200px" width="200px">
                     </div>
                     <div class="col-md-8">
                      <h3><?php echo $row["product_title"];?></h3>
                      <p><?php echo $row["product_desc"];?></p>
                      <h5>Rs.<?php echo $row["product_price"];?></h5>
                      <input type="number" name="quantity" min="1" value="1" class="form-control w-25">
                      <input type="hidden" name="productName" value="<?php echo $row["product_title"] ?>">
                      <input type="hidden" name="productDesc" value="<?php echo $row["product_desc"] ?>">
                      <input type="hidden" name="productPrice" value=<?php echo $row["product_price"] ?>>
                      <button class="btn btn-dark" type="submit" name="button">Add to cart</button>

                     </div>
                   </div>
                 </div>
               </form>

            <?php }


           } ?>

         </div>
         <script src="js/popper.js"></script>
         <script src="js/bootstrap.min.js"></script>
       </body>
     </html>
   </body>
 </html>
