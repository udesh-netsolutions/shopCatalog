<?php
  include "connection.php";
  session_start();

  $id = $_GET["getId"];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/56c1183ec7.js" crossorigin="anonymous"></script>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
       <div class="page-content">
         <h1 class="d-flex justify-content-center my-5">Invoice No. <?php echo rand(100, 1000); ?></h1>
       </div>
     <?php
       $query = "select * from cart where customer_id = '".$id."'";
       $res = mysqli_query($connection, $query);
       $totalAmount = 0;
       $count = 1;
      ?>
     <div class="container page-content">
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
             <th>Sr No.</th>
             <th>Product Name</th>
             <th>Product price</th>
             <th>Product quantity</th>
             <th>Total Price</th>
           </tr>
         </thead>
         <tbody>
           <?php while($row = mysqli_fetch_assoc($res)) { ?>
             <tr>
               <td><?php echo $count; ?></td>
               <td><?php echo $row["product_name"]; ?></td>
               <td>Rs. <?php echo $row["product_price"]; ?></td>
               <td><?php echo $row["quantity"]; $productAmount = $row["product_price"]*$row["quantity"]; $totalAmount += $productAmount?></td>
               <td>Rs. <?php echo  $productAmount;?></td>
             </tr>
         <?php $count++; 
        } ?>
         </tbody>
         <tfoot>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td>Rs. <?php echo $totalAmount ?></td>
         </tfoot>
       </table>
       <input class="btn btn-outline-info" type="button" name="invoice" onclick="location.href='invoice.php?totalAmount=<?php echo $totalAmount ?>&customerId=<?php echo $id ?>'" value="Generate invoice">
       <input class="btn btn-outline-info" type="button" name="PreviousInvoice" onclick="location.href='invoice.php?customerId=<?php echo $id ?>'" value="Previous invoice">
     </div>




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
 </html>
