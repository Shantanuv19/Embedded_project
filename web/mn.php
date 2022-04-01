<?php
  if(isset($_POST['submit'])) {
      $date = $_POST['month'];
      //echo $date;
  }
  if($date == '2021-12')
  {
      include_once 'export.php';
  }else{
      echo 'invalid date!!';
  }
  
?>
