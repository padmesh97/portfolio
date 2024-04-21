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
	<title>RESTAURANT REGISTER</title>
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
							<a class="nav-link" href="customer_register.php">
								Register as Customer</a>
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
					<form id="restaurantRegister" class="border border-light rounded-lg p-5 white" method="post" action="doRestaurantRegister.php">

					    <p class="h4 mb-4">RESTAURANT SIGN UP</p>

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

					    <!-- Restaurant name -->
					    <input type="text" id="restaurantName" name="restaurantName" class="form-control mb-4" placeholder="Restaurant name" oninput="validator('restaurantName',this.value)">
						
						<!-- Owner name -->
					    <input type="text" id="restaurantOwner" name="restaurantOwner" class="form-control mb-4" placeholder="Owner/Manager name" oninput="validator('ownerName',this.value)">

					    <!-- E-mail -->
					    <input type="email" id="restaurantEmail" name="restaurantEmail" class="form-control mb-4" placeholder="E-mail" oninput="validator('email',this.value)">

					    <!-- Password -->
					    <input type="password" id="restaurantPassword" name="restaurantPassword" class="form-control" placeholder="Password" aria-describedby="passHelper" oninput="validator('password',this.value)">
					    <small id="passHelper" class="form-text text-muted mb-4 float-left">
					        Minimum 8 characters
					    </small>

					    <!-- Phone number -->
					    <input type="text" id="restaurantContact" name="restaurantContact" class="form-control mb-4" placeholder="Contact number (+91)" maxlength="10" oninput="validator('contact',this.value)">

					    <!--City and Area-->
					    <div class="form-row mb-4">
					        <div class="col-12 col-md-6">
					            <!-- City -->
					            <select class="browser-default custom-select mb-4" id="restaurantCity" name="restaurantCity">
								  <option value="delhi" selected>Delhi</option>
								  <option value="mumbai">Mumbai</option>
								  <option value="gurugram">Gurugram</option>
								  <option value="bengaluru">Bengaluru</option>
								</select>
					        </div>
					        <div class="col-12 col-md-6">
					            <!-- Area -->
					            <input type="text" id="restaurantArea" name="restaurantArea" class="form-control mb-4" placeholder="Area/Sector/Street" oninput="validator('area',this.value)">
					        </div>
					    </div>

					    <!-- Sign up button -->
					    <button id="submitButton" class="btn btn-info my-4 btn-block rounded-pill disabled" type="submit">Sign Up</button>

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
<script type="text/javascript" src="js/restaurantRegisterValidator.js"></script>
</body>
</html>