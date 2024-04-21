<?php
session_start();

if (empty($_SESSION['csrf_token'])) 
	$_SESSION['csrf_token'] = bin2hex(random_bytes(16));

if (isset($_SESSION["type"]) && (isset($_SESSION["cust_id"]) || isset($_SESSION["rest_id"]))) 
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW PROFILE</title>
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
				if($_SESSION["type"]=="customer")
				{
					include "credentials.php";

					try{
	        			$sql="SELECT name,email,contact,timestamp FROM customer_info WHERE cust_id=?";//query for retriving customer details

		        		$result=$conn->prepare($sql);

			        	$result->execute([$_SESSION["cust_id"]]);

		        		while($row=$result->fetch(PDO::FETCH_ASSOC))
				        {

			?>

					<div class="p-3 border border-light white text-left rounded-lg my-5 pl-4">
						<h2 class="text-primary text-capitalize my-2"><?php echo $row["name"]; ?></h2>
						<h5 class="text-muted my-3"><?php echo $row["email"]; ?></h5>
						<h5 class="text-muted my-3">CONTACT - <?php echo $row["contact"]; ?></h5>
						<h5 class="text-muted my-3"><span class="text-primary">Registered on</span> - <?php echo $row["timestamp"]; ?></h5>
					</div>
			<?php
						}
					}
					catch(PDOException $e)
					{
			?>
					<div class="p-3 border border-light white my-5">
						<h5 class="text-primary my-3">Request could not be completed.Try Again</h5>
					</div>
			<?php
					}
				}
				if($_SESSION["type"]=="restaurant")
				{
					include "credentials.php";

					try{
	        			$sql="SELECT restaurant_name,owner_name,email,contact,city,area,timestamp FROM restaurant_info WHERE rest_id=?";//query for retriving restaurant details

		        		$result=$conn->prepare($sql);

			        	$result->execute([$_SESSION["rest_id"]]);

		        		while($row=$result->fetch(PDO::FETCH_ASSOC))
				        {

			?>

					<div class="p-3 border border-light white text-left rounded-lg my-5 pl-4">
						<h2 class="text-primary text-uppercase"><?php echo $row["restaurant_name"]; ?></h2>
						<h4 class="text-info text-capitalize">OWNER - <?php echo $row["owner_name"]; ?></h4>
						<h5 class="text-info text-capitalize"><?php echo $row["area"]." , ".$row["city"]; ?></h5>
						<h5 class="text-muted"><?php echo $row["email"]; ?></h5>
						<h5 class="text-muted">CONTACT - <?php echo $row["contact"]; ?></h5>
						<h5 class="text-muted"><span class="text-primary">Registered on</span> - <?php echo $row["timestamp"]; ?></h5>
					</div>
			<?php
						}
					}
					catch(PDOException $e)
					{
			?>
					<div class="p-3 border border-light white my-5  pl-4">
						<h5 class="text-primary my-3">Request could not be completed.Try Again</h5>
					</div>
			<?php
					}
				}
			}
			else
				header("location: index.php");
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