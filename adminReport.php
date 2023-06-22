<?php


require_once("dbase.php");


$query = "SELECT Status, COUNT(*) AS number FROM complaints GROUP BY Status";

if (isset($_POST['submit'])) {
    $from = mysqli_real_escape_string($conn, $_POST['from']);
    $to = mysqli_real_escape_string($conn, $_POST['to']);

    // Assuming the date is stored in the 'Timestamp' column
    $query = "SELECT Status, COUNT(*) AS number FROM complaints WHERE DATE(Timestamp) BETWEEN '$from' AND '$to' GROUP BY Status";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Query execution failed: " . mysqli_error($conn);
}

$totalComplaints = 0; // Initialize total complaints variable

if (!isset($_POST['submit']) || (isset($_POST['submit']) && mysqli_num_rows($result) > 0)) {
    // If no date range is specified or there are complaints within the date range
    $totalQuery = "SELECT COUNT(*) AS total_complaints FROM complaints";

    if (isset($_POST['submit'])) {
        $totalQuery .= " WHERE DATE(Timestamp) BETWEEN '$from' AND '$to'";
    }

    $totalResult = mysqli_query($conn, $totalQuery);

    if ($totalResult) {
        $row = mysqli_fetch_assoc($totalResult);
        $totalComplaints = $row['total_complaints'];
    } else {
        echo "Query execution failed: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
        <title>FK-EduSearch</title>
    </head>
    <link rel="stylesheet" type="text/css" href="stylecss.css">
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
                <li><a href=""> COMPLAINT </a></li>
				<li><a href=""> REPORT </a></li>
				<li><a href=""> FEEDBACK </a></li>
				<li><a href="profile.php"> PROFILE </a></li>
                <li><a href=""> LOGOUT </a></li>
            </ul>
        </div>
        <body>
		<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
        </body>
    <footer>Copyright FK</footer>
    
</head>
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .banner-area {
            text-align: center;
            margin-bottom: 30px;
        }

        .banner-area h2 {
            font-size: 24px;
            margin: 0;
        }

        .form-container {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: inline-block;
            width: 80px;
            font-weight: bold;
        }

        .form-group input[type="date"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .box {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 30px;
        }

        .box h2 {
            font-size: 20px;
            margin: 0;
            margin-bottom: 10px;
        }

        .chart-container {
            text-align: center;
        }

        .chart {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .no-data {
            text-align: center;
            margin-bottom: 30px;
        }
		
		.submit-btn,
    .button {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    

    <div id="navBar">
        <ul>
            <!-- Navigation links here -->
        </ul>
    </div>

    <div class="container">
        <div class="banner-area">
            <h2>COMPLAINT REPORT</h2>
        </div>

        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <label>From:</label>
                    <input type="date" name="from" value="<?php echo isset($_POST['from']) ? $_POST['from'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>To:</label>
                    <input type="date" name="to" value="<?php echo isset($_POST['to']) ? $_POST['to'] : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Generate" name="submit" class="submit-btn">
					<a href="adminC.php">
                    <button type="button" class="button" >Back </button>
				</a>
				</div>
				
            </form>
        </div>

        <?php if ($totalComplaints > 0) { ?>
            <div class="box">
                <h2>TOTAL NUMBER OF COMPLAINTS RECORDED</h2>
                <?php echo $totalComplaints; ?>
            </div>
        <?php } ?>

        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="chart-container">
                <div id="barchart" class="chart"></div>
            </div>
        <?php } elseif (isset($_POST['submit'])) { ?>
            <p class="no-data">No data available for the selected date range.</p>
        <?php } ?>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["Status"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Percentage of Complaints Based on Status',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('barchart'));
            chart.draw(data, options);

            // Calculate and display the percentage
            var totalComplaints = <?php echo $totalComplaints; ?>;
            var tableData = new google.visualization.DataTable();
            tableData.addColumn('string', 'Status');
            tableData.addColumn('number', 'Number');
            tableData.addRows([
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $status = $row["Status"];
                    $number = $row["number"];
                    $percentage = ($number / $totalComplaints) * 100;
                    echo "['" . $status . "', " . $number . ", {v:" . $percentage . ", f:'" . round($percentage, 2) . "%'}],";
                }
                ?>
            ]);

            var table = new google.visualization.Table(document.getElementById('table_div'));
            table.draw(tableData, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
</body>
</html>
