<?php
echo "hello";
$servername='192.168.137.62';
$username='admin';
$password='raspberry';
$dbname = "sensor_data";

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
