<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") ) {

  header("Location: plate_form.php");
  die();

} else {

  //connect to database
  $mysqli = sql_connect();
  //grabbing inputs from posted form and making variables
  $code = addslashes(filter_input(INPUT_POST, "code"));
  $count = filter_input(INPUT_POST, "count");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = addslashes(filter_input(INPUT_POST, "notes"));

  //query for insertion to database
  $insert = "INSERT INTO plates (strain_code, plate_count, creation_date, plate_id) 
            VALUES (lower('$code'), '$count', '$date', 0);";

  //insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  // Insert for the creation record table.
  $mysqli = sql_connect();
  $insert_creation = "INSERT INTO plates_creation (strain_code, plate_count, creation_date, notes)
            VALUES(lower('$code'), '$count', '$date', '$notes');";
  $sql = mysqli_query($mysqli, $insert_creation) or die(mysqli_error($mysqli));

  $_SESSION['message'] = 2 ;

  header("Location: plate_form.php");
  die();

}

