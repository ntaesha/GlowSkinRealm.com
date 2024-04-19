<?php
session_start(); // Start the session

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
	
	// Trim whitespace from passwords
    $password_input = trim($_POST["password"]);
    $cpassword_input = trim($_POST["cpassword"]);
	
	// Debugging: Output the values of $password and $cpassword
    var_dump($password_input);
    var_dump($cpassword_input);

    // Connect to database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "gsrdb";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user already exists
    $select = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // User already exists
        $_SESSION['error'] = 'User already exists!';
        header('location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
		 echo "Passwords to compare: $password_input and $cpassword_input <br>"; // Debugging
        if ($password_input != $cpassword_input) {
            // Passwords do not match
            $_SESSION['error'] = 'Passwords do not match!';
            header('location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password_input, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert = "INSERT INTO user (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashed_password')";
            if (mysqli_query($conn, $insert)) {
                // Successful signup, redirect to login page
                header('location: login.php');
                exit();
            } else {
                // Error inserting user
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GlowSkinRealm.com | Sign Up</title>
	  <link rel="icon" href="logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  </head>
  <style>
    .form-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      padding-bottom: 60px;
      background: #ffe6a7;
    }

    .form-container form {
      padding: 20px;
      border-radius: 5px;
      box-shadow: 15px 15px 10px rgba(0,0,0,.2), -15px -15px 10px rgba(0,0,0,.2);
      text-align: center;
      width: 500px;
    }

    .form-container form h3 {
      font-size: 30px;
      text-transform: uppercase;
      margin-bottom: 10px;
      color: #432818;
    }

    .form-container form input {
      width: 100%;
      padding: 10px 15px;
      font-size: 17px;
      margin: 8px 0;
      background: #fff;
      border-radius: 5px;
    }

    .form-container form .form-btn {
      width: 350px;
      background: #432818;
      color: #fff;
      text-transform: capitalize;
      font-size: 20px;
      cursor: pointer;
      border-radius: 5px;
    }

    .form-container form .form-btn:hover {
      background: #99582a;
      color: #fff;
    }

    .form-container form p {
      margin-top: 10px;
      font-size: 20px;
      color: #000000;
    }

    .form-container form a {
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
        <h3>Sign Up Now</h3>
		  <?php
        // Display error message if it exists
        if (isset($_SESSION['error'])) {
            echo '<span class="error-msg">' . $_SESSION['error'] . '</span>';
            unset($_SESSION['error']); // Clear the error message
        }
        ?>
        <input type="text" name="name" required placeholder="Enter Your Name">
        <input type="email" name="email" required placeholder="Enter Your Email">
        <input type="tel" name="phone" required placeholder="Enter Your No.Phone">
        <input type="password" name="password" required placeholder="Enter Your Password">
        <input type="password" name="cpassword" required placeholder="Confirm Your Password">
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>Already have an account?</p>
        <a href="login.php">Login Now</a>
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
