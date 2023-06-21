<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_GET['DeleteExpert']))
	{
		$Warden_ID = $_GET['DeleteExpert'];
		
		$query = "DELETE FROM expert 
					WHERE ExpertID = '".$ExpertID."'";
			
		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "Data successfully deleted from system";
			header("location:expertlist.php");
		}
		
		else
		{
			die("Error deleting data !  ".$conn->error);
		}
	}
	else
	{
		header("location:expertlist.php");
	}
?>