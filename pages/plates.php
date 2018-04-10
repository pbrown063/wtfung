<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

if (!filter_input(INPUT_POST, "submit")) {

header("Location: plate_form.php");
die();

} else {

//connect to database
$mysqli = sql_connect();
//grabbing inputs from posted form and making variables
$generation = filter_input(INPUT_POST, "generation");
$code = filter_input(INPUT_POST, "code");
$count = filter_input(INPUT_POST, "count");
$date = filter_input(INPUT_POST, "creation_date");

//query for insertion to database
$insert = "INSERT INTO plates (strain_code, generation, plate_count, creation_date) VALUES (lower('$code'), lower('$generation'), '$count', '$date');";

//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header("Location: plate_form.php");
die();

}

