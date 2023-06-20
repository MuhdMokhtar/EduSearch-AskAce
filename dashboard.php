<?php

session_start();

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['userRole'])) {
   header('Location: login.php');
   exit();
}

// Check the user's role
switch ($_SESSION['userRole']) {
   case 'Student':
      header('Location: main.php');
      break;
   case 'Expert':
    header('Location: Expert_MainPage.php');

      break;
   case 'Educator':
      // Show the educator dashboard
      break;
   case 'Admin':
      // Show the admin dashboard
      break;
}

?>

<html>
<head>
   