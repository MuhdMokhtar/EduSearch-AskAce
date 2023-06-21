<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$UserID = $_GET['GetUser'];
	$query = "SELECT * FROM users
				WHERE UserID ='".$UserID."'";

	$result = mysqli_query($conn, $query);
	
	while($row=mysqli_fetch_assoc($result))
	{
		$UserID = $row['UserID'];
		$Username = $row['Username'];
		$Email = $row['Email'];
		$Password = $row['Password'];
        $Phone = $row['Phone'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch</title>
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
<header class="header">
    <div class="logo logo-left">
        <img width="60px" src="Image/fklogo.png" alt="Left Logo">
    </div>
    <div class="text">FK-EduSearch</div>
    <div class="logo logo-right">
        <img width="60px" src="Image/notiLogo.png" alt="Right Logo">
    </div>

</header>

<div id="navBar">
    <ul>
        <li><a href="main.php"> HOME </a></li>
        <li><a href=""> COMPLAINT </a></li>
        <li><a href=""> REPORT </a></li>
        <li><a href=""> FEEDBACK </a></li>
        <li><a href="profile.php"> PROFILE </a></li>
        <li><a href=""> LOGOUT </a></li>
    </ul>
</div>

<input type="button" value="Admin List" onclick="location.href='./adminlist.php'">
<input type="button" value="User List" onclick="location.href='./userlist.php'">
<input type="button" value="Expert List" onclick="location.href='./expertlist.php'">
 <br><br><br>

  <title>Expert List</title>

  <style>
	input[type=text] 
	{
	  width: 70%;
	  padding: 2px;
	  
	}
	input[type=button]
	{
	  background-color: #a6bbbd;
      border: 3px solid black;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
	  border-radius: 2px;
	}
 
	#list th, #list td 
	{
	  border: 3px solid black;
	  border-collapse: collapse;
	  background: white;
	  padding: 5px;
	}

	
	button
	{
		border:2px solid black;
	}
	
		input[type=text], input[type=number], input[type=date]
	{
	  width: 99%;
	  padding: 10px;
	}
	
	input[type=submit]
	{
	  background-color: a6bbbd;
      border: 3px solid black;
      color: black;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
	  border-radius: 2px;
	}
	
	table, tr, th, td
	{
		border: 3px solid black;
		border-collapse: collapse;
		padding: 5px;
		text-align: left;
		background: white;
	}
	
	th
	{
		background: a6bbbd;
		color: black;
		width: 20%;
	}
	
	td
	{
		width: 80%;
	}
  </style>
</head>

<body>	

<!-- Update -->
				<form action="updateUserForm.php?GetUserID=<?php echo $UserID ?>" method="POST">
				<input type="hidden" name="action" value="update">
					<center>
						<table>
							<tr>
								<th>User ID</th>
								<td><input type="text" id="UserID" name="UserID" value="<?php echo $UserID ?>" disabled></td>
							</tr>
							
							<tr>
								<th>User Name</th>
								<td><input type="text" id="Username" name="Username" value="<?php echo $Username ?>"></td>
							</tr>
							
							<tr>
								<th>User Email</th>
								<td><input type="text" id="Email" name="Email" value="<?php echo $Email ?>"></td>
							</tr>
							
							<tr>
								<th>User Password</th>
								<td><input type="text" id="Password" name="Password" value="<?php echo $Password ?>"></td>
							</tr>
							
							
							<tr>
								<th>User PhoneNo</th>
								<td><input type="text" id="Phone" name="Phone" value="<?php echo $Phone ?>"></td>
							</tr>
			
						</table><br>
						
						<input type="submit" name="Update" value="Update" onclick="updateUser()">
					</center>
				</form>

</body>
<footer>
    Copyright FK
</footer>
</html>