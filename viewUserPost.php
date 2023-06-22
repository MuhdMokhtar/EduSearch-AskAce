<?php 
//call connection
include("dbase.php");

//declare varibale get to store value uid from the url
$user_id=$_GET['uid'];

//sql command SELECT
$cmdselect="SELECT * FROM post WHERE UserID='$user_id' AND PostStatus='Accepted'";
$cmdcount="SELECT COUNT(PostID) as 'total' FROM post WHERE UserID='$user_id' AND PostStatus='Accepted'";
$cmdselect2="SELECT post.*, users.Username FROM post INNER JOIN users ON post.UserID=users.UserID WHERE post.UserID='$user_id' AND post.PostStatus='Accepted'";

//execute command
$result = $conn->query($cmdselect);
$result2 = $conn->query($cmdcount);
$result3 = $conn->query($cmdselect2);
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
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </div>
         <div class="activePost">
            <?php $row3=$result3->fetch_assoc();?>
            <?php echo "<h1>Posted by: " .$row3['Username']."</h1>"; ?>
            <ul>
            <?php 
            //is there any row return by variable $result? if value > 0 --> YES
            if($result->num_rows >0){
                $row2=$result2->fetch_assoc();
                echo "<h4>Total Post by this user: ".$row2['total']."</h4>";
            //output data each row:$row will be used to display the value
            while($row=$result->fetch_assoc()){ 
                $href="displayPost.php?uid=".$row['PostID'];
                $alert='Are you sure you want to Delete?';
                $msg = "return confirm(\"".$alert."\")";
                $del="delete.php?uid=".$row['PostID'];
            ?> 
                <?php echo "<li><a href='".$href."' target='_parent'>" .$row['PostTitle']."</a></li><br>";//call column name using row ?>
                <?php echo "<ul><li>Posted on: " .$row['PostDate']."</li></ul><br>";//call column name using row ?>
            <?php 
            }//close while
            }//close if-->num_rows 
            ?>
            </ul>
        </div>
        </div>
    </body>
    <footer>Copyright FK</footer>
</html>