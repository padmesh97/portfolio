<?php
session_start();

	if(isset($_GET["rest_id"]) && !empty($_GET["rest_id"]))
	{
		$rest_id=$_GET["rest_id"];

		require("credentials.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW MENU</title>
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
						<?php include("ui/nav_items.php") ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row bg mr-0">
			<div class="container-lg blue-text" >
				<div class="col-12 col-md-8 offset-md-2">
					
					<div class="p-2 border border-light white rounded-lg">
					<?php

					try{
	        			$sql="SELECT r.restaurant_name,r.area,r.city,m.item,m.price,m.category,m.type
									FROM menu AS m 
									INNER JOIN restaurant_info AS r
									ON m.rest_id=? AND r.rest_id=m.rest_id ORDER BY m.category DESC";

		        		$result=$conn->prepare($sql);

			        	$result->execute([$rest_id]);

			        	if($result->rowCount()>0)
			        	{
			        		$showRestaurantName=true;
			        		$category="";
			        		while($row=$result->fetch(PDO::FETCH_ASSOC))
					        {
					        	if($showRestaurantName)
					        	{
					?>
						<!-- displaying Restaurant name and location -->
						<div class="blue-text text-uppercase" style="font-size: 1.5rem;">
							MENU - <?php echo $row["restaurant_name"]; ?>
						</div>
						<div class="blue-text text-capitalize mb-3" style="font-size: 1.3rem;">
							<?php echo $row["area"].",".$row["city"]; ?>
						</div>

					<?php 
									$showRestaurantName=false;
								}
								if($category!=$row["category"])
								{

					?>
						<!-- displaying Category of food item -->
						<hr class="w-100">
							<div class="orange-text text-center text-uppercase mb-2" style="font-size: 1.2rem;">
								<?php echo $row['category']; ?>
							</div>

					<?php 
								}
					?>
						<!--displaying food items with price and veg/non-veg type-->

						<div class="row text-center mb-2">
							<div class="col-2">
					<?php
								if($row["type"]=="veg")
								{
					?>
								<i class="fas fa-circle green-text"></i>
					<?php 
								}
								if($row["type"]=="non_veg")
								{
					?>
								<i class="fas fa-circle red-text"></i>
					<?php      
								}
					?>
							</div>

							<div class="col-7 blue-text text-capitalize">
								<?php echo $row["item"]; ?>
							</div>

							<div class="col-3 text-muted">
								<?php echo "Rs.&nbsp;".$row["price"]; ?>
							</div>

						</div>
					<?php 
								$category=$row["category"];
							}
							if(!isset($_SESSION["type"]) || $_SESSION["type"]=="customer")
							{
					?>
							<br>
							<a href="order.php?rest_id=<?php echo $rest_id;?>">
								<button type="button" class="btn btn-primary">
									<i class="fas fa-pizza-slice mr-2"></i>ORDER NOW
								</button>
							</a>
					<?php
							}
						}
						else 
						//in case of invalid restaurant ID request or an empty menu of a restaurant
						{
					?>
						<div class="border border-info white text-muted p-3">
							No items associated with this restaurant
						</div>
					<?php
						}
					}
					catch(PDOException $e)
					{
						header('location: index.php'); //in case of invalid query
					}
				}
				else
					header('location: index.php'); //in case of empty GET request
					?>


					</div>

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