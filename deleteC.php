<?php

include("dbase.php");

if (isset($_GET['id'])) {
    $ComplaintID = $_GET['id'];

    // Delete the record from the database
    $query = "DELETE FROM `complaints` WHERE ComplaintID = '$ComplaintID'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('The record has been deleted!');</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Redirect to the admin page
header("refresh: 0.3; url=adminC.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Complaint</title>
</head>
<body></body>
</html>
