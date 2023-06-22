<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
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
            <li><a href="report.php"> HOME </a></li>
            <li><a href="complaint.php"> COMPLAINT </a></li>
            <li><a href="report.php"> REPORT </a></li>
            <li><a href="profile.php"> PROFILE </a></li>
            <li><a href="logout.php"> LOGOUT </a></li>
        </ul>
    </div>
    <div id="navBar">
        <ul>
        <li><a href="report.php">Report</a></li>
        <li><a href="user_activity.php">User Activity</a></li>
        </ul>
    </div>

    <main>
        
        <section>
            <h2>Search Report</h2>
            <form method="GET" action="">
               
                <label for="search-type">Report Type:</label>
                <select id="search-type" name="search-type">
                    <option value="">All</option>
                    <option value="Improvement">Improvement</option>
                    <option value="Issues">Issues</option>
                    <option value="Problem">Problem</option>
                </select>

                <button id="search-report" type="submit">Search</button>
            </form>
            
            <h1>Report List</h1>

            <table id="report-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Report ID</th>
                        <th>Admin ID</th>
                        <th>Report Type</th>
                        <th>NumOfReport</th>
                        <th>Report Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to retrieve data from the database and populate the table
                    require_once "dbase.php"; // Include the dbase.php file

                    // Check if the report ID is provided via GET request (deleted report ID)
                    if (isset($_GET['deleted-report-id'])) {
                        $deletedReportID = $_GET['deleted-report-id'];
                    }

                    // Build the SQL query based on the search criteria
                    $sql = "SELECT * FROM report";
                    if (isset($_GET['search-type']) && !empty($_GET['search-type'])) {
                        $searchType = $_GET['search-type'];
                        $sql .= " WHERE ReportType LIKE '%$searchType%'";
                    }

                    // Execute the SQL query
                    $result = $conn->query($sql);

                    // Check if any records found
                    if ($result->num_rows > 0) {
                        $count = 1;

                        // Loop through each record and display the data
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $row['ReportID'] . "</td>";
                            echo "<td>" . $row['AdminID'] . "</td>";
                            echo "<td>" . $row['ReportType'] . "</td>";
                            echo "<td>" . $row['NumOfReport'] . "</td>";
                            echo "<td>" . $row['ReportStatus'] . "</td>";
                            echo "<td>
                                    <a href='viewReport.php'>View</a>
                                    <a href='editReport.php'>Edit</a>
                                    <a href='deleteReport.php?report-id=" . $row['ReportID'] . "'>Delete</a>
                                </td>";
                            echo "</tr>";
                            $count++;

                            // Check if the current row's report ID matches the deleted report ID
                            if (isset($deletedReportID) && $row['ReportID'] == $deletedReportID) {
                                echo "<p>Report with ID " . $deletedReportID . " has been deleted.</p>";
                                unset($deletedReportID); // Remove the deleted report ID from the variable
                            }
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>

        <section>
            <button id="print-report" type="button">Print Report</button>
        </section>

    </main>

    <script src="script.js"></script>

</body>
<footer>Copyright FK</footer>
</html>
