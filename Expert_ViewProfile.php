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
?>	




<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="viewprofile.css">
    <link rel="stylesheet" type="text/css" href="expert.css">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <style>
        .profile-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .profile-picture {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .personal-info {
            flex: 1 1 auto;
        }

        .expertise-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .expertise {
            width: 500px; /* Set the desired width for the expertise container */
        }

        .table-container {
            width: 100%; /* Set the table container to occupy the full width */
            margin-bottom: 20px; /* Add some spacing between the tables */
        }

        .table-container table {
            width: 100%; /* Make the table occupy the full width of its container */
        }

        .table-container th,
        .table-container td {
            text-align: center; /* Center-align the table cells */
        }

      

       

    
    </style>
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
                <img src="Image/profile.png" img width="30px" alt="Profile Picture">
            </div>

            <div class="personal-info">
                <p>Name: <?php echo $expert['ExpertName']; ?></p>
                <p>Email: <?php echo $expert['ExpertEmail']; ?></p>
                <p>Phone: <?php echo $expert['ContactInfo']; ?></p>
            </div>

            <button class="btn btn-info update-button">
        <a href="Expert_UpdateProfile.php" style="text-decoration: none; color: inherit;">Update</a>
    </button>
       
    </div>
    <div class="expertise-container">
        <div class="expertise">
            <h2>Expertise</h2>
            <?php if ($expertAreas) { ?>
                <table class="table table-striped">

                    <tr>
                        <th>Expert Area</th>
                        <th>Major</th>
                        <th>Year of Expertise</th>
                        
                    </tr>
                    <?php foreach ($expertAreas as $expert) { ?>
                        <tr>
                            <td><?php echo $expert['ExpertArea']; ?></td>
                            <td><?php echo $expert['Major']; ?></td>
                            <td style="text-align: center;"><?php echo $expert['YearOFExpertise']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No expertise found.</p>
            <?php } ?>
        </div>
    </div>

    <div class="expertise-container">
        <div class="expertise">
            <h2>Research</h2>
            <?php if ($researchResult) { ?>
                <table class="table table-striped">

                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                     
                        
                    </tr>
                    <?php foreach ($researchResult as $research) { ?>
                        <tr>
                            <td><?php echo $research['Title']; ?></td>
                            <td><?php echo $research['Status']; ?></td>
                         
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No expertise found.</p>
            <?php } ?>
        </div>
    </div>



    <div class="expertise-container">
        <div class="expertise">
            <h2>Publications</h2>
            <?php if ($publicationResult) { ?>
                <table class="table table-striped">

                <tr>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Publication Date</th>
                    <th>Type of Contribution</th>
                </tr>
                <?php foreach ($publications as $publication) { ?>
                    <tr>
                    <td><?php echo $publication['Type']; ?></td>
                        <td><?php echo $publication['PbTitle']; ?></td>
                        <td><?php echo $publication['PublicationDate']; ?></td>
                        <td><?php echo $publication['TypeOfContribution']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No research areas found.</p>
            <?php } ?>
        </div>
    </div>

    <div class="cv-upload">
        <h2>Upload CV</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="cvFile">
            <input type="submit" value="Upload">
        </form>
    </div>

    <br>
    <button class="btn btn-info update-button">
        <a href="Expert_UpdateProfile.php" style="text-decoration: none; color: inherit;">Update</a>
    </button>
<?php } else { ?>
    <p>No expert found.</p>
<?php } ?>
</div>

<footer>© FK</footer>
</body>

</html>