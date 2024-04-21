<?php
session_start();

if(isset($_SESSION["type"]))
{

?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW ORDER SUMMARY</title>
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
				if($_SESSION["type"]=="restaurant")
				{
					include "credentials.php";

					$sql="SELECT o.items,o.amount,o.timestamp,o.address,c.name,c.contact
									FROM orders AS o 
									INNER JOIN customer_info AS c
									ON o.rest_id = ? AND c.cust_id=o.cust_id ORDER BY o.timestamp DESC";

	        		$result=$conn->prepare($sql);

		        	$result->execute([$_SESSION["rest_id"]]);

		        	if($result->rowCount()>0)
		        	{
		        		$counter=0;
		        		while($row=$result->fetch(PDO::FETCH_ASSOC))
				        {
				        	$items=json_decode(base64_decode($row["items"]));
				        	if($counter==0)
				        	{
			?>
					<div class="p-3 blue white-text rounded-lg mb-2"> ORDER HISTORY</div>
			<?php
							}
							$counter++;
			?>
					<div class="p-3 white border border-light rounded text-left my-3">
						<div class="blue-text text-uppercase" style="font-size: 1.2rem"><?php echo $row["name"]; ?></div>
						<hr class="clearfix w-100">
						<div class="badge badge-secondary p-2 my-1" style="font-size:0.8rem">Rs. <?php echo $row["amount"]; ?></div>
						<div class="text-muted my-1">TIME - <?php echo $row["timestamp"]; ?></div>
						<div class="text-muted my-1">CONTACT - <?php echo $row["contact"]; ?></div>
						<div class="text-muted my-1">DELIVERY ADDRESS - <?php echo base64_decode($row["address"]); ?></div>
						<hr class="clearfix w-100">
						<div class="text-muted my-1 text-capitalize">
			<?php
							foreach($items as $item => $quantity)
							{
								echo base64_decode($item)." x ".$quantity." , ";
							}
			?>
						</div>

					</div>	
			<?php 
						}
					}
					else
					{
			?>		
					<div class="p-3 my-5 border border-muted text-muted white rounded-lg">
						No items found in Order History
					</div>
			<?php   
					}
					unset($result);//closing the prepared pdo statement
	        		$conn=null;//closing mysql pdo connection
				}
				if($_SESSION["type"]=="customer")
				{
					include "credentials.php";

					$sql="SELECT o.items,o.amount,o.timestamp,r.restaurant_name,r.area,r.city,r.contact
									FROM orders AS o 
									INNER JOIN restaurant_info AS r
									ON o.cust_id = ? AND r.rest_id=o.rest_id ORDER BY o.timestamp DESC";

	        		$result=$conn->prepare($sql);

		        	$result->execute([$_SESSION["cust_id"]]);

		        	if($result->rowCount()>0)
		        	{
		        		$counter=0;
		        		while($row=$result->fetch(PDO::FETCH_ASSOC))
				        {
				        	$items=json_decode(base64_decode($row["items"]));
				        	if($counter==0)
				        	{
			?>	

					<div class="p-3 blue white-text rounded-lg mb-2"> ORDER HISTORY</div>
			<?php
							}
							$counter++;
			?>
					<div class="p-3 white border border-light rounded text-left my-3">
						<div class="text-primary text-uppercase" style="font-size: 1.3rem"><?php echo $row["restaurant_name"]; ?></div>
						<div class="text-primary text-capitalize" style="font-size: 1.2rem"><?php echo $row["area"].", ".$row["city"]; ?></div>
						<hr class="clearfix w-100">
						<div class="badge badge-secondary p-2 my-1" style="font-size:0.8rem">Rs. <?php echo $row["amount"]; ?></div>
						<div class="text-muted my-1">TIME - <?php echo $row["timestamp"]; ?></div>
						<div class="text-muted my-1">CONTACT - <?php echo $row["contact"]; ?></div>
						<hr class="clearfix w-100">
						<div class="text-muted text-capitalize my-1">
			<?php
							foreach($items as $item => $quantity)
							{
								echo base64_decode($item)." x ".$quantity.", ";
							}
			?>
						</div>
					</div>	
			<?php 
						}
					}
					else
					{
			?>		
					<div class="p-3 my-5 border border-muted text-muted white rounded-lg">
						No items found in Order History
					</div>
			<?php   
					}
					unset($result);//closing the prepared pdo statement
	        		$conn=null;//closing mysql pdo connection
				}
			}
			else
			{
				header("location: index.php");
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