<?php
if (isset($_POST['submit'])) {

    try {
        require_once "db-config.php";

        // Get user input from the form
        $name = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $phone = $_POST['Phone'];
        $role = $_POST['userRole'];

        // Check if the userRole field is not null or empty
        if (isset($_POST['userRole']) && !empty($_POST['userRole'])) {
            $userRole = $_POST['userRole'];
        } else {
            throw new Exception("User role is required.");
        }

        // Check if the email address already exists in the database
        $sql = "SELECT COUNT(*) FROM users WHERE Email = ?";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("s", $email);
        $statement->execute();
        $statement->bind_result($emailExists);
        $statement->fetch();
        $statement->close();

        if ($emailExists) {
            throw new Exception("Email address already exists. Please choose a different email.");
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (Username, Email, Password, Phone, userRole) VALUES (?, ?, ?, ?, ?)";
        $statement = $mysqli->prepare($sql);
        $statement->bind_param("sssss", $name, $email, $hashed_password, $phone, $role);
        $statement->execute();
        $statement->close();

        // Redirect the user to the login page
        header('Location: Login.php');
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">FK-EduSearch</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<h3 class="mb-4">Sign Up</h3>

		<form action="#" class="signup-form" method="POST">
              
        <div class="form-group">
         <label for="Username">Name:</label>
         <input type="text" name="Username" class="form-control" required>
        </div>

        <div class="form-group">
         <label for="Email">Email:</label>
         <input type="email" name="Email" class="form-control" required>
        </div>

        <div class="form-group">
         <label for="Phone">Phone:</label>
         <input type="tel" name="Phone" class="form-control" required>
        </div>

        <div class="form-group">
         <label for="Password">Password:</label>
         <input type="password" name="Password" class="form-control" required>
        </div>

         <div class="form-group">
            <label for="role">Role</label>
            <select name="userRole" id="role" class="form-control" required>
              <option value="">Select your role</option>
              <option value="Student">Student</option>
              <option value="Expert">Expert</option>
              <option value="Educator">Educator</option>
              <option value="Admin">Admin</option>
            </select>
          </div>

         <div class="form-group d-flex justify-content-end mt-5">

         <input type="submit" name="submit" class="button btn btn-primary" value="Sign up">
        </div>
     </form>
     <p class="text-center">Already have an account? <a href="Login.php">Login</a></p>

	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
