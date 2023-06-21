<?php
session_start();



// Function to authenticate the expert
function authenticateExpert() {
    // Check if the expert is logged in
    if (isset($_SESSION['UserID'])) {
        $expertID = $_SESSION['UserID'];

        // Retrieve expert details from the database based on the expertID
        require_once "db-config.php";
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        // Prepare the query
        $query = "SELECT * FROM experts WHERE UserID = ?";
        $statement = $mysqli->prepare($query);

        // Bind the expertID parameter
        $statement->bind_param("s", $expertID);

        // Execute the query
        $statement->execute();

        // Get the result
        $result = $statement->get_result();

        // Fetch the expert details
        $expert = $result->fetch_assoc();

        // Close the statement and database connection
        $statement->close();
        $mysqli->close();

        // Return the expert details if found
        if ($expert) {
            return $expert;
        }
    }

    return null; // Expert is not authenticated
}


