<?php
require_once "dbase.php";


$expertID = $_SESSION['ExpertID'];

// Fetch expert data from the database
$query = "SELECT ExpertName, ExpertEmail, ContactInfo FROM expert WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expert = $expertResult->fetch_assoc();
$statement->close();

$query = "SELECT ExpertArea, Major, YearOFExpertise FROM expertise WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expertAreas = $expertResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

$query = "SELECT Title, Status FROM research WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$researchResult = $statement->get_result();
$research = $researchResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

$query = "SELECT Type, PbTitle, PublicationDate, TypeOfContribution FROM publication WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$publicationResult = $statement->get_result();
$publications = $publicationResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

// Process form submission - Update Personal Information
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_info'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "UPDATE expert SET ExpertName = ?, ExpertEmail = ?, ContactInfo = ? WHERE ExpertID = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('sssi', $name, $email, $phone, $expertID);

    if ($statement->execute()) {
        // Update successful
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Update failed
        echo "Failed to update personal information: " . $conn->error;
    }

    $statement->close();
}

// Process form submission - Add Expertise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_expertise'])) {
    $expertArea = $_POST['ExpertArea'];
    $major = $_POST['Major'];
    $yearOfExpertise = $_POST['YearOFExpertise'];

    $query = "INSERT INTO expertise (ExpertID, ExpertArea, Major, YearOFExpertise) VALUES (?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param('isss', $expertID, $expertArea, $major, $yearOfExpertise);

    if ($statement->execute()) {
        // Insert successful
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Insert failed
        echo "Failed to insert expertise: " . $conn->error;
    }

    $statement->close();
}

// Process form submission - Add Research
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_research'])) {
    $title = $_POST['title'];
    $status = $_POST['status'];

    $query = "INSERT INTO research (ExpertID, Title, Status) VALUES (?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param('iss', $expertID, $title, $status);

    if ($statement->execute()) {
        // Insert successful
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Insert failed
        echo "Failed to insert research: " . $conn->error;
    }

    $statement->close();
}

// Process form submission - Add Publication
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_publication'])) {
    $type = $_POST['Type'];
    $pbTitle = $_POST['pbTitle'];
    $publicationDate = $_POST['publicationDate'];
    $contributionType = $_POST['contributionType'];

    $query = "INSERT INTO publication (ExpertID,Type, PbTitle, PublicationDate, TypeOfContribution) VALUES (?,?, ?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param('issss', $expertID, $type, $pbTitle, $publicationDate, $contributionType);


    if ($statement->execute()) {
        // Insert successful
        header("Location: Expert_ViewProfile.php");
        exit();
    } else {
        // Insert failed
        echo "Failed to insert publication: " . $conn->error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name="UserID" value="<?php echo $expertID; ?>">

                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $expert['ExpertName']; ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $expert['ExpertEmail']; ?>"
                        required>

                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" value="<?php echo $expert['ContactInfo']; ?>" required><br>
                </div>

                <div class="col-md-1">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" name="update_info" value="Update Info">
                    </div>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h3>Add Expertise Information</h3>
        <form action="Expert_UpdateProfile.php" method="post">
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name="UserID" value="<?php echo $expertID; ?>">

                    <label for="ExpertArea">Expert Area:</label>
                    <input type="text" name="ExpertArea" id="ExpertArea" required>

                    <label for="Major">Major:</label>
                    <input type="text" name="Major" id="Major" required>

                    <label for="YearOFExpertise">Year of Expertise:</label>
                    <input type="number" name="YearOFExpertise" id="YearOFExpertise" required><br>
                </div>

                <div class="col-md-1">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" name="add_expertise" value="Add Expertise">
                    </div>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h3>Add Research</h3>
        <form action="Expert_UpdateProfile.php" method="post">
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name="UserID" value="<?php echo $expertID; ?>">

                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>

                    <label for="status">Status:</label>
                    <input type="text" name="status" id="status" required><br>
                </div>

                <div class="col-md-1">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" name="add_research" value="Add Research">
                    </div>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <h3>Add Publication</h3>
        <form action="Expert_UpdateProfile.php" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input type="hidden" name="UserID" value="<?php echo $expertID; ?>">

                    <label for="pbTitle">Type:</label>
                    <input type="text" name="Type" id="Type" required>

                    <label for="pbTitle">Publication Title:</label>
                    <input type="text" name="pbTitle" id="pbTitle" required>

                    <label for="publicationDate">Publication Date:</label>
                    <input type="date" name="publicationDate" id="publicationDate" required>

                    <label for="contributionType">Contribution Type:</label>
                    <input type="text" name="contributionType" id="contributionType" required><br>
                </div>

                <div class="col-md-1">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" name="add_publication" value="Add Publication">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw4Z+84xW2nQoWBs4gtPLj2JH8XZQhSQGfJzWxpQpff66yR6wl8Z2rPwxcUmIy"
        crossorigin="anonymous"></script>
</body>

</html>
