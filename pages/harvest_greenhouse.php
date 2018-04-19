<?php

require_once __DIR__ . '/bootstrap.php';


$greenhouse_list = json_decode(stripslashes($_POST['greenhouseHarvest']));

//print_r($greenhouse_list);


$mysqli = sql_connect();

foreach ($greenhouse_list as $batch) {
  // @TODO Put arrary cycle and query in here.
  print_r($batch);

  $batch = addslashes($batch[0]);
  $strain = addslashes($batch[1]);
  $weight = addslashes($batch[2]);
  $date = addslashes($batch[3]);
  $time = addslashes($batch[4]);
  $notes = addslashes($batch[5]);
  $insert = "INSERT INTO harvest (date, weight, time, notes, batch, strain) VALUES ('$date', '$weight', '$time', '$notes','$batch', '$strain');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}

header('Location: harvest_greenhouse_form.php');
die();


