<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

echo "Substrate<br><br>";
//form for buildings
$display =  "
<form action='' method='post' id='substrate_form'> 

Substrate:<input type='text' name='substrate' placeholder='Add substrate' required> </input><br><br>
<input type='submit' name='submit' value='Add Substrate'>
</form><br>";

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form.<br><br>";
  echo "$display";

} else {
//grabbing inputs from posted form and making variables
  $substrate = filter_input(INPUT_POST, "substrate");
//query for insertion to database
  $insert = "INSERT INTO substrate_library (substrate_type) VALUES (lower('$substrate'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  echo "Your data has been submitted<br><br>";
  echo "$display";
}