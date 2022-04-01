<?php
session_start();
/*$servername='localhost';
$username='id17796278_shantanu';
$password='Ab@123456789';
$dbname = "id17796278_data";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}*/
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id17796278_shantanu';
$DATABASE_PASS = 'Ab@123456789';
$DATABASE_NAME = 'id17796278_data';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM Admin WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
if ($_POST['password'] === $password) {		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
	//	header('Location: home.php');
		//echo 'Welcome ' . $_SESSION['name'] . '!';
		
		$d = $_POST['username'];
		{
            $sql = "SELECT status FROM Admin WHERE username='$d'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            // $name = $row['Name'];
            $st = $row['status'];
            }
            } else {
              echo "0 results";
        }
        }
    if($st=='Admin'){
        include_once 'admin.html';
    }else{
        include 'home.php';
    }
    
        
	} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

	$stmt->close();
}
?>
