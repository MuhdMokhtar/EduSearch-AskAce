<?php

require_once "dbase.php";

if (isset($_POST['postTitle'], $_POST['content'])) {
    $postTitle = $_POST['postTitle'];
    $responseContent = $_POST['content'];
    $expertID = $_SESSION['ExpertID'];

    if (!empty($responseContent)) {
        // Update the response
        $query = "UPDATE post SET response = ? WHERE PostID = ? AND ExpertID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param('sii', $responseContent, $postID, $expertID);

        // Retrieve the post ID based on the title
        $selectQuery = "SELECT PostID FROM post WHERE PostTitle = ?";
        $selectStatement = $conn->prepare($selectQuery);
        $selectStatement->bind_param('s', $postTitle);
        $selectStatement->execute();
        $selectResult = $selectStatement->get_result();
        $row = $selectResult->fetch_assoc();
        $postID = $row['PostID'];

        $statement->execute();

        // Redirect back to the main page
        header("Location: Expert_MainPage.php");
        exit();
    } else {
        echo "Please enter a response.";
    }
}


?>
