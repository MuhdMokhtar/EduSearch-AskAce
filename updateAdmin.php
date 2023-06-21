<?php
	$conn = mysqli_connect("localhost", "root", "", "fk");
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$AdminID = $_GET['GetAdmin'];
	$query = "SELECT * FROM admin
				WHERE AdminID='".$AdminID."'";

	$result = mysqli_query($conn, $query);
	
	while($row=mysqli_fetch_assoc($result))
	{
		$AdminID = $row['AdminID'];
		$AdminName = $row['AdminName'];
		$AdminEmail = $row['AdminEmail'];
		$AdminPassword = $row['AdminPassword'];
		$AdminContact = $row['AdminContact'];
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
				<form action="updateAdminForm.php?GetAdminID=<?php echo $AdminID ?>" method="POST">
				<input type="hidden" name="action" value="update">
					<center>
						<table>
							<tr>
								<th>admin ID</th>
								<td><input type="text" id="AdminID" name="AdminID" value="<?php echo $AdminID ?>" disabled></td>
							</tr>
							
							<tr>
								<th>admin Name</th>
								<td><input type="text" id="AdminName" name="AdminName" value="<?php echo $AdminName ?>"></td>
							</tr>
							
							<tr>
								<th>admin Email</th>
								<td><input type="text" id="AdminEmail" name="AdminEmail" value="<?php echo $AdminEmail ?>"></td>
							</tr>
							
							<tr>
								<th>admin Password</th>
								<td><input type="text" id="AdminPassword" name="AdminPassword" value="<?php echo $AdminPassword ?>"></td>
							</tr>
							
							<tr>
								<th>admin Contact</th>
								<td><input type="text" id="AdminContact" name="AdminContact" value="<?php echo $AdminContact?>"></td>
							</tr>
			
						</table><br>
						
						<input type="submit" name="Update" value="Update" onclick="updateAdmin()">
					</center>
				</form>

</body>
<footer>
    Copyright FK
</footer>
</html>