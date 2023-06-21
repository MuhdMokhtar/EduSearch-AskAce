<?php
require_once "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['publicationID'])) {
    $publicationID = $_GET['publicationID'];

    $deleteQuery = "DELETE FROM publication WHERE PublicationID = ?";
    $deleteStatement = $conn->prepare($deleteQuery);
    $deleteStatement->bind_param('i', $publicationID);

    if ($deleteStatement->execute()) {
        // Deletion successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Deletion failed
        echo "Failed to delete publication: " . $conn->error;
    }

    $deleteStatement->close();
}
?>
