<?php
  include "connection.php";


  if (isset($_GET["customerId"]) && isset($_GET["totalAmount"])) {
    $customerId = $_GET["customerId"];
    $totalAmount = $_GET["totalAmount"];
    $query = "insert into customer_bills (customer_id, amount, date, status) values ('".$customerId."','".$totalAmount."','".date("Y/m/d")."',0)";
    $res = mysqli_query($connection, $query);
    if ($res) {
      echo "data submitted";
    }

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
         $query = "select * from customer_bills where customer_id = '".$customerId."'";
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




       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     </body>
   </html>

<?php } elseif (isset($_GET["customerId"])) {
  $customerId = $_GET["customerId"];

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
        $query = "select * from customer_bills where customer_id = '".$customerId."'";
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
                  <form class="" action="invoice.php?invoiceId=<?php echo $row["invoice_id"]; ?>" method="post">
                    <select class="" name="status">
                      <option value="">Status:-</option>
                      <option  value="Paid">Paid</option>
                      <option value="Pending">Pending</option>
                    </select>
                    <button class="btn btn-sm btn-dark" type="submit" name="setStatus">Set</button>
                  </form>
                </td>
              </tr>
          <?php  } ?>
          </tbody>
        </table>
      </div>




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
  }
  $sql = "update customer_bills set status = '".$status."' where invoice_id = '".$invoiceId."'";
  $res = mysqli_query($connection, $sql);
  if($res) {
    header("location:invoice.php?customerId=$customerId");
  }
} ?>
