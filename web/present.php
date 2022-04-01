<?php
  if(isset($_POST['submit'])) {
      $date = $_POST['date'];
      //echo $date;
  }
include_once'db.php';
$sql = "SELECT IdE_time, O_time, Date FROM qq WHERE Status='p'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8>
	<title>Export Data to CSV using PHP and Mysql by Codexword</title>
	<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="col-md-12 bg-light text-right">
    <div class="float-left text-right">
        <a href="exp.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>

<!-- Data list table --> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Uid</th>
            <th>rfid</th>
            <th>Status</th>
            <th>E_time</th>
            <th>O_time</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
   <?php 
    $timestamp = strtotime($date);
   
  // Create the new format from the timestamp
  $Date = date("Y-m-d", $timestamp);
  //echo $Date;
    // Fetch records from database 
    $result = $conn->query("SELECT * FROM qq WHERE Status='p' AND Date='$Date' ORDER BY id ASC");
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
        <tr>
            <td><?php echo $row['Id']; ?></td>
            <td><?php echo $row['Name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Uid']; ?></td>
            <td><?php echo $row['rfid']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td><?php echo $row['E_time']; ?></td>
            <td><?php echo $row['O_time']; ?></td>
            <td><?php echo $row['Date']; ?></td>
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="7">No member(s) found...</td></tr>
    <?php } ?>
    </tbody>
</table>
</body>


 
