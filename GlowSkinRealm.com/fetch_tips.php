<?php
// Database connection parameters
$servername = "localhost";
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "gsrdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch tips from the database
$sql = "SELECT * FROM tips";
$result = $conn->query($sql);

// Check if there are any tips
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display each tip
        echo '<div class="tip">';
        echo '<h3>' . $row["title"] . '</h3>';
		echo '<p>Uploaded by: ' . $row["name"] . '</p>';
        echo '<p>' . $row["desc"] . '</p>';
        echo '<div class="video-container">';
        echo '<iframe width="560" height="315" src="' . $row["video"] . '" frameborder="0" allowfullscreen></iframe>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>