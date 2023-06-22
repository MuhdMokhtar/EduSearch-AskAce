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
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</div>

<body>
<br><br>
<div class="card-header"><h3 class="text-center font-weight-light my-4"><center>Add Expert</center></h3></div>
<div class="card-body">
<br><br><br>
<body>

		<!-- insert users -->
				<form action="addExpertForm.php" method="POST">
				<input type="hidden" name="action" value="insert">
					<center>
						<table>
							<tr>
								<th>Expert ID</th>
								<td><input type="text" id="ExpertID" name="ExpertID" placeholder="expertID"></td>
							</tr>
							
							<tr>
								<th>Expert Name</th>
								<td><input type="text" id="ExpertName" name="ExpertName" placeholder="expertName"></td>
							</tr>
							
							<tr>
								<th>Expert Email</th>
								<td><input type="text" id="ExpertEmail" name="ExpertEmail" placeholder="expertEmail"></td>
							</tr>
							
							<tr>
								<th>Expert Password</th>
								<td><input type="text" id="ExpertPassword" name="ExpertPassword" placeholder="expertPassword"></td>
							</tr>
							
			
						</table><br>
						
						<input type="submit" value="Submit" name="Confirm" onclick="addexpert()">
						<input type="reset" value="Reset">
					</center>
				</form>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    Copyright FK
</footer>
</html>