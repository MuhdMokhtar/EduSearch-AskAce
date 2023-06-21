<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_GET['DeleteAdmin']))
	{
		$Admin_ID = $_GET['DeleteAdmin'];
		
		$query = "DELETE FROM admin 
					WHERE AdminID = '".$AdminID."'";
			
		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "Data successfully deleted from system";
			header("location:adminlist.php");
		}
		
		else
		{
			die("Error deleting data !  ".$conn->error);
		}
	}
	else
	{
		header("location:adminlist.php");
	}
?>