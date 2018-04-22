<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "batch"))) {

header("Location: bag_form.php");
die();

} else {

//connect to database
$mysqli = sql_connect();
//grabbing inputs from posted form and making variables
$substrate = addslashes(filter_input(INPUT_POST, "substrate"));
$batch = addslashes(filter_input(INPUT_POST, "batch"));
$num_bags = filter_input(INPUT_POST, "num_bags");
$date = filter_input(INPUT_POST, "creation_date");
$account = filter_input(INPUT_POST, "account");
$notes = addslashes(filter_input(INPUT_POST, "notes"));
$strain_code = addslashes(filter_input(INPUT_POST, "code"));
//query for insertion to database
$insert = "INSERT INTO bags (worker, num_bags, substrate, creation_date, notes, batch_id, strain_code) 
            VALUES (lower('$account'), '$num_bags', lower('$substrate'), '$date', '$notes', '$batch', '$strain_code');";

//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header("Location: bag_form.php");
die();

}
