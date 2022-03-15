
<?php
$servername = "https://a158-223-231-233-68.ngrok.io";
$username = "rfidattendance";
$password = "root";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
echo "Connected successfully";
$conn->close();
?>
