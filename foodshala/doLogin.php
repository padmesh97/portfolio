<?php
	session_start();

	if (!empty($_POST)) 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_POST["token"])) 
	    {
        	$email="";$password="";
        	$loginSuccess=false;
        	$customerError=false;
        	$restaurantError=false;

        	if(isset($_POST["loginEmail"]))
        		$email=$_POST["loginEmail"];
        	if(isset($_POST["loginPassword"]))
        		$password=$_POST["loginPassword"];


        	require("credentials.php");

        	//checking email and password in customer table
        	try{
        		$sql="SELECT name,password,type,cust_id FROM customer_info WHERE email=:email";

        		$result=$conn->prepare($sql);
        		$result->bindParam(':email',$email);

	        	$result->execute();
	        	if($result->rowCount()>0)
	        	{
	        		$row=$result->fetch(PDO::FETCH_ASSOC);
	        		if(password_verify($password,$row['password']))
	        		{
	        			$loginSuccess=true;
	        			$_SESSION["name"]=$row["name"];
	        			$_SESSION["type"]=$row["type"];
	        			$_SESSION["cust_id"]=$row["cust_id"];
	        			unset($result);//closing the prepared pdo statement
		        		$conn=null;//closing mysql pdo connection

		        		//Redirecting according to next url request
		        		if(isset($_POST["next"]) && base64_decode($_POST["next"])!="foodshala")
							header("location: ".base64_decode($_POST["next"]));
						else
							header("location: index.php");
	        		}
	        		else
	        		{
	        			$customerError=true;
	        			$error="Incorrect E-mail or Password";
	        			unset($result);//closing the prepared pdo statement
		        		$conn=null;//closing mysql pdo connection
		        		header("location: login.php?error=".urlencode($error));
	        		}
	        	}
        	}
        	catch(PDOException $e){
        		$error="Request cannot be executed";
	        	header("location: login.php?error=".urlencode($error));
        	}

        	//checking email and password in restaurant table
        	if(!$loginSuccess)
        	{
        		require("credentials.php");

	        	try{
	        		$sql="SELECT restaurant_name,owner_name,password,type,rest_id FROM restaurant_info WHERE email=:email";

	        		$result=$conn->prepare($sql);
	        		$result->bindParam(':email',$email);

		        	$result->execute();
		        	if($result->rowCount()>0)
		        	{
		        		$row=$result->fetch(PDO::FETCH_ASSOC);
		        		if(password_verify($password,$row['password']))
		        		{
		        			$loginSuccess=true;
		        			$_SESSION["rest_name"]=$row["restaurant_name"];
		        			$_SESSION["name"]=$row["owner_name"];
		        			$_SESSION["type"]=$row["type"];
		        			$_SESSION["rest_id"]=$row["rest_id"];
		        			unset($result);//closing the prepared pdo statement
			        		$conn=null;//closing mysql pdo connection
			        		
			        		//Redirecting according to next request
			        		if(isset($_POST["next"]) && base64_decode($_POST["next"])!="foodshala")
								header("location: ".base64_decode($_POST["next"]));
							else
								header("location: index.php");
		        		}
		        		else
		        		{
		        			$restaurantError=true;
		        			$error="Incorrect E-mail or Password";
		        			unset($result);//closing the prepared pdo statement
			        		$conn=null;//closing mysql pdo connection
			        		header("location: login.php?error=".urlencode($error));
		        		}
		        	}

	        	}
	        	catch(PDOException $e){
	        		$error="Request cannot be executed";
		        	header("location: login.php?error=".urlencode($error));
	        	}
	        }

	        if(!$loginSuccess && !$customerError && !$restaurantError) //if no user found in both customer and restaurant table
	        {
	        	$error="User doesn't exist";
    			unset($result);//closing the prepared pdo statement
        		$conn=null;//closing mysql pdo connection
        		header("location: login.php?error=".urlencode($error));
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