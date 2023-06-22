<?php
// Establish a database connection
require_once "dbase.php";

// Get the report ID from the query parameter
$reportId = $_GET['ReportID'];

// Retrieve the report from the database
$sql = "SELECT * FROM report WHERE id = $reportId";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Report</title>
</head>
<body>
    <h1><?php echo $row['title']; ?></h1>
    <p><?php echo $row['content']; ?></p>
</body>
</html>

-- 

<?php

require_once "dbase.php";
// Retrieve the report details based on the report ID from the URL parameter
$reportId = $_GET['id'];

// Prepare a SELECT query with a placeholder for the report ID
$sql = "SELECT * FROM report WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reportId);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if a report with the given ID exists
if ($result->num_rows > 0) {
  $report = $result->fetch_assoc();

  // Display the report details
  echo "<h1>Report Details</h1>";
  echo "<p><strong>Report ID:</strong> " . $report['id'] . "</p>";
  echo "<p><strong>Report Type:</strong> " . $report['type'] . "</p>";
  echo "<p><strong>Report Status:</strong> " . $report['status'] . "</p>";
  // Display other report fields as needed
} else {
  echo "Report not found.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
