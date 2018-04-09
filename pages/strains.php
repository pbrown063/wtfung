<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';


if (!filter_input(INPUT_POST, "submit")) {

header("Location: http://159.89.126.149/wtfk/wtfung/pages/strain_form.php");
die();
} else {

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

header("Location: http://159.89.126.149/wtfk/wtfung/pages/strain_form.php");
die();
}
