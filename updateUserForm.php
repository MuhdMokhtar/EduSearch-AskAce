<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	if(isset($_POST['Update']))
	{
		$UserID = $_GET['GetUserID'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		$Phone = $_POST['Phone'];
		
		$query = "UPDATE users
					SET UserID='".$UserID."',
					Username='".$Username."', 
					Email='".$Email."',
					Password='".$Password."',
					Phone='".$Phone."'
					WHERE UserID='".$UserID."'";

		$result = mysqli_query($conn, $query);
		
		if($result)
		{
			echo "User data successfully updated";
			header("location:userlist.php");
		}
		else
		{
			die("Error updating user data !  ".$conn->error);
		}
	}

	else
	{
		header("location:userlist.php");
	}
	
?>