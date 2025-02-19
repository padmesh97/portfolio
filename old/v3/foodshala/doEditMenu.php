<?php 
	session_start();

	if (!empty($_POST)) 
	{
	    if (hash_equals($_SESSION["csrf_token"], $_POST["token"])) 
	    {
	    	if(isset($_POST["action"]))
	    	{
	    		if($_POST["action"]=="add")
	    		{
	    			$itemName=$_POST["newItemName"];
	    			$itemPrice=$_POST["newItemPrice"];
	    			$itemCategory=$_POST["newItemCategory"];
	    			$itemType=$_POST["newItemType"];

	    			require("credentials.php");

		        	//inserting new menu item
		        	try{
		        		$sql="INSERT into menu (rest_id,item,price,category,type) VALUES (:rest_id,:item_name,:item_price,:item_category,:item_type)";

		        		$result=$conn->prepare($sql);

		        		$result->bindParam(':rest_id',$_SESSION["rest_id"]);
		        		$result->bindParam(':item_name',$itemName);
		        		$result->bindParam(':item_price',$itemPrice);
		        		$result->bindParam(':item_category',$itemCategory);
		        		$result->bindParam(':item_type',$itemType);

			        	$result->execute();

			        	unset($result);//closing the prepared pdo statement
			        	$conn=null;//closing mysql pdo connection
			        	header("location: edit_menu.php");
			        }
			        catch(PDOException $e)
			        {
			        	$error="Couldn't add new food item";
			        	header("location: edit_menu?error=".urlencode($error));
			        }
	    		}

	    		if($_POST["action"]=="edit")
	    		{
	    			$itemId=$_POST["editItemId"];
	    			$itemName=$_POST["editItemName"];
	    			$itemPrice=$_POST["editItemPrice"];
	    			$itemCategory=$_POST["editItemCategory"];
	    			$itemType=$_POST["editItemType"];

	    			require("credentials.php");

		        	//inserting new menu item
		        	try{
		        		$sql="UPDATE menu SET item=:item_name,price=:item_price,category=:item_category,type=:item_type WHERE id=:item_id";

		        		$result=$conn->prepare($sql);

		        		$result->bindParam(':item_id',$itemId);
		        		$result->bindParam(':item_name',$itemName);
		        		$result->bindParam(':item_price',$itemPrice);
		        		$result->bindParam(':item_category',$itemCategory);
		        		$result->bindParam(':item_type',$itemType);

			        	$result->execute();

			        	unset($result);//closing the prepared pdo statement
			        	$conn=null;//closing mysql pdo connection
			        	header("location: edit_menu.php");
			        }
			        catch(PDOException $e)
			        {
			        	$error="Couldn't edit food item";
			        	header("location: edit_menu?error=".urlencode($error));
			        }

	    		}

	    		if($_POST["action"]=="delete")
	    		{
	    			$itemId=$_POST["deleteItemId"];

	    			require("credentials.php");

		        	//inserting new menu item
		        	try{
		        		$sql="DELETE FROM menu WHERE id=:item_id";

		        		$result=$conn->prepare($sql);

		        		$result->bindParam(':item_id',$itemId);

			        	$result->execute();

			        	unset($result);//closing the prepared pdo statement
			        	$conn=null;//closing mysql pdo connection
			        	header("location: edit_menu.php");
			        }
			        catch(PDOException $e)
			        {
			        	$error="Couldn't Delete food item";
			        	header("location: edit_menu?error=".urlencode($error));
			        }

	    		}
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