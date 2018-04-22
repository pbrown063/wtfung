<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "batch"))) {

  header("Location: bag_form.php");
  die();

} else {

  //connect to database
  $mysqli = sql_connect();
  //grabbing inputs from posted form and making variables
  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $batch = addslashes(filter_input(INPUT_POST, "batch"));
  $block_count = filter_input(INPUT_POST, "block_count");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = addslashes(filter_input(INPUT_POST, "notes"));
  $strain_code = addslashes(filter_input(INPUT_POST, "code"));
  //query for insertion to database
  $insert = "INSERT INTO blocks (creation_date, batch_id, block_count, substrate, strain_code, notes) 
            VALUES ('$date', '$batch', '$block_count', lower('$substrate'), '$strain_code', '$notes');";
  //insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  header("Location: block_form.php");
  die();

}
