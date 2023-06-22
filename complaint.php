<?php

require_once("dbase.php");

$UserID = $_SESSION['UserID'];

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
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href=""> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
        </ul>
    </div>
    <body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #FFE4B5;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    </body>
    <footer>
        <p>Copyright FK</p>
    </footer>

<body>
    <div>
        <h2>COMPLAINT</h2>
    </div>

    <div class="container">
        <div id="page">
            <br>
            <a href="newcomplaint.php">
                <button type="button" class="button"> NEW COMPLAINT </button> <br><br>
            </a>
			
			<p> LIST OF PREVIOUS COMPLAINT</p><br>
            <?php
            $retrieve = mysqli_query($conn, "SELECT complaints.ComplaintID, users.UserID, expert.ExpertID, complaints.ComplaintType, complaints.Description, complaints.Status, complaints.Timestamp
                FROM complaints
                INNER JOIN users ON complaints.UserID = users.UserID
                INNER JOIN expert ON complaints.ExpertID = expert.ExpertID
                ORDER BY ComplaintID");

            if (mysqli_num_rows($retrieve) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>No</th>";
                echo "<th>Complaint ID</th>";
                echo "<th>User ID</th>";
                echo "<th>Expert ID</th>";
                echo "<th>Complaint Type</th>";
                echo "<th>Description</th>";
                echo "<th>Status</th>";
                echo "<th>Timestamp</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $counter = 1; // Initialize counter
                while ($row = mysqli_fetch_assoc($retrieve)) {
                    echo "<tr>";
                    echo "<td>" . $counter . "</td>"; // Display the counter value
                    echo "<td>" . $row['ComplaintID'] . "</td>";
                    echo "<td>" . $row['UserID'] . "</td>";
                    echo "<td>" . $row['ExpertID'] . "</td>";
                    echo "<td>" . $row['ComplaintType'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "<td>" . $row['Status'] . "</td>";
                    echo "<td>" . $row['Timestamp'] . "</td>";
                    echo "</tr>";
                    $counter++; // Increment the counter
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>No complaints found.</p>";
            }
            ?>
        </div>
        <br>
    </div>
</body>
</html>
