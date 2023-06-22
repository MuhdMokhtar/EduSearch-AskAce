<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <style>
        .graphs-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .graph {
            width: 400px;
            margin: 10px;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserActivity</title>
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
                <li><a href="report.php"> HOME </a></li>
                <li><a href="complaint.php"> COMPLAINT </a></li>
				<li><a href="report.php"> REPORT </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </div>
        <body>
        
        <div id="navBar">
            <ul>
            <li><a href="report.php">Report</a></li>
            <li><a href="user_activity.php">User Activity</a></li>
            </ul>
        </div>
    <main>
        <div id="navBar">
            <!-- Sub-navigation content here -->
        </div>

        <section>
            <h2>Search User Activity</h2>
            <form method="GET" action="">
                <label for="search-term">Activity ID:</label>
                <input type="text" id="search-term" name="search-term" placeholder="">
                <button type="submit">Search</button>
            </form>
        </section>

        <h1>User Activity</h1>

        <table>
            <thead>
                <tr>
                    <th>Activity ID</th>
                    <th>NumOfPost</th>
                    <th>CommentActivity</th>
                    <th>LikesActivity</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // PHP code to retrieve data from the database and populate the table
                require_once "dbase.php"; // Include the dbase.php file

                if (isset($_GET['search-term'])) {
                    // Sanitize the search term to prevent SQL injection
                    $searchTerm = mysqli_real_escape_string($conn, $_GET['search-term']);

                    // Modify the SQL query to include the search term
                    $sql = "SELECT * FROM useractivity WHERE ActivityID LIKE '%$searchTerm%'";
                } else {
                    // Default SQL query to fetch all user activities
                    $sql = "SELECT * FROM useractivity";
                }

                $result = $conn->query($sql);

                // Display data in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['ActivityID'] . "</td>";
                        echo "<td>" . $row['NumOfPost'] . "</td>";
                        echo "<td>" . $row['CommentActivity'] . "</td>";
                        echo "<td>" . $row['LikesActivity'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }

               
                ?>
            </tbody>
        </table>


<?php require_once "graph.php" ?>
<!-- HTML code -->

<!-- Place the circular graphs after the table -->
<div class="graphs-container">
    <h3>NumOfPost</h3>
    <div class="graph">
        <canvas id="numOfPostsChart"></canvas>
    </div>

    <h3>LikesActivity</h3>
    <div class="graph">
        <canvas id="likesActivitiesChart"></canvas>
    </div>
</div>


    </main>

    <footer>
    <footer>Copyright FK</footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
<!-- JavaScript code to generate the circular graphs -->
<script>
    // Get the data for the circular graphs from PHP variables
    var activityIDs = <?php echo json_encode($activityIDs); ?>;
    var numOfPosts = <?php echo json_encode($numOfPosts); ?>;
    var likesActivities = <?php echo json_encode($likesActivities); ?>;
    
    // Generate the circular graph for NumOfPost
    var numOfPostsChart = new Chart(document.getElementById('numOfPostsChart'), {
        type: 'doughnut',
        data: {
            labels: activityIDs,
            datasets: [{
                label: 'NumOfPost',
                data: numOfPosts,
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#ad74a3', '#59bfbf']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'NumOfPost'
            }
        }
    });
    
    // Generate the circular graph for LikesActivity
    var likesActivitiesChart = new Chart(document.getElementById('likesActivitiesChart'), {
        type: 'doughnut',
        data: {
            labels: activityIDs,
            datasets: [{
                label: 'LikesActivity',
                data: likesActivities,
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#ad74a3', '#59bfbf']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'LikesActivity'
            }
        }
    });
</script>

  


</body>
</html>
