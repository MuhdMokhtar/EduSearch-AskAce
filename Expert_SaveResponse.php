<?php
require_once "dbase.php";

if (isset($_POST['postTitle'], $_POST['content'])) {
    $postTitle = $_POST['postTitle'];
    $responseContent = $_POST['content'];
    $expertID = $_SESSION['ExpertID'];

    if (!empty($responseContent)) {
        // Retrieve the post ID based on the title
        $selectQuery = "SELECT PostID FROM post WHERE PostTitle = ? AND ExpertID = ?";
        $selectStatement = $conn->prepare($selectQuery);
        $selectStatement->bind_param('si', $postTitle, $expertID);
        $selectStatement->execute();
        $selectResult = $selectStatement->get_result();
        
        if ($selectResult->num_rows > 0) {
            $row = $selectResult->fetch_assoc();
            $postID = $row['PostID'];
            
            // Update the response
            $updateQuery = "UPDATE post SET response = ? WHERE PostID = ?";
            $updateStatement = $conn->prepare($updateQuery);
            $updateStatement->bind_param('si', $responseContent, $postID);
            $updateStatement->execute();

            // Redirect back to the main page
            header("Location: Expert_MainPage.php");
            exit();
        } else {
            echo "Invalid post title or post not associated with the current expert.";
        }
    } else {
        echo "Please enter a response.";
    }
}
?>
