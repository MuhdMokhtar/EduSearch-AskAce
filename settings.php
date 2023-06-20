<?php 
//call connection
include("dbase.php");

//sql command SELECT
$cmdselect="SELECT * FROM users WHERE UserID='1004'";

//execute command
$result = $conn->query($cmdselect);

?>
<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <body>
    <?php 
		$row=$result->fetch_assoc()?>
        <h1>Settings</h1>
    <a onclick="return confirm('Adakah anda pasti untuk padam?')" href="deleteaccount.php?uid=<?php echo $row['UserID'];?>">Delete Account</a>
    </body>
</html>