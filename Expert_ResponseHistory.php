<!DOCTYPE html>
<html>

<head>
    <title>Expert - Post History</title>
    <link rel="stylesheet" type="text/css" href="expert.css">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="logo-left">
            <img width="60px" src="Image/fklogo.png" alt="Left Logo">
        </div>
        <div class="text">FK-EduSearch</div>
        <div class="logo-right">
            <img width="60px" src="Image/notiLogo.png" alt="Right Logo">
        </div>
    </header>

    <div id="navBar">
        <ul>
            <li><a href="Expert_MainPage.php"> HOME </a></li>
            <li><a href="Expert_ResponseHistory.php">RESPONSES HISTORY </a></li>
            <li><a href="expert_Report.php"> REPORT </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href="logout.php"> LOGOUT </a></li>
        </ul>
    </div>

    <body>
        <header class="RH">
            <h1>Response History</h1>
        </header>

        <div class="container">
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="search" class="form-label">Search:</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Enter post title">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <?php
require_once "dbase.php";

// Retrieve responses associated with the signed-in user
$userID = $_SESSION['ExpertID'];
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM post WHERE ExpertID = ? AND response IS NOT NULL AND response <> '' AND PostTitle LIKE ?";
$statement = $conn->prepare($query);
$searchKeyword = "%{$searchKeyword}%";
$statement->bind_param("is", $userID, $searchKeyword);
$statement->execute();
$result = $statement->get_result();

$totalResponses = $result->num_rows; // Get the total number of responses

// Display the total number of responses
echo "<h3>Total Responses: $totalResponses</h3>";

if ($result->num_rows > 0) {
    echo "<table class='table table-dark'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Post Title</th>";
    echo "<th>Response</th>";
    echo "<th>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($response = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($response['PostTitle']) . "</td>";
        echo "<td>" . htmlspecialchars($response['response']) . "</td>";
        echo "<td>";
        echo "<button class='btn btn-primary' style='margin-right: 10px;' onclick=\"location.href='edit_response.php?id=" . $response['PostID'] . "'\">Edit</button>";
        echo "<button class='btn btn-danger' onclick=\"location.href='delete_response.php?id=" . $response['PostID'] . "'\">Delete</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No responses found.</p>";
}
?>


        </div>

        <script src="bootstrap.min.js"></script>
        <footer>© FK</footer>
    </body>

</html>
