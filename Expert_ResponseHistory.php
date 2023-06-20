<!DOCTYPE html>
<html>

<head>
    <title>Expert - Post History</title>
    <link rel="stylesheet" type="text/css" href="expert.css">
    <link rel="stylesheet" type="text/css" href="stylecss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <li><a href="Expert_ResponseHistory.php"> HISTORY RESPONSES </a></li>
            <li><a href=""> COMPLAINT </a></li>
            <li><a href=""> REPORT </a></li>
            <li><a href=""> FEEDBACK </a></li>
            <li><a href="Expert_ViewProfile.php"> PROFILE </a></li>
            <li><a href=""> LOGOUT </a></li>
        </ul>
    </div>

    <body>
        <header class="RH">
            <h1>Response History</h1>
        </header>

        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Response</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
           

                    require_once "dbase.php";

                    // Retrieve responses associated with the signed-in user
                    $userID = 1002;
                    $query = "SELECT * FROM post WHERE UserID = ?";
                    $statement = $conn->prepare($query);
                    $statement->bind_param("i", $userID);
                    $statement->execute();
                    $result = $statement->get_result();

                    if ($result->num_rows > 0) {
                        while ($response = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($response['PostTitle']) . "</td>";
                            echo "<td>" . htmlspecialchars($response['response']) . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-primary' style='margin-right: 10px;' onclick=\"location.href='edit_response.php?id=" . $response['PostID'] . "'\">Edit</button>";
                            echo "<button class='btn btn-danger' onclick=\"location.href='delete_response.php?id=" . $response['PostID'] . "'\">Delete</button>";

                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No responses found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="bootstrap.min.js"></script>
        <footer>© FK</footer>
    </body>

</html>