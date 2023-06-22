<?php

require_once "dbase.php";

$title = isset($_GET['title']) ? $_GET['title'] : "";
$content = isset($_GET['content']) ? $_GET['content'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Page</title>
    <link rel="stylesheet" type="text/css" href="respond.css">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
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
            <li><a href="expert_Report.php"> REPORT </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href="logout.php"> LOGOUT </a></li>
        </ul>
    </div>

    <div class="container">

        <h1><?php echo htmlspecialchars($title); ?></h1>
        <p class="post-content"><?php echo htmlspecialchars($content); ?></p>

        <div class="form-container">
            <h2>Write your response</h2>
            <form action="Expert_SaveResponse.php" method="post">
                <input type="hidden" name="postTitle" value="<?php echo htmlspecialchars($title); ?>">
                <textarea name="content" required></textarea>
                <input type="submit" name="submit" value="Submit Response">
            </form>
        </div>
    </div>
    <footer>© FK</footer>
</body>

</html>
