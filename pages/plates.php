<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "generation"))) {

header("Location: plate_form.php");
die();

} else {

//connect to database
$mysqli = sql_connect();
//grabbing inputs from posted form and making variables
$generation = addslashes(filter_input(INPUT_POST, "generation"));
$code = addslashes(filter_input(INPUT_POST, "code"));
$count = filter_input(INPUT_POST, "count");
$date = filter_input(INPUT_POST, "creation_date");

//query for insertion to database
$insert = "INSERT INTO plates (strain_code, generation, plate_count, creation_date, plate_id) VALUES (lower('$code'), lower('$generation'), '$count', '$date', 0);";

//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header("Location: plate_form.php");
die();

}

