<?php

// Database connection details
$servername ="localhost:3306";	
$username = "u2gpe4zg4vy9l";
$password = "njkntxu2m3ii";
$database = "dbt1in3r9xgvwp";

// http://victoriacarehomes.com/insert.php?temperature=25&gas=50&flame=1&pir=0

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve parameters from the URL
$temperature = $_GET['temperature'];
$gas = $_GET['gas'];
$flame = $_GET['flame'];
$pir = $_GET['pir'];

// Calculate current datetime
$datetime = date('Y-m-d H:i:s');

// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO sensor_data (datetime, temperature, gas, flame, pir) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siiii", $datetime, $temperature, $gas, $flame, $pir);

if ($stmt->execute() === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();

?>