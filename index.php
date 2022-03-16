<?php
$servername='http://f7e8-2409-4062-2d80-aa8f-25cb-c73c-1b06-761a.ngrok.io';
$username='root';
$password='';
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
