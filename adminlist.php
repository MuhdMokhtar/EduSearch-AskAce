

<?php
	require_once('dbase.php');
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$query = "SELECT * FROM admin
				LIMIT 15";
	
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
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
        <li><a href="adminC.php"> COMPLAINT </a></li>
        <li><a href="report.php"> REPORT </a></li>
        <li><a href="profile.php"> PROFILE </a></li>
        <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</div>
<input type="button" value="User List" onclick="location.href='./userlist.php'">
<input type="button" value="Expert List" onclick="location.href='./expertlist.php'">
<input type="button" value="Report" onclick="location.href='./calculate.php'">
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
	
  </style>
  
</head>

<body>
		<center>
	     

				<br>
					<table>

					  <tr id="list">
						<td style="background-color:#a6bbbd; color: white"><b>AdminID</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>AdminName</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>AdminEmail</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>AdminPassword</b></td>
						<td style="background-color:#a6bbbd; color: white"><b>admin_Contact</b></td>
						<td colspan="2" style="background-color:#a6bbbd; color: white"><b>ACTIONS</b></td>
					  </tr>
		
					  
					  <?php
						while($row=mysqli_fetch_assoc($result))
						{
							$AdminID = $row['AdminID'];
							$AdminName = $row['AdminName'];
							$AdminEmail = $row['AdminEmail'];
							$AdminPassword = $row['AdminPassword'];
							$AdminContact = $row['AdminContact'];
					  ?>
						<tr id="list">
							<td><?php echo $AdminID ?></td>
							<td><?php echo $AdminName ?></td>
							<td><?php echo $AdminEmail ?></td>
							<td><?php echo $AdminPassword ?></td>
							<td><?php echo $AdminContact ?></td>
							<td><a href="updateAdmin.php?GetAdmin=<?php echo $AdminID ?>">Edit</a></td>
                            <td><a onclick="deleteAdmin()" href="deleteAdminForm.php?DeleteAdmin=<?php echo $AdminID ?>">Delete</a></td>
						</tr>
					  <?php
						}
					  ?>
					  
					</table><br>
                                <input type="button" value="Add Admin" onclick="location.href='./addAdmin.php'">

				</center>
	<!------table------>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>
</html>