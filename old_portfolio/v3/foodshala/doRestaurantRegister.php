<?php
	session_start();

	if (!empty($_POST)) 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_POST["token"])) 
	    {
        	$restaurantName="";$ownerName="";$email="";$password="";$contact="";$city="";$area="";$rest_id="";
        	if(isset($_POST["restaurantName"]))
        		$restaurantName=$_POST["restaurantName"];
        	if(isset($_POST["restaurantOwner"]))
        		$ownerName=$_POST["restaurantOwner"];
        	if(isset($_POST["restaurantEmail"]))
        	{
        		$email=$_POST["restaurantEmail"];
        		$rest_id=base64_encode($email);
        	}
        	if(isset($_POST["restaurantPassword"]))
        		$password=password_hash($_POST["restaurantPassword"],PASSWORD_DEFAULT);
        	if(isset($_POST["restaurantContact"]))
        		$contact=$_POST["restaurantContact"];
        	if(isset($_POST["restaurantCity"]))
        		$city=$_POST["restaurantCity"];
        	if(isset($_POST["restaurantArea"]))
        		$area=$_POST["restaurantArea"];

        	require("credentials.php");

        	//checking presence of email already
        	try{
        		$sql="SELECT email FROM customer_info WHERE email=:email";//checking email presence in customer table

        		$result=$conn->prepare($sql);
        		$result->bindParam(':email',$email);

	        	$result->execute();
	        	$count1=$result->rowCount();

	        	$sql="SELECT email FROM restaurant_info WHERE email=:email";//checking email presence in restaurant table

        		$result=$conn->prepare($sql);
        		$result->bindParam(':email',$email);

	        	$result->execute();
	        	$count2=$result->rowCount();

	        	$error="Email already registered";
	        	if($count1>0 || $count2>0)
	        	{
	        		unset($result);//closing the prepared pdo statement
	        		$conn=null;//closing mysql pdo connection
	        		header("location: restaurant_register.php?error=".urlencode($error));
	        	}
        	}
        	catch(PDOException $e){
        		$error="Request cannot be executed";
	        	header("location: restaurant_register.php?error=".urlencode($error));
        	}

        	//checking presence if contact already registered
        	try{
        		$sql="SELECT contact FROM customer_info WHERE contact=:contact";//checking contact presence in customer table

        		$result=$conn->prepare($sql);
        		$result->bindParam(':contact',$contact);

	        	$result->execute();
	        	$count1=$result->rowCount();

	        	$sql="SELECT contact FROM restaurant_info WHERE contact=:contact";//checking contact presence in restaurant table

        		$result=$conn->prepare($sql);
        		$result->bindParam(':contact',$contact);

	        	$result->execute();
	        	$count2=$result->rowCount();

	        	$error="Contact already registered";
	        	if($count1>0 || $count2>0)
	        	{
	        		unset($result);//closing the prepared pdo statement
	        		$conn=null;//closing mysql pdo connection
	        		header("location: restaurant_register.php?error=".urlencode($error));
	        	}
        	}
        	catch(PDOException $e){
        		$error="Request cannot be executed";
	        	header("location: restaurant_register.php?error=".urlencode($error));
        	}

        	//inserting values after all validation
        	try{
	        	$sql="INSERT into restaurant_info (type,restaurant_name,owner_name,email,password,contact,city,area,rest_id) VALUES ('restaurant',:restaurant_name,:owner_name,:email,:password,:contact,:city,:area,:rest_id)";

	        	$result=$conn->prepare($sql);
	        	$result->bindParam(':restaurant_name',$restaurantName);
	        	$result->bindParam(':owner_name',$ownerName);
	        	$result->bindParam(':email',$email);
	        	$result->bindParam(':password',$password);
	        	$result->bindParam(':contact',$contact);
	        	$result->bindParam(':city',$city);
	        	$result->bindParam(':area',$area);
	        	$result->bindParam(':rest_id',$rest_id);	

	        	$result->execute();

	        	unset($result);//closing the prepared pdo statement
	        	$conn=null;//closing mysql pdo connection

	        	header("location: register_success.php");

	        }
	        catch(PDOException $e){
	        	$error="Request cannot be executed";
	        	header("location: restaurant_register.php?error=".urlencode($error));
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
    	//navigate to home for empty POST request
    	header("location: index.php");
    }

?>