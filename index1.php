<?php
$servername = "remotemysql.com";
$username = "g8S5n3brih";
$password = "mxyceqDezM";
$dbname = "g8S5n3brih";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "SELECT id, name, branch, reg FROM table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. "branch- " . $row["branch"]. " " .$row["reg"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
