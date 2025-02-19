<?php
session_start();

if (empty($_SESSION["csrf_token"])) 
	$_SESSION["csrf_token"] = bin2hex(random_bytes(16));

?>
<!DOCTYPE html>
<html>
<head>
	<title>FOODSHALA - Home</title>
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
		select.form-control:focus,
		input[type=text]:focus, 
		select:focus{
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
						<?php include("ui/nav_items.php") ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row banner mr-0">
			<div class="container-lg white-text center" >
				<h1>HUNGRY ???</h1>
				<h3 class="mb-5"> Grab a
					<span class="typed-text"></span><span class="cursor">&nbsp;</span>
				</h3>

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

				<form id="searchForm" class="text-center white-text pt-5" method="get" action="search.php">

					<!-- CSRF token-->
					<input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">

					<div class="form-row justify-content-center align-items-center mb-4">
						<div class="col-4 col-md-3">
						    <label for="searchCategory">Your Location:</label>
						</div>
						<div class="col-5 col-md-3">
							<select class="browser-default custom-select" id="searchLocation" name="searchLocation">
							  <option value="delhi" selected>Delhi</option>
							  <option value="mumbai">Mumbai</option>
							  <option value="gurugram">Gurugram</option>
							  <option value="bengaluru">Bengaluru</option>
							</select>
						</div>
					</div>
					<div class="row d-flex justify-content-center align-items-center">
						<div class="col-12 col-md-2">
						    <label for="searchCategory">Search By:</label>
						</div>
						<div class="col-11 col-md-3">
						    <select class="browser-default custom-select mb-3 mb-md-0" id="searchCategory" name="searchCategory" onchange="fill(this.value)">
							  <option value="restaurant" selected>Restaurants</option>
							  <option value="dishes">Dishes</option>
							</select>
						</div>
						
						<div class="col-11 col-md-5" id="searchValueClass">
							<input type="text" id="searchValue" class="form-control mb-3 mb-md-0" placeholder="Enter the restaurant name" name="searchValue" oninput="searchValidate(this.value)">
						</div>
						
						<div class="col-6 col-md-2">
					    	<button id="searchSubmit" class="searchSubmit btn rounded-pill  btn-info white-text disabled" type="submit">SEARCH</button>
						</div>
					</div>
				</form>

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
<script type="text/javascript" src="js/typewriter.js"></script>
<script type="text/javascript" src="js/searchValidator.js"></script>
</body>
</html>