<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Report</title>
    <style>
        /* Your CSS styles */
        body {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .confirm-message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .confirm-message p {
            margin: 0 0 10px;
        }

        .confirm-message .btn-container {
            text-align: center;
        }

        .confirm-message .btn-container button {
            margin: 0 5px;
        }

        /* Header styles */
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        /* Navigation styles */
        #navBar {
            background-color: #666;
            padding: 10px;
            text-align: center;
        }

        #navBar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #navBar ul li {
            display: inline-block;
        }

        #navBar ul li a {
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    // Check if the report ID is provided via GET request
    if (isset($_GET['report-id'])) {
        // Get the report ID
        $reportID = $_GET['report-id'];

        // Perform the deletion
        require_once "dbase.php"; // Include the dbase.php file

        // Prepare the SQL statement
        $stmt = $conn->prepare("DELETE FROM report WHERE ReportID = ?");
        $stmt->bind_param("i", $reportID);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Deletion successful
            // Redirect back to report.php after deletion
            header("Location: report.php?deleted-report-id=" . $reportID);
            exit();
        } else {
            // Error occurred during deletion
            echo "Error deleting report: " . $stmt->error;
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <h1>FK-EduSearch</h1>
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

    <div class="confirm-message">
        <p>Are you sure you want to delete this report?</p>
        <div class="btn-container">
            <button id="confirm-delete">Delete</button>
            <button id="cancel-delete" onclick="window.location.href='report.php'">Cancel</button>
        </div>
    </div>

    <script>
        // Get the confirm and cancel buttons
        const confirmButton = document.getElementById('confirm-delete');
        const cancelButton = document.getElementById('cancel-delete');

        // Add event listener to confirm button
        confirmButton.addEventListener('click', function () {
            // Perform the delete action by redirecting to deleteReport.php with report ID
            const reportID = '<?php echo isset($_GET['report-id']) ? $_GET['report-id'] : ''; ?>';
            window.location.href = 'deleteReport.php?report-id=' + reportID;
        });
    </script>

    <footer>
        &copy; 2023 FK-EduSearch. All rights reserved.
    </footer>
</body>
</html>
