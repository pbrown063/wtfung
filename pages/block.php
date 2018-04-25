<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

if (!filter_input(INPUT_POST, "submit") || ctype_space(filter_input(INPUT_POST, "batch"))) {

  header("Location: bag_form.php");
  die();

}

else {

  $mysqli = sql_connect();


  $substrate = addslashes(filter_input(INPUT_POST, "substrate"));
  $batch_id = addslashes(filter_input(INPUT_POST, "batch_id"));
  $block_count = filter_input(INPUT_POST, "block_count");
  $date = filter_input(INPUT_POST, "creation_date");
  $notes = addslashes(filter_input(INPUT_POST, "notes"));
  $strain_code = addslashes(filter_input(INPUT_POST, "strain"));
  $bag_id = filter_input(INPUT_POST, "bag_id");
  $num_bags = filter_input(INPUT_POST, "num_bags");
  $bags_used = filter_input(INPUT_POST, "bags_used");
  $num_bags -= $bags_used;

  $updatebags = "UPDATE bags SET num_bags = ".$num_bags." WHERE id = ".$bag_id.";";
  $sqlupdate = mysqli_query($mysqli, $updatebags) or die(mysqli_error($mysqli));

  $insert_blocks = "INSERT INTO blocks (num_blocks, substrate, creation_date, strain_code, batch_id) 
            VALUES ('$block_count', lower('$substrate'), '$date', '$strain_code', '$batch_id');";
  $sql = mysqli_query($mysqli, $insert_blocks) or die(mysqli_error($mysqli));

  $insert_block_creation ="INSERT INTO blocks_creation (num_blocks, substrate, creation_date, strain_code, batch_id, bag_id, notes) 
            VALUES ('$block_count', lower('$substrate'), '$date', '$strain_code', '$batch_id', '$bag_id', '$notes');";
  $sql = mysqli_query($mysqli, $insert_block_creation) or die(mysqli_error($mysqli));

  header("Location: block_form.php");
  die();

}
