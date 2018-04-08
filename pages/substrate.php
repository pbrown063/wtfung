<?php
  require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form.<br><br>";
  header('Location: substrate_form.php');

} else {
  echo "Your data has been submitted<br><br>";

//grabbing inputs from posted form and making variables
$substrate = filter_input(INPUT_POST, "substrate");
$notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
$insert = "INSERT INTO substrate_library (substrate_type, notes) VALUES (lower('$substrate'), lower('$notes'));";
  
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));


  header('Location: substrate_form.php');

}