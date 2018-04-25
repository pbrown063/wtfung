<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "generation"))) {

  header("Location: jar_form.php");
  die();

}

else {
  $mysqli = sql_connect();

  //grabbing inputs from posted form and reference table and making variables

  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $plate_id = filter_input(INPUT_POST, "plate_id");
  $jar_count = filter_input(INPUT_POST, "count"); // Jars created
  $plates_used = filter_input(INPUT_POST, "plates_used");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = filter_input(INPUT_POST, "notes");
  $plate_count = filter_input(INPUT_POST, "num_plates");
  $strain_code = filter_input(INPUT_POST, "strain");
  $plate_count -= $plates_used;

  // Insert jar and jar creation and update plates table
  $insert = "INSERT INTO jars (strain_code, jar_count, substrate, creation_date, plate_id) 
            VALUES (lower('$strain_code'), '$jar_count', lower('$substrate'), '$date', '$plate_id');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  $updateplates = "UPDATE plates SET plate_count = " .$plate_count. "  WHERE plate_id = ".$plate_id.";";
  $sqlupdate = mysqli_query($mysqli, $updateplates) or die(mysqli_error($mysqli));

  $mysqli = sql_connect();
  $insert_creation = "INSERT INTO jars_creation (strain_code, jar_count, substrate, creation_date, plate_id, notes) 
                      VALUES (lower('$strain_code'), '$jar_count', lower('$substrate'), '$date', '$plate_id', '$notes');";
  $sql = mysqli_query($mysqli, $insert_creation) or die(mysqli_error($mysqli));

  $_SESSION['message'] = 2;
  header("Location: home.php");
  die();

}
