<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';


//check for if they hit submit button or first time landing on the page
if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST,"batch")) || ctype_space(filter_input(INPUT_POST,"strain")) ||
    ctype_space(filter_input(INPUT_POST,"weight"))) {

header('Location: harvest_form.php');
die();

} else {
//grabbing inputs from posted form and making variables
$batch = addslashes(filter_input(INPUT_POST, "batch"));
$strain = addslashes(filter_input(INPUT_POST, "strain"));
$date = addslashes(filter_input(INPUT_POST, "date"));
$weight = addslashes(filter_input(INPUT_POST, "weight"));
$time = addslashes(filter_input(INPUT_POST, "time"));
$notes = addslashes(filter_input(INPUT_POST, "notes"));
//query for insertion to database
$insert = "INSERT INTO harvest (date, weight, time, notes, batch, strain) VALUES ('$date', '$weight', '$time', '$notes','$batch', '$strain');";
//connect to database
$mysqli = sql_connect();
//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header('Location: harvest_form.php');
die();

}