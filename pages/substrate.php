<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

if (!filter_input(INPUT_POST, "submit")) {

header("Location: http://159.89.126.149/wtfk/wtfung/pages/substrate_form.php");
die();

} else {
//grabbing inputs from posted form and making variables
  $substrate = filter_input(INPUT_POST, "substrate");
  $notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
  $insert = "INSERT INTO substrate_library (substrate_type, notes) VALUES (lower('$substrate'), lower('$notes'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header("Location: http://159.89.126.149/wtfk/wtfung/pages/substrate_form.php");
die();
}