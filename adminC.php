<?php

require_once("dbase.php");


if (isset($_POST["search"])) {
    $searchTerm = $_POST["search"];
    $query = mysqli_query($conn, "SELECT complaints.ComplaintID, users.UserID, expert.ExpertID, complaints.ComplaintType, complaints.Description, complaints.Status, complaints.Timestamp
FROM complaints
INNER JOIN users ON complaints.UserID = users.UserID
INNER JOIN expert ON complaints.ExpertID = expert.ExpertID
WHERE complaints.ComplaintID LIKE '%$searchTerm%' OR expert.ExpertID LIKE '%$searchTerm%' OR users.UserID LIKE '%$searchTerm%' OR complaints.ComplaintType LIKE '%$searchTerm%' OR complaints.Description LIKE '%$searchTerm%' OR complaints.Status LIKE '%$searchTerm%' OR complaints.Timestamp LIKE '%$searchTerm%'
ORDER BY complaints.ComplaintID");
} else {
    $query = mysqli_query($conn, "SELECT complaints.ComplaintID, users.UserID, expert.ExpertID, complaints.ComplaintType, complaints.Description, complaints.Status, complaints.Timestamp
FROM complaints
INNER JOIN users ON complaints.UserID = users.UserID
INNER JOIN expert ON complaints.ExpertID = expert.ExpertID
ORDER BY complaints.ComplaintID");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FK-EduSearch</title>
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #FFE4B5;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }

        .edit-link {
            color: #4e89e0;
            text-decoration: none;
        }

        .delete-link {
            color: #e04e4e;
            text-decoration: none;
        }

        .edit-link:hover, .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
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
<div class="container">
    <div id="page">
        <br>
		<br>
        <form action="" method="POST">
            <input type="text" name="search" />
            <input type="submit" value="Search" />
            <input type="button" value="Reset" onclick="window.location.href='admin.php'" />
        </form>
	<br>
	<br>
        <table>
            <tr>
                <th>NO</th>
                <th>COMPLAINT ID</th>
                <th>USER ID</th>
                <th>EXPERT ID</th>
                <th>TYPE</th>
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>

            <?php
            $count = 1;
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['ComplaintID'] . "</td>";
                echo "<td>" . $row['UserID'] . "</td>";
                echo "<td>" . $row['ExpertID'] . "</td>";
                echo "<td>" . $row['ComplaintType'] . "</td>";
                echo "<td>" . $row['Timestamp'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "<td><a class='edit-link' href='editC.php?ComplaintID=" . $row['ComplaintID'] . "'>Edit</a> | <a class='delete-link' href='javascript:void(0);' onclick='deleteComplaint(" . $row['ComplaintID'] . ")'>Delete</a></td>";
                echo "</tr>";
                $count++;
            }
            ?>

        </table>
    </div>
    <br>
</div>

<script>
    function deleteComplaint(id) {
        if (confirm("Are you sure you want to delete this complaint?")) {
            window.location.href = "deleteC.php?id=" + id;
        }
    }
</script>
<br>
<br>
<a href="adminReport.php">
    <button type="button" class="button"> Generate Report </button> <br><br>
</a>
</body>
</html>
