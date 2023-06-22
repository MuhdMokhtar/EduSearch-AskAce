<?php
	require_once('dbase.php');
	
	if(!$conn) 
	{ 
		die(" Connection Error "); 
	}
	
	$query = "SELECT * FROM expert
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
        <li><a href=""> COMPLAINT </a></li>
        <li><a href=""> REPORT </a></li>
        <li><a href=""> FEEDBACK </a></li>
        <li><a href=""> PROFILE </a></li>
        <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</div>

<input type="button" value="Admin List" onclick="location.href='./adminlist.php'">
<input type="button" value="User List" onclick="location.href='./userlist.php'">
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
						<td style="background-color:#a6bbbd; color:white;"><b>ExpertID</b></td>
						<td style="background-color:#a6bbbd; color:white;"><b>ExpertName</b></td>
						<td style="background-color:#a6bbbd; color:white;"><b>ExpertEmail</b></td>
						<td style="background-color:#a6bbbd; color:white;"><b>ContactInfo</b></td>
						<td style="background-color:#a6bbbd; color:white;"><b>ExpertPassword</b></td>
						<td colspan="3" style="background-color:#a6bbbd; color:white;"><b>ACTIONS</b></td>
					  </tr>
					  
					  
					  <?php
						while($row=mysqli_fetch_assoc($result))
						{
							$ExpertID = $row['ExpertID'];
							$ExpertName = $row['ExpertName'];
							$ExpertEmail = $row['ExpertEmail'];
							$ContactInfo = $row['ContactInfo'];
							$ExpertPassword = $row['ExpertPassword'];
					  ?>
						<tr id="list">
							td><?php echo $ExpertID ?></td>
							<td><?php echo $ExpertName ?></td>
							<td><?php echo $ExpertEmail ?></td>
							<td><?php echo $ContactInfo ?></td>
							<td><?php echo $ExpertPassword ?></td>
							<td><a href="updateExpert.php?GetExpert=<?php echo $ExpertID ?>">Edit</a></td>
                            <td><a onclick="deleteExpert()" href="deleteExpertForm.php?DeleteExpert=<?php echo $ExpertID ?>">Delete</a></td>
							
						</tr>
					  <?php
						}
					  ?>
					  
					</table><br>
                                <input type="button" value="Add Expert" onclick="location.href='./addExpert.php'">
				</center>
	<!------table------>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>
</html>