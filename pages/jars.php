<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "generation"))) {

  header("Location: jar_form.php");
  die();

}

else {

  $mysqli = sql_connect();


  //grabbing inputs from posted form and reference table and making variables
  $strainselect = "SELECT strain_code, plate_count FROM  plates WHERE plate_id = ".$_POST['plate_id'];
  $result2 = mysqli_query($mysqli, $strainselect);
  while($row = mysqli_fetch_array($result2)) {
    $code = $row['strain_code'];
    $update_plate_count = $row['plate_count'];
  }

  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $plate = filter_input(INPUT_POST, "plate_id");
  $count = filter_input(INPUT_POST, "count"); // Jars created
  $plate_count = filter_input(INPUT_POST, "number_of_plates");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = filter_input(INPUT_POST, "notes");
  $update_plate_count = $update_plate_count - $plate_count;

  // Insert to live jars table and update live plates
  $insert = "INSERT INTO jars (strain_code, jar_count, substrate, creation_date, plate_id) 
            VALUES (lower('$code'), '$count', lower('$substrate'), '$date', '$plate');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
  $mysqli = sql_connect();
  $updateplates = "UPDATE plates SET plate_count = " .$update_plate_count. "  WHERE plate_id = ".$plate.";";
  $sqlupdate = mysqli_query($mysqli, $updateplates) or die(mysqli_error($mysqli));


  // Insert into jars_creation table and references plates_creation table.
  $mysqli = sql_connect();
  $insert_creation = "INSERT INTO jars_creation (strain_code, jar_count, substrate, creation_date, plate_id, notes) 
                      VALUES (lower('$code'), '$count', lower('$substrate'), '$date', '$plate', '$notes');";
  $sql = mysqli_query($mysqli, $insert_creation) or die(mysqli_error($mysqli));

  $_SESSION['message'] = '2' ;

  header("Location: jar_form.php");
  die();

}
