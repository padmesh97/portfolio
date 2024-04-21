<?php
session_start();

	if (!isset($_SESSION["type"]) || $_SESSION["type"]!="customer")
		header("location: index.php");
	else
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>CONFIRM YOUR ORDER</title>
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
						<?php include("ui/nav_items.php"); ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row bg mr-0">
			<div class="container-lg blue-text" >
				<div class="col-12 col-md-8 offset-md-2">

					<div class="responsive-table">
						<table class="table white border border-info">
					
				<?php
					if(isset($_COOKIE['cart_rest_id']) && isset($_COOKIE['cart_rest_name']) && isset($_COOKIE['cart_items']))
					{
						$items=json_decode(base64_decode($_COOKIE['cart_items']));
						$amount=$_POST['amount'];
						
				?>
							<tbody>	
								<tr>
									<td colspan="3" class="border-top border-info blue-text text-uppercase" style="font-size: 1.3rem">
										<?php echo urldecode($_COOKIE["cart_rest_name"]) ?>
									</td>
								</tr>
								<tr>
									<td colspan="3" class="green white-text">Order Summary</td>
								</tr>
								<tr class="blue white-text text-uppercase">
									<td>#</td>
									<td>Item</td>
									<td>Quantity</td>
								</tr>
				<?php
						$counter=1;
						foreach($items as $item => $qty)
						{
				?>
								<tr class="blue-text text-capitalize">
									<td><?php echo $counter; ?></td>
									<td><?php echo base64_decode($item); ?></td>
									<td><?php echo "x ".$qty; ?></td>
								</tr>
				<?php
							$counter++;
						} 
				?>
								<tr class="blue white-text">
									<td colspan="3"  style="font-size: 1.3rem">TOTAL AMOUNT - Rs. <?php echo $amount; ?></td>
								</tr>
							</tbody>
			 	<?php
					}
					else
					{
				?>
							<tbody>
								<tr class="blue-text">
									<td colspan="3">No items found in cart</td>
								</tr>
							</tbody>
				<?php	
					}
				?>
						</table>
					</div>
				<?php
			}
				?>
					<form action="doOrder.php" method="post" class=" white border border-light rounded-lg p-3">
						<!-- CSRF token-->
					    <input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">
					    <input type="hidden" name="amount" value="<?php echo $_POST["amount"]; ?>">
					    <input class="form-control" type="text" name="address" id="orderAddress" placeholder="Enter Delivery Address" oninput="orderAddressValidator(this.value)">
					    <button id="orderButton" type="submit" class="btn btn-success mt-4 mb-3 waves-effect disabled"><i class="fas fa-pizza-slice mr-2"></i>PLACE ORDER</button>
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
<script type="text/javascript">
	function orderAddressValidator(val)
	{
		if(val.length>0)
		{
			if(val==' ')
				$('#orderAddress').val('');
			else
			{
				$('#orderButton').removeClass('disabled');
			}
		}
		else
			$('#orderButton').addClass('disabled');
	}
</script>
</body>
</html>