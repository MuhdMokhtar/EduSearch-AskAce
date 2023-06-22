<?php

require_once("dbase.php");



if (isset($_POST['submit'])) {
    $UserID = $_POST['UserID'];
    $ExpertID = $_POST['ExpertID'];
    $ComplaintType = $_POST['ComplaintType'];
    $ComplaintDescription = $_POST['Description'];
	$Status = "In Progress"; // Set the status to "In Progress"

    $query = "INSERT INTO complaints (ExpertID, UserID, ComplaintType, Description, Status) VALUES ('$ExpertID', '$UserID', '$ComplaintType', '$ComplaintDescription', '$Status')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('A new complaint has been submitted!');</script>";
        header("refresh:0.3; url=complaint.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<html>
<head> 
    <script>
        alert("A new complaint submitted!!");
        window.location.href = "complaint.php";
    </script>
</head>
<body>
</body>
</html>