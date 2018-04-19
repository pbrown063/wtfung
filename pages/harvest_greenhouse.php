<?php

require_once __DIR__ . '/bootstrap.php';

$greenhouse_list = json_decode($_POST['harvest'], true);
//Batch is not a mandatory field for harvesting.
$batch_default = '00';
$mysqli = sql_connect();

foreach ($greenhouse_list as $harvest) {
  $batch = is_string($batch) ? addslashes($harvest['batch_id']) : $batch_default;
  $strain = addslashes($harvest['strain']);
  $weight = addslashes($harvest['weight']);
  $date = addslashes($harvest['date']);
  $time = addslashes($harvest['time']);
  $notes = addslashes($harvest['notes']);

  $insert = "INSERT INTO harvest (date, weight, time, notes, batch_id, strain) VALUES ('$date', '$weight', '$time', '$notes','$batch', '$strain');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}

die();


