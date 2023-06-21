<?php
//call connection
include("dbase.php");

//sql select
$cmdselect="SELECT * FROM users WHERE UserID=".$_SESSION['UserID']."";

$result = $conn->query($cmdselect);
?>
<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <body>
    <form name="myform" method="post" action="updateProcess.php">
			<h1>Update Profile</h1>
            <?php
					//is there any row return by variable $result? if value >0 --> YES
					if ($result->num_rows>0){
						//output data of each row : $row will be used to display the value
						while($row = $result->fetch_assoc()){
					?>
			
            <input type="hidden" name="userid" value="<?php echo $row['UserID'];?>"/> 
			
			<h4>User Name:</h4>
			
			<input type="text" name="username" value="<?php echo $row['Username'];?>" required/> 
			<br>
			

			<h4>Email:</h4>
			
			<input type="email" name="email" value="<?php echo $row['Email'];?>" required/> 
			<br>
			
            <h4>Password:</h4>
			
			<input type="password" name="pswd" value="<?php echo $row['Password'];?>" required/> 
			<br>
			
			<h4>Telephone Number:</h4>
			
			<input type="text" name="number" value="<?php echo $row['Phone'];?>" required/> 
			<br>
			<br>

			<h4>Research Topic:</h4>

			<input type="text" name="research" value="<?php echo $row['Research'];?>" required/> 
			<br>
			

			<h4>Academic Status:</h4>
			
			
            <select name="acaStatus" required>
					<option value="<?php echo $row['AcademicStatus'];?>"><?php echo $row['AcademicStatus'];?></option>
					<option value="Lecturer: Active">Lecturer: Active</option>
					<option value="Lecturer: Inactive">Lecturer: Inactive</option>
					<option value="Student: Active">Student: Active</option>
                    <option value="Student: Inactive">Student: Inactive</option>
            </select>
			<br>
            <br>
			
			<input type="submit" name="Send" value="Update"/> 
				
			<?php
				//close while
				}
			//close if
			 }
			?>
		</form>
    </body>
</html>