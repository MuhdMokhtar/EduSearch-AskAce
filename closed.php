<?php

	//call connection.php
	include ("dbase.php");

    $usrid=$_SESSION['UserID'];
//declare varibale get to store value uid from the url
    $post_id=$_GET['uid'];
//sql select
$cmdselect="SELECT * FROM post WHERE PostID='$post_id'";

$result = $conn->query($cmdselect);
$row=$result->fetch_assoc() ;
	

	//Update sql
	$cmdupdate="UPDATE post SET PostStatus='Closed' WHERE PostID='$post_id'";

    if($usrid==$row['UserID']){
	if ($conn->query($cmdupdate)=== TRUE)
	{
		?>
        <script>
            alert("Updated");
            window.location="main.php";
        </script>
        <?php
	}
	else
    {
        ?>
        <script>
            alert("ERROR: Did not Update");
            window.location="main.php";
        </script>
        
    <?php
    
}}
?>