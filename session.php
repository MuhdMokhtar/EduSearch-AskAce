<?php
// Start session
include('dbase.php');


// Check if the user is logged in
if (isset($_SESSION['UserID'])) {
    // Redirect to the appropriate page based on user category
    $category = $_SESSION['Category'];
    if ($category == "admin") {
        header("Location: adminlist.php");
        exit();
    } elseif ($category == "expert") {
        header("Location: Expert_Mainpage.php");
        exit();
    } elseif ($category == "user") {
        header("Location: main.php");
        exit();
    }
}

// Validation error flag
$errflag = false;

// Input Validations
if ($_POST['username'] == '') {
    $errmsg_arr[] = 'Login email missing';
    $errflag = true;
}
if ($_POST['password'] == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
}

// If there are input validations, redirect back to the login form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("Location: login.php");
    exit();
}



// Create a query to be executed in SQL
$username = $_POST['username'];
$password = $_POST['password'];
$category = $_POST['category'];

if ($category == "admin") {
    // Query for admin login
    $query = "SELECT * FROM admin WHERE AdminName= '$username' AND AdminPassword= '$password'";
} elseif ($category == "expert") {
    // Query for expert login
    $query = "SELECT * FROM expert WHERE ExpertName = '$username' AND ExpertPassword = '$password'";
} elseif ($category == "user") {
    // Query for user login
    $query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
} else {
    // Invalid user category
    die("Invalid user category");
}

// Run the SQL query in the database
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Check whether the query was successful or not
if (isset($result) && mysqli_num_rows($result) == 1) {
    // Login successful
    session_regenerate_id();
    $member = mysqli_fetch_assoc($result);

    // Set session variables based on user category
    if ($category == "admin") {
        $_SESSION['AdminID'] = $member['AdminID'];
        $_SESSION['AdminName'] = $member['AdminName'];
        $_SESSION['AdminEmail'] = $member['AdminEmail'];
        $_SESSION['AdminPassword'] = $member['AdminPassword'];
        $_SESSION['AdminContact'] = $member['AdminContact'];
    } elseif ($category == "expert") {
        $_SESSION['ExpertID'] = $member['ExpertID'];
        $_SESSION['ExpertName'] = $member['ExpertName'];
        $_SESSION['ExpertEmail'] = $member['ExpertEmail'];
    } elseif ($category == "user") {
        $_SESSION['UserID'] = $member['UserID'];
        $_SESSION['Username'] = $member['Username'];
        $_SESSION['Email'] = $member['Email'];
        $_SESSION['Password'] = $member['Password'];
        $_SESSION['Phone'] = $member['Phone'];
    }

    $_SESSION['Category'] = $category;
    $_SESSION['STATUS'] = true;
    session_write_close();

    // Redirect to the appropriate page based on user category
    if ($category == "admin") {
        header("Location: adminlist.php");
    } elseif ($category == "expert") {
        header("Location: Expert_Mainpage.php");
    } elseif ($category == "user") {
        header("Location: main.php");
    }
    exit();
} else {
    // Login failed
    $message = "Login failed!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = 'login.php';
    </script>";
    exit();
}
?>
