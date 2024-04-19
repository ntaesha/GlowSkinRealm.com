<?php
session_start(); // Start the session

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Trim whitespace from email
    $email = trim($email);
    
    // Connect to database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "gsrdb";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user exists
    $select = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // User exists, verify password
        $user = mysqli_fetch_assoc($result);
        $hashed_password = $user['password'];
        
        // Debugging: Print hashed password from the database
        echo "Hashed Password from Database: " . $hashed_password . "<br>";

        if (password_verify($password, $hashed_password)) {
            // Passwords match, authentication successful
            $_SESSION['email'] = $email;
            header('location: Homepage.php');
            exit();
        } else {
            // Passwords do not match
            $_SESSION['error'] = 'Invalid email or password!';
            header('location: login.php');
            exit();
        }
    } else {
        // User does not exist
        $_SESSION['error'] = 'User does not exist!';
        header('location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | Login</title>
	  <link rel="icon" href="logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  </head>
<style>
	.form-container{
		min-height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 20px;
		padding-bottom: 60px;
		background: #ffe6a7;
	}
	
	.form-container form{
		padding: 20px;
		border-radius: 5px;
		box-shadow: 15px 15px 10px rgba(0,0,0,.2), -15px -15px 10px rgba(0,0,0,.2);
		text-align: center;
		width: 500px;
	}
	
	.form-container form h3{
		font-size: 30px;
		text-transform: uppercase;
		margin-bottom: 10px;
		color: #432818;
	}
	
	.form-container form input{
		width: 100%;
		padding: 10px 15px;
		font-size: 17px;
		margin: 8px 0;
		background: #fff;
		border-radius: 5px;
	}
	
	.form-container form .form-btn{
		width: 350px;
		background: #432818;
		color: #fff;
		text-transform: capitalize;
		font-size: 20px;
		cursor: pointer;
		border-radius: 5px;
	}
	
	.form-container form .form-btn:hover{
		background: #99582a;
		color: #fff;
	}
	
	.form-container form p{
		margin-top: 10px;
		font-size: 20px;
		color: #000000;
	}
	
	.form-container form a{
		color: #6E1D1A;
		font-size: 20px;
		margin-top: 4px !important;
	}
	
	.form-container form .error-msg {
      margin: 10px 0;
      display: block;
      background: crimson;
      color: #fff;
      border-radius: 5px;
      font-size: 20px;
      padding: 10px;
    }
	
</style>
  <body>
	  <div class="form-container">
		  <form method="post">
			  <h3>Log In Now</h3>
			  <?php
          // Display error message if it exists
          if (isset($_SESSION['error'])) {
              echo '<span class="error-msg">' . $_SESSION['error'] . '</span>';
              unset($_SESSION['error']); // Clear the error message
          }
        ?>
			  <input type="email" name="email" required placeholder="Enter Your Email">
			  <input type="password" name="password" required placeholder="Enter Your Password">
			  <input type="submit" name="submit" value="register now" class="form-btn">
			  <p>Don't have an account?</p>
			  <a href="signup.php">Signup Now</a>
		  </form>
	  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>