<?php
$userRole = "admin"; 

if ($userRole === "user") {
    $complaintUrl = "complaint.php";
} else if ($userRole === "admin") {
    $complaintUrl = "admin.php";
}
?>

<!DOCTYPE html>
<html>

<body>

    <script>
    function navigate() {
        var complaintUrl = "<?php echo $complaintUrl; ?>";
        window.location.href = complaintUrl;
    }
    </script>
</body>
</html>
