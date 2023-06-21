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
        <li><a href=""> COMPLAINT </a></li>
        <li><a href=""> REPORT </a></li>
        <li><a href=""> FEEDBACK </a></li>
        <li><a href="profile.php"> PROFILE </a></li>
        <li><a href=""> LOGOUT </a></li>
    </ul>
</div>

<body>
<br><br>
<div class="card-header"><h3 class="text-center font-weight-light my-4"><center>Add Admin</center></h3></div>
<div class="card-body">
<br><br><br>
				<form action="addAdminForm.php" method="POST">
				<input type="hidden" name="action" value="insert">
					<center>
						<table>
							<tr>
								<th>Admin ID</th>
								<td><input type="text" id="AdminID" name="AdminID" placeholder="AdminID"></td>
							</tr>
							
							<tr>
								<th>Admin Name</th>
								<td><input type="text" id="AdminName" name="AdminName" placeholder="AdminName"></td>
							</tr>
							
							<tr>
								<th>Admin Email</th>
								<td><input type="text" id="AdminEmail" name="AdminEmail" placeholder="AdminEmail"></td>
							</tr>
							
							<tr>
								<th>Admin Password</th>
								<td><input type="text" id="AdminPassword" name="AdminPassword" placeholder="AdminPassword"></td>
							</tr>
							
							<tr>
								<th>Admin Contact</th>
								<td><input type="text" id="AdminContact" name="AdminContact" placeholder="AdminPhoneNo"></td>
							</tr>
			
						</table><br>
						
						<input type="submit" value="Submit" name="Confirm" onclick="addAdmin()">
						<input type="reset" value="Reset">
					</center>
				</form>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>

</html>