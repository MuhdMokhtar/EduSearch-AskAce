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
	$expertid=2004;
	
	if($pass===$repass){
		
		//insert sql
		$cmdinsert="INSERT INTO post (UserID,PostTitle,PostContent,PostStatus,PostDate,ExpertID) VALUES ('$usrid','$title','$content','$status','$date','$expertid')";
		
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
	else
			$message = "Harap Maaf , kata laluan anda tidak tepat .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
		//echo "ERROR: Password does not match";
	//register
}
?>
<?php
if(isset($_POST['Save']))
{
	//call connection.php
	include ("dbase.php");

	//declare variable
	$usrid=1002;
	$title=$_POST['title'];
	$content=$_POST['content'];
	$status="Saved";
	$date=date('Y/m/d h:i:s', time());
	$expertid=2001;
	
	if($pass===$repass){
		
		//insert sql
		$cmdinsert="INSERT INTO post (UserID,PostTitle,PostContent,PostStatus,PostDate,ExpertID) VALUES ('$usrid','$title','$content','$status','$date','$expertid')";
		
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
	else
			$message = "Harap Maaf , kata laluan anda tidak tepat .";
        	echo "<script type='text/javascript'>alert('$message');</script>";
			?>
			<script>
				window.location="postQuestion.php";
			</script>
			<?php
		//echo "ERROR: Password does not match";
	//register
}
?>