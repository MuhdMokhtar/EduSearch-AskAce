<?php
//call connection
include("dbase.php");

//declare varibale get to store value uid from the url
$post_id=$_GET['uid'];

//sql select
$cmddelete="DELETE FROM post WHERE PostID = $post_id";

$result = $conn->query($cmddelete);
?>
<script>
    //alert("Data has been deleted");
	window.location="profile.php";
</script>