
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id17796278_shantanu';
$DATABASE_PASS = 'Ab@123456789';
$DATABASE_NAME = 'id17796278_data';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM Admin WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
// Print "<br><strong> ".$password."</strong>";
$sql = "SELECT id, email, username FROM Admin WHERE password='$password'";
$result = $con->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  Print "<br><strong> ".$_SESSION['loggedin']."</strong>";
        $id = $row['id'];
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
		<title>Profile Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>HELLO ADMIN</h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="change.html"><i class="fas fa-sign-out-alt"></i>Change Password</a>
			</div>
		</nav>
		<div class="content">
              <h2><?php echo "$username"?></h2>
			<div>
				<p><b></b>Your account details are below:</b></p>
				<table>
				    <tr>
						<td>Id:</td>
						<td><?php echo "$id" ?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?php echo "$usernam"?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo "$email"?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?php echo "$password"?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
