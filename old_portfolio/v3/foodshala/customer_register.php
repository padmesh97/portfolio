<?php
session_start();

if (isset($_SESSION["type"]))
		header("Location: index.php");
	
if (empty($_SESSION["csrf_token"])) 
	$_SESSION["csrf_token"] = bin2hex(random_bytes(16));
?>
<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER REGISTER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		input.form-control:focus, 
		input[type=text]:focus, 
		input[type=password]:focus{
			box-shadow: none;
		} 
	</style>
</head>
<body>

	<header>
		<nav class="navbar navbar-expand blue white-text">
			<div class="container-lg d-flex">
			  <a class="navbar-brand white-text" href="index.php">FOODSHALA</a>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="restaurant_register.php">
								Restaurant Sign Up
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row bg mr-0">
			<div class="container-lg blue-text" >
				<div class="col-12 col-md-6 offset-md-3">
					<form id="customerRegister" class="border border-light rounded-lg p-5 white" method="post" action="doCustomerRegister.php">

					    <p class="h4 mb-4">CUSTOMER SIGN UP</p>
					    
					    <!-- CSRF token-->
					    <input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">
					    <?php
					    if(isset($_GET['error']))
					    {
					    ?>
						    <p class="red white-text text-center p-2">
						    	<?php echo $_GET['error']; ?>
						    </p>
					    <?php
						}
					    ?>

					    <!-- Customer name -->
					    <input type="text" id="customerName" name="customerName" class="form-control mb-4" placeholder="Full name" oninput="validator('name',this.value)">

					    <!-- E-mail -->
					    <input type="email" id="customerEmail" name="customerEmail" class="form-control mb-4" placeholder="E-mail" oninput="validator('email',this.value)">

					    <!-- Password -->
					    <input type="password" id="customerPassword" name="customerPassword" class="form-control" placeholder="Password" aria-describedby="passHelper" oninput="validator('password',this.value)">
					    <small id="passHelper" class="form-text text-muted mb-4 float-left">
					        Minimum 8 characters
					    </small>

					    <!-- Phone number -->
					    <input type="text" id="customerContact" name="customerContact" class="form-control mb-4" placeholder="Contact number (+91)" maxlength="10" oninput="validator('contact',this.value)">

					    <!-- Customer Meal Preference -->
					    <div class="form-row">
					    	<div class="col-12">
					    		<p class="text-muted float-left">Your meal type preference</p>
					    	</div>
					    	<div class="col-6">
								<div class="custom-control custom-radio">
								  <input type="radio" class="custom-control-input" id="customerVeg" name="customerMeal" checked value="veg">
								  <label class="custom-control-label" for="customerVeg">Veg</label>
								</div>
							</div>
							
							<div class="col-6">
								<div class="custom-control custom-radio">
								  <input type="radio" class="custom-control-input" id="customerNonVeg" name="customerMeal" value="non_veg">
								  <label class="custom-control-label" for="customerNonVeg">Non-Veg</label>
								</div>
							</div>
						</div>

					    <!-- Sign up button -->
					    <button class="btn btn-info my-4 btn-block rounded-pill disabled" type="submit" id="submitButton">Sign Up</button>

					    <div class="form-row blue-text justify-content-center">
							<a href="login.php">Already have an account? LOGIN</a>
					    </div>

					</form>

				</div>

			</div>
		</div>
	</section>

	<footer class="page-footer font-small special-color pt-4">

	  <div class="container-lg text-center text-md-left">

	    <div class="row">

	      <div class="col-md-6 mt-md-0 mt-3">

	        <h5 class="text-uppercase">FOODSHALA</h5>
	        <p>It's a smart food ordering app</p>

	      </div>

	      <hr class="clearfix w-100 d-md-none pb-3">

	      <div class=" col-6 col-md-3 mb-md-0 mb-3">

	        <ul class="list-unstyled">
	          <li>
	            <a href="#!">About</a>
	          </li>
	          <li>
	            <a href="#!">Contact Us</a>
	          </li>
	        </ul>

	      </div>

	      <div class="col-6 col-md-3 mb-md-0 mb-3">

	        <ul class="list-unstyled">
	          <li>
	            <a href="#!">Sitemap</a>
	          </li>
	          <li>
	            <a href="#!">Careers</a>
	          </li>
	        </ul>

	      </div>
	    </div>
	  </div>

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">&copy; Copyright:
	    <a href="#"> Foodshala</a>
	  </div>
	  <!-- Copyright -->

	</footer>




<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
<script type="text/javascript" src="js/customerRegisterValidator.js"></script>
</body>
</html>