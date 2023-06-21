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
<div class="card-header"><h3 class="text-center font-weight-light my-4"><center>Add User</center></h3></div>
<div class="card-body">
<br><br><br>
<body>

		<!-- insert users -->
				<form action="addUserForm.php" method="POST">
				<input type="hidden" name="action" value="insert">
					<center>
						<table>
							
							<tr>
								<th>User Name</th>
								<td><input type="text" id="Username" name="Username" placeholder="userName"></td>
							</tr>
							
							<tr>
								<th>User Email</th>
								<td><input type="text" id="Email" name="Email" placeholder="userEmail"></td>
							</tr>
							
							<tr>
								<th>user Password</th>
								<td><input type="text" id="Password" name="Password" placeholder="userPassword"></td>
							</tr>
							
							<tr>
								<th>User Contact</th>
								<td><input type="text" id="Phone" name="Phone" placeholder="userPhoneNo"></td>
							</tr>
			
						</table><br>
						
						<input type="submit" value="Submit" name="Confirm" onclick="addUser()">
						<input type="reset" value="Reset">
					</center>
				</form>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>
</html>