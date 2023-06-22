<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Report</title>
    <style>
        body {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        /* Rest of your CSS styles */
    </style>
</head>
<link rel="stylesheet" href="style.css">
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
    <div id="navBar">
        <ul>
        <li><a href="/ProjectWeb/report.php">Report</a></li>
        <li><a href="/ProjectWeb/user_activity.php">User Activity</a></li>
        </ul>
    </div>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize the input
        $reportID = $_POST['report-id'];
        $newReportStatus = $_POST['report-status'];

        // Update the report status in the database
        require_once "dbase.php"; // Include the dbase.php file

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE report SET ReportStatus = ? WHERE ReportID = ?");
        $stmt->bind_param("si", $newReportStatus, $reportID);

        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "Report status updated successfully.";
        } else {
            echo "Error updating report status: " . $stmt->error;
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <h1>Edit Report</h1>

    <form method="POST" action="">
        <label for="report-id">Report ID:</label>
        <input type="text" id="report-id" name="report-id" placeholder="Enter Report ID" required>

        <label for="report-status">Report Status:</label>
        <input type="text" id="report-status" name="report-status" placeholder="Enter New Report Status" required>

        <button type="submit">Update Report</button>
    </form>

    <a href="report.php">Back to Report</a>
</body>
<footer>Copyright FK</footer>
</html>
