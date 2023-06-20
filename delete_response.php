<?php

require_once "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $postID = $_GET['id'];

    // Update the response column to NULL for the specified PostID
    $query = "UPDATE post SET response = NULL WHERE PostID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $postID);
    $statement->execute();

    // Redirect back to the Expert_ResponseHistory.php page after updating
    header("Location: Expert_ResponseHistory.php");
    exit();
} else {
    // Handle error if PostID is not specified
    echo "Error: PostID not specified.";
}

?>
