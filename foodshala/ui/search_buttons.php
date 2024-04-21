	<a href="view_menu.php?rest_id=<?php echo $row_copy["rest_id"] ?>">
		<button type="button" class="btn btn-secondary btn-sm waves-effect"><i class="fas fa-list mr-2"></i>View Menu</button>
	</a>
	<?php
		if(!isset($_SESSION["type"]) || $_SESSION["type"]=="customer")
		{
	?>
		<a href="order.php?rest_id=<?php echo $row_copy["rest_id"] ?>">
			<button type="button" class="btn btn-primary btn-sm waves-effect"><i class="fas fa-pizza-slice mr-2"></i>ORDER</button>
		</a>
	<?php 
		}
	?>

</div> <!-- for ending of search item <div> -->