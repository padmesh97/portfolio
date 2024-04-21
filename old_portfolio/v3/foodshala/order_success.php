<?php
session_start();

if (empty($_SESSION['csrf_token'])) 
	$_SESSION['csrf_token'] = bin2hex(random_bytes(16));

if (!empty($_GET) && isset($_SESSION["type"]) && $_SESSION["type"]=="customer") 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_GET["token"])) 
	    {
?>
<!DOCTYPE html>
<html>
<head>
	<title>ORDER STATUS</title>
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
</head>
<body>

	<header>
		<nav class="navbar navbar-expand blue white-text">
			<div class="container-lg d-flex">
			  <a class="navbar-brand white-text" href="index.php">FOODSHALA</a>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<?php include "ui/nav_items.php"; ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row bg mr-0">
			<div class="container-lg blue-text" >
				<div class="col-12 col-md-8 offset-md-2">
			<?php 
				if($_GET["status"]=="success")
				{
			?>
					<div class="border border-sucess p-5 text-success white my-5 rounded-lg">
						<div class="green white-text p-2 mb-4 rounded-lg" style="font-size: 0.85rem" >
							ORDER ID - <?php echo $_GET["order_id"]; ?>
						</div>
						<div style="font-size: 1.2rem" class="mb-4">
							Your Order has been successfully placed.<br>
							<i class="fas fa-cheese mr-3"></i>Get ready to eat something delicious.<i class="fas fa-hamburger ml-3"></i>
						</div>
						<a href="index.php">
							<button type="button" class="btn btn-primary rounded-pill waves-effect">Navigate To Home</button>
						</a>
					</div>

			<?php 
				}
				if($_GET["status"]=="failed")
				{
			?>
				<div class="border border-danger p-4 text-danger white my-5 rounded-lg">
					<div class="red white-text p-2 rounded-lg mb-4" style="font-size: 1.2rem">
						<?php echo $_GET["error"]; ?>
					</div>
					<a href="index.php">
						<button type="button" class="btn btn-primary rounded-pill waves-effect">Navigate To Home</button>
					</a>
				</div>

			<?php 
				}
			}
			else
			{
				header("location: index.php?error=Invalid+Token");
			}
		}
		else
		{
			header("location: index.php?error=Invalid+Request");
		}
			?>
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
</body>
</html>