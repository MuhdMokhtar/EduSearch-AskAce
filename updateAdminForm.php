<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_POST['Update']))
	{
		$AdminID = $_GET['GetAdminID'];
		$AdminName = $_POST['AdminName'];
		$AdminEmail = $_POST['AdminEmail'];
		$AdminPassword = $_POST['AdminPassword'];
		$AdminContact = $_POST['AdminContact'];
		
		$query = "UPDATE admin
					SET AdminID='".$AdminID."',
					AdminName='".$AdminName."', 
					AdminEmail='".$AdminEmail."',
					AdminPassword='".$AdminPassword."',
					AdminContact='".$AdminContact."'
					WHERE AdminID='".$AdminID."'";

		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "User data successfully updated";
			header("location:adminlist.php");
		}
		else
		{
			die("Error updating user data !  ".$conn->error);
		}
	}

	else
	{
		header("location:adminlist.php");
	}
	
?>