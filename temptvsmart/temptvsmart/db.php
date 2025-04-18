<?php
$host = 'localhost';
$username = 'root';
$password = ''; // XAMPP ya WAMP use kar rahe ho toh password blank hoga
$dbname = 'techservices';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
