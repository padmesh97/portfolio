<?php
	session_start();

	if(isset($_GET["next"]))
	{
		$next=base64_decode($_GET["next"]);
		if(strpos($next,"order.php")>=0 || strpos($next,"order_confirm.php")>=0 || strpos($next,"order_success.php")>=0 || strpos($next,"edit_menu.php")>=0)
			header("location: index.php"); 
		else
			header("location: ".$next);
	}
	else
		header("location: index.php");


	session_unset();
	session_destroy();
?>