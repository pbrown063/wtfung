<?php

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

  $insert = "INSERT INTO harvest (date, weight, time, notes, strain, greenhouse) VALUES ('$date', '$weight', '$time', '$notes', '$strain', '$greenhouse');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}

  $_SESSION['message'] = 2 ;

die();


