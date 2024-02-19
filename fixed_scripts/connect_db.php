<?php
// Create a connection
global $conn;
$conn = new mysqli("localhost", "root", "", "library_management_system");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>