<?php
session_start();

function cookieSetup($name,$val,$path,$samesite)
{
	if(!isset($_COOKIE[$name]))
	{
		if (PHP_VERSION_ID < 70300) 
		{
	        setcookie($name,$val,time()+(86400*30),$path.";".$samesite);
	    }else {
	        setcookie($name,$val, [
	            'expires' => time()+(86400*30),
	            'path' => $path,
	            'samesite' => $samesite
	        ]);
	    }
	}
}

if (empty($_SESSION["csrf_token"])) 
	$_SESSION["csrf_token"] = bin2hex(random_bytes(16));

if(!isset($_SESSION["type"])) //handling no Login found case
	header("location: login.php?next=".base64_encode(basename($_SERVER['REQUEST_URI'])));

if(isset($_SESSION["type"]) && $_SESSION["type"]=="restaurant") //incase restaurant is Logged in
	header("location: index.php");

	if(isset($_GET["rest_id"]) && !empty($_GET["rest_id"]))
	{
		$rest_id=$_GET["rest_id"];
		$rest_name="";

		if(isset($_COOKIE["cart_rest_id"]) && $rest_id!=$_COOKIE["cart_rest_id"])
		{
			unset($_COOKIE["cart_rest_id"]);
			unset($_COOKIE["cart_rest_name"]);
			unset($_COOKIE["cart_items"]);
		}

		require("credentials.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ORDER</title>
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
					
					<div class="p-0 pb-3 border border-light white rounded-lg">
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
					        		$rest_name=$row["restaurant_name"];
					        		cookieSetup("cart_rest_id",$rest_id,'/','lax');
					        		cookieSetup("cart_rest_name",urlencode($rest_name),'/','lax');
					        		cookieSetup("cart_items",'e30=','/','lax');
					?>
						<!-- displaying Restaurant name and location -->
						<div class="blue-text text-uppercase mt-3" style="font-size: 1.5rem;">
							<?php echo $row["restaurant_name"]; ?>
						</div>
						<div class="blue-text text-capitalize mb-3" style="font-size: 1.3rem;">
							<?php echo $row["area"].",".$row["city"]; ?>
						</div>
						<div class="table-responsive">
							<table class="table border border-0 w-100">
								<tbody>

					<?php 
									$showRestaurantName=false;
								}
								if($category!=$row["category"])
								{

					?>
									<tr>
										<td colspan="4" class="orange-text text-uppercase" style="font-size: 1.2rem"><?php echo $row['category']; ?></td>
									</tr>

					<?php 
								}
					?>
						<!--displaying food items with price and veg/non-veg type-->

									<tr>
					<?php
								if($row["type"]=="veg")
								{
					?>
										<td><i class="fas fa-circle green-text"></i></td>
					<?php 
								}
								if($row["type"]=="non_veg")
								{
					?>
										<td><i class="fas fa-circle red-text"></i></td>
					<?php      
								}
					?>

										<td class="text-capitalize blue-text"><?php echo $row["item"]; ?></td>
										<td><?php echo "Rs.&nbsp;".$row["price"]; ?></td>

										<td>
											<div class="blue p-2 white-text rounded-pill d-flex justify-content-center align-items-center">
												<div data-item-operation="subtract" data-item-price="<?php echo $row["price"]; ?>" data-item-id="<?php echo base64_encode($row['item']); ?>" onclick="createOrder(this.getAttribute('data-item-id'),this.getAttribute('data-item-operation'),this.getAttribute('data-item-price'))" class=" p-1 px-2 white blue-text waves-effect rounded-lg">-</div>
												<div class="mx-2 d-inline-block" style="font-size: 1.1rem">x <span id="<?php echo base64_encode($row['item']); ?>" data-item-price="<?php echo $row["price"]; ?>">0</span></div>
												<div data-item-operation="add" data-item-price="<?php echo $row["price"]; ?>" data-item-id="<?php echo base64_encode($row['item']); ?>" onclick="createOrder(this.getAttribute('data-item-id'),this.getAttribute('data-item-operation'),this.getAttribute('data-item-price'))" class=" p-1 px-2 white blue-text waves-effect rounded-lg">+</div>
											</div>
										</td>

									</tr>	

					<?php 
								$category=$row["category"];
							}
					?>
									<tr>
										<td colspan="4" class="blue white-text justify-content-center">
											TOTAL AMOUNT - Rs.&nbsp;&nbsp;<span id="totalAmount">0</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php
					?>
							<hr class="w-100">
							<form action="order_confirm.php" method="post">
								<input type="hidden" id="postAmount" name="amount" value="0">
								<button id="proceedButton" type="submit" class="btn btn-info disabled">
									<i class="fas fa-check mr-2"></i>PROCEED
								</button>
							</form>
					<?php
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
<script type="text/javascript" src="js/orderValidator.js"></script>
</body>
</html>