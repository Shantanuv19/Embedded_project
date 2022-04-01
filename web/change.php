<?php
include 'db.php';
// We need to use sessions, so you should always start sessions using the below code.
session_start();
if(isset($_POST['submit']))
{    
     $opwd = $_POST['old'];
     $npwd = $_POST['new'];
     //echo $opwd;
     //echo $npwd;
    $sql = "UPDATE Admin SET password='$npwd' WHERE password='$opwd'";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
}

?>
