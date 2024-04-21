<?php
	session_start();

	if (!empty($_POST)) 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_POST["token"])) 
	    {
        	$name="";$email="";$password="";$contact="";$mealPref="";$cust_id="";
        	if(isset($_POST["customerName"]))
        		$name=$_POST["customerName"];
        	if(isset($_POST["customerEmail"]))
        	{
        		$email=$_POST["customerEmail"];
        		$cust_id=base64_encode($email);
        	}
        	if(isset($_POST["customerPassword"]))
        		$password=password_hash($_POST["customerPassword"],PASSWORD_DEFAULT);
        	if(isset($_POST["customerContact"]))
        		$contact=$_POST["customerContact"];
        	if(isset($_POST["customerMeal"]))
        		$mealPref=$_POST["customerMeal"];

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
	        		header("location: customer_register.php?error=".urlencode($error));
	        	}
        	}
        	catch(PDOException $e){
        		$error="Request cannot be executed";
	        	header("location: customer_register.php?error=".urlencode($error));
        	}

        	//checking presence of contact already
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
	        		header("location: customer_register.php?error=".urlencode($error));
	        	}
        	}
        	catch(PDOException $e){
        		$error="Request cannot be executed";
	        	header("location: customer_register.php?error=".urlencode($error));
        	}

        	//inserting values after all validation
        	try{
	        	$sql="INSERT into customer_info (type,name,email,password,contact,preference,cust_id) VALUES ('customer',:name,:email,:password,:contact,:preference,:cust_id)";

	        	$result=$conn->prepare($sql);
	        	$result->bindParam(':name',$name);
	        	$result->bindParam(':email',$email);
	        	$result->bindParam(':password',$password);
	        	$result->bindParam(':contact',$contact);
	        	$result->bindParam(':preference',$mealPref);
	        	$result->bindParam(':cust_id',$cust_id);	

	        	$result->execute();

	        	unset($result);//closing the prepared pdo statement
	        	$conn=null;//closing mysql pdo connection

	        	header("location: register_success.php");

	        }
	        catch(PDOException $e){
	        	$error="Request cannot be executed";
	        	header("location: customer_register.php?error=".urlencode($error));
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