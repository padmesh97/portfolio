		<li class="nav-item">
			<?php
			if(isset($_SESSION["type"]))
			{
				if($_SESSION["type"]=="customer")
				{
			?>
			<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle text-capitalize" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none !important">
		          <i class="fas fa-user"></i> 
	    <?php
		          $name=$_SESSION["name"];
		          $name=explode(" ",$name);
		          echo "Hi, ".$name[0];
	    ?>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
		          <a class="dropdown-item" href="view_orders.php">View ORDERS</a>
		          <a class="dropdown-item" href="view_profile.php">View Profile</a>
		          <a class="dropdown-item" href="doLogout.php?next=<?php echo base64_encode(basename($_SERVER['REQUEST_URI'])); ?>">Log out</a>
		        </div>
	    	</li>
	    <?php
				}
				else
				{
		?>
			<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle text-capitalize" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none !important">
		          <i class="fas fa-user"></i> 
	    <?php
		          $name=$_SESSION["name"];
		          $name=explode(" ",$name);
		          echo "Hi, ".$name[0];
	    ?>
	        	</a>
	        	<div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
					<a class="dropdown-item" href="view_orders.php">View ORDERS</a>
					<a class="dropdown-item" href="edit_menu.php">Edit Menu</a>
					<a class="dropdown-item" href="view_profile.php">View Profile</a>
					<a class="dropdown-item" href="doLogout.php?next=<?php echo base64_encode(basename($_SERVER['REQUEST_URI'])); ?>">Log out</a>
	        	</div>
	    	</li>
		<?php
				}
			}
			else
			{
	    ?>
			<li class="nav-item active">
				<a class="nav-link" href="login.php?next=<?php echo base64_encode(basename($_SERVER['REQUEST_URI'])); ?>">
					 Login
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="customer_register.php">
					Register</a>
			</li>
		</li>
		<?php
			}
			if(isset($_COOKIE["cart_rest_id"]) && isset($_COOKIE["cart_rest_name"]) && isset($_COOKIE["cart_items"]) && (!isset($_SESSION["type"]) || $_SESSION["type"]=="customer"))
			{
				$cart_count=count(json_decode(base64_decode($_COOKIE["cart_items"]),true));
				$base=basename($_SERVER['REQUEST_URI']);

				if($cart_count>0 && gettype(strpos($base,"view_menu.php"))=='boolean'  && gettype(strpos($base,"order.php"))=='boolean'  && gettype(strpos($base,"order_confirm.php"))=='boolean')
				{
		?>
			<div class="position-absolute px-2 pt-2 pb-0 rounded-lg blue" style="top:5rem;right:3em">
				<a  href="order.php?rest_id=<?php echo $_COOKIE["cart_rest_id"]; ?>">
					<span class="badge badge-danger">1</span>
					VIEW CART
				</a>
				<a href="doDeleteCart.php?next=<?php echo base64_encode(basename($_SERVER['REQUEST_URI'])); ?>">
					<div class="badge badge-dark rounded-circle" style="padding: 3px 7px 5px 7px">x</div>
				</a>
			</div>
		<?php
				}
			}
		?>