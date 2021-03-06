<?php
include "connection.php";

session_start();

if(isset($_POST["button"])) {
$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$mobile = $_POST["mobile"];
$passwordError = "";
$confirmPasswordError = "";
$emailError = "";
$canLogin = true;
$phoneError = "";

if (strlen($password) < 6) {
  $passwordError = "password must be greater than 6 characters";
  $canLogin=false;
}
if ($password != $confirmPassword) {
  $confirmPasswordError = "password does not match";
  $canLogin=false;
}
 if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
   $canLogin = false;
   $emailError = "Invalid email";
 }
 if(strlen($mobile)!=10) {
   $canLogin = false;
   $phoneError = "Phone number not valid";
 }


 if($canLogin) {
   $insertQuery = "insert into customer (first_name, Last_name, email, password, mobile, status) values ( '".$firstName."', '".$lastName."', '".$email."', '".$password."', '".$mobile."', 0)";

   $res = mysqli_query($connection, $insertQuery);
   if($res) {
     ?>
     <div class="page-content">
       <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Customer added successfully!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
     </div>

     <?php

   } else {
    ?>
    <script>
      alert("data not submitted");
    </script>
    <?php
  }
 } else {
   header("location:addCustomer.php?pError=$passwordError&confirmPassError=$confirmPasswordError&emailError=$emailError&phoneError=$phoneError");
 }


}

  $limit = 5;
  if(isset($_GET["page"])){
    $page = $_GET["page"];
  } else {
    $page = 1;
  }

  $offset = ($page-1) * $limit;
  $selectQuery = "select * from customer where status = 0 limit {$offset}, {$limit}";
  $query = mysqli_query($connection, $selectQuery) or die("query failed"); ?>


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
   <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark horizontal-nav">
         <a class="navbar-brand" href="">
           <img src="images/logo.png" alt="" width="200px" height="150px">
         </a>
         <a class="navbar-brand navbar-name" href="">Hi Admin,<?php echo $_SESSION["firstName"]; ?></a>
       </div>
     </nav>
       <div class="vertical-nav" id="sidebar">
        <div class="py-4 px-3 mb-4">
          <div class="sidebar">
            <ul>
              <li>
                <a class="sidebarLinks" href="products.php">Products</a>
              </li>
              <li class="activeSideLink">
                <a class="sidebarLinks" href="addCustomer.php">Customers</a>
              </li>
              <li class="logoutLink">
                <a class="sidebarLinks " href="index.php">Logout <img src="images/login.png" alt="logout"></a>
              </li>
            </ul>
          </div>
        </div>
       </div>
       <div class="container page-content">
        <?php if(isset($_GET["customerDeleted"])) { ?>
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Customer Deleted!</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
         <?php } ?>
         <h1 class="d-flex">All Customers</h1>
         <form class="d-flex justify-content-end my-2" action="addCustomer.php" method="">
           <button class="btn btn-primary" type="" name="button">Add more customers</button>
         </form>
         <table class="table table-bordered table-striped">
           <thead>
             <tr>
               <th scope = "col">First Name</th>
               <th scope = "col">Last Name</th>
               <th scope = "col">Email</th>
               <th scope = "col">Mobile</th>
               <th scope = "col">Operations</th>
             </tr>
           </thead>
           <tbody>
             <?php while($res = mysqli_fetch_array($query)) {?>

             <tr>
               <td><?php echo $res['first_name']; ?></td>
               <td><?php echo $res['last_name']; ?></td>
               <td><?php echo $res['email']; ?></td>
               <td><?php echo $res['mobile']; ?></td>
                 <td>
                   <!-- Button trigger modal -->
                   <button type="button" class="btn btn-primary deleteBtn" data-toggle="modal" data-target="#deleteUserModal" value="<?php echo $res['customer_id']; ?>">
                     Delete
                   </button>
                  <!-- <input class="btn btn-outline-primary" type="button" onclick="location.href='delete.php?del=<?php echo $res['customer_id'] ?>';" value="Delete" /> -->
                  <input class="btn btn-outline-primary" type="button" onclick="location.href='edit.php?getId=<?php echo $res['customer_id'] ?>';" value="Edit" />
                  <?php
                  $result = $connection->query("select * from cart where customer_id = '".$res['customer_id']."' and request = 'Requested'");
                    if($result->num_rows != 0) { ?>
                      <input class="btn btn-outline-primary" type="button" onclick="location.href='bill.php?getId=<?php echo $res['customer_id'] ?>';" value="Generate Bill" />
                  <?php  }

                   }
                   ?>




                 <!-- <a href="delete.php?del=<?php echo $res['customer_id'] ?>">Delete</a><br>
                 <a href="edit.php?getId=<?php echo $res['customer_id'] ?>">Edit</a> -->
               </td>
             </tr>
           </tbody>
         </table>
         <?php
            $sql1 = "select * from customer where status = 0";
            $result1 = mysqli_query($connection, $sql1);

            if (mysqli_num_rows($result1)>0) {
              $totalRecords = mysqli_num_rows($result1);
              $totalPages = ceil($totalRecords/$limit);

              echo '<nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>';
              for($i=1; $i<=$totalPages; $i++) {
                if ($i == $page) {
                  $active = "active";
                } else {
                  $active = "";
                }

                echo '<li class="page-item '.$active.'"><a class="page-link" href="customerList.php?page='.$i.'">'.$i.'</a></li>';
              }
              echo "</ul></nav>";
            }
          ?>
       </div>



  <!-- Modal -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
     </div>


    <script>
      $(document).ready(function() {
        $('.deleteBtn').click(function() {

          let customer_id = $(this).val();

          $('.userId').val(customer_id);
        });
      });
    </script>
    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/popper.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
   </body>
 </html>
