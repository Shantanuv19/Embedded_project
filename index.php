<?php
$servername='https://192.168.23.180';
$username='root';
$password='12345';
$dbname = 'test';

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
