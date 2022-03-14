<?php
  include "connection.php";
  session_start();

  if(isset($_POST["export"])) {

    header("content-type: text/csv; charset=utf-8");
    header("content-disposition: attachment; filename=data.csv");
    $output = fopen("php://output", "w");
    fputcsv($output, array("Invoice ID", "Customer ID", "Total Amount", "Status", "Date"));
    $sql = "select * from customer_bills where customer_id = '".$_SESSION["customerId"]."'";
    $result = mysqli_query($connection, $sql);
    while($row=mysqli_fetch_assoc($result)) {
      fputcsv($output, $row);
    }
    fclose($output);
  }

 ?>
