<?php
  include "connection.php";

  $id = $_GET["getId"];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
   </head>
   <body class="">
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
     <h1 class="d-flex justify-content-center my-5">Invoice</h1>
     <?php
       $query = "select * from cart where customer_id = '".$id."'";
       $res = mysqli_query($connection, $query);
       $totalAmount = 0;
      ?>
     <div class="container">
       <div class="d-flex justify-content-end">
         <h4 id="current_date"></h4>
           <script>
           let date = new Date();
           let year = date.getFullYear();
           let month = date.getMonth() + 1;
           let day = date.getDate();
           document.getElementById("current_date").innerHTML = "Date: " + month + "/" + day + "/" + year;
           </script>

       </div>
       <table class="table table-bordered table-striped">
         <thead>
           <tr>
             <th>Product Name</th>
             <th>Product price</th>
             <th>Product quantity</th>
             <th>Total Price</th>
             <th>Operation</th>
           </tr>
         </thead>
         <tbody>
           <?php while($row = mysqli_fetch_assoc($res)) { ?>
             <tr>
               <td><?php echo $row["product_name"]; ?></td>
               <td>Rs. <?php echo $row["product_price"]; ?></td>
               <td><?php echo $row["quantity"]; $productAmount = $row["product_price"]*$row["quantity"]; $totalAmount += $productAmount?></td>
               <td>Rs. <?php echo  $productAmount;?></td>
               <td>
                 <input class="btn btn-sm btn-outline-warning"type="button" name="" value="Edit" onclick="location.href='editItemByAd.php?editItemId=<?php echo $row["id"] ?>'">
                 <input class="btn btn-sm btn-outline-danger"type="button" name="" value="Remove" onclick="location.href='delete.php?removeItemByAd=<?php echo $row["id"] ?>'">
               </td>
             </tr>
         <?php  } ?>
         </tbody>
         <tfoot>
           <td></td>
           <td></td>
           <td></td>
           <td>Rs. <?php echo $totalAmount ?></td>
         </tfoot>
       </table>
       <input class="btn btn-outline-info invoiceBtn" type="submit" name="invoice" onclick="location.href='invoice.php'" value="Generate invoice">
     </div>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
 </html>
