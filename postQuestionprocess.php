<?php
if(isset($_POST['Send']))
{
	//call connection.php
	include ("dbase.php");

	//declare variable
	$usrid=1002;
	$title=$_POST['title'];
	$content=$_POST['content'];
	$status="Pending";
	$date=date('Y/m/d h:i:s', time());
	$expert='2004';
	
	
		//insert sql
		$cmdinsert="INSERT INTO post (UserID,PostTitle,PostContent,PostStatus,PostDate,ExpertID) VALUES ('".$_SESSION['UserID']."','$title','$content','$status','$date','$expert')";
		
		if ($conn->query($cmdinsert)=== TRUE)
		{
			$message = "Question Posted. ";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="main.php";
			</script>
			<?php
		}
		else if(mysqli_errno($conn)==1062){
			$message = "Harap Maaf , nama pengguna sudah wujud .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
		}
		else
			$message = "Harap Maaf , data anda tidak dapat disimpan .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
			//echo "ERROR: Data cannot be inserted";
			//register
}
?>
<?php
if(isset($_POST['Save']))
{
	//call connection.php
	include ("dbase.php");

	//declare variable
	$usrid=$_SESSION['UserID'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$status="Saved";
	$date=date('Y/m/d h:i:s', time());
	
	
		//insert sql
		$cmdinsert="INSERT INTO post (UserID,PostTitle,PostContent,PostStatus,PostDate) VALUES ('$usrid','$title','$content','$status','$date')";
		
		if ($conn->query($cmdinsert)=== TRUE)
		{
			$message = "Question Saved. ";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="main.php";
			</script>
			<?php
		}
		else if(mysqli_errno($conn)==1062){
			$message = "Harap Maaf , nama pengguna sudah wujud .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
		}
		else
			$message = "Harap Maaf , data anda tidak dapat disimpan .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
			//echo "ERROR: Data cannot be inserted";
			//register
	}

?>