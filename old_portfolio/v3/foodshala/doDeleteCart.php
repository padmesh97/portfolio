<?php 

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

//deleting cart item cookies
deleteCookie("cart_rest_name",'/','lax');
deleteCookie("cart_rest_id",'/','lax');
deleteCookie("cart_items",'/','lax');

if(isset($_GET["next"]))
	header("location: ".base64_decode($_GET["next"]));
else
	header("location: index.php");
?>