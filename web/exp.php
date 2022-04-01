<?php 
 
// Load the database configuration file 
include_once 'db.php'; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM qq ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "Students-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'Name', 'Gmail', 'Uid', 'rfid', 'Status', 'E_time', 'O_time', 'Date'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['Id'], $row['Name'], $row['Gmail'], $row['Uid'], $row['rfid'], $row['Status'], $row['E_time'], $row['O_time'], $row['Date'], $status); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>
