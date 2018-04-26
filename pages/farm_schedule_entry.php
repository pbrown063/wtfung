<?php
session_start();

require_once __DIR__ . '/bootstrap.php';

$schedule_list = json_decode($_POST['schedule'], true);
//Batch is not a mandatory field for harvesting.

foreach ($schedule_list as $entry) {
  $mysqli = sql_connect();
  $date = addslashes($entry['date']);
  $strain = addslashes($entry['strain']);
  $substrate = addslashes($entry['substrate']);
  $phase = addslashes($entry['phase']);
  $volume = addslashes($entry['volume']);
  $notes = addslashes($entry['notes']);


  $insert = "INSERT INTO schedule (date, strain, substrate, phase, volume, notes) VALUES ('$date', '$strain', '$substrate', '$phase', '$volume', '$notes');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}

$_SESSION['message'] = 2 ;

header("Location: home.php");

 exit();
