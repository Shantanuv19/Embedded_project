
<?php
$servername = "http://a158-223-231-233-68.ngrok.io";
$username = "root";
$password = "";
$dbname = "rfidattendance";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
