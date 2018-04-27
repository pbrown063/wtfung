<?php
session_start();
require_once __DIR__ . '/bootstrap.php';

$greenhouse_list = json_decode($_POST['harvest'], true);
//Batch is not a mandatory field for harvesting.

foreach ($greenhouse_list as $harvest) {
  $mysqli = sql_connect();
  $strain = addslashes($harvest['strain']);
  $weight = addslashes($harvest['weight']);
  $date = addslashes($harvest['date']);
  $time = addslashes($harvest['time']);
  $notes = addslashes($harvest['notes']);
  $greenhouse = addslashes($harvest['greenhouse']);
  $batch_id = addslashes($harvest['batch_id']);
  $block_id = addslashes($harvest['block_id']);

  $insert = "INSERT INTO harvest (date, weight, time, notes, strain, greenhouse, batch_id, block_id) 
            VALUES ('$date', '$weight', '$time', '$notes', '$strain', '$greenhouse', $batch_id, $block_id);";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}



header("Location: harvest_form.php");
$_SESSION['message'] = 2 ;
exit();

