<?php
include "connection.php";

if(isset($_POST["button"])) {
$customerId = $_POST["customer_id"];
$firstName = $_POST["fname"];
$lastName = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];

$insertQuery = "insert into customer (first_name, Last_name, email, password, mobile) values ( '".$firstName."', '".$lastName."', '".$email."', '".$password."', '".$mobile."')";

$res = mysqli_query($connection, $insertQuery);
if($res) {
  ?>
  <script>
    alert("data submitted successful");
  </script>
  <?php

} else {
  ?>
  <script>
    alert("data not submitted");
  </script>
  <?php
}
}

  $selectQuery = "select * from customer";
  $query = mysqli_query($connection, $selectQuery);


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <style media="screen">
     table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
     </style>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="">
       <table>
         <thead>
           <tr>
             <th>Customer Id</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Password</th>
             <th>Mobile</th>
           </tr>
         </thead>
         <tbody>
           <?php   while($res = mysqli_fetch_array($query)) {?>

           <tr>
             <td><?php echo $res['customer_id']; ?></td>
             <td><?php echo $res['first_name']; ?></td>
             <td><?php echo $res['last_name']; ?></td>
             <td><?php echo $res['email']; ?></td>
             <td><?php echo $res['password']; ?></td>
             <td><?php echo $res['mobile']; ?></td>
               <td>
                 <form class="" action="index.html" method="post">

                 </form>
               <a href="delete.php?del=<?php echo $res['customer_id'] ?>">Delete</a><br>
               <a href="edit.php?getId=<?php echo $res['customer_id'] ?>">Edit</a>
             </td>
           </tr>
          <?php  } ?>
         </tbody>
       </table>
     </div>
     <form class="" action="customerForm.php" method="">
       <button type="" name="button">Add more customers</button>
     </form>
   </body>
 </html>
