<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbName = "gsrdb";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define $email and $password
$email_input = $_POST['email']; // Use a different variable name
$password_input = $_POST['password']; // Use a different variable name

// Prepare and bind SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT email, password FROM user WHERE email=?");
$stmt->bind_param("s", $email_input);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($email_db, $hashed_password_db); // Use different variable names
    $stmt->fetch();
    // Verify the password
    if (password_verify($password_input, $hashed_password_db)) { // Compare with hashed password from the database
        // Redirect to Homepage.php
        header("location: Homepage.php");
        exit; // Stop further execution
    } else {
        // Incorrect password
        header("Location: login.php?error=incorrect_password");
        exit;
    }
} else {
    // No user found
    header("Location: login.php?error=no_user_found");
    exit;
}

// Close prepared statement and connection
$stmt->close();
$conn->close();
?>
