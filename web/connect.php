<?php
include_once 'db.php';
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d");
if(isset($_POST['submit']))
{    
     $na = $_POST['Name'];
     $email = $_POST['Gmail'];
     $Uid = $_POST['Unid'];
     $rfid = $_POST['rfid'];
     $pwd = $_POST['pwd'];
     // In qq
     
     $sql = "INSERT INTO `qq` (`Name`, `Gmail`, `Uid`, `rfid`, `Status`, `E_time`, `O_time`, `Date`) VALUES ('$na', '$email', '$Uid', '$rfid', '', '', '', '$timestamp')";
     
     /*$sql = "INSERT INTO qq (Name, Gmail, Uid, rfid, Status, E_time, O_time,Date)
     VALUES ('$na','$email','$Uid','$rfid','','','','j')";*/
     if (mysqli_query($conn, $sql)) {
       // echo "New record has been added successfully into qq!";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    // mysqli_close($conn);
     //In Admin
     $s = 'student';
     $sql = "INSERT INTO Admin (username, password, email, status, Uid, rfid)
     VALUES ('$na','$pwd','$email','$s','$Uid','$rfid')";
     if (mysqli_query($conn, $sql)) {
        echo "<br>New record has been added successfully into database!";
    } else {
        echo "<br>Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
