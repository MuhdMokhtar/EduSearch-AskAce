<?php

require_once "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['responseID'])) {
    $responseID = $_POST['responseID'];
    $content = $_POST['content'];

    // Update the response in the database
    $query = "UPDATE post SET response = ? WHERE PostID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("si", $content, $responseID);
    $statement->execute();

    // Redirect back to the Expert_ResponseHistory.php page after editing
    header("Location: Expert_ResponseHistory.php");
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $responseID = $_GET['id'];

    // Retrieve the response from the database
    $query = "SELECT * FROM post WHERE PostID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $responseID);
    $statement->execute();
    $result = $statement->get_result();
    $response = $result->fetch_assoc();

    if (!$response) {
        // Handle error if the response doesn't exist
        echo "Error: Response not found.";
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>FK-EduSearch - Expert Module</title>
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
            <li><a href="Expert_ResponseHistory.php"> HISTORY RESPONSES </a></li>
            <li><a href=""> COMPLAINT </a></li>
            <li><a href=""> REPORT </a></li>
            <li><a href=""> FEEDBACK </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href=""> LOGOUT </a></li>
        </ul>
    </div>

    <body>
        <header>
            <h1>Edit Response</h1>
        </header>

        <div class="container">
            <form method="post" action="edit_response.php">
                <input type="hidden" name="responseID" value="<?php echo $response['PostID']; ?>">
                <div class="mb-3">
                    <label for="content" class="form-label">Response</label>
                    <textarea class="form-control" id="content" name="content"><?php echo $response['response']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="Expert_ResponseHistory.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

        <script src="bootstrap.min.js"></script>
    </body>
<footer>© FK</footer>
</html>
