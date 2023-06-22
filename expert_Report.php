<?php require_once('dbase.php');   ?>
<!DOCTYPE html>
<html>

<head>
    <title>List of Publications - Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #publicationChartContainer {
            width: 400px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div id="publicationChartContainer">
        <canvas id="publicationChart"></canvas>
    </div>

    <?php
    // Retrieve publications from the database
    $publications = array();
    $expertID = $_SESSION['ExpertID'];

    $query = "SELECT Type, COUNT(*) AS Count FROM publication WHERE ExpertID = ? GROUP BY Type";
    $statement = $conn->prepare($query);
    $statement->bind_param('i', $expertID);
    $statement->execute();
    $publicationResult = $statement->get_result();
    $publications = $publicationResult->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    // Extract publication types and counts
    $publicationTypes = array();
    $publicationCounts = array();
    foreach ($publications as $publication) {
        $publicationTypes[] = $publication['Type'];
        $publicationCounts[] = $publication['Count'];
    }
    ?>
 
    <script>
       
        var ctx = document.getElementById('publicationChart').getContext('2d');
        var publicationChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($publicationTypes); ?>,
                datasets: [{
                    data: <?php echo json_encode($publicationCounts); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>
