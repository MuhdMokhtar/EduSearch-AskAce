<?php
//call connection
include("dbase.php");

//declare varibale get to store value uid from the url
$post_id=$_GET['uid'];

//sql select
$cmdselect="SELECT post.*, users.Username, expert.ExpertName FROM post INNER JOIN users ON post.UserID=users.UserID INNER JOIN expert ON post.ExpertID=expert.ExpertID WHERE PostID = $post_id";

$result = $conn->query($cmdselect);
?>
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
        <?php $row=$result->fetch_assoc() ;
        $href="viewUserPost.php?uid=".$row['UserID']; ?>
         <div class="lastPost">
            <h1><?php echo $row['PostTitle'];?></h1><hr>
            <?php echo "<li><a href='".$href."' target='_parent'>" .$row['Username']."</a></li><br>";//call column name using row ?>
            <b>Posted by: <?php echo $row['Username'];?></b>
            <br>Status: <?php echo $row['PostStatus'];?><br><br>
            <div class="content">
                <?php echo $row['PostContent'];?>
            </div>
            
            <br><br><br><br><br><hr>
            
        </div>
        <?php
            if($row['Response']==null) {
        ?>
        <button id="btn1" onclick="location.href='postQuestion.php'">Post Answer</button>
        <?php 
            }else{
        ?>
        <div class="lastPost">
        <b>Answered by: <?php echo $row['ExpertName'];?></b>
        <br><?php echo $row['Response'];?><br><br>
        </div>
        <?php
            }
        ?>
        </body>
    <footer>Copyright FK</footer>
</html>