<?php
require_once "dbase.php";

$expertID = 2004; // Set the desired ExpertID

$query = "SELECT PostID, PostTitle, PostContent, PostStatus FROM post WHERE ExpertID = ?";
$statement = $conn->prepare($query);
$statement->bind_param("i", $expertID); // Use 'i' for integer parameter
$statement->execute();
$result = $statement->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postId = $_POST["postId"];
    $action = $_POST["action"];

    if ($action === 'approve') {
        // Update the status of the post to "approved" in the database
        $status = 'approved';
        $query = "UPDATE post SET PostStatus = ? WHERE PostID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("ss", $status, $postId);
        $statement->execute();
    } elseif ($action === 'reject') {
        // Reassign the post to another expert
        $query = "UPDATE post SET ExpertID = (SELECT ExpertID FROM expert WHERE ExpertID <> ? ORDER BY RAND() LIMIT 1) WHERE PostID = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("ss", $expertID, $postId);
        $statement->execute();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FK-EduSearch - Expert Module</title>
    <link rel="stylesheet" type="text/css" href="expert.css">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
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
            <li><a href=""> FEEDBACK </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Welcome, !</h1>

        <div class="main-div">
            <main>
                <section class="post-list">
                    <h2 class="post-heading">Assigned Posts</h2>
                    <?php if (empty($posts)) { ?>
                        <h3>No assigned posts.</h3>
                    <?php } else { ?>
                        <ul>
                            <?php foreach ($posts as $post) { ?>
                                <li>
                                    <h3><?php echo $post['PostTitle']; ?></h3>
                                    <p><?php echo $post['PostContent']; ?></p>
                                    <p>Status: <?php echo $post['PostStatus']; ?></p>
                                    <form method="POST">
                                        <a href="Expert_Respond_Pages.php?title=<?php echo urlencode($post['PostTitle']); ?>&content=<?php echo urlencode($post['PostContent']); ?>" class="button btn-primary" style="text-decoration: none;">Respond</a>
                                        <input type="hidden" name="postId" value="<?php echo $post['PostID']; ?>">
                                        <button type="submit" name="action" value="approve" class="button btn-primary">Approve</button>
                                        <button type="submit" name="action" value="reject" class="button btn-danger">Reject</button>
                                    </form>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </section>
            </main>
        </div>
    </div>
    <footer>© FK</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
