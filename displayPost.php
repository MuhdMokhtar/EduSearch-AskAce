<?php
//call connection
include("dbase.php");

//declare varibale get to store value uid from the url
$post_id=$_GET['uid'];

//sql select
$cmdselect="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID WHERE PostID = $post_id";

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
        <?php $row=$result->fetch_assoc() ?>
         <div class="lastPost">
            <h1><?php echo $row['PostTitle'];?></h1><hr>
            <b>Posted by: <?php echo $row['Username'];?></b><br><br>
            <div class="content">
                <?php echo $row['PostContent'];?>
            </div>
            
            <br><br><br><br><br><hr>
            
        </div>
        <button id="btn1" onclick="location.href='postQuestion.php'">Post Answer</button>
        </body>
    <footer>Copyright FK</footer>
</html>