<?php
//file containing functions -- needed for every page
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

echo "STRAIN INPUT<br><br>";
//form for strain data
$display = "<form action='' method='post' id='strain_form'> 

Common Name:<input type='text' name='common' placeholder='Input common name'> </input><br><br>

Strain Code:<input type='text' name='code' placeholder='Input strain code'> </input><br><br>

Scientific Name:<input type='text' name='scientific' placeholder='Input scientific name'> </input><br><br>

Abbreviation:<input type='text' name='abbreviation' placeholder='Input abbreviation'> </input><br><br>

<textarea rows='4' cols='50' name='notes' form='strain_form' placeholder='Enter notes here'> </textarea><br><br>
<input type ='submit' name ='submit' value='Submit Strain'>

</form><br>";

if (!filter_input(INPUT_POST, "submit")) {

  echo "Please fill out the form<br>";
  echo "$display";

} else {

  echo "Thank you, your data has been submitted<br>";
  echo "$display";
//grabbing inputs from posted form and making variables
  $common = filter_input(INPUT_POST, "common");
  $code = filter_input(INPUT_POST, "code");
  $scientific = filter_input(INPUT_POST, "scientific");
  $abbreviation = filter_input(INPUT_POST, "abbreviation");
  $notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
  $insert = "INSERT INTO strains_library (common_name, scientific_name, strain_code, abbreviation, notes) VALUES (lower('$code'), lower('$scientific'), lower('$common'), lower('$abbreviation'), lower('$notes'));";
//connect to database
  $mysqli = sql_connect();
//insert into database or error message
  $sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
}
