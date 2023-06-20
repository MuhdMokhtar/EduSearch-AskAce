<?php

require_once "db-config.php";

try {
    
    $Content = $_POST['Content']; // Assuming 'Content' is the name of the input field in your HTML form
    
    $sql = "INSERT INTO responses (Content) VALUES (:content)";
    
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':content', $Content);
    
    $statement->execute();
    
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$pdo = null; // Close the database connection
?>