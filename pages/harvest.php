<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

echo "HARVEST INPUT<br><br>";
//form for strain data


if (!filter_input(INPUT_POST, "submit")) {

echo "Please fill out the form<br><br>";
echo "
<form action='' method='post' id='harvest_form'> 

Batch ID:<input type='text' name='batch' placeholder='Input Batch ID' required> </input><br><br>

Strain:";
display_strains();

echo " Date:<input type='text' name='date' placeholder='YYYY-MM-DD' required> </input><br><br>

Weight:<input type='text' name='weight' placeholder='Input weight' required> </input><br><br>

<input type='radio' name='time' value='am' checked> AM<br>
<input type='radio' name='time' value='pm'> PM<br>

Notes:<br>
<textarea rows='4' cols='50' name='notes' form='harvest_form' placeholder='Enter notes here'> </textarea><br><br>
<input type = 'submit' name='submit' value='Submit Harvest Info'>

</form><br><br>";


} else {
//grabbing inputs from posted form and making variables
$batch = filter_input(INPUT_POST, "batch");
$strain = filter_input(INPUT_POST, "strain");
$date = filter_input(INPUT_POST, "date");
$weight = filter_input(INPUT_POST, "weight");
$time = filter_input(INPUT_POST, "time");
$notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
$insert = "INSERT INTO harvest (batch_id, species, date, weight, time, notes) VALUES ('$batch', '$species', '$date', '$weight', '$time', '$notes');";
//connect to database
$mysqli = sql_connect();
//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));
echo "Your harvest has been added<br>";

}