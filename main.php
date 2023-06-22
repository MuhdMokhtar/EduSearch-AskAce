<?php 
//call connection
include("dbase.php");

//sql command SELECT
$cmdselect="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID WHERE post.PostStatus='Accepted' OR post.PostStatus='Closed' ORDER BY PostDate DESC LIMIT 3";
$cmdselectlast="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID WHERE post.PostStatus='Accepted' OR post.PostStatus='Closed' ORDER BY PostDate DESC";

//execute command
$result = $conn->query($cmdselect);
$result2 = $conn->query($cmdselectlast);

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
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </div>
        <br>
        <button id="btn1" onclick="location.href='postQuestion.php'">Post A Question</button>
        <button id="btn1" onclick="location.href='viewAllPost.php'">View All Post</button>
        <br><br><br>
         <div class="activePost">
            <h3>Active Post</h3>
            <ul>
            <?php 
            //is there any row return by variable $result? if value > 0 --> YES
            if($result->num_rows >0){
            //output data each row:$row will be used to display the value
            while($row=$result->fetch_assoc()){ 
                $href="displayPost.php?uid=".$row['PostID'];
            ?>
                <?php echo "<li><a href='".$href."'>" .$row['PostTitle']."</a></li><br>";//call column name using row ?>
                <?php echo "<ul><li>Posted by: " .$row['Username']."</li></ul><br>";//call column name using row ?>
            <?php 
            }//close while
            }//close if-->num_rows 
            ?>
            </ul>
        </div>

        
        <?php $row2=$result2->fetch_assoc() ?>
        <h3 class="lPost">Last Post</h3>
         <div class="lastPost">
            <?php $href="displayPost.php?uid=".$row2['PostID']; ?>
            <h1><?php echo "<a href='".$href."'>" .$row2['PostTitle']."</a><br>";//call column name using row ?></h1>
            <!--<h1><?php echo $row2['PostTitle'];?></h1><hr>-->
            <b>Posted by: <?php echo $row2['Username'];?></b><br><br>
            <div class="content">
                <?php echo $row2['PostContent'];?>
            </div>
            
            <br><br><br><hr>
        </div>
    </body>
    <footer>Copyright FK</footer>
</html>