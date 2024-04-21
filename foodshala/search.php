<?php
session_start();

	if (!empty($_GET)) 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_GET["token"])) 
	    {
	    	$location="";$category="";$val="";

	    	if(isset($_GET["searchLocation"]) && isset($_GET["searchCategory"]) && isset($_GET["searchValue"]))
	    	{
	    		if(!empty($_GET["searchLocation"]) && !empty($_GET["searchCategory"]) && !empty($_GET["searchValue"]))
	    		{
		    		$location=$_GET["searchLocation"];
		    		$category=$_GET["searchCategory"];
		    		$val=$_GET["searchValue"];
		    	}
		    	else
		    		header("location: index.php"); //in case of an empty required GET variable
		    }
		    else
		    	header("location: index.php");//in case of missing required GET variable

	    	require("credentials.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>SEARCH RESULTS</title>
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
				<div class="col-10 offset-1 col-md-6 offset-md-3">
					
					<div class="p-2 text-center white-text rounded-lg blue" style="font-size: 1.2em">
						Showing all related searches
					</div>

					<?php
						try{
			    		if($category=="restaurant")
			    		{
		        			$sql="SELECT rest_id,restaurant_name,city,area FROM restaurant_info WHERE city=? AND (restaurant_name LIKE ?)";//query for checking restaurant name match 

			        		$result=$conn->prepare($sql);

				        	$result->execute([$location,"%$val%"]);

				        	if($result->rowCount()>0)
				        	{
				        		$row_copy=array();
				        		while($row=$result->fetch(PDO::FETCH_ASSOC))
						        {
						        	$row_copy=$row;//copying row data to be accessible globally for search buttons in "include(ui/search_buttons.php)"
					?>

					<div class="p-3 my-3 border border-info white rounded-lg">
						<div class="blue-text text-uppercase" style="font-size:1.5em">
							<?php echo $row["restaurant_name"]; ?>
						</div>
						<div class="blue-text text-capitalize mb-2" style="font-size:1.3em"><?php echo $row["area"].",".$row["city"]; ?> </div>

					<?php
									include "ui/search_buttons.php"; 
								}
							}
							else
							{
					?>

					<div class="p-3 my-3 border border-light white rounded-lg">
						<span class="text-muted">No such restaurant found.</span>
					</div>

					<?php

							}
						}
						if($category=="dishes")
						{
							$sql="SELECT r.rest_id,r.restaurant_name,r.area,r.city,m.item,m.price
									FROM menu AS m 
									INNER JOIN restaurant_info AS r
									ON m.item LIKE ?
									AND r.city = ? AND r.rest_id=m.rest_id ORDER BY r.restaurant_name";

			        		$result=$conn->prepare($sql);

				        	$result->execute(["%$val%",$location]);

				        	if($result->rowCount()>0)
				        	{
				        		$counter=0;
				        		$rest_name_copy=""; //for gathering dishes from same restaurant together
				        		$row_copy=array();
				        		while($row=$result->fetch(PDO::FETCH_ASSOC))
						        {
						        	if($row["restaurant_name"]==$rest_name_copy)
						        	{
					?>
						<div class="text-muted border border-light my-3 py-2 px-1 text-capitalize"><?php echo $row["item"]."&nbsp;&nbsp;|&nbsp;&nbsp;Rs.".$row["price"]; ?></div>

					<?php
									}
									else
									{
										if($counter>0)
											include "ui/search_buttons.php"; //adding view and order buttons before closing <div> of previous search item

					?>
	

					<div class="p-3 my-3 border border-info white rounded-lg">
						<div class="blue-text text-uppercase" style="font-size:1.5em"><?php echo $row["restaurant_name"]; ?></div>
						<div class="blue-text text-capitalize mb-3" style="font-size:1.3em"><?php echo $row["area"].",".$row["city"]; ?> </div>
						<div class="text-muted border border-light py-2 px-1 text-capitalize"><?php echo $row["item"]."&nbsp;&nbsp;|&nbsp;&nbsp;Rs.".$row["price"]; ?></div>

					<?php 
									}
									$rest_name_copy=$row["restaurant_name"];
									$row_copy=$row; //copying row data to be accessible globally for search buttons in "include(ui/search_buttons.php)"
									$counter++;
								}
								include "ui/search_buttons.php";// adding view and order buttons before closing <div> of last search item
							}
							else
							{
					?>

					<div class="p-3 my-3 border border-light white text-muted rounded-lg">
						No such restaurant found with <?php echo "\"".$val."\""; ?>
					</div>

					<?php

							}
						}
					}
					catch(PDOException $e)
					{
						$error="Search can't be executed";
						header('location: index.php?error='.urlencode($error));
					}
				} 
	    else 
	    {
	        // navigate to home for invalid csrf token access
		    header("location: index.php");
	    }
	}
	else
    {
    	//navigate to home for empty GET request
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