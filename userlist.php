<?php
	require_once('dbase.php');
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$query = "SELECT * FROM users
				LIMIT 15";
	
	$result = mysqli_query($conn, $query);
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
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</div>

<input type="button" value="Admin List" onclick="location.href='./adminlist.php'">
<input type="button" value="Expert List" onclick="location.href='./expertlist.php'">
<input type="button" value="Report" onclick="location.href='./calculate.php'">

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
	
  </style>
  
</head>

<body>
		<center>
<br><br><br><br>
					<table>
	
					  <tr id="list">
						<td style="background-color:#a6bbbd; color: white"><b>UserID</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>Username</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>Email</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>Password</b></td>
                        <td style="background-color:#a6bbbd; color: white"><b>Phone</b></td>
						<td colspan="3" style="background-color:#a6bbbd; color: white"><b>ACTIONS</b></td>
					  </tr>
					  
					  
					  <?php
						while($row=mysqli_fetch_assoc($result))
						{
							$UserID = $row['UserID'];
							$Username = $row['Username'];
							$Email = $row['Email'];
							$Password = $row['Password'];
                            $Phone = $row['Phone'];
					  ?>
						<tr id="list">
							<td><?php echo $UserID ?></td>
							<td><?php echo $Username ?></td>
							<td><?php echo $Email ?></td>
							<td><?php echo $Password ?></td>
                            <td><?php echo $Phone ?></td>
							<td><a href="updateUser.php?GetUser=<?php echo $UserID ?>">Edit</a></td>
                            <td><a onclick="deleteUser()" href="deleteUserForm.php?DeleteUser=<?php echo $UserID ?>">Delete</a></td>
							
							
						</tr>
					  <?php
						}
					  ?>
					  
					</table><br>
                                <input type="button" value="Add User" onclick="location.href='addUser.php'">
				</center>
	<!------table------>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>
</html>