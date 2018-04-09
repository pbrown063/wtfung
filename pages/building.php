<?php
  require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form.<br><br>";
  header("Location:building_form.php");

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
  header("Location:building_form.php");

}