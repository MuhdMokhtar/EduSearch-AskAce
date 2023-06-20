<?php
//call connection
include("dbase.php");

//declare varibale get to store value uid from the url
$usr_id=$_GET['uid'];

//sql select
$cmddelete="DELETE FROM user WHERE UserID = $usr_id";

$result = $conn->query($cmddelete);
?>
<script>
    //alert("Data has been deleted");
	window.location="main.php";
</script>