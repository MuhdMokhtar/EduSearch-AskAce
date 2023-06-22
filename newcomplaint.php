<?php

require_once("dbase.php");

$UserID = $_SESSION['UserID'];

$select = "SELECT * FROM `complaints`";
$retrieve = mysqli_query($conn, "SELECT * FROM complaints");

$message = '';
if (isset($_POST['submit'])) {
    $UserID = $_POST['UserID'];
    $ExpertID = $_POST['ExpertID'];
    $ComplaintType = $_POST['ComplaintType'];
    $Description = $_POST['Description'];
	$Status = "In Progress"; // Set the status to "In Progress"

    // Retrieve expert details
    $expertQuery = "SELECT * FROM expert WHERE ExpertID = '$ExpertID'";
    $expertResult = mysqli_query($conn, $expertQuery);
    $expertRow = mysqli_fetch_assoc($expertResult);

    // insert data to database
    $insert = "INSERT INTO complaints ( ExpertID, UserID, ComplaintType, Description, Status) VALUES ( '$ExpertID', '$UserID', '$ComplaintType', '$Description', '$Status')";
    if (mysqli_query($conn, $insert)) {
        $message = "Your Complaint has been received and recorded.";
    } else {
        $message = "ERROR: Could not execute $insert. " . mysqli_error($conn);
    }

    // close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<body>
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
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href=""> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </div>
        <body>
        </body>
    <footer>Copyright FK</footer>

    <div>
        <h2>FILE A COMPLAINT</h2>
        
    </div>

    <div class="container">
        <div id="page">
            <form action="insertC.php" method="post">
                <p>Complaint Type</p>
                <select name="ComplaintType" id="ComplaintType">
                    <option value="Unsatisfied Expert’s Feedback">Unsatisfied Expert’s Feedback</option>
                    <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                </select>

                <p>Expert ID</p>
                <select name="ExpertID" id="ExpertID">
                    <?php
                    $expertQuery = "SELECT ExpertID FROM expert";
                    $expertResult = mysqli_query($conn, $expertQuery);
                    while ($expertRow = mysqli_fetch_assoc($expertResult)) {
                        echo "<option value='" . $expertRow['ExpertID'] . "'>" . $expertRow['ExpertID'] . "</option>";
                    }
                    ?>
                </select>
                <p>User ID</p>
                <select name="UserID" id="UserID">
                    <?php
                    $userQuery = "SELECT UserID FROM users";
                    $userResult = mysqli_query($conn, $userQuery);
                    while ($userRow = mysqli_fetch_assoc($userResult)) {
                        echo "<option value='" . $userRow['UserID'] . "'>" . $userRow['UserID'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <p>Complaint Description</p>
                <textarea type="text" class="input-field textarea-field" placeholder="Enter complaint description" name="Description"></textarea><br><br>
                <input type="submit" class="button" name="submit" value="Submit">
                <a href="http://localhost/Ask_Ace/complaint.php">
                    <button type="button" class="button">Back</button>
                </a>
            </form>
        </div><br>
    </div>

</body>
</html>
