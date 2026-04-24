<?php
// Database credentials
$host = "localhost";
$user = "root";       // change if needed
$pass = "";           // change if needed
$dbname = "dems";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select database
$conn->select_db($dbname);

// Create 'user' table
$createUserTable = "
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($createUserTable) === TRUE) {
    echo "Table 'user' created successfully.<br>";
} else {
    echo "Error creating user table: " . $conn->error . "<br>";
}

// Create 'table1'
$createTable1 = "
CREATE TABLE IF NOT EXISTS table1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ename VARCHAR(100) NOT NULL,
    ecost INT NOT NULL,
    edate DATE NOT NULL,
    edisc VARCHAR(50)
)";

if ($conn->query($createTable1) === TRUE) {
    echo "Table 'table1' created successfully.<br>";
} else {
    echo "Error creating table1: " . $conn->error . "<br>";
}

// Close connection
$conn->close();

echo "<br>Setup completed.";
?>