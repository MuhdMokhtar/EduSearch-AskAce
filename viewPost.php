<?php 
//call connection
include("dbase.php");

//sql command SELECT
$cmdselect="SELECT * FROM post WHERE UserID=".$_SESSION['UserID']."";
$cmdcount="SELECT COUNT(PostID) as 'total' FROM post where UserID=".$_SESSION['UserID']."";
//execute command
$result = $conn->query($cmdselect);
$result2 = $conn->query($cmdcount);
?>
<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <body></body>
         <div class="activePost">
            <h3>Post By You</h3>
            <ul>
            <?php 
            //is there any row return by variable $result? if value > 0 --> YES
            if($result->num_rows >0){
                $row2=$result2->fetch_assoc();
                echo "<h4>Total Post by you: ".$row2['total']."</h4>";
            //output data each row:$row will be used to display the value
            while($row=$result->fetch_assoc()){ 
                $href="displayPost.php?uid=".$row['PostID'];
                $alert='Are you sure you want to Delete?';
                $msg = "return confirm(\"".$alert."\")";
                $del="delete.php?uid=".$row['PostID'];
            ?> 
                <?php echo "<li><a href='".$href."' target='_parent'>" .$row['PostTitle']."</a></li><br>";//call column name using row ?>
                <?php echo "<ul><li>Posted on: " .$row['PostDate']."</li></ul><br>";//call column name using row ?>
                <?php echo "<ul><li><a onclick='return confirm()' href='".$del."'>Delete</a></li></ul><br>" ?>
            <?php 
            }//close while
            }//close if-->num_rows 
            ?>
            </ul>
        </div>
        </div>
    </body>
</html>