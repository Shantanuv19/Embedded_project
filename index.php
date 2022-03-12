
<?php
$servername = "10.36.252.76";
$username = "rootnew";
$password = "00000";
//$dbname = "g8S5n3brih";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
echo "Connected successfully";
}
$conn->close();
?>
