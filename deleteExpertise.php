<?php
require_once "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ExpertiseID'])) {
    $expertiseID = $_GET['ExpertiseID'];

    $deleteQuery = "DELETE FROM expertise WHERE ExpertiseID = ?";
    $deleteStatement = $conn->prepare($deleteQuery);
    $deleteStatement->bind_param('i', $expertiseID);

    if ($deleteStatement->execute()) {
        // Deletion successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Deletion failed
        echo "Failed to delete expertise: " . $conn->error;
    }

    $deleteStatement->close();
}
?>
