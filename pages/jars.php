<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "generation"))) {

header("Location: jar_form.php");
die();

} else {

//connect to database
$mysqli = sql_connect();
//grabbing inputs from posted form and making variables
$genselect = "SELECT generation FROM  plates WHERE plate_id = ".$_POST['plate_id'];
$result = mysqli_query($mysqli,$genselect);
while($row = mysqli_fetch_array($result)) {
$generation = $row['generation'];
}
$strainselect = "SELECT strain_code FROM  plates WHERE plate_id = ".$_POST['plate_id'];
$result2 = mysqli_query($mysqli,$strainselect);
while($row = mysqli_fetch_array($result2)) {
$code = $row['strain_code'];
}

$substrate = addslashes(filter_input(INPUT_POST, "substrate"));
$plate = addslashes(filter_input(INPUT_POST, "plate_id"));
$count = filter_input(INPUT_POST, "count");
$date = filter_input(INPUT_POST, "creation_date");

//query for insertion to database
$insert = "INSERT INTO jars (strain_code, generation, jar_count, substrate, creation_date, plate_id) VALUES (lower('$code'), lower('$generation'), '$count', lower('$substrate'), '$date', '$plate');";

//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
$updateplates = "UPDATE plates SET plate_count = plate_count -".$_POST['count']." WHERE plate_id = ".$_POST['plate_id'].";";
$sqlupdate = mysqli_query($mysqli, $updateplates) or die(mysqli_error($mysqli));

header("Location: jar_form.php");
die();

}
