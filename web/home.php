<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

$stmt = $con->prepare('SELECT password, email FROM Admin WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
// Print "<br><strong> ".$password."</strong>";
$sql = "SELECT email, username FROM Admin WHERE password='$password'";
$result = $con->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  Print "<br><strong> ".$_SESSION['loggedin']."</strong>";
       // $id = $row['id'];
        $usernam = $row['username'];
       //  $password = $row['password'];
         //Print "<strong>email: ".$row['email']."</strong><br>";
          $email = $row['email'];
       // echo "username: " . $row["username"]./* " username: " . $row["email"]. "Gmail: " . $row["Gmail"]. "Uid: " . $row["Uid"]. */"<br>";
    }

}
//echo $email;
//echo $usernam;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>HELLO STUDENT</h1>
				<a href="p.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Student Portal</h2>
			<p>Welcome, <?php echo $_SESSION['name']?>!</p>
		</div>
	</body>
	
</html>
<!DOCTYPE html>
<html>
    <head></head>
    <center><body style=background:pink; >
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>GMAIL</th><th>E_time</th><th>O_time</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }
    function beginChildren() { 
        echo "<tr>"; 
    }
    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}
include_once "db.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Id, Gmail, E_time, O_time FROM qq WHERE Name='$usernam'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</body></center>
</html>
