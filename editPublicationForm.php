<?php
require_once('dbase.php');
session_start();
$expertID = $_SESSION['ExpertID'];

// Fetch publications from the database
$query = "SELECT PublicationID, PbTitle, PublicationDate, TypeofContribution FROM publication WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$publicationResult = $statement->get_result();
$publications = $publicationResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_publication'])) {
    $publicationID = $_POST['publicationID'];
    $title = $_POST['PbTitle'];
    $publicationDate = $_POST['PublicationDate'];
    $contributionType = $_POST['TypeofContribution'];

    $query = "UPDATE publication SET PbTitle = ?, PublicationDate = ?, TypeofContribution = ? WHERE PublicationID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('sssi', $title, $publicationDate, $contributionType, $publicationID);


    if ($statement->execute()) {
        // Update successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Update failed
        echo "Failed to update publication: " . $conn->error;
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

        <h3>Publication Information</h3>
        <div>
            <form action="editPublicationForm.php" method="post">
                <?php foreach ($publications as $publication) { ?>
                    <input type="hidden" name="publicationID" value="<?php echo $publication['PublicationID']; ?>">

                    <label for="title">Title:</label>
                    <input type="text" name="PbTitle" id="PbTitle" value="<?php echo $publication['PbTitle']; ?>" required>

                    <label for="publicationDate">Publication Date:</label>
                    <input type="date" name="PublicationDate" id="PublicationDate" value="<?php echo $publication['PublicationDate']; ?>" required>

                    <label for="contributionType">Type of Contribution:</label>
                    <input type="text" name="TypeofContribution" id="TypeofContribution" value="<?php echo $publication['TypeofContribution']; ?>" required>


                    <br><br>

                    <input type="submit" class="btn btn-primary" name="edit_publication" value="Update Publication">
                <?php } ?>
            </form>
            <hr>
        </div>
    </div>

    <footer>© FK</footer>
</body>

</html>