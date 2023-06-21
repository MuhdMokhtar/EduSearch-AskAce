<?php
	require_once('dbase.php');
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	} 
	
	if(isset($_POST['Confirm']))
	{
		$ExpertID = $_POST['ExpertID'];
		$ExpertName = $_POST['ExpertName'];
		$ExpertEmail = $_POST['ExpertEmail'];
		$ExpertPassword = $_POST['ExpertPassword'];
		
		$query = "INSERT INTO expert (ExpertID, ExpertName, ExpertEmail, ExpertPassword)
					VALUES ('$ExpertID', '$ExpertName', '$ExpertEmail', '$ExpertPassword')";

		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "Data successfully added into the system";
			header("location:expertlist.php");
		}
		else
		{
			die("Error inserting data !  ".$conn->error);
			header("location:addExpert.php");
		}
	}
	
	else
	{
		header("location:addExpert.php");
	}
?>