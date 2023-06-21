<?php 
//call connection
include("dbase.php");

//sql command SELECT
$cmdselect="SELECT DATE_FORMAT(PostDate, '%Y') as 'year', DATE_FORMAT(PostDate, '%M') as 'month', COUNT(PostID) as 'total' FROM post where UserID =".$_SESSION['UserID']." GROUP BY DATE_FORMAT(PostDate, '%Y%m')";

//execute command
$result = $conn->query($cmdselect);
?>
<html>
    <head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <body>
    <h1>User posts by Month</h1><br>

<table id="customers" border="1" width="80%">
  <tr>
    <th>Year</th>
    <th>Month</th>
    <th>Number of Post</th>
  </tr>
  
  <?php 
   //is there any row return by variable $result? if value > 0 --> YES
   if($result->num_rows >0){
     //output data each row:$row will be used to display the value
     while($row=$result->fetch_assoc()){
   
   
  ?>
  <tr>  
    <td><?php echo $row['year'];//call column name using row ?></td>
    <td><?php echo $row['month'];?></td>
    <td><?php echo $row['total'];?></td>
  
  <?php
     }//close while
    }//close if-->num_rows
  ?>
</table>
    </body>
</html>
