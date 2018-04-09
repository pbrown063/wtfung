<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit")) {

header("Location:building_form.php");
die();

} else {
//grabbing inputs from posted form and making variables
  $id = filter_input(INPUT_POST, "id");
//query for insertion to database
  $insert = "INSERT INTO building (id) VALUES (lower('$id'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  header("Location:building_form.php");
  die();
}