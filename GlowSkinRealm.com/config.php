<?php
$date = date("d-m-Y");
//get input values from form
extract($_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gsrdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); 
}
	
// Check if the user already exists
$select = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $select);
	
if (mysqli_num_rows($result) > 0) {
      $error[] = 'User already exists!';
        
    } else {
        if ($password != $cpassword) {
            $error[] = 'Passwords do not match!';
        } else {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert = "INSERT INTO user (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashed_password')";
            if (mysqli_query($conn, $insert)) {
            // Successful signup, redirect to login page
            header('location: login.php');
            exit; // Stop further execution
        } else {
            // Error inserting user
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
    }
}

?>
