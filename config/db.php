<?php
// Database configuration
$servername = "localhost";  // Usually 'localhost' if you're using XAMPP or WAMP
$username = "root";         // Your MySQL username (default is 'root' for local servers)
$password = "";             // Your MySQL password (leave blank for default in XAMPP/WAMP)
$dbname = "ecommerce";      // Your database name (make sure you create this in MySQL)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
