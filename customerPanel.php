<?php
session_start();
  include "connection.php";

  //$customerId = $_GET["customerId"];
  $query = "select * from products";
  $res = mysqli_query($connection, $query);

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
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                   <a class="nav-link active" href="customerInvoice.php">Invoice</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" href="manageCart.php">Mycart</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link active" href="index.php">Logout</a>
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
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
       </body>
     </html>
   </body>
 </html>
