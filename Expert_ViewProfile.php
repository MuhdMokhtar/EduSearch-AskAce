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

$query = "SELECT ExpertiseID, ExpertArea, Major, YearOFExpertise FROM expertise WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$expertResult = $statement->get_result();
$expertAreas = $expertResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

$query = "SELECT researchID,Title, Status FROM research WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$researchResult = $statement->get_result();
$research = $researchResult->fetch_all(MYSQLI_ASSOC);
$statement->close();


$query = "SELECT PublicationID, Type, PbTitle, PublicationDate, TypeOfContribution FROM publication WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$publicationResult = $statement->get_result();
$publications = $publicationResult->fetch_all(MYSQLI_ASSOC);
$statement->close();

$query = "SELECT id,filename FROM expertCV WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $expertID);
$statement->execute();
$cvResult = $statement->get_result();
$cv = $cvResult->fetch_all(MYSQLI_ASSOC);
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
            width: 600px;
            /* Set the desired width for the expertise container */
        }

        .table-container {
            width: 100%;
            /* Set the table container to occupy the full width */
            margin-bottom: 20px;
            /* Add some spacing between the tables */
        }

        .table-container table {
            width: 100%;
            /* Make the table occupy the full width of its container */
        }

        .table-container th,
        .table-container td {
            text-align: center;
            /* Center-align the table cells */
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
            <li><a href="Expert_ResponseHistory.php">RESPONSES HISTORY </a></li>
            <li><a href=""> COMPLAINT </a></li>
            <li><a href=""> REPORT </a></li>
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
                        <th colspan="3">Action</th>

                    </tr>
                    <?php foreach ($expertAreas as $expert) { ?>
                        <tr>
                            <td><?php echo $expert['ExpertArea']; ?></td>
                            <td><?php echo $expert['Major']; ?></td>
                            <td style="text-align: center;"><?php echo $expert['YearOFExpertise']; ?></td>
                            <td><a href="editForm.php?expertID=" class="button btn btn-primary">Edit</a><br><br>
                            <td><a href="deleteExpertise.php?ExpertiseID=<?php echo $expert['ExpertiseID']; ?>" class="button btn btn-danger">Delete</a></td>


                            </td>
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
                        <th colspan="3">Action</th>


                    </tr>
                    <?php foreach ($research as $research) { ?>
                        <tr>
                            <td><?php echo $research['Title']; ?></td>
                            <td><?php echo $research['Status']; ?></td>
                            <td><a href="editResearchForm.php?expertID=" class="button btn btn-primary">Edit</a><br><br>
                            <td><a href="deleteResearch.php?researchID=<?php echo $research['researchID']; ?>" class="button btn btn-danger">Delete</a><br><br></td>



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
                        <th colspan="3">Action</th>
                    </tr>
                    <?php foreach ($publications as $publication) { ?>
                        <tr>
                            <td><?php echo $publication['Type']; ?></td>
                            <td><?php echo $publication['PbTitle']; ?></td>
                            <td><?php echo $publication['PublicationDate']; ?></td>
                            <td><?php echo $publication['TypeOfContribution']; ?></td>
                            <td><a href="editPublicationForm.php?publicationID=<?php echo $publication['PublicationID']; ?>" class="button btn btn-primary">Edit</a><br><br></td>

                            <td><a href="deletePublication.php?publicationID=<?php echo $publication['PublicationID']; ?>" class="button btn btn-danger">Delete</a><br><br></td>

                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No research areas found.</p>
            <?php } ?>
        </div>
    </div>

    <div class="expertise-container">
    <div class="expertise">
        <h2>CV</h2>
        <?php if ($cvResult) { ?>
            <table class="table table-striped">
                <tr>
                    <th>Filename</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($cv as $cv) { ?>
                    <tr>
                        <td><?php echo $cv['filename']; ?></td>
                        <td>
                            <a href="pdf/<?php echo $cv['filename']; ?>" target="_blank">View</a>
                        </td>
                        <td>
                            <form action="deleteCV.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $cv['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        

                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-input py-2">
                                <h3>Upload CV</h3>
                                <div class="form-group">
                                    <input type="file" name="pdf_file" class="form-control" accept=".pdf" title="Upload PDF" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="button btn btn-primary" name="submit" value="Submit">
                                </div>
                            </div>
                        </form>
            <?php } else { ?>
                <p>No CV found.</p>
            <?php } ?>
        </div>
    </div>


<?php } else { ?>
    <p>No expert found.</p>
<?php } ?>
</div>

<footer>© FK</footer>
</body>

</html>