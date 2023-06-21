<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_GET['DeleteUser']))
	{
		$user_ID = $_GET['DeleteUser'];
		
		$query = "DELETE FROM users 
					WHERE UserID = '".$UserID."'";
			
		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			//echo "Data successfully deleted from system";
			echo "<script>alert('Data successfully deleted from system');</script>";
			header("location:userlist.php");
		}
		
		else
		{
			die("Error deleting data !  ".$conn->error);
		}
	}
	else
	{
		header("location:userlist.php");
	}
?>