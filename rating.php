<?php
require_once "db-config.php";

// Specify the time period (e.g., month)
$year = date('Y');  // Current year
$month = date('m'); // Current month

// Calculate the total ratings
$query = "SELECT SUM(RatingVal) AS RatingVal FROM rating WHERE YEAR(date) = :year AND MONTH(date) = :month";
$statement = $pdo->prepare($query);
$statement->bindParam(':year', $year);
$statement->bindParam(':month', $month);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
$totalRatings = $result['RatingVal '];

// Display the total ratings
echo "Total Ratings for " . date('F Y') . ": " . $totalRatings;
?>
