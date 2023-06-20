<?php

require_once "dbase.php";

if (isset($_POST['postTitle'], $_POST['content'])) {
    $postTitle = $_POST['postTitle'];
    $responseContent = $_POST['content'];
    $expertID = 2004;

    if (!empty($responseContent)) {
        // Update the response
        $query = "UPDATE post SET response = ? WHERE postTitle = ? AND ExpertID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param('sis', $responseContent, $postTitle, $expertID);
        $statement->execute();

        // Redirect back to the main page
        header("Location: Expert_MainPage.php");
        exit();
    } else {
        echo "Please enter a response.";
    }
}

?>
