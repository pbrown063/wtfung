<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

echo "Building<br><br>";
//form for buildings
$display =  "
<form action='' method='post' id='building_form'> 

Bulding Identification:<input type='text' name='id' placeholder='Input building' required> </input><br><br>
<input type='submit' name='submit' value='Add Building'>
</form><br>";

if (!filter_input(INPUT_POST, "submit")) {

echo "Please fill out the form.<br><br>";
echo "$display";

} else {
//grabbing inputs from posted form and making variables
$id = filter_input(INPUT_POST, "id");
//query for insertion to database
$insert = "INSERT INTO building (id) VALUES (lower('$id'));";
//connect to database
$mysqli = sql_connect();
//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

echo "Your data has been submitted<br>";
echo "$display";
}