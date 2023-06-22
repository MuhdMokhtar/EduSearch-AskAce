<?php
require_once "dbase.php";
if (isset($_POST['submit'])) {
    $expertID = $_SESSION['ExpertID']; // Assuming you have the ExpertID available in the session

    if (isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];

        move_uploaded_file($file_tmp, "./pdf/" . $file_name);

        $insertquery = "INSERT INTO expertCV(ExpertID, filename) VALUES (?, ?)";
        $statement = $conn->prepare($insertquery);
        $statement->bind_param("is", $expertID, $file_name);
        $statement->execute();
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show text-center">
            <a class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Failed!</strong> File must be uploaded in PDF format!
        </div>
<?php
    }
  }
  header("Location: Expert_ViewProfile.php")
?>
