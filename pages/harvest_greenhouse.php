<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';


//check for if they hit submit button or first time landing on the page
if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST,"batch")) || ctype_space(filter_input(INPUT_POST,"strain")) ||
  ctype_space(filter_input(INPUT_POST,"weight"))) {

  header('Location: harvest_greenhouse_form.php');
  die();

}
else {

  if (isset($_POST['harvest_list'])) {
    $greenhouse_list = $_POST['harvest'];
  }

  $mysqli = sql_connect();

  foreach ($greenhouse_list as $batch) {
    // @TODO Put arrary cycle and query in here.

    $batch = addslashes($batch->'batch_id');
    $strain = addslashes($batch->'strain');
    $date = addslashes($batch->'date');
    $weight = addslashes($batch->'weight');
    $time = addslashes($batch->'time');
    $notes = addslashes($batch->'notest');

    $insert = "INSERT INTO harvest (date, weight, time, notes, batch, strain) VALUES ('$date', '$weight', '$time', '$notes','$batch', '$strain');";
    $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
  }

  header('Location: harvest_greenhouse_form.php');
  die();

}
