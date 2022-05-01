<?php
  include "connection.php";
  session_start();

  if (isset($_GET["customerId"]) && isset($_GET["totalAmount"])) {
    $customerId = $_GET["customerId"];
    $totalAmount = $_GET["totalAmount"];
    $query = "insert into customer_bills (customer_id, amount, date, status) values ('".$customerId."','".$totalAmount."','".date("Y/m/d")."',0)";
    $res = mysqli_query($connection, $query);

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
     <body class="">
       <nav aria-label="" class="navbar navbar-expand-lg navbar-dark bg-dark horizontal-nav">
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
                  <ul class="sublink">
                    <li class="activeSideLink">
                      <a href="#">Invoice</a>
                    </li>
                  </ul>
                </li>
                <li class="logoutLink">
                  <a class="sidebarLinks " href="index.php">Logout <img src="images/login.png" alt="logout"></a>
                </li>
              </ul>
            </div>
          </div>
         </div>
         <div class="page-content">
           <?php
           if ($res) { ?>
             <div class="alert alert-info alert-dismissible fade show" role="alert">
               <strong>Invoice Generated</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
          <?php  }
          ?>
           <h1 class="d-flex justify-content-center my-5">Invoice</h1>
         </div>
       <?php
         $query = "select * from customer_bills where customer_id = '".$customerId."'";
         $res = mysqli_query($connection, $query);
         $totalAmount = 0;
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
               <th>Invoice Id</th>
               <th>Customer Id</th>
               <th>Total Amount</th>
               <th>Date</th>
               <th>Operation</th>
             </tr>
           </thead>
           <tbody>
             <?php while($row = mysqli_fetch_assoc($res)) { ?>
               <tr>
                 <td><?php echo $row["invoice_id"]; ?></td>
                 <td><?php echo $row["customer_id"]; ?></td>
                 <td>Rs. <?php echo $row["amount"];?></td>
                 <td><?php echo  $row["date"];?></td>
                 <td><?php if($row["status"] == false) {
                   echo "Pending";
                 } else {
                   echo "Paid";
                 } ?></td>
                 <td>

                 </td>
               </tr>
           <?php  } ?>
           </tbody>
         </table>
       </div>




       <script src="js/jquery.min.js"></script>
       <!-- <script src="js/popper.js"></script> -->
       <script src="js/bootstrap.min.js"></script>
     </body>
   </html>

<?php } elseif (isset($_GET["customerId"])) {
  $customerId = $_GET["customerId"];

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
    <body class="">
      <nav aria-label="" class="navbar navbar-expand-lg navbar-dark bg-dark horizontal-nav">
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
               <li >
                 <a class="sidebarLinks" href="products.php">Products</a>
               </li>
               <li class="">
                 <a class="sidebarLinks" href="customerList.php">Customers</a>
                 <ul class="sublink">
                   <li class="activeSideLink">
                     <a href="#">Invoice</a>
                   </li>
                 </ul>
               </li>
               <li class="logoutLink">
                 <a class="sidebarLinks " href="index.php">Logout <img src="images/login.png" alt="logout"></a>
               </li>
             </ul>
           </div>
         </div>
        </div>
      <div class="page-content">
        <h1 class="d-flex justify-content-center my-5">Invoice</h1>
      </div>
      <?php
        $query = "select * from customer_bills where customer_id = '".$customerId."'";
        $res = mysqli_query($connection, $query);
        $totalAmount = 0;
       ?>
      <div class="container page-content">
        <div class="d-flex justify-content-end">
          <h4 id="current_date"></h4>
            <script>
            let date = new Date();
            let year = date.getFullYear();
            let month = date.getMonth() + 1;
            let day = date.getDate();
            document.getElementById("current_date").innerHTML = "Date: " + day + "/" + month + "/" + year;
            </script>

        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Invoice Id</th>
              <th>Customer Id</th>
              <th>Total Amount</th>
              <th>Date</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($res)) { ?>
              <tr>
                <td><?php echo $row["invoice_id"]; ?></td>
                <td><?php echo $row["customer_id"]; ?></td>
                <td>Rs. <?php echo $row["amount"];?></td>
                <td><?php echo  $row["date"];?></td>
                <td><?php if($row["status"] == false) {
                  echo "Pending";
                } else {
                  echo "Paid";
                } ?></td>
                <td>
                  <?php
                    if ($row["status"] == 0) { ?>
                      <form class="" action="invoice.php?invoiceId=<?php echo $row["invoice_id"]; ?>" method="post">
                        <select class="" name="status">
                          <option value="">Status:-</option>
                          <option  value="Paid">Paid</option>
                        </select>
                        <button class="btn btn-sm btn-dark" type="submit" data-toggle="modal" data-target="#paymentModal" name="setStatus">Set</button>
                      </form>
                  <?php  } else {
                    // echo $row["status"];
                  } ?>
                </td>
              </tr>
          <?php  } ?>
          </tbody>
        </table>
      </div>
        <!-- modal for payment status -->
      <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" action="delete.php" method="post">
              <input type="hidden" name="customerId" class="userId">
              <div class="modal-body">
                Are you sure!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="deleteBtn" class="btn btn-primary">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>




      <script src="js/jquery.min.js"></script>
      <!-- <script src="js/popper.js"></script> -->
      <script src="js/bootstrap.min.js"></script>
    </body>
  </html>
<?php } elseif (isset($_POST["setStatus"])) {
  $invoiceId = $_GET["invoiceId"];
  $status = $_POST["status"];

  $query = "select * from customer_bills where invoice_id = '".$invoiceId."'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $customerId = $row["customer_id"];
  if($status=="Pending") {
    $status = 0;
  } else {
    $status = 1;
    $query = "delete from cart where customer_id = '".$customerId."'";
    $res = mysqli_query($connection, $query);
  }
  $sql = "update customer_bills set status = '".$status."' where invoice_id = '".$invoiceId."'";
  $res = mysqli_query($connection, $sql);
  if($res) {
    header("location:invoice.php?customerId=$customerId");
  }
} ?>
