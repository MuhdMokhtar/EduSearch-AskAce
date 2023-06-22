<?php    require_once('dbase.php');   ?>
<!DOCTYPE html>
<html>
<head>
    <title>Research Area Ratings and Publications</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: space-around;">
        <div style="width: 50%;">
            <canvas id="ratingChart"></canvas>

            <?php
         

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve research area ratings from the database
            $researchAreas = array();
            $ratings = array();

            $query = "SELECT Title FROM research";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $researchAreas[] = $row['Title'];
                    
                }
            }

        
            ?>

            <script>
                var ctx = document.getElementById('ratingChart').getContext('2d');
                var ratingChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: <?php echo json_encode($researchAreas); ?>,
                        datasets: [{
                            label: 'Average Ratings',
                            data: <?php echo json_encode($ratings); ?>,
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
        </div>
        <div style="width: 50%;">
            <h2>List of Publications</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
                  

                 

                    // Retrieve publications from the database
                    $publications = array();

                    $query = "SELECT PbTitle, author, year FROM publication";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $publications[] = $row;
                        }
                    }

                
                    foreach ($publications as $publication) {
                        echo '<tr>';
                        echo '<td>' . $publication['title'] . '</td>';
                        echo '<td>' . $publication['author'] . '</td>';
                        echo '<td>' . $publication['year'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
