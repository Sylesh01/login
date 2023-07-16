<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Employees (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
} else {
echo "Error creating table: " . $conn->error;
}
?>
