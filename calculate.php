<?php
$con = mysqli_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"fk");

  $result = mysqli_query($con,"select AdminName FROM admin");
  $result1 = mysqli_query($con,"select ExpertName FROM expert");
  $result2 = mysqli_query($con,"select username FROM users");

  $admin = mysqli_num_rows($result);
  $expert = mysqli_num_rows($result1);
  $user = mysqli_num_rows($result2);


  // $total = $row[0];
  // echo "Total Number of Admin: " . $admin; echo "<br>";
  // echo "Total Number of Expert: " . $expert;echo "<br>";
  // echo "Total Number of User: " . $users;
  mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">
<html lang="en">
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
        <li><a href=""> COMPLAINT </a></li>
        <li><a href=""> REPORT </a></li>
        <li><a href=""> FEEDBACK </a></li>
        <li><a href="profile.php"> PROFILE </a></li>
        <li><a href=""> LOGOUT </a></li>
    </ul>
</div>

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<meta name="author" content="Ganesh">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Calculation</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<!-- <link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css"> -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">



<div class="topnav">
		<ul class="first-ul"><li>
  		<a href="adminlist.php">Back</a>
                </li>
</div>

	</head>
	<body>

		<div class="main-wrapper">
			<div class="working-process-area">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h2>Calculation Table </h2>
								<p>Total Number of Admins, Experts and Users.</p>
                <div class="container">
                  <table class="table table-hover ">
                      <thead>
                        <tr>
                          <th>User Type</th>
                          <th>Count</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td align="left">Admin</td>
                          <td  align="left"><?php echo $admin ?></td>

                        </tr>
                        <tr>
                          <td align="left">Expert</td>
                          <td  align="left"><?php echo $expert ?></td>

                        </tr>
                        <tr>
                          <td align="left">User</td>
                          <td align="left"><?php echo $user ?></td>

                        </tr>
                      </tbody>
                    </table>
                  </div>
							</div>
						</div>
					</div>
					<div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
						<div class="single-work-process">

					</div>
				</div>
			</div>
		</div>

				</footer>
			</section>
			<!-- End Footer Widget Area -->

		</div>




		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>
	</body>
	<footer>
    Copyright FK
</footer>
</html>
