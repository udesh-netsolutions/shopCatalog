<?php
  include "connection.php";
  $customer_id = $_GET['getId'];
  $sql = "select * from customer where customer_id = '".$customer_id."'";
  $result = mysqli_query($connection, $sql);

  while($row=mysqli_fetch_assoc($result)) {
    $customer_id = $row['customer_id'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $email = $row['email'];
    $password = $row['password'];
    $mobile = $row['mobile'];
  }


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

</head>
<body>
<div class="container">
  <form action="update.php?id=<?php echo $customer_id ?>" method="post" class="formstyle">
        <h2 class="">
            Insert Data
        </h2>
        <div class="form-group">
            <label>First Name</label>
            <p><input type="text" class="" name="fname" value="<?php echo $firstName ?>"></p>
        </div>
        <div class="form-group">
            <label>Last Name</label>
          <p>  <input type="text" class="" name="lname" value="<?php echo $lastName ?>"></p>
        </div>
        <div class="form-group">
            <label>Email</label>
            <p><input type="" class="" name="email" value="<?php echo $email ?>"></p>
        </div>
        <div class="form-group">
            <label>Password</label>
            <p><input type="password" class="" name="password" value="<?php echo $password ?>"></p>
        </div>
        <div class="form-group">
            <label>mobile</label>
            <p><input type="text" class="" name="mobile" value="<?php echo $mobile ?>"></p>
        </div>
        <button class="btn btn-dark" type="submit" name="update">update</button>
    </form>
    <form class="" action="index.php" method="">
      <button class="btn btn-danger" type="" name="button">cancel</button>
    </form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
