<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

if (!filter_input(INPUT_POST, "submit")  || ctype_space(filter_input(INPUT_POST, "substrate"))) {

header("substrate_form.php");
die();

} else {
//grabbing inputs from posted form and making variables
  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $notes = addslashes(filter_input(INPUT_POST, "notes"));
//query for insertion to database
  $insert = "INSERT INTO substrate_library (substrate_type, notes) VALUES (lower('$substrate'), lower('$notes'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  $_SESSION['message'] = '2' ;

header("Location: substrate_form.php");
die();
}