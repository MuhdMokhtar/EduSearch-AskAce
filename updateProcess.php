<?php
if(isset($_POST['Send']))
{
	//call connection.php
	include ("dbase.php");

	//declare variable
	$uname=$_POST['username'];
	$email=$_POST['email'];
    $pswd=$_POST['pswd'];
	$number=$_POST['number'];
    //added
    $userid=$_POST['userid'];
	//Update sql
	$cmdupdate="UPDATE users SET Username='$uname', Email='$email', Password='$pswd', Phone='$number' WHERE UserID='$userid'";

	if ($conn->query($cmdupdate)=== TRUE)
	{
		?>
        <script>
            alert("Updated");
            window.location="updateProfile.php";
        </script>
        <?php
	}
	else
    {
        ?>
        <script>
            alert("ERROR: Did not Update");
            window.location="updateProfile.php?uid=";
        </script>
        
    <?php
    }
}
?>