//This page for the admin page that admin only can see this and can go to user and expert modification page.(Admin HomePage)

<?php 
     session_start();

     if(!isset($_SESSION['username']) || $_SESSION['role']!="admin"){
         header("location:index.php");
     }
?>

<h1>Hello:<?= $_SESSION['username'] ?></h1>
<h2>You are:<?= $_SESSION['role'] ?></h2>
<a href="logout.php">Logout</a>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-EduSearch</title>
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
<header class="header">
    <div class="logo logo-left">
        <img width="60px" src="Image/fklogo.png" alt="Left Logo">
    </div>
    <div class="text">FK-EduSearch</div>
    <div class="logo logo-right">
        <img width="60px" src="Image/notiLogo.png" alt="Right Logo">
    </div>

</header>

<div id="navBar">
    <ul>
    <li><a href="main.php"> HOME </a></li>
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</div>

<body>
<br><br>
<div class="card-header"><h3 class="text-center font-weight-light my-4"><center>Add User</center></h3></div>
<div class="card-body">
<br><br><br>
<body>

<h2>Users Modifications</h2>
<p>Click on the button to open the dropdown menu to select the users</p>

<div class="dropdown">
  <button id="myBtn" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="location:adminlist.php">Pusat Mel Officer</a>  //redirects to the adminlist.php page
    <a href="location:residentslist.php">UMP User</a>  //redirects to the userlist.php page
    <a href="location:wardenlist.php">UMP Expert</a>  //redirects to the expertlist.php page
  </div>
</div>

<script>
// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>

<footer>
    Copyright FK
</footer>
</body>
</html>