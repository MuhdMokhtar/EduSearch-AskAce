<?php
require_once "dbase.php";
if (isset($_POST['delete'])) {
    $cvID = $_POST['id'];

    // Retrieve the filename before deletion
    $query = "SELECT filename FROM expertCV WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $cvID);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $filename = $row['filename'];

    // Delete the record from the expertCV table
    $deleteQuery = "DELETE FROM expertCV WHERE id  = ?";
    $deleteStatement = $conn->prepare($deleteQuery);
    $deleteStatement->bind_param("i", $cvID);
    $deleteStatement->execute();

    // Delete the file from the server
    if (unlink("pdf/" . $filename)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting the file.";
    } 
    header("Location: Expert_ViewProfile.php");
}
?>
