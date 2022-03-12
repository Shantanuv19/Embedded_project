
<?php
$servername = "http://10.36.252.76/";
$username = "rootnew";
$password = "00000";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
echo "Connected successfully";
$conn->close();
?>
