<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="Style.css">
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
        </div>

        <center>
			<br>
			<table border="1" width="60%" height="500px">
			<tr bgcolor="lightblue">
					<th colspan="2" align="center">MY PERSONAL PROFILE</th>
				</tr>
				<tr>
					<td align="center" width="20%"><a href="updateProfile.php" target="iframe1">Update Profile</a></td>
					<td rowspan="4">
						
						<iframe name="iframe1" src="" height="500" width="100%"></iframe>
						
					</td>
				</tr>
				<tr>
					<td align="center" width="20%"><a href="viewPost.php" target="iframe1">View Post</a></td>
				</tr>
				<tr>
					<td align="center" width="20%"><a href="about:blank" target="iframe1">View Comments</a></td>
				</tr>
				<tr>
					<td align="center" width="20%"><a href="settings.php" target="iframe1">Settings</a></td>
				</tr>
				<tr>
					<td colspan="2" valign="center" align="center" bgcolor="lightblue"></td>
				</tr>
			</table>
			
		</center>

    </body>
    <footer>Copyright FK</footer>
</html>