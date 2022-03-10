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

$sql = "SELECT id, name, branch, reg FROM g8S5n3brih";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["branch"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

$conn = null;
?>
