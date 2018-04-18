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
  $greenhouse_list = [];
  if (isset($_POST['harvest_list'])) {
    $greenhouse_list = $_POST['greehouse_list'];
  }
  // Compiled harvest data for greenhouse is complete. This block will insert the data by cycling
  // through all of the batches in the greenhouse array
  // We're going to use AJAX style JSON strings here... json_decode($the_harvest_greenhouse_array);
  // This will require some serious work.
  $mysqli = sql_connect();

  foreach ($greenhouse_list as $batch) {
    // @TODO Put arrary cycle and query in here.
    $batch_id = $batch;

// PULL JSON data and set up the queries, cycling through array.
      //$insert = "INSERT INTO harvest (date, weight, time, notes, batch, strain) VALUES ('$date', '$weight', '$time', '$notes','$batch', '$strain');";
    //connect to database

    //insert into database or error message
    $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
  }
  header('Location: harvest_greenhouse_form.php');
  die();

}
