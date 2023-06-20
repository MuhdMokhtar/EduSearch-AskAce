<?php


require_once "dbase.php";

// Check if a user is logged in
if (isset($_SESSION['UserID'])) {
    $loggedInUser = $_SESSION['UserID'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Fetch expert data from the database
$query = "SELECT ExpertName, ExpertEmail, ContactInfo FROM expert";
$result = $conn->query($query);
$experts = [];
while ($row = $result->fetch_assoc()) {
    $experts[] = $row;
}
?>


