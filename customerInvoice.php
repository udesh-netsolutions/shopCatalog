<?php
  include "connection.php";

  session_start();



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
         <script src="https://kit.fontawesome.com/56c1183ec7.js" crossorigin="anonymous"></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         <link rel="stylesheet" href="styles.css">
       </head>
       <body>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
           <div class="container-fluid">
             <a class="navbar-brand" href="customerPanel.php">Customer</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                 <li class="nav-item">
                   <a class="nav-link active" href="customerInvoice.php">Invoice</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="customerPanel.php">Products</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="manageCart.php">Mycart</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="index.php">Logout</a>
                 </li>
               </ul>
             </div>
           </div>
         </nav>
     <div class="container">
       <?php
         $query = "select * from customer_bills where customer_id = '".$_SESSION["customerId"]."'";
         $res = mysqli_query($connection, $query);
         $totalAmount = 0;
         if (mysqli_num_rows($res)>0) {?>
       <h1 class="d-flex justify-content-center my-5">Invoice</h1>
       <form class="" action="export.php" method="post">
          <input class="btn btn-outline-dark" type="submit" name="export" value="Export CSV">
       </form>
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
             <th>Invoice ID</th>
             <th>Customer Id</th>
             <th>Total Amount</th>
             <th>Status</th>
             <th>Date</th>
           </tr>
         </thead>
         <tbody>
           <?php while($row = mysqli_fetch_assoc($res)) { ?>
             <tr>
               <td><?php echo $row["invoice_id"] ?></td>
               <td><?php echo $row["customer_id"]; ?></td>
               <td>Rs. <?php echo $row["amount"];?></td>
               <td><?php if($row["status"] == false) {
                 echo "Pending";
               } else {
                 echo "Paid";
               } ?></td>
               <td>
                <?php echo  $row["date"];?>
               </td>
             </tr>
         <?php  } ?>
         </tbody>
       </table>
     <?php  } else { ?>
       <div class="container emptyCart">
         <img src="images/emptyCart.jpg" alt="">
         <h1>You didn't buy anything yet!</h1>
       </div>
     <?php } ?>
     </div>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
 </html>
