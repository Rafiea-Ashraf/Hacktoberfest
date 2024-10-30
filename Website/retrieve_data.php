<?php

// Database connection details
$servername ="localhost:3306";
$username = "u2gpe4zg4vy9l";
$password = "njkntxu2m3ii";
$database = "dbt1in3r9xgvwp";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); // Change this to your development server's URL
// Prepare and execute SQL statement to retrieve the last row of data from the database
$sql = "SELECT * FROM sensor_data ORDER BY datetime DESC LIMIT 1";
$result = $conn->query($sql);

// Check if any data is retrieved
if ($result->num_rows > 0) {
    // Fetch the last row of data
    $row = $result->fetch_assoc();
    // Output data in JSON format
    echo json_encode($row);
} else {
    echo json_encode(array("message" => "No data found"));
}

// Close connection
$conn->close();

?>
