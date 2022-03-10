<?php
$servername = "remotemysql.com";
$username = "g8S5n3brih";
$password = "mxyceqDezM";
$dbname = "g8S5n3brih";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
echo "connected";

$conn = null;
?>
