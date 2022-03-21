<?php
  include "connection.php";
  session_start();

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
  <meta charset="utf-8">

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <script src="https://kit.fontawesome.com/56c1183ec7.js" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

   <script src="js/mains.js"></script>

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
               <ul class="sublink">
                 <li class="activeSideLink">
                   <a href="#">Edit Customer</a>
                 </li>
             </li>
             <li class="logoutLink">
               <a class="sidebarLinks " href="index.php">Logout <img src="images/login.png" alt="logout"></a>
             </li>
           </ul>
         </div>
       </div>
      </div>
	<section class="ftco-section page-content">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Edit Details</h3>
						<form id="validateCustomer" action="update.php?id=<?php echo $customer_id ?>" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="fname" placeholder="First Name" value="<?php echo $firstName ?>" required>
		      		</div>
              <div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="lname" placeholder="Last Name" value="<?php echo $lastName ?>" required>
		      		</div>
              <div class="form-group">
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Email" value="<?php echo $email ?>" required>
		      		</div>
              <p><?php if(isset($_GET['emailError'])) {echo $_GET['emailError'];} ?></p>
	            <div class="form-group">
	              <input id="password" type="password" class="form-control rounded-left" name="password" placeholder="Password" value="<?php echo $password ?>" required>
	            </div>
              <p class="error"><?php if(isset($_GET["pError"])) {echo $_GET["pError"];} ?></p>
              <div class="form-group">
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
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>

	</body>
</html>
