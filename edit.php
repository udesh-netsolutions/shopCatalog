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


<!doctype html>
<html lang="en">
  <head>
  	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Edit Details</h3>
						<form action="update.php?id=<?php echo $customer_id ?>" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="fname" placeholder="First Name" value="<?php echo $firstName ?>" required>
		      		</div>
              <div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="lname" placeholder="Last Name" value="<?php echo $lastName ?>" required>
		      		</div>
              <div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="email" placeholder="Email" value="<?php echo $email ?>" required>
		      		</div>
              <p><?php if(isset($_GET['emailError'])) {echo $_GET['emailError'];} ?></p>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Password" value="<?php echo $password ?>" required>
	            </div>
              <p class="error"><?php if(isset($_GET["pError"])) {echo $_GET["pError"];} ?></p>
              <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="confirmPassword" placeholder="Confirm Password" required>
	            </div>
              <p class="error"><?php if(isset($_GET["confirmPassError"])) {echo $_GET["confirmPassError"];} ?></p>
              <div class="form-group">
                <input type="text" class="form-control rounded-left" name="mobile" placeholder="Mobile" value="<?php echo $mobile ?>" required>
              </div>
              </div>
	            <div class="form-group">
	            	<button type="submit" name="update" class="btn btn-primary rounded submit p-3 px-5">Update</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
