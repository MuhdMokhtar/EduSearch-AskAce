<?php
require_once('dbase.php');
session_start();
$expertID = $_SESSION['ExpertID'];

// Fetch expert area from the database
$query = "SELECT ExpertiseID, ExpertArea, Major, YearOFExpertise FROM expertise WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expertArea = $expertResult->fetch_assoc();
$statement->close();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_expertise'])) {
    $expertiseID = $_POST['ExpertiseID'];
    $expertArea = $_POST['ExpertArea'];
    $major = $_POST['Major'];
    $yearOfExpertise = $_POST['YearOFExpertise'];

    $query = "UPDATE expertise SET ExpertArea = ?, Major = ?, YearOFExpertise = ? WHERE ExpertiseID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('sssi', $expertArea, $major, $yearOfExpertise, $expertiseID);

    if ($statement->execute()) {
        // Update successful, redirect to profile page
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Update failed
        echo "Failed to update expertise: " . $conn->error;
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

        <h3>Expertise Information</h3>
        <div>
            <form action="" method="post">
                <input type="hidden" name="UserID" value="<?php echo $expertID; ?>">
                <input type="hidden" name="ExpertiseID" value="<?php echo $expertArea['ExpertiseID']; ?>">

                <label for="ExpertArea">Expert Area:</label>
                <input type="text" name="ExpertArea" id="ExpertArea" value="<?php echo $expertArea['ExpertArea']; ?>" required>

                <label for="Major">Major:</label>
                <input type="text" name="Major" id="Major" value="<?php echo $expertArea['Major']; ?>" required>

                <label for="YearOFExpertise">Year of Expertise:</label>
                <input type="number" name="YearOFExpertise" id="YearOFExpertise" value="<?php echo $expertArea['YearOFExpertise']; ?>" required><br>

                <br>

                <input type="submit" class="btn btn-primary" name="edit_expertise" value="Update Expertise">
            </form>
            <hr>
        </div>
    </div>

    <footer>© FK</footer>
</body>

</html>
