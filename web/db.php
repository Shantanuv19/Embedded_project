<?php
$servername='localhost';
$username='id17796278_shantanu';
$password='Ab@123456789';
$dbname = "id17796278_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "connected";
}
?>
