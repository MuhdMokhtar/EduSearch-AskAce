<?php

include("dbase.php");

$ComplaintID = isset($_GET['ComplaintID']) ? $_GET['ComplaintID'] : '';

if ($ComplaintID) {
    $query = mysqli_query($conn, "SELECT complaints.ComplaintID, expert.ExpertID, complaints.ComplaintType, complaints.Description, complaints.Status, complaints.Timestamp FROM complaints INNER JOIN expert ON complaints.ExpertID = expert.ExpertID WHERE complaints.ComplaintID = '$ComplaintID'");
    $row = mysqli_fetch_array($query);
} else {
    // Redirect to the admin page if no ComplaintID is specified
    header("Location: adminC.php");
    exit();
}

if (isset($_POST['Update'])) {
    $Status = $_POST['C_Status'];

    // Update the record in the database
    $updateQuery = "UPDATE complaints SET Status = '$Status' WHERE ComplaintID = '$ComplaintID'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('The record has been updated!');</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Redirect to the admin page
header("refresh: 0.3; url=adminC.php");
?>
