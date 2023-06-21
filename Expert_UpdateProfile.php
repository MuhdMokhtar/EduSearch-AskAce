<?php
require_once "dbase.php";
session_start();
$expertID =  $_SESSION['ExpertID'];

// Fetch expert data from the database
$query = "SELECT ExpertName, ExpertEmail, ContactInfo FROM expert WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expert = $expertResult->fetch_assoc();
$statement->close();

//Update
$query = "UPDATE expert SET ExpertName=?, ExpertEmail=?, ContactInfo=? WHERE ExpertID=?";

// Update expert's profile in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['UserID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "UPDATE expert SET ExpertName=?, ExpertEmail=?, ContactInfo=? WHERE ExpertID=?";
    $statement = $conn->prepare($query);
    $statement->bind_param('sssi', $name, $email, $phone, $userID);
    $statement->execute();
    $statement->close();

    // Redirect to the profile page after the update
    header("Location: Expert_ViewProfile.php");
    exit();
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
        
        <h2>Update Profile</h2><br>
        <h3>Personal Information</h3>
        <form action="Expert_UpdateProfile.php" method="post">
            <input type="hidden" name="UserID" value="2004">

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $expert['ExpertName']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $expert['ExpertEmail']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $expert['ContactInfo']; ?>" required><br>

            <br>

            <input type="submit" class="btn btn-primary" value="Update Profile">
        </form>
    </div>

    <footer>© FK</footer>
</body>

</html>
