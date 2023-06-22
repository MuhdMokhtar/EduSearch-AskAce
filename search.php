<?php
//call connection
include("dbase.php");

$search = $_POST['search'];

$sql = "Select post.*, users.Username from post INNER JOIN users ON post.UserID=users.UserID WHERE PostTitle like '%$search%'";

$result = $conn->query($sql);
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
        <center>
        <form action="search.php" method="post">
            Search Keyword: <input type="text" name="search">
            <input type ="submit" value="Search">
        </form>
        </center>
        <br><br><br>
         <div class="activePost">
            <h3>All Post</h3>
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
    </body>
    <footer>Copyright FK</footer>
</html>