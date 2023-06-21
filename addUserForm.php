<?php
require_once('dbase.php');
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	} 
	
	if(isset($_POST['Confirm']))
	{
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$Phone = $_POST['Phone'];
		
		$query = "INSERT INTO users (Username, Email, Password, Phone)
					VALUES ('$Username', '$Email', '$Password', '$Phone')";

		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "Data successfully added into the system";
			header("location:userlist.php");
		}
		else
		{
			die("Error inserting data !  ".$conn->error);
			header("location:addUser.php");
		}
	}
	
	else
	{
		header("location:addUser.php");
	}
?>