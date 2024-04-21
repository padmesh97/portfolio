<?php 
	session_start();

function deleteCookie($name,$path,$samesite)
{
	if(isset($_COOKIE[$name]))
	{
		if (PHP_VERSION_ID < 70300) 
		{
	        setcookie($name,'',(time()-(86400*370)),$path.";".$samesite);
	    }else {
	        setcookie($name,'',[
	            'expires' => (time()-(86400*370)),
	            'path' => $path,
	            'samesite' => $samesite
	        ]);
	    }
	}
}

	if (!empty($_POST) && isset($_SESSION["type"]) && $_SESSION["type"]=="customer") 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_POST["token"])) 
	    {
	    	if(isset($_COOKIE['cart_rest_id']) && isset($_COOKIE['cart_items']))
			{
				$restaurantId=$_COOKIE['cart_rest_id'];
				$items=$_COOKIE['cart_items'];
				$amount=$_POST['amount'];
				$address=base64_encode($_POST['address']);
				$orderId=bin2hex(random_bytes(8));

				include "credentials.php";

				//inserting new order details
	        	try{
	        		$sql="INSERT into orders (order_id,cust_id,items,rest_id,address,amount) VALUES (:order_id,:cust_id,:items,:rest_id,:address,:amount)";

	        		$result=$conn->prepare($sql);

	        		$result->bindParam(':order_id',$orderId);
	        		$result->bindParam(':cust_id',$_SESSION["cust_id"]);
	        		$result->bindParam(':items',$items);
	        		$result->bindParam(':rest_id',$restaurantId);
	        		$result->bindParam(':address',$address);
	        		$result->bindParam(':amount',$amount);

		        	$result->execute();

		        	unset($result);//closing the prepared pdo statement
		        	$conn=null;//closing mysql pdo connection

		        	//deleting cart item cookies
		        	deleteCookie("cart_rest_name",'/','lax');
		        	deleteCookie("cart_rest_id",'/','lax');
		        	deleteCookie("cart_items",'/','lax');

		        	//redirecting for successfull transaction of order
		        	header("location: order_success.php?status=success&order_id=".$orderId."&token=".$_SESSION["csrf_token"]);
		        }
		        catch(PDOException $e)
		        {
		        	$error="Transaction Failed<br>Order cannot be processed";
					header("location: order_success.php?status=failed&error=".urlencode($error)."&token=".$_SESSION["csrf_token"]);
		        }
			}
			else
			{
				$error="Transaction Failed<br>Invalid Cart Items";
				header("location: order_success.php?status=failed&error=".urlencode($error)."&token=".$_SESSION["csrf_token"]);
			}
	    }
	    else
	    {
	    	$error="Transaction Failed<br>Invalid Token";
			header("location: order_success.php?status=failed&error=".urlencode($error)."&token=".$_SESSION["csrf_token"]);
	    }
	}
	else
    {
    	$error="Transaction Failed<br>Invalid Request";
		header("location: order_success.php?status=failed&error=".urlencode($error)."&token=".$_SESSION["csrf_token"]);
    }

?>