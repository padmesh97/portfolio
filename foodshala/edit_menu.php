<?php
session_start();

if (empty($_SESSION["csrf_token"])) 
	$_SESSION["csrf_token"] = bin2hex(random_bytes(16));

if (!isset($_SESSION["type"]) || $_SESSION["type"]!="restaurant")
	header("location: index.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT MENU</title>
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
		input[type=text]:focus{
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
						<?php include "ui/nav_items.php"; ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section>
		<div class="row bg mr-0">
			<div class="container-lg blue-text" >
				<div class="col-12 col-md-10 offset-md-1">
				
					<div class="border border-light rounded p-2 white">
						<h5 class="text-blue mt-3 text-uppercase">menu -&nbsp;
						<?php
							if(isset($_SESSION["rest_name"]))
								echo $_SESSION["rest_name"];
						?>
						</h5>

						<!-- error div-->
						<?php
					    if(isset($_GET['error']))
					    {
					    ?>					    
						    <p class="red white-text text-center p-2 mx-5">
						    	<?php echo $_GET['error']; ?>
						    </p>
						<?php
						}
					    ?>
						
						<!-- ADD NEW FOOD ITEM btn and Modal -->
						<button class="btn btn-info py-2 px-3 my-3" data-toggle="modal" data-target="#addNewModal"><i class="fas fa-plus mr-2"></i>Add new item</button>

						<!-- add new Modal-->
						<div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel"
						  aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<h5 class="modal-title" id="addModalLabel">Add New Item</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form id="addNewItemForm" class="border border-light rounded-lg p-5 white" method="post" action="doEditMenu.php">
						        	<!-- CSRF token-->
					    			<input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">

					    			<!-- Action-->
					    			<input type="hidden" name="action" value="add">

					    			<input type="text" id="newItemName" name="newItemName" class="form-control mb-4" placeholder="Item Name" oninput="addValidator('name',this.value)">

					    			<input type="text" id="newItemPrice" name="newItemPrice" class="form-control mb-4" maxlength="5" placeholder="Item Price (INR)" oninput="addValidator('price',this.value)">

					    			<select class="browser-default custom-select mb-4" id="newItemCategory" name="newItemCategory">
									  <option value="starter" selected>Starter</option>
									  <option value="full_course">Full Course</option>
									  <option value="drink">Drink</option>
									  <option value="dessert">Dessert</option>
									</select>

									<select class="browser-default custom-select mb-4" id="newItemType" name="newItemType">
									  <option value="veg" selected>Veg</option>
									  <option value="non_veg">Non-Veg</option>
									</select>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" id="addSubmitButton" class="btn btn-primary disabled"><i class="fas fa-check mr-2"></i>Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>


						<!-- Fetching and displaying saved Menu-->
						
						<table class="table table-bordered table-responsive border border-0">
						  <thead>
						    <tr>
						      <th scope="col" class="blue white-text text-uppercase">#</th>
						      <th scope="col" class="blue white-text text-uppercase">Item Name</th>
						      <th scope="col" class="blue white-text text-uppercase">Price</th>
						      <th scope="col" class="blue white-text text-uppercase">Category</th>
						      <th scope="col" class="blue white-text text-uppercase">Type</th>
						      <th scope="col" class="blue white-text text-uppercase">Action</th>
						    </tr>
						  </thead>
						  <tbody>

							<?php 

							require("credentials.php");

				        	//fetching for menu from "menu" table
				        	try{
				        		$sql="SELECT id,item,price,category,type FROM menu WHERE rest_id=:rest_id";

				        		$result=$conn->prepare($sql);
				        		$result->bindParam(':rest_id',$_SESSION["rest_id"]);

					        	$result->execute();
					        	$counter=1;
					        	if($result->rowCount()>0)
					        	{
						        	while($row=$result->fetch(PDO::FETCH_ASSOC))
						        	{
							?>

						    <tr>
						      <th scope="row"><?php echo $counter; ?></th>
						      <td class="text-capitalize"><?php echo $row["item"]; ?></td>
						      <td><?php echo $row["price"]; ?></td>
						      <td class="text-uppercase"><?php echo $row["category"]; ?></td>
						      <td class="text-capitalize"><?php echo $row["type"]; ?></td>
						      <td>
						      	<button type="button" class="btn btn-secondary btn-sm rounded-lg waves-effect" data-toggle="modal" data-target="#editModal" onclick="editFill(<?php echo $row["id"].",'".$row["item"]."',".$row["price"].",'".$row["category"]."','".$row["type"]."'"; ?>)"><i class="fas fa-edit mr-2"></i>Edit</button>

						      	<button type="button" class="btn btn-danger btn-sm rounded-lg waves-effect" data-toggle="modal" data-target="#deleteModal" onclick="deleteFill(<?php echo $row["id"].",'".$row["item"]."'"; ?>)"><i class="fas fa-trash-alt mr-2"></i>Delete</button>
						      </td>
						    </tr>

						    <?php
						    		$counter++;
						    		}
						    	}
						    	else
						    	{
						    ?>

							<tr>
						      <th scope="row">-</th>
						      <td colspan="5" class="text-center">No items found in menu</td>
						    </tr>

						    <?php 
						    	}
						    }
						    catch(PDOException $e)
						    {
						    	$error="Couldn't fetch menu items";
						    	header("location: edit_menu.php?error=".urlencode($error));
						    }
						    ?>


						  </tbody>
						</table>

						<!--Edit Modal-->
						<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
						  aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form id="editItemForm" class="border border-light rounded-lg p-5 white" method="post" action="doEditMenu.php">
						        	<!-- CSRF token-->
					    			<input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">

					    			<!-- Action-->
					    			<input type="hidden" name="action" value="edit">

					    			<input type="hidden" id="editItemId" name="editItemId" value="">

					    			<input type="text" id="editItemName" name="editItemName" class="form-control mb-4" placeholder="Item Name" oninput="editValidator('name',this.value)">

					    			<input type="text" id="editItemPrice" name="editItemPrice" class="form-control mb-4" maxlength="5" placeholder="Item Price (INR)" oninput="editValidator('price',this.value)">

					    			<select class="browser-default custom-select mb-4" id="editItemCategory" name="editItemCategory">
									  <option value="starter">Starter</option>
									  <option value="full_course">Full Course</option>
									  <option value="drink">Drink</option>
									  <option value="dessert">Dessert</option>
									</select>

									<select class="browser-default custom-select mb-4" id="editItemType" name="editItemType">
									  <option value="veg">Veg</option>
									  <option value="non_veg">Non-Veg</option>
									</select>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" id="editSubmitButton" class="btn btn-primary"><i class="fas fa-check mr-2"></i>Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>

						<!--Delete Modal-->
						<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="deleteModalLabel">Delete Food Item</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form id="deleteItemForm" method="post" action="doEditMenu.php">
									    	<!-- CSRF token-->
											<input type="hidden" name="token" value="<?php echo $_SESSION["csrf_token"]; ?>">

											<!-- Action-->
											<input type="hidden" name="action" value="delete">

											<input type="hidden" id="deleteItemId" name="deleteItemId" value="">
										</form>

										<p class="text-muted p-3">Do you want to delete food item - <span id="deleteItemName"></span>&nbsp;?
										</p>
									</div>
									<div class="modal-footer">
										<button type="submit" id="deleteSubmitButton" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Delete</button>
									</div>
								</div>
							</div>
						</div>

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
<script type="text/javascript" src="js/addNewItemValidator.js"></script>
<script type="text/javascript" src="js/editItemValidator.js"></script>
<script type="text/javascript" src="js/deleteItemValidator.js"></script>
</body>
</html>