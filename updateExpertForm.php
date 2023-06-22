<?php
    $conn = mysqli_connect("localhost", "root", "", "fk");

    if (!$conn) {
        die("Connection Error");
    }

    if (isset($_POST['Update'])) {
        $ExpertID = $_GET['GetExpertID'];
        $ExpertName = $_POST['ExpertName'];
        $ExpertEmail = $_POST['ExpertEmail'];
        $ContactInfo = $_POST['ContactInfo'];
        $ExpertPassword = $_POST['ExpertPassword'];

        $query = "UPDATE expert
                    SET ExpertID='".$ExpertID."',
                    ExpertName='".$ExpertName."', 
                    ExpertEmail='".$ExpertEmail."',
                    ContactInfo='".$ContactInfo."',
                    ExpertPassword='".$ExpertPassword."'
                    WHERE ExpertID='".$ExpertID."'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "User data successfully updated";
            header("location: expertlist.php");
        } else {
            die("Error updating user data: ".$conn->error);
        }
    } else {
        header("location: expertlist.php");
    }
?>
