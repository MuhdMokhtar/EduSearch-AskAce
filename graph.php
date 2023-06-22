<?php
// PHP code to retrieve data from the database
require_once "dbase.php"; // Include the dbase.php file

// Fetch data from the useractivity table
$sql = "SELECT * FROM useractivity";
$result = $conn->query($sql);

// Initialize arrays to store data for circular graphs
$activityIDs = [];
$numOfPosts = [];
$likesActivities = [];

// Fetch data for circular graphs
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $activityIDs[] = $row['ActivityID'];
        $numOfPosts[] = $row['NumOfPost'];
        $likesActivities[] = $row['LikesActivity'];
    }
}

$conn->close();
?>