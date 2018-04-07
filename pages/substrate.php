<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

echo "Substrate<br><br>";
//form for buildings
$display =  "
<form action='' method='post' id='substrate_form'> 

Substrate:<input type='text' name='substrate' placeholder='Add substrate' required> </input><br><br>

<textarea rows='4' cols='50' name='notes' form='substrate_form' placeholder='Enter notes here'></textarea><br><br>

<input type='submit' name='submit' value='Add Substrate'>
</form><br>";

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form.<br><br>";
  echo "$display";

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

  echo "Your data has been submitted<br><br>";
  echo "$display";
}