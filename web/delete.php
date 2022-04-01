<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $Gmailid = $_POST['Gmail_id'];
     
    // sql to delete a record in Admin
    $sql = "DELETE FROM Admin WHERE email='$Gmailid'";
    if ($conn->query($sql) === TRUE) {
      //echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    //sql to delete a record in qq
     $sql = "DELETE FROM qq WHERE Gmail='$Gmailid'";
    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully from database";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
     mysqli_close($conn);
}
?>

