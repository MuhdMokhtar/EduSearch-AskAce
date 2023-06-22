<?php

include("dbase.php");

$ComplaintID = isset($_GET['ComplaintID']) ? $_GET['ComplaintID'] : '';

if ($ComplaintID) {
    $query = mysqli_query($conn, "SELECT complaints.ComplaintID, expert.ExpertID, complaints.ComplaintType, complaints.Description, complaints.Status, complaints.Timestamp FROM complaints INNER JOIN expert ON complaints.ExpertID = expert.ExpertID WHERE complaints.ComplaintID = $ComplaintID");
    $row = mysqli_fetch_array($query);
} else {
    $row = array('ComplaintID' => '', 'ExpertID' => '', 'ComplaintType' => '', 'Description' => '', 'Status' => '', 'Timestamp' => '');
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="stylecss.css">
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
        <body>
        </body>
    <footer>Copyright FK</footer>
<body>
    

    <div>
        <h2>UPDATE COMPLAINT</h2>
    </div>

    <div class="container">
        <div id="page">
            <br>

            <form method="POST" action="updateC.php?ComplaintID=<?php echo $ComplaintID; ?>">
                <p>COMPLAINT ID</p>
                <input type="text" class="input-field" value="<?php echo $row['ComplaintID']; ?>" name="ComplaintID" readonly><br><br>
                <p>COMPLAINT STATUS</p>
                <select id="C_Status" class="input-field" name="C_Status">
                    <option value="On Hold" <?php if ($row['Status'] == 'ON Hold') echo 'selected'; ?>>On Hold</option>
                    <option value="In Investigation" <?php if ($row['Status'] == 'In Investigation') echo 'selected'; ?>>In Investigation</option>
                    <option value="Resolved" <?php if ($row['Status'] == 'Resolved') echo 'selected'; ?>>Resolved</option>
                </select><br><br>

                <input type="submit" name="Update" value="Update" class="button">
                <a href="http://localhost/Ask_Ace/Admin.php">
                    <button type="button" class="button">Back</button>
                </a>
            </form>
        </div><br>
    </div>

    
</body>
</html>
