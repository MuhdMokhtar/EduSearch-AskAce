<?php
require_once "dbase.php";

$expertID = 2004;

// Fetch expert data from the database
$query = "SELECT ExpertName, ExpertEmail, ContactInfo FROM expert WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expert = $expertResult->fetch_assoc();
$statement->close();


$query = "SELECT ResearchArea FROM expertise WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$researchResult = $statement->get_result();
$researchAreas = $researchResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

$query = "SELECT PbTitle, PbAuthors, PublicationDate FROM publication WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$publicationResult = $statement->get_result();
$publications = $publicationResult->fetch_all(MYSQLI_ASSOC);
$statement->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
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
            <li><a href="login.php">LOGIN</a></li>
        </ul>
    </div>

    <div class="profile-container">
        <?php if ($expert) { ?>
            <div class="profile-picture">
                <img src="Image/profile.png" alt="Profile Picture">
            </div>

            <div class="personal-info">
                <h2>Personal Information</h2>
                <p>Name: <?php echo $expert['ExpertName']; ?></p>
                <p>Email: <?php echo $expert['ExpertEmail']; ?></p>
                <p>Phone: <?php echo $expert['ContactInfo']; ?></p>
            </div>

            <div class="expertise">
                <h2>Expertise and Research Areas</h2>
                <?php if ($researchAreas) {
                    foreach ($researchAreas as $research) {
                        echo "<p>Research Area: " . $research['ResearchArea'] . "</p>";
                    }
                } ?>
            </div>

            <div class="publications">
                <h2>Publications and Achievements</h2>
                <?php if ($publications) {
                    foreach ($publications as $publication) {
                        echo "<p>Title: " . $publication['PbTitle'] . "</p>";
                        echo "<p>Authors: " . $publication['PbAuthors'] . "</p>";
                        echo "<p>Publication Date: " . $publication['PublicationDate'] . "</p>";
                        echo "<hr>";
                    }
                } ?>
            </div>

            <div class="cv-upload">
                <h2>Upload CV</h2>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="cvFile">
                    <input type="submit" value="Upload">
                </form>
            </div>

            <br>
            <button class="btn btn-info">
                <a href="Expert_UpdateProfile.php" style="text-decoration: none; color: inherit;">Update</a>
            </button>
        <?php } else { ?>
            <p>No expert found.</p>
        <?php } ?>
    </div>
   
    <footer>© FK</footer>
</body>
</html>
