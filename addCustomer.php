<!doctype html>
<html lang="en">
  <head>
  	<title>Customer Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

  	<link rel="stylesheet" href="styles.css">

    <script src="js/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    <script src="js/mains.js"></script>

	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="customerList.php">Admin</a>
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
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Customer Form</h3>
						<form action="customerList.php" id="validateCustomer" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="fname" placeholder="First Name" required>
		      		</div>
              <div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="lname" placeholder="Last Name" required>
		      		</div>
              <div class="form-group">
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
		      		</div>
              <p class="text-danger"><?php if(isset($_GET['emailError'])) {echo $_GET['emailError'];} ?></p>
	            <div class="form-group">
	              <input id="password" type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
              <p class="text-danger"><?php if(isset($_GET["pError"])) {echo $_GET["pError"];} ?></p>
              <div class="form-group">
	              <input type="password" class="form-control rounded-left" name="confirmPassword" placeholder="Confirm Password" required>
	            </div>
              <p class="text-danger"><?php if(isset($_GET["confirmPassError"])) {echo $_GET["confirmPassError"];} ?></p>

              <div class="form-group">
		      			<input type="number" class="form-control rounded-left" name="mobile" placeholder="Mobile" required>
		      		</div>
              <p class="text-danger"><?php if(isset($_GET["phoneError"])) {echo $_GET["phoneError"];} ?></p>
              </div>
	            <div class="form-group">
	            	<button type="submit" name="button" class="btn btn-primary rounded submit p-3 px-5">ADD</button>
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
