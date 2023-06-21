<?php
require_once "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['researchID'])) {
    $researchID = $_GET['researchID'];

    $deleteQuery = "DELETE FROM research WHERE researchID = ?";
    $deleteStatement = $conn->prepare($deleteQuery);
    $deleteStatement->bind_param('i', $researchID);

    if ($deleteStatement->execute()) {
        // Deletion successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Deletion failed
        echo "Failed to delete research: " . $conn->error;
    }

    $deleteStatement->close();
}
?>
