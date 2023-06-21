<?php
require_once('dbase.php');
session_start();
$expertID = $_SESSION['ExpertID'];

// Fetch research from the database
$query = "SELECT researchID, Title, Status FROM research WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$researchResult = $statement->get_result();
$research = $researchResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_research'])) {
    $researchID = $_POST['researchID'];
    $Title = $_POST['Title'];
    $status = $_POST['Status'];

    $query = "UPDATE research SET Title = ?, Status = ? WHERE researchID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('ssi', $Title, $status, $researchID);

    if ($statement->execute()) {
        // Update successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Update failed
        echo "Failed to update research: " . $conn->error;
    }

    $statement->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="viewprofile.css">
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
            <li><a href=""> COMPLAINT </a></li>
            <li><a href=""> REPORT </a></li>
            <li><a href=""> FEEDBACK </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href=""> LOGOUT </a></li>
        </ul>
    </div>

    <div class="update-profile-container">
        <h1>Profile</h1>

        <h3>Research Information</h3>
        <div>
            <form action="" method="post">
                <?php foreach ($research as $researchItem) { ?>
                    <input type="hidden" name="researchID" value="<?php echo $researchItem['researchID']; ?>">

                    <label for="Title">Title:</label>
                    <input type="text" name="Title" id="Title" value="<?php echo $researchItem['Title']; ?>" required>

                    <label for="Status">Status:</label>
                    <input type="text" name="Status" id="Status" value="<?php echo $researchItem['Status']; ?>" required>

                    <br><br>

                    <input type="submit" class="btn btn-primary" name="edit_research" value="Update Research">
                <?php } ?>
            </form>
            <hr>
        </div>
    </div>

    <footer>© FK</footer>
</body>

</html>
