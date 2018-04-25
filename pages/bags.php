<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "batch"))) {

  header("Location: bag_form.php");
  die();

}

else {



  $mysqli = sql_connect();
  // grabbing inputs from posted form and reference table and making variables
  $strainselect = "SELECT strain_code, jar_count FROM jars WHERE jar_id = ". $_POST['jar_id'];
  $result2 = mysqli_query($mysqli, $strainselect);
  while($row = mysqli_fetch_array($result2)) {
    $code = $row['strain_code'];
    $update_jar_count = $row['jar_count'];
  }


  //grabbing inputs from posted form and making variables
  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $batch_name = addslashes(filter_input(INPUT_POST, "batch_name"));
  $jars_used = filter_input(INPUT_POST, "number_of_jars");
  $num_bags = filter_input(INPUT_POST, "num_bags");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = addslashes(filter_input(INPUT_POST, "notes"));
  $jar_id = filter_input(INPUT_POST, "jar_id");
  $update_jar_count = $update_jar_count - $jars_used;

  $insert = "INSERT INTO batches (name, strain_code, creation_date) VALUES ('$batch_name', '$code', '$date');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));


  $grab_batch_id = "SELECT id FROM batches WHERE creation_date = '$date';";
  $result3 = mysqli_query($mysqli, $grab_batch_id);
  while($row = mysqli_fetch_array($result3)) {
    $batch_id = $row['id'];
  }


  $insert = "INSERT INTO bags (num_bags, substrate, creation_date, strain_code, batch_id) 
            VALUES ('$num_bags', lower('$substrate'), '$date', '$code', '$batch_id');";
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

  $updatejars = "UPDATE jars SET jar_count = ".$update_jar_count." WHERE jar_id = ".$jar_id.";";
  $sqlupdate = mysqli_query($mysqli, $updatejars) or die(mysqli_error($mysqli));

  // Insert into bags_creation table and references jars_creation table.
  $insert_creation = "INSERT INTO bags_creation (num_bags, substrate, creation_date, notes, strain_code, batch_id, jar_id)
                        VALUES ('$num_bags', '$substrate', '$date', '$notes', '$code', '$batch_id', '$jar_id')";
  $sql = mysqli_query($mysqli, $insert_creation) or die(mysqli_error($mysqli));

  $_SESSION['message'] = '2' ;

  header("Location: bag_form.php");
  die();

}
