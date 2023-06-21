<?php
	require_once('dbase.php');

	if(!$conn)
	{
		die(" Connection Error ");
	}

	if(isset($_POST['Confirm']))
	{
		$AdminID = $_POST['AdminID'];
		$AdminName = $_POST['AdminName'];
		$AdminEmail = $_POST['AdminEmail'];
		$AdminPassword = $_POST['AdminPassword'];
		$AdminContact = $_POST['AdminContact'];

		$query = "INSERT INTO admin (AdminID, AdminName, AdminEmail, AdminPassword, AdminContact)
					VALUES ('$AdminID', '$AdminName', '$AdminEmail', '$AdminPassword', '$AdminContact')";

		$result = mysqli_query($conn, $query);

		if($result)
		{
			echo "Data successfully added into the system";
			header("location:adminlist.php");
		}
		else
		{
			die("Error inserting data !  ".$conn->error);
			header("location:addadmin.php");
		}
	}

	else
	{
		header("location:addAdmin.php");
	}
?>
