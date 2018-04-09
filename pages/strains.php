<?php
  require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form<br>";
  header('Location: strain_form.php');

} else {

  echo "Thank you, your data has been submitted<br>";

//grabbing inputs from posted form and making variables
  $common = filter_input(INPUT_POST, "common");
  $code = filter_input(INPUT_POST, "code");
  $scientific = filter_input(INPUT_POST, "scientific");
  $abbreviation = filter_input(INPUT_POST, "abbreviation");
  $notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
  $insert = "INSERT INTO strains_library (common_name, scientific_name, strain_code, abbreviation, notes) VALUES (lower('$code'), lower('$scientific'), lower('$common'), lower('$abbreviation'), lower('$notes'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
  header('Location: strain_form.php');
}
