<?php

//file containing functions -- needed for every page
 require_once __DIR__ . '/bootstrap.php';


if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST,"common"))|| ctype_space(filter_input(INPUT_POST,"code")) || 
    ctype_space(filter_input(INPUT_POST,"scientific")) || ctype_space(filter_input(INPUT_POST,"abbreviation"))) {

header('Location: strain_form.php');
die();

} else {
//grabbing inputs from posted form and making variables
  $common = addslashes(filter_input(INPUT_POST, "common"));
  $code = addslashes(filter_input(INPUT_POST, "code"));
  $scientific = addslashes(filter_input(INPUT_POST, "scientific"));
  $abbreviation = addslashes(filter_input(INPUT_POST, "abbreviation"));
  $notes = addslashes(filter_input(INPUT_POST, "notes"));
//query for insertion to database
  $insert = "INSERT INTO strains_library (common_name, scientific_name, strain_code, abbreviation, notes) VALUES (lower('$code'), lower('$scientific'), lower('$common'), lower('$abbreviation'), lower('$notes'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

header('Location: strain_form.php');
die();
}
